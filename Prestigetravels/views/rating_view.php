<?php 
require_once "../db.php";
?>

<form acction="/rating.php" method="POST" class="box">
    <input class="input" type="text" placeholder="comentario (opcional)" name="comment">
    <input class="input" type="number" placeholder="rating" name="rating" min="1" max="5">
    <select name="hotel_id" style="width: 150px; height: 20px;">
  <?php

    foreach($hotels as &$hotel){
        echo '<option value="' . $hotel["id_hotel"] . '">' . $hotel["nombre"] . '</option>';
    }

  ?>
</select>

    <button> Publicar </button>
</form>