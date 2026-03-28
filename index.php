<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Pedidos | Pastelería</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">🍰 Gestión de Pedidos</h2>

    <!-- FORMULARIO -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            Registrar Pedido
        </div>
        <div class="card-body">
            <form method="POST" action="guardar.php">

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" name="cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>

                <button class="btn btn-success">Guardar Pedido</button>
            </form>
        </div>
    </div>

    <!-- TABLA -->
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            Lista de Pedidos
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Descripción</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $result = $conn->query("SELECT * FROM pedidos");

                while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['cliente']; ?></td>
                        <td><?= $row['descripcion']; ?></td>
                        <td><?= $row['direccion']; ?></td>
                        <td>
                            <a href="editar.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>

                            <a href="eliminar.php?id=<?= $row['id']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>