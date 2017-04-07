<?php
function sub()
{
    if ($_POST['submit'] == 'Inscription' && $_POST['login'] && $_POST['passwd']) {
        if (!file_exists("private"))
            mkdir("private", 0777);
        if (!file_exists("private/passwd"))
            file_put_contents('private/passwd', null);
        $accounts = unserialize(file_get_contents("private/passwd"));
        if ($accounts != null) {
            foreach ($accounts as $key => $value) {
                if ($value['login'] == $_POST['login'])
                    return TRUE;
            }
        }
        $tmp['login'] = $_POST['login'];
        $tmp['passwd'] = hash('sha512', $_POST['passwd']);
        $accounts[] = $tmp;
        file_put_contents('private/passwd', serialize($accounts));
    } else
        return FALSE;
}
?>