CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  id_carrito INT, 
  nombre VARCHAR(50),
  contrasenia VARCHAR(100),
  fecha_nacimiento DATE,
  correo VARCHAR(100)
);

CREATE TABLE carrito (
    id_usuario INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
    precio INT,
    total_pagar INT,
    total_pagar_descuento DECIMAL(10, 2),
);


CREATE TABLE wishlist (
    id_usuario INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
);

CREATE TABLE paquete (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY,
);

CREATE TABLE reserva (
    id_paquete INT,
    id_hotel INT,
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    fecha_inicio DATE,
    fecha_fin DATE
);

CREATE TABLE vuelos (
    id_paquete INT,
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    aerolinea VARCHAR(50),
    aeropuerto_salida VARCHAR(10), 
    aeropuerto_llegada VARCHAR(10),
    fecha_salida DATE,
    fecha_llegada DATE 
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
    FOREIGN KEY (id_hotel) REFERENCES hoteles(id_hotel),
    rating INT
);