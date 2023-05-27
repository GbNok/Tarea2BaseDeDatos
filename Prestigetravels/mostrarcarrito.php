<?php
include 'carrito2.php';
include 'template/header.php';
?>

<br>
<h3>Lista del carrito </h3>
<?php if(!empty($_SESSION['CARRITO'])) {    ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%"> descripcion</th>
            <th width="15%"> cantidad</th>
            <th width="20%"> precio</th>
            <th width="20%"> total</th>
            <th width="5%"> --</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="40%"> <?php echo $producto['nombre']?></th>
            <td width="15%"> <?php echo $producto['cantidad']?></th>
            <td width="20%"> <?php echo $producto['precio']?></th>
            <td width="20%"> <?php echo number_format($producto['precio']*$producto['cantidad'],2);?>
            <td width="5%">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $producto['id']?>">
                <button class="btn btn-danger" type="submit"name="btnAccion" value="Eliminar"> Eliminar </button></th>
            </form>
            </th>

            

        </tr>
        <?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
        <?php } ?>
        <tr>
        <td colspan="3" align="right"><h3>total</h3> </td>
        <td align="right"><h3>$<?php echo number_format($total,2);?> </h3></td>
        <td></td>
        </tr>
    </tbody>
</table>
<?php    } else{ ?>
<div class="alert alert-success">
    No hay productos
</div>

<?php }   ?>


<?php
include 'templates/pie.php';
?>