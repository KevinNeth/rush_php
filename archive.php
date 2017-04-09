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
			if (!empty($_SESSION['loggued_on_user']))
			{
				$com = mysqli_query($link, "SELECT MAX(command_numb) FROM cart");
				$rowcom = mysqli_fetch_array($com, MYSQLI_ASSOC);
				if (!$rowcom['MAX(command_numb)'])
					$commande = 1;
				else
					$commande = $rowcom['MAX(command_numb)'] + 1;
				$date = date("Y-m-d H:i:s");
				foreach($_SESSION['panier'] as $id => $quantity)
				{
					$n = mysqli_query($link, "SELECT * FROM products WHERE id_product = '". $id ."'");
					$rown = mysqli_fetch_array($n, MYSQLI_ASSOC);
					mysqli_query($link, "INSERT INTO cart
					VALUES (null, '". $commande ."', '". $_SESSION['loggued_on_user'] ."', '". $id ."', '". $rown['title'] ."', '". $rown['price'] ."', '". $quantity ."',
					 '". $rown['price'] * $quantity ."', '". $_POST['fullprice']."', '". $date ."');");
				}
				unset($_SESSION['panier']);
				echo "Votre commande a bien été enregistrée";
			}
			?>
		</div>
	</body>
</html>
