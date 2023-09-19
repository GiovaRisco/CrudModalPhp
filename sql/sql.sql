create database cinema;
use cinema;
create table genero(
id int not null auto_increment,
nombre varchar(60) not null,
primary key (id)
);

create table pelicula(
id int not null auto_increment,
nombre varchar(60) not null,
descripcion text not null,
id_genero int not null,
fecha_alta datetime default current_timestamp() not null,
primary key (id),
constraint FK_pelicula_genero foreign key (id_genero)
references genero(id)
);

insert into genero(nombre) values
('Accion'),
('Ciencia Ficcion'),
('Comedia'),
('Documental'),
('Drama'),
('Fantasia'),
('Melodrama'),
('Musical'), 
('Romance'),
('Suspenso'),
('Terror');

select * from pelicula;
select * from genero;
describe genero;