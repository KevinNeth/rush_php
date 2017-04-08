<?php
    function auth($login, $passwd)
    {
        if ($login && $passwd)
        {
            if(!file_exists("private"))
                mkdir("private", 0777);
            if(!file_exists("private/passwd"))
                file_put_contents('private/passwd', null);
            $accounts = unserialize(file_get_contents("private/passwd"));
            if ($accounts != null)
            {
                $passwd = hash('sha512', $passwd);
                $check = 0;
                foreach ($accounts as $key => $value)
                {
                    if ($value['login'] == $login)
                    {
                        if ($value['passwd'] == $passwd)
                            $check = 42;
                    }

                }
                if ($check === 42)
                    return TRUE;
                else
                    return FALSE;
            }
        }
        else
            return FALSE;
    }
?>