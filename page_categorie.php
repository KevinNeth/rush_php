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
	if ($_POST['submit'] == "add" && isset($_POST['id_product']))
	{
		if (!isset($_SESSION['panier'][$_POST['id_product']]))
			$_SESSION['panier'][$_POST['id_product']] = 1;
		else
			$_SESSION['panier'][$_POST['id_product']] += 1;
	}
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
		<div style = "text-align: center;">
			<?php
				if (isset($_GET['category']))
				{
					$result = mysqli_query($link, "SELECT * FROM products WHERE category='" . mysqli_real_escape_string($link, $_GET['category']) . "'");
					$redir = "page_categorie.php?category=" . $_GET['category'] . "";
				}
				else
				{
					$result = mysqli_query($link, "SELECT * FROM products");
					$redir = "page_categorie.php";
				}
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{?>
					<div style = "display: inline-block;">
					<form method="post" action="<?= $redir; ?>">
						<img class = "product" src = "<?= $row['img_url']; ?>"><br>
						<a class = "descrp"><?= $row['title']." "; echo $row['price'];?>€</a>
						<div><input type="hidden" name="id_product" value="<?= $row['id_product'] ?>" /></div>
						<div><input type="hidden" name="price" value="<?= $row['price'] ?>" /></div>
						<input type="submit" name="submit" value="add"/>
					</form>
					</div>
				<?php }?>
		</div>
	</body>
</html>
