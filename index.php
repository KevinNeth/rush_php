<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/index.css">
		<title>Headict</title>
	</head>
	<body>
		<?php include "./includes/header.php"; ?>
		<div id = "corps">
			<img class = "imgbody" src = "https://www.headict.com/modules/nq_homepush/configuration/images/fr/2e829149cd1149f1dd6473b33cb63c43.jpg">
			<a class = "title">MASSE BONNET !</a>
            <?php
                if (check_user())
                    echo "<p>Hello ".$_SESSION['loggued_on_user']."</p>";
            ?>
			<img class = "imgbody" src = "https://www.headict.com/modules/nq_slider/images/ebb5229c256c31e4b681f2a8400eb6c4.jpg">
		</div>
	</body>
</html>
