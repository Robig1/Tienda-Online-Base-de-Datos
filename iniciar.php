<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'enlace.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_nombre'] = $row['nombre'];

        if ($row['rol'] == 'administrador') {
            header("Location: admin_page.php");
        } else {
            header("Location: index.html");
        }
        exit();
    } else {
        $error_message = "Uy uy uy, hubo un error en al introducir tus datos, inténtalo de nuevo";
    }

    $conn->close();
}
?>