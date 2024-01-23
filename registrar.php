<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La nano Tienda</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <div class="menu">
            <a href="https://maps.app.goo.gl/sP757BhhaRhGHBDm7">Encuéntranos</a>
            <a href="conocenos.html">Conócenos</a>
            <a href="minardi.html">Minardi</a>
            <a href="Renault.html">Renault</a>
            <a href="mclaren.html">Mclaren</a>
            <a href="ferrari.html">Ferrari</a>
            <a href="alpine.html">Alpine</a>
            <a href="astonmartin.html">Aston Martin</a>
            <a href="carrito.html">Cesta</a>
            <a href="login.php">Incia Sesión</a>
        </div>
        <div class="fondoarriba">
            <a href="index.html"><h1>La Nano Tienda</a></h1>
        </div>
    </header>
    <section class="formulario">
        <h2>Registrarse</h2>
        <form action="procesoderegistro.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </section>
</body>
        <footer>
    <div class="footer_izquierda">
        <h3>ATENCIÓN AL CLIENTE:</h3>
        <a href="conocenos.html">Ponte en contacto con nosotros</a>
        <a href="conocenos.html">Envíos y devoluciones</a>
        <a href="conocenos.html">Métodos de pago</a>
    </div>

    <div class="redes_sociales">
        <h3>Síguenos en redes:</h3>
        <a href="#" target="_blank" title="Tiktok"><img src="imagenes/tiktok.jpg" alt="Tiktok"></a>
        <a href="#" target="_blank" title="Twitter"><img src="imagenes/twitter.png" alt="Twitter"></a>
        <a href="#" target="_blank" title="Instagram"><img src="imagenes/instagram.jpg" alt="Instagram"></a>
    </div>

    <div class="final">
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.020749417174!2d-3.679120624129361!3d40.47480597143034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228be806226af%3A0xfcf9a3ab0db928be!2sMSMK!5e0!3m2!1ses!2ses!4v1700127347275!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
    </div>
</footer>

<nav class="nav_derecha">
    <a href="conocenos.html">Política de privacidad</a>
    <a href="conocenos.html">Cookies</a>
    <a href="conocenos.html">Aviso legal</a>
    <a href="conocenos.html">Cláusulas de uso</a>
    <a href="conocenos.html">Accesibilidad</a>
    <a href="conocenos.html">Configuración de cookies</a>
</nav>
</html>