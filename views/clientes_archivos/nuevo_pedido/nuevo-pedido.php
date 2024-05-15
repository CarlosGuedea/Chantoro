<!-- Cabecera -->
<link rel="stylesheet" href="/views/clientes_archivos/nuevo_pedido/nuevo_pedido.css">

<link rel="stylesheet" href="/views/clientes_archivos/nuevo_pedido/formulario.css">

<link rel="stylesheet" href="/views/clientes_archivos/nuevo_pedido/table.css">


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


<!-- HEADER -->

<header class="header">
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Nueva Pedido</h1>
            <h5 class="subtitle">Crear un nuevo pedido en el sistema</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"> <?php echo $_SESSION['Usuario'] ?> </h3>
        </div>
    </div>
</header>


<!-- FORMULARIO -->

<body class="content">
    <div class="busqueda-container" ">
        <div>
            <h1>Poductos</h1>
        <div style=" display: flex;">
        <div>
            <form action="" method="post">
                <label for="producto_id">Producto</label>
                <select class="form-control" id="ProductoID" name="ProductoID">
                    <option value="">Selecciona un producto</option>
                </select>
            </form>
        </div>
        <div class="form-group">
            <label for="nombre">Cantidad</label>
            <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required>
        </div>
    </div>
    <div>
        <button class="button" onclick="agregarProducto()">Agregar</button>
        <button class="button" onclick="limpiarCampos()">Borrar</button>
    </div>
    </div>
    <div>
        <table class="table tabla-compras">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                </tr>
            </thead>
            <tbody id="productos-table">
            </tbody>
        </table>
    </div>
    </div>


    <!-- TABLA -->
    <form id="venta-form" method="post">
        <input type="hidden" name="id_cliente" id="id_cliente_input">
        <div class="tabla-container">
            <div>
                <h1>Compras</h1>
                <table class="table table-striped" id="miTabla">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="compras-table">
                    </tbody>
                </table>
                <div style="display:flex;justify-content: space-between;">
                    <div class="form-group" style="display: flex;">
                        <label for="nombre">
                            <h2>Total</h2>
                        </label>
                        <h2 id="total" style="margin-left: 2rem;">0.00</h2>
                        <input type="hidden" name="total" id="total_input" value="0.00">
                    </div>
                    <div style="padding-right:20px;">
                        <button class="button-naranja" type="button" onclick="enviarFormulario('contado')"">Realizar Pedido</button>
                </div>
            </div>
        </div>
    </form>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Declara productoSelect fuera de la función ComboProducto
    var productoSelect;
    var productos;

    // Esta función se llama cuando la página se carga
    window.onload = function() {
        ComboProducto();
    };

    // Nueva función para cargar productos en el combo y configurar el evento de cambio
    productoSelect;
    productos;

    function ComboProducto() {
        productoSelect = document.getElementById('ProductoID');

        // Crea una solicitud AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/cargar-productos', true);

        // Define lo que hacer cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status === 200) {
                productos = JSON.parse(xhr.responseText);



                // Llena el campo de selección con los productos
                productos.forEach(function(producto) {
                    var option = document.createElement('option');
                    option.value = producto.NombreProducto;
                    option.textContent = producto.NombreProducto;
                    productoSelect.appendChild(option);
                });
            }
        };

        // Envía la solicitud
        xhr.send();

        // Agrega un evento "change" al combobox
        productoSelect.addEventListener('change', function() {
            // Obtén el valor seleccionado del combobox

            var selectedValue = productoSelect.value;
            // Actualiza la tabla solo si se selecciona un producto
            if (selectedValue) {
                // Realiza una solicitud AJAX para obtener los resultados
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/producto-buscar-id', true); // Cambia la ruta a '/producto-buscar-nombre'
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


                // Crea una cadena de consulta con el valor del producto seleccionado
                var data = 'producto_nombre=' + selectedValue; // Cambia a 'producto_nombre'
                // Envía los datos del formulario
                xhr.send(data);

                // Define lo que hacer cuando la solicitud se complete
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Actualiza la tabla con los resultados recibidos
                        document.getElementById('productos-table').innerHTML = xhr.responseText;
                    }
                };

            }
        });
    }

    function limpiarCampos() {
        document.getElementById('ProductoID').value = '';
        document.getElementById('cantidad').value = '';
    }

    function agregarProducto() {
        
        // Verificar si los campos id_cliente y cliente_nombre están llenos
        var ProductoID = document.getElementById('ProductoID').value;
        var cantidad = document.getElementById('cantidad').value;

        if (ProductoID === '' || cantidad === '') {
            alert('Por favor, seleccione un producto y agrege la cantidad a pedir.');
            return;
        }
        
        var productosTable = document.getElementById('productos-table');
        var comprasTable = document.getElementById('compras-table');
        var cantidadInput = document.getElementById('cantidad');
        var cantidad = parseFloat(cantidadInput.value);

        if (isNaN(cantidad) || cantidad <= 0) {
            alert("Por favor, ingrese una cantidad válida mayor que cero.");
            return;
        }

        var total = 0;

        for (var i = 0; i < productosTable.rows.length; i++) {
            var row = productosTable.rows[i];
            var newRow = comprasTable.insertRow(comprasTable.rows.length);

            for (var j = 0; j < row.cells.length; j++) {
                var cell = newRow.insertCell(j);

                if (j === 0) { // ID
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id_producto[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                } else if (j === 1) { // Nombre
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'producto_nombre[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                } else if (j === 3) { // Precio
                    cell.innerHTML = row.cells[j].innerText;
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'precio[]'; // Aquí asignamos el nombre
                    input.value = row.cells[j].innerText;
                    cell.appendChild(input);
                    var precio = parseFloat(row.cells[j].innerText);
                    total += precio * cantidad;
                } else {
                    cell.innerHTML = row.cells[j].innerHTML;
                }
            }

            if (i === 0) {
                var cantidadCell = newRow.insertCell(row.cells.length);
                var input = document.createElement('input');
                input.type = 'number';
                input.id = 'cantidadVenta'
                input.name = 'cantidad[]'; // Aquí asignamos el nombre
                input.value = cantidad;
                cantidadCell.appendChild(input);
            }
        }

        // Actualizar el campo de total
        var totalInput = document.getElementById('total');
        // Después de calcular el nuevo valor total
        total += parseFloat(totalInput.textContent);
        totalInput.textContent = total.toFixed(2);
        cantidadInput.value = ''; // Limpiar el campo de cantidad

        // Actualiza el campo oculto para el valor total
        var totalInputField = document.getElementById('total_input');
        totalInputField.value = total.toFixed(2);
    }


    function enviarFormulario(tipo) {
        // Obtener el formulario
        var formulario = document.getElementById("venta-form");

        // Cambiar la acción del formulario según el tipo de venta
        if (tipo === 'contado') {
            formulario.action = "/nueva-venta-contado";
        } else if (tipo === 'credito') {
            formulario.action = "/nueva-venta-credito";
        }

        // Enviar el formulario
        formulario.submit();
    }

</script>


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