<?php require_once '../core/view.php' ?>
<?php require_once 'search_bar.php' ?>


<?php
if ($randomnumber <= 20) {
    echo '
    <style>
    .popup {
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    .popup-content {
      background-color: #fff;
      padding: 20px;
      text-align: center;
    }

    .popup-content h2 {
      font-size: 24px;
    }

    .popup-content p {
      font-size: 18px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .buttons button {
      margin: 0 10px;
      padding: 10px 20px;
      font-size: 16px;
    }
    </style>
    
    <div id="popup" class="popup">
      <div class="popup-content">
        <h2>¡Oferta especial!</h2>
        <p>Obtén un 10% de descuento en tu compra.</p>
        <div class="buttons">
          <button id="accept-button">Aceptar</button>
          <button id="reject-button">Rechazar</button>
        </div>
      </div>
    </div>
    
    <script>
      document.getElementById("accept-button").addEventListener("click", function() {
        document.getElementById("popup").style.display = "none";
      });

      document.getElementById("reject-button").addEventListener("click", function() {
        document.getElementById("popup").style.display = "none";
      });
    </script>
    ';
}
?>





<h3 class="title is-3">Mejores Resultados Disponibles</h3>

<section class="section px-0">
  <div class="columns">
    <?php foreach ($highest_availability as &$product){ ?>
    <div class="column is-3">
      <?php View::fragment('views/main_page/product_card.php', ['product' => $product]) ?>
    </div>
    <?php } ?>
  </div>
</section>

<h3 class="title is-3">Mejores Raitings</h3>

<section class="section px-0">
  <?php foreach ($highest_rated as $i => &$product){ ?>
  <?= $i % 4 === 0 && $i != 0 ? '</div>' : '' ?>
  <?= $i % 4 === 0 ? '<div class="columns">' : '' ?>
  <div class="column is-3">
    <?php View::fragment('views/main_page/product_card.php', ['product' => $product]) ?>
  </div>
  <?php } ?>
</section>