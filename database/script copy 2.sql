  -- Crea la tabla `Planes`
 CREATE TABLE plan (
    id serial PRIMARY KEY,
    nombre text,
    precio numeric,
    logo VARCHAR(300),
    almacenamiento text,
    ancho_de_banda text,
    dominio boolean,
    usuarios integer,
    soporte_por_correo boolean,
    soporte_24x7 boolean
);

 
 -- Crea la tabla `empresa`
CREATE TABLE empresa(
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  id_plan INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY(id_plan) REFERENCES plan(id) 
);

-- Crea la tabla `historial`
CREATE TABLE historial (
  id SERIAL NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  id_empresa INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY(id_empresa) REFERENCES empresa(id) ON DELETE CASCADE

);
-- Crea la tabla `quejas`
CREATE TABLE queja (
  id SERIAL NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  id_empresa INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY(id_empresa) REFERENCES empresa(id) ON DELETE CASCADE

);

-- Crea la tabla `quejas`
CREATE TABLE rol (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  id_empresa int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY(id_empresa) REFERENCES empresa(id) ON DELETE CASCADE

);

CREATE TABLE usuario(
	id serial NOT NULL PRIMARY KEY,
	nombre varchar(60) ,
	email varchar(60) ,
	foto varchar(300),
 	telefono varchar(30), 
	password varchar(300) NOT NULL,
	id_rol int NOT NULL,
	id_empresa int NOT NULL,
	FOREIGN KEY (id_rol) REFERENCES rol(id),  
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE  
);
CREATE TABLE direccion(
	id serial NOT NULL PRIMARY KEY,
	ciudad varchar(60) ,
	calle varchar(60) ,
	numero int not null,
	id_usuario int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);
-- hasta aqui coore bien
--------------------------------------------------------------------
INSERT INTO plan(nombre, precio, almacenamiento, ancho_de_banda, dominio, usuarios, soporte_por_correo, soporte_24x7)
VALUES
    ('Plan Prueba', 0, '2 GB', '10 GB', false, 1, false, false),
    ('Plan Básico', 19.00, '10 GB', '50 GB', false, 1, true, true),
    -- Agrega más registros para otros planes de precios
    ('Plan Premium', 39.00, '50 GB', '200 GB', true, 5, true, true);


INSERT into empresa (nombre,email,descripcion,id_plan) values('ADM_CENTER','admincenter@gmail.com','empresa central',1);


--------------------------------------------------------------------
-- ROLES
INSERT into rol (nombre,id_empresa) values('Administrador',1);
INSERT into rol (nombre,id_empresa) values('Empresa',1);
INSERT into rol (nombre,id_empresa) values('Empleado',1);
INSERT into rol (nombre,id_empresa) values('Cliente',1);



INSERT INTO usuario (nombre, email, foto, telefono, password, id_rol, id_empresa)
VALUES
('Tito Carlos', 'titocarlos080@gmail.com', 'ruta/foto.jpg', '123456789', '$2y$10$rBxTIT8OiLpYoE6k2yML9eWLbmWPnwNuU5d4Ed29mrsC9o52HuVYa', 1, 1);
-----PRIMER SPRINT--------------
----------------------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------------------


 
GRANT ALL PRIVILEGES ON DATABASE proyectosi2 TO tito;
sudo nano /etc/postgresql/12.16/main/postgresql.conf

GRANT ALL PRIVILEGES ON TABLE plan TO tito;
GRANT ALL PRIVILEGES ON TABLE empresa TO tito;
GRANT ALL PRIVILEGES ON TABLE historial TO tito;
GRANT ALL PRIVILEGES ON TABLE rol TO tito;
GRANT ALL PRIVILEGES ON TABLE usuario TO tito;
GRANT ALL PRIVILEGES ON TABLE queja TO tito;
GRANT ALL PRIVILEGES ON TABLE direccion TO tito;
GRANT USAGE, SELECT ON SEQUENCE nombre_de_secuencia TO tito;

GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO tito;


CREATE TABLE categoria (
	id serial PRIMARY KEY,
	nombre varchar(60)
);
 

CREATE TABLE producto (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL,
  	imagen varchar(100),
  	descripcion varchar(200),
	  stock decimal NOT NULL check(precio >= 0),
	  precio real NOT NULL,
  	id_categoria int NOT NULL,
  	id_talla int NOT NULL,
  	id_sucursal int NOT NULL,
  	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_talla) REFERENCES talla(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE metodo_envio(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL,
	costo real NOT NULL
);
CREATE TABLE estado(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);
CREATE TABLE pedido(
	id serial PRIMARY KEY,
	id_usuario int NOT NULL,
 	id_estado int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES  usuario(id),
 	FOREIGN KEY (id_estado) REFERENCES estado(id)

);
CREATE TABLE envio(
	id_direccion int NOT NULL ,
	id_pedido  	int  NOT NULL,
	id_metodo_envio int NOT NULL,
	PRIMARY KEY(id_direccion,id_pedido),
	FOREIGN KEY (id_metodo_envio) REFERENCES metodo_envio(id) , 
	FOREIGN KEY (id_direccion) REFERENCES direccion(id) , 
	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  

);
CREATE TABLE metodo_pago(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);

CREATE TABLE pago(
	id serial PRIMARY KEY,
	monto real CHECK(monto>0),	
	descripcion varchar(60),
	id_metodo int NOT NULL,
	id_pedido int NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedido(id),
	FOREIGN KEY (id_metodo) REFERENCES metodo_pago(id)
);

CREATE TABLE detalle_pedido(
	id_producto int NOT NULL,
	id_pedido int NOT NULL,
	cantidad int NOT NULL,
	precio real CHECK(precio>=0),
	PRIMARY KEY ( id_producto,id_pedido),
 	FOREIGN KEY (id_producto) REFERENCES producto(id) ,
 	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  
	
);