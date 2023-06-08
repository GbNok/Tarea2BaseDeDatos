<?php
require_once __DIR__ . "/../db.php";

class Hotel
{
    private function __construct()
    {
    }

    public static function getAll()
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM hotel"
        );
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function getInfo($hotel_id)
    {
        $stmt = DB::getInstance()->prepare(
            "CALL getHotel(:hotel_id)"
        );
        $stmt->execute(['hotel_id' => $hotel_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function getName($hotel_id)
    {
    $stmt = DB::getInstance()->prepare(
        "CALL getHotel(:hotel_id)"
    );
    $stmt->execute(['hotel_id' => $hotel_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nombre'];
    }

    public static function getCities(){
        $stmt = DB::getInstance()->prepare(
            "SELECT DISTINCT ciudad FROM hotel"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getHotelsInCity($city){
        $stmt = DB::getInstance()->prepare(
            "SELECT id_hotel AS id, 'hotel' AS tipo, nombre, precio, rating, habitaciones_disponibles AS available_qty FROM hotel WHERE ciudad = :city"
        );
        $stmt->execute([":city" => $city]);
        return $stmt->fetchAll();
    }   
}

