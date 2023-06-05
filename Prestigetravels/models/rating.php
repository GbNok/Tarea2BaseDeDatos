<?php
require_once __DIR__ . "/../db.php";

class Rating
{
    private function __construct()
    {
    }

    public static function findRating($user_id, $hotel_id)
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM rating WHERE id_usuario = :user_id and id_hotel = :hotel_id"
        );
        $stmt->execute([":user_id" => $user_id, ":hotel_id" => $hotel_id]);
        return $stmt->fetch();
    }

    public static function addRating($user_id, $ratings, $hotel_id)
    {
        $stmt = DB::getInstance()->prepare(
            "INSERT INTO rating(id_usuario, ratingLimpieza, ratingServicio, ratingDecoracion, ratingCalidadCamas, ratingPromedio , id_hotel) VALUES (:user_id, :ratingL, :ratingS, :ratingD, :ratingCC, :ratingP, :hotel_id)"
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
    }

    public static function addComment($user_id, $comment, $hotel_id)
    {
        $stmt = DB::getInstance()->prepare(
            "UPDATE rating SET comentario = :comment WHERE id_usuario = :user_id and id_hotel = :hotel_id"
        );
        $stmt->execute([
            ":comment" => $comment,
            ":user_id" => $user_id,
            ":hotel_id" => $hotel_id
        ]);
    }

    public static function getRatings($user_id)
    {
        $stmt = DB::getInstance()->prepare(
            "SELECT * FROM rating WHERE id_usuario = :user_id"
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
}