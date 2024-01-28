<?php
include 'enlace.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql_check_user = "SELECT * FROM pedidos WHERE id_usuario = ?";
$stmt_check_user = $conn->prepare($sql_check_user);
$stmt_check_user->bind_param("s", $email);
$stmt_check_user->execute();
$result_check_user = $stmt_check_user->get_result();

if ($result_check_user->num_rows > 0) {
    $user = $result_check_user->fetch_assoc();

    if (password_verify($password, $user['contrasena'])) {

        echo "Oleee, nanoiniciaste sesión correctamente ¡¡¡A DISFDRUTAR!!!";
    
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['is_admin'] = $user['es_administrador'];

        header("Location: menu.php");
        exit();
    } else {
        echo "Uy uy uy, hubo un error en al introducir tus datos, inténtalo de nuevo";
    }
} else {
    echo "Uy uy uy, hubo un error en al introducir tus datos, inténtalo de nuevo";
}

$stmt_check_user->close();
$conn->close();
?>