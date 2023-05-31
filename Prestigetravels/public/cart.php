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
    
    View::render('cart_view.php', [
        'user_id' => $user_id,
        'items' => $items
    ]);
} elseif ($method === "POST"){
    // borrar
}

