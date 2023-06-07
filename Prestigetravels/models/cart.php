<?php
require_once __DIR__ . "/product.php";
require_once __DIR__ . "/../db.php";

class Cart
{

    private function __construct()
    {
    }

    private static function getCartId($user_id)
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT id_carrito FROM carrito WHERE id_usuario = :user_id"
        );
        $stmt->execute([":user_id" => $user_id]);
        return $stmt->fetch()["id_carrito"];
    }

    public static function getAll($user_id)
    {
        $cart_id = self::getCartId($user_id);
        $products = Product::getProducts($cart_id);

        $productos = array();
        foreach ($products as &$producto) {
            // echo $producto;
            if (isset($producto["id_producto"])) {
                $stmt = DB::getInstance()->prepare(
                    "SELECT * FROM paquete WHERE id_paquete = :id_paquete"
                );

                $stmt->execute([":id_paquete" => $producto["id_producto"]]);
                $productos . array_push($stmt->fetchALL(PDO::FETCH_ASSOC));
            } elseif (isset($producto["id_reserva"])) {
                $stmt = DB::getInstance()->prepare(
                    "SELECT * FROM reserva WHERE id_reserva = :id_reserva"
                );
                $stmt->execute([":id_reserva" => $producto["id_reserva"]]);
                $hotel_id = $stmt->fetch()["id_hotel"];
                $stmt = DB::getInstance()->prepare(
                    "SELECT * FROM hotel WHERE id_hotel = :id_hotel"
                );

                $stmt->execute([":id_hotel" => $hotel_id]);

                $hotel = $stmt->fetch()["nombre"];
                array_push($productos, $hotel);
            }

        }
        return $productos;
    }


    public static function getTotalCartPrice($user_id)
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT SUM(hotel.precio * carrito.cantidad + paquete.precio * carrito.cantidad) FROM carrito JOIN hotel ON hotel.id_hotel = carrito.id_hotel JOIN paquete ON paquete.id_paquete = carrito.id_paquete WHERE id_usuario = :user_id"
        );
        $stmt->execute([":user_id" => $user_id]);
        return $stmt->fetchColumn();
    }
}