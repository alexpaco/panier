<?php
require '_header.php';

$json = array('error'=> true);

if(isset($_GET['id'])){
	$produit = $DB->query('SELECT id_produit FROM produits WHERE id_produit=:id_produit', array('id_produit' => $_GET['id']));
	if(empty($produit)){
		$json['message'] = "Ce produit n'existe pas";
	}
	$panier->add($produit[0]->id_produit);
	$json['error'] = false;
	$json['total'] = number_format($panier->total(),2,',',' ')." €";
	$json['count'] = $panier->count();
	$json['message'] = 'Le produit a bien été ajouté à votre panier';
}
else{
	$json['message'] = "Vous n'avez pas sélectionné de produit pour votre panier";
}

echo json_encode($json);
?>