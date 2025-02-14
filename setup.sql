CREATE DATABASE IF NOT EXISTS departamentos;
USE departamentos;

CREATE TABLE departamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
);

CREATE TABLE municipios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  departamento_id INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
);

CREATE TABLE distritos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  municipio_id INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  FOREIGN KEY (municipio_id) REFERENCES municipios(id)
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  edad INT NOT NULL,
  sexo VARCHAR(10) NOT NULL,
  correo VARCHAR(150) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  departamento_id INT NOT NULL,
  municipio_id INT NOT NULL,
  distrito_id INT NOT NULL,
  fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  activo TINYINT(1) DEFAULT 1,
  FOREIGN KEY (departamento_id) REFERENCES departamentos(id),
  FOREIGN KEY (municipio_id) REFERENCES municipios(id),
  FOREIGN KEY (distrito_id) REFERENCES distritos(id)
);

INSERT INTO departamentos (nombre) VALUES ('Chalatenango'), ('San Salvador');

INSERT INTO municipios (departamento_id, nombre) VALUES 
  (1, 'Chalatenango Sur'),
  (1, 'Chalatenango Norte'),
  (1, 'Chalatenango Centro');

INSERT INTO municipios (departamento_id, nombre) VALUES 
  (2, 'San Salvador Sur'),
  (2, 'San Salvador Norte'),
  (2, 'San Salvador Centro');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (1, 'Chalatenango'),
  (1, 'San Miguel de Mercedes');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (2, 'Citala'),
  (2, 'La Palma');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (3, 'Tejutla'),
  (3, 'Nueva Concepcion');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (4, 'San Marcos'),
  (4, 'Panchimalco');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (5, 'Aguilares'),
  (5, 'El Paisnal');

INSERT INTO distritos (municipio_id, nombre) VALUES 
  (6, 'Ciudad Delgado'),
  (6,  'San Salvador');

