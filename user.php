<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/index.css">
		<title>Headict</title>
	</head>
	<body>
		<?php include "./includes/header.php" ?>
        <div id="log_box">
            <form method="post" action="create.php">
                <h1>Connexion</h1>
                <p>Identifiant : <BR><input name="login" value=""></p>
                <p>Mot de passe : <BR><input name="passwd" value="" type="password"></p>
                <input type="submit" name="submit" value="Login">
            </form>
	</body>
</html>
