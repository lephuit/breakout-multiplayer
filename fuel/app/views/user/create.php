
 <section class="wrap" role="main">
    <article class="content">
		<div id="content">
            <div id="wrapper">
                <div id="steps">
                    <?php echo Form::open(array('class' => 'form-stacked', 'ENCTYPE' => 'multipart/form-data')); ?>
                        <fieldset class="step" <?php if(isset($open)) {echo 'style="display:none"';} ?>>
                            <legend>Gagnez du temps !</legend>
                            <p>
                                En vous connectant avec <b>Facebook</b> ou <b>Twitter</b>, vous nous offrez la possibilité de rendre votre inscription <b>encore plus rapide !</b>
                            </p>
                            <p>
                                <?php echo Html::anchor($facebook_login, 'S\'inscrire avec Facebook', array('class' => 'btn inscription')); ?></p><p>
                                <?php echo Html::anchor('welcome', 'S\'inscrire avec Twitter', array('class' => 'btn inscription')); ?>
                            </p>
                            <p>
                                <a class="btn inscription" id="skip">Passer cette étape</a>
                            </p>
                        </fieldset>
                        <fieldset id="etape2" class="step" <?php if(!isset($open)) {echo 'style="display:none"';} ?> >
                            <legend>Informations personnelles</legend>
                                <p id="divprenom" class="none">
                                    <label for="username">Prénom</label>
                                    <?php echo Form::input('prenom', Input::post('prenom', isset($user) ? $user->prenom : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'prenom')); ?>
                                </p>
                                <p id="divnom" class="none">
                                    <label for="username">Nom</label>
                                    <?php echo Form::input('nom', Input::post('nom', isset($user) ? $user->nom : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'nom')); ?>
                                </p>
                                <p id="divemail" class="none">
                                    <label for="email">Email</label>
                                    <?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'email')); ?>
                                </p>
                                <p id="divpassword" class="none">
                                    <label for="password">Mot de passe</label>
                                    <?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'password', 'type' => 'password')); ?>
                                </p>
                                <p id="divville" class="none">
                                    <label for="email">Ville</label>
                                    <?php echo Form::input('ville', Input::post('ville', isset($user) ? $user->ville : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'ville')); ?>
                                </p>
                                <p id="divcp" class="none">
                                    <label for="email">Code Postal</label>
                                    <?php echo Form::input('cp', Input::post('cp', isset($user) ? $user->cp : ''), array('AUTOCOMPLETE' => 'OFF', 'id' => 'cp')); ?>
                                </p>
                                <?php echo Form::input('lat', Input::post('lat', isset($user) ? $user->lat : ''), array('type' => 'hidden', 'id' => 'lat')); ?>
                                <?php echo Form::input('lng', Input::post('lng', isset($user) ? $user->lng : ''), array('type' => 'hidden', 'id' => 'lng')); ?>
                            <div class="QTCenter" <?php if(isset($open)) {echo 'style="display:none"';} ?>>
                                <div class="QapTcha"></div>
                            </div>
                        </fieldset>
                        <fieldset id="etape3" class="step" <?php if(!isset($open)) {echo 'style="display:none"';} ?>>
                            <legend>Félicitation !</legend>
                           	<p>
                                Merci encore de faire confiance à Shop & Troc !
                            </p>
                            <p class="submit">
                                <a class="choix" id="bra" type="submit">Valider mon inscription !</a>
                            </p>
                        </fieldset>
                    <?php echo Form::close(); ?>
                </div>
            </div>
        </div>
	</article>
</section>
