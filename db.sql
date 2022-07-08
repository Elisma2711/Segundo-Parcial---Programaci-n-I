CREATE TABLE usuario(
    id int primary key auto_increment,
    username varchar(50) unique,
    complete_name varchar(50),
    password varchar(255),
    bajaLogica boolean default 0
);

CREATE TABLE publicacion(
    id int primary key auto_increment,
    autor varchar(50),
    fechaHora datetime,
    cuerpo varchar(255),
    bajaLogica voolean default 0,
    

    FOREIGN KEY (autor) REFERENCES usuario(username)
);


CREATE TABLE carga(
    idUsuario int,
    idPublicacion int primary key,

    FOREIGN KEY (idUsuario) REFERENCES usuario(id),
    FOREIGN KEY (idPublicacion) REFERENCES publicacion(id)
);
