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
<div id="admin_box">
    <h1>Admin</h1>
    <p>Bienvenue Mr. <?=$_SESSION['loggued_on_user']?>.</p>
    <p>Créer un nouvel utilisateur : <a href="subscribe.php"><input type="button" value="OK"></a></p>
    <p>Liste utilisateurs : </p>
    <?php
        $i = 1;
        $count = mysqli_query($link, "SELECT MAX(id_user) FROM users");
        $cnt_row =  $row = mysqli_fetch_array($count, MYSQLI_ASSOC);
        while ($i <= $cnt_row['MAX(id_user)'])
        {
            $lst = mysqli_query($link, "SELECT * FROM users WHERE id_user = $i");
            $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            if ($lst_row['login'] != '')
                echo "<form action='modif_usr.php' method='post'><input type='hidden' name='id' value='".$lst_row['id_user']."'><input id='txt' type='text' name='login' value='".$lst_row['login']."'><input id='txt' type='text' name='password' value='".$lst_row['password']."' class='passwd'><input id='txt' type='text' name='admin' value='".$lst_row['admin']."'><input type='submit' name='modif' value='Modifier'><input type='submit' name='del' value='Supprimer'><BR></form>";
            $i++;
        }
    ?>
</div>
</body>
</html>
