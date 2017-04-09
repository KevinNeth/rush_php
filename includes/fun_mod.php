<?php
    function usr_mod($user, $passwd, $admin, $id)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        $res = mysqli_query($link, "SELECT password FROM users WHERE login = '". mysqli_real_escape_string($link, $user) ."'");
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $old_pw = $row['password'];
        if ($passwd != $old_pw)
            $passwd = hash('sha512', $passwd);
        mysqli_query($link, "UPDATE users SET login = '". mysqli_real_escape_string($link, $user) ."' WHERE id_user = '". intval($id) ."'");
        mysqli_query($link, "UPDATE users SET password = '". mysqli_real_escape_string($link, $passwd) ."' WHERE id_user = '". intval($id) ."'");
        mysqli_query($link, "UPDATE users SET admin = '". mysqli_real_escape_string($link, $admin) ."' WHERE id_user = '". intval($id) ."'");
    }

    function prod_mod($name, $img_url, $price, $category, $sub_category, $promo, $id)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        mysqli_query($link, "UPDATE products SET 'name' = '". mysqli_real_escape_string($link, $name) ."' WHERE id_product = '". intval($id) ."'");
        mysqli_query($link, "UPDATE products SET img_url = '". mysqli_real_escape_string($link, $img_url) ."' WHERE id_product = '". intval($id) ."'");
        mysqli_query($link, "UPDATE products SET price = '". intval($price) ."' WHERE id_product = '". intval($id) ."'");
        mysqli_query($link, "UPDATE products SET category = '". mysqli_real_escape_string($link, $category) ."' WHERE id_product = '". intval($id) ."'");
        mysqli_query($link, "UPDATE products SET sub_category = '". mysqli_real_escape_string($link, $sub_category) ."' WHERE id_product = '". intval($id) ."'");
        mysqli_query($link, "UPDATE products SET promo = '". mysqli_real_escape_string($link, $promo) ."' WHERE id_product = '". intval($id) ."'");
    }
?>
