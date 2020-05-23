CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Product`(
	IN _name VARCHAR(115),
    IN _description VARCHAR(400),
    IN _type_product INT,
    IN _plataform INT,
    IN _gender INT,
    IN _price double(8,2),
    IN _image VARCHAR(115),
    IN _release_date DATE,
    IN _status tinyint,
    IN _stock INT,
    IN _token_product VARCHAR(115))
BEGIN
	INSERT INTO game_zonebd.products ( name, description, type_product, plataform, gender, price, image, release_date, status, stock, token_product) 
    VALUES ( _name, _description, _type_product, _plataform, _gender, _price, _image, _release_date, _status, _stock, _token_product);

END


CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_User`(
IN _name VARCHAR(115),
    IN _lastname VARCHAR(115),
    IN _email VARCHAR(115),
    IN _status tinyint,
    IN _type_user tinyint,
    IN _password VARCHAR(50),
    IN _photo VARCHAR(115),
    IN _token_user VARCHAR(115))
begin
 
INSERT INTO game_zonebd.users  ( name, lastname, email, status, type_user, password, photo, token_user)
    VALUES ( _name, _lastname, _email, _status, _type_user, _password, _photo, _token_user);

END

CREATE DEFINER=`root`@`localhost` PROCEDURE `Disable_Product`(
    IN _token VARCHAR(15)
)
BEGIN
     UPDATE game_zonebd.products SET status='1' WHERE token_product=_token;

END

CREATE DEFINER=`root`@`localhost` PROCEDURE `Disable_User`(
 IN _token VARCHAR(15)
 )
BEGIN
	 UPDATE game_zonebd.users SET status='1' WHERE token_user=_token;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modify_Product`(
 IN _token VARCHAR(15),
    IN _name VARCHAR(115),
    IN _description VARCHAR(400),
    IN _type_product INT,
    IN _plataform INT,
    IN _gender INT,
    IN _price double(8,2),
    IN _image VARCHAR(115),
    IN _release_date DATE,
    IN _status tinyint,
    IN _stock INT)
BEGIN
	 UPDATE game_zonebd.products SET  name=_name, description=_description, type_product=_type_product, plataform=_plataform,
    gender=_gender, price=_price, image=_image, release_date=_release_date, status=_status, stock=_stock 
     WHERE token_product=_token;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `Modify_User`(
    IN _token VARCHAR(15),
    IN _name VARCHAR(115),
    IN _lastname VARCHAR(115),
    IN _email VARCHAR(115),
    IN _photo VARCHAR(115)
)
BEGIN
    UPDATE game_zonebd.users SET name=_name, lastname=_lastname, email=_email, status=_status, type_user=_type_user, 
    password=_password, photo=_photo WHERE token_user=_token;
END