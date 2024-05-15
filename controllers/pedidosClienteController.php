<?php

class pedidosClienteController{

    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/pedidos-cliente-mostrar.php';
        include 'views/clientes_archivos/pedidos/pedidos.php';
    }

    public static function nuevo(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'views/clientes_archivos/nuevo_pedido/nuevo-pedido.php';
    }

    public static function agregar(){
        include 'database/database.php';
        include 'middleware/autenticacion-user.php';
        include 'middleware/nueva-venta-contado.php';
    }

}