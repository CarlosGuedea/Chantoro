<?php

$db = new Base;
$con = $db->ConexionBD();

// Obtiene el ID del producto a eliminar desde el formulario POST
    $EventoID = $_POST["EventoID"];

    // Ejecuta la consulta para eliminar el producto
    $consulta = "DELETE FROM Agenda WHERE EventoID = :EventoID";
    $stmt = $con->prepare($consulta);
    $stmt->bindParam(":EventoID", $EventoID, PDO::PARAM_INT);
    $stmt->execute();

    // Redirige de vuelta a la página de productos después de eliminar
    header("Location: /agenda/1");

?>