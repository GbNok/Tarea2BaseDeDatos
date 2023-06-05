<?php

require_once __DIR__ . "/../models/user.php";

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  $cart_item_count = User::getCartItemCount($_SESSION['user']['id']);
}
?>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
      <img src="/img/logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="/" class="navbar-item">
        Home
      </a>

      <a class="navbar-item" href="/index.php?product_type=packages">
        Paquetes
      </a>

      <a class="navbar-item" href="/index.php?product_type=hotels">
        Hoteles
      </a>

      <div class=" navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Más
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Nosotros
          </a>
          <a class="navbar-item" href="https://github.com/GbNok/Tarea2BaseDeDatos" target="_blank">
            Github
          </a>
          <a class="navbar-item">
            Contacto
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="https://github.com/GbNok/Tarea2BaseDeDatos/issues/new" target="_blank">
            Reportar un problema
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
            <a href="/cart" class="button is-light">
              <span class="icon">
                <i class="fas fa-shopping-cart"></i>
              </span>
              <span>Carrito
                <?= '(' . ($cart_item_count ?? 0) . ')' ?>
              </span>
            </a>


            <a href="/wishlist.php" class="button is-light">
              <span class="icon">
                <i class="fas fa-heart"></i>
              </span>
              <span>Wishlist
                <?= '(' . ($wishlist_item_count ?? 0) . ')' ?>
              </span>
              </a>

            <a href="/user_profile.php" class="button is-primary">
              <span class="icon">
                <i class="fas fa-user"></i>
              </span>
              <span>
                <?= $_SESSION['user']['name'] ?>
              </span>
            </a>
            <a href="/logout.php" class="button is-light">
              <span class="icon">
                <i class="fas fa-sign-out"></i>
              </span>
              <span>Cerrar Sesión</span>
            </a>
          <?php else: ?>
            <a href="/signup.php" class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a href="/login.php" class="button is-light">
              <span class="icon">
                <i class="fas fa-arrow-right-to-bracket"></i>
              </span>
              <span>Sign In</span>
            </a>

          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</nav>