"Fuerza Aérea" es una repositorio creado para dar respuesta al Trabajo Práctico Especial de la materia Web 2 de la carrera TUDAI dicatada en la facultada de Exactas de la UNICEN.
Su desarrollar,Guillermo Castiglioni (GuilleAlbCasti), propone diseñar una base de datos que pueda almacenar un conjunto de elementos clasificados en categorías y consecuentemente con un subconjunto de detalles a fin de que sea expuesta y administrada vía web.
La temática elegida crea un marco "ficticio" en donde se logre aplicar los distintos requerimientos exigidos para alcanzar la aprobación en éste. En tal sentido, hemos buscado catalogar la diversidad de aeronaves que pueden llegar a conformar una fuerza aérea generando un entorno creativo para la creación de diversos objetos de elementos interrelacionados para poner en práctica los contenidos aprendidos en la materia.

PARA DAR RESPUESTA A LOS REQUERIMIENTOS DE LA 3ra ENTREGA, SE DETALLAN LAS SIGUIENTES PAUTAS:

ENDPOINTS ARMADOS:
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
|          ACCION                 |       ENDPOINTS        | VERBO  |                      EJEMPLO DE URL 
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
| Obtener todos los aviones       | 'aviones'              |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones
| Obterer detalle de 1 avión      | 'avion/:id'            |  GET   | http://localhost/API/fuerza_aerea-API/api/avion/21
| Crear 1 avión nuevo             | 'aviones'              |  POST  | curl -X POST http://localhost/API/fuerza_aerea-API/api/aviones \-H "Content-Type: application/json" \-d '{"modelo": "Prueba","anio": 2024,"origen": "Argentina","horas_vuelo": 1200,"categoria_nombre": 1,"base_nombre": 1}'  
| Editar 1 avión                  | 'avion/:id'            |  PUT   | curl -X PUT http://localhost/API/fuerza_aerea-API/api/avion/57 \-H "Content-Type: application/json" \-d '{"modelo": "Prueba200","anio": 2024,"origen": "Argentina","horas_vuelo": 1200,"categoria_nombre": 1,"base_nombre": 1}'
| Eliminar 1 avión                | 'avion/:id'            | DELETE | curl -X DELETE http://localhost/API/fuerza_aerea-API/api/avion/57
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
| Filtrar por origen              | 'aviones?origen='      |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?origen=Brasil
| Filtrar por bases               | 'aviones?base_nombre=' |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?base_nombre=Base Aérea Militar El Palomar
| Filtrar por categoria           | 'aviones?categoria='   |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?categoria_nombre=Entrenamiento
| Filtrar por orden ASC modelo    | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=modelo
| Filtrar por orden DESC modelo-r | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=modelo-r
| Filtrar por orden ASC anio      | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=anio
| Filtrar por orden DESC anio-r   | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=anio-r
| Filtrar por orden ASC id        | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=id
| Filtrar por orden DESC id-r     | 'aviones?orderBy='     |  GET   | http://localhost/API/fuerza_aerea-API/api/aviones?orderBy=id-r
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------