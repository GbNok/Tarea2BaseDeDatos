

<div class="cart-items">
  <h3>Items del carrito:</h3>
  <?php foreach ($items as $item): ?>
    <p><?php echo $item; ?></p>
  <?php endforeach; ?>
</div>

<div class="total-price">
  <p>Precio total sin descuento: $<?php echo $precio_total_no_discount; ?></p>
  <p>Descuento: <?php echo $descuento; ?>%</p>
  <p>Precio total con descuento: $<?php echo $precio_total; ?></p>
</div>