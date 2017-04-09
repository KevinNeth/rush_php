<?php session_start(); ?>

<?php
	if ($_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == 'OK')
	{
		$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
		if (mysqli_connect_errno())
			echo "Failed to connect to MySQL : " . mysqli_connect_error();
		$lst = mysqli_query($link, "SELECT * FROM users WHERE login = '". mysqli_real_escape_string($link, $_SESSION['loggued_on_user']) ."'");
		$lst_row = mysqli_fetch_array($lst, MYSQLI_ASSOC);
		$oldpasswd = hash('sha512', $_POST['oldpw']);
		if ($lst_row['password'] == $oldpasswd)
		{
			$newpass = hash('sha512', $_POST['newpw']);
			mysqli_query($link, "UPDATE users SET password = '". mysqli_real_escape_string($link, $newpass) ."' WHERE login = '". mysqli_real_escape_string($link, $_SESSION['loggued_on_user']) ."'");
			$test = "succes";
		}
		else
		{
			$test = "fail";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Headict</title>
</head>
<body>
	<?php include "./includes/header.php" ?>
	<div id="sub_box">
	    <h1>Modification du compte</h1>
		<?php
			if (!$test)
			{
		?>
		<form action="<?= $test;?>" method="post">
			Ancien mots de passe: <input type="password" name="oldpw"><br />
			Nouveau mots de passe: <input type="password" name="newpw"><br />
			<input type="submit" name="submit" value="OK">
		</form>
		<?php }
			else if ($test == "succes")
			{
		?>
		<p>Modification du mot de passe effectué.</p>
		<?php }
			else if ($test == "fail")
			{
		?>
		<p>Mot de passe erroné.</p>
		<?php } ?>

</body>
