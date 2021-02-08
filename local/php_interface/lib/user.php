<?php

namespace Test;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class UserTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'b_user';
    }
    
    public static function getUfId()
    {
        return 'USER';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('LOGIN', array(
                'required' => true,
                'column_name' => 'LOGIN'
            )),
            new Entity\StringField('NAME', array(
                'required' => true
            )),
            new Entity\StringField('EMAIL', array(
                'required' => true
            ))
        );
    }
}
