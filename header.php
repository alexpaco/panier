<?php 
require '_header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<div class="logo"><a href="index.php" class="centre">E-SHOP</a></div>
	<div class="panier">
		<p class="header">Votre panier :</p>
		<a href="panier.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <span id='count'><?= $panier->count(); ?></span></a>
	</div>
	<div class="argent">
		<p class="header">Total :</p>
		<span id='total'><?= number_format($panier->total(),2,',',' '); ?> €</span>
	</div>
</header>