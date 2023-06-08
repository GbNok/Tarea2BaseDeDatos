<?php
require_once __DIR__ . '/../../core/index.php';
require_once __DIR__ . '/../../models/cart.php';
require_once __DIR__ . '/../../models/user.php';

session_start();
SessionUtils::assertLoggedIn();

$method = $_SERVER["REQUEST_METHOD"];
if ($method === "GET") {
    $user_id = $_SESSION["user"]["id"];
    $hotels = User::getCartHotels($user_id);
    $packages = User::getCartPackages($user_id);

    $hotel_precio = Cart::getTotalCartHotel($user_id);
    $paquete_precio = Cart::getTotalCartPackage($user_id);
    $precio_total = Cart::getTotalCartPrice($user_id);
    $descuento = isset($_SESSION['discount']) ? $_SESSION['discount'] : 0;

    View::render('cart/cart_view.php', [
        'user_id' => $user_id,
        'hotels' => $hotels,
        'packages' => $packages,
        'precio_total_no_discount' => $precio_total,
        'precio_hoteles' => $hotel_precio,
        'precio_paquetes' => $paquete_precio,
        'precio_total' => $precio_total * (1 - $descuento),
        'descuento' => $descuento
    ]);
} elseif ($method === "POST") {
    $actual_method = $_POST['_method'];
    if ($actual_method === "POST") {

        $package_id = $_POST['package_id'];
        $hotel_id = $_POST['hotel_id'];
        $quantity = $_POST['quantity'];

        User::addToCart($_SESSION['user']['id'], $hotel_id, $package_id, $quantity);
        if (isset($hotel_id)){

            View::redirect("/hotel.php?id=$hotel_id");
        }elseif (isset($package_id)){
            View::redirect("/paquete.php?id=$package_id");

        }


    } elseif ($actual_method === "DELETE") {
        $hotel_id = $_POST["hotel_id"];
        $package_id = $_POST["package_id"];

        User::removeFromCart($_SESSION['user']['id'], $hotel_id, $package_id);
        if (isset($hotel_id)){
            View::redirect("/hotel.php?id=$hotel_id");
        }elseif (isset($package_id)){
            View::redirect("/paquete.php?id=$package_id");
        }
    }
}