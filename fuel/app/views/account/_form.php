<div class="hero-unit">
        <h1 id="titre">Modifier mon profil</h1>

<?php echo Form::open(array('class' => 'form-stacked padding text-center', 'ENCTYPE' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="clearfix">
			<h4>Nom</h4>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<?php echo Form::input('nom', Input::post('nom', isset($user) ? $user->nom : ''), array('class' => 'span3')); ?>

			</div>
		</div>
		<div class="clearfix">
			<h4>Prénom</h4>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<?php echo Form::input('prenom', Input::post('prenom', isset($user) ? $user->prenom : ''), array('class' => 'span3')); ?>

			</div>
		</div>
		<div class="clearfix">
			<h4>Email</h4>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span3')); ?>

			</div>
		</div>
		<div class="clearfix">
			<h4>Pseudo</h4>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-star-empty"></i></span>
				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'span3')); ?>

			</div>
		</div>
                <div class="clearfix">
			<h4>Photo de profil</h4>

			<div class="input-prepend">
                            <?php echo Html::img($user->image, array("alt" => "Aucune image")); echo '</br>' . Form::input('image', Input::post('image', isset($user) ? $user->image : ''), array('class' => 'span4', 'type' => 'file')); ?>

			</div>
		</div>
                <div class="actions">
        <?php echo Form::submit('submit', 'Sauvegarder', array('class' => 'btn btn-large')); ?>

                </div>
	</fieldset>
<?php echo Form::close(); ?>

</div>