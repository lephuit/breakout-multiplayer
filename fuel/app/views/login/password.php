<section class="wrap" role="main">
    <article class="content">

		<div id="login">
						
			<?php echo Form::open(array('action' => 'login/password', 'method' => 'post')); ?>
			
			
			<h1>J'ai oublié mon mot de passe : </h1>
			
			Identifiant : <?php echo Form::input('username', ''); ?></br>
			Confirmer identifiant : <?php echo Form::input('username_confirm', ''); ?>
			<div class="buttonLogin">
				<?php echo Form::input('submit', 'Envoyer', array('class' => 'myButton', 'type' => 'submit')); ?>
				<?php if (isset($errors)){ echo "<h4>". $errors ."</h4>"; } ?>
			</div>
			
			<?php echo Form::close(); ?>		
			
		</div>

	</article>
</section>