<?php
	$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL : " . mysqli_connect_error();
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
					$result = mysqli_query($link, "SELECT * FROM products WHERE category='" . $_GET['category'] . "'");
				else
					$result = mysqli_query($link, "SELECT * FROM products");
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{?>
					<div style = "display: inline-block;">
						<img class = "product" src = "<?php echo $row['img_url']; ?>"><br>
						<img id = "panier2" src = "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQPNXmtD1xENijy4BIwUmHzm1DtbBSgKhHVM5JaXfgeCByEwEHQ">
						<a class = "descrp"><?php echo $row['title']." "; echo $row['price'];?></a>
					</div>
				<?php }?>
		</div>
	</body>
</html>
