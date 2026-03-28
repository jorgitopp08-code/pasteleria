<?php
include("db.php");

$cliente = $_POST['cliente'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];

$conn->query("INSERT INTO pedidos (cliente, descripcion, direccion)
VALUES ('$cliente', '$descripcion', '$direccion')");

header("Location: index.php");
?>