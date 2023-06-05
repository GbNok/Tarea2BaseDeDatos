<?php
require_once __DIR__ . "/../models/rating.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../core/index.php";

session_start();
SessionUtils::assertLoggedIn();

$user_id = $_SESSION["user"]["id"];
$page = "../views/user_profile_view.php";
$page_title = $_SESSION["user"]["name"];

$ratings = Rating::getRatings($user_id);
$wishlist = User::getWishlist($user_id);
$info = User::getInfo($user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id_to_delete = $_POST['user_id'];
    User::delete($user_id_to_delete);
    View::redirect("/login.php");
}


View::render('user_profile_view.php', [
    'page_title' => $_SESSION['user']['name'],
    'user_id' => $_SESSION['user']['id'],
    'ratings' => $ratings,
    'wishlist' => $wishlist,
    'info' => $info
]);