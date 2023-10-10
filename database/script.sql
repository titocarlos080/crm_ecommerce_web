-- Crea la base de datos
CREATE DATABASE db_ventas;

-- Conecta a la base de datos
USE db_ventas;

-- Crea la tabla `actividad`
CREATE TABLE actividad (
  id SERIAL NOT NULL,
  estado_actividad VARCHAR(50) NOT NULL,
  id_oportunidad_venta INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  titulo VARCHAR(100) NOT NULL,
  descripcion VARCHAR(1000) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_final DATE NOT NULL,
  monto_esperado DECIMAL(10,2) NOT NULL,
  foto VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `cliente`
CREATE TABLE cliente (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `equipo`
CREATE TABLE equipo (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `empleado`
CREATE TABLE empleado (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  id_equipo INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_equipo) REFERENCES equipo (id)
);

-- Crea la tabla `envio`
CREATE TABLE envio (
  id SERIAL NOT NULL,
  monto_total DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `empresa`
CREATE TABLE empresa (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `historial`
CREATE TABLE historial (
  id SERIAL NOT NULL,
  cantidad INT NOT NULL,
  precio INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `pedido`
CREATE TABLE pedido (
  id SERIAL NOT NULL,
  id_envio INT NOT NULL,
  id_cliente INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_envio) REFERENCES envio (id),
  FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);

-- Crea la tabla `producto`
CREATE TABLE producto (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  descripcion VARCHAR(1000) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  foto VARCHAR(255) NOT NULL,
  stock INT NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `quejas`
CREATE TABLE quejas (
  id SERIAL NOT NULL,
  email VARCHAR(100) NOT NULL,
  descripcion VARCHAR(1000) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `tipo_pago`
CREATE TABLE tipo_pago (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

-- Crea la tabla `usuario`
CREATE TABLE usuario (
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);