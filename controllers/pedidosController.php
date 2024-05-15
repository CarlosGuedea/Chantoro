<?php

class pedidosController{

    public static function listar($pagina){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/pedidos-mostrar.php';
        include 'views/pedidos/pedidos.php';
    }

    public static function actualizar(){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/actualizar-estado-pedido.php';
    }

}