<?php
require_once __DIR__."/../db.php";

class Product {
    private function __construct() {}

    public static function getProducts($cart_id){
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM producto WHERE id_carrito = :cart_id"
        );
        $stmt->execute([":cart_id" => $cart_id]);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    } 

    public static function getPackages($product){
        
    }

    public static function newProduct($res_id, $cart_id){
        $stmt = DB::getInstance()->prepare(
            "INSERT INTO producto(id_reserva, id_carrito) VALUES (:res_id, :cart_id)"
        );
        $stmt->execute([":res_id" => $res_id, ":cart_id" => $cart_id]);
    }

    public static function findHighestAvailability()
    {
        $stmt = DB::getInstance()->prepare("
            SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty
            FROM hotel
            UNION ALL
            SELECT id_paquete AS id, 'paquete' AS tipo, nombre, precio, rating, paquetes_disponibles AS available_qty
            FROM paquete
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        usort($result, function($a, $b) {
            return $b['available_qty'] - $a['available_qty'];
        });
    
        return $result;
    }

    public static function findHighest_rated()
    {
        $stmt = DB::getInstance()->prepare("
        (SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty
        FROM hotel
        ORDER BY rating DESC
        LIMIT 10)
        UNION ALL
        (SELECT id_paquete AS id, 'paquete' AS tipo, nombre, precio, rating, paquetes_disponibles AS available_qty
        FROM paquete
        ORDER BY rating DESC
        LIMIT 10)
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }
    

}