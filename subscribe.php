<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
    if (mysqli_connect_errno())
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    $res = mysqli_query($link, "SELECT admin FROM users WHERE login = '" . $_SESSION['loggued_on_user'] . "'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
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
            <form method="post" action="check_create.php">
                <h1>Inscription</h1>
                <p>Identifiant : <BR><input name="login" value=""></p>
                <p>Mot de passe : <BR><input name="passwd" value="" type="password"></p>
                <?php
                if ($row['admin'] == 'yes')
                    echo '<p>Admin : <input type="checkbox" name="admin" value="yes" /></p>';
                ?>
                <input type="submit" name="submit" value="Inscription">
            </form>
        </div>
	</body>
</html>
