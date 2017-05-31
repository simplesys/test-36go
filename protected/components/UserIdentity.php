<?php

/**
 * Class UserIdentity
 * Идентификация пользователя
 *
 * @author  Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created 30.05.2017
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Аутентификация пользователя
     *
     * @return boolean если аутентификация прошла успешно.
     */
    public function authenticate()
    {
        $user = Users::model()->find('login = :username', [':username' => $this->username]);

        if (!isset($user->login)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!password_verify($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
}