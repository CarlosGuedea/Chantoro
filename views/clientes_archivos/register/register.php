<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/views/clientes_archivos/register/register.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>

<section>
  <div class="navbar">
    <a href="/">
      <h3>Principal </h3>
    </a>
    <h3>|</h3>
    <a href="/nostros">
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
    <h2>Registrarse</h2>
    <div style="color:red">
      <p> <?php error_reporting(0);
          echo $Error; ?> </p>
    </div>
    <form method="Post" action="/register-user">
      <div class="form-group">
        <label for="usuario">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required />
      </div>
      <div class="form-group">
        <label for="usuario">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required />
      </div>
      <div class="form-group">
        <label for="usuario">Email:</label>
        <input type="email" id="CorreoElectronico" name="CorreoElectronico" required />
      </div>
      <div class="form-group">
        <label for="usuario">Teléfono:</label>
        <input type="text" pattern="[0-9]*" inputmode="numeric" id="telefono" name="telefono" required />
      </div>
      <div class="form-group">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required />
      </div>
      <div class="form-group">
        <label for="contraseña">Direccion:</label>
        <input type="text" id="direccion" name="direccion" required />
      </div>
      <button type="submit">Registrarse</button>
    </form>

  </div>
</article>
