<?php
    function check_user()
    {
        if ($_SESSION['loggued_on_user'])
            return TRUE;
        else
            return FALSE;
    }
?>