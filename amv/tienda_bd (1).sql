-- Eliminar usuario si existe
DROP USER IF EXISTS 'MEDAC'@'localhost';

-- Eliminar base de datos si existe
DROP SCHEMA IF EXISTS tienda_bd;

-- SOLO SI NO ESTÁ CREADO
CREATE USER 'MEDAC'@'localhost' IDENTIFIED BY 'MEDAC';
GRANT ALL PRIVILEGES ON tienda_bd.* TO 'MEDAC'@'localhost';
FLUSH PRIVILEGES;

-- Crear base de datos
CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol VARCHAR (255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE proveedores (
    nombre_proveedor VARCHAR(255) PRIMARY KEY,
    ciudad VARCHAR (255) NOT NULL,
    cif VARCHAR (255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    nombre_proveedor VARCHAR(255) NOT NULL,
    FOREIGN KEY (nombre_proveedor) REFERENCES proveedores(nombre_proveedor)
) ENGINE=InnoDB;


INSERT INTO proveedores (nombre_proveedor, ciudad, cif) VALUES
('TechSupply S.L.', 'Madrid', 'B12345678'),
('ElectroDistribuciones', 'Barcelona', 'B23456789'),
('MuebleHogar S.A.', 'Valencia', 'A34567890'),
('Deportes y Más', 'Sevilla', 'B45678901');


INSERT INTO productos (nombre, categoria, precio, stock, nombre_proveedor) VALUES
('Portátil HP 15-dw3000', 'Informática', 649.99, 25, 'TechSupply S.L.'),
('Mouse Logitech MX Master 3', 'Informática', 89.99, 50, 'TechSupply S.L.'),
('Televisor Samsung 55" 4K', 'Electrónica', 599.00, 15, 'ElectroDistribuciones'),
('Auriculares Sony WH-1000XM4', 'Electrónica', 279.99, 30, 'ElectroDistribuciones'),
('Sofá 3 plazas gris', 'Hogar', 449.00, 8, 'MuebleHogar S.A.'),
('Mesa de comedor extensible', 'Hogar', 299.99, 12, 'MuebleHogar S.A.'),
('Estantería modular blanca', 'Hogar', 159.00, 20, 'MuebleHogar S.A.'),
('Bicicleta de montaña 29"', 'Deportes', 499.99, 10, 'Deportes y Más'),
('Balón de fútbol Nike', 'Deportes', 29.99, 75, 'Deportes y Más'),
('Teclado mecánico RGB', 'Informática', 119.99, 40, 'TechSupply S.L.');
