<?php
include("db.php");

$id = $_POST['id'];
$cliente = $_POST['cliente'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];

$conn->query("UPDATE pedidos SET 
cliente='$cliente',
descripcion='$descripcion',
direccion='$direccion'
WHERE id=$id");

header("Location: index.php");
?>