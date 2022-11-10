<?php

include 'app/config.php';

session_start();
if (isset($_SESSION['usuario_sesion'])) {
    echo "existe sesión";
    ?>
    <a href="<?php echo $URL; ?>/login/cerrar_sesion.php">Cerrar Sesión</a>
    <?php
} else {
    echo "Para ingresar a esta plataforma debe de iniciar sesión";

}

//echo "Bienvenido Administrador";
