
<section class="hero is-info is-medium mb-6"
  style="background-image: url('https://picsum.photos/seed/<?= $package_id ?>/1800/300'); background-size: cover; background-repeat: no-repeat; background-position: 0 0">
  <div class="hero-body">
    <div class="container has-text-centered">

      <p class="title">
        <?= $name ?>
      </p>
      <p class="subtitle">
        <?= $ciudad1 ?> 
      </p>
      <p class="subtitle">
        <?= $ciudad2 ?> 
      </p>
      <p class="subtitle">
        <?= $ciudad3 ?> 
        <?= number_format($price) ?> por persona
      </p>
    </div>
  </div>
</section>

<div class="container">
  <nav class="level">
    <div class="level-item has-text-centered">
      <div>
        <p class="heading">Paquetes disponibles</p>
        <p class="title">
          <?= $Paquetes_disponibles ?> para un maximo de
          <?= $limite_personas ?> personas
        </p>
      </div>
    </div>



<div class="level-item has-text-centered">
  <div>
    <p class="heading">
      <span class="icon-text">
        <span class="icon">
          <i class="fas fa-hotel"></i>
        </span>
        <span><?=$name_hotel_1?></span>
      </span>
    </p>
    <p class="title">
      <a href="hotel.php?id=<?= $hospedaje1 ?>" class="button is-light">
        <span class="icon-text">
          <span class="icon">
            <i class="fas fa-hotel"></i>
          </span>
        </span>
      </a>
    </p>
  </div>
</div>

<div class="level-item has-text-centered">
  <div>
    <p class="heading">
      <span class="icon-text">
        <span class="icon">
          <i class="fas fa-hotel"></i>
        </span>
        <span><?= $name_hotel_2 ?></span>
      </span>
    </p>
    <p class="title">  
      <a href="hotel.php?id=<?= $hospedaje2 ?>" class="button is-light">
        <span class="icon-text">
          <span class="icon">
            <i class="fas fa-hotel"></i>
          </span>
        </span>
      </a>
    </p>
  </div>
</div>
<div class="level-item has-text-centered">
  <div>
    <p class="heading">
      <span class="icon-text">
        <span class="icon">
          <i class="fas fa-hotel"></i>
        </span>
        <span><?= $name_hotel_3 ?></span>
      </span>
    </p>
    <p class="title">
      <a href="hotel.php?id=<?= $hospedaje3 ?>" class="button is-light">
        <span class="icon-text">
          <span class="icon">
            <i class="fas fa-hotel"></i>
          </span>
        </span>
      </a>
    </p>
  </div>
</div>
</nav>


  <div class="mb-6">
    <?php if ($is_package_in_cart): ?>
      <?php View::fragment('views/cart/remove_form.php', ["id" => $package_id, "type_id" => "package_id"]) ?>
    <?php else: ?>
      <form action="/cart/" method="POST" class="mb-6">
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="package_id" value="<?= $package_id ?>" />
        <div class="field has-addons">
          <div class="control">
            <a class="button is-static">
              Cantidad:
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
    <div class="control">
          <form action="paquete.php" method="post">
            <input type="hidden" name="action" value="wishlist_add">
            <input type="hidden" name="package_id" value="<?= $package_id ?>">
            <button type="submit" class="button is-light">
              <span class="icon is-small">
                <i class="fas fa-heart"></i>
              </span>
              <span>Agregar a Wishlist</span>
            </button>
          </form>
        </div>
  </div>
  


  <?php  if(!empty($it_was_bought)) { ?>
  <?php if (empty($rating)){ ?>
  <h3 class="title is-3">Reseñas</h3>
  <form acction="/rating.php" method="POST" class="box">
    <input class="input" type="text" placeholder="comentario (opcional)" name="comment">
    <input type="hidden" name="action" value="Rating">

    <div class="field">
    <label class="label">Calidad de los Hoteles</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingcalidad" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingcalidad" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingcalidad" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingcalidad" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingcalidad" value="1">
            <label for="star1" class="star"></label>
        </div>
      </div>
    </div>

    <div class="field">
    <label class="label">Transporte</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingtransporte" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingtransporte" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingtransporte" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingtransporte" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingtransporte" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

<div class="field">
    <label class="label">Servicio</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingservicio" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingservicio" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingservicio" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingservicio" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingservicio" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

<div class="field">
    <label class="label">Precio calidad</label>
    <div class="control">
        <div class="rating-stars">
            <input type="radio" id="star5" name="ratingpreciocalidad" value="5">
            <label for="star5" class="star"></label>
            <input type="radio" id="star4" name="ratingpreciocalidad" value="4">
            <label for="star4" class="star"></label>
            <input type="radio" id="star3" name="ratingpreciocalidad" value="3">
            <label for="star3" class="star"></label>
            <input type="radio" id="star2" name="ratingpreciocalidad" value="2">
            <label for="star2" class="star"></label>
            <input type="radio" id="star1" name="ratingpreciocalidad" value="1">
            <label for="star1" class="star"></label>
        </div>
    </div>
</div>

    <button> Publicar </button>
  </form>
  <?php } elseif (!empty($rating)){ ?>
    <div class="field">
    <label class="label">Calidad de los Hoteles</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingcalidad" value="<?= $value ?>" <?= $rating["ratingcalidad"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="field">
    <label class="label">Transporte</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingtransporte" value="<?= $value ?>" <?= $rating["ratingtransporte"] == $value ? 'checked' : '' ?> disabled>
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
                <input type="radio" id="star<?= $value ?>" name="ratingservicio" value="<?= $value ?>" <?= $rating["ratingservicio"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="field">
    <label class="label">Precio calidad</label>
    <div class="control">
        <div class="rating-stars">
            <?php foreach (range(1, 5) as $value): ?>
                <input type="radio" id="star<?= $value ?>" name="ratingpreciocalidad" value="<?= $value ?>" <?= $rating["ratingpreciocalidad"] == $value ? 'checked' : '' ?> disabled>
                <label for="star<?= $value ?>" class="star"></label>
            <?php endforeach; ?>
        </div>
    </div>
</div>





    <?php } ?>
    <?php }  elseif (empty($rating)){   ?>

<div style="width: 200px; height: 200px; background-color: #f2f2f2; padding: 20px;">
<p style="text-align: center; font-weight: bold;">Para poder dar reseña debes haber comprado el producto</p>
</div>

<?php  }  ?>
</div>

