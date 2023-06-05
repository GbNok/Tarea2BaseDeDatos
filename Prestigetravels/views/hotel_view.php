<section class="hero is-info is-medium mb-6"
  style="background-image: url('https://picsum.photos/seed/<?= $hotel_id ?>/1800/300'); background-size: cover; background-repeat: no-repeat; background-position: 0 0">
  <div class="hero-body">
    <div class="container has-text-centered">

      <p class="title">
        <?= $name_hotel ?>
      </p>
      <p class="subtitle">
        <?= $ciudad ?> – $
        <?= number_format($precio_noche) ?> por noche
      </p>
    </div>
  </div>
</section>

<div class="container">
  <nav class="level">
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Habitaciones disponibles</p>
        <p class="title">
          <?= $habitaciones_disponibles ?> de
          <?= $habitaciones_totales ?>
        </p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-car"></i>
            </span>
            <span>Estacionamiento</span>
          </span>
        </p>
        <p class="title">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-<?= $estacionamiento ? 'check' : 'times' ?>"></i>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-swimming-pool"></i>
            </span>
            <span>Piscina</span>
          </span>
        </p>
        <p class="title">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-<?= $piscina ? 'check' : 'times' ?>"></i>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-tshirt"></i>
            </span>
            <span>Lavandería</span>
          </span>
        </p>
        <p class="title">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-<?= $lavanderia ? 'check' : 'times' ?>"></i>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-dog"></i>
            </span>
            <span>Pet Friendly</span>
          </span>
        </p>
        <p class="title">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-<?= $pet_friendly ? 'check' : 'times' ?>"></i>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-coffee"></i>
            </span>
            <span>Servicio de desayuno</span>
          </span>
        </p>
        <p class="title">
          <span class="icon-text">
            <span class="icon">
              <i class="fas fa-<?= $servicio_desayuno ? 'check' : 'times' ?>"></i>
            </span>
          </span>
        </p>
      </div>
    </div>
  </nav>

  <div class="mb-6">
    <?php if ($is_hotel_in_cart): ?>
      <?php View::fragment('views/cart/remove_form.php', ["hotel_id" => $hotel_id]) ?>
    <?php else: ?>
      <form action="/cart/" method="POST" class="mb-6">
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="hotel_id" value="<?= $hotel_id ?>" />
        <div class="field has-addons">
          <div class="control">
            <a class="button is-static">
              Noches:
            </a>
          </div>
          <div class="control">
            <input type="number" min="1" max="365" class="input" name="quantity" value="1" />
          </div>
          <div class="control">
            <button class="button is-light">
              <span class="icon is-small">
                <i class="fas fa-cart-plus"></i>
              </span>
              <span>Agregar al carrito</span>
            </button>
          </div>
        </div>
      </form>
    <?php endif ?>
  </div>
  
  <?php if (empty($rating)){ ?>
  <h3 class="title is-3">Reseñas</h3>
  <form acction="/rating.php" method="POST" class="box">
    <input class="input" type="text" placeholder="comentario (opcional)" name="comment">
    <!-- <input class="input" type="number" placeholder="rating" name="rating"> -->  
    <div class="field">
    <label class="label">Limpieza</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingLimpieza" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingLimpieza" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingLimpieza" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingLimpieza" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingLimpieza" value="1">
            <label for="star1" class="star"></label>
        </div>
      </div>
    </div>

    <div class="field">
    <label class="label">Servicio</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingServicio" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingServicio" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingServicio" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingServicio" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingServicio" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

<div class="field">
    <label class="label">Decoración</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingDecoracion" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingDecoracion" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingDecoracion" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingDecoracion" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingDecoracion" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

<div class="field">
    <label class="label">Calidad de las Camas</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingCalidadCamas" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingCalidadCamas" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingCalidadCamas" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingCalidadCamas" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingCalidadCamas" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

    <button> Publicar </button>
  </form>
  <?php } elseif (!empty($rating)){ ?>
    <div class="field">
    <label class="label">Limpieza</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingLimpieza" value="<?= $value ?>" <?= $rating["ratingLimpieza"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="field">
    <label class="label">Servicio</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingServicio" value="<?= $value ?>" <?= $rating["ratingServicio"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="field">
    <label class="label">Decoracion</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingDecoracion" value="<?= $value ?>" <?= $rating["ratingDecoracion"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="field">
    <label class="label">Calidad Camas</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingCalidadCamas" value="<?= $value ?>" <?= $rating["ratingCalidadCamas"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>





    <?php } ?>
</div>