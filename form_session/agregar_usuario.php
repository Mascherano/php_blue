<?php

include_once '../yt_colores/conexion.php';

$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sent_buscar = $pdo->prepare($sql);
$sent_buscar->execute(array($usuario_nuevo));
$resultado = $sent_buscar->fetch();

if($resultado){
    echo "Este usuario ya existe";
    die();
}else{
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    if(password_verify($contrasena2, $contrasena)){
        echo "Contraseña Valida";

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
}