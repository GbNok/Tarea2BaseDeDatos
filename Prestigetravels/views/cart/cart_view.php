<section class="hero is-info is-small mb-6">
  <div class="hero-body">
    <div class="container has-text-centered">

      <p class="title">
        Carrito
      </p>
      <p class="subtitle">
        Estos son los productos que has seleccionado
      </p>
    </div>
  </div>
</section>

<div class="container">
  <h3 class="title is-3">Hoteles</h3>
  <table class="table is-fullwidth is-striped is-hoverable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio por noche</th>
        <th>Noches</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hotels as $hotel): ?>
        <tr>
          <td>
            <a href="/hotel.php?id=<?= $hotel['id_hotel'] ?>"><?= $hotel['nombre'] ?></a>
          </td>
          <td>
            <?= '$' . number_format($hotel['precio']) ?>
          <td>
            <?= $hotel['cantidad'] ?>
          <th>
            <?= '$' . number_format($hotel['precio'] * $hotel['cantidad']) ?>
          </th>
          <td>
            <?php View::fragment('views/cart/remove_form.php', ["size" => "small", "hide_title" => true, "id" => $hotel['id_hotel'], "type_id" => "hotel_id"]) ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <th class="has-text-right">Total:</th>
        <th>
          <?= '$' . number_format($precio_total_no_discount) ?>
        </th>
        <td></td>
      <tr>
    </tfoot>
  </table>
  
  <h3 class="title is-3">Paquetes</h3>
  <table class="table is-fullwidth is-striped is-hoverable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio por persona</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($packages as $packege): ?>
        <tr>
          <td>
            <a href="/paquete.php?id=<?= $packege['id_hotel'] ?>"><?= $packege['nombre'] ?></a>
          </td>
          <td>
            <?= '$' . number_format($packege['precio']) ?>
      </td>
          <td>
            <?= $packege['cantidad'] ?>
      </td>
          <th>
            <?= '$' . number_format($packege['precio'] * $packege['cantidad']) ?>
          </th>
          <td>
            <?php View::fragment('views/cart/remove_form.php', ["size" => "small", "hide_title" => true, "id" => $packege['id_paquete'], "type_id" => "package_id"]) ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <th class="has-text-right">Total:</th>
        <th>
          <?= '$' . number_format($precio_total_no_discount) ?>
        </th>
        <td></td>
      <tr>
    </tfoot>
  </table>

  <h3 class="title is-3">Checkout</h3>

  <?php if (!empty($_SESSION['success_message'])): ?>
    <article class="message is-success is-light">
      <div class="message-body">
        <?= $_SESSION['success_message'] ?>
      </div>
    </article>
    <?php unset($_SESSION['success_message']); endif ?>
  <?php if (!empty($_SESSION['error_message'])): ?>
    <article class="message is-danger">
      <div class="message-body">
        <?= $_SESSION['error_message'] ?>
      </div>
    </article>
    <?php unset($_SESSION['error_message']); endif ?>
  <table class="table is-striped has-text-right">
    <tbody>
      <tr>
        <td>Precio total sin descuento</td>
        <th>
          <?= '$' . number_format($precio_total_no_discount) ?>
        </th>
      </tr>
      <tr>
        <td>Descuento</td>
        <th>
          <?= $descuento * 100 . '%' ?>
        </th>
        <td>
          <form action="/cart/apply-cupon.php" method="POST">
            <input type="hidden" name="_method" value="POST" />
            <div class="field has-addons">
              <div class="control">
                <a class="button is-static is-small">
                  Cupon:
                </a>
              </div>
              <div class="control">
                <input type="text" class="input is-small" name="cupon" placeholder="BD2023" />
              </div>
              <div class="control">
                <button class="button is-light is-small">
                  <span class="icon is-small">
                    <i class="fas fa-coins"></i>
                  </span>
                  <span>Aplicar cupon</span>
                </button>
              </div>
            </div>
          </form>
        </td>
      </tr>
      <tr>
        <th class="has-text-right">Precio total </th>
        <th>
          <?= '$' . number_format($precio_total) ?>

          <form action="/cart/purchase.php" method="post">
          <input type="hidden" name="user_id" value="">
          <button type="submit" name="comprar">Comprar</button>
          </form>

        </th>
      </tr>
    </tbody>
  </table>