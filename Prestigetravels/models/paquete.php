<?php
require_once __DIR__ . "/../db.php";




class Paquete
{
    private function __construct()
    {
    }

    public static function getAll()
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM paquete"
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getInfo($paquete_id)
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM paquete WHERE id_paquete = :paquete_id"
        );
        $stmt->execute(['paquete_id' => $paquete_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getName($paquete_id)
    {
    $stmt = DB::getInstance()->prepare(
        "SELECT nombre FROM paquete WHERE id_paquete = :hotel_id"
    );
    $stmt->execute(['hotel_id' => $paquete_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nombre'];
    }
}