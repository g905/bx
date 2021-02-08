<?php

namespace Test;

use Bitrix\Main\Entity;

class DisciplineTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'i_disciplines';
    }
    
    public static function getUfId()
    {
        return 'DISCIPLINE';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('NAME', array(
                'required' => true,
                'column_name' => 'NAME'
            ))
        );
    }
}
