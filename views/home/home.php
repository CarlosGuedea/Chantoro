<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/views/home/home.css" />

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

    <div class="logo-chantoro">
        <img src="../../public/img/chantoro.jpeg" alt="Chantoro" width="200px">
    </div>


    <div class="fotos">
        <img src="../../public/img/nuez.jpeg" alt="" height="125px" width="200px">
        <img src="../../public/img/huevo.jpeg" alt="" height="125px" width="200px">
        <img src="../../public/img/miel.png" alt="" width="200px">
    </div>

    <div style="text-align:center; padding-top:1rem; padding-bottom:2rem;">
        <a href="/login">
            <button class="btn">

                <h2>Comprar</h2>

            </button>
        </a>
    </div>

    <hr>

    <div style="text-align: center;">
        <h1>Nuestros productos</h1>
    </div>

    <div class="carrusel-container">

        <div class="slide"> <!--  Imagen 1 -->
            <a href="/huevo">
                <img src="/public/img/huevos2.webp" alt="" height="500px">
                <div class="caption">Huevo $120.00 pesos la cartera</div>
            </a>
        </div>

        <div class="slide"> <!--  Imagen 2 -->
            <a href="/miel">
                <img src="/public/img/miel2.jpg" alt="" height="500px">
                <div class="caption">Miel $180.00 pesos el litro o 1/2 litro a $90.00</div>
            </a>
        </div>

        <div class="slide"> <!--  Imagen 3 -->
            <a href="/nuez">
                <img src="/public/img/nuez2.jpeg" alt="" height="500px">
                <div class="caption">Nuez de macadamia $350.00 kilogramo</div>
            </a>
        </div>

        <div class="slide"> <!--  Imagen 4 -->
            <a href="/guayaba">
                <img src="/public/img/guayaba.jpeg" alt="" height="500px">
                <div class="caption">Guayaba $120.00 pesos la reja de 10 kilogramos o $240.00 la reja de 20 kilogramos</div>
            </a>
        </div>

        <div class="slide"><!--  Imagen 4 -->
            <a href="/maracuya">
                <img src="/public/img/maracuya.avif" alt="" height="500px">
                <div class="caption">Pulpa de maracuya $100.00 pesos el litro</div>
            </a>
        </div>

        <div class="slide">
            <a href="/nopal">
                <img src="/public/img/nopal.jpeg" alt="" height="500px">
                <div class="caption">Nopal $35.00 el kilo ya limpio</div>
            </a>
        </div>

        <button class="btn" id="prevBtn">
            <h2>Anterior</h2>
        </button>
        <button class="btn" id="nextBtn">
            <h2>Siguiente</h2>
        </button>
    </div>


    <hr>

    <div style="text-align:center;">
        <h1>Sobre Chantoro</h1>
    </div>

    <div>
        <h2>Chantoro es una empresa de producción agricola en la que todos los productos que van a encontrar en nuestro catálogo son Organicos. Residimos en Colima.</h2>
    </div>

    <hr>

    <div class="footer">
        <a href="">
            <h3>Principal </h3>
        </a>
        <h3>|</h3>
        <a href="">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/views/home/script.js"></script>

</body>

</html>