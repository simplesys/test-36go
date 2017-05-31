<?php

/**
 * Class Users
 * Модель для работы с таблицей пользователей users
 *
 * @author Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class Users extends GoActiveRecord
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
        return '`'.Yii::app()->db->getSchemaName().'`.`users`';
    }

    /**
     * Валидация
     *
     * @return array массив правил для проверки данных
     */
    public function rules()
    {
        return [
            ['login, password', 'required'],
            ['login, password', 'type', 'type' => 'string'],
            ['login, password', 'safe', 'on' => 'search']
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
            'login' => 'Логин',
            'password' => 'Пароль'
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
        $criteria->compare('login', $this->login);
        $criteria->compare('password', $this->password);

        return new CActiveDataProvider($this, ['criteria' => $criteria]);
    }

    /**
     * Статичный метод для возврата AR модели данного класса
     *
     * @param string $className
     *
     * @return static
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
