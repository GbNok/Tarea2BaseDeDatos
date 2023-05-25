<?php
    include 'bd.php';
    if (!$conn) {
        die("Connection failed");
    }
    echo "Connected successfully";
?> 


<!DOCTYPE html>
<html>
<head>
    <title>My First PHP View</title>
</head>
<body>
    <h1>Welcome to my PHP view!</h1>
    
    <?php
        // PHP code can be inserted here
        $message = "Hello, world!";
        echo "<p>$message</p>";
    ?>
    <a href="index.php"> Crear usuario </a>
</body>
</html>

