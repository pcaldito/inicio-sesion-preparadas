CREATE TABLE usuarios(
    idUsuario smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(150) NOT NULL,
    correo varchar(90) NOT NULL UNIQUE,
    pw char(16) NOT NULL
);
