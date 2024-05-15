<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con DataTables</title>
    <!-- Cabecera -->
    <link rel="stylesheet" href="/views/pedidos/sidebar.css">
    <link rel="stylesheet" href="/views/pedidos/pedidos.css">
    <link rel="stylesheet" href="/views/pedidos/table.css">
    <!-- Incluye los estilos de Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body>
    <!-- Barra lateral -->
    <div id="sidebar">
        <div class="toogle-btn"></div>
        <div class="sidebar-content">
            <ul>
                <li> <a href="/">CHANTORO</a></li>
                <!-- Item Pedidos -->
                <li>
                    <div class="sidebar-item-active">
                        <a href="/pedidos/1">
                            <img src="../../icons/nueva_venta.svg" width="25px" height="25px" />
                        </a>
                        <a href="/pedidos/1" style="color: white">
                            Pedidos
                        </a>
                    </div>
                </li>
                <!-- Item Notificaciones -->
                <li>
                    <div class="sidebar-item">
                        <a href="/notificaciones/1">
                            <img src="../../icons/bell.svg" width="25px" height="25px" />
                        </a>
                        <a href="/notificaciones/1">
                            Notificacion
                        </a>
                        <span class="badge" id="contadorNotificaciones">1</span>
                    </div>
                </li>
                <!-- Item Productos -->
                <li>
                    <div class="sidebar-item">
                        <a href="/productos/1" class="toogle">
                            <img src="../../icons/productos.svg" width="25px" height="25px" />
                        </a>
                        <a href="/productos/1" class="toogle">
                            Productos
                        </a>
                    </div>
                </li>
                <!-- Item Agenda -->
                <li>
                    <div class="sidebar-item">
                        <a href="/agenda/1">
                            <img src="/icons/credito.svg" width="25px" height="25px" />
                        </a>
                        <a href="/agenda/1">
                            Agenda
                        </a>
                    </div>
                </li>
                <!-- Item Nuevo Cliente -->
                <li>
                    <div class="sidebar-item">
                        <a href="/nuevo-cliente">
                            <img src="../../icons/nuevo_cliente.svg" width="25px" height="25px" />
                        </a>
                        <a href="/nuevo-cliente">
                            Nuevo Cliente
                        </a>
                    </div>
                </li>
                <!-- Item Clientes -->
                <li>
                    <div class="sidebar-item">
                        <a href="/clientes/1">
                            <img src="/icons/cliente.svg" width="25px" height="25px" />
                        </a>
                        <a href="/clientes/1">
                            Clientes
                        </a>
                    </div>
                </li>
                <!-- Item Administradores -->
                <li>
                    <div class="sidebar-item">
                        <a href="/administradores">
                            <img src="/icons/admin.png" width="25px" height="25px" />
                        </a>
                        <a href="/administradores">
                            Admin
                        </a>
                    </div>
                </li>
                <!-- Item Cerrar-Sesion -->
                <li>
                    <div class="sidebar-item">
                        <a href="/abonos/1">
                            <img src="../../icons/salir.svg" width="25px" height="25px" />
                        </a>
                        <a href="/cerrar-sesion">
                            Cerrar Sesion
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- HEADER -->
    <header>
        <div class="header-container">
            <div class="header-izquierda">
                <h1>Pedidos</h1>
                <h5 class="subtitle">Listado de los pedidos en la BD</h5>
            </div>
            <div class="header-derecha">
                <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
                <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
                <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
            </div>
        </div>
    </header>

    <!-- TABLA -->
    <div class="tabla-container">
        <table id="miTabla" class="display">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Fecha</th>
                    <th>Cliente ID</th>
                    <th>Nombre</th>
                    <th>Producto ID</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Surtido</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $pedido) {
                    echo "<tr>";
                    echo '<td>' . $pedido['PedidoID'] . '</td>';
                    echo '<td>' . $pedido['FechaPedido'] . '</td>';
                    echo '<td>' . $pedido['ClienteID'] . '</td>';
                    echo '<td>' . $pedido['NombreCliente'] . '</td>';
                    echo '<td>' . $pedido['ProductoID'] . '</td>';
                    echo '<td>' . $pedido['NombreProducto'] . '</td>';
                    echo '<td>' . $pedido['Cantidad'] . '</td>';
                    echo '<td>' . $pedido['PrecioUnitario'] . '</td>';
                    echo '<td>' . ($pedido['Surtido'] === 0 ? "Sin surtir" : "Surtido") . '</td>';
                    echo '<td><button class="button" onclick="Surtir(this)">Surtir</button></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Incluye jQuery (necesario para DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializa Datatables en tu tabla
            $('#miTabla').DataTable();
        });

        function Surtir(button) {
            var row = button.parentNode.parentNode;
            var pedidoID = row.cells[0].innerText; // Obtén el ID del pedido desde la primera columna de la fila

            // Cambia el texto de "Sin surtir" a "Surtido"
            row.cells[8].innerText = "Surtido";

            // Realiza una llamada AJAX para actualizar el estado en la base de datos
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/actualizar-estado-pedido", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Maneja la respuesta si es necesario
                    console.log(xhr.responseText);
                }
            };
            xhr.send("pedidoID=" + pedidoID);
        }
    </script>
</body>

</html>