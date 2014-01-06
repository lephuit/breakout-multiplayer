<?php

use Orm\Model;

class Model_Niveaux extends Model {

    protected static $_table_name  = "niveaux";

    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'model_to' => 'Model_User',
        )
    );

    protected static $_properties = array(
        'id',
        'nom',
        'couleur',
        'ligne_1',
        'ligne_2',
        'ligne_3',
        'ligne_4',
        'ligne_5',
        'user_id',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
        ),
    );

    public static function validate($factory) {
        return true;
    }

}
