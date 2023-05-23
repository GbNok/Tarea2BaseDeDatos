<?php
    $servername = "localhost";
    $username = "nok";
    $password = "Hola123!";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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
</body>
</html>

