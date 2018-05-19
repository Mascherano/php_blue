<?php

$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

if(password_verify($contrasena2, $contrasena)){
    echo "Contraseña Valida";
    include_once '../yt_colores/conexion.php';

    $sql_agregar = 'INSERT INTO usuarios (nombre, contrasena) VALUES (?,?)';
    $sent_agregar = $pdo->prepare($sql_agregar);
    
    if($sent_agregar->execute(array($usuario_nuevo, $contrasena))){
        echo "Agreagdo<br/>";
    }else{
        echo "Error<br/>";
    }

    $sent_agregar = null;
    $pdo = null;

    //header('Location:');
}else{
    echo "Contraseña Invalida";
}