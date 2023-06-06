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
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete),
    cantidad INT
);

CREATE TABLE reserva (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT,
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    fecha_inicio DATE,
    fecha_fin DATE
);

CREATE TABLE wishlist (
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
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
    servicio_desayuno BOOLEAN,
    rating DECIMAL(5, 2)
);

CREATE TABLE rating (
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

CREATE TABLE paquete (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
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
    rating DECIMAL(5, 2)
);

CREATE TABLE compra(
    id_usuario INT,
    id_hotel INT,
    id_paquete INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete)
);


CREATE TRIGGER actualizar_rating AFTER INSERT ON rating FOR EACH ROW
BEGIN
    DECLARE promedio_rating DECIMAL(5, 2);
    
    IF NEW.id_hotel IS NOT NULL THEN
        SELECT AVG(rating) INTO promedio_rating
        FROM rating
        WHERE id_hotel = NEW.id_hotel;
        
        UPDATE hotel
        SET rating = promedio_rating
        WHERE id_hotel = NEW.id_hotel;
    END IF;
END;

