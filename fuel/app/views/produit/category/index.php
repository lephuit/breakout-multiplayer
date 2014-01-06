<h2>Listing Produit_categories</h2>
<br>
<?php if ($produit_categories): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($produit_categories as $produit_category): ?>		<tr>

			<td><?php echo $produit_category->id; ?></td>
			<td><?php echo $produit_category->nom; ?></td>
			<td>
				<?php echo Html::anchor('produit/category/view/'.$produit_category->id, 'View'); ?> |
				<?php echo Html::anchor('produit/category/edit/'.$produit_category->id, 'Edit'); ?> |
				<?php echo Html::anchor('produit/category/delete/'.$produit_category->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Produit_categories.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('produit/category/create', 'Add new Produit category', array('class' => 'btn success')); ?>

</p>
