CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  id_carrito INT FOREIGN KEY REFERENCES carrito(id_carrito),
  nombre VARCHAR(50),
  contrasenia VARCHAR(100),
  fecha_nacimiento DATE,
  correo VARCHAR(100)
);

CREATE TABLE carrito (
  id_carrito INT IDENTITY PRIMARY KEY,
  id_usuario INT FOREIGN KEY REFERENCES usuario(id_usuario)
  usuario_id INT,
  hotel_paquete_id INT,
  nombre VARCHAR(100),
  precio INT,
  total_pagar INT,
  total_pagar_descuento DECIMAL(10, 2),
  FOREIGN KEY (hotel_paquete_id) REFERENCES hoteles(id) ON DELETE CASCADE,
  FOREIGN KEY (hotel_paquete_id) REFERENCES paquetes(id) ON DELETE CASCADE
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


CREATE TABLE wishlist (
  usuario_id INT,
  hotel_paquete_id INT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (hotel_paquete_id) REFERENCES hoteles(id) ON DELETE CASCADE,
  FOREIGN KEY (hotel_paquete_id) REFERENCES paquetes(id) ON DELETE CASCADE,
  PRIMARY KEY (usuario_id, hotel_paquete_id)
);