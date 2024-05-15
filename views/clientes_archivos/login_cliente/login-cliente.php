<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/views/clientes_archivos/login_cliente/login-cliente.css" />

</head>

<section>
    <div class="navbar">
        <a href="/">
            <h3>Principal </h3>
        </a>
        <h3>|</h3>
        <a href="/nosotros">
            <h3>Nosotros</h3>
        </a>
        <h3>|</h3>
        <a href="/nuez">
            <h3>Tienda</h3>
        </a>
        <h3>|</h3>
        <a href="/contacto">
            <h3>Contacto</h3>
        </a>
        <h3>|</h3>
        <a href="/login">
            <h3>Login</h3>
        </a>
        <h3>|</h3>
        <a href="/admin">
            <h3>Admin</h3>
        </a>
    </div>
</section>

<div class="chantoro-logo" style="text-align: center;">
    <img src="public/img/chantoro.jpeg" alt="Chantoro" width="200px">
</div>

<article id="content">
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <div style="color:red">
            <p> <?php error_reporting(0);
                echo $Error;?> </p>
        </div>
        <form action="/login-cliente" method="post">
            <div class="form-group">
                <label for="usuario">Email:</label>
                <input type="text" id="Email" name="Email" required />
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="Contrasena" name="Contrasena" required />
            </div>
            <button type="submit">Ingresar</button>
            <h3>- O -</h3>
        </form>
        <button><a class="btn-blue" href="/registro">Registrarse</a></button>
    </div>
</article>