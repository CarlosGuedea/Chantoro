<?php
class loginclienteController
{
    public static function index()
    {
        include 'database/database.php';
        include 'views/clientes_archivos/login_cliente/login-cliente.php';
    }

    public static function autenticar()
    {
        include 'database/database.php';
        include 'middleware/login-user.php';
        include 'views/clientes_archivos/login_cliente/login-cliente.php';
    }
}
