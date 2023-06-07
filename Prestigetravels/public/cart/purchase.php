<?php
session_start();

require_once __DIR__ . '/../../core/index.php';
require_once __DIR__ . '/../../models/user.php';

$user_id = $_SESSION["user"]["id"];


if (isset($_POST['comprar'])) {

    User::purchase($user_id);

    header("Location: index.php");
    exit();
}


