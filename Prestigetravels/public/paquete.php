<?php 
include "../models/paquete.php";
include "../core/view.php";

session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$method = $_SERVER["REQUEST_METHOD"];
$producto_id = $_GET['productoId'];

if ($method === "GET"){
    $product_info = Paquete::getInfo($producto_id);

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

} elseif ($method === "POST"){
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];
    $user_id = $_SESSION["user"]["id"];

    header("location: /paquete.php");
}