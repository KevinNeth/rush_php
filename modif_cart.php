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
<?php include "./includes/fun_del.php"?>
<?php include "./includes/fun_mod.php"?>
<div id="sub_box">
    <?php
    if ($_POST['del'] == 'Supprimer')
    {
        echo "<h1>Suppression de produit</h1>".prod_del($_POST['id'])."<p>Le produit ".$_POST['name']." a bien été supprimé.</p>";
    }
    else if ($_POST['modif'] == 'Modifier' && $_POST['name'] && $_POST['img_url'] && $_POST['price'] && $_POST['sub_category'] && $_POST['promo'])
    {
        echo "<h1>Modification de produit</h1>".prod_mod($_POST['name'], $_POST['img_url'], $_POST['price'], $_POST['category'], $_POST['sub_category'], $_POST['promo'], $_POST['id'])."<p>Le produit ".$_POST['name']." a bien été modifié.</p>";
    }
    else
        echo "<h1>Erreur</h1><p>Probleme lors de la modification.</p>"
    ?>
</div>
</body>
</html>