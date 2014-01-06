<?php echo Form::open(array('class' => 'form-stacked')); ?>

<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Nom *', 'nom'); ?>

        <div class="input">
            <?php echo Form::input('nom', Input::post('nom', isset($produit) ? $produit->nom : ''), array('class' => 'span6')); ?>
            <?php echo Form::input('user_id', Input::post('nom', /*isset($produit) ? $produit->user_id : ''*/ 1), array('TYPE' => 'hidden')); ?>

        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Description', 'desc'); ?>

        <div class="input">
            <?php echo Form::input('desc', Input::post('desc', isset($produit) ? $produit->desc : ''), array('class' => 'span6')); ?>

        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Catégorie *', 'produit_category_id'); ?>

        <div class="input">
            <?php
            $choixselect = array('0' => 'Autre',);
            
            foreach ($categories as $categorie) :
                $choixselect[$categorie->id] = $categorie->nom;
            endforeach;

            echo Form::select('produit_category_id', isset($produit) ? $produit->produit_category_id : '', $choixselect);
            ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Prix ? *', 'prix'); ?>

        <div class="input">
            <?php echo Form::input('prix', Input::post('prix', isset($produit) ? $produit->prix : ''), array('class' => 'span2')); ?> €

        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Troc ? *', 'troc'); ?>

        <div class="input">
            Oui : <?php echo Form::radio('troc', '1', true);?></br> Non : <?php echo Form::radio('troc', '0'); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Image ( Vivement conseillé ! )', 'image'); ?>

        <div class="input">
            <?php echo Form::input('image', Input::post('image', isset($produit) ? $produit->image : ''), array('class' => 'span6')); ?>

        </div>
    </div>
    <div class="actions">
        <?php echo Form::submit('submit', 'Sauvegarder', array('class' => 'btn primary')); ?>

    </div>
</fieldset>
<?php echo Form::close(); ?>