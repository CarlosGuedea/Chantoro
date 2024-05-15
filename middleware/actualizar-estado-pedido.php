<?php

$db = new Base;
$con = $db->ConexionBD();

$pedidoID = $_POST['pedidoID'];

// Consulta SQL para actualizar el estado del pedido
    $sql = "UPDATE Pedidos SET Surtido = 1 WHERE PedidoID = $pedidoID";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Estado del pedido actualizado correctamente";
    } else {
        echo "Error al actualizar el estado del pedido: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();

    //Redirigir
    header('Location: /pedidos/1');