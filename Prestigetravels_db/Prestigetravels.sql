CREATE TABLE usuario (
  id_usuario INT IDENTITY(1, 1) PRIMARY KEY,
  id_carrito INT FOREIGN KEY REFERENCES carrito(id_carrito),
  nombre VARCHAR(50),
  contrasenia VARCHAR(100),
  fecha_nacimiento DATE,
  correo VARCHAR(100)
);

CREATE TABLE carrito (
    id_carrito INT IDENTITY PRIMARY KEY,
    id_usuario INT FOREIGN KEY REFERENCES usuario(id_usuario)
);

CREATE TABLE hoteles (
  id INT IDENTITY(1,1) PRIMARY KEY,
  nombre VARCHAR(100),
  numero_estrellas INT,
  precio_noche INT,
  ciudad VARCHAR(50),
  habitaciones_totales INT,
  habitaciones_disponibles INT,
  estacionamiento BOOLEAN,
  piscina BOOLEAN,
  lavanderia BOOLEAN,
  pet_friendly BOOLEAN,
  servicio_desayuno BOOLEAN
);

CREATE TABLE paquetes (
  id INT IDENTITY(1,1) PRIMARY KEY,
  nombre VARCHAR(100),
  aerolinea_ida VARCHAR(50),
  hospedaje1 INT REFERENCES hoteles(id),
  hospedaje2 INT REFERENCES hoteles(id),
  hospedaje3 INT REFERENCES hoteles(id),
  ciudad1 VARCHAR(50),
  ciudad2 VARCHAR(50),
  ciudad3 VARCHAR(50),
  aerolinea_vuelta VARCHAR(50),
  fecha_salida DATE,
  fecha_llegada DATE,
  noches_totales INT,
  precio_persona INT,
  paquetes_disponibles INT,
  paquetes_totales INT,
  max_personas_paquete INT
);