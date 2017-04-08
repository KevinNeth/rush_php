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
<?php include "./includes/login.php"?>
<?php include "./includes/whoami.php"?>
<div id="sub_box">
    <h1>Connexion</h1>
    <?php
    if (log_in())
        echo "<p>Connexion reussie !</p><p>Bienvenue ".$_SESSION['loggued_on_user']."</p>";
    else
        echo "<p>Erreur pendant la connexion</p><p><a href='user.php'>Réessayer ?</a></p>";
    ?>
</div>
</body>
</html>
