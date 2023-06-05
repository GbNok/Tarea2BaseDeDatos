<?php
require_once '../core/view.php';
require_once '../models/cart.php';

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET"){
    $user_id = $_SESSION["user"]["id"];
    $items = Cart::getAll($user_id);
    $precio_total = Cart::getTotalCartPrice($user_id); 
    $descuento = 0;
    if (isset($_SESSION['offer_accepted'])) {
        $precio_total *= 0.9;
        $descuento = 10;
    }

    View::render('cart_view.php', [
        'user_id' => $user_id,
        'items' => $items,
        'precio_total_no_discount' => Cart::getTotalCartPrice($user_id),
        'precio_total' => $precio_total,
        'descuento' => $descuento
    ]);



} elseif ($method === "POST"){
    // borrar
}

