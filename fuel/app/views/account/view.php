<section class="wrap" role="main">
    <article class="content">
        <div style="text-align:center">
            <div class="fiche">

                <div class="fiche_left">
                    
                <?php
                    if ($user->image != null) {
                        echo Html::img($user->image, array("alt" => "Problème lors du chargement de l'image"));
                    } else {
                        echo Html::img('/images/users/default.png', array("alt" => "Aucune photo de profil"));
                    }
                    ?>
                </div>
                <div class="fiche_right">
                    

                    <p>
                        <strong class="monNom"><?php echo $user->username; ?></strong>
                    </p>
                    <p>
                        <strong>Prénom :</strong>
        <?php echo $user->prenom; ?>
                    </p>
                    <p>
                        <strong>Nom :</strong>
        <?php echo $user->nom; ?>
                    </p>
                    <p>
                        <strong>Email :</strong>
        <?php echo $user->email; ?>
                    </p>
                </div>

                <div class="liens">
        <?php echo Html::anchor('account/edit', 'Modifier', array('class' => 'btn', 'style' => 'width:40%')); ?>
        <?php echo Html::anchor('welcome', 'Retour à l\'accueil', array('class' => 'btn', 'style' => 'width:40%')); ?>
                </div>

            </div>
        </div> 
    </article>
</section>