<?php

$db = new Base;
$con = $db->ConexionBD();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // Preparación de la consulta SQL
        $stmt = $con->prepare("INSERT INTO Agenda (FechaInicio, FechaFin, Descripcion) VALUES (?, ?, ?)");

        // Recuperar y validar los valores del POST
        $FechaInicio = isset($_POST['FechaInicio']) ? $_POST['FechaInicio'] : null;
        $FechaFin = isset($_POST['FechaFin']) ? $_POST['FechaFin'] : null;
        $Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : null;

        // Validar y sanear los datos si es necesario

        // Asignación de valores a la consulta SQL
        $stmt->bindParam(1, $FechaInicio);
        $stmt->bindParam(2, $FechaFin);
        $stmt->bindParam(3, $Descripcion);

        // Ejecución de la consulta SQL
        $stmt->execute();

        // Cerrar la conexión a la base de datos
        $con = null;

        // Redirigir a la página principal de la agenda
        header('Location: /agenda/1');
        exit;
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la base de datos: " . $e->getMessage();
    } catch (Exception $e) {
        // Manejar otros errores
        echo "Error: " . $e->getMessage();
    }
}
