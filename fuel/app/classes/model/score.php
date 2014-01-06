<?php

use Orm\Model;

class Model_Score extends Model {

    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'model_to' => 'Model_User',
        )
    );

    protected static $_properties = array(
        'id',
        'niveau',
        'briques',
        'temps',
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
