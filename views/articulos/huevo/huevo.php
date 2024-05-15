<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/views/articulos/huevo/huevo.css" />

</head>

<body>
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
        <a href=/contacto">
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

    <div class="busqueda">

    <select id="selectRedirect" class="styled-select">
    <option value="">Selecciona un producto</option>
            <option value="/nuez">Nuez</option>
            <option value="/miel">Miel</option>
            <option value="/huevo">Huevo</option>
            <option value="/nopal">Nopal</option>
            <option value="/maracuya">Maracuya</option>
            <option value="/guayaba">Guayaba</option>
    </select>

    </div>

    <div class="principal">
        <div>
            <img src="public/img/huevos2.webp" alt="huevo" width="900px" height="600px">
        </div>
        <div>
            <div style="padding-bottom: 2rem;">
                <h1>Cartera de Huevo</h1>
            </div>
            <hr>
            <div style="display:flex; gap:30px; padding-top: 2rem; padding-bottom: 1rem;">
                <h1>$<?php echo $Precio; ?></h1>
                <h1>Stock: <?php echo $Stock; ?> Carteras de huevo</h1>
            </div>
            <hr>
            <div style="padding-top: 2rem; padding-bottom: 1rem;">
                <h3>Es fuente de vitaminas y ácido fólico. Contiene hierro, fósforo, magnesio y potasio. La yema contiene luteína, que nos protege de la degeneración macular en los ojos.</h3>
            </div>
            <hr>
            <div style="padding-top: 2rem;">
                <a href="/login"><button class="btn">Comprar</button></a>
            </div>
        </div>

    </div>

    <hr>

    <div style="text-align: center; padding-top: 2rem;">
        <h1>Otros productos</h1>
    </div>

    <div class="productos">

        <div class="producto">
            <a href="/nuez"><img src="/public/img/nuez2.jpeg" alt="nuez de macadamia" width="200px"></a>
            <div>
                <h3>Nuez de macadamia</h3>
                <h3>$<?php echo $PrecioNuez; ?></h3>
            </div>
        </div>

        <div class="producto">
            <a href="/maracuya"><img src="/public/img/maracuya.avif" alt="maracuya" width="200px" height="135px"></a>
            <div>
                <h3>Maracuya</h3>
                <h3>$<?php echo $PrecioMaracuya; ?></h3>
            </div>
        </div>

        <div class="producto">
            <a href="/nopal"><img src="/public/img/nopal.jpeg" alt="miel" width="200px" height="135px"></a>
            <div>
                <h3>Nopal</h3>
                <h3>$<?php echo $PrecioNopal; ?></h3>
            </div>
        </div>

    </div>


    <hr>

    <div class="footer">
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

    <div style="text-align: center;">
        <h4>&copy; Chantoro - 2024</h4>
    </div>

    <script src="/views/articulos/huevo/huevo.js"></script>


<script>
        // Obtener el elemento select
        const selectRedirect = document.getElementById('selectRedirect');

        // Manejar el evento de cambio del select
        selectRedirect.addEventListener('change', function () {
            // Redireccionar a la URL seleccionada
            const selectedValue = this.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });
    </script>