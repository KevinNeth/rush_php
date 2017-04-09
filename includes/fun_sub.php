<?php
    function sub($login, $password, $submit, $admin)
    {
		$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL : " . mysqli_connect_error();
        if ($submit == 'Inscription' && $login && $password)
		{
			$res = mysqli_query($link, "SELECT login FROM users WHERE login = '" . mysqli_real_escape_string($link, $login) . "'");
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			if (!$row)
			{
				$passwd = hash('sha512', $password);
				if ($admin == 'yes')
                    mysqli_query($link, "INSERT INTO users VALUES (null, '" . mysqli_real_escape_string($link, $login) . "', '" . mysqli_real_escape_string($link, $passwd) . "', 'yes')");
				else
					mysqli_query($link, "INSERT INTO users VALUES (null, '" . mysqli_real_escape_string($link, $login) . "', '" . mysqli_real_escape_string($link, $passwd) . "', 'no')");
				return TRUE;
			}
			else
				return FALSE;
        } else
            return FALSE;
    }

	function crea_prod($name, $img_url, $price, $category, $sub_category, $promo, $submit)
	{
		$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL : " . mysqli_connect_error();
		if ($submit == 'OK' && $name & $img_url & $price)
		{
			$res = mysqli_query($link, "SELECT title FROM products WHERE title = '" . mysqli_real_escape_string($link, $name) . "'");
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			if (!$row)
			{
                if ($promo != 'yes')
                    $promo = 'no';
				mysqli_query($link, "INSERT INTO products VALUES (null, '" . mysqli_real_escape_string($link, $name) . "', '" . mysqli_real_escape_string($link, $img_url) . "', '" . intval($price) . "', '" . mysqli_real_escape_string($link, $category) . "', '" . mysqli_real_escape_string($link, $sub_category) . "',
				'" . mysqli_real_escape_string($link, $promo) . "')");
				return TRUE;
			}
			else
				return FALSE;
		} else
			return FALSE;
	}
?>
