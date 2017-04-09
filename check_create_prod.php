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
<?php include "./includes/fun_sub.php"?>
<div id="sub_box">
    <h1>Création de produit</h1>
    <?php
		if (crea_prod($_POST['title'], $_POST['img_url'], $_POST['price'], $_POST['category'], $_POST['sub_category'], $_POST['promo'], $_POST['submit']))
			echo "<p>Ajout reussie !</p><p><a href='admin.php'>Retourner au panneau d'administration ?</a></p>";
		else
			echo "<p>Erreur pendant l'ajout.</p><p><a href='subscribe.php'>Réessayer ?</a></p>";
    ?>
</div>
</body>
</html>
