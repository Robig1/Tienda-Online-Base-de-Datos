<?php
$hostDB = '127.0.0.1';
$nombreDB = 'la_nano_tienda';
$usuarioDB = 'root';
$contrasenyaDB = '33_estoconfranconopasaba_33';
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$idpedido = isset($_REQUEST['idpedido']) ? $_REQUEST['idpedido'] : null;
$miConsulta = $miPDO->prepare('DELETE FROM pedidos WHERE idpedido = ?');
$miConsulta->execute([ $idpedido]);
header('Location: menu.php');
?>