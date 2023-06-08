<?php
require_once __DIR__ . "/../db.php";

class Rating
{
    private function __construct()
    {
    }

    public static function findRating($user_id, $hotel_id, $package_id)
    {
        if (isset($hotel_id)){
            $stmt = DB::getInstance()->prepare(
                "SELECT * FROM ratingHotel WHERE id_usuario = :user_id and id_hotel = :hotel_id"
            );
            $stmt->execute([":user_id" => $user_id, ":hotel_id" => $hotel_id]);
            return $stmt->fetch();
        }elseif (isset($package_id)){
            $stmt = DB::getInstance()->prepare(
                "SELECT * FROM ratingPaquete WHERE id_usuario = :user_id and id_paquete = :package_id"
            );
            $stmt->execute([":user_id" => $user_id, ":package_id" => $package_id]);
            return $stmt->fetch();
        }
    }

    public static function addRating($user_id, $ratings, $hotel_id, $package_id)
    {
        if (isset($hotel_id)){
            $stmt = DB::getInstance()->prepare(
                "INSERT INTO ratingHotel(id_usuario, ratingLimpieza, ratingServicio, ratingDecoracion, ratingCalidadCamas, ratingPromedio , id_hotel) VALUES (:user_id, :ratingL, :ratingS, :ratingD, :ratingCC, :ratingP, :hotel_id)"
            );
            $stmt->execute([
                ":user_id" => $user_id,
                ":ratingL" => $ratings["limpieza"],
                ":ratingS" => $ratings["servicio"],
                ":ratingD" => $ratings["decoracion"],
                ":ratingCC" => $ratings["calidadCamas"],
                ":ratingP" => $ratings["prom"],
                ":hotel_id" => $hotel_id
            ]);
        } elseif (isset($package_id)){
            $stmt = DB::getInstance()->prepare(
                "INSERT INTO ratingPaquete(id_usuario, ratingHoteles, ratingTransporte, ratingServicio, ratingPrecioCalidad, ratingPromedio , id_paquete) VALUES (:user_id, :ratingH, :ratingT, :ratingS, :ratingPC, :ratingP, :package_id)"
            );
            $stmt->execute([
                ":user_id" => $user_id,
                ":ratingH" => $ratings["hoteles"],
                ":ratingT" => $ratings["transporte"],
                ":ratingS" => $ratings["servicio"],
                ":ratingPC" => $ratings["precio_calidad"],
                ":ratingP" => $ratings["prom"],
                ":package_id" => $package_id
            ]);
        }
    }

    public static function addComment($user_id, $comment, $hotel_id, $package_id)
    {
        if (isset($hotel_id)){
            $stmt = DB::getInstance()->prepare(
                "UPDATE ratingHotel SET comentario = :comment WHERE id_usuario = :user_id and id_hotel = :hotel_id"
            );
            $stmt->execute([
                ":comment" => $comment,
                ":user_id" => $user_id,
                ":hotel_id" => $hotel_id
            ]);
        }elseif(isset($package_id)){
            $stmt = DB::getInstance()->prepare(
                "UPDATE ratingPaquete SET comentario = :comment WHERE id_usuario = :user_id and id_paquete = :package_id"
            );
            $stmt->execute([
                ":comment" => $comment,
                ":user_id" => $user_id,
                ":package_id" => $package_id
            ]);
        }
    }

    public static function getRatings($user_id) //fix
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM ratingHotel WHERE id_usuario = :user_id" // add from ratingPaquetes
        );
        $stmt->execute([":user_id" => $user_id]);

        $all_ratings = $stmt->fetchALL();
        $rev = array();
        foreach ($all_ratings as &$rating) {
            $stmt = DB::getInstance()->prepare(
                "SELECT nombre FROM hotel WHERE id_hotel = :hotel_id"
            );
            $stmt->execute([":hotel_id" => $rating["id_hotel"]]);
            $hotel = $stmt->fetch()["nombre"];

            array_push($rev, [$hotel, $rating]);
        }
        return $rev;
    }

    public static function getHotelRatings($user_id) {
        $stmt = DB::getInstance()->prepare(
            "SELECT r.*, h.nombre AS nombre_hotel
            FROM ratingHotel r
            INNER JOIN hotel h ON r.id_hotel = h.id_hotel
            INNER JOIN usuario u ON r.id_usuario = u.id_usuario
            WHERE u.id_usuario = :user_id"
        );
        $stmt->execute([":user_id" => $user_id]);
    
        return $stmt->fetchAll();
    }
    
    public static function getPaqueteRatings($user_id) {
        $stmt = DB::getInstance()->prepare(
            "SELECT r.*, p.nombre AS nombre_paquete
            FROM ratingPaquete r
            INNER JOIN paquete p ON r.id_paquete = p.id_paquete
            INNER JOIN usuario u ON r.id_usuario = u.id_usuario
            WHERE u.id_usuario = :user_id"
        );
        $stmt->execute([":user_id" => $user_id]);
    
        return $stmt->fetchAll();
    }

    public static function deleteHotelRating($user_id, $hotel_id) {
        $stmt = DB::getInstance()->prepare(
            "DELETE FROM ratingHotel
            WHERE id_usuario = :user_id AND id_hotel = :hotel_id"
        );
        $stmt->execute([
            ":user_id" => $user_id,
            ":hotel_id" => $hotel_id
        ]);
    
        return $stmt->rowCount() > 0;
        }
    
    public static function deletePaqueteRating($user_id, $paquete_id) {
        $stmt = DB::getInstance()->prepare(
            "DELETE FROM ratingPaquete
            WHERE id_usuario = :user_id AND id_paquete = :paquete_id"
        );
        $stmt->execute([
            ":user_id" => $user_id,
            ":paquete_id" => $paquete_id
        ]);
    
        return $stmt->rowCount() > 0;
        }
    
    
    
    
        
}