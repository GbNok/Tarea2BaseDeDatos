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
$producto_id = $_GET['productoId'];

if ($method === "GET") {
    $product_info = Paquete::getInfo($producto_id);
    if (!$product_info) {
        View::render("not_found.php", ["message" => "Paquete no encontrado"]);
    }

    $is_package_in_cart = User::isPackageInCart($user_id, $producto_id);



    View::render("paquete_view.php", [
        'package_id' => $product_info["id_paquete"],
        'Paquetes_disponibles' => $product_info["paquetes_disponibles"],
        'name' => $product_info["nombre"],
        'price' => $product_info["precio"],
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

} elseif ($method === "POST") {
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $user_id = $_SESSION["user"]["id"];

    View::redirect("/paquete.php");
}

