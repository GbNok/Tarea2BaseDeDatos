-- SQLBook: Code
CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  id_carrito INT, 
  nombre VARCHAR(50),
  contrasenia VARCHAR(255),
  fecha_nacimiento DATE,
  correo VARCHAR(100)
);


CREATE TABLE carrito (
    id_carrito INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    precio INT,
    total_pagar INT,
    total_pagar_descuento DECIMAL(10, 2)
);


CREATE TABLE producto (
    id_carrito INT,
    id_reserva INT,
    id_paquete INT,
    FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito),
    FOREIGN KEY (id_reserva) REFERENCES reserva(id_reserva),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
);

-- carito <--->> reserva <<---> hotel
--        <<--->> paquete

-- producto 
CREATE TABLE wishlist (
    id_usuario INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
);

CREATE TABLE paquete (
    -- id_paquete INT AUTO_INCREMENT PRIMARY KEY
  id_paquete INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  aerolinea_ida VARCHAR(50),
  hospedaje1 INT, 
  FOREIGN KEY (hospedaje1) REFERENCES hotel(id_hotel),
  hospedaje2 INT, 
  FOREIGN KEY (hospedaje2) REFERENCES hotel(id_hotel),
  hospedaje3 INT,
  FOREIGN KEY (hospedaje3) REFERENCES hotel(id_hotel),
  ciudad1 VARCHAR(50),
  ciudad2 VARCHAR(50),
  ciudad3 VARCHAR(50)
);

CREATE TABLE reserva (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT,
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    fecha_inicio DATE,
    fecha_fin DATE
);


CREATE TABLE hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
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

CREATE TABLE rating (
    id_usuario INT,
    id_hotel INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    rating INT
);