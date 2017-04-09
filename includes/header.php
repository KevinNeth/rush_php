<div id = "menu">
	<a href = "index.php">
		<img id = "logo" src = "http://www.180back.com/wp-content/uploads/2013/12/headict.png">
	</a>
    <?php
    include_once "includes/check_usr.php";
    include_once "includes/fun_log.php";
    $link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
    if (mysqli_connect_errno())
        echo "Failed to connect to MySQL : " . mysqli_connect_error();
    $res = mysqli_query($link, "SELECT admin FROM users WHERE login = '" . $_SESSION['loggued_on_user'] . "'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if ($row['admin'] == 'yes')
    echo '<a href="admin.php"><img id = "logout" src ="http://www.yurisrunhouston.com/uploads/3/9/1/9/3919285/_457014621_orig.png"></a>';

    if (check_user())
        echo '<a href = "logout.php">
		<img id = "logout" src = "https://image.freepik.com/free-icon/logout-ios-7-interface-symbol_318-33643.jpg">
	</a><a href="user.php"><img id="logout" src="https://image.freepik.com/icones-gratuites/ombre-d-39-utilisateur-male_318-34042.jpg"></a> ';
    else {
        echo '<a href = "subscribe.php">
		<img id = "sub" src = "https://t3.ftcdn.net/jpg/00/45/94/18/240_F_45941854_T6uM5xoywNVo9SsqFo1dr7r54IiP2ACL.jpg">
	</a>
	<a href = "login.php">
	<img id = "user" src = "http://www.itafv.dz/images/bouton_connexion.png">
	</a>';
    }
    ?>
	<a href = "panier.php"><img id = "panier" src = "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQPNXmtD1xENijy4BIwUmHzm1DtbBSgKhHVM5JaXfgeCByEwEHQ"></a>
</div>
<div id = "menu2">
	<a href="page_categorie.php" class = "change"><p class = "ctgr">Tout les produits</p></a>
	<a href="page_categorie.php?category=homme" class = "change"><p class = "ctgr">Homme</p></a>
	<a href="page_categorie.php?category=femme" class = "change"><p class = "ctgr">Femme</p></a>
</div>
