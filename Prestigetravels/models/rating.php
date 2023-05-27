<?php
require_once "../db.php";

class Rating{
    private function __construct(){}

    public static function addRating($user_id, $rating, $hotel_id){
        $stmt = DB::getInstance()->prepare(
            "INSERT INTO rating (id_usuario, rating, id_hotel) VALUES (:user_id, :rating, :hotel_id)"
        );
        $stmt->execute([
            ":user_id" => $user_id,
            ":rating" => $rating,
            ":hotel_id" => $hotel_id]);
    }

    public static function addComment($user_id, $comment, $hotel_id){
        $stmt = DB::getInstance()->prepare(
            "UPDATE rating SET comentario = :comment WHERE id_usuario = :user_id and id_hotel = :hotel_id"
        );
        $stmt->execute([
            ":comment" => $comment,
            ":user_id" => $user_id,
            ":hotel_id" => $hotel_id
        ]);
    }
}

