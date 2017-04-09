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
            echo "<h1>Suppression de compte</h1>".usr_del_adm($_POST['login'])."<p>Le compte ".$_POST['login']." a bien été supprimé.</p>";
        }
        else if ($_POST['modif'] == 'Modifier')
        {
            echo "<h1>Modification de compte</h1>".usr_mod($_POST['login'], $_POST['password'], $_POST['admin'], $_POST['id'])."<p>Le compte ".$_POST['login']." a bien été modifié.</p>";
        }
    ?>
</div>
</body>
</html>