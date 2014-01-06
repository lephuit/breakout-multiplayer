 <section class="wrap" role="main">
    <article class="content">
<?php echo render('user/_form'); ?>
<p>
	<?php echo Html::anchor('user/view/'.$user->id, 'Voir la fiche'); ?> |
	<?php echo Html::anchor('user', 'Retour'); ?></p>

	</article>
</section>
