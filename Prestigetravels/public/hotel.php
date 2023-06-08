<?php
require_once __DIR__ . "/../core/index.php";
require_once __DIR__ . "/../models/hotel.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../models/rating.php";

session_start();
SessionUtils::assertLoggedIn();

$user_id = $_SESSION['user']['id'];
$method = $_SERVER["REQUEST_METHOD"];
$hotel_id = $_GET['id'];

if ($method === "GET") {
    $hotel_info = Hotel::getInfo($hotel_id);
    $rating = Rating::findRating($user_id, $hotel_id, null);
    if (!$hotel_info) {
        View::render("not_found.php", ["message" => "Hotel no encontrado"]);
    }
    $is_hotel_in_cart = User::isHotelInCart($user_id, $hotel_id);
    $it_was_bought = User::getPurchase($user_id, $hotel_id, "hotel");

    View::render("hotel_view.php", [
        'hotel_id' => $hotel_id,
        'name_hotel' => $hotel_info["nombre"],
        'precio_noche' => $hotel_info["precio"],
        'ciudad' => $hotel_info["ciudad"],
        'habitaciones_totales' => $hotel_info["habitaciones_totales"],
        'habitaciones_disponibles' => $hotel_info["habitaciones_disponibles"],
        'estacionamiento' => $hotel_info["estacionamiento"],
        'piscina' => $hotel_info["piscina"],
        'lavanderia' => $hotel_info["lavanderia"],
        'pet_friendly' => $hotel_info["pet_friendly"],
        'servicio_desayuno' => $hotel_info["servicio_desayuno"],
        'is_hotel_in_cart' => $is_hotel_in_cart,
        'it_was_bought' => $it_was_bought,
        'rating' =>  $rating
    ]);

} elseif ($method === "POST"&& $_POST['action'] === 'Rating') {
    $comment = $_POST["comment"];
    $ratingLimpieza = $_POST["ratingLimpieza"];
    $ratingServicio = $_POST["ratingServicio"];
    $ratingDecoracion = $_POST["ratingDecoracion"];
    $ratingCalidadCamas = $_POST["ratingCalidadCamas"];
    
    $rating = ($ratingLimpieza + $ratingServicio + $ratingDecoracion + $ratingCalidadCamas) / 4;
    
    $ratings = [
        "limpieza" => $ratingLimpieza, 
        "servicio" => $ratingServicio,
        "decoracion" => $ratingDecoracion,
        "calidadCamas" => $ratingCalidadCamas,
        "prom" => $rating];

    Rating::addRating($user_id, $ratings, $hotel_id, null);
    if (isset($comment)) {
        Rating::addComment($user_id, $comment, $hotel_id, null);
    }

    View::redirect("/hotel.php?id=$hotel_id");




} elseif ($method === "POST"&& $_POST['action'] === 'wishlist_add') {
    
    $hotel_id = $_POST["hotel_id"];
    User::addWishlist($user_id, $hotel_id, NULL);
    View::redirect("/hotel.php?id=$hotel_id");
} elseif ($method === "POST"&& $_POST['action'] === 'Rating_delete') {
    
    $hotel_id = $_POST["idhotel"];
    Rating::deleteHotelRating($user_id,$hotel_id);
    View::redirect("/hotel.php?id=$hotel_id");
} 