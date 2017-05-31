<?php


/**
 * Class GoActiveRecord
 * Description
 *
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created   31.05.17
 */
class GoActiveRecord extends CActiveRecord
{
    /**
     * Class constructor
     * @param string $db
     */
    public function __construct($db)
    {
        if ($db !== null AND $db instanceof CDbConnection) {
            self::$db = $db;
            self::$db->setActive(true);
        }
        $scenario = 'insert';
        parent::__construct($scenario);
    }
}
