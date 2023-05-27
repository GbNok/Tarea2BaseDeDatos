<?php
require_once "product.php";
require_once "../db.php";

class Cart {

  private function __construct() {}

  private static function getCartId($user_id){
    $stmt = DB::getInstance()->prepare(
        "SELECT id_carrito FROM carrito WHERE id_usuario = :user_id"
    );
    $stmt->execute([":user_id" => $user_id]);
    return $stmt->fetch()["id_carrito"];
  }

  public static function getAll($user_id){
      $cart_id = self::getCartId($user_id);  
      $products = Product::getProducts($cart_id);
      
      $productos = array(); 
      foreach($products as &$producto){
        // echo $producto;
        if (isset($producto["id_producto"])){
            $stmt = DB::getInstance()->prepare(
                "SELECT * FROM paquete WHERE id_paquete = :id_paquete"
            );

            $stmt->execute([":id_paquete" => $producto["id_producto"]]);
            $productos.array_push($stmt->fetch());
        } elseif (isset($producto["id_reserva"])){
            $stmt = DB::getInstance()->prepare(
                "SELECT * FROM reserva WHERE id_reserva = :id_reserva"
            );
            $stmt->execute([":id_reserva" => $producto["id_reserva"]]);
            $hotel_id = $stmt->fetch()["id_hotel"];
            $stmt = DB::getInstance()->prepare(
                "SELECT * FROM hotel WHERE id_hotel = :id_hotel"
            );    

            $stmt->execute([":id_hotel" => $hotel_id]);
            echo $stmt->fetch()["nombre"];
            $productos.array_push($stmt->fetch());
        } 

      }
      return $productos;
  }

}