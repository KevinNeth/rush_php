<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/index.css">
		<title>Headict</title>
	</head>
	<body>
		<?php include "./includes/header.php" ?>
        <div id="sub_box">
            <form method="post" action="check_create_prod.php">
                <h1>Création de produit</h1>
                <p>Nom du produit : <BR><input name="title" value=""></p>
                <p>Image : <BR><input name="img_url" value=""></p>
                <p>Prix : <BR><input name="price" value=""></p>
                <p>Catégorie : <BR><input name="category" value=""></p>
                <p>Sous-catégorie : <BR><input name="sub_category" value=""></p>
                <p>Promo: <BR><input name="promo" value="yes" type="checkbox"></p>
                <input type="submit" name="submit" value="OK">
            </form>
        </div>
	</body>
</html>
