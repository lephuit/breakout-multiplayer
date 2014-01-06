<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Nom', 'nom'); ?>

			<div class="input">
				<?php echo Form::input('nom', Input::post('nom', isset($user) ? $user->nom : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Prénom', 'prenom'); ?>

			<div class="input">
				<?php echo Form::input('prenom', Input::post('prenom', isset($user) ? $user->prenom : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ville', 'ville'); ?>

			<div class="input">
				<?php echo Form::input('ville', Input::post('ville', isset($user) ? $user->ville : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Code Postal', 'cp'); ?>

			<div class="input">
				<?php echo Form::input('cp', Input::post('cp', isset($user) ? $user->cp : ''), array('class' => 'span2')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'C\'est parti !', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>