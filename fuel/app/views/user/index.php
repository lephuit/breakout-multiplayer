 <section class="wrap" role="main">
    <article class="content">
<?php if ($users): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Ville</th>
			<th>Cp</th>
			<th>Sponso</th>
			<th>Admin</th>
			<th>Password</th>
			<th>Login</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->nom; ?></td>
			<td><?php echo $user->prenom; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->ville; ?></td>
			<td><?php echo $user->cp; ?></td>
			<td><?php echo $user->sponso; ?></td>
			<td><?php echo $user->admin; ?></td>
			<td><?php echo $user->password; ?></td>
			<td><?php echo $user->login; ?></td>
			<td>
				<?php echo Html::anchor('user/view/'.$user->id, 'Voir'); ?> |
				<?php echo Html::anchor('user/edit/'.$user->id, 'Modifier'); ?> |
				<?php echo Html::anchor('user/delete/'.$user->id, 'Supprimer', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('inscription', 'Ajouter un utilisateur', array('class' => 'btn success')); ?>

</p>
</article>
</section>
