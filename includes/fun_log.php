<?php
    include('auth.php');
    function log_in()
    {
        if (auth($_POST['login'], $_POST['passwd']))
        {
            $_SESSION['loggued_on_user'] = $_POST['login'];
            return TRUE;
        }
        else
        {
            $_SESSION['loggued_on_user'] = "";
            return FALSE;
        }
    }
	function log_out()
	{
		$_SESSION["loggued_on_user"] = "";
	}
?>
