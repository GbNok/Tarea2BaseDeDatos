<?php
session_start();
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../core/index.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
  View::render('login_view.php', [
    'page_title' => 'Login'
  ]);
} elseif ($method === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  [$user, $err] = User::login($email, $password);

  if (!empty($err)) {
    $error_message = $err;
    View::render('login_view.php', [
      'page_title' => 'Login',
      'error_message' => $err,
      'email' => $email
    ]);
    die();
  }

  $_SESSION['user'] = $user;
  $_SESSION['logged_in'] = true;

  View::redirect("/index.php");
}