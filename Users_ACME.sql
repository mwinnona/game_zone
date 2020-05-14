/*Agregar Usuario*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Add_User`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE Add_User (
    IN _id VARCHAR(15),
    IN _name VARCHAR(115),
    IN _lastname VARCHAR(115),
    IN _email VARCHAR(115),
    IN _status BOOLEAN,
    IN _type_user BOOLEAN,
    IN _password VARCHAR(50),
    IN _photo VARCHAR(115),
    IN _token_user VARCHAR(115)
)
BEGIN
    INSERT INTO users (id, name, lastname, email, status, type_user, password, photo, token_user)
    VALUES (_id, _name, _lastname, _email, _status, _type_user, _password, _photo, _token_user);
END$$

DELIMITER ;


/*Consultar Usuarios*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Consult_User`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE Consult_User (
)
BEGIN
    SELECT id, name, lastname, email, status, type_user, password, photo, token_user FROM users WHERE status='0';
END$$

DELIMITER ;


/*Modificar Usuario*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Modify_User`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE Modify_User (
    IN _id VARCHAR(15),
    IN _name VARCHAR(115),
    IN _lastname VARCHAR(115),
    IN _email VARCHAR(115),
    IN _status BOOLEAN,
    IN _type_user BOOLEAN,
    IN _password VARCHAR(50),
    IN _photo VARCHAR(115)
)
BEGIN
    UPDATE users SET name=_name, lastname=_lastname, email=_email, status=_status, type_user=_type_user, 
    password=_password, photo=_photo WHERE id=_id;
END$$

DELIMITER ;


/*Eliminar Usuario*/
USE `game_zonebd`;
DROP procedure IF EXISTS `Disable_User`;

DELIMITER $$
USE `game_zonebd`$$
CREATE PROCEDURE Disable_User (
    IN _id VARCHAR(15)
)
BEGIN
    UPDATE users SET status='0' WHERE id=_id;
END$$

DELIMITER ;


