-- Crear la tabla Clientes
CREATE TABLE Clientes (
    ClienteID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255),
    Apellido VARCHAR(255),
    CorreoElectronico VARCHAR(255),
    Telefono VARCHAR(15)
    -- Otros campos relevantes a los clientes
);

-- Crear la tabla Usuarios
CREATE TABLE Usuarios (
    UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    NombreUsuario VARCHAR(255),
    Contraseña VARCHAR(255),
    Rol VARCHAR(50)
    -- Otros campos relacionados con usuarios
);

-- Crear la tabla Productos
CREATE TABLE Productos (
    ProductoID INT PRIMARY KEY AUTO_INCREMENT,
    NombreProducto VARCHAR(255),
    Descripcion TEXT,
    Precio DECIMAL(10, 2),
    Stock DOUBLE
    -- Otros campos relacionados con productos
);

-- Crear la tabla Notificaciones
CREATE TABLE Notificaciones (
    NotificacionID INT PRIMARY KEY AUTO_INCREMENT,
    Mensaje TEXT,
    FechaEnvio TIMESTAMP,
    Leido BOOLEAN,
    TipoEvento ENUM('StockTerminado', 'NuevoPedido', 'PedidoCancelado', 'RecordatorioAgenda', 'NuevoCliente'),
    -- Otros campos relacionados con notificaciones
);

-- Crear la tabla Pedidos
CREATE TABLE Pedidos (
    PedidoID INT PRIMARY KEY AUTO_INCREMENT,
    FechaPedido TIMESTAMP,
    ClienteID INT,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
    -- Otros campos relacionados con pedidos
);

-- Crear la tabla DetallesPedidos para contener los productos en cada pedido
CREATE TABLE DetallesPedidos (
    DetalleID INT PRIMARY KEY AUTO_INCREMENT,
    PedidoID INT,
    ProductoID INT,
    Cantidad INT,
    PrecioUnitario DECIMAL(10, 2),
    Total DECIMAL(10, 2),
    FOREIGN KEY (PedidoID) REFERENCES Pedidos(PedidoID),
    FOREIGN KEY (ProductoID) REFERENCES Productos(ProductoID)
    -- Otros campos relacionados con detalles de pedidos
);

-- Crear la tabla Contabilidad
CREATE TABLE Contabilidad (
    TransaccionID INT PRIMARY KEY AUTO_INCREMENT,
    FechaTransaccion TIMESTAMP,
    Tipo VARCHAR(50),
    Monto DECIMAL(10, 2),
    Descripcion TEXT
    -- Otros campos relevantes a la contabilidad
);

-- Crear la tabla Agenda
CREATE TABLE Agenda (
    EventoID INT PRIMARY KEY AUTO_INCREMENT,
    FechaInicio TIMESTAMP,
    FechaFin TIMESTAMP,
    Descripcion TEXT
    -- Otros campos relacionados con la agenda
);

-- Modificar la tabla Usuarios para utilizar un ENUM en la columna Rol
ALTER TABLE Usuarios
MODIFY COLUMN Rol ENUM('administrador', 'empleado');

ALTER TABLE Usuarios
ADD COLUMN Token VARCHAR(255);