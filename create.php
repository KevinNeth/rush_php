<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Headict</title>
</head>
<body>
<?php include "./includes/header.php" ?>
<?php include "./includes/subscribe.php"?>
<div id="sub_box">
    <h1>Inscription</h1>
    <?php
        if (!sub())
            echo "<p>Inscription reussie !</p><p><a href='index.php'>Retourner a l'accueil.</a></p>";
        else
            echo "<p>Erreur pendant l'inscription.</p><p><a href='subscribe.php'>Réessayer ?</a></p>";
    ?>
</div>
</body>
</html>
