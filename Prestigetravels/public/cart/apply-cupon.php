<?php
require_once __DIR__ . '/../../core/index.php';

session_start();
SessionUtils::assertLoggedIn();

$method = $_SERVER["REQUEST_METHOD"];
if ($method === "POST") {
  $cupon = $_POST['cupon'];
  if ($cupon === "BD2023") {
    $_SESSION['discount'] = 0.1; // 10%
    $_SESSION['success_message'] = "Cupón aplicado! Disfruta tu 10% de descuento";
  } else {
    $_SESSION['error_message'] = 'Cupón inválido';
    unset($_SESSION['discount']);
  }
}

View::redirect('/cart');