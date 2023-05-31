<?php
class View {
  public static function render($view, $variables = array()) {
    extract($variables);

    $page = "../views/$view";

    ob_start();
    include "../template/main.php";
    echo ob_get_clean();
    die();
  }

  public static function fragment($view, $variables = array()) {
    extract($variables);

    ob_start();
    include "../$view";
    echo ob_get_clean();
  }
}