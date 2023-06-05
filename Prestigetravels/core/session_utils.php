<?php

class SessionUtils
{
  public function __construct()
  {
  }

  public static function assertLoggedIn()
  {
    if (!isset($_SESSION["user"])) {
      header("Location: /login.php");
      die();
    }
  }
}