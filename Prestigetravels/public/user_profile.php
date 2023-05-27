<?php

session_start();

if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$page = "../views/user_profile_view.php";
$page_title = $_SESSION["user"]["name"];

// $review = User::getReviews();
// $ratings = User::getRatings();

require_once "../template/main.php";