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
?> 


<!DOCTYPE html>
<html>
<head>
    <title>My First PHP View</title>
</head>
<body>
    <h1>Welcome to my PHP view!</h1>
    
    <?php
        $message = "Hello, world!";
        echo "<p>$message</p>";
    ?>
    <a href="logout.php"> Cerrar sesion</a>
</body>
</html>

