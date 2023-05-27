<?php
session_start();
require_once "../models/user.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
  $page_title = 'Login';
  $page = "../views/login_view.php";
  require_once "../template/main.php";
} elseif ($method === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  
  [$user, $err] = User::login($email, $password);

  if (!empty($err)) {
    $error_message = $err;
    $page = "../views/login_view.php";
    require_once "../template/main.php";
    die();
  }

  $_SESSION['user'] = $user;
  $_SESSION['logged_in'] = true;

  header('Location: /index.php');
}