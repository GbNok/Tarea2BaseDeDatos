  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img src="https://picsum.photos/seed/<?= $product['id'] ?>/400/300" alt="Placeholder image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
          <p class="title is-4"><?= $product['name'] ?></p>
          <p class="subtitle is-6"><?= $product['type'] == 'package' ? 'Paquete' : 'Hotel' ?>
            <span class="is-pulled-right">
              <span class="icon-text">
                <span class="icon is-small">
                  <i class="fas fa-star"></i>
                </span>
              </span>
              <span class="is-size-6"><?= number_format($product['rating'], 1) ?></span>
            </span>
          </p>
        </div>
      </div>

      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Phasellus nec iaculis mauris.
        </p>
        <ul>
          <li><b>Precio:</b> $<?= $product['price'] ?> <i>(Por
              <?= $product['type'] === 'hotel' ? 'por noche' : 'por persona' ?>)</i></li>
          <li><b>Cupos:</b> $<?= $product['available_qty'] ?></li>
        </ul>
      </div>
    </div>
    <footer class="card-footer">
      <a class="card-footer-item">Ver Mas</a>
      <a class="card-footer-item">+ Wishlist</a>
    </footer>
  </div>