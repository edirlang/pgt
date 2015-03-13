create table profesor(
	cedula varchar(15) primary key ,
	cargo  varchar(10) ,
	nom_profesor varchar(20) ,
	ape_profesor varchar(20) 
);

create table director(
	cod_profesor  varchar(15) primary key ,
	CONSTRAINT profesor_director
	FOREIGN KEY (cod_profesor) REFERENCES   profesor(cedula) 
);

create table proyecto(
	cod_proyecto varchar(10) not null,
	titulo varchar(20) ,
	resumen varchar(255) ,
	estado varchar(10) ,
	fecha_inicio date,
	fecha_aprovacion date,
	director varchar(15) not null,
	primary key(cod_proyecto),
	FOREIGN key(director) references director(cod_profesor)
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
create table proyecto_programa(
	nom_linea varchar(50) ,
	cod_proyecto varchar(10),
	cod_programa varchar(6),
	primary key(cod_proyecto,cod_programa),
	CONSTRAINT proyecto_linea
	FOREIGN KEY (cod_proyecto ) REFERENCES   proyecto(cod_proyecto ) ,
	CONSTRAINT programa_linea
	FOREIGN KEY (cod_programa ) REFERENCES   programa(cod_programa ) 
);
create table profesor_telefono(
	cod_profesor varchar(15) ,
	num_telefono varchar(13),
	primary key (cod_profesor ,num_telefono ),
	CONSTRAINT profesor_telefono
	FOREIGN KEY (cod_profesor ) REFERENCES profesor(cedula) 
);
create table pofesor_correo(
	cod_profesor varchar(15) ,
	nom_correo varchar(30),
	primary key (cod_profesor ,nom_correo),
	CONSTRAINT profesor_correo
	FOREIGN KEY (cod_profesor ) REFERENCES   profesor(cedula) 
);
create table jurado(
	cod_profesor varchar(15) primary key  ,
	calificacion varchar(10) ,
	CONSTRAINT cod_profesor
	FOREIGN KEY (cod_profesor ) REFERENCES   profesor(cedula) 
);
create table proyecto_jurado(
	cod_profesor varchar(15) ,
	cod_proyecto varchar(10) ,
	primary key (cod_profesor ,cod_proyecto ),
	CONSTRAINT proyecto_jurad
	FOREIGN KEY (cod_proyecto ) REFERENCES   proyecto(cod_proyecto ),
	CONSTRAINT proyecto_jurado
	FOREIGN KEY (cod_profesor ) REFERENCES   jurado(cod_profesor) 
);