<?php
require_once "../db.php";

class Hotel {
    private function __construct(){}

    public static function getHotels(){
        $stmt = DB::getInstance()->prepare(
            "SELECT nombre FROM hotel"
        );
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}