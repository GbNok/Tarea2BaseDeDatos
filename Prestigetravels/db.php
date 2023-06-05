<?php

/**
 * Singleton Design Pattern
 */
class DB {

  private static $instance;

  private function __construct()  {}

  public static function getInstance() {
    if (self::$instance === null) {
      $db_host = "localhost";  //getenv('DB_HOST');
      $db_name = "Prestigetravels";  //getenv('DB_NAME');
      $db_user = "nok";  //getenv('DB_USER');
      $db_pass = "Hola123!";  getenv('DB_PASS');

      self::$instance = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    return self::$instance;
  }

}