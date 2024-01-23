<?php
include 'enlace.php';

$email = $_POST['email'];
$password = $_POST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$sql_check_user = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt_check_user = $conn->prepare($sql_check_user);
$stmt_check_user->bind_param("s", $email);
$stmt_check_user->execute();
$result_check_user = $stmt_check_user->get_result();

if ($result_check_user->num_rows > 0) {
    $row = $result_check_user->fetch_assoc();

    if (password_verify($password, $row['contrasena'])) {
        echo "Inicio de sesión exitoso. ¡Bienvenido!";

    } else {
        echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Usuario no encontrado. Por favor, verifica tu correo.";
}

$stmt_check_user->close();
$conn->close();
?>