




<h1><?php echo $name_hotel; ?></h1>
<p>Precio por noche: <?php echo $precio_noche; ?></p>
<p>Ciudad: <?php echo $ciudad; ?></p>
<p>Habitaciones totales: <?php echo $habitaciones_totales; ?></p>
<p>Habitaciones disponibles: <?php echo $habitaciones_disponibles; ?></p>
<p>Estacionamiento: <?php echo $estacionamiento ? "Sí" : "No"; ?></p>
<p>Piscina: <?php echo $piscina ? "Sí" : "No"; ?></p>
<p>Lavandería: <?php echo $lavanderia ? "Sí" : "No"; ?></p>
<p>Pet Friendly: <?php echo $pet_friendly ? "Sí" : "No"; ?></p>
<p>Servicio de desayuno: <?php echo $servicio_desayuno ? "Sí" : "No"; ?></p>


<form acction="/rating.php" method="POST" class="box">
    <input class="input" type="text" placeholder="comentario (opcional)" name="comment">
    <input class="input" type="number" placeholder="rating" name="rating">

    <button> Publicar </button>
</form>