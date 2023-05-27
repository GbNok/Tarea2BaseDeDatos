<?php
session_start();
require_once "../models/user.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET"){
    $page_title = 'Login';
    $page = "../views/signup_view.php";
    require_once "../template/main.php";
}elseif ($method === "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birth_date = $_POST["birth_date"];
    $errors = [];

    if (User::existsName($name)) {
      $errors['name'] = 'El nombre ya existe. Porfavor elige otro';

    }

    if (User::existsEmail($email)) {
      $errors['email'] = 'Correo ya ocupado. Porfavor elige otro';
    }

    if (strlen($password) < 4) {
      $errors['password'] = "La contraseña no es lo suficientemente larga (12 o mas caracteres)";
    }

    if (empty($birth_date)){
        $errors["birth_date"] = "Fecha de nacimiento no valida";
    }

    if (!empty($errors)){
        $page = "../views/signup_view.php";
        require_once "../template/main.php";
        die();
    }
    // echo $birth_date;
    User::create($name, $email, $password, $birth_date);
    
    header('Location: /login.php');
}