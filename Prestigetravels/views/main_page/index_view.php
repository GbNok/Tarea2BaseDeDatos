<?php require_once '../core/index.php' ?>
<?php if (21 <= 20) {?>
  <!-- $randomNumber -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
  body {
    overflow: hidden;
  }

  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9998;
  }

  .popup {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    text-align: center;
    z-index: 9999;
  }

  .close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    cursor: pointer;
  }

  .discount-code {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .copy-icon {
    font-size: 24px;
    cursor: pointer;
    margin-top: 10px;
  }
</style>

<div class="overlay"></div>

<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close-button" onclick="closePopup()">×</span>
    <h2>Has recibido un cupón de descuento</h2>
    <p class="discount-code">Código de descuento: BD2023</p>
    <span class="copy-icon" onclick="copyDiscountCode()">
      <i class="fas fa-copy"></i>
    </span>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
  function closePopup() {
    var popup = document.getElementById("popup");
    var overlay = document.querySelector(".overlay");
    popup.style.display = "none";
    overlay.style.display = "none";
    document.body.style.overflow = "auto";
  }

  function copyDiscountCode() {
    var discountCode = document.querySelector(".discount-code");
    var code = discountCode.textContent.replace("Código de descuento: ", "");
    navigator.clipboard.writeText(code).then(function() {
      alert("El código ha sido copiado al portapapeles");
    });
  }
</script>


<?php  }?>


<div class="container">
  <?php require_once 'search_bar.php' ?>

  <h3 class="title is-3">Mejores Resultados Disponibles</h3>

  <section class="section px-0">
    <div class="columns">
      <?php foreach ($highest_availability as &$product) { ?>
        <div class="column is-3">

          <?php View::fragment('views/main_page/product_card.php', ['product' => $product]) ?>
        </div>
      <?php } ?>
    </div>
  </section>

  <h3 class="title is-3">Mejores Raitings</h3>

  <section class="section px-0">
    <?php foreach ($highest_rated as $i => &$product) { ?>
      <?= $i % 4 === 0 && $i != 0 ? '</div>' : '' ?>
      <?= $i % 4 === 0 ? '<div class="columns">' : '' ?>

      <div class="column is-3">
        <?php View::fragment('views/main_page/product_card.php', ['product' => $product]) ?>
      </div>
    <?php } ?>
  </section>
</div>