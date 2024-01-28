<?php
$hostDB = '127.0.0.1';
$nombreDB = 'la_nano_tienda';
$usuarioDB = 'root';
$contrasenyaDB = '33_estoconfranconopasaba_33';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$miConsulta = $miPDO->prepare('SELECT * FROM pedidos;');
$miConsulta->execute();
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
            border-radius: .5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><a class="button" href="crear.php">Crear</a></p>
    <table>
        <tr>
            <th>idpedido</th>
            <th>idproducto</th>
            <th>direccion</th>
            <th>Usuario</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['idpedido']; ?></td>
           <td><?= $valor['idproducto']; ?></td>
           <td><?= $valor['direccion']; ?></td>
           <td><?= $valor['id_usuario']; ?></td>
           <td><a class="button" href="modificar.php?idpedido=<?= $valor['idpedido'] ?>">Modificar</a></td>
           <td><a class="button" href="borrar.php?idpedido=<?= $valor['idpedido'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>