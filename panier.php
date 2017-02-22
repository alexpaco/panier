<?php require 'header.php'; ?>
<?php 
if(isset($_GET['del'])){
	$panier->del($_GET['del']);
}
?>
<form method="post" action="panier.php">
<table>

<tr>
	<td class="bordure bordure1"></td>
	<td class="bordure bordure1">Produits</td>
	<td class="bordure">Descriptif</td>
	<td class="bordure bordure2">Prix unitaire</td>
	<td class="bordure bordure1">quantité</td>
	<td class="bordure bordure2">prix total</td>
	<td class="bordure bordure3">supprimer</td>
</tr>
<?php
$ids = array_keys($_SESSION['panier']);
if(empty($ids)){
	$produits = array();
	echo "<h1>Votre panier est vide <a href='index.php'>retourner au catalogue</a></h1>";
}else{
	$produits = $DB->query('SELECT * FROM produits WHERE id_produit IN ('.implode(',',$ids).')');
	echo "<h1>Voici ce que contient votre panier</h1>";
}

foreach($produits as $produit):
?>

<tr>
	<td class="bordure"><img src="img/<?= $produit->id_produit; ?>.jpg" class="img_produit"></td>
	<td class="bordure"><?= $produit->nom; ?></td>
	<td class="bordure"><?= $produit->description; ?></td>
	<td class="bordure"><?= number_format($produit->prix,2,',',' '); ?> €</td>
	<td class="bordure"><input class="input" type="number" name="panier[quantite][<?= $produit->id_produit; ?>]" value="<?= $_SESSION['panier'][$produit->id_produit]; ?>" min="1" max="100"></td>
	<td class="bordure"><?= number_format($produit->prix * $_SESSION['panier'][$produit->id_produit],2,',',' '); ?> €</td>
	<td class="bordure"><a href="panier.php?delPanier=<?= $produit->id_produit; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>

<?php endforeach; ?>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="bordure"><button type="submit" class="fa fa-refresh" ></button>
<p> Prix total : <?= number_format($panier->total(),2,',',' '); ?> €</p>
</td>
</table>
<div>

</form>
<?php require 'footer.php'; ?>