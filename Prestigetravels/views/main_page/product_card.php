<div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="https://picsum.photos/seed/<?= $product['id'] ?>/400/300" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4">
          <a
            href="<?php echo $product['tipo'] === 'hotel' ? 'hotel.php?id=' : 'paquete.php?id=' ?><?php echo $product['id']; ?>">
            <?= $product['nombre'] ?> </a>
        </p>
        <p class="subtitle is-6">
          <?= $product['tipo'] == 'paquete' ? 'Paquete' : 'Hotel' ?>
          <span class="is-pulled-right">
            <span class="icon-text">
              <span class="icon is-small">
                <i class="fas fa-star"></i>
              </span>
            </span>
            <span class="is-size-6">
              <?= number_format($product['rating'], 1) ?>
            </span>
          </span>
        </p>
      </div>
    </div>

    <div class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus nec iaculis mauris.
      </p>
      <ul>
        <li><b>Precio:</b> $
          <?= $product['precio'] ?> <i>(Por
            <?= $product['tipo'] === 'hotel' ? 'por noche' : 'por persona' ?>)
          </i>
        </li>
        <li><b>Cupos:</b> 
          <?= $product['available_qty'] ?>
        </li>
      </ul>
    </div>
  </div>
  <footer class="card-footer">
    <a class="card-footer-item"
      href="<?php echo $product['tipo'] === 'hotel' ? 'hotel.php?id=' : 'paquete.php?id=' ?><?php echo $product['id']; ?>">Ver
      Más</a>
    <!-- <a class="card-footer-item" name="wishlist_add" value=<?php $product['id'] ?>>+ Wishlist</a> -->
  </footer>
</div>