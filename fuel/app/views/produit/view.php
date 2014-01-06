 <section class="wrap" role="main">
    <article class="content">

        <div style="text-align:center">
            <div class="fiche">

                <div class="fiche_left">
                    <?php if ($produit->image != null) {
                        echo Html::img($produit->image, array("alt" => "Problème lors du chargement de l'image"));
                    } else {
                        echo Html::img('/images/produits/default.png', array("alt" => "Aucune photo"));
                    } 
                    ?>
                </div>
                <div class="fiche_right">
                    <p>
                        <strong class="monNom"><?php echo $produit->nom; ?></strong>
                    </p>
                    <p>
                        <strong>Description :</strong>
        <?php echo $produit->desc; ?>
                    </p>
                    <p>
                        <strong>Prix :</strong>
        <?php echo $produit->prix; ?> €
                    </p>
                    <p style="color:<?php if ($produit->troc == 1){echo "green";}else{echo "red";}; ?>">
                        <strong><?php if ($produit->troc == 1) {
            echo "Troc accepté !";
        } else {
            echo "Troc refusé !";
        }; ?></strong>
                    </p>
                    <p>
                        <strong>Vendeur :</strong>
        <?php echo $produit->user->prenom.' '.$produit->user->nom; ?>
                    </p>
                    <p>
                        <strong>Ville :</strong>
        <?php echo $produit->user->ville; ?>
                    </p>
                    <p>
                        <strong>Code Postal :</strong>
        <?php echo $produit->user->cp; ?>
                    </p>
                </div>
                <div class="liens">
        <?php echo Html::anchor('message/create/'.$produit->id, 'Je le veux ♥', array('class' => 'btn success')); ?>
        <?php echo Html::anchor('produit', 'Retour', array('class' => 'btn')); ?>
                </div>
            </div>
        </div>

    </article>
</section>
