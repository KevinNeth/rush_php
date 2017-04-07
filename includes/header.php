<?php
	session_start();
?>
<div id = "menu">
	<a href = "index.php">
		<img id = "logo" src = "http://www.180back.com/wp-content/uploads/2013/12/headict.png">
	</a>
	<?php
		if (!isset($_SESSION['user']))
		{
	?>
	<a href = "subscribe.php">
		<img id = "sub" src = "https://t3.ftcdn.net/jpg/00/45/94/18/240_F_45941854_T6uM5xoywNVo9SsqFo1dr7r54IiP2ACL.jpg">
	</a>
	<a href = "user.php">
	<img id = "user" src = "http://www.itafv.dz/images/bouton_connexion.png">
	</a>
	<?php }?>
	<img id = "panier" src = "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQPNXmtD1xENijy4BIwUmHzm1DtbBSgKhHVM5JaXfgeCByEwEHQ">
</div>
<div id = "menu2">
	<a href="page_categorie.php" class = "change"><p class = "ctgr">Tout les produits</p></a>
	<a href="page_categorie.php?category=homme" class = "change"><p class = "ctgr">Homme</p></a>
	<a href="page_categorie.php?category=femme" class = "change"><p class = "ctgr">Femme</p></a>
</div>
