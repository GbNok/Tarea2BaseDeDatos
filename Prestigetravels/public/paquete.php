<?php
require_once __DIR__ . "/../models/paquete.php";
require_once __DIR__ . "/../core/index.php";
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../models/rating.php";
require_once __DIR__ . "/../models/hotel.php";
session_start();
SessionUtils::assertLoggedIn();

$user_id = $_SESSION["user"]["id"];
$method = $_SERVER["REQUEST_METHOD"];
$package_id = $_GET['id'];

if ($method === "GET") {
    $product_info = Paquete::getInfo($package_id);
    $rating = Rating::findRating($user_id, $package_id);
    if (!$product_info) {
        View::render("not_found.php", ["message" => "Paquete no encontrado"]);
    }

    $is_package_in_cart = User::isPackageInCart($user_id, $package_id);
    $it_was_bought = User::getPurchase($user_id, $package_id, "paquete");


    View::render("paquete_view.php", [
        'package_id' => $product_info["id_paquete"],
        'Paquetes_disponibles' => $product_info["paquetes_disponibles"],
        'name' => $product_info["nombre"],
        'price' => $product_info["precio"],
        'it_was_bought' => $it_was_bought,
        'is_package_in_cart' => $is_package_in_cart,
        'limite_personas' => $product_info["limite_personas"],
        'aerolinea_ida' => $product_info["aerolinea_ida"],
        'aerolinea_vuelta' => $product_info["aerolinea_vuelta"],
        'ciudad1' => $product_info["ciudad1"],
        'ciudad2' => $product_info["ciudad2"],
        'ciudad3' => $product_info["ciudad3"],
        'name_hotel_1' => Hotel::getName($product_info["hospedaje1"]),
        'name_hotel_2' => Hotel::getName($product_info["hospedaje2"]),
        'name_hotel_3' => Hotel::getName($product_info["hospedaje3"]),
        'hospedaje1' => $product_info["hospedaje1"],
        'hospedaje2' => $product_info["hospedaje2"],
        'hospedaje3' => $product_info["hospedaje3"]

    ]);

} elseif ($method === "POST"&& $_POST['action'] === 'Rating') {
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $user_id = $_SESSION["user"]["id"];


    $ratingPrecioCalidad = $_POST["ratingPrecioCalidad"];
    $ratingServicio = $_POST["ratingServicio"];
    $ratingTransporte = $_POST["ratingTransporte"];
    $ratingCalidad = $_POST["ratingCalidad"];
    
    $rating = ($ratingPrecioCalidad + $ratingServicio + $ratingTransporte + $ratingCalidad) / 4;
    
    $ratings = [
        "precioCalidad" => $ratingPrecioCalidad,
        "servicio" => $ratingServicio,
        "transporte" => $ratingTransporte,
        "calidad" => $ratingCalidad,
        "prom" => $rating
    ];


    View::redirect("/paquete.php?id=$package_id");

} elseif ($method === "POST"&& $_POST['action'] === 'wishlist_add') {
    
    $package_id = $_POST["package_id"];
    User::addWishlist($user_id, NULL, $package_id);
    View::redirect("/paquete.php?id=$package_id");
}

