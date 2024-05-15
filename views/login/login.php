<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/views/login/login.css" />

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
        <h2>Iniciar Sesión Administrador</h2>
        <div style="color:red">
            <p> <?php error_reporting(0);
                echo $Error; ?> </p>
        </div>
        <form action="/login-admin" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="nombre_usuario" required />
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contrasena" name="contraseña" required />
            </div>
            <button type="submit">Ingresar</button>
        </form>
        
    </div>
</article>