<?php

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

include_once 'conexion.php';

$sql_editar = 'UPDATE colores SET color=?, descripcion=? WHERE id=?';
$sent_editar = $pdo->prepare($sql_editar);
$sent_editar->execute(array($color, $descripcion, $id));

$sent_editar = null;
$pdo = null;

header('location:index.php');