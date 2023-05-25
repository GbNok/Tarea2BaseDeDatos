<?php
    session_start();
?>

<div>
    <form action="login.php" method="POST">
        <h2>Iniciar Sesion</h2>
        <input type="text" placeholder="Correo Electronico" name="correo">
        <input type="password" placeholder="Contraseña" name="password">
        <button>Entrar</button>
    </form>
    <form action="create_user.php" method="POST">
        <h2>Registrarse</h2>
        <input type="text" placeholder="Usuario" name="usuario">
        <input type="text" placeholder="Correo Electronico" name="correo">
        <input type="password" placeholder="Contraseña" name="password">
        <button>Registrarse</button>
    </form>
</div>