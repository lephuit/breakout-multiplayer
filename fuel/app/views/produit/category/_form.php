<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Id', 'id'); ?>

			<div class="input">
				<?php echo Form::input('id', Input::post('id', isset($produit_category) ? $produit_category->id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Nom', 'nom'); ?>

			<div class="input">
				<?php echo Form::input('nom', Input::post('nom', isset($produit_category) ? $produit_category->nom : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>