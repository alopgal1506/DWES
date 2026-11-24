CREATE DATABASE IF NOT EXISTS ejercicio1
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ejercicio1;

DROP TABLE IF EXISTS articulo;

CREATE TABLE articulo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    fecha_publicacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    contenido TEXT NOT NULL
);

INSERT INTO articulo (titulo, fecha_publicacion, contenido) VALUES
('Introducción a PHP', '2025-09-05 10:15:00',
 'PHP es un lenguaje de programación del lado del servidor muy utilizado en el desarrollo web. En este artículo repasamos sus características principales y cómo ejecutar tu primer script.'),

('Qué es una base de datos relacional', '2025-09-12 18:30:00',
 'Una base de datos relacional organiza la información en tablas formadas por filas y columnas. Las tablas se relacionan entre sí mediante claves primarias y claves foráneas.'),

('Conectar PHP con MySQL usando PDO', '2025-09-20 09:00:00',
 'PDO ofrece una interfaz común para acceder a distintos gestores de bases de datos. Veremos cómo crear una conexión, ejecutar consultas y usar sentencias preparadas para evitar la inyección SQL.'),

('Consejos para escribir código limpio', '2025-10-03 16:45:00',
 'Usar nombres descriptivos, escribir funciones cortas y comentar solo lo necesario son hábitos que mejoran la legibilidad y el mantenimiento de cualquier proyecto.'),

('Paginación de resultados en PHP', '2025-10-14 12:20:00',
 'Cuando una tabla tiene muchos registros conviene mostrarlos por páginas. Con LIMIT y OFFSET en SQL y un par de enlaces en HTML se consigue de forma sencilla.'),

('Sesiones y cookies', '2025-10-28 20:10:00',
 'Las sesiones permiten guardar información del usuario en el servidor entre peticiones, mientras que las cookies se almacenan en el navegador. Cada una tiene sus usos y sus riesgos de seguridad.'),

('Formularios y validación de datos', '2025-11-06 11:05:00',
 'Nunca hay que fiarse de los datos que llegan del usuario. Validar en el servidor y escapar la salida con htmlspecialchars evita errores y ataques como XSS.'),

('Introducción a las consultas JOIN', '2025-11-15 17:40:00',
 'JOIN permite combinar filas de dos o más tablas a partir de una columna relacionada. Los tipos más habituales son INNER JOIN, LEFT JOIN y RIGHT JOIN.'),

('Buenas prácticas con Git', '2025-11-19 08:50:00',
 'Hacer commits pequeños y con mensajes claros, trabajar en ramas y revisar los cambios antes de fusionar ayuda a mantener un historial ordenado y colaborar mejor.'),

('Novedades del curso', '2025-11-23 13:00:00',
 'Esta semana hemos terminado el módulo de acceso a datos y comenzamos con el desarrollo de aplicaciones web con PHP. ¡Ánimo con las prácticas!');