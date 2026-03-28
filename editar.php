<?php
include("db.php");

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?error=ID inválido");
    exit();
}

$id = $_GET['id'];

// Consulta segura
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si existe el pedido
if ($result->num_rows === 0) {
    header("Location: index.php?error=Pedido no encontrado");
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            ✏️ Editar Pedido
        </div>

        <div class="card-body">
            <form method="POST" action="actualizar.php">

                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input 
                        type="text" 
                        name="cliente" 
                        class="form-control"
                        value="<?= htmlspecialchars($row['cliente']); ?>" 
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        class="form-control" 
                        required><?= htmlspecialchars($row['descripcion']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input 
                        type="text" 
                        name="direccion" 
                        class="form-control"
                        value="<?= htmlspecialchars($row['direccion']); ?>" 
                        required>
                </div>

                <button class="btn btn-success">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>

            </form>
        </div>
    </div>

</div>

</body>
</html>