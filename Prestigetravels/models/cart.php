<?php
include "product.php";

class Cart {

  private function __construct() {}

  private static function getCartId($user_id){
    $stmt = DB::getInstance(
        "SELECT id_carrito FROM carrito WHERE id_usuario = :user_id"
    );
    $stmt->execute([":user_id" => $user_id]);
    return $stmt->fetch();
  }

  public static function getAll($user_id){
      $cart_id = self::getCartId($user_id);  
      $products = Product::getProducts($cart_id);
      
      $productos = []; 
      foreach($stmt2 as &$producto){
        if (isset($producto["id_producto"])){
            $stmt3 = DB::getInstance()->prepare(
                "SELECT * FROM paquete WHERE id_paquete = :id_paquete"
            );
            $stmt3->execute([":id_paquete" => $producto["id_producto"]]);
            $productos.array_push($stmt3)
        }elseif (isset($producto["id_reserva"])){

        } 

      }
  }

}