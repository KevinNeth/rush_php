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
    <h1>Déconnexion</h1>
    <?php
        log_out();
        echo "<p>Déconnexion reussie !</p>";
    ?>
</div>
</body>
</html>
