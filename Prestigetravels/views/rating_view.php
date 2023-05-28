<?php 
// foreach($hotels as &$hotel) {
//     echo $hotel["nombre"];
// }
// ?>

<form acction="/rating.php" method="POST" class="box">
    <input class="input" type="text" placeholder="comentario (opcional)" name="comment">
    <input class="input" type="number" placeholder="rating" name="rating">
    <input class="input" type="number" placeholder="hotel" name="hotel_id">
    <button> Publicar </button>
</form>