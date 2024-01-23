<?php
$servername = "localhost";
$username = "root";
$password = "33_estoconfranconopasaba_33";
$dbname = "la_nano_tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>