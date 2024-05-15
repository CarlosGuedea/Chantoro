<?php

class ventaController{

    public static function nuezVenta(){
        include 'database/database.php';
        include 'middleware/datos-nuez.php';
        include 'views/articulos/nuez/nuez.php';
    }

    public static function mielVenta(){
        include 'database/database.php';
        include 'middleware/datos-miel.php';
        include 'views/articulos/miel/miel.php';
    }

    public static function nopalVenta(){
        include 'database/database.php';
        include 'middleware/datos-nopal.php';
        include 'views/articulos/nopal/nopal.php';
    }

    public static function maracuyaVenta(){
        include 'database/database.php';
        include 'middleware/datos-maracuya.php';
        include 'views/articulos/maracuya/maracuya.php';
    }

    public static function huevoVenta(){
        include 'database/database.php';
        include 'middleware/datos-huevo.php';
        include 'views/articulos/huevo/huevo.php';
    }

    public static function guayabaVenta(){
        include 'database/database.php';
        include 'middleware/datos-guayaba.php';
        include 'views/articulos/guayaba/guayaba.php';
    }

}

?>