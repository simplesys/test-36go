<?php

/**
 * Class LoginForm
 * Форма входа в панель администратора
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    private $_identity;

    /**
     * Валидация
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Не заполнен логин'],
            ['password', 'required', 'message' => 'Не заполнен пароль']
        ];
    }

    /**
     * Подписи к атрибутам
     */
    public function attributeLabels()
    {
        return ['username' => 'Логин', 'password' => 'Пароль'];
    }

    /**
     * Авторизация пользователя по переданным данным
     *
     * @return boolean если авторизация прошла успешно
     */
    public function login()
    {
        if ($this->_identity===null) {
            $this->_identity=new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = 3600*24*30; // 30 дней
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            if ($this->_identity->errorCode === UserIdentity::ERROR_USERNAME_INVALID) {
                $this->addError('username', 'Пользователь не найден');
            } elseif ($this->_identity->errorCode === UserIdentity::ERROR_PASSWORD_INVALID) {
                $this->addError('password', 'Пароль не верен');
            }

            return false;
        }
    }
}
