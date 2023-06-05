<?php
class View
{
  public static function render($view, $variables = array())
  {
    extract($variables);

    $page = __DIR__ . "/../views/$view";

    ob_start();
    include __DIR__ . "/../template/main.php";
    echo ob_get_clean();
    die();
  }

  public static function fragment($view, $variables = array())
  {
    extract($variables);

    ob_start();
    include __DIR__ . "/../$view";
    echo ob_get_clean();
  }

  public static function redirect($to)
  {
    header("Location: $to");
    die();
  }
}