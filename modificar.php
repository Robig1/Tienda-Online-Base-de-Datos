<?php
$hostDB = '127.0.0.1';
$nombreDB = 'la_nano_tienda';
$usuarioDB = 'root';
$contrasenyaDB = '33_estoconfranconopasaba_33';
$idpedido = isset($_REQUEST['idpedido']) ? $_REQUEST['idpedido'] : null;
$idproducto = isset($_REQUEST['idproducto']) ? $_REQUEST['idproducto'] : null;
$direccion = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : null;

$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $miUpdate = $miPDO->prepare('UPDATE pedidos SET idproducto = :idproducto, direccion = :direccion WHERE idpedido = :idpedido');
    $miUpdate->execute(
        [
            'idpedido' => $idpedido,
            'idproducto' => $idproducto,
            'direccion' => $direccion
        ]
    );
    header('Location: menu.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM pedidos WHERE idpedido = ?;');
    $miConsulta->execute([ $idpedido]);
}
$consulta = $miConsulta->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="idproducto">idproducto</label>
            <input id="idproducto" type="text" name="idproducto" value="<?= $consulta['idproducto'] ?>">
        </p>

        <p>
            <label for="direccion">direccion</label>
            <input id="direccion" type="text" name="direccion" value="<?= $consulta['direccion'] ?>">
        </p>

        <p>
            <input type="hidden" name="idpedido" value="<?= $idpedido ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>