<?php

include "../models/hotel.php";
include "../models/rating.php";
include "../core/view.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}


$method = $_SERVER["REQUEST_METHOD"];
$hotel_id = $_GET['productoId'];

if ($method === "GET"){
    $hotel_info = Hotel::getInfo($hotel_id);

    View::render("hotel_view.php", [
        'name_hotel' => $hotel_info["nombre"],
        'precio_noche' => $hotel_info["precio_noche"],
        'ciudad' => $hotel_info["ciudad"],
        'habitaciones_totales' => $hotel_info["habitaciones_totales"],
        'habitaciones_disponibles' => $hotel_info["habitaciones_disponibles"],
        'estacionamiento' => $hotel_info["estacionamiento"],
        'piscina' => $hotel_info["piscina"],
        'lavanderia' => $hotel_info["lavanderia"],
        'pet_friendly' => $hotel_info["pet_friendly"],
        'servicio_desayuno' => $hotel_info["servicio_desayuno"]
    ]);

}elseif ($method === "POST"){
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $user_id = $_SESSION["user"]["id"];

    Rating::addRating($user_id, $rating, $hotel_id);
    if (isset($comment)){
        Rating::addComment($user_id, $comment, $hotel_id);
    }

    header("location: /hotel.php");

}