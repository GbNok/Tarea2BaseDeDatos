<?php
include 'carrito2.php';
include 'templates/cabecera.php';
?>


    <div class="container">
        <br/>
        <div class="alert alert-success">
            
        <?php echo($mensaje) ?>
            <a href="#" class="badge badge-success">Ver carrito </a>
        </div>
    </div>
    <div class="row">
    <?php
    include 'bd.php';
    $sentencia = $conn->prepare("SELECT * FROM hoteles");
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $hoteles = array();
    while ($fila = $resultado->fetch_assoc()) {
        $hoteles[] = $fila;
    };
    $conn->close();
    ?>
    <?php foreach($hoteles as $hotel)     {?>

        <div class="col-3">
            <div class="card">
                <img title="Titulo producto" class="card-img-top" src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg" alt="Titulo">
                <div class="card-body">
                <span> <?php echo $hotel['nombre'];?> </span>
                    <h5 class="card-title"><?php echo $hotel['precio_noche'];?></h5>
                    <p class="card-text">descrpcion</p>

                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $hotel['id'];?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $hotel['nombre'];?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $hotel['precio_noche'];?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">

                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar carrito</button>

                </form>



                    
                </div>
            </div>
        </div>




    <?php }?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<?php
include 'templates/pie.php';
?>