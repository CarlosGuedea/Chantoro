<?php

// Establecer la conexión a la base de datos
$db = new Base;
$con = $db->ConexionBD();

// Validar y sanitizar el correo electrónico del formulario
$correoElectronico = filter_var($_POST['CorreoElectronico'], FILTER_SANITIZE_EMAIL);

// Consultar si el cliente ya está registrado
$stmt = $con->prepare("SELECT CorreoElectronico FROM Clientes WHERE CorreoElectronico = ?");
$stmt->bindParam(1, $correoElectronico);
$stmt->execute();

// Verificar si se encontró algún cliente con el mismo correo electrónico
if ($stmt->rowCount() > 0) {
    // El cliente ya está registrado
    $response = array(
        'success' => false,
        'message' => 'El cliente con este correo electrónico ya está registrado.'
    );
} else {
    // El cliente no está registrado, realizar la inserción en la base de datos
    try {
        // Preparar la consulta SQL para insertar un nuevo cliente
        $stmt = $con->prepare("INSERT INTO Clientes (Nombre, Apellido, CorreoElectronico, Telefono, Contrasena, Direccion) VALUES (?, ?, ?, ?, ?, ?)");

        // Recuperar y validar los valores del formulario
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
        $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);

        // Asignar los valores a la consulta SQL
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido);
        $stmt->bindParam(3, $correoElectronico);
        $stmt->bindParam(4, $telefono);
        $stmt->bindParam(5, $contrasena);
        $stmt->bindParam(6, $direccion);

        // Ejecutar la consulta SQL
        $stmt->execute();

        // Registro exitoso
        $response = array(
            'success' => true,
            'message' => 'Usuario registrado con éxito.'
        );
    } catch (PDOException $ex) {
        // Error en la base de datos
        $response = array(
            'success' => false,
            'message' => 'Error al registrar el usuario: ' . $ex->getMessage()
        );
    }
}

header('Location: /login');


?>
