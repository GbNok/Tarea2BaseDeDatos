<?php
session_start();
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../core/index.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET") {
  $page_title = 'Login';
  View::render('signup_view.php');
} elseif ($method === "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $birth_date = $_POST["birth_date"];
  $errors = [];

  if (User::existsName($name)) {
    $errors['name'] = 'El nombre ya existe. Porfavor elige otro';

  }

  if (empty($email)) {
    $errors['email'] = 'Correo es requierido';
  } else if (User::existsEmail($email)) {
    $errors['email'] = 'Correo ya ocupado. Porfavor elige otro';
  }

  if (strlen($password) < 4) {
    $errors['password'] = "La contraseña no es lo suficientemente larga (12 o mas caracteres)";
  }

  if (empty($birth_date)) {
    $errors["birth_date"] = "Fecha de nacimiento no valida";
  }

  if (!empty($errors)) {
    View::render('signup_view.php', [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'birth_date' => $birth_date,
      'errors' => $errors
    ]);
  }
  User::create($name, $email, $password, $birth_date);

  View::redirect('/login.php');
}