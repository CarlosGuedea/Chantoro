<?php

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();


// Realizar la consulta para obtener los elementos de la página actual
$stmt = $con->prepare('SELECT * from Usuarios ORDER BY UsuarioID');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);