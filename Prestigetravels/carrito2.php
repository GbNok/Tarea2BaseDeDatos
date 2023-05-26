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
            }

            else{
                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'id' => $ID,
                    'nombre' => $Nombre,
                    'precio' => $Precio,
                    'cantidad' => $Cantidad
                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
            }
            $mensaje = print_r($_SESSION,true);

        break;
    }





}


?>