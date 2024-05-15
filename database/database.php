<?php

class Base {
    function ConexionBD(){
        $host = 'sql.freedb.tech';  // Cambia esto al host de tu servidor MySQL
        $dbname = 'freedb_Chantoro';    // Cambia esto al nombre de tu base de datos MySQL
        $username = 'freedb_admin2134';   // Cambia esto al nombre de usuario de tu MySQL
        $password = 'mKXWrKQ7DK*E8D?';  // Cambia esto a la contraseña de tu MySQL

        try {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }
}




