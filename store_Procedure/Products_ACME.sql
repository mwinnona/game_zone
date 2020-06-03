/*Agregar Producto*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Add_Product`;

DELIMITER $$
USE `game_zonebd`$$

CREATE PROCEDURE Add_Product
(
    IN _id VARCHAR(15),
    IN _name VARCHAR(115),
    IN _description VARCHAR(400),
    IN _type_product INT,
    IN _plataform INT,
    IN _gender INT,
    IN _price FLOAT,
    IN _image VARCHAR(115),
    IN _release_date DATE,
    IN _status BOOLEAN,
    IN _stock INT,
    IN _token_product VARCHAR(115)
)BEGIN
	INSERT INTO products (id, name, description, type_product, plataform, gender, price, image, release_date, status, stock, token_product) 
    VALUES (_id, _name, _description, _type_product, _plataform, _gender, _price, _image, _release_date, _status, _stock, _token_product);
END$$

DELIMITER ;


/*Consultar Productos*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Consult_Product`;

DELIMITER $$
USE `game_zonebd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Consult_Product`(
)
BEGIN
    SELECT id, name, description, type_product, plataform, gender, price, image, release_date,
    status, stock, token_product FROM products WHERE status='1';
END$$

DELIMITER ;


/*Modificar Producto*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Modify_Product`;

DELIMITER $$
USE `game_zonebd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Modify_Product`(
    IN _id NVARCHAR(15),
    IN _name VARCHAR(115),
    IN _description VARCHAR(400),
    IN _type_product INT,
    IN _plataform INT,
    IN _gender INT,
    IN _price FLOAT,
    IN _image VARCHAR(115),
    IN _release_date DATE,
    IN _status BOOLEAN,
    IN _stock INT
)
BEGIN
    UPDATE products SET id=-id, name=_name, description=_description, type_product=_type_product, plataform=_plataform,
    gender=_gender, price=_price, image=_image, release_date=_release_date, status=_status, stock=_stock 
     WHERE id=_id;
END$$

DELIMITER ;


/*Eliminar Producto*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Disable_Product`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE Disable_Product (
    IN _id VARCHAR(15)
)
BEGIN
     UPDATE products SET status='0' WHERE id=_id;
END$$

DELIMITER ;



USE `game_zonebd`;
DROP procedure IF EXISTS `Find_product`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE `Find_product` (
	IN _token_user VARCHAR(115)
)
BEGIN
	SELECT id, name, description, type_product, plataform, gender, price, image, release_date,
    status, stock, token_product FROM game_zonebd.products where token_product = _token_user;
END$$

DELIMITER ;