<?php
require_once __DIR__ . "/../core/index.php";
require_once __DIR__ . "/../models/user.php";

session_start();
SessionUtils::assertLoggedIn();

$user_id = $_SESSION["user"]["id"];
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
    $wishlist = User::getWishlist($user_id);
    View::render("wishlist_view.php", [
        "page_hero" => "WishList",
        "wishlist" => $wishlist
    ]);


} elseif ($method === "POST" && $_POST['action'] === 'remove') {

    $remove_hotel = $_POST["hotel_id"];
    $remove_package = $_POST["package_id"];
    
    User::removeFromWishList($user_id, $remove_hotel, $remove_package);
    header("Location: wishlist.php");
    exit();
}




