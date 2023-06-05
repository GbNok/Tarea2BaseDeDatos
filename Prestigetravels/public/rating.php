<?php
require_once __DIR__ . "/../core/index.php";
require_once __DIR__ . "/../models/rating.php";
require_once __DIR__ . "/../models/hotel.php";

session_start();
SessionUtils::assertLoggedIn();

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
    View::render('rating_view.php', [
        'page_title' => 'Rating',
        'hotels' => Hotel::getAll()
    ]);
}
if ($method === "POST") {
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $hotel_id = $_POST["hotel_id"];
    $user_id = $_SESSION["user"]["id"];

    Rating::addRating($user_id, $rating, $hotel_id);
    if (isset($comment)) {
        Rating::addComment($user_id, $comment, $hotel_id);
    }

    View::redirect("/user_profile.php");
}