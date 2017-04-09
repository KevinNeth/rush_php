<?php
    session_start();
    include "includes/check_usr.php";
    include "includes/fun_log.php";
    if (log_in())
        $check = 1;
    else
        $check = 0;
?>
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
    <h1>Connexion</h1>
    <?php
        if ($check == 1)
            echo "<p>Connexion reussie !</p><p>Bienvenue " . $_SESSION['loggued_on_user'] . "</p>";
        else
            echo "<p>Erreur pendant la connexion</p><p><a href='login.php'>Réessayer ?</a></p>";
    ?>
</div>
</body>
</html>
