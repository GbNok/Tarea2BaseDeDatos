<?php
require_once "../db.php";

class Product {
    private function __construct() {}

    public static function getProducts($cart_id){
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM producto WHERE id_carrito = :cart_id"
        );
        $stmt->execute([":cart_id" => $cart_id]);
        return $stmt->fetchALL();
    } 

    public static function getPackages($product){
        
    }
}