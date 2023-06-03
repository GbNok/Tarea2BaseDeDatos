<?php

include "../models/hotel.php";
include "../core/view.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}


$method = $_SERVER["REQUEST_METHOD"];
$hotel_id = $_SESSION("hotel_id");

if ($method === "GET"){
    $hotel_info = Hotel::getInfo($hotel_id);

    View::render("hotel.php", [
        'page_hero' => $hotel_info["nombre"],
        'hotel_info' => $hotel_info]);

}elseif ($method === "POST"){
    // datos de reserva
    // add to cart

}