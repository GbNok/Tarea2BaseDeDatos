<?php
include 'carrito2.php';
include 'templates/cabecera.php';
?>

<br>
<h3>Lista del carrito </h3>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%"> descripcion</th>
            <th width="15%"> cantidad</th>
            <th width="20%"> precio</th>
            <th width="20%"> total</th>
            <td width="5%"> --</th>
        </tr>
        <tr>
            <td width="40%"> producto1</th>
            <td width="15%"> 2</th>
            <td width="20%"> p12312</th>
            <td width="20%"> 12313123</th>
            <th width="5%"> <button class="btn btn-danger" type="button"> Eliminar</button></th>

        </tr>
        <tr>
        <td colspan="3" align="right"><h3>total</h3> </td>
        <td align="right"><h3>$<?php echo number_format(300,2);?> </h3></td>
        <td></td>
        </tr>
    </tbody>
</table>



<?php
include 'templates/pie.php';
?>