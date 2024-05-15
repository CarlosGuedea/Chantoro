<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Realizar la consulta para obtener los productos
$stmt = $con->prepare('SELECT ProductoID, NombreProducto FROM Productos ORDER BY ProductoID');
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear un arreglo de productos
$productos = [];

foreach ($resultados as $row) {
    $productos[] = [
        'ProductoID' => $row['ProductoID'],
        'NombreProducto' => $row['NombreProducto']
    ];
}

// Devolver los productos como JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>
