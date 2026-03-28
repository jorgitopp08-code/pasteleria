<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pedidos Pastelería</title>
</head>
<body>

<h2>Registrar Pedido</h2>
<form method="POST" action="guardar.php">
    <input type="text" name="cliente" placeholder="Cliente" required><br><br>
    <textarea name="descripcion" placeholder="Descripción" required></textarea><br><br>
    <input type="text" name="direccion" placeholder="Dirección" required><br><br>
    <button type="submit">Guardar Pedido</button>
</form>

<h2>Lista de Pedidos</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Descripción</th>
    <th>Dirección</th>
    <th>Acciones</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM pedidos");

while($row = $result->fetch_assoc()){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['cliente']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>
    <td><?php echo $row['direccion']; ?></td>
    <td>
        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
        <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>