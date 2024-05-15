<!-- Cabecera -->
<link rel="stylesheet" href="/views/nuevo_agenda/sidebar.css">

<link rel="stylesheet" href="/views/nuevo_agenda/nuevo_agenda.css">

<link rel="stylesheet" href="/views/nuevo_agenda/formulario.css">

<div id="sidebar">
    <div class="toogle-btn">

    </div class="sidebar-content">
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
        <!-- Item Nuevo Producto -->
        <li>
            <div class="sidebar-item">
                <a href="/nuevo-producto">
                    <img src="../../icons/nuevo_producto.svg" width="25px" height="25px" />
                </a>
                <a href="/nuevo-producto">
                    Nuevo Producto
                </a>
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
            <div class="sidebar-item-active">
                <a href="/agenda/1">
                    <img src="/icons/credito.svg" width="25px" height="25px" />
                </a>
                <a href="/agenda/1" style="color:white">
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

<header class="header">
    <div class="header-container">
        <div class="header-izquierda">
            <h1>Nuevo Evento en la agenda</h1>
            <h5 class="subtitle">Formulario para agregar un evento a la BD</h5>
        </div>
        <div class="header-derecha">
            <img src="../../icons/bell.svg" width="25px" height="25px" style="padding-top: 20px;" />
            <img src="../../icons/perfil.jpeg" width="40px" height="40px" style="padding-top: 20px;" />
            <h3 class="header-nombre"><?php echo $_SESSION['Usuario'] ?></h3>
        </div>
    </div>
</header>


<!-- FORMULARIO -->

<body class="content">
    <div class="form-container">
        <form action="/insertar-agenda" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fechaInicio">Fecha Inicio</label>
                <input class="form-control" type="datetime-local" name="FechaInicio" placeholder="Fecha Inicio" required>
            </div>
            <div class="form-group">
                <label for="FechaFin">Fecha Fin</label>
                <input class="form-control" type="datetime-local" name="FechaFin" placeholder="Fecha Fin" required>
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripción</label>
                <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripción" required>
            </div>
            <div class="form-goup" style="margin-right: 70%; margin-top: 1rem;">
                <input class="button" type="submit">
            </div>
        </form>
    </div>
</body>