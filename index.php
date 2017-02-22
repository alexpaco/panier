<?php require 'header.php'; ?>

<ul class="menu">
	<li>Auto Moto</li>
	<li>DVD</li>
	<li>Electromenager</li>
	<li>Fourniture de bureau</li>
	<li>High tech</li>
	<li>Jeux vidéo</li>
	<li>Musique</li>
	<li>Puériculture</li>
</ul>
<div class="parent">
	<?php $produits = $DB->query('SELECT * FROM produits');?>
	<?php foreach ($produits as $produit): ?>
		<div class="produit">
			<img src="img/<?= $produit->id_produit?>.jpg" class="img_produit">
			<div class=description>
				<h3 class="nom_produit"><?= $produit->nom; ?></h3>
				<p class="texte"><?= $produit->description; ?></p>	
			</div>
			<div class='prixPanier'>
				<div class="rien"><a href="addpanier.php?id=<?= $produit->id_produit; ?>" class="sauvegarde addPanier"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></div>
				<div class="rien1"><p class="prix">Prix : <?= number_format($produit->prix,2,',',' '); ?> €</p></div>

			</div>
		</div>
	<?php endforeach ?>
</div>

<?php require 'footer.php'; ?>