<?php
    session_start();
    include "includes/check_usr.php";
    include "includes/fun_log.php";
    if ($_SESSION['loggued_on_user'] == "")
        header("Location: index.php");
    log_out();
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
    <h1>Déconnexion</h1>
    <?php
        echo "<p>Déconnexion reussie !</p>";
    ?>
</div>
</body>
</html>
