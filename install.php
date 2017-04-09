<?php
$_SESSION['install'] = 1;
$link = mysqli_connect("localhost", "root", "root", "", "8080");
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL : " . mysqli_connect_error();

mysqli_query($link, "CREATE DATABASE IF NOT EXISTS db_test;");

mysqli_query($link, "use db_test");

mysqli_query($link, "CREATE TABLE IF NOT EXISTS users
(
	id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	login VARCHAR(32) NOT NULL,
	password VARCHAR(128) NOT NULL,
	admin ENUM('yes','no') DEFAULT 'no' NOT NULL
);");

mysqli_query($link, "CREATE TABLE IF NOT EXISTS cart
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	command_numb INT,
	login VARCHAR(32),
	id_product INT NOT NULL,
	name_product VARCHAR(64) NOT NULL,
	product_price DECIMAL(10, 2) NOT NULL,
	quantity INT DEFAULT 0,
	price_add DECIMAL(10, 2) NOT NULL,
	full_price DECIMAL(10, 2) NOT NULL,
	order_date DATETIME
);");

mysqli_query($link, "CREATE TABLE IF NOT EXISTS products
(
	id_product INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	title VARCHAR(64) NOT NULL,
	img_url VARCHAR(512) NOT NULL,
	price DECIMAL(10, 2) NOT NULL,
	category VARCHAR(128) NOT NULL,
	sub_category VARCHAR(128) NOT NULL,
	promo ENUM('yes', 'no') DEFAULT 'no' NOT NULL
);");

if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM products")) == 0)
{
	mysqli_query($link, "INSERT INTO products
	VALUES (null, 'Ovibos lilac', 'https://www.headict.com/img/products2/product/SAT01058,satila,bonnet-long-laine.jpg', '25', 'femme', 'bonnet', 'yes'),
	(null, 'Capcho Bonnet Platine lemon', 'https://www.headict.com/img/products2/product/CAP11005,capcho,bonnet-femme-vert.jpg', '25', 'femme', 'bonnet', 'no'),
	(null, 'Bonnet du PurBoloss', 'https://www.headict.com/img/products2/product/1314BEA0013,beardo,bonnet-barbe-rider.jpg', '25', 'homme', 'bonnet', 'no'),
	(null, 'Super Bonnet', 'https://www.headict.com/img/products2/product/ERA03136_3,new-era,bonnet-superman-bleu.jpg', '25', 'homme', 'bonnet', 'no'),
	(null, 'Pink Cask', 'https://www.headict.com/img/products2/product/DJI01159,djinns,snapback-rose-cuir-djinns.jpg', '25', 'femme', 'casquette', 'no'),
	(null, 'Casck Pink femme Platine', 'https://www.headict.com/img/products2/product/DJI01169,djinns,trucker-rose-visire-camo.jpg', '25', 'femme', 'casquette', 'no'),
	(null, 'Cocoricasquet', 'https://www.headict.com/img/products2/product/GOO01130,goorin,casquette-coq-rouge.jpg', '25', 'homme', 'casquette', 'yes'),
	(null, 'Casquette PURBG', 'https://www.headict.com/img/products2/product/BRI01644,brixton,snapback-blanche-et-bordeaux-brixton.jpg', '25', 'homme', 'casquette', 'no'),
	(null, 'Chapi', 'https://www.headict.com/img/products2/product/CRA01421,capeline-grise-lien-noir.jpg', '25', 'femme', 'chapeau', 'yes'),
	(null, 'Chapo', 'https://www.headict.com/img/products2/product/CRA01420,capeline-raphia-macram.jpg', '25', 'femme', 'chepeau', 'no'),
	(null, 'Chapeau Jaimlapip', 'https://www.headict.com/img/products2/product/STE2468413-72,stetson,panama-stetson-galon-cuir.jpg', '25', 'homme', 'chapeau', 'no'),
	(null, 'Vive la france', 'https://www.headict.com/img/products2/product/STE1398112-2,stetson,chapeau-en-feutre-bleu.jpg', '25', 'homme', 'chapeau', 'no');");
}

if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM users")) == 0)
{
	mysqli_query($link, "INSERT INTO users
	VALUES (null, 'kneth', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'yes'),
	(null, 'fmartine', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'yes');");
}
?>
