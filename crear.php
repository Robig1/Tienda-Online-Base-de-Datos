<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'enlace.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idproducto = isset($_POST['idproducto']) ? intval($_POST['idproducto']) : 0;
    $direccion = $_POST['direccion'];
    $usuario_id = $_SESSION['user_id'];
    $sql_insert_pedido = "INSERT INTO pedidos (idproducto, direccion, id_usuario) VALUES (?, ?, ?)";
    $stmt_insert_pedido = $conn->prepare($sql_insert_pedido);
    $stmt_insert_pedido->bind_param("isi", $idproducto, $direccion, $usuario_id);

    if ($stmt_insert_pedido->execute()) {
        echo "Pedido realizado con éxito.";
    } else {
        echo "Error al realizar el pedido. Por favor, inténtalo de nuevo. Error: " . $stmt_insert_pedido->error;
    }

    $stmt_insert_pedido->close();
}
$usuario_id = $_SESSION['user_id'];
$sql_select_pedidos = "SELECT * FROM pedidos WHERE id_usuario = ?";
$stmt_select_pedidos = $conn->prepare($sql_select_pedidos);
$stmt_select_pedidos->bind_param("i", $usuario_id);
$stmt_select_pedidos->execute();
$result_pedidos = $stmt_select_pedidos->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid green;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: 3px;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Tus Pedidos:</h2>
    <?php
    if ($result_pedidos->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Pedido</th><th>ID Producto</th><th>Dirección</th></tr>";

        while ($row = $result_pedidos->fetch_assoc()) {
            echo "<tr><td>{$row['idpedido']}</td><td>{$row['idproducto']}</td><td>{$row['direccion']}</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No tienes pedidos realizados.</p>";
    }
    ?>
    <h2>Realizar Nuevo Pedido:</h2>
    <form action="crear.php" method="post">

        <label for="idproducto">ID Producto:</label>
        <input type="number" id="idproducto" name="idproducto" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <button type="submit">Realizar Pedido</button>
    </form>

    <p><a href="menu.php">Volver a Inicio</a></p>
</body>
</html>
<?php
$stmt_select_pedidos->close();
$conn->close();
?>