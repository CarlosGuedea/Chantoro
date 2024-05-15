<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Código para manejar las rutas de la aplicación
*/


//Requerir el autoload para el funcionamiento de composer
require_once 'vendor/autoload.php';

//Cargar loscontroladores
require 'controllers/loginController.php';
require 'controllers/registerController.php';
require 'controllers/ordenesController.php';
require 'controllers/adminController.php';
require 'controllers/sesionController.php';
require 'controllers/stripeController.php';
require 'controllers/abonosController.php';
require 'controllers/clientesController.php';
require 'controllers/notificacionesController.php';
require 'controllers/nuevaVentaController.php';
require 'controllers/nuevoProductoController.php';
require 'controllers/nuevoClienteController.php';
require 'controllers/ventasController.php';
require 'controllers/productosController.php';
require 'controllers/ticketsController.php';
require 'controllers/homeController.php';
require 'controllers/ventaController.php';
require 'controllers/loginclienteController.php';
require 'controllers/pedidosController.php';
require 'controllers/agendaController.php';
require 'controllers/pedidosClienteController.php';
require 'controllers/nosotrosController.php';
require 'controllers/contactoController.php';


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {

    //Ruta del home
    $r->addRoute(['GET'], '/', [homeController::class, 'index']);

    //Ruta para el login del cliente
    $r->addRoute(['GET', 'POST'], '/login', [loginclienteController::class, 'index']);

    //Ruta para autenticar el login del cliente
    $r->addRoute(['GET', 'POST'], '/login-cliente', [loginclienteController::class, 'autenticar']);

    //Ruta de venta de nuez
    $r->addRoute(['GET', 'POST'], '/nuez', [ventaController::class, 'nuezVenta']);

    //Ruta para venta de miel
    $r->addRoute(['GET', 'POST'], '/miel', [ventaController::class, 'mielVenta']);

    //Ruta para la venta de nopal
    $r->addRoute(['GET', 'POST'], '/nopal', [ventaController::class, 'nopalVenta']);

    //Ruta para la venta de maracuya
    $r->addRoute(['GET', 'POST'], '/maracuya', [ventaController::class, 'maracuyaVenta']);

    //Ruta para la venta de huevo
    $r->addRoute(['GET', 'POST'], '/huevo', [ventaController::class, 'huevoVenta']);

    //Ruta para la venta de guayaba
    $r->addRoute(['GET', 'POST'], '/guayaba', [ventaController::class, 'guayabaVenta']);

    //Ruta prinicipal para logear al administrador
    $r->addRoute(['GET'], '/admin', [loginController::class, 'index']);

    //Rutas para la autenticación del administrador
    $r->addRoute(['POST'], '/login-admin', [loginController::class, 'login']);

    //Ruta para cargar la tabla de los productos
    $r->addRoute(['GET', 'POST'], '/productos/{pagina:\d+}', [productosController::class, 'listar']);

    //Ruta para guardar cambios que se hagan en los productos
    $r->addRoute(['POST'], '/guardar-cambios-productos', [productosController::class, 'guardarCambiosProductos']);

    //Ruta para mostrar los pedidos
    $r->addRoute(['GET'], '/pedidos/{pagina:\d+}', [pedidosController::class, 'listar']);

    //Ruta para mostrar la agenda
    $r->addRoute(['GET', 'POST'], '/agenda/{pagina:\d+}', [agendaController::class, 'index']);

    //Ruta para mostrar el formulario para ingresar nuevo eventos a la agenda
    $r->addRoute(['GET'], '/nuevo-agenda', [agendaController::class, 'nuevo']);

    //Ruta para ingresar un nuevo evento en la agenda
    $r->addRoute(['POST'], '/insertar-agenda', [agendaController::class, 'insertar']);

    //Ruta para eliminar un evento de la agenda
    $r->addRoute(['POST'], '/eliminar-agenda', [agendaController::class, 'eliminar']);

    //Ruta para guardar los cambios que se hagan en los campos de la agenda
    $r->addRoute(['POST'], '/guardar-cambios-agenda', [agendaController::class, 'gurdarCambiosAgenda']);

    //Ruta para mostrar los pedidos realizados a los clientes
    $r->addRoute(['GET'], '/pedidos-cliente/{pagina:\d+}', [pedidosClienteController::class, 'listar']);

    //Ruta para crear un nuevo pedido por el cliente
    $r->addRoute(['GET'], '/nuevo-pedido', [pedidosClienteController::class, 'nuevo']);

    //Ruta para cargar los productos y mostrarlos en una lista desplegable
    $r->addRoute(['GET'], '/cargar-productos', [productosController::class, 'cargar']);

    //Ruta para bsucar los detalles de un producto y llenar la tabla en /nuevo-pedido
    $r->addRoute(['POST'], '/producto-buscar-id', [productosController::class, 'buscarID']);

    //Ruta para mostrar la pagina de nosotros
    $r->addRoute(['GET'], '/nosotros', [nosotrosController::class, 'index']);

    //Ruta para cerrar la sesion de los usuarios y el administrador
    $r->addRoute(['GET'], '/cerrar-sesion', [sesionController::class, 'cerrarSesion']);

    //Ruta para actualizar el estado de un pedido
    $r->addRoute(['POST'], '/actualizar-estado-pedido', [pedidosController::class, 'actualizar']);

    //Ruta para mostrar la vista para el registro
    $r->addRoute(['POST', 'GET'], '/registro', [loginController::class, 'register']);

    //Ruta para registrar un nuevo cliente
    $r->addRoute(['POST'], '/register-user', [loginController::class, 'registerUser']);

    //Ruta para mostrar los administradores
    $r->addRoute(['GET'], '/administradores', [adminController::class, 'index']);

    //Ruta para mostrar los administradores
    $r->addRoute(['GET', 'POST'], '/nuevo-administrador', [adminController::class, 'nuevo']);





    //Ruta para cargar la tabla de los abonos
    $r->addRoute(['GET', 'POST'], '/abonos/{pagina:\d+}', [abonosController::class, 'listar']);

    //Ruta para cargar la tabla de los clientes
    $r->addRoute(['GET', 'POST'], '/clientes/{pagina:\d+}', [clientesController::class, 'listar']);

    //Ruta para bsucar un cliente
    $r->addRoute(['POST'], '/cliente-buscar', [clientesController::class, 'buscar']);

    $r->addRoute(['GET'], '/cargar-clientes', [clientesController::class, 'cargar']);


    //Ruta para cargar la tabla de las notificaciones
    $r->addRoute(['GET', 'POST'], '/notificaciones/{pagina:\d+}', [notificacionesController::class, 'listar']);

    //Ruta para cargar el formulario para hacer una nueva venta
    $r->addRoute(['GET'], '/nueva-venta', [nuevaVentaController::class, 'index']);

    //Ruta para cargar los datos del formulario para hacer una nueva venta
    $r->addRoute(['POST'], '/nueva-venta', [nuevaVentaController::class, 'buscar']);

    $r->addRoute(['POST'], '/nueva-venta-contado', [nuevaVentaController::class, 'vContado1']);

    $r->addRoute(['POST'], '/nueva-venta-credito', [nuevaVentaController::class, 'Credito1']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['GET'], '/nuevo-cliente', [nuevoClienteController::class, 'index']);

    //Ruta para cargar los datos del formulario para hacer una nueva venta
    $r->addRoute(['POST'], '/nuevo-cliente', [nuevoClienteController::class, 'agregar']);

    //Ruta para hacer un pedido en la base de datos
    $r->addRoute(['POST'], '/nuevo-pedido-agregar', [pedidosClienteController::class, 'agregar']);

    //Ruta para mostrar la pagina de nosotros
    $r->addRoute(['GET'], '/contacto', [contactoController::class, 'index']);


    $r->addRoute(['POST'], '/eliminar-producto', [productosController::class, 'eliminarProducto']);

    $r->addRoute(['POST'], '/resurtir-producto', [productosController::class, 'resurtirProducto']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['GET'], '/nuevo-producto', [nuevoProductoController::class, 'index']);

    //Ruta para cargar el formulario para un nuevo cliente
    $r->addRoute(['POST'], '/nuevo-producto', [nuevoProductoController::class, 'agregar']);

    $r->addRoute(['GET'], '/ticket/{pagina:\d+}', [ticketsController::class, 'index']);

    $r->addRoute(['GET'], '/tickets/{urlArchivo}', [ticketsController::class, 'consulta']);

    $r->addRoute(['GET', 'POST'], '/tickets-buscar', [ticketsController::class, 'buscar']);

    //Ruta para cargar la tabla de las notificaciones
    $r->addRoute(['GET', 'POST'], '/ventas/{pagina:\d+}', [ventasController::class, 'listar']);

    $r->addRoute(['GET', 'POST'], '/ventas-buscar', [ventasController::class, 'buscar']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Página no encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'Método no permitido';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func_array($handler, $vars);
        break;
}
