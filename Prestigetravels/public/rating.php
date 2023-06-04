<?php
require_once "../core/view.php";
require_once "../models/rating.php";
require_once "../models/hotel.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$method = $_SERVER["REQUEST_METHOD"];
    
if ($method === "GET"){
    View::render('rating_view.php', [
        'page_title' => 'Rating',
        'hotels' => Hotel::getAll()
    ]);
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

    header("location: /user_profile.php");
}