<?php
require_once "../models/rating.php";
require_once "../core/view.php";
session_start();

if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$user_id = $_SESSION["user"]["id"];
$page = "../views/user_profile_view.php";
$page_title = $_SESSION["user"]["name"];

$ratings = Rating::getRatings($user_id);

View::render('user_profile_view.php', [
    'page_title' => $_SESSION['user']['name'],
    'user_id' => $_SESSION['user']['id'],
    'ratings' => $ratings
]);