INSERT INTO
  hotel (
    nombre,
    tipo,
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
    3.7
  ),
  (
    "Maravillas del desierto",
    "hotel",
    350000,
    "San Pedro de Atacama",
    7,
    4,
    FALSE,
    TRUE,
    FALSE,
    FALSE,
    TRUE,
    3.7
  ),
  (
    "Noche sin Luna",
    "hotel",
    125000,
    "San Jose de Maipo",
    7,
    4,
    TRUE,
    FALSE,
    FALSE,
    TRUE,
    FALSE,
    3.7
  ),
  (
    "La Rueda",
    "hotel",
    150000,
    "Coyhaique",
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
    "Casa Bosque",
    "hotel",
    150000,
    "San Jose de Maipo",
    7,
    4,
    TRUE,
    TRUE,
    TRUE,
    TRUE,
    TRUE,
    3.7
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
  'Nombre del paquete',
  "paquete",
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

