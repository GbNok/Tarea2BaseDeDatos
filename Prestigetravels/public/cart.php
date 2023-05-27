<?php
require_once '../models/cart.php';

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}
$user_id = $_SESSION["user"]["id"];
$items = Cart::getAll($user_id);

$page = "../views/cart_view.php";
require_once "../template/main.php";
