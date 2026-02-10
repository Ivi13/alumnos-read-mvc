CREATE DATABASE IF NOT EXISTS centros CHARACTER SET utf8mb4;
USE centros;

DROP TABLE IF EXISTS alumno;

CREATE TABLE alumno (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL,
  email VARCHAR(120),
  edad INT NOT NULL,
  fecha_creacion DATETIME NOT NULL
);

INSERT INTO alumno (nombre, email, edad, fecha_creacion) VALUES
('Lucía Gómez', 'lucia@correo.com', 19, '2026-02-01 10:00:00'),
('Mario Pérez', 'mario@correo.com', 22, '2026-02-02 11:30:00'),
('Sara Ruiz', '', 20, '2026-02-03 09:15:00');
