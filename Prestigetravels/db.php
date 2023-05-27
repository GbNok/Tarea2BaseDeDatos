<?php

/**
 * Singleton Design Pattern
 */
class DB {

  private static $instance;

  private function __construct()  {}

  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new PDO('mysql:dbname=Prestigetravels;host=127.0.0.1', 'nok', 'Hola123!', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    return self::$instance;
  }

}