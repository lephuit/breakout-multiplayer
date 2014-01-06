<h2>Editing Produit_category</h2>
<br>

<?php echo render('produit\category/_form'); ?>
<p>
	<?php echo Html::anchor('produit/category/view/'.$produit_category->id, 'View'); ?> |
	<?php echo Html::anchor('produit/category', 'Back'); ?></p>
