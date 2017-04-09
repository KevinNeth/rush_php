<?php
    function usr_mod($user, $passwd, $admin, $id)
    {
        $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        $res = mysqli_query($link, "SELECT password FROM users WHERE login = '".$user."'");
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $old_pw = $row['password'];
        if ($passwd != $old_pw)
            $passwd = hash('sha512', $passwd);
        mysqli_query($link, "UPDATE users SET login = '".$user."' WHERE id_user = '".$id."'");
        mysqli_query($link, "UPDATE users SET password = '".$passwd."' WHERE id_user = '".$id."'");
        mysqli_query($link, "UPDATE users SET admin = '".$admin."' WHERE id_user = '".$id."'");
    }
?>