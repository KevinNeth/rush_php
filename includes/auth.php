<?php
    function auth($login, $password)
    {
        if ($login && $password)
        {
			$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
				if (mysqli_connect_errno())
					echo "Failed to connect to MySQL : " . mysqli_connect_error();
			$res = mysqli_query($link, "SELECT login FROM users WHERE login = '" . mysqli_real_escape_string($link, $login) . "'");
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    		if ($row != null)
            {
                $passwd = hash('sha512', $password);
				$res = mysqli_query($link, "SELECT password FROM users WHERE login = '" . mysqli_real_escape_string($link, $login) . "'");
				$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                if ($row['password'] == $passwd)
					return TRUE;
                else
                    return FALSE;
            }
			else
				return FALSE;
        }
        else
            return FALSE;
    }
?>
