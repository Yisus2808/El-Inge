<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EL INGE</title>
    <?php require_once "modulos/css.php"; ?>
</head>
<body>

    <?php

        if (isset($_GET['catalogo'])) {
            // echo '<script>window.location="catalogo"</script>';
            require_once "./vista/modulos/catalogo.php";
        } else {

            $peticionAjax = false;
            require_once "./controlador/vistasControlador.php";
            $vista = new vistasControlador();
            $vistasR = $vista->obtener_vistas_controlador();

            
            
            if($vistasR == "login" || $vistasR == "404" || $vistasR=="") {
                if ($vistasR=="login") {
                    // echo '<script>window.location="home"</script>';
                    require_once "./vista/contenidos/login-view.php";
                } else if($vistasR == "404") {
                    require_once "./vista/contenidos/404-view.php";
                } 
            } else {
                if(isset($_SESSION['usuario_see'])) {
                    require_once "./vista/modulos/main.php";
                } else {
                    require_once "./vista/contenidos/usuarios-view.php";
                }
            }
        }
    ?>

    <?php
        require_once "modulos/script.php";
    ?>
</body>
</html>