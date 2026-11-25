CREATE DATABASE IF NOT EXISTS escuela
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE escuela;

DROP TABLE IF EXISTS matricula_asignatura;
DROP TABLE IF EXISTS alumno;
DROP TABLE IF EXISTS asignatura;

CREATE TABLE alumno (
    matricula VARCHAR(6) PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    curso INT NOT NULL
);

CREATE TABLE asignatura (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL
);

CREATE TABLE matricula_asignatura (
    matricula VARCHAR(6) NOT NULL,
    codigo INT NOT NULL,
    PRIMARY KEY (matricula, codigo),
    FOREIGN KEY (matricula) REFERENCES alumno(matricula) ON DELETE CASCADE,
    FOREIGN KEY (codigo) REFERENCES asignatura(codigo) ON DELETE CASCADE
);

INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES
('A00001', 'Lucía',   'García Martín',     1),
('A00002', 'Carlos',  'Fernández Ruiz',    1),
('A00003', 'Marta',   'López Sánchez',     1),
('A00004', 'Javier',  'Pérez Gómez',       2),
('A00005', 'Elena',   'Romero Díaz',       2),
('A00006', 'Pablo',   'Navarro Torres',    2),
('A00007', 'Sara',    'Jiménez Castro',    3),
('A00008', 'David',   'Moreno Ortega',     3),
('A00009', 'Laura',   'Álvarez Ramos',     3),
('A00010', 'Andrés',  'Gutiérrez Molina',  3);

INSERT INTO asignatura (nombre) VALUES
('Programación'),
('Bases de Datos'),
('Entornos de Desarrollo'),
('Lenguajes de Marcas'),
('Sistemas Informáticos'),
('Desarrollo Web en Entorno Servidor');

INSERT INTO matricula_asignatura (matricula, codigo) VALUES
('A00001', 1), ('A00001', 2), ('A00001', 4),
('A00002', 1), ('A00002', 3),
('A00003', 2), ('A00003', 5),
('A00004', 1), ('A00004', 6),
('A00005', 2), ('A00005', 6),
('A00006', 3), ('A00006', 5),
('A00007', 1), ('A00007', 2), ('A00007', 6),
('A00008', 4), ('A00008', 5),
('A00009', 2), ('A00009', 3),
('A00010', 1), ('A00010', 6);


/*Ejecutar Script
docker exec -i mysql_db mysql -u root -proot < banco.sql

Borrarlo en el caso de que exista
docker exec mysql_db mysql -u root -proot -e "DROP DATABASE IF EXISTS banco;"

Comprobar que se ha creado correctamente
docker exec -i mysql_db mysql -u root -proot -e "USE escuela; SHOW TABLES; SELECT * FROM alumno;"
*/