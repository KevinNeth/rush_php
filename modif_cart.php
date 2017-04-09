<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Headict</title>
</head>
<body>
<?php include "./includes/header.php" ?>
<?php include "./includes/fun_sub.php" ?>
<?php include "./includes/fun_del.php" ?>
<?php include "./includes/fun_mod.php" ?>

<?php
	if ($_POST['modif'] == "Modifier")
	{
		$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
		if (!empty($_POST['product']))
			mysqli_query($link, "UPDATE cart SET name_product = '". mysqli_real_escape_string($link, $_POST['product']) ."' WHERE id = ". intval($_POST['id']) ."");
		if ($_POST['price'] > -1)
			mysqli_query($link, "UPDATE cart SET product_price = '". intval($_POST['price']) ."' WHERE id = ". intval($_POST['id']) ."");
		if ($_POST['quantity'] > -1)
			mysqli_query($link, "UPDATE cart SET quantity = '". intval($_POST['quantity']) ."' WHERE id = ". intval($_POST['id']) ."");
		$newprice = $_POST['quantity'] * $_POST['price'];
		mysqli_query($link, "UPDATE cart SET price_add = '". intval($newprice) ."' WHERE id = ". intval($_POST['id']) ."");
		$top = "modif";
	}
	if ($_POST['del'] == 'Supprimer')
	{
		mysqli_query($link, "DELETE FROM cart WHERE id = '". intval($_POST['id']) ."'");
		$top = "sucess";
	}
	if ($_POST['del2'] == 'Supprimer')
	{
		mysqli_query($link, "DELETE FROM cart WHERE command_numb = ". intval($_POST['cn']) ."");
		$top = "delete";
	}
?>

<div id="admin_box">
    <h1>Modification du panier</h1>
    <?php
	if (empty($top))
	{
        $i = 1;
        $count = mysqli_query($link, "SELECT MAX(id) FROM cart");
        $cnt_row = mysqli_fetch_array($count, MYSQLI_ASSOC);
        $lst = mysqli_query($link, "SELECT * FROM cart WHERE id = $i");
        while ($i <= $cnt_row['MAX(id)'])
        {
            $lst = mysqli_query($link, "SELECT * FROM cart WHERE id = $i");
            $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            if ($lst_row['command_numb'] == $_POST['modif'])
                echo "<form action='modif_cart.php' method='post'>
                        <input type='hidden' name='id' value='".$lst_row['id']."'>
						<input type='hidden' name='full_price' value='".$lst_row['full_price']."'>
						<span>Numero de commande :".$lst_row['command_numb']."</span>
                        <span> | Utilisateur :".$lst_row['login']." | </span>
                        <input id='txt' type='text' name='product' value='".$lst_row['name_product']."'>
                        <input id='txt' type='text' name='price' value='".$lst_row['product_price']."'>
                        <input id='txt' type='text' name='quantity' value='".$lst_row['quantity']."'>
                        <span>".$lst_row['order_date']."</span>
                        <input type='submit' name='modif' value='Modifier'>
                        <input type='submit' name='del' value='Supprimer'><BR></form>";
            $i++;
    	}
	}
	else if ($top == "modif")
	{
		echo "<span>Panier mis a jour.</span>";
	}
	else if ($top == "delete")
	{
		echo "<span>Panier supprimé.</span>";
	}
	else if ($top == "sucess")
	{
		echo "<span>Article supprimé.</span>";
	}
    ?>
</div>
</body>
</html>
