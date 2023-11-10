-----SPRINT 1------------------------------------
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
  logo VARCHAR(300),
  id_plan INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY(id_plan) REFERENCES plan(id) 
);

-- Crea la tabla `historial`
CREATE TABLE historial (
  id SERIAL NOT NULL,
  fecha TIMESTAMP NOT NULL,
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
 	ip_add varchar(30), 
	password varchar(300) NOT NULL,
	password_token varchar(60),
	password_expiracion TIMESTAMP ,
	id_rol int NOT NULL,
	id_empresa int NOT NULL,
	FOREIGN KEY (id_rol) REFERENCES rol(id),  
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE  
);
CREATE TABLE favorito_link(
	id serial NOT NULL PRIMARY KEY,
	nombre_link varchar(200) , 
	id_usuario int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE direccion(
	id serial NOT NULL PRIMARY KEY,
	ciudad varchar(60) ,
	calle varchar(60) ,
	numero int not null,
	id_usuario int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);
---------------------------------------------------------------------
CREATE TABLE permiso(
	id serial NOT NULL PRIMARY KEY,
	nombre varchar(60) 
);
CREATE TABLE rol_permiso(
	id_rol  int NOT NULL ,
	id_permiso int NOT NULL ,
	PRIMARY KEY(id_rol,id_permiso),
	FOREIGN KEY (id_rol) REFERENCES rol(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_permiso) REFERENCES permiso(id) ON DELETE CASCADE ON UPDATE CASCADE
);

---------------------------------------------------------------------
---------------SPRINT2 ----------------------------------------------
---------------------------------------------------------------------
CREATE TABLE estado_actividad (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL, 
   	id_empresa int NOT NULL,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE grupo (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL, 
   	id_empresa int NOT NULL,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE grupo_usuario (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL, 
   	id_usuario int NOT NULL,
   	id_grupo int NOT NULL,
   	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_grupo) REFERENCES grupo(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE lead (
 
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL, 
  	email varchar(60) NOT NULL, 
  	telefono varchar(60) NOT NULL, 
   	ganancia_esperada real NOT NULL, 
   	id_empresa int NOT NULL,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE  
);
CREATE TABLE actividad (
	id serial PRIMARY KEY,
  	titulo varchar(60) NOT NULL, 
	fecha_inicio  TIMESTAMP  NOT NULL,
	fecha_fin  TIMESTAMP  NOT NULL check(fecha_fin > fecha_inicio),
   	id_estado int NOT NULL,
   	id_grupo int NOT NULL,
   	id_lead int NOT NULL,
   	id_empresa int NOT NULL,
   	FOREIGN KEY (id_estado) REFERENCES estado_actividad(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_grupo) REFERENCES grupo(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_lead) REFERENCES lead(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE tarea (
	 
	id serial PRIMARY KEY,
  	contenido varchar(60) NOT NULL, 
  	finalizado varchar(60) NOT NULL, 
   	id_grupo_usuario int NOT NULL,
   	id_actividad int NOT NULL,
   	FOREIGN KEY (id_grupo_usuario) REFERENCES grupo_usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_actividad) REFERENCES actividad(id) ON DELETE CASCADE ON UPDATE CASCADE	 
    
);

---------------------------------------------------------------------
---------------------------2.5 -----------------------
---------------------------------------------------------------------
CREATE TABLE sucursal (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_empresa int NOT NULL,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE categoria (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_sucursal int NOT NULL,
	id_empresa int NOT NULL,
	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE

);
 
CREATE TABLE producto (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL,
  	imagen varchar(100),
  	descripcion varchar(200),
	stock decimal NOT NULL check(stock >= 0),
	costo real NOT NULL,
	precio real NOT NULL,
  	id_categoria int NOT NULL,
  	id_sucursal int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE calificacion (
	id serial PRIMARY KEY,
  	voto varchar(60) NOT NULL, 
  	id_producto int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE comentarios (
	id serial PRIMARY KEY,
  	comentario varchar(60) NOT NULL, 
  	id_usuario int NOT NULL,
  	id_producto int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-----------------------------------------------------------------
-----------------------------------------------------------------
CREATE TABLE presupuesto (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_empresa int NOT NULL,
	id_usuario int NOT NULL,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE detalle_presupuesto (
	id serial,
	precio_parcial varchar(60),
	id_empresa int NOT NULL,
	id_usuario int NOT NULL,
	id_producto int NOT NULL,
	PRIMARY KEY(id_usuario,id_producto),
	FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);

--------------------------------------------------------------------
--------------------------------------------------------------------




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


----------contraseña=12345----------------------------------------------------------
GRANT ALL PRIVILEGES ON DATABASE proyectosi2 TO tito;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO tito;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO tito;

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

CREATE TABLE sucursal (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_empresa int NOT NULL,
	FOREIGN KEY (id_empresa) REFERENCES Empresa(id) ON DELETE CASCADE ON UPDATE CASCADE,

);

CREATE TABLE categoria (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_empresa int NOT NULL,
	FOREIGN KEY (id_empresa) REFERENCES Empresa(id) ON DELETE CASCADE ON UPDATE CASCADE,

);
 
CREATE TABLE producto (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL,
  	imagen varchar(100),
  	descripcion varchar(200),
	stock decimal NOT NULL check(precio >= 0),
	costo real NOT NULL,
	precio real NOT NULL,
  	id_categoria int NOT NULL,
  	id_sucursal int NOT NULL,
  	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE
);
-----------------------------------------------------------------

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

/*
php artisan make:migration create_plan_table
 
php artisan make:migration create_empresa_table
 
php artisan make:migration create_historial_table
 
php artisan make:migration create_queja_table
 
php artisan make:migration create_rol_table
 
php artisan make:migration create_usuario_table
 
php artisan make:migration create_favorito_link_table
 
php artisan make:migration create_direccion_table
 
php artisan make:migration create_permiso_table
 
php artisan make:migration create_rol_permiso_table
 
php artisan make:migration create_estado_actividad_table
 
php artisan make:migration create_grupo_table
 
php artisan make:migration create_grupo_usuario_table
 
php artisan make:migration create_lead_table
 
php artisan make:migration create_actividad_table
 
php artisan make:migration create_tarea_table
 
php artisan make:migration create_sucursal_table
 
php artisan make:migration create_categoria_table
 
php artisan make:migration create_producto_table
 
php artisan make:migration create_calificacion_table
 
php artisan make:migration create_comentarios_table
 
php artisan make:migration create_presupuesto_table
 
php artisan make:migration create_detalle_presupuesto_table
*/


