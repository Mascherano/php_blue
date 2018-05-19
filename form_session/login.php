<?php
session_start();

include_once '../yt_colores/conexion.php';

$usuario_login = $_POST['nombre_usuario'];
$contrasena_login = $_POST['contrasena'];

$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sent_buscar = $pdo->prepare($sql);
$sent_buscar->execute(array($usuario_login));
$resultado = $sent_buscar->fetch();

if(!$resultado){
    echo 'El usuario no existe';
    die();
}

if(password_verify($contrasena_login, $resultado['contrasena'])){
    $_SESSION['admin'] = $usuario_login;
    header('Location: restringido.php');
}else{
    echo 'No son iguales las contraseñas';
    die();
}