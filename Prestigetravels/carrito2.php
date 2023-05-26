<?php
session_start();

$mensaje="";
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar':
            $ID = $_POST['id'];
            $Nombre = $_POST['nombre'];
            $Precio = $_POST['precio'];
            $Cantidad = $_POST['cantidad'];
            $mensaje = "producto agregado:".$Nombre;

            if(!isset($_SESSION['CARRITO'])){
                $producto = array(
                    'id' => $ID,
                    'nombre' => $Nombre,
                    'precio' => $Precio,
                    'cantidad' => $Cantidad
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado con exito al carrito";

            }

            else{
                $idProducto = array_column($_SESSION['CARRITO'],"id");

                if(in_array($ID,$idProducto)){  echo"<script>alert('producto ya agregado ...');</script>";

                }else {

                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'id' => $ID,
                    'nombre' => $Nombre,
                    'precio' => $Precio,
                    'cantidad' => $Cantidad
                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                $mensaje = "Producto agregado con exito al carrito";
                }
            }
            // $mensaje = print_r($_SESSION,true);
            // $mensaje = "Producto agregado con exito al carrito";

        break;
        case 'Eliminar':
            $ID = $_POST['id'];
            foreach($_SESSION['CARRITO'] as $indice=>$producto){
                if($producto['id'] == $ID){
                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script>alert('Elemento borrado');</script>";

                }

            }
        break;
    }





}


?>