<?php

class agendaController{

    public static function index($pagina){
        include 'database/database.php';
        include 'middleware/login-admin.php';
        include 'middleware/agenda-mostrar.php';
        include 'views/agenda/agenda.php';
    }

    public static function nuevo(){
        include 'database/database.php';
        include 'middleware/login-admin.php';
        include 'views/nuevo_agenda/nuevo-agenda.php';
    }

    public static function insertar(){
        include 'database/database.php';
        include 'middleware/agenda-nuevo.php';
    }

    public static function eliminar(){
        include 'database/database.php';
        include 'middleware/agenda-eliminar.php';
    }

    public static function gurdarCambiosAgenda(){
        include 'database/database.php';
        include 'middleware/guardar-cambios-agenda.php';
    }
}

?>