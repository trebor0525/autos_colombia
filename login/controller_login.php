<?php

include '../app/config.php';

session_start();

$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];

//echo $usuario . " - " . $password_user;
$email_table = '';
$password_table = '';

$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1'");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $email_table = $usuario['email'];
    $password_table = $usuario['password_user'];
}

if (($usuario_user == $email_table) && ($password_user == $password_table)) {
    ?>
    <div class="alert alert-success" role="alert">
        Usuario Correcto!
    </div>
    <script>location.href = "principal.php";</script>
    <?php
$_SESSION['usuario_sesion'] = $email_table;
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        Error al introducir los datos.
    </div>
    <script>$('#password').val("");$('#password').focus();</script>
    <?php
}

/* if ($usuario == "rxe@gmail.com") {
?>
<div class="alert alert-success" role="alert">
Usuario Correcto!
</div>
<?php
} else {
?>
<div class="alert alert-danger" role="alert">
Usuario Incorrecto!
</div>
<?php
}  */
