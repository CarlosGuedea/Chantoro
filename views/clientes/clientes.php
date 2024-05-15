<!-- Cabecera -->
<link rel="stylesheet" href="/views/clientes/sidebar.css">

<link rel="stylesheet" href="/views/clientes/clientes.css">

<link rel="stylesheet" href="/views/clientes/table.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<div id="sidebar">
    <div class="toogle-btn">

    </div class="sidebar-content">
    <ul>
        <li> <a href="/">CAFRA'S</a></li>
        <!-- Item Nuevo Pedido -->
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
            <div class="sidebar-item">
                <a href="/notificaciones/1">
                    <img src="../../icons/bell.svg" width="25px" height="25px" />
                </a>
                <a href="/notificaciones/1">
                    Notificaciones
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
            <div class="sidebar-item-active">
                <a href="/clientes/1">
                    <img src="/icons/cliente.svg" width="25px" height="25px" />
                </a>
                <a href="/clientes/1" style="color:white;">
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
                    Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>
</div>


<!-- HEADER -->

<header>
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Clientes</h1>
            <h5 class="subtitle">Listado de los clientes</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
        </div>
        <div>
            <button class="button"><a style="text-decoration: none; color: white;" href="../nuevo_cliente/nuevo_cliente.html"> + Agregar cliente</a></button>
        </div>
    </div>
</header>


<!-- TABLA -->

<!-- CONTENIDO -->

<body onload="cargarClientes(url, opciones);">
    <div class="tabla-container">
        <table class="table table-striped" id="miTabla">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Contraseña</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody id="clientes-table">
                <?php
                foreach ($resultados as $cliente) {
                    echo "<tr>";
                    echo "<td>" . $cliente['ClienteID'] . "</td>";
                    echo "<td>" . $cliente['Nombre'] . "</td>";
                    echo "<td>" . $cliente['Apellido'] . "</td>";
                    echo "<td>" . $cliente['CorreoElectronico'] . "</td>";
                    echo "<td>" . $cliente['Telefono'] . "</td>";
                    echo "<td>" . $cliente['Contrasena'] . "</td>";
                    echo "<td>" . $cliente['Direccion'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>


<!-- Incluye jQuery (necesario para DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Incluye DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        // Inicializa Datatables en tu tabla
        $('#miTabla').DataTable();
    });
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