-- SQLBook: Code
-- CREATE TABLE usuario (
--     id_usuario INT AUTO_INCREMENT PRIMARY KEY,
--     id_carrito INT,
--     nombre VARCHAR(50),
--     contrasenia VARCHAR(255),
--     fecha_nacimiento DATE,
--     correo VARCHAR(100)
-- );

CREATE TABLE hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    tipo VARCHAR(50),
    precio INT,
    ciudad VARCHAR(50),
    habitaciones_totales INT,
    habitaciones_disponibles INT,
    estacionamiento BOOLEAN,
    piscina BOOLEAN,
    lavanderia BOOLEAN,
    pet_friendly BOOLEAN,
    servicio_desayuno BOOLEAN,
    rating DECIMAL(5, 2)
);

CREATE TABLE paquete (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    tipo VARCHAR(50),
    paquetes_disponibles INT,
    precio INT,
    limite_personas INT,
    aerolinea_ida VARCHAR(50),
    aerolinea_vuelta VARCHAR(50),
    hospedaje1 INT,
    FOREIGN KEY (hospedaje1) REFERENCES hotel(id_hotel),
    hospedaje2 INT,
    FOREIGN KEY (hospedaje2) REFERENCES hotel(id_hotel),
    hospedaje3 INT,
    FOREIGN KEY (hospedaje3) REFERENCES hotel(id_hotel),
    ciudad1 VARCHAR(50),
    ciudad2 VARCHAR(50),
    ciudad3 VARCHAR(50),
    rating DECIMAL(5, 2),
    fecha_ida DATE,
    fecha_vuelta DATE
);

CREATE TABLE carrito (
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    cantidad INT
);


CREATE TABLE wishlist (
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
);


CREATE TABLE ratingHotel (
    id_usuario INT,
    id_hotel INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    ratingLimpieza INT,
    ratingServicio INT,
    ratingDecoracion INT,
    ratingCalidadCamas INT, 
    ratingPromedio DECIMAL(5, 2),
    comentario TEXT
);

CREATE TABLE ratingPaquete (
    id_usuario INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    ratingHoteles INT,
    ratingTransporte INT,
    ratingServicio INT,
    ratingPrecioCalidad INT, 
    ratingPromedio DECIMAL(5, 2),
    comentario TEXT
);


CREATE TABLE compra(
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    cantidad INT
);


CREATE TRIGGER actualizar_ratingHotel AFTER INSERT ON ratingHotel FOR EACH ROW
BEGIN
    DECLARE promedio_rating DECIMAL(5, 2);
    
    SELECT AVG(ratingPromedio) INTO promedio_rating
    FROM ratingHotel
    WHERE id_hotel = NEW.id_hotel;
    
    UPDATE hotel
    SET rating = promedio_rating
    WHERE id_hotel = NEW.id_hotel;
END;

CREATE TRIGGER actualizar_ratingPaquete AFTER INSERT ON ratingPaquete FOR EACH ROW
BEGIN
    DECLARE promedio_rating DECIMAL(5, 2);
    
    SELECT AVG(ratingPromedio) INTO promedio_rating
    FROM ratingPaquete
    WHERE id_paquete = NEW.id_paquete;
    
    UPDATE paquete
    SET rating = promedio_rating
    WHERE id_paquete = NEW.id_paquete;
END;

CREATE TRIGGER actualizar_disponibilidad AFTER INSERT ON compra
FOR EACH ROW
BEGIN
    IF NEW.id_hotel IS NOT NULL THEN
        UPDATE hotel SET habitaciones_disponibles = habitaciones_disponibles - NEW.cantidad WHERE id_hotel = NEW.id_hotel;
    END IF;

    IF NEW.id_paquete IS NOT NULL THEN
        UPDATE paquete SET paquetes_disponibles = paquetes_disponibles - NEW.cantidad WHERE id_paquete = NEW.id_paquete;
    END IF;
END;


CREATE PROCEDURE getHotel(IN id INT)
BEGIN
	SELECT *
  FROM hotel WHERE id_hotel = id;
END


INSERT INTO
  hotel (
    nombre,
    tipo,
    precio,
    ciudad,
    habitaciones_totales,
    habitaciones_disponibles,
    estacionamiento,
    piscina,
    lavanderia,
    pet_friendly,
    servicio_desayuno,
    rating
  )
VALUES
  (
    "Patagonico",
    "hotel",
    130000,
    "Puerto Natales",
    20,
    12,
    TRUE,
    FALSE,
    TRUE,
    FALSE,
    TRUE,
    5.0
  ),
  (
    "Atacama Nights",
    "hotel",
    150000,
    "Atacama",
    15,
    2,
    TRUE,
    TRUE,
    TRUE,
    TRUE,
    TRUE,
    5.0
  ),
  (
    "Casa Bosque",
    "hotel",
    150000,
    "San Jose de Maipo",
    7,
    4,
    TRUE,
    TRUE,
    FALSE,
    TRUE,
    TRUE,
    3.7
  ),
  (
    "Sueños del Sur",
    "hotel",
    100000,
    "Coyhaique",
    10,
    4,
    FALSE,
    TRUE,
    FALSE,
    TRUE,
    FALSE,
    2.1
  ),
  (
    "Maravillas del desierto",
    "hotel",
    350000,
    "San Pedro de Atacama",
    30,
    10,
    FALSE,
    TRUE,
    FALSE,
    FALSE,
    TRUE,
    3.0
  ),
  (
    "Noche sin Luna",
    "hotel",
    125000,
    "San Jose de Maipo",
    19,
    12,
    TRUE,
    FALSE,
    FALSE,
    TRUE,
    FALSE,
    4.1
  ),
  (
    "La Rueda",
    "hotel",
    150000,
    "Coyhaique",
    19,
    7,
    TRUE,
    TRUE,
    FALSE,
    TRUE,
    TRUE,
    4.9
  ),
  (
    "Manyos",
    "hotel",
    50000,
    "San Jose de Maipo",
    7,
    7,
    FALSE,
    FALSE,
    FALSE,
    FALSE,
    FALSE,
    1.7
  );


INSERT INTO 
    paquete (
    nombre,
    tipo,
    paquetes_disponibles,
    precio,
    limite_personas,
    aerolinea_ida,
    aerolinea_vuelta,
    hospedaje1,
    hospedaje2,
    hospedaje3,
    ciudad1,
    ciudad2,
    ciudad3,
    rating
    ) VALUES (
    'Aventuras por Chile',
    "paquete",
    10,
    500000,
    4, 
    'LAN',
    'LAN',
    1,
    2,
    3,
    'Ciudad 1',
    'Ciudad 2',
    'Ciudad 3',
    4.5 
    ),(
    'Nombre del paquete',
    "paquete",
    10,
    500,
    4, 
    'Aerolínea de ida',
    'Aerolínea de vuelta',
    1,
    2,
    3,
    'Ciudad 1',
    'Ciudad 2',
    'Ciudad 3',
    4.5 
    ),
    (
    'Nombre del paquete',
    "paquete",
    10,
    500,
    4, 
    'Aerolínea de ida',
    'Aerolínea de vuelta',
    1,
    2,
    3,
    'Ciudad 1',
    'Ciudad 2',
    'Ciudad 3',
    4.5 
    ),
    (
    'Nombre del paquete',
    "paquete",
    10,
    500,
    4, 
    'Aerolínea de ida',
    'Aerolínea de vuelta',
    1,
    2,
    3,
    'Ciudad 1',
    'Ciudad 2',
    'Ciudad 3',
    4.5 
    );