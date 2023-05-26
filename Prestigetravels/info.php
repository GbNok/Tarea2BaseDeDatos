<?php
    include 'bd.php';
    if (!$conn) {
        die("Connection failed");
    }
    echo "Connected successfully";

    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Debes iniciar sesión");
                window.location = "login_mg.php";
            </script>
        ';
        session_destroy();
        die();
    }
    include "template/cabecera.php"
?> 


<!DOCTYPE html>
<html>
<head>
    <title>My First PHP View</title>
</head>
<body>
    <h1>Welcome to my PHP view!</h1>
    
    <?php
        $u = $_SESSION['usuario'];
        $name = mysqli_fetch_array(mysqli_query($conn, "SELECT nombre FROM usuario WHERE id_usuario='$u'"));
        $message = "Hello, world!";
        echo "<p>$message</p>";
        echo $name['nombre'];
    ?>
    <a href="logout.php"> Cerrar sesion</a>
</body>
</html>

