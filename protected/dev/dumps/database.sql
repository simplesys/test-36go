DROP TABLE IF EXISTS `appointments`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `appointments`
(
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID клиента',
  `name` VARCHAR(100) NOT NULL COMMENT 'Имя клиента',
  `lastName` VARCHAR(100) NOT NULL COMMENT 'Фамилия клиента',
  `phone` VARCHAR(14) NULL COMMENT 'Телефон клиента',
  `email` VARCHAR(100) NULL COMMENT 'Email клиента',
  `datetime` DATETIME NULL COMMENT 'Желательная дата и время приёма',
  `actual` TINYINT NOT NULL DEFAULT 1 COMMENT 'Актуальность заявки',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT = 'Заявки пользователей на приём у врача';

CREATE TABLE IF NOT EXISTS `users`
(
  `login` VARCHAR(100) NOT NULL COMMENT 'Логин',
  `password` VARCHAR(255) NOT NULL COMMENT 'Пароль',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT = 'Справочник пользователей админки';

INSERT INTO appointments (name, lastName, phone, datetime, actual) VALUES ('Test', 'Prime', '79030001122', '2017-05-30 15:00:00', 1);
INSERT INTO appointments (name, lastName, email, actual) VALUES ('Petr', 'Lisov', 'petr@gmail.com', 0);
INSERT INTO `users` (`login`, `password`) VALUES ('admin', '$2y$10$Nf6ndCndhqbcXAqh9JxmfeKM5z7bKmM6ynu3vkCI4.wNaPgnBzzmm');
