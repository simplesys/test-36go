<?php

/**
 * Class m170531_152946_init_db
 * Создание и первичное заполнение базы данных
 *
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @created   ${DATE}
 */
class m170531_152946_init_db extends CDbMigration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable(
            'appointments',
            [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT COMMENT "ID клиента"',
                'name' => 'VARCHAR(100) NOT NULL COMMENT "Имя клиента"',
                'lastName' => 'VARCHAR(100) NOT NULL COMMENT "Фамилия клиента"',
                'phone' => 'VARCHAR(14) NULL COMMENT "Телефон клиента"',
                'email' => 'VARCHAR(100) NULL COMMENT "Email клиента"',
                'datetime' =>
                    'DATETIME NULL COMMENT "Желательная дата и время приёма"',
                'actual' =>
                    'TINYINT NOT NULL DEFAULT "1" COMMENT "Актуальность заявки"',
                'PRIMARY KEY (`id`)'
            ],
            $tableOptions . ' COMMENT = "Заявки пользователей на приём у врача"'
        );
        $this->createIndex('date-appointments', 'appointments', ['datetime']);

        $this->insertMultiple(
            'appointments', [
                [
                    'name' => 'Test', 'lastName' => 'Prime', 'phone' => '79030001122',
                    'datetime' => '2017-05-30 15:00:00', 'actual' => '1'
                ],
                [
                    'name' => 'Petr', 'lastName' => 'Lisov',
                    'email' => 'petr@gmail.com', 'actual' => '0'
                ],
            ]
        );

        $this->createTable(
            'users',
            [
                'login'=>'VARCHAR(100) NOT NULL COMMENT "Логин"',
                'password'=>'VARCHAR(255) NOT NULL COMMENT "Пароль"',
                'PRIMARY KEY (`login`)'
            ],
            $tableOptions . ' COMMENT = "Справочник пользователей админки"'
        );

        $this->insert(
            'users',
            ['login' => 'admin', 'password' => '$2y$10$Nf6ndCndhqbcXAqh9JxmfeKM5z7bKmM6ynu3vkCI4.wNaPgnBzzmm']
        );
    }

    public function safeDown()
    {
        $this->dropTable('appointments');
        $this->dropTable('users');
    }
}