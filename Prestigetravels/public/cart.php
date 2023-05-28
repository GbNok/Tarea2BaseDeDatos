<?php
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
    
    $page = "../views/cart_view.php";
    require_once "../template/main.php";

}elseif (method === "POST"){
    // borrar
}

