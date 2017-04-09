<?php
session_start();
$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL : " . mysqli_connect_error();
function debug($var)
{
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}
?>

<?php
	if ($_POST['submit'] == "+" && isset($_POST['id_product']))
	{
		$_SESSION['panier'][$_POST['id_product']] += 1;
	}
	if ($_POST['submit'] == "-" && isset($_POST['id_product']) && $_SESSION['panier'][$_POST['id_product']] > 0)
	{
		$_SESSION['panier'][$_POST['id_product']] -= 1;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./css/index.css">
		<title>Panier</title>
	</head>
	<body>
		<?php include "./includes/header.php" ?>
		<div style = "text-align: center;">
			<?php
				if (!$_SESSION['panier'])
					echo "Votre panier est vide";
				else
				{
					foreach ($_SESSION['panier'] as $id => $quantity)
					{
						if ($quantity > 0)
						{
						$res = mysqli_query($link, "SELECT * FROM products WHERE id_product = '" . $id . "'");
						$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
						$fullprice += $_SESSION['panier'][$id] * $row['price'];
						echo "
							<div style = 'display: inline-block; margin: 2px;'>
							<form method = 'post' action='panier.php'>
								<img class = 'product' src = ".$row['img_url']."><br>
								<a class = 'descrp'>".$row['title']." : ".$_SESSION['panier'][$id] * $row['price']."€</a><br>
								<a class = 'descrp'>Quant : ".$_SESSION['panier'][$id]."</a>
								<div><input type= 'hidden' name= 'id_product' value= ". $id ." /></div>
							<input type= 'submit' name= 'submit' value= '-'/>
							<input type= 'submit' name= 'submit' value= '+'/>
							</form>
							</div>";
							$void = 42;
						}
					}
					if ($void != 42)
						echo "Votre panier est vide";
					else
						echo "
							<div style = 'position: absolute; float: right;'>
						TOTAL  :".$fullprice."€
						<form method = 'post' action = 'archive.php'>
							<input type = 'submit' name = 'submit' value = 'VALIDER'/>
						</form>
						</div>";
				}?>
		</div>
	</body>
</html>
