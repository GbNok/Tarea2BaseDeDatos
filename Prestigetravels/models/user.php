<?php
require_once __DIR__ . "/../db.php";

class User
{

  private function __construct()
  {
  }

  public static function getInfo($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT nombre, correo, fecha_nacimiento FROM usuario WHERE id_usuario = :user_id"
    );

    $stmt->execute(["user_id" => $user_id]);
    return $stmt->fetch();
  }


  public static function getByEmail($email)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM usuario WHERE correo = :email"
    );
    $stmt->execute([':email' => $email]);

    return $stmt->fetch();
  }

  public static function login($email, $password)
  {
    $user = self::getByEmail($email);
    if (is_array($user)) {
      if (password_verify($password, $user['contrasenia'])) {
        return [
          [
            'id' => $user['id_usuario'],
            'email' => $user['correo'],
            'name' => $user['nombre'],
          ],
          null
        ];
      }
    }

    return [null, "Usuario y/o contraseña invalido"];
  }

  public static function existsName($name)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM usuario WHERE nombre = :name"
    );
    $stmt->execute([":name" => $name]);
    return !empty($stmt->fetch());
  }

  public static function existsEmail($email)
  {
    return !empty(self::getByEmail($email));
  }

  public static function create($name, $email, $password, $birth_date)
  {
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

  public static function delete($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "DELETE FROM usuario WHERE id_usuario = :user_id"
    );
    $stmt->execute([":user_id" => $user_id]);
  }

  public static function getWishlist($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM wishlist WHERE id_usuario = :user_id"
    );
    $stmt->execute([":user_id" => $user_id]);
    $arr = [];
    $products = $stmt->fetchALL();

    foreach ($products as $product) {
      if (isset($product["id_hotel"])) {
        $stmt = DB::getInstance()->prepare(
          "SELECT * FROM hotel WHERE id_hotel = :hotel_id"
        );
        $stmt->execute([":hotel_id" => $product["id_hotel"]]);

        $hotel = $stmt->fetch();

        array_push($arr, $hotel);
      }
      if (isset($product["id_paquete"])) {
        $stmt = DB::getInstance()->prepare(
          "SELECT * FROM paquete WHERE id_paquete = :package_id"
        );
        $stmt->execute([":package_id" => $product["id_paquete"]]);
        $package = $stmt->fetch();
        
        array_push($arr, $package);
      }
    }
    return $arr;
  }

  public static function addWishlist($user_id, $hotel_id, $package_id)
  {
    if (isset($hotel_id)) {
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO wishlist(id_usuario, id_hotel) VALUES (:user_id, :hotel_id)"
      );
      $stmt->execute([":user_id" => $user_id, ":hotel_id" => $hotel_id]);
    } elseif (isset($package_id)) {
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO wishlist(id_usuario, id_paquete) VALUES (:user_id, :package_id)"
      );
      $stmt->execute([":user_id" => $user_id, ":package_id" => $package_id]);

    }
  }

  public static function addToCart($user_id, $hotel_id, $package_id, $quantity)
  {
    if (isset($hotel_id)) {
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO carrito(id_usuario, id_hotel, cantidad) VALUES (:user_id, :hotel_id, :quantity)"
      );
      $stmt->execute([
        ":user_id" => $user_id,
        ":hotel_id" => $hotel_id,
        ":quantity" => $quantity,
      ]);
    } elseif (isset($package_id)) {
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO carrito(id_usuario, id_paquete) VALUES (:user_id, :package_id)"
      );

      $stmt->execute([
        ":user_id" => $user_id,
        ":package_id" => $package_id,
      ]);
    }
  }

  public static function getCartHotels($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM carrito JOIN hotel ON carrito.id_hotel = hotel.id_hotel WHERE carrito.id_usuario = :user_id"
    );

    $stmt->execute([
      ":user_id" => $user_id,
    ]);

    return $stmt->fetchAll();
  }

  public static function getCartPackages($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT * FROM carrito JOIN paquete ON carrito.id_paquete = paquete.id_paquete WHERE carrito.id_usuario = :user_id"
    );

    $stmt->execute([
      ":user_id" => $user_id,
    ]);

    return $stmt->fetchAll();
  }

  public static function isHotelInCart($user_id, $hotel_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT COUNT(1) FROM carrito WHERE id_usuario = :user_id AND id_hotel = :hotel_id"
    );

    $stmt->execute([
      ":user_id" => $user_id,
      ":hotel_id" => $hotel_id,
    ]);

    $count = $stmt->fetchColumn();

    return $count > 0;
  }

  public static function isPackageInCart($user_id, $package_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT COUNT(1) FROM carrito WHERE id_usuario = :user_id AND id_paquete = :package_id"
    );

    $stmt->execute([
      ":user_id" => $user_id,
      ":package_id" => $package_id,
    ]);

    $count = $stmt->fetchColumn();

    return $count > 0;
  }

  public static function removeFromCart($user_id, $hotel_id, $package_id)
  {
    if (isset($hotel_id)) {
      $stmt = DB::getInstance()->prepare(
        "DELETE FROM carrito WHERE id_usuario = :user_id AND id_hotel = :hotel_id"
      );

      $stmt->execute([
        ":user_id" => $user_id,
        ":hotel_id" => $hotel_id,
      ]);
    } elseif (isset($package_id)) {
      $stmt = DB::getInstance()->prepare(
        "DELETE FROM carrito WHERE id_usuario = :user_id AND id_paquete = :package_id"
      );

      $stmt->execute([
        ":user_id" => $user_id,
        ":package_id" => $package_id,
      ]);
    }
  }

  public static function getCartItemCount($user_id)
  {
    $stmt = DB::getInstance()->prepare(
      "SELECT COUNT(1) FROM carrito WHERE id_usuario = :user_id"
    );

    $stmt->execute([
      ":user_id" => $user_id,
    ]);

    return $stmt->fetchColumn();
  }


  public static function comprar($user_id)
  {
    $hotels = self::getCartHotels($user_id);
    $packages = self::getCartPackages($user_id);

    foreach($hotels as &$hotel){
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO compra(id_usuario, id_hotel) VALUES (:user_id, :hotel_id)"
      );
      $stmt->execute([":user_id" => $user_id, ":hotel_id" => $hotel["id_hotel"]]);
    }
    foreach($packages as &$package){
      $stmt = DB::getInstance()->prepare(
        "INSERT INTO compra(id_usuario, id_paquete) VALUES (:user_id, :package_id)"
      );
      $stmt->execute([":user_id" => $user_id, ":package_id" => $hotel["id_paquete"]]);
    }
    $stmt = DB::getInstance()->prepare(
      "DELETE FROM carrito WHERE id_usuario = :user_id"
    );
    $stmt->execute([":user_id" => $user_id]);
  }

  public static function getCompraByUserIdAndItem($user_id, $item_id, $item_type)
  {
  $stmt = DB::getInstance()->prepare(
    "SELECT * FROM compra WHERE id_usuario = :user_id AND (:item_id = id_hotel OR :item_id = id_paquete)"
  );

  $stmt->execute([
    ":user_id" => $user_id,
    ":item_id" => $item_id
  ]);

  return $stmt->fetchAll();
  }


}