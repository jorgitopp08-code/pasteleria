<?php
include("db.php");

// Validar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php?error=Acceso no permitido");
    exit();
}

// Validar datos
$id = $_POST['id'] ?? null;
$cliente = trim($_POST['cliente'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');

// Validaciones básicas
if (!is_numeric($id) || empty($cliente) || empty($descripcion) || empty($direccion)) {
    header("Location: index.php?error=Datos inválidos");
    exit();
}

// Preparar consulta segura
$stmt = $conn->prepare("UPDATE pedidos 
                        SET cliente = ?, descripcion = ?, direccion = ?
                        WHERE id = ?");

$stmt->bind_param("sssi", $cliente, $descripcion, $direccion, $id);

// Ejecutar
if ($stmt->execute()) {

    // Verificar si realmente se actualizó algo
    if ($stmt->affected_rows > 0) {
        header("Location: index.php?mensaje=Pedido actualizado correctamente");
    } else {
        header("Location: index.php?error=No hubo cambios o el pedido no existe");
    }

} else {
    header("Location: index.php?error=Error al actualizar");
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>