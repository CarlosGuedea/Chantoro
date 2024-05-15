<!-- Cabecera -->
<link rel="stylesheet" href="/views/productos/sidebar.css">

<link rel="stylesheet" href="/views/productos/productos.css">

<link rel="stylesheet" href="/views/productos/table.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<div id="sidebar">
    <div class="toogle-btn">

    </div class="sidebar-content">
    <ul>
        <li> <a href="/">CHANTORO</a></li>
        <!-- Item Nueva Venta -->
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
                    Notificacion
                </a>
                <span class="badge" id="contadorNotificaciones">1</span>
            </div>
        </li>
        <!-- Item Productos -->
        <li>
            <div class="sidebar-item-active">
                <a href="/productos/1" class="toogle">
                    <img src="../../icons/productos.svg" width="25px" height="25px" />
                </a>
                <a href="/productos/1" class="toogle" style="color:white;">
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

<!-- HEADER -->

<header>
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Productos</h1>
            <h5 class="subtitle">Listado de los productos en la BD</h5>
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
        <a href="/nuevo-producto"><button class="button">+ Agregar Producto</button></a>
        <table class="table table-striped" id="miTabla" style="">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Borrar</th>
                    <th>Guardar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                foreach ($resultados as $producto) {
                    echo "<tr>";
                    echo "<td>" . $producto['ProductoID'] . "</td>";
                    echo "<td><input type='text' value='" . $producto['NombreProducto'] . "'></td>";
                    echo "<td><input type='text' value='" . $producto['Descripcion'] . "'></td>";
                    echo "<td><input type='text' value='" . $producto['Precio'] . "'></td>";
                    echo "<td><input type='text' value='" . $producto['Stock'] . "'></td>";
                    echo "<td>
                    <form method='POST' action='/eliminar-producto'>
                        <input type='hidden' name='id_producto' value='" . $producto['ProductoID'] . "'>
                        <button type='submit'><img src='/icons/basura.png' alt='borrar' width='25px'></button>
                    </form>
                </td>";
                ?> <td><button onclick="guardarEdicion(this)">Guardar</button></td> <?php
                                                                                    echo "</tr>";
                                                                                }
                                                                                    ?>
            </tbody>
        </table>
    </div>
</body>

<script src="productos.js"></script>



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

    function guardarEdicion(btn) {
        // Obtener la fila padre del botón
        const fila = btn.closest('tr');

        // Obtener los valores de los campos de entrada
        const idProducto = fila.cells[0].textContent;
        const nombre = fila.cells[1].querySelector('input').value;
        const descripcion = fila.cells[2].querySelector('input').value;
        const precio = fila.cells[3].querySelector('input').value;
        const stock = fila.cells[4].querySelector('input').value;

        // Aquí puedes enviar los datos al servidor usando AJAX o un formulario oculto
        // Ejemplo usando AJAX:
        // ...
        // Manejar clic en el botón de guardar

        // Realizar la solicitud AJAX para guardar los cambios
        fetch('/guardar-cambios-productos', {
                method: 'POST',
                body: JSON.stringify({
                    id_producto: idProducto,
                    nombre,
                    descripcion,
                    precio,
                    stock
                }),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Guardado exitoso:', data);
                // Actualizar la fila con los datos nuevos (esto es solo visual, la persistencia de datos en el servidor depende de cómo manejes la solicitud)
                fila.cells[1].innerHTML = nombre;
                fila.cells[2].innerHTML = descripcion;
                fila.cells[3].innerHTML = precio;
                fila.cells[4].innerHTML = stock;
            })
            .catch(error => {
                console.error('Error al guardar:', error);
            });
    }
</script>