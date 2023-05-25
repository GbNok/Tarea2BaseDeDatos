<a href="info.php"> Home </a> 
<h1> Hola </h1>



<?php

    include 'bd.php';

    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    echo "<h1> $correo</h1>";

    $query = "INSERT INTO usuario(correo, nombre, contrasenia) VALUES('$correo','$usuario', '$password')";
    
    $verificar_correo = mysqli_query($conn, "SELECT * FROM usuario WHERE correo='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intente con uno diferente");
                window.location = "index.php";
            </script>
        ';
        exit();
    }

    $verificar_usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre='$usuario' ");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intente con uno diferente");
                window.location = "index.php";
            </script>
        ';
        exit();
    }
        echo "<h1> no se que wea </h1>";

    $ejecutar = mysqli_query($conn, $query);

    if($ejecutar) {
        echo "<h1> Creado </h1>";
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Intentelo nuevamente, usuario no almacenado");
                window.location = "index.php";
            </script>
        ';
    }
       
    mysqli_close($conn);
?>


