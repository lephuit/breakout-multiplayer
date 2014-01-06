<?php $user_id = Auth::instance()->get_user_id(); $user_infos = Model_User::find($user_id[1]); ?>

  <section class="wrap" role="main">
    <article class="content">
      <?php if ($produits): ?>
            <table class="zebra-striped" style="text-align:center">
                <thead>
                    <tr>
                        <th style="width:102px"></th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Catégorie</th>
                        <th style="width:50px">Prix</th>
                        <th style="width:101px">Troc</th>
                        <th><?php if($user_infos != null){echo 'Distance';}else{echo 'Lieu';} ?></th>
                        <th>Vendeur</th>
                        <th style="width:75px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                    <?php if(!\Auth::check() || $produit->user->id != $user_infos->id): ?>

                      <?php 

                        if(Auth::check()){ 

                            $lat1       = deg2rad($produit->user->lat);
                            $lon1       = deg2rad($produit->user->lng);
                            $lat2       = deg2rad($user_infos->lat);
                            $lon2       = deg2rad($user_infos->lng);

                            $distance   = 2 * asin( sqrt( pow( sin(($lat1-$lat2)/2) , 2) + cos($lat1)*cos($lat2)* pow( sin(($lon1-$lon2)/2) , 2) ) ) * 6366;

                        } else {

                            $user_infos = false;
                            
                        } 

                      ?>

                        <tr>

                            <td>            <?php if ($produit->image_small != null) {
                        echo Html::img($produit->image_small, array("alt" => "Problème lors du chargement de l'image"));
                    } else {
                        echo Html::img('/images/produits/default_small.png', array("alt" => "Aucune photo"));
                    } ?></td>
                            <td><?php echo $produit->nom; ?></td>
                            <td><?php echo $produit->desc; ?></td>
                            <td><?php echo $produit->category->nom; ?></td>
                            <td><?php echo $produit->prix; ?> €</td>
                            <td style="color:
                            <?php

                                if ($produit->troc == 1) {
                                    echo "green";
                                } else {
                                    echo "red";
                                };

                            ?>"><b><?php
                                if ($produit->troc == 1) {
                                    echo "Troc accepté !";
                                } else {
                                    echo "Troc refusé !";
                                };
                        ?></b></td>
                            <td><?php if($user_infos){ $d = explode(".", $distance); echo '~ ' . $d[0] . ' km'; } else { echo $produit->user->ville . ' (' . $produit->user->cp . ')'; } ?></td>
                            <td><?php echo $produit->user->prenom . ' ' . $produit->user->nom; ?></td>

                            <td>
                <?php echo Html::anchor('produit/view/' . $produit->id, 'Voir la Fiche'); ?> 
                            </td>
                        </tr>
                    <?php endif; ?>
            <?php endforeach; ?>	</tbody>
            </table>

        <?php else: ?>
            <p><h2>Il n'y à pas encore de trocs dans cette catégorie...</h2><?php echo Html::anchor('mestrocs/create', 'Ajoutez-en un !', array('class' => 'btn btn-block')); ?> </p>

        <?php endif; ?>
    </article>
</section>