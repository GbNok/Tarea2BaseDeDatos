<?php
include "../core/view.php";
include "../models/user.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}
$user_id = $_SESSION["user"]["id"];
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET"){
    $wishlist = User::getWishlist($user_id);
    View::render("wishlist_view.php", [
        "page_hero" => "Wish List",
        "wishlist" => $wishlist]);
}elseif ($method === "POST"){
    // edit wishlist
}