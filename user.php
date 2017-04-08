<?php session_start(); ?>
<?php
if ($_SESSION['loggued_on_user'] == "")
    header('Location: index.php');
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
    <h1>Bonjour <?php echo $_SESSION['loggued_on_user']?></h1>
    <form method="post" action="del_usr.php">
        <input type="submit" name="submit" value="Supprimer le compte">
    </form>
</div>
</body>
</html>
