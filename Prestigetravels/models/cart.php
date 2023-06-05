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
            $productos.array_push($stmt->fetchALL(PDO::FETCH_ASSOC));
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
            
            $hotel = $stmt->fetch()["nombre"];
            array_push($productos, $hotel);
        } 

      }
      return $productos;
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
        $res_id = $stmt->fetch()["id_reserva"];

        $product = Product::newProduct($res_id, $cart_id);
        //update cart info
    }

    
    public static function getTotalCartPrice($user_id) {
        $stmt = DB::getInstance()->prepare(
            "SELECT SUM(precio) AS total_price FROM carrito WHERE id_usuario = :user_id"
        );
        $stmt->execute([":user_id" => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['total_price'];
}



}