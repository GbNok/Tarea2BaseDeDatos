<?php require_once 'search_bar.php' ?>

<h3 class="title is-3">Mejores Resultados Disponibles</h3>

<section class="section px-0">
  <div class="columns">
    <? foreach ($highest_availability as &$product): ?>
    <div class="column is-3">
      <?php require 'product_card.php' ?>
    </div>
    <? endforeach ?>
  </div>
</section>

<h3 class="title is-3">Mejores Raitings</h3>

<section class="section px-0">
  <? foreach ($highest_rated as $i => &$product): ?>
  <?= $i % 4 === 0 && $i != 0 ? '</div>' : '' ?>
  <?= $i % 4 === 0 ? '<div class="columns">' : '' ?>
  <div class="column is-3">
    <?php require 'product_card.php' ?>
  </div>
  <? endforeach ?>
</section>