<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM colores WHERE id=?';
$sent_eliminar = $pdo->prepare($sql_eliminar);
$sent_eliminar->execute(array($id));

$sent_eliminar = null;
$pdo = null;

header('location:index.php');