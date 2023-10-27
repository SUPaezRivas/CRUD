create database `bdbarberia`;

use `bdbarberia`;

CREATE TABLE `usuarios` (
  `id` int(9) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `costo` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `marcacuchillas` varchar(50) NOT NULL,
  `tipomaquina` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
    PRIMARY KEY  (`idproducto`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;