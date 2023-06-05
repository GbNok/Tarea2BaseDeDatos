<?php
require_once "../db.php";

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
    public static function findHighestAvailability(){
        $stmt = DB::getInstance()->prepare("
            SELECT id_hotel AS id, nombre, habitaciones_disponibles AS cantidad
            FROM hotel
            UNION ALL
            SELECT id_paquete AS id, nombre, cantidad
            FROM paquete
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        usort($result, function($a, $b) {
            return $b['cantidad'] - $a['cantidad'];
        });
        return array_slice($result, 0, 4);
    }
    public static function findHighestRatedHotels(){
        $stmt = DB::getInstance()->prepare("
            SELECT id_hotel AS id, nombre, rating
            FROM hotel
            ORDER BY rating DESC
            LIMIT 10
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findHighestRatedPackages(){
        $stmt = DB::getInstance()->prepare("
            SELECT id_paquete AS id, nombre, rating
            FROM paquete
            ORDER BY rating DESC
            LIMIT 10
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}