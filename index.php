<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css "href="asset/css/style.css">
    <link rel="stylesheet" type="text/css "href="asset/css/css/all.min.css">
</head>
<?php
session_start();
if(!empty($_SESSION['id_tip_user'])){
    header('Location: controller/loginController.php');
}
else{
session_destroy();
?>
<body>
    <img class="wave"src="asset/img/wave_vo2.png" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="asset/img/security.svg" alt="">
        </div>
        <div class="contenido-login">
            <form action="controller/loginController.php" method="post">            
                <p>
                    <font color=#00B0FF><b>Bienvenido</b></font>
                <p>
                <div class="input-div dni">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Correo</h5>
                        <input type="email" name="user" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" name="pass" class="input"required>
                    </div>
                </div>
                <a href="#">Recuperar contraseña</a>
                <input type="submit" class="btn" value="iniciar Sesion">
            </form>
        </div>
    </div>
</body>
<script src="asset/js/login.js"></script>
</html>
<?php
}
?>