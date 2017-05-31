<?php

/**
 * Class Appointments
 * Модель для работы с таблицей заявок appointments
 *
 * @author Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class Appointments extends GoActiveRecord
{

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct(Yii::app()->db);
    }

    /**
     * Возвращает текущее соединение с базой данных
     *
     * @return CDbConnection
     */
    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    /**
     * Возвращает полное имя таблицы
     *
     * @return string имя таблицы в базе данных
     */
    public function tableName()
    {
        return '`'.Yii::app()->db->getSchemaName().'`.`appointments`';
    }

    /**
     * Валидация
     *
     * @return array массив правил для проверки данных
     */
    public function rules()
    {
        return [
            ['name, lastName, datetime', 'required'],
            ['id', 'numerical', 'integerOnly' => true, 'allowEmpty' => true],
            ['name, lastName', 'type', 'type' => 'string'],
            ['phone', 'numerical', 'integerOnly' => true, 'allowEmpty' => true],
            ['email', 'email', 'allowEmpty' => true],
            ['datetime', 'date', 'format' => 'yyyy-mm-dd hh:mm:ss', 'allowEmpty' => false],
            ['name, lastName, email', 'length', 'max' => 100],
            ['actual', 'in', 'range' => ['0', '1'], 'allowEmpty' => false],
            ['name, lastName, phone, email, datetime', 'safe', 'on' => 'search']
        ];
    }

    /**
     * Подписи колонок
     *
     * @return array подписи к колонкам таблицы в формате (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя клиента',
            'lastName' => 'Фамилия клиента',
            'datetime' => 'Дата и время записи на приём',
            'phone' => 'Телефон клиента',
            'email' => 'Email клиента',
            'actual' => 'Актуальность заявки'
        ];
    }

    /**
     * Отношения
     * @return array relational rules.
     */
    public function relations()
    {
        return [];
    }

    /**
     * Фильтрация данных и поиск
     *
     * @return CActiveDataProvider объект для построения CGridView, CListView.
     */
    public function search()
    {
        $criteria=new CDbCriteria;

        return new CActiveDataProvider(
            $this, ['criteria' => $criteria, 'sort' => [
            'defaultOrder' => [
                'datetime' => SORT_DESC,
                'lastName' => SORT_ASC,
            ]]]
        );
    }

    /**
     * Обновить актуальность заявки
     *
     * @param int $id
     * @param int $actual
     */
    public function updateActual($id, $actual)
    {
        $this->updateAll(['actual' => $actual], 'id = :id', [':id' => $id]);
    }

    /**
     * Статичный метод для возврата AR модели данного класса
     *
     * @param string $className
     *
     * @return static
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
