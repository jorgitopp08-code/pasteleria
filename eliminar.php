<?php
include("db.php");

// Validar que exista el ID y sea numérico
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?error=ID inválido");
    exit();
}

$id = $_GET['id'];

// Preparar consulta segura (evita SQL Injection)
$stmt = $conn->prepare("DELETE FROM pedidos WHERE id = ?");
$stmt->bind_param("i", $id);

// Ejecutar y validar resultado
if ($stmt->execute()) {
    header("Location: index.php?mensaje=Pedido eliminado correctamente");
} else {
    header("Location: index.php?error=No se pudo eliminar el pedido");
}

$stmt->close();
$conn->close();
?>