 <section class="wrap" role="main">
    <article class="content">

<p>
	<strong>Id:</strong>
	<?php echo $user->id; ?></p>
<p>
	<strong>Nom:</strong>
	<?php echo $user->nom; ?></p>
<p>
	<strong>Prenom:</strong>
	<?php echo $user->prenom; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Ville:</strong>
	<?php echo $user->ville; ?></p>
<p>
	<strong>Cp:</strong>
	<?php echo $user->cp; ?></p>
<p>
	<strong>Sponso:</strong>
	<?php echo $user->sponso; ?></p>
<p>
	<strong>Admin:</strong>
	<?php echo $user->admin; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $user->password; ?></p>
<p>
	<strong>Login:</strong>
	<?php echo $user->login; ?></p>

<?php echo Html::anchor('user/edit/'.$user->id, 'Modifier'); ?> |
<?php echo Html::anchor('user', 'Retour'); ?>

</article>
</section>