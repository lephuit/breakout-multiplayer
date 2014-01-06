<h2>Viewing #<?php echo $produit_category->id; ?></h2>

<p>
	<strong>Id:</strong>
	<?php echo $produit_category->id; ?></p>
<p>
	<strong>Nom:</strong>
	<?php echo $produit_category->nom; ?></p>

<?php echo Html::anchor('produit/category/edit/'.$produit_category->id, 'Edit'); ?> |
<?php echo Html::anchor('produit/category', 'Back'); ?>