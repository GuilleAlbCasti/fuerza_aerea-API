<?php

require_once __DIR__ . '/../../config.php';

class DbModel {

  protected $db;
  
  public function __construct() {

    $this->db = new PDO(
      "mysql:host=".MYSQL_HOST.
      ";dbname=".MYSQL_DB.";charset=utf8",
      MYSQL_USER,MYSQL_PASS);
      $this->_deploy();

  }

  private function _deploy() {

    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    
    if (count($tables) == 0) {
      $sql = <<<END
CREATE TABLE `categoria` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `base` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(40) NOT NULL,
    `ubicacion` varchar(20) NOT NULL,
    `capacidad` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `avion` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `modelo` varchar(50) NOT NULL, -- Considerar aumentar el tamaño
    `anio` int(11) NOT NULL,
    `origen` varchar(30) NOT NULL, -- Considerar aumentar el tamaño
    `horas_vuelo` int(11) NOT NULL,
    `base_fk` int(11) NOT NULL,
    `categoria_fk` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `base_fk` (`base_fk`),
    KEY `categoria_fk` (`categoria_fk`),
    CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`base_fk`) REFERENCES `base` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `avion_ibfk_2` FOREIGN KEY (`categoria_fk`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(2, 'Ataque ligero'),
(4, 'Carga pesada'),
(11, 'Caza'),
(1, 'Entrenamiento'),
(5, 'Entrenamiento avanzado'),
(6, 'Helicóptero'),
(7, 'Ligero'),
(14, 'Prueba'),
(12, 'Reabastecimiento'),
(3, 'Transporte'),
(10, 'Transporte comercial'),
(9, 'Transporte ejecutivo'),
(13, 'Transporte ligero'),
(8, 'Transporte mediano');

INSERT INTO `base` (`id`, `nombre`, `ubicacion`, `capacidad`) VALUES
(1, 'Base Aérea Militar El Palomar', 'Buenos Aires', 50),
(2, 'Base Aérea Militar Reconquista', 'Santa Fe', 40),
(3, 'Base Aérea Militar Tandil', 'Buenos Aires', 60),
(4, 'Base Aérea Militar Córdoba', 'Córdoba', 100),
(5, 'Base Aérea Militar Río Gallegos', 'Santa Cruz', 30),
(6, 'Base Aérea Militar Comodoro Rivadavia', 'Chubut', 40),
(7, 'Base Aérea Militar Villa Reynolds', 'San Luis', 45);

INSERT INTO `avion` (`id`, `modelo`, `anio`, `origen`, `horas_vuelo`, `base_fk`, `categoria_fk`) VALUES
(21, 'IA-63 Pampa III', 2018, 'Argentina', 1500, 1, 1),
(22, 'IA-58 Pucará', 1975, 'Argentina', 8000, 2, 2),
(23, 'FMA IA-50 Guaraní II', 1966, 'Argentina', 6500, 1, 3),
(24, 'Lockheed C-130 Hercu', 1968, 'Estados Unidos', 12000, 3, 4),
(25, 'Embraer EMB-312 Tuca', 1987, 'Brasil', 9000, 2, 1),
(26, 'Beechcraft T-6C Texa', 2017, 'Estados Unidos', 2500, 1, 5),
(27, 'Bell 412', 1980, 'Estados Unidos', 7000, 4, 6),
(28, 'Cessna 182', 1963, 'Estados Unidos', 4500, 5, 7),
(29, 'Fokker F-28', 1975, 'Países Bajos', 10500, 3, 8),
(30, 'Learjet 35A', 1982, 'Estados Unidos', 9500, 5, 9),
(31, 'Sikorsky S-70 Black', 1994, 'Estados Unidos', 3000, 4, 6),
(32, 'Boeing 737-700', 2004, 'Estados Unidos', 8000, 6, 10),
(33, 'Saab 340', 1999, 'Suecia', 6800, 3, 8),
(34, 'DHC-6 Twin Otter', 1966, 'Canadá', 6000, 6, 13),
(35, 'IA-58D Pucará Delta', 2011, 'Argentina', 1000, 2, 2),
(36, 'FMA IA-63 Pampa II', 2007, 'Argentina', 4000, 1, 1),
(37, 'McDonnell Douglas A-', 1998, 'Estados Unidos', 9500, 7, 11),
(38, 'Boeing KC-135 Strato', 1967, 'Estados Unidos', 11000, 6, 12),
(39, 'FMA IA-38 Naranjero', 1960, 'Argentina', 5000, 2, 13),
(40, 'SIAI-Marchetti SM-10', 1970, 'Italia', 7500, 3, 1);

CREATE TABLE `usuario` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `password` varchar(60) NOT NULL,
    `email` varchar(250) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id`, `nombre`, `password`, `email`) VALUES
(1, 'webadmin', '$2y$10$7WWJ5F4ksbjEhlJdzPWGNO9JM1NsZp12OuoH/ZZ.wVM...', 'webadmin@gmail.com');

END;
      $this->db->exec($sql);
    }
  }

  public function connect() {
      return $this->db;
  }

}