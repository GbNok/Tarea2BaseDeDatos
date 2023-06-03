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
}