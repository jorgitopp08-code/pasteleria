<?php
include("db.php");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pedidos WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Editar Pedido</h2>

<form method="POST" action="actualizar.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <input type="text" name="cliente" value="<?php echo $row['cliente']; ?>"><br><br>
    <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea><br><br>
    <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>"><br><br>

    <button type="submit">Actualizar</button>
</form>