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
<?php include "./includes/fun_sub.php"?>
<?php include "./includes/fun_del.php"?>
<?php include "./includes/fun_mod.php"?>
<div id="admin_box">
    <h1>Modification du panier</h1>
    <?php
        $i = 1;
        $count = mysqli_query($link, "SELECT MAX(id) FROM cart");
        $cnt_row = mysqli_fetch_array($count, MYSQLI_ASSOC);
        $lst = mysqli_query($link, "SELECT * FROM cart WHERE id = $i");
        while ($i <= $cnt_row['MAX(id)'])
        {
            $lst = mysqli_query($link, "SELECT * FROM cart WHERE id = $i");
            $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            if ($lst_row['command_numb'] == $_POST['modif'])
                echo "<form action='modif_prod.php' method='post'>
                        <input type='hidden' name='id' value='".$lst_row['id']."'>
                        <input id='txt' type='text' name='img_url' value='".$lst_row['login']."'>
                        <input id='txt' type='text' name='category' value='".$lst_row['name_product']."'>
                        <input id='txt' type='text' name='sub_category' value='".$lst_row['product_price']."'>
                        <input id='txt' type='text' name='promo' value='".$lst_row['quantity']."'>
                        <input id='txt' type='text' name='promo' value='".$lst_row['order_date']."'>
                        <input type='submit' name='modif' value='Modifier'>
                        <input type='submit' name='del' value='Supprimer'><BR></form>";
            $i++;
        }
    ?>
</div>
</body>
</html>