<!-- Cabecera -->
<link rel="stylesheet" href="/views/clientes_archivos/pedidos/pedidos.css">

<link rel="stylesheet" href="/views/clientes_archivos/pedidos/table.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- NAVBAR -->

<div class="navbar">
    <a href="/">
        <h3>Principal</h3>
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

<!-- HEADER -->

<header>
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Pedidos</h1>
            <h5 class="subtitle">Listado de los pedidos realizados</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
        </div>
    </div>
</header>

<!-- TABLA -->

<body>
    <div class="tabla-container">
        <a href="/nuevo-pedido"><button class="button">+ Agregar Pedido</button></a>
        <a href="/cerrar-sesion"><button class="button-red">Cerrar Sesión</button></a>
        <table class="table table-striped" id="miTabla" style="">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Fecha Pedido</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Surtido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $pedido) {
                    echo "<tr>";
                    echo "<td>" . $pedido['PedidoID'] . "</td>";
                    echo "<td>" . $pedido['FechaPedido'] . "</td>";
                    echo "<td>" . $pedido['NombreProducto'] . "</td>";
                    echo "<td>" . $pedido['Cantidad'] . "</td>";
                    echo "<td>" . $pedido['PrecioUnitario'] . "</td>";
                    echo "<td>" . $pedido['Surtido'] . "</td>";
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    </div>

<!-- Incluye jQuery (necesario para DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializa DataTables en tu tabla
            $('.table').DataTable();
        });
    </script>
</body>