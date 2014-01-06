<section class="wrap" role="main">
    <article class="content">

		<?php echo render('produit/_form'); ?>
		<p>
			<?php echo Html::anchor('produit/view/'.$produit->id, 'Fiche'); ?> |
			<?php echo Html::anchor('produit', 'Retour'); ?></p>

	</article>
</section>