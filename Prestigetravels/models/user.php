<?php
require_once "../db.php";

class User {

  private function __construct() {}

  public static function getByEmail($email) {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM usuario WHERE correo = :email"
    );
    $stmt->execute([':email' => $email]);

    return $stmt->fetch();
  }

  public static function login($email, $password) {
    $user = self::getByEmail($email);
    if (is_array($user)) {
      if (password_verify($password, $user['contrasenia'])) {
        return [
          [
            'id' => $user['id_usuario'],
            'email' => $user['correo'],
            'name' => $user['nombre'],
          ],
          null];
      }
    }

    return [null, "Usuario y/o contraseña invalido"];
  }

  public static function existsName($name){
    $stmt = DB::getInstance()->prepare(
        "SELECT * FROM usuario WHERE nombre = :name"
    );
    $stmt->execute([":name" => $name]);
    return !empty($stmt->fetch());
  }

  public static function existsEmail($email){
    return !empty(self::getByEmail($email));
  }

  public static function create($name, $email, $password, $birth_date) {    
    $stmt = DB::getInstance()->prepare(
      "INSERT INTO usuario (nombre, correo, contrasenia, fecha_nacimiento) VALUES (:name, :email, :password, :birth_date)"
    );
    $stmt->execute([
      ":name" => $name,
      ":email" => $email,
      ":password" => password_hash($password, PASSWORD_DEFAULT),
      ":birth_date" => $birth_date
    ]);
  }
}