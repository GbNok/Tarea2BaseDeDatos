<?php
require_once '../core/index.php';
require_once __DIR__ . "/../models/user.php";
require_once __DIR__ . "/../models/hotel.php";
require_once __DIR__ . "/../models/product.php";

session_start();

// TODO: Do search with these fields:
$start_date = $_GET['start_date'] ?? null;
$end_date = $_GET['end_date'] ?? null;
$city = $_GET['city'] ?? null;
$product_type = $_GET['product_type'] ?? null;
$search_term = $_GET['search_term'] ?? null;
$min_price = $_GET['min_price'] ?? null;
$max_price = $_GET['max_price'] ?? null;
$min_rating = $_GET['min_rating'] ?? null;
$all = Product::findAll();



$method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["user"]["id"];

if (!isset($product_type) || $product_type == "hotel_and_packages") {
  $highest_availability = Product::findHighestAvailability();
  $highest_rated = Product::findHighest_rated();
} elseif (isset($product_type)) {
  if ($product_type === "hotels") {
      $highest_availability = Product::getHotels();
      $highest_rated = $highest_availability;
  } elseif ($product_type === "packages") {
      $highest_availability = Product::getPackages();
      $highest_rated = $highest_availability;
  }
}

if (isset($start_date) && isset($end_date)) {
  $highest_availability = Product::getPackagesbydate($start_date,$end_date);
  $highest_rated = $highest_availability;
  $all = $highest_availability;
}


if (isset($min_price) || isset($max_price)) {
      $highest_availability = $all;
      
      $highest_availability = array_filter($highest_availability, function ($product) use ($min_price, $max_price) {
          return $product['precio'] >= $min_price && $product['precio'] <= $max_price;
      });
  $highest_rated = $highest_availability;
  $all = $highest_availability;
}

if (isset($search_term)) {
  $highest_availability = $all;
  
  $highest_availability = array_filter($highest_availability, function ($product) use ($search_term) {
      return strpos(strtolower($product['nombre']), strtolower($search_term)) !== false;
  });
  $highest_rated = $highest_availability;
  $all = $highest_availability;
}

if (isset($min_rating)) {
  $highest_availability = $all;
  $highest_availability = array_filter($highest_availability, function ($product) use ($min_rating) {
      return $product['rating'] >= $min_rating;
  });
$highest_rated = $highest_availability;
$all = $highest_availability;
}

if (isset($city)) {
  $highest_availability = $all;
  $highest_availability = array_filter($highest_availability, function ($product) use ($city) {
      return strpos(strtolower($product['ciudad']), strtolower($city)) !== false;
  });
  $highest_rated = $highest_availability;
  $all = $highest_availability;
}






View::render('main_page/index_view.php', [
  'page_hero' => "Hoteles & Paquetes",
  'page_hero_subtitle' => "Encuentra tus vacaciones soñadas",
  'highest_availability' => $highest_availability,
  'highest_rated' => $highest_rated,
  'min_price' => $min_price,
  'max_price' => $max_price,
  'start_date' => $_GET['start_date'] ?? null,
  'end_date' => $_GET['end_date'] ?? null,
  'city' => $_GET['city'] ?? null,
  'cities' => Hotel::getCities(),
  'product_type' => $_GET['product_type'] ?? null,
  'search_term' => $_GET['search_term'] ?? null,
  'randomNumber' => mt_rand(1, 100)
]); 
