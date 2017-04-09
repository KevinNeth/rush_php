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
    <link rel="stylesheet" href="./css/index.css">
    <title>Headict</title>
</head>
<body>
<?php include "./includes/header.php" ?>
<div id="sub_box">
    <h1>Admin</h1>
    <p>Connexion reussie !</p><p>Bienvenue Mr. <?=$_SESSION['loggued_on_user']?>.</p>
    <p>Créer un nouvel utilisateur : <a href="subscribe.php"><input type="button" value="OK"></a></p>
    <p>Liste utilisateurs : </p>
    <?php
        $i = 1;
        $count = mysqli_query($link, "SELECT login FROM users");
        $row_cnt = mysqli_num_rows($count);
        while ($i <= $row_cnt)
        {
            $lst = mysqli_query($link, "SELECT * FROM users WHERE id_user = $i");
            $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            echo $lst_row['login']." ".$lst_row['password']." ".$lst_row['admin']."<BR>";
            $i++;
        }
    ?>
</div>
</body>
</html>
