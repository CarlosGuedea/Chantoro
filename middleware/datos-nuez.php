<?php
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

// Realizar la consulta para obtener el precio del producto con ID 4
$stmt = $con->prepare('SELECT Precio FROM Productos WHERE ProductoID = 4');
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener el precio del primer resultado
$Precio = $resultados['Precio'];


// Realizar la consulta para obtener el precio del producto con ID 4
$stmt = $con->prepare('SELECT Stock FROM Productos WHERE ProductoID = 4');
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener el precio del primer resultado
$Stock = $resultados['Stock'];


//MIEL
// Realizar la consulta para obtener el precio del producto con ID 6
$stmt = $con->prepare('SELECT Precio FROM Productos WHERE ProductoID = 11');
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener el precio del primer resultado
$PrecioMiel = $resultados['Precio'];



//HUEVO
// Realizar la consulta para obtener el precio del producto con ID 1
$stmt = $con->prepare('SELECT Precio FROM Productos WHERE ProductoID = 1');
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener el precio del primer resultado
$PrecioHuevo = $resultados['Precio'];


//NOPAL
// Realizar la consulta para obtener el precio del producto con ID 3
$stmt = $con->prepare('SELECT Precio FROM Productos WHERE ProductoID = 3');
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener el precio del primer resultado
$PrecioNopal = $resultados['Precio'];