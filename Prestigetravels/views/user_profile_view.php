<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      Perfil de Usuario
    </p>
  </header>
  <div class="card-content">
    <div class="content">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Nombre</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input class="input" type="text" value="<?php echo $info['nombre']; ?>" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Correo electrónico</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input class="input" type="email" value="<?php echo $info['correo']; ?>" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Fecha de nacimiento</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <input class="input" type="text" value="<?php echo $info['fecha_nacimiento']; ?>" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="card-footer">
    <div class="is-pulled-right">
    <form action="/user_profile.php" method="POST">
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <button class="button is-danger card-footer-item is-pulled-right" type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar usuario</button>
    </form>
    </div>
  </footer>
</div>

<h1><strong><em>Reviews de Hoteles</strong></em></h1>
<div class="columns is-multiline">
  <?php foreach($ratings_hotel as &$rating): ?>
    <div class="column is-3">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <?= $rating["nombre_hotel"]  ?>
          </p>
        </header>
        <div class="card-content">
          <div class="content">
            <p>rating: <?= $rating["ratingPromedio"] ?></p>
            <p>comentario: <?= $rating["comentario"] ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>

<h1><strong><em>Reviews de Paquetes</strong></em></name_hotel_1>
<div class="columns is-multiline">
  <?php foreach($ratings_paquete as &$rating): ?>
    <div class="column is-3">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <?= $rating["nombre_paquete"]  ?>
          </p>
        </header>
        <div class="card-content">
          <div class="content">
            <p>rating: <?= $rating["ratingPromedio"] ?></p>
            <p>comentario: <?= $rating["comentario"] ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
