<section class="wrap" role="main">
    <article class="content">
		<div id="login">
			<h1>Ne quittez pas cette page !</h1>		
			<h2>Un code vous a été envoyé par mail à l'adresse </h2>
						
			<?php echo Form::open(array('action' => 'login/confirmpassword', 'method' => 'post')); ?>
			
			<h1>Confirmation : </h1>
			
			Code reçu : <?php echo Form::input('confirm_code', ''); ?></br>
			<div class="buttonLogin">
				<?php echo Form::input('submit', 'Envoyer', array('class' => 'myButton', 'type' => 'submit')); ?>
				<?php if (isset($errors)){ echo "<h4>". $errors ."</h4>"; } ?>
			</div>
			
			<?php echo Form::close(); ?>		
			
		</div>
	</article>
</section>