CREATE DATABASE db_test;

use db_test

CREATE TABLE products
(
	id_product INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	title VARCHAR(64) NOT NULL,
	img_url VARCHAR(512) NOT NULL,
	price DECIMAL(10, 2) NOT NULL,
	category VARCHAR(128) NOT NULL,
	sub_category VARCHAR(128) NOT NULL
);

INSERT INTO products
VALUES (null, 'Ovibos lilac', "https://www.headict.com/img/products2/product/SAT01058,satila,bonnet-long-laine.jpg", '25', 'femme', 'bonnet'),
(null, 'Capcho Bonnet Platine lemon', "https://www.headict.com/img/products2/product/CAP11005,capcho,bonnet-femme-vert.jpg", '25', 'femme', 'bonnet'),
(null, 'Bonnet du PurBoloss', "https://www.headict.com/img/products2/product/1314BEA0013,beardo,bonnet-barbe-rider.jpg", '25', 'homme', 'bonnet'),
(null, 'Super Bonnet', "https://www.headict.com/img/products2/product/ERA03136_3,new-era,bonnet-superman-bleu.jpg", '25', 'homme', 'bonnet'),
(null, 'Pink Cask', "https://www.headict.com/img/products2/product/DJI01159,djinns,snapback-rose-cuir-djinns.jpg", '25', 'femme', 'casquette'),
(null, 'Casck Pink femme Platine', "https://www.headict.com/img/products2/product/DJI01169,djinns,trucker-rose-visire-camo.jpg", '25', 'femme', 'casquette'),
(null, 'Cocoricasquet', "https://www.headict.com/img/products2/product/GOO01130,goorin,casquette-coq-rouge.jpg", '25', 'homme', 'casquette'),
(null, 'Casquette PURBG', "https://www.headict.com/img/products2/product/BRI01644,brixton,snapback-blanche-et-bordeaux-brixton.jpg", '25', 'homme', 'casquette'),
(null, 'Chapi', "https://www.headict.com/img/products2/product/CRA01421,capeline-grise-lien-noir.jpg", '25', 'femme', 'chapeau'),
(null, 'Chapo', "https://www.headict.com/img/products2/product/CRA01420,capeline-raphia-macram.jpg", '25', 'femme', 'chepeau'),
(null, 'Chapeau Jaimlapip', "https://www.headict.com/img/products2/product/STE2468413-72,stetson,panama-stetson-galon-cuir.jpg", '25', 'homme', 'chapeau'),
(null, 'Vive la france', "https://www.headict.com/img/products2/product/STE1398112-2,stetson,chapeau-en-feutre-bleu.jpg", '25', 'homme', 'chapeau');

INSERT INTO users
VALUES (null, "kneth", "", "yes");
