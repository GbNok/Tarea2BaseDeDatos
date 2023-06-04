
<h1>Perfil de Usuario</h1>
<p>Nombre: <?php echo $info['nombre']; ?></p>
<p>Correo electrónico: <?php echo $info['correo']; ?></p>
<p>Fecha de nacimiento: <?php echo $info['fecha_nacimiento']; ?></p>

<form action="/user_profile.php" method="POST">
  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
  <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar usuario</button>
</form>




<h1>Reviews</h1>
<?php foreach($ratings as &$rating): ?>
  <div class="card">
    <div class="card-content">
      <p><?php echo $rating[0]; ?></p>
      <p><?php echo $rating[1]["comentario"]; ?></p>
    </div>
  </div>
<?php endforeach ?>