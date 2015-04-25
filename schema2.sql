CREATE TABLE linea(
   	cod_linea char(9) not null,
	nombre_linea char(25) not null,	
	PRIMARY KEY (cod_linea)
	);
	
CREATE TABLE proyecto(
	cod_proyecto char(9) not null,
	titulo char(150) not null,
	resumen char(255) not null,
   	fecha_inicio date,
   	fecha_final date,
	estado char(20) not null,
	cod_linea char(9),
	PRIMARY KEY(cod_proyecto),
	FOREIGN KEY (cod_linea) REFERENCES linea(cod_linea)
	);
	
CREATE TABLE persona(
        cedula char(9) not null,
        cod_alumno char(9) not null,
        nombre char(25) not null,
        apellido char(25) not null,
        correo char(25) not null,
        cod_programa char(9) not null,
        PRIMARY KEY(cedula),
        FOREIGN KEY (cod_programa) REFERENCES programa(cod_programa)
	);

CREATE TABLE proyecto_persona(
   	cod_proyecto char(10) not null,
   	cedula char(9) not null,
	estado char(10) not null,
	tipo char(15) not null,
	PRIMARY KEY (cod_proyecto, cedula),
	FOREIGN KEY (cod_proyecto) REFERENCES proyecto(cod_proyecto),
	FOREIGN KEY (cedula) REFERENCES persona(cedula)
	);

create table persona_telefono(
	cedula varchar(15) ,
	num_telefono varchar(13),
	primary key (cedula ,num_telefono ),
	CONSTRAINT persona_telefono
	FOREIGN KEY (cedula ) REFERENCES persona(cedula) 
);
create table persona_correo(
	cedula varchar(15) ,
	nom_correo varchar(30),
	primary key (cedula ,nom_correo),
	CONSTRAINT persona_correo
	FOREIGN KEY (cedula ) REFERENCES   persona(cedula) 
);


create table programa(
	cod_programa varchar(6)  primary key ,
	nom_programa varchar(30) 
);

INSERT INTO persona VALUES
('1612','111','Borja','Martinez','martinez@hotmail.com','1'),
('1784','222','Carlos','Gutierrez','gutierrez@hotmail.com','1'),
('6254','333','Daniela','Guzman','guzman@hotmail.com','1'),
("1264","444","Lizeth","Contreras","contreras@hotmail.com ","1"),
('6245','555','Andres','Novoa','novoa@hotmail.com','1'),
('7845','666','Juan','Botero','botero@hotmail.com','1'),
('9856','777','Esperanza','Merchan','merchan@hotmail.com','1'),
('3245','888','Fernando','Sotelo','sotelo@hotmail.com','1'),
('9546','999','Miguel','Ojeda','ojeda@hotmail.com','1');


INSERT INTO proyecto VALUES
('1501','titulo1_proy','resumen1_proy','1/1/2015','30/5/2015','aprobado','1'),
('1502','titulo2_proy','resumen2_proy','1/6/2015','30/12/2015','aprobado','1'),
('1511','titulo3_proy','resumen3_proy','1/1/2016','30/5/2016','aprobado','1'),
('1512','titulo4_proy','resumen4_proy','1/6/2016','30/12/2016','aprobado','1');


INSERT INTO proyecto_persona VALUES
('1501','7845','activo','director'),
('1502','9856','inactivo','jurado'),
('1511','3245','activo','director'),
('1512','9546','activo','jurado'),
('1501','1612','activo','estudiante'),
('1511','1784','inactivo','estudiante'),
('1502','1524','activo','estudiante'),
('1511','1264','activo','estudiante'),
('1512','6254','activo','estudiante');
