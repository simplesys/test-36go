<?php

/**
 * Class GoDbConnection
 * Расширения для класса CDbConnection
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class GoDbConnection extends CDbConnection
{
    /**
     * Извлекает название базы данных из строки подключения.
     * Применяется в SQL запросах для указания полного адреса таблицы - база.таблица
     *
     * @return string
     */
    public function getSchemaName()
    {
        preg_match('/dbname=([^;]*)/', $this->connectionString, $matches);
        return $matches[1];
    }
}
