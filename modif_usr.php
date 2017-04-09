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
<div id="sub_box">
    <h1>Suppression de compte</h1>
    <?php //usr_del_adm($_POST['login']);?>
    <p>Le compte <?=$_POST['login']?> a bien été supprimé.</p>
</div>
</body>
</html>