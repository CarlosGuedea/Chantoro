<?php
// guardar-cambios.php

// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si los datos esperados están presentes
    if (isset($data['id_producto'], $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'])) {
        // Puedes realizar operaciones de base de datos o almacenar los datos como desees
        $idProducto = $data['id_producto'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $stock = $data['stock'];

        // Aquí puedes realizar la lógica para actualizar los datos en la base de datos
        // Por ejemplo, podrías usar un objeto PDO para interactuar con la base de datos

        $stmt = $con->prepare("UPDATE Productos SET NombreProducto=?, Descripcion=?, Precio=?, Stock=? WHERE ProductoID=?");
        $stmt->execute([$nombre, $descripcion, $precio, $stock, $idProducto]);

        // Puedes enviar una respuesta JSON al cliente si es necesario
        $response = ['success' => true, 'message' => 'Datos guardados exitosamente'];
        echo json_encode($response);
        exit();
    }
}

// Si la solicitud no es válida o falta información, envía una respuesta de error
$response = ['success' => false, 'message' => 'Error en la solicitud o datos incompletos'];
echo json_encode($response);