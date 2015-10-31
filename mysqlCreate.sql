$mysql_host = "mysql15.000webhost.com";
$mysql_database = "a1029018_peli";
$mysql_user = "a1029018_peli";
$mysql_password = "admin123";



ftp		 = pelizonte.freeiz.com
Username = a1029018
password = 05junio2005



CREATE TABLE genero (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(40) NOT NULL,
	PRIMARY KEY (id)
)


CREATE TABLE pelicula (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(40) NOT NULL,
	director VARCHAR(40),
	id_genero INT NOT NULL,
	afiche VARCHAR(40),
	ano INT,
	sinopsis TINYTEXT,
	PRIMARY KEY (id),
	FOREIGN KEY (id_genero) REFERENCES genero(id)
)




INSERT INTO genero (nombre) VALUES ('Drama');
INSERT INTO genero (nombre) VALUES ('Comedia');
INSERT INTO genero (nombre) VALUES ('Acción');
INSERT INTO genero (nombre) VALUES ('Aventura');
INSERT INTO genero (nombre) VALUES ('Terror');
INSERT INTO genero (nombre) VALUES ('Ciencia Ficción');
INSERT INTO genero (nombre) VALUES ('Cine Romántico');
INSERT INTO genero (nombre) VALUES ('Cine Musical');
INSERT INTO genero (nombre) VALUES ('Melodrama');
INSERT INTO genero (nombre) VALUES ('Cine Catástrofe');
INSERT INTO genero (nombre) VALUES ('Suspenso');
INSERT INTO genero (nombre) VALUES ('Fantasía');



describe pelicula

select * from pelicula

SELECT p.*, g.nombre as genero FROM pelicula as p join genero as g on g.id=p.id_genero

SELECT p.*, g.nombre as genero FROM pelicula as p join genero as g on g.id=p.id_genero where p.nombre like '%lanca%';