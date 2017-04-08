<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
    if (mysqli_connect_errno())
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    $res = mysqli_query($link, "SELECT admin FROM users WHERE login = '" . $_SESSION['loggued_on_user'] . "'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if ($row['admin'] != 'yes')
        header("Location: index.php");
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
    <h1>Admin</h1>
    <p>Connexion reussie !</p><p>Bienvenue <?=$_SESSION['loggued_on_user']?></p>
</div>
</body>
</html>
