<?php
session_start();
$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL : " . mysqli_connect_error();
	$res = mysqli_query($link, "SELECT login FROM users WHERE login = '" . $_SESSION['loggued_on_user'] . "'");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

	if (!$row)
		header("Location: login.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./css/index.css">
		<title>Validation</title>
	</head>
	<body>
		<?php include "./includes/header.php" ?>
		<div style = "text-align: center;">
			<?php
				print_r($_SESSION['panier']);
				echo "Votre commande a bien ete enregistrer";
			?>
		</div>
	</body>
</html>
