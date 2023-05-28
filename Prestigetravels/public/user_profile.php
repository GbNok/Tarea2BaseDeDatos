<?php
require_once "../models/rating.php";
session_start();

if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$user_id = $_SESSION["user"]["id"];
$page = "../views/user_profile_view.php";
$page_title = $_SESSION["user"]["name"];

$ratings = Rating::getRatings($user_id);

require_once "../template/main.php";