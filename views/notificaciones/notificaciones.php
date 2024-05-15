<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="/views/notificaciones/sidebar.css">
    <link rel="stylesheet" href="/views/notificaciones/notificaciones.css">
    <link rel="stylesheet" href="/views/notificaciones/table.css">
    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body>
    <!-- Barra lateral -->
    <div id="sidebar">
        <div class="toogle-btn"></div>
        <div class="sidebar-content">
            <ul>
                <li> <a href="/">CAFRA'S</a></li>
                <!-- Item Pedidos -->
                <li>
                    <div class="sidebar-item">
                        <a href="/pedidos/1">
                            <img src="../../icons/nueva_venta.svg" width="25px" height="25px" />
                        </a>
                        <a href="/pedidos/1">
                            Pedidos
                        </a>
                    </div>
                </li>
                <!-- Item Notificaciones -->
                <li>
                    <div class="sidebar-item-active">
                        <a href="/notificaciones/1">
                            <img src="../../icons/bell.svg" width="25px" height="25px" />
                        </a>
                        <a href="/notificaciones/1" style="color:white">
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
                        <a href="/agenda/1" class="toogle">
                            <img src="../../icons/credito.svg" width="25px" height="25px" />
                        </a>
                        <a href="/agenda/1" class="toogle">
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
                <h1>Notificaciones</h1>
                <h5 class="subtitle">Listado de las notificaciones</h5>
            </div>
            <div class="header-derecha">
                <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
                <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
                <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
            </div>
        </div>
    </header>

    <!-- TABLA -->
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Notificación</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Leido</th>
                    <th>Tipo de Evento</th>
                </tr>
            </thead>
            <tbody id="clientes-table">
                <?php
                foreach ($resultados as $notificacion) {
                    echo "<tr>";
                    echo "<td>" . $notificacion['NotificacionID'] . "</td>";
                    echo "<td>" . $notificacion['Mensaje'] . "</td>";
                    echo "<td>" . $notificacion['FechaEnvio'] . "</td>";
                    echo "<td>" . $notificacion['Leido'] . "</td>";
                    echo "<td>" . $notificacion['TipoEvento'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Script para recibir notificaciones -->
    <script>
        // Supongamos que esto es la función que se ejecuta al recibir una nueva notificación
        function recibirNotificacion() {
            // Obtener el elemento del badge
            const badge = document.getElementById('contadorNotificaciones');

            // Mostrar el badge y aumentar el contador
            badge.style.display = 'block';
            // Suponiendo que ya hay una notificación, aumentar el contador en uno
            badge.textContent = parseInt(badge.textContent) + 1;
        }

        // Ejemplo: Simulación de recibir una nueva notificación después de un tiempo (solo para propósitos de demostración)
        setTimeout(recibirNotificacion, 3000); // Llamar a la función después de 3 segundos 
    </script>

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

</html>