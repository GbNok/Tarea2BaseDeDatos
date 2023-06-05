<?php require_once '../core/index.php' ?>

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