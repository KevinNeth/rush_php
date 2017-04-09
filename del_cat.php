<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Headict</title>
</head>
<body>
<?php include "./includes/header.php" ?>
<?php include "./includes/fun_sub.php"?>
<?php include "./includes/fun_del.php"?>
<div id="sub_box">
    <h1>Suppression de catégorie </h1>
    <?php cat_del($_POST['del']);?>
    <p>La catégorie <? echo $_POST['del']; ?> a bien été supprimée.</p>
</div>
</body>
</html>