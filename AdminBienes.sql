create table clientes(
id_cliente int not null primary key,
nombre varchar(40) not null,
apellido varchar(40) not null,
genero varchar(20) not null,
f_nacimiento date not null,
correo varchar(40) not null,
num_hijos int not null,
ruta varchar(40) not null);

create table activos(
id_activos int not null primary key,
tipo_activo varchar(40) not null,
id_cliente int not null,
categoria varchar(40) not null,
marca varchar(20) not null,
modelo varchar(20) not null,
descripcion varchar(40) not null,
notas varchar(40),
foreign key(id_cliente)references clientes(id_cliente)
on delete cascade on update cascade
);

create table categoria(
id_categoria int not null auto_increment primary key,
nombre varchar(40) not null
);

create table tipo_activo(
id_activo int not null auto_increment primary key,
nombre varchar(40) not null
);

insert into tipo_activo(nombre) values ('Casa');
insert into tipo_activo(nombre) values ('Apartamento');
insert into tipo_activo(nombre) values ('Finca');
insert into tipo_activo(nombre) values ('Local');
insert into tipo_activo(nombre) values ('Automovil');
insert into tipo_activo(nombre) values ('Motocicleta');
insert into categoria(nombre) values ('Activo corriente');
insert into categoria(nombre) values ('Activo no corriente');
insert into categoria(nombre) values ('Activo financiero');
insert into categoria(nombre) values ('Activo fijo');
insert into categoria(nombre) values ('Activo intangible');
insert into categoria(nombre) values ('Activo subyacente');
insert into categoria(nombre) values ('Activo funcional');

/*Jhonathan, este sql me permite crear las tablas :P*/