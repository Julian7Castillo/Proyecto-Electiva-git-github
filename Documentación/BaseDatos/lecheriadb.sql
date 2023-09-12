/* Crear base de datos */
CREATE DATABASE lecheriadb;
USE lecheriadb;

CREATE TABLE usuarios
(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    id_rol INT NOT NULL,
    nombre_usuario VARCHAR(50) NOT NULL,
    apellido_usuario VARCHAR(20) NOT NULL,
    direccion VARCHAR(30) NOT NULL,
    celular VARCHAR(10) NOT NULL,
    correo VARCHAR(50),
    clave VARCHAR(50)
);

CREATE TABLE roles
(
	id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre_rol VARCHAR(30) NOT NULL
);

ALTER TABLE usuarios ADD FOREIGN KEY (id_rol) REFERENCES roles (id_rol);

CREATE TABLE recolecciones
(
	id_recoleccion INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    litros_leche INT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES usuarios (id_usuario)
);

CREATE TABLE historial
(
	id_usuario INT,
    PRIMARY KEY (id_usuario),
    fecha DATE NOT NULL,
    accion VARCHAR(30) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
);

CREATE TABLE rutas
(
	id_ruta INT PRIMARY KEY AUTO_INCREMENT,
    sector VARCHAR(30) NOT NULL,
    descripcion VARCHAR(500) NOT NULL
);

DROP DATABASE lecheriadb;