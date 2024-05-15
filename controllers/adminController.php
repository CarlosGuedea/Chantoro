<?php
class adminController{

    public static function index(){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/admin-consultar.php';
        include 'views/administradores/administradores.php';
    }

    public static function nuevo(){
        include 'database/database.php';
        include 'middleware/autenticacion-admin.php';
        include 'middleware/admin-nuevo.php';
        include 'views/nuevo_administrador/nuevo-administrador.php';
    }
}