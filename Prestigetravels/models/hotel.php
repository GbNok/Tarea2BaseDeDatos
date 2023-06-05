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
            "SELECT * FROM hotel WHERE id_hotel = :hotel_id"
        );
        $stmt->execute(['hotel_id' => $hotel_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function getName($hotel_id)
    {
    $stmt = DB::getInstance()->prepare(
        "SELECT nombre FROM hotel WHERE id_hotel = :hotel_id"
    );
    $stmt->execute(['hotel_id' => $hotel_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nombre'];
    }

}