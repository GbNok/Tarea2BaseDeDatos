<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: /login.php");
    die();
}

$page = "../views/index_view.php";
$page_title = "Home";

// $hotels = Hotel::getTopHotels();
// $packeges = Package::getTopPackage();

require_once "../template/main.php";