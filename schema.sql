create table persona(
	cododigo varchar(9),
	cedula varchar(12) not null,
	nom_persona varchar(10),
	ape_persona varchar(10),
	primary key(cedula)
);


create table persona_telefono(
	cod_persona varchar(9) ,
	num_telefono varchar(13),
	primary key (cod_persona ,num_telefono ),
	CONSTRAINT persona_telefono
	FOREIGN KEY (cod_persona ) REFERENCES   persona(cedula) 
);


create table persona_correo(
	cod_persona varchar(9) ,
	nom_correo varchar(30),
	primary key (cod_persona ,nom_correo ),
	CONSTRAINT correo_persona FOREIGN KEY (cod_persona) 
	REFERENCES   persona(cedula) 
);

create table proyecto(
	cod_proyecto varchar(10) not null,
	titulo varchar(20) ,
	resumen varchar(255) ,
	estado varchar(10) ,
	fecha_inicio date,
	fecha_aprovacion date,
	archivo varchar(255);
	primary key(cod_proyecto)
);

create table persona_proyecto(
	cod_proyecto varchar(10),
	cod_persona varchar(15),
	rol varchar(12),
	calificacion varchar(12),
	primary key(cod_proyecto,cod_persona),
	FOREIGN key(cod_persona) REFERENCES persona(cedula),
	FOREIGN key(cod_proyecto) REFERENCES proyecto(cod_proyecto)	
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

INSERT INTO persona VALUES
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


INSERT INTO persona VALUES
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

select proyecto.titulo, concat(persona.nom_persona," ",persona.ape_persona) as persona, concat(profesor.nom_profesor," ",profesor.ape_profesor) as profesor, profesor_proyecto.rol as Cargo from persona, proyecto, profesor, profesor_proyecto where proyecto.cod_proyecto = persona.cod_proyecto and proyecto.cod_proyecto = profesor_proyecto.cod_proyecto and profesor_proyecto.cod_profesor = profesor.cedula;

create view jurados as
select persona.cedula, group_concat(persona.nom_persona," ",persona.ape_persona) as jurado, persona_proyecto.cod_proyecto 
from persona,persona_proyecto 
where persona.cedula = persona_proyecto.cod_persona and persona_proyecto.rol = "jurado" group by persona_proyecto.cod_proyecto;



create view directores as

select persona.cedula, concat(persona.nom_persona," ",persona.ape_persona) as director persona_proyecto.cod_proyecto from persona,persona_proyecto where persona.cedula = persona_proyecto.cod_persona and persona_proyecto.rol = "director";


create view estudiantes as
select persona.cedula, group_concat(persona.nom_persona," ",persona.ape_persona) as estudiante, persona_proyecto.cod_proyecto 
from persona,persona_proyecto 
where persona.cedula = persona_proyecto.cod_persona and persona_proyecto.rol = "estudiante" group by persona_proyecto.cod_proyecto;



create view proyectos as
select proyecto.cod_proyecto, proyecto.titulo, estudiantes.estudiante, directores.director, jurados.jurado 
from proyecto, estudiantes, jurados, directores 
where proyecto.cod_proyecto = estudiantes.cod_proyecto and proyecto.cod_proyecto = jurados.cod_proyecto and proyecto.cod_proyecto = directores.cod_proyecto



CREATE PROCEDURE profesor_proyecto(IN id VARCHAR(10), IN rol varchar(8))
BEGIN
SELECT nom_persona,ape_persona from persona_proyecto,persona where persona_proyecto.cod_persona=persona.cedula AND persona_proyecto.cod_proyecto=id and persona_proyecto.rol=rol;
END


//proyectos
select persona_proyecto.cod_proyecto, proyecto.titulo, persona.nom_persona ,persona_proyecto.rol from persona, persona_proyecto, proyecto where persona.cedula = persona_proyecto.cod_persona and proyecto.cod_proyecto = persona_proyecto.cod_proyecto group by persona_proyecto.cod_proyecto ,persona.nom_persona ,persona_proyecto.rol;

create procedure calificar_proyecto_diretor( IN var1 VARCHAR(10), IN var2 varchar(15), IN var3 varchar(12))
begin
	UPDATE persona_proyecto SET calificacion = var3 WHERE cod_proyecto = var1 AND cod_persona = var2;
    UPDATE proyecto SET estado = var3 WHERE cod_proyecto = var1;
end