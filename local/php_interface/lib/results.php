<?php

namespace Test;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class ResultTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'i_results';
    }
    
    public static function getUfId()
    {
        return 'RESULT';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('USER_ID', array(
                'required' => true,
                'column_name' => 'USER_ID'
            )),
            new Entity\IntegerField('DISCIPLINE_ID', array(
                'required' => true,
                'column_name' => 'DISCIPLINE_ID'
            )),
            new Entity\IntegerField('SCORE', array(
                'required' => true,
                'column_name' => 'SCORE'
            )),
            new Reference("USER",
            UserTable::class,
            Join::on('this.USER_ID', 'ref.ID')
            ),
            
            new Reference("DISCIPLINE",
            DisciplineTable::class,
            Join::on('this.DISCIPLINE_ID', 'ref.ID'))
        );
    }
}
