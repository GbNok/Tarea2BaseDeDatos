<?php
require_once "../db.php";

class Hotel {
    private function __construct(){}

    public static function getAll(){
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM hotel"
        );
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function addToCart($user_id, $hotel_id){ //TODO add reservation info to parameters
        $cart_id = Cart::getCartId($user_id)["id_carrito"];
        $stmt = DB::getInstance()->prepare(
            "INSERT INTO reserva(id_hotel) VALUES (:hotel_id)"  //TODO add information to reservation
        );
        $stmt->execute([":hotel_id" => $hotel_id]);
        
        $stmt = DB::getInstance()->prepare(
            "SELECT LAST_INSERT_ID();"  
        );
        $stmt->execute();
        $res_id = $stmt->fetch();
    }
}