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
    if (isset($data['EventoID'], $data['FechaInicio'], $data['FechaFin'], $data['Descripcion'])) {
        // Puedes realizar operaciones de base de datos o almacenar los datos como desees
        $EventoID = $data['EventoID'];
        $FechaInicio = $data['FechaInicio'];
        $FechaFin = $data['FechaFin'];
        $Descripcion = $data['Descripcion'];

        // Aquí puedes realizar la lógica para actualizar los datos en la base de datos
        // Por ejemplo, podrías usar un objeto PDO para interactuar con la base de datos

        $stmt = $con->prepare("UPDATE Agenda SET FechaInicio=?, FechaFin=?, Descripcion=? WHERE EventoID=?");
        $stmt->execute([$EventoID, $FechaInicio, $FechaFin, $Descripcion]);

        // Puedes enviar una respuesta JSON al cliente si es necesario
        $response = ['success' => true, 'message' => 'Datos guardados exitosamente'];
        echo json_encode($response);
        exit();
    }
}

// Si la solicitud no es válida o falta información, envía una respuesta de error
$response = ['success' => false, 'message' => 'Error en la solicitud o datos incompletos'];
echo json_encode($response);