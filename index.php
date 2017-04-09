<?php
session_start();
include "./install.php";
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
		<link rel="stylesheet" href="css/index.css">
		<title>Headict</title>
	</head>
	<body>
		<?php include "./includes/header.php"; ?>
		<div id = "corps">
			<img class = "imgbody" src = "https://www.headict.com/modules/nq_homepush/configuration/images/fr/2e829149cd1149f1dd6473b33cb63c43.jpg">
			<a class = "title">MASSE BONNETS !</a>
            <?php
                if (check_user())
                    echo "<p>Hello ".$_SESSION['loggued_on_user']."</p>";
            ?>
            <h1>Les Promos !</h1>
            <?php
            $result = mysqli_query($link, "SELECT * FROM products WHERE promo='yes'");
            $redir = "index.php";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {?>
                <div style = "display: inline-block;">
                    <form method="post" action="<?= $redir; ?>">
                        <img class = "product" src = "<?= $row['img_url']; ?>"><br>
                        <a class = "descrp"><?= $row['title']." "; echo $row['price'];?></a>
                        <div><input type="hidden" name="id_product" value="<?= $row['id_product'] ?>" /></div>
                        <div><input type="hidden" name="price" value="<?= $row['price'] ?>" /></div>
                        <input type="submit" name="submit" value="add"/>
                    </form>
                </div>
            <?php }?>
		</div>
	</body>
</html>
