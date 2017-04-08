<?php
    function check_user()
    {
        session_start();
        if ($_SESSION['loggued_on_user'])
            TRUE;
        else
            FALSE;
    }
?>