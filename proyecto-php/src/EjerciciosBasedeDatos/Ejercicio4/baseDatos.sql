CREATE DATABASE IF NOT EXISTS almacen CHARACTER SET utf8 COLLATE utf8_general_ci;
USE almacen;

CREATE TABLE articulo (
    codigo        VARCHAR(10)   PRIMARY KEY,
    descripcion   VARCHAR(100)  NOT NULL,
    precioCompra  DECIMAL(10,2) NOT NULL,
    precioVenta   DECIMAL(10,2) NOT NULL,
    stock         INT UNSIGNED  NOT NULL DEFAULT 0
);

INSERT INTO articulo (codigo, descripcion, precioCompra, precioVenta, stock) VALUES
('A001', 'Teclado USB',      8.50, 15.00, 20),
('A002', 'Ratón inalámbrico', 6.00, 12.50, 35),
('A003', 'Monitor 24"',      90.00, 140.00, 8),
('A004', 'Webcam HD',        15.00, 29.99, 12),
('A005', 'Auriculares',      10.00, 22.00, 25),
('A006', 'Alfombrilla',       2.00,  5.00, 50);