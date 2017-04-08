<div id = "menu">
	<a href = "index.php">
		<img id = "logo" src = "http://www.180back.com/wp-content/uploads/2013/12/headict.png">
	</a>
    <?php
    include "includes/check_usr.php";
    include "includes/fun_log.php";
    if (check_user())
        echo '<a href = "logout.php">
		<img id = "logout" src = "https://image.freepik.com/free-icon/logout-ios-7-interface-symbol_318-33643.jpg">
	</a>';
    else {
        echo '<a href = "subscribe.php">
		<img id = "sub" src = "https://t3.ftcdn.net/jpg/00/45/94/18/240_F_45941854_T6uM5xoywNVo9SsqFo1dr7r54IiP2ACL.jpg">
	</a>
	<a href = "login.php">
	<img id = "user" src = "http://www.itafv.dz/images/bouton_connexion.png">
	</a>';
    }
    ?>
	<img id = "panier" src = "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQPNXmtD1xENijy4BIwUmHzm1DtbBSgKhHVM5JaXfgeCByEwEHQ">
</div>
<div id = "menu2">
	<a href="page_categorie.php" class = "change"><p class = "ctgr">Tout les produits</p></a>
	<a href="page_categorie.php?category=homme" class = "change"><p class = "ctgr">Homme</p></a>
	<a href="page_categorie.php?category=femme" class = "change"><p class = "ctgr">Femme</p></a>
</div>
