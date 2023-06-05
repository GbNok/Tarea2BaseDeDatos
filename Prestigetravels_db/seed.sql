INSERT INTO
  hotel (
    nombre,
    precio_noche,
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
  );


INSERT INTO 
paquete (
  nombre,
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
  'Nombre del paquete',
  10, -- Cantidad de paquetes disponibles
  500, -- Precio del paquete
  4, -- Límite de personas
  'Aerolínea de ida',
  'Aerolínea de vuelta',
  1, -- ID del primer hospedaje (hotel)
  2, -- ID del segundo hospedaje (hotel)
  3, -- ID del tercer hospedaje (hotel)
  'Ciudad 1',
  'Ciudad 2',
  'Ciudad 3',
  4.5 -- Rating del paquete
);

