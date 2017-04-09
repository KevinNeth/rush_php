<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
    if (mysqli_connect_errno())
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    $res = mysqli_query($link, "SELECT admin FROM users WHERE login = '" . mysqli_real_escape_string($link, $_SESSION['loggued_on_user']) . "'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ($row['admin'] != 'yes')
        header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Headict</title>
</head>
<body>
<?php include "./includes/header.php" ?>
<div id="admin_box">
    <h1>Panneau d'administration</h1>
    <p>Bienvenue Mr. <?=$_SESSION['loggued_on_user']?>.</p>
    <h2>Gestion des ultilisateurs</h2>
    <?php
        echo "<p>Créer un nouvel utilisateur : <a href=\"subscribe.php\"><input type=\"button\" value=\"OK\"></a></p>";
        $i = 1;
        $count = mysqli_query($link, "SELECT MAX(id_user) FROM users");
        $cnt_row =  $row = mysqli_fetch_array($count, MYSQLI_ASSOC);
        while ($i <= $cnt_row['MAX(id_user)'])
        {
            $lst = mysqli_query($link, "SELECT * FROM users WHERE id_user = $i");
            $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            if ($lst_row['login'] != '')
                echo "<form action='modif_usr.php' method='post'>
                        <input type='hidden' name='id' value='".$lst_row['id_user']."'>
                        <input id='txt' type='text' name='login' value='".$lst_row['login']."'>
                        <input id='txt' type='text' name='password' value='".$lst_row['password']."' class='passwd'>
                        <input id='txt' type='text' name='admin' value='".$lst_row['admin']."'>
                        <input type='submit' name='modif' value='Modifier'>
                        <input type='submit' name='del' value='Supprimer'><BR></form>";
            $i++;
        }
    ?>
    <h2>Gestion des produits</h2>
    <?php
    echo "<p>Créer un nouveau produit : <a href='create_prod.php'><input type=\"button\" value=\"OK\"></a></p>";
    $i = 1;
    $count = mysqli_query($link, "SELECT MAX(id_product) FROM products");
    $cnt_row =  $row = mysqli_fetch_array($count, MYSQLI_ASSOC);
    while ($i <= $cnt_row['MAX(id_product)'])
    {
        $lst = mysqli_query($link, "SELECT * FROM products WHERE id_product = $i");
        $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
        if ($lst_row['title'] != '')
            echo "<form action='modif_prod.php' method='post'>
                    <input type='hidden' name='id' value='".$lst_row['id_product']."'>
                    <input id='txt' type='text' name='name' value='".$lst_row['title']."'>
                    <input id='txt' type='text' name='img_url' value='".$lst_row['img_url']."'>
                    <input id='txt' type='text' name='price' value='".$lst_row['price']."'>
                    <input id='txt' type='text' name='category' value='".$lst_row['category']."'>
                    <input id='txt' type='text' name='sub_category' value='".$lst_row['sub_category']."'
                    <input id='txt' type='text' name='promo' value='".$lst_row['promo']."'>
                    <input type='submit' name='modif' value='Modifier'>
                    <input type='submit' name='del' value='Supprimer'><BR></form>";
        $i++;
    }
    ?>
    <h2>Gestion des catégories</h2>
    <?php
    $lst = mysqli_query($link, "SELECT sub_category FROM products GROUP BY sub_category");?>
        <form action='del_cat.php' method='post'>
            <select name="del">
            <?php
                while ($lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC))
                {
                    echo "<option value='".$lst_row['sub_category']."'>".$lst_row['sub_category'].""."</option>";
                }
            ?>
                </select>
            <input type="submit" value="Supprimer">
        </form>
    <h2>Gestion des paniers</h2>
    <?php
    $i = 1;
    $count = mysqli_query($link, "SELECT MAX(command_numb) FROM cart");
    $cnt_row = mysqli_fetch_array($count, MYSQLI_ASSOC);
    while ($i <= $cnt_row['MAX(command_numb)'])
    {
        $lst = mysqli_query($link, "SELECT * FROM cart WHERE command_numb = $i");
        $lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
            echo "<form action='modif_cart.php' method='post'>
                    <table>
                    <input type='hidden' name='id' value='".$lst_row['id']."'>
                    <tr><span>".$lst_row['command_numb']."</span></tr> | 
                    <span>".$lst_row['login']."</span> |
                    <span>".$lst_row['full_price']."</span> |
                    <span>".$lst_row['order_date']."</span> |
                    <button type='submit' name='modif' value='".$lst_row['command_numb']."'>Modifier</button>
                    <input type='submit' name='del' value='Supprimer'><BR></form>";
            $i++;
    }
    ?>

</div>
</body>
</html>
