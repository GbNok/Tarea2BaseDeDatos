<?php
require_once __DIR__."/../db.php";

class Product {
    private function __construct() {}

    public static function getHotels(){
        $stmt = DB::getInstance()->prepare(
            "SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty FROM hotel"
        );
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // usort($result, function($a, $b) {
        //     return $b['available_qty'] - $a['available_qty'];
        // });
    
        return $result;
    }

    public static function getPackages()
    {
    $stmt = DB::getInstance()->prepare(
        "SELECT p.id_paquete AS id, 'paquete' AS tipo, p.nombre, p.precio, p.rating, p.paquetes_disponibles AS available_qty, p.fecha_ida, p.fecha_vuelta
        FROM paquete AS p"
    );
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
    }
    
    public static function getPackagesbydate($startDate,$endDate)
    {
    $stmt = DB::getInstance()->prepare(
        "SELECT id_paquete AS id, 'paquete' AS tipo, nombre, precio, rating, paquetes_disponibles AS available_qty, fecha_ida, fecha_vuelta
        FROM paquete
        WHERE fecha_ida >= :start_date and fecha_vuelta <= :end_date"
    );
    $stmt->bindValue(':start_date', $startDate);
    $stmt->bindValue(':end_date', $endDate);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
    }



    public static function newProduct($res_id, $cart_id){
        $stmt = DB::getInstance()->prepare(
            "INSERT INTO producto(id_reserva, id_carrito) VALUES (:res_id, :cart_id)"
        );
        $stmt->execute([":res_id" => $res_id, ":cart_id" => $cart_id]);
    }

    public static function findHighestAvailability()
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty
            FROM hotel
            UNION ALL
            SELECT id_paquete AS id, 'paquete' AS tipo, nombre, precio, rating, paquetes_disponibles AS available_qty
            FROM paquete"
            );
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        usort($result, function($a, $b) {
            return $b['available_qty'] - $a['available_qty'];
        });
    
        return $result;
    }

    public static function findAll()
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT h.id_hotel AS id, 'hotel' AS tipo, h.nombre, h.precio, h.rating, h.habitaciones_disponibles AS available_qty, h.ciudad
            FROM hotel AS h
            UNION ALL
            SELECT p.id_paquete AS id, 'paquete' AS tipo, p.nombre, p.precio, p.rating, p.paquetes_disponibles AS available_qty, CONCAT(p.ciudad1, ', ', p.ciudad2, ', ', p.ciudad3) AS ciudad
            FROM paquete AS p"
        );
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
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
    

    public static function findPerPrice($minPrice, $maxPrice)
{
    $stmt = DB::getInstance()->prepare(
        "SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty
        FROM hotel
        WHERE precio >= :min_price AND precio <= :max_price
        UNION ALL
        SELECT id_paquete AS id, 'paquete' AS tipo, nombre, precio, rating, paquetes_disponibles AS available_qty
        FROM paquete
        WHERE precio >= :min_price AND precio <= :max_price"
    );
    $stmt->bindParam(':min_price', $minPrice, PDO::PARAM_INT);
    $stmt->bindParam(':max_price', $maxPrice, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


}