create table profesor(
	cedula varchar(15) primary key ,
	nom_profesor varchar(20) ,
	ape_profesor varchar(20) 
);

create table profesor_telefono(
	cod_profesor varchar(15) ,
	num_telefono varchar(13),
	primary key (cod_profesor ,num_telefono ),
	CONSTRAINT profesor_telefono
	FOREIGN KEY (cod_profesor ) REFERENCES profesor(cedula) 
);
create table profesor_correo(
	cod_profesor varchar(15) ,
	nom_correo varchar(30),
	primary key (cod_profesor ,nom_correo),
	CONSTRAINT profesor_correo
	FOREIGN KEY (cod_profesor ) REFERENCES   profesor(cedula) 
);

create table proyecto(
	cod_proyecto varchar(10) not null,
	titulo varchar(20) ,
	resumen varchar(255) ,
	estado varchar(10) ,
	fecha_inicio date,
	fecha_aprovacion date,
	primary key(cod_proyecto)
);

create table profesor_proyecto(
	cod_proyecto varchar(10),
	cod_profesor varchar(15),
	rol varchar(8),
	calificacion varchar(8),
	primary key(cod_proyecto,cod_profesor),
	FOREIGN key(cod_profesor) REFERENCES profesor(cedula),
	FOREIGN key(cod_proyecto) REFERENCES proyecto(cod_proyecto)	
);

create table estudiante(
	cod_estudiante varchar(9) not null,
	cedula varchar(12),
	ape_estudiante varchar(10),
	nom_estudiante varchar(10),
	cod_proyecto varchar(10) not null,
	primary key(cod_estudiante),
	CONSTRAINT estudiante_proyecto
	FOREIGN KEY (cod_proyecto ) REFERENCES   proyecto(cod_proyecto ) 
);
create table estudiante_telefono(
	cod_estudiante varchar(9) ,
	num_telefono varchar(13),
	primary key (cod_estudiante ,num_telefono ),
	CONSTRAINT estudiante_telefono
	FOREIGN KEY (cod_estudiante ) REFERENCES   estudiante(cod_estudiante ) 
);
create table estudiante_correo(
	cod_estudiante varchar(9) ,
	nom_correo varchar(30),
	primary key (cod_estudiante ,nom_correo ),
	CONSTRAINT correo_estudiante FOREIGN KEY (cod_estudiante ) 
	REFERENCES   estudiante(cod_estudiante ) 
);
create table programa(
	cod_programa varchar(6)  primary key ,
	nom_programa varchar(30) 
);

create table linea(
	cod_linea varchar(10),
	nom_linea varchar(50) ,
	cod_programa varchar(10),
	primary key(cod_linea,cod_programa),
	CONSTRAINT programa_linea
	FOREIGN KEY (cod_programa ) REFERENCES   programa(cod_programa ) 
);

create table linea_proyecto(
	cod_linea varchar(10),
	cod_proyecto varchar(10),
	cod_programa varchar(10),
	primary key (cod_linea, cod_proyecto),
	CONSTRAINT proyecto_linea 
	FOREIGN KEY (cod_proyecto) REFERENCES proyecto(cod_proyecto),
	CONSTRAINT linea_proyecto
	FOREIGN KEY (cod_linea,cod_programa) REFERENCES linea(cod_linea, cod_programa)
);

INSERT INTO profesor VALUES
('6245','Andres','Novoa'),
('7845','Juan','Botero'),
('9856','Esperanza','Merchan'),
('3245','Fernando','Sotelo'),
('9546','Miguel','Ojeda');

INSERT INTO proyecto VALUES
('1501','titulo1_proy','resumen1_proy','1/1/2015','30/5/2015','aprobado'),
('1502','titulo2_proy','resumen2_proy','1/6/2015','30/12/2015','aprobado'),
('1511','titulo3_proy','resumen3_proy','1/1/2016','30/5/2016','aprobado'),
('1512','titulo4_proy','resumen4_proy','1/6/2016','30/12/2016','aprobado');

INSERT INTO programa VALUES
('1','Ingenieria de Sistemas');

INSERT INTO linea VALUES
('1','Software','1');


INSERT INTO estudiante VALUES
('1612','111','Borja','Martinez','1501'),
('1784','222','Carlos','Gutierrez','1511'),
("1264","444","Lizeth","Contreras","1511"),
('6254','333','Daniela','Guzman','1512');


INSERT INTO profesor_correo VALUES
('6245','novoa@hotmail.com'),
('7845','botero@hotmail.com'),
('9856','merchan@hotmail.com'),
('3245','sotelo@hotmail.com'),
('9546','ojeda@hotmail.com');


INSERT INTO profesor_proyecto VALUES
('1501','7845','director','activo'),
('1502','9856','jurado','inactivo'),
('1511','3245','director','activo'),
('1512','9546','jurado','activo');