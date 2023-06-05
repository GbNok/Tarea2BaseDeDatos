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
        "page_hero" => "Wish List",
        "wishlist" => $wishlist
    ]);
} elseif ($method === "POST") {
    // edit wishlist
}