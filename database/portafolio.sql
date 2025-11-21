CREATE DATABASE IF NOT EXISTS portafolio_db;
USE portafolio_db;

-- Tabla de comentarios
CREATE TABLE IF NOT EXISTS comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreyapellido VARCHAR(255) NOT NULL,
    usuario VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    nota VARCHAR(1000) NOT NULL,
    fechanota VARCHAR(255) NOT NULL
);

-- Algunos dstos de ejemplo 
INSERT INTO comentarios (nombreyapellido, usuario, email, nota, fechanota) VALUES
('Pedro Picapiedras', 'Pedro_pp', 'pedropicapiedras@gmail.com', '¡Excelente portafolio! Me encanta el diseño y la organización de tus habilidades.', '15/11/2025 10:30:00'),
('Cristiano Ronaldo', NULL, 'Cr7@gmail.com', 'Muy buen trabajo. ¿Tienes algún proyecto en GitHub para ver?', '16/11/2025 14:20:00'),
('Shaggy Royers', 'ShaggyR', 'ShaggyRoyers@gmail.com', 'Interesante tu historia y tus mascotas. Buena suerte con tus estudios de ingeniería.', '17/11/2025 09:15:00');