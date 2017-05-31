<?php

/**
 * Class AppointmentForm
 * Модель формы записи на приём
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class AppointmentForm extends CFormModel
{
    public $name;
    public $lastName;
    public $datetime;
    public $phone;
    public $email;

    /**
     * Валидация
     *
     * @return array массив правил для проверки данных
     */
    public function rules()
    {
        $validatesRules = [
            ['name', 'required', 'message' => 'Необходимо указать ваше имя'],
            ['lastName', 'required', 'message' => 'Необходимо указать вашу фамилию'],
            [
                'phone', 'numerical', 'integerOnly' => true, 'allowEmpty' => true,
                'message' => 'Номер телефона может состоять только из цифр'
            ],
            ['email', 'email', 'allowEmpty' => true, 'message' => ''],
            [
                'datetime', 'date', 'format' => 'yyyy-mm-dd hh:mm:ss', 'allowEmpty' => true,
                'message' => 'Дата и время приёма указаны не верно, воспользуйтесь календарём для выбора'
            ],
            [
                'name, lastName, email', 'length', 'max' => 100,
                'tooLong' => 'Имя, фамилия и email не могут быть длиннее 100 символов'
            ]
        ];

        if (empty($_POST[get_class($this)]['email'])) {
            $validatesRules[] = [
                'phone', 'required', 'message' =>
                    'Необходимо заполнить телефон или email, чтобы наши сотрудники могли с вами связаться'
            ];
        } else {
            $validatesRules[] = [
                'email', 'required', 'message' =>
                    'Необходимо заполнить телефон или email, чтобы наши сотрудники могли с вами связаться'
            ];
        }

        return $validatesRules;
    }

    /**
     * Подписи колонок
     *
     * @return array подписи к колонкам таблицы в формате (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя клиента',
            'lastName' => 'Фамилия клиента',
            'datetime' => 'Дата и время записи на приём',
            'phone' => 'Телефон клиента',
            'email' => 'Email клиента'
        ];
    }
} 