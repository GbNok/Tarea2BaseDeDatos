<?php
    include 'bd.php';

    session_start();
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $userinfo = mysqli_query($conn, "SELECT * FROM usuario WHERE correo='$correo' and contrasenia='$password'");
    if(mysqli_num_rows($userinfo) > 0){
        $row = mysqli_fetch_array($userinfo);
        $_SESSION['usuario'] = $row['id_usuario'];
        header ("location: info.php");
    }else{
        echo '
            <script>
                alert("Usuario no registrado, verifique los datos");
                window.location = "login_mg.php";
            </script>
        ';
    }
    mysqli_close($conexion);
?>