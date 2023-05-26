CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  id_carrito INT, 
  nombre VARCHAR(50),
  contrasenia VARCHAR(100),
  fecha_nacimiento DATE,
  correo VARCHAR(100)
);

CREATE TABLE carrito (
--   id_carrito INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT, 
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
  hotel_paquete_id INT,
  nombre VARCHAR(100),
  precio INT,
  total_pagar INT,
  total_pagar_descuento DECIMAL(10, 2),
  FOREIGN KEY (hotel_paquete_id) REFERENCES hoteles(id_hotel) ON DELETE CASCADE,
  FOREIGN KEY (hotel_paquete_id) REFERENCES paquetes(id_paquete) ON DELETE CASCADE
);

CREATE TABLE hoteles (
  id_hotel INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
--   numero_estrellas INT,
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
  id_paquete INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  aerolinea_ida VARCHAR(50),
  hospedaje1 INT REFERENCES hoteles(id_hotel),
  hospedaje2 INT REFERENCES hoteles(id_hotel),
  hospedaje3 INT REFERENCES hoteles(id_hotel),
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
  FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario),
  FOREIGN KEY (hotel_paquete_id) REFERENCES hoteles(id_hotel) ON DELETE CASCADE,
  FOREIGN KEY (hotel_paquete_id) REFERENCES paquetes(id_paquete) ON DELETE CASCADE,
  PRIMARY KEY (usuario_id, hotel_paquete_id)
);

CREATE TABLE rating (
    id_usuario INT,
    id_hotel INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hoteles(id_hotel),
    rating INT
);