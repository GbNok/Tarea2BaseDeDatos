<?php
session_start();

// TODO: Do search with these fields:
$start_date = $_GET['start_date'] ?? null;
$end_date = $_GET['end_date'] ?? null;
$city = $_GET['city'] ?? null;
$product_type = $_GET['product_type'] ?? null;
$search_term = $_GET['search_term'] ?? null;

// $highest_availability = Product::findHighestAvailability(..., limit: 4);
$highest_availability = [
  ['id' => 1, 'type' => 'package', 'name' => 'Praya dos osos', 'price' => '130', 'rating' => 3.2, 'available_qty' => 12],
  ['id' => 2, 'type' => 'hotel', 'name' => 'Magic hotel', 'price' => '100', 'rating' => 4.1, 'available_qty' => 10],
  ['id' => 3, 'type' => 'hotel', 'name' => 'Deadly Hotel', 'price' => '120', 'rating' => 4.7, 'available_qty' => 9],
  ['id' => 4, 'type' => 'package', 'name' => 'Caribbean pirate cruise', 'price' => '180', 'rating' => 3.9, 'available_qty' => 7],
];

// $highest_rated = Poduct::findHighestRated(..., limit: 10);
$highest_rated = [
  ['id' => 5, 'type' => 'package', 'name' => 'Praya dos osos', 'price' => '130', 'rating' => 4.9, 'available_qty' => 12],
  ['id' => 6, 'type' => 'hotel', 'name' => 'Magic hotel', 'price' => '100', 'rating' => 4.7, 'available_qty' => 10],
  ['id' => 7, 'type' => 'hotel', 'name' => 'Deadly Hotel', 'price' => '120', 'rating' => 4.5, 'available_qty' => 9],
  ['id' => 8, 'type' => 'package', 'name' => 'Caribbean pirate cruise', 'price' => '180', 'rating' => 4.1, 'available_qty' => 7],
  ['id' => 9, 'type' => 'package', 'name' => 'Caribbean pirate cruise', 'price' => '180', 'rating' => 4.0, 'available_qty' => 7],
  ['id' => 10, 'type' => 'package', 'name' => 'Praya dos osos', 'price' => '130', 'rating' => 3.9, 'available_qty' => 12],
  ['id' => 11, 'type' => 'hotel', 'name' => 'Magic hotel', 'price' => '100', 'rating' => 3.4, 'available_qty' => 10],
  ['id' => 12, 'type' => 'hotel', 'name' => 'Deadly Hotel', 'price' => '120', 'rating' => 3.2, 'available_qty' => 9],
  ['id' => 13, 'type' => 'package', 'name' => 'Caribbean pirate cruise', 'price' => '180', 'rating' => 2.7, 'available_qty' => 7],
  ['id' => 14, 'type' => 'package', 'name' => 'Caribbean pirate cruise', 'price' => '180', 'rating' => 2.2, 'available_qty' => 7],
];

$page = "../views/main_page/index_view.php";
$page_hero = "Hoteles & Paquetes";
$page_hero_subtitle = "Encuentra tus vacaciones soñadas";
require_once "../template/main.php";