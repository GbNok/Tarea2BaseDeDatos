<?php
require_once __DIR__ . "/../models/paquete.php";
require_once __DIR__ . "/../core/index.php";

session_start();
SessionUtils::assertLoggedIn();

$method = $_SERVER["REQUEST_METHOD"];
$producto_id = $_GET['productoId'];

if ($method === "GET") {
    $product_info = Paquete::getInfo($producto_id);
    if (!$product_info) {
        View::render("not_found.php", ["message" => "Paquete no encontrado"]);
    }

    View::render("paquete_view.php", [
        'name' => $product_info["nombre"],
        'aerolinea_ida' => $product_info["aerolinea_ida"],
        'ciudad1' => $product_info["ciudad1"],
        'ciudad2' => $product_info["ciudad2"],
        'ciudad3' => $product_info["ciudad3"],
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