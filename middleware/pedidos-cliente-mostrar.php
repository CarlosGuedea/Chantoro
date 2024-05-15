<?php 
// Establecer la conexión a la base de datos MySQL
$db = new Base;
$con = $db->ConexionBD();

$ClienteID = $_SESSION['ID'];

// Realizar la consulta para obtener los datos de los pedidos
$stmt = $con->prepare('SELECT
Pedidos.PedidoID,
Pedidos.FechaPedido,
Clientes.ClienteID,
Clientes.Nombre AS NombreCliente,
DetallesPedidos.ProductoID,
Productos.NombreProducto,
DetallesPedidos.Cantidad,
DetallesPedidos.PrecioUnitario,
Pedidos.Surtido
FROM
Pedidos
JOIN
Clientes ON Pedidos.ClienteID = Clientes.ClienteID
JOIN
DetallesPedidos ON Pedidos.PedidoID = DetallesPedidos.PedidoID
JOIN
Productos ON DetallesPedidos.ProductoID = Productos.ProductoID
WHERE
Clientes.ClienteID = :ClienteID;');
$stmt->bindParam(':ClienteID', $ClienteID);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);