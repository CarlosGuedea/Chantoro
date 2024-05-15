<?php
/*
Autor: Carlos Eduardo Guedea Guerrero
Objetivo: Ingresar en la base datos un nuevo cliente
*/

//Conexión a la base de datos
$db = new Base;
$con = $db->ConexionBD();

if(isset($_POST["NombreUsuario"])){
// Obtener los datos del formulario
$NombreUsuario = $_POST["NombreUsuario"];
$Contraseña = $_POST["Contraseña"];
$Rol = $_POST["Rol"];

// Consulta SQL para insertar datos
$sql = "INSERT INTO Usuarios (NombreUsuario, Contraseña, Rol) VALUES (?, ?, ?)";

// Preparar la consulta
$stmt = $con->prepare($sql);
$stmt->bindParam(1, $NombreUsuario);
$stmt->bindParam(2, $Contraseña);
$stmt->bindParam(3, $Rol);


try {
    $stmt->execute();
    // Devolver una respuesta de éxito
    http_response_code(200);
    header('Location: /administradores');
} catch (PDOException $ex) {
    // Devolver una respuesta de error
    http_response_code(500);
    echo 'Error al agregar cliente: ' . $ex->getMessage();
}
}

?>