<?php
    function usr_del()
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        mysqli_query($link, "DELETE FROM users WHERE login = '" . mysqli_real_escape_string($link, $_SESSION['loggued_on_user']) . "'");
        log_out();
    }
    function usr_del_adm($user)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        mysqli_query($link, "DELETE FROM users WHERE login = '" . mysqli_real_escape_string($link, $user) . "'");
    }
    function prod_del($id)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        mysqli_query($link, "DELETE FROM products WHERE id_product = '" . intval($id) . "'");
    }
    function cat_del($cat)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        mysqli_query($link, "DELETE FROM products WHERE sub_category = '" . mysqli_real_escape_string($link, $cat) . "'");
    }
?>
