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
    $precio_total = Cart::getTotalCartPrice($user_id);
    $descuento = isset($_SESSION['discount']) ? $_SESSION['discount'] : 0;

    View::render('cart/cart_view.php', [
        'user_id' => $user_id,
        'hotels' => $hotels,
        'precio_total_no_discount' => $precio_total,
        'precio_total' => $precio_total * (1 - $descuento),
        'descuento' => $descuento
    ]);
} elseif ($method === "POST") {
    $actual_method = $_POST['_method'];
    if ($actual_method === "POST") {

        $hotel_id = $_POST['hotel_id'];
        $quantity = $_POST['quantity'];

        User::addToCart($_SESSION['user']['id'], $hotel_id, null, $quantity);

        View::redirect("/hotel.php?id=$hotel_id");
    } elseif ($actual_method === "DELETE") {
        $hotel_id = $_POST["hotel_id"];

        User::removeFromCart($_SESSION['user']['id'], $hotel_id, null);

        View::redirect("/hotel.php?id=$hotel_id");
    }
}