/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 80016
 Source Host           : localhost:3306
 Source Schema         : ferreteria_castillo

 Target Server Type    : MySQL
 Target Server Version : 80016
 File Encoding         : 65001

 Date: 04/12/2019 19:58:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `idcategoria` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`idcategoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'material_electrico');
INSERT INTO `categoria` VALUES (2, 'plomeria y griferia');
INSERT INTO `categoria` VALUES (3, 'iluminacion');
INSERT INTO `categoria` VALUES (4, 'cerrajeria');

-- ----------------------------
-- Table structure for compra
-- ----------------------------
DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra`  (
  `idcompra` int(255) NOT NULL AUTO_INCREMENT,
  `fecha` date NULL DEFAULT NULL,
  `subtotal` double(255, 0) NULL DEFAULT NULL,
  `descuento` double(255, 0) NULL DEFAULT NULL,
  `total` double(255, 0) NULL DEFAULT NULL,
  `idproveedor` int(255) NULL DEFAULT NULL,
  `idusuario` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idcompra`) USING BTREE,
  INDEX `fk01_compra`(`idproveedor`) USING BTREE,
  INDEX `fk02_compra`(`idusuario`) USING BTREE,
  CONSTRAINT `fk01_compra` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk02_compra` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compra
-- ----------------------------
INSERT INTO `compra` VALUES (8, '2019-12-20', 320, 20, 300, 1, 3);
INSERT INTO `compra` VALUES (9, '2019-12-20', 320, 20, 300, 1, 3);
INSERT INTO `compra` VALUES (10, '2019-12-05', 310, 10, 300, 1, 3);

-- ----------------------------
-- Table structure for detalle_compra
-- ----------------------------
DROP TABLE IF EXISTS `detalle_compra`;
CREATE TABLE `detalle_compra`  (
  `iddetallecompra` int(255) NOT NULL AUTO_INCREMENT,
  `idcompra` int(255) NULL DEFAULT NULL,
  `idproducto` int(255) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  `cantidad` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`iddetallecompra`) USING BTREE,
  INDEX `fk01_detallecompra`(`idcompra`) USING BTREE,
  INDEX `fk02_detallecompra`(`idproducto`) USING BTREE,
  CONSTRAINT `fk01_detallecompra` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk02_detallecompra` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_compra
-- ----------------------------
INSERT INTO `detalle_compra` VALUES (1, 8, 1, 30, 4);
INSERT INTO `detalle_compra` VALUES (2, 8, 2, 40, 5);
INSERT INTO `detalle_compra` VALUES (3, 9, 1, 30, 4);
INSERT INTO `detalle_compra` VALUES (4, 9, 2, 40, 5);
INSERT INTO `detalle_compra` VALUES (5, 10, 1, 30, 5);
INSERT INTO `detalle_compra` VALUES (6, 10, 2, 40, 4);

-- ----------------------------
-- Table structure for detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta`  (
  `idDetalleventa` int(255) NOT NULL AUTO_INCREMENT,
  `idventa` int(255) NULL DEFAULT NULL,
  `idproducto` int(255) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  `cantidad` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`idDetalleventa`) USING BTREE,
  INDEX `fk01_detalleventa`(`idventa`) USING BTREE,
  INDEX `fk02_detalleventa`(`idproducto`) USING BTREE,
  CONSTRAINT `fk01_detalleventa` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idVenta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk02_detalleventa` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario`  (
  `idInventario` int(255) NOT NULL AUTO_INCREMENT,
  `idProducto` int(255) NULL DEFAULT NULL,
  `cantidad` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`idInventario`) USING BTREE,
  INDEX `fk01_inventario`(`idProducto`) USING BTREE,
  CONSTRAINT `fk_01producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventario
-- ----------------------------
INSERT INTO `inventario` VALUES (1, 1, 9);
INSERT INTO `inventario` VALUES (2, 2, 9);

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `idmarca` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  INDEX `idmarca`(`idmarca`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES (1, 'eagle electric');

-- ----------------------------
-- Table structure for medidas
-- ----------------------------
DROP TABLE IF EXISTS `medidas`;
CREATE TABLE `medidas`  (
  `idmedida` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `abreviacion` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  INDEX `idmedida`(`idmedida`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for medidas_productos
-- ----------------------------
DROP TABLE IF EXISTS `medidas_productos`;
CREATE TABLE `medidas_productos`  (
  `idmedida` int(255) NULL DEFAULT NULL,
  `idproducto` int(255) NULL DEFAULT NULL,
  INDEX `fk01_medidaproducto`(`idmedida`) USING BTREE,
  INDEX `fk02_medidaproducto`(`idproducto`) USING BTREE,
  CONSTRAINT `fk01_medidaproducto` FOREIGN KEY (`idmedida`) REFERENCES `medidas` (`idmedida`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk02_medidaproducto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idProducto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `idProducto` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `marca` int(30) NULL DEFAULT NULL,
  `precio` double(255, 0) NULL DEFAULT NULL,
  `nombre_imagen` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `ruta_imagen` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `categoria` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idProducto`) USING BTREE,
  INDEX `idProducto`(`idProducto`) USING BTREE,
  INDEX `fk01_producto`(`marca`) USING BTREE,
  INDEX `fk02_producto`(`categoria`) USING BTREE,
  CONSTRAINT `fk01_producto` FOREIGN KEY (`marca`) REFERENCES `marca` (`idmarca`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk02_producto` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, 'apagador', 1, 30, NULL, NULL, 1);
INSERT INTO `producto` VALUES (2, 'toma corriente', 1, 40, 'plug.jpg', './assets/public/productos/plug.jpg', 1);
INSERT INTO `producto` VALUES (3, 'Plug', NULL, 25, 'plug.jpg', './assets/public/productos/plug.jpg', NULL);
INSERT INTO `producto` VALUES (4, 'Plug', NULL, 25, 'plug.jpg', './assets/public/productos/plug.jpg', NULL);
INSERT INTO `producto` VALUES (5, 'sepo', 1, 30, 'horseman.PNG', './assets/public/productos/horseman.PNG', 1);

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `idProveedor` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `direccion` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `telefono` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `web` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`idProveedor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES (1, 'disegsa', 'managua', '27473696', 'www.disegsa.com');

-- ----------------------------
-- Table structure for tipo_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario`  (
  `idTipoUsuario` int(255) NULL DEFAULT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  INDEX `idTipoUsuario`(`idTipoUsuario`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES (1, 'administrador');
INSERT INTO `tipo_usuario` VALUES (2, 'vendedor');
INSERT INTO `tipo_usuario` VALUES (3, 'cliente');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `idUsuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `clave` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `tipo_usuario` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`) USING BTREE,
  INDEX `fk01_usuario`(`tipo_usuario`) USING BTREE,
  CONSTRAINT `fk01_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`idTipoUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (2, 'Juan', 'Cruz', 'cliente', '1234', 3);
INSERT INTO `usuario` VALUES (3, 'juan', 'reyes', 'admin', '1234', 1);
INSERT INTO `usuario` VALUES (4, 'paco', 'sanz', 'vendedor1', '12345', 2);
INSERT INTO `usuario` VALUES (5, 'pedro', 'molina', 'vendedor2', '12345', 2);

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `idVenta` int(255) NOT NULL AUTO_INCREMENT,
  `fecha` date NULL DEFAULT NULL,
  `subtotal` double(255, 0) NULL DEFAULT NULL,
  `descuento` double(255, 0) NULL DEFAULT NULL,
  `total` double(255, 0) NULL DEFAULT NULL,
  `idusuario` int(255) NULL DEFAULT NULL,
  INDEX `fk01_venta`(`idusuario`) USING BTREE,
  INDEX `idVenta`(`idVenta`) USING BTREE,
  CONSTRAINT `fk01_ventas` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for addcompra
-- ----------------------------
DROP PROCEDURE IF EXISTS `addcompra`;
delimiter ;;
CREATE PROCEDURE `addcompra`(IN `pfecha` date,IN `psubtotal` double,IN `pdescuento` double,IN `ptotal` double,IN `pidprov` int,IN `piduser` int)
BEGIN
	#Routine body goes here...
	INSERT INTO compra(fecha,subtotal,descuento,total,idproveedor,idusuario) VALUES (pfecha,psubtotal,pdescuento,ptotal,pidprov,piduser);
	
	SELECT LAST_INSERT_ID() as idcom;
	
	
	
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for buscador
-- ----------------------------
DROP PROCEDURE IF EXISTS `buscador`;
delimiter ;;
CREATE PROCEDURE `buscador`(IN `pbuscar` varchar(255))
BEGIN
	#Routine body goes here...
	select idproducto, p.nombre,m.nombre as marca, c.nombre as categoria,precio, ruta_imagen from producto p inner join marca m on m.idmarca=p.marca INNER JOIN categoria c on c.idcategoria = p.categoria where p.nombre like CONCAT('%',pbuscar,'%') OR c.nombre like CONCAT('%',pbuscar,'%') OR m.nombre like CONCAT('%',pbuscar,'%');
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for detallecompra
-- ----------------------------
DROP PROCEDURE IF EXISTS `detallecompra`;
delimiter ;;
CREATE PROCEDURE `detallecompra`(IN `pidcom` int,IN `idprod` int,IN `pprecio` double,IN `pcantidad` double)
BEGIN
	#Routine body goes here...
	DECLARE x INT;
	DECLARE ca DOUBLE;
	DECLARE ncan DOUBLE;
	DECLARE cin DOUBLE;
	
	INSERT into detalle_compra(idcompra,idProducto,precio,cantidad) VALUES(pidcom, idprod, pprecio, pcantidad);
	 
	SELECT COUNT(*) into x FROM inventario WHERE inventario.idProducto = idprod;
	
	IF(x>0) THEN
	
		SELECT inventario.cantidad into ca FROM inventario WHERE inventario.idProducto = idprod;
		SET cin = ca + pcantidad;
		
		UPDATE inventario set inventario.cantidad = cin WHERE inventario.idProducto = idprod;
	
	ELSE
	
		INSERT into inventario(inventario.idProducto,inventario.cantidad) VALUE(idprod,pcantidad);
	
	END IF;
	
	
	
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificarMarca
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificarMarca`;
delimiter ;;
CREATE PROCEDURE `modificarMarca`(IN pIdMarca INT,
IN pNombre VARCHAR(20))
BEGIN
	#Routine body goes here...
	
DECLARE x INT;
DECLARE y VARCHAR(10);


UPDATE marca SET
nombre = pNombre
WHERE
idmarca = pIdMarca;

SELECT y AS resultado;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificarProducto
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificarProducto`;
delimiter ;;
CREATE PROCEDURE `modificarProducto`(IN `pIdProducto` int,
IN `pNombre` varchar(50),
IN `pMarca` int,
IN `pPrecio` double,
in pNombrei VARCHAR(255),
in pRuta VARCHAR(255),
in pCategoria INT)
BEGIN
	#Routine body goes here...
	
declare x int;
declare y int;


UPDATE producto SET
nombre = pNombre,
marca = pMarca,
precio = pPrecio,
nombre_imagen = pNombrei,
ruta_imagen = pRuta,
categoria = pCategoria
WHERE
idProducto = pIdProducto;

select y as resultado;



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificarProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificarProveedor`;
delimiter ;;
CREATE PROCEDURE `modificarProveedor`(IN pIdProveedor INT,
IN pNombre VARCHAR(20),
IN pDireccion VARCHAR(100),
IN pTelefono VARCHAR(16),
IN pWeb varchar(20))
BEGIN
	#Routine body goes here...

declare x int;
declare y varchar(10);


UPDATE proveedor SET
nombre = pNombre,
direccion = pDireccion,
telefono = pTelefono,
web = pWeb
WHERE
idProveedor = pIdProveedor;

select y as resultado;



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificarUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificarUsuario`;
delimiter ;;
CREATE PROCEDURE `modificarUsuario`(IN pIdUsuario INT,
IN pNombre VARCHAR(20),
IN pApellido VARCHAR(20),
IN pLogin VARCHAR(20),
IN pClave VARCHAR(100),
IN pTipoUser INT)
BEGIN
	#Routine body goes here...
	
declare x int;
declare y varchar(10);

UPDATE usuario SET
nombre = pNombre,
apellido = pApellido,
login = pLogin,
clave = pClave,
tipo_usuario = pTipoUser
WHERE
idUsuario = pIdUsuario;

select y as resultado;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for nuevaMarca
-- ----------------------------
DROP PROCEDURE IF EXISTS `nuevaMarca`;
delimiter ;;
CREATE PROCEDURE `nuevaMarca`(IN pNombre VARCHAR(20))
BEGIN
	#Routine body goes here...
	
	declare x int;
declare y varchar(10);

select count(*) into x from producto where nombre = pNombre and marca = pMarca and categoria = pCategoria;

if(x >0) THEN

	set y = 0;
	select y as resultado;
ELSE
insert into marca(nombre) values (pNombre);
    set y = 1;
    select y as resultado;

END IF;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for nuevoProducto
-- ----------------------------
DROP PROCEDURE IF EXISTS `nuevoProducto`;
delimiter ;;
CREATE PROCEDURE `nuevoProducto`(in pNombre varchar(30),
in pMarca int,
in pPrecio double,
in pNombrei VARCHAR(255),
in pRuta VARCHAR(255),
in pCategoria INT)
BEGIN

declare x int;
declare y varchar(10);

select count(*) into x from producto where nombre = pNombre and marca = pMarca and categoria = pCategoria;

if(x >0) then
	set y = 0;
	select y as resultado;
else
	insert into producto(nombre,marca,precio,producto.nombre_imagen,producto.ruta_imagen,categoria) values (pNombre,pMarca,pPrecio,pNombrei,pRuta,pCategoria);
    set y =1;
    select y as resultado;
end if;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for nuevoProveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `nuevoProveedor`;
delimiter ;;
CREATE PROCEDURE `nuevoProveedor`(IN `pNombre` VARCHAR(50),
IN pDireccion VARCHAR(100),
IN pTelefono VARCHAR(16),
IN pWeb VARCHAR(20))
BEGIN
	#Routine body goes here...
	
	declare x int;
	declare y varchar(10);

select count(*) into x from proveedor where nombre = pNombre and Direccion = pDireccion;

if(x >0) then
	set y = 0;
	select y as resultado;
else
	insert into proveedor(nombre,Direccion,telefono,web) values (pNombre,pDireccion,pTelefono,pWeb);
    set y =1;
    select y as resultado;
end if;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for nuevoUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `nuevoUsuario`;
delimiter ;;
CREATE PROCEDURE `nuevoUsuario`(IN pNombre VARCHAR(20),
IN pApellido VARCHAR(20),
IN pLogin VARCHAR(20),
IN pClave VARCHAR(100),
IN pTipoUser INT)
BEGIN
	#Routine body goes here...
declare x int;
declare y int;

select count(*) into x from usuario where nombre = pNombre and apellido = pApellido and login = pLogin;

if(x >0) then
	set y = 0;
	select y as resultado;
else
	insert into usuario(nombre,apellido,login,clave,tipo_usuario) values (pNombre,pApellido,pLogin,pClave,pTipoUser);
    set y =1;
    select y as resultado;
end if;


END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
