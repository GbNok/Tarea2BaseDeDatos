

<div class="cart-items">
  <h3>Items del carrito:</h3>
  <?php foreach ($items as $item): ?>
    <?php if (is_array($item)): ?>
      <?php $nombre = $item['nombre']; ?>
      <?php $precio = $item['precio']; ?>
      <p><?php echo $nombre; ?> - $<?php echo $precio; ?></p>
    <?php else: ?>
      <p><?php echo $item; ?></p>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<div class="total-price">
  <p>Precio total sin descuento: $<?php echo $precio_total_no_discount; ?></p>
  <p>Descuento: <?php echo $descuento; ?>%</p>
  <p>Precio total con descuento: $<?php echo $precio_total; ?></p>
</div>