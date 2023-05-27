<?php
require_once "../models/rating.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET"){
    $page = "../views/rating_view.php";
    require_once "../template/main.php";
}
if ($method === "POST"){
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $hotel_id = $_POST["hotel_id"];
    $user_id = $_SESSION["user"]["id"];

    Rating::addRating($user_id, $rating, $hotel_id);
    if (isset($comment)){
        Rating::addComment($user_id, $comment, $hotel_id);
    }

}
