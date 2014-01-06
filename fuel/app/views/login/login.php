<div class="hero-unit">
          <h1 id="titre">Vous devez être connecté</h1>
          <div class="row padding">
          <div class="span6">
            <?php echo Form::open(array('action' => 'login/login', 'method' => 'post', 'class' => 'form-horizontal')); ?>
              <h4>Connexion</h4>
              <div class="control-group">
                    <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input id="prependedInput" type="email" name="username" placeholder="exemple@email.com" autofocus required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input id="prependedInput" name="password" type="password" placeholder="*****" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <label class="checkbox">
                    <input type="checkbox" checked="checked"> Se souvenir de moi
                  </label>
                  <button type="submit" class="btn">Connexion</button>  
              </div>
            <?php echo Form::close(); ?>
          </div>
          <div class="span4">
            <?php echo Form::open(array('action' => 'user/create', 'method' => 'post', 'class' => 'form-horizontal')); ?>
              <h4>Inscrivez-vous !</h4>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input id="prependedInput" name="prenom" type="text" placeholder="Prénom" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input id="prependedInput" name="nom" type="text" placeholder="Nom" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input id="prependedInput" name="email" type="email" placeholder="exemple@email.com" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input id="prependedInput" name="password" type="password" placeholder="*****" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input id="prependedInput" name="password_2" type="password" placeholder="*****" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <div class="input-prepend">
                    <span class="add-on"><i class="icon-star-empty"></i></span>
                    <input id="prependedInput" name="username" type="text" placeholder="Pseudo" required="required">
                  </div>
              </div>
              <div class="control-group">
                  <label class="checkbox">
                    <input type="checkbox" name="remember_me" checked="checked"> Se souvenir de moi
                  </label>
                  <button type="submit" class="btn">Valider mon inscription</button>
                </div>
            <?php echo Form::close(); ?>
          </div>
        </div>
        </div>
