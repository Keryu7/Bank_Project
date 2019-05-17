--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 17.05.2019 14:33:50
-- Версия сервера: 8.0.12
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE bank_project;

--
-- Удалить таблицу `country1`
--
DROP TABLE IF EXISTS country1;

--
-- Удалить таблицу `migration`
--
DROP TABLE IF EXISTS migration;

--
-- Удалить таблицу `inkass`
--
DROP TABLE IF EXISTS inkass;

--
-- Удалить таблицу `repair`
--
DROP TABLE IF EXISTS repair;

--
-- Удалить таблицу `users`
--
DROP TABLE IF EXISTS users;

--
-- Удалить таблицу `auth_assignment`
--
DROP TABLE IF EXISTS auth_assignment;

--
-- Удалить таблицу `auth_item_child`
--
DROP TABLE IF EXISTS auth_item_child;

--
-- Удалить таблицу `auth_item`
--
DROP TABLE IF EXISTS auth_item;

--
-- Удалить таблицу `auth_rule`
--
DROP TABLE IF EXISTS auth_rule;

--
-- Удалить таблицу `bankatm`
--
DROP TABLE IF EXISTS bankatm;

--
-- Удалить таблицу `address`
--
DROP TABLE IF EXISTS address;

--
-- Удалить таблицу `modelatm`
--
DROP TABLE IF EXISTS modelatm;

--
-- Удалить таблицу `soft`
--
DROP TABLE IF EXISTS soft;

--
-- Установка базы данных по умолчанию
--
USE bank_project;

--
-- Создать таблицу `soft`
--
CREATE TABLE soft (
  id_soft int(11) NOT NULL AUTO_INCREMENT,
  soft_name enum ('Agilis 3.0', 'Agilis 2.4', 'Kalignite') NOT NULL,
  PRIMARY KEY (id_soft)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `modelatm`
--
CREATE TABLE modelatm (
  id_model int(11) NOT NULL AUTO_INCREMENT,
  model_name varchar(255) NOT NULL,
  id_soft int(11) NOT NULL,
  PRIMARY KEY (id_model)
)
ENGINE = INNODB,
AUTO_INCREMENT = 12,
AVG_ROW_LENGTH = 2048,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE modelatm
ADD CONSTRAINT FK_model_soft_ID_Soft FOREIGN KEY (id_soft)
REFERENCES soft (id_soft);

--
-- Создать таблицу `address`
--
CREATE TABLE address (
  id_address int(11) NOT NULL AUTO_INCREMENT,
  region enum ('Минск и Минская область', 'Брестская область', 'Витебская область', 'Гомельская область', 'Гродненская область', 'Могилевская область') NOT NULL DEFAULT 'Минск и Минская область',
  address varchar(255) NOT NULL,
  PRIMARY KEY (id_address)
)
ENGINE = INNODB,
AUTO_INCREMENT = 31,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `bankatm`
--
CREATE TABLE bankatm (
  id_atm int(11) NOT NULL,
  id_model int(11) NOT NULL,
  id_address int(11) NOT NULL,
  PRIMARY KEY (id_atm)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE bankatm
ADD CONSTRAINT FK_atm_address_ID_Adrress FOREIGN KEY (id_address)
REFERENCES address (id_address);

--
-- Создать внешний ключ
--
ALTER TABLE bankatm
ADD CONSTRAINT FK_atm_model_ID_Model FOREIGN KEY (id_model)
REFERENCES modelatm (id_model);

--
-- Создать таблицу `auth_rule`
--
CREATE TABLE auth_rule (
  name varchar(64) NOT NULL,
  data blob DEFAULT NULL,
  created_at int(11) DEFAULT NULL,
  updated_at int(11) DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

--
-- Создать таблицу `auth_item`
--
CREATE TABLE auth_item (
  name varchar(64) NOT NULL,
  type smallint(6) NOT NULL,
  description text DEFAULT NULL,
  rule_name varchar(64) DEFAULT NULL,
  data blob DEFAULT NULL,
  created_at int(11) DEFAULT NULL,
  updated_at int(11) DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

--
-- Создать индекс `idx-auth_item-type` для объекта типа таблица `auth_item`
--
ALTER TABLE auth_item
ADD INDEX `idx-auth_item-type` (type);

--
-- Создать внешний ключ
--
ALTER TABLE auth_item
ADD CONSTRAINT auth_item_ibfk_1 FOREIGN KEY (rule_name)
REFERENCES auth_rule (name) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Создать таблицу `auth_item_child`
--
CREATE TABLE auth_item_child (
  parent varchar(64) NOT NULL,
  child varchar(64) NOT NULL,
  PRIMARY KEY (parent, child)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

--
-- Создать внешний ключ
--
ALTER TABLE auth_item_child
ADD CONSTRAINT auth_item_child_ibfk_1 FOREIGN KEY (parent)
REFERENCES auth_item (name) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE auth_item_child
ADD CONSTRAINT auth_item_child_ibfk_2 FOREIGN KEY (child)
REFERENCES auth_item (name) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать таблицу `auth_assignment`
--
CREATE TABLE auth_assignment (
  item_name varchar(64) NOT NULL,
  user_id varchar(64) NOT NULL,
  created_at int(11) DEFAULT NULL,
  PRIMARY KEY (item_name, user_id)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

--
-- Создать индекс `idx-auth_assignment-user_id` для объекта типа таблица `auth_assignment`
--
ALTER TABLE auth_assignment
ADD INDEX `idx-auth_assignment-user_id` (user_id);

--
-- Создать внешний ключ
--
ALTER TABLE auth_assignment
ADD CONSTRAINT auth_assignment_ibfk_1 FOREIGN KEY (item_name)
REFERENCES auth_item (name) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать таблицу `users`
--
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL DEFAULT '''''',
  lastname varchar(255) NOT NULL DEFAULT '''''',
  password varchar(255) NOT NULL DEFAULT '''''',
  role enum ('admin', 'engineer', 'operator') NOT NULL DEFAULT 'operator',
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 43,
AVG_ROW_LENGTH = 564,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `lastname` для объекта типа таблица `users`
--
ALTER TABLE users
ADD UNIQUE INDEX lastname (lastname);

--
-- Создать таблицу `repair`
--
CREATE TABLE repair (
  id_repair int(11) NOT NULL AUTO_INCREMENT,
  repair varchar(255) NOT NULL,
  date_repair datetime NOT NULL,
  id_atm int(11) NOT NULL,
  id_user int(11) NOT NULL,
  PRIMARY KEY (id_repair)
)
ENGINE = INNODB,
AUTO_INCREMENT = 11,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE repair
ADD CONSTRAINT FK_repair_atm_ID_ATM FOREIGN KEY (id_atm)
REFERENCES bankatm (id_atm) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE repair
ADD CONSTRAINT FK_repair_users_id FOREIGN KEY (id_user)
REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать таблицу `inkass`
--
CREATE TABLE inkass (
  id_inkass int(11) NOT NULL AUTO_INCREMENT,
  amount_inkass varchar(255) NOT NULL,
  date_inkass datetime NOT NULL,
  id_atm int(11) NOT NULL,
  id_user int(11) NOT NULL,
  PRIMARY KEY (id_inkass)
)
ENGINE = INNODB,
AUTO_INCREMENT = 12,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE inkass
ADD CONSTRAINT FK_inkass_bankatm_id_atm FOREIGN KEY (id_atm)
REFERENCES bankatm (id_atm) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE inkass
ADD CONSTRAINT FK_inkass_users_id FOREIGN KEY (id_user)
REFERENCES users (id) ON DELETE CASCADE;

--
-- Создать таблицу `migration`
--
CREATE TABLE migration (
  version varchar(180) NOT NULL,
  apply_time int(11) DEFAULT NULL,
  PRIMARY KEY (version)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `country1`
--
CREATE TABLE country1 (
  code char(2) NOT NULL,
  name char(52) NOT NULL,
  population int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (code)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы soft
--
INSERT INTO soft VALUES
(1, 'Agilis 2.4'),
(2, 'Agilis 3.0'),
(3, 'Kalignite');

-- 
-- Вывод данных для таблицы modelatm
--
INSERT INTO modelatm VALUES
(1, 'Diebold 720', 1),
(2, 'Diebold 720', 2),
(3, 'Diebold 522', 2),
(4, 'Diebold 522', 3),
(5, 'Wincor', 3),
(6, 'Wincor', 1),
(7, 'Wincor', 2),
(8, 'NCR', 3),
(9, 'NCR', 1),
(10, 'NCR', 2),
(11, 'GRG', 3);

-- 
-- Вывод данных для таблицы address
--
INSERT INTO address VALUES
(1, 'Минск и Минская область', 'Минск, Коллекторная, 11-2'),
(2, 'Минск и Минская область', 'Минск, Бобруйская, 9'),
(3, 'Минск и Минская область', 'Минск, пр. Дзержинского, 3'),
(4, 'Минск и Минская область', 'Минск, ул. Слободская, 47'),
(5, 'Минск и Минская область', 'Минск, пр. Независимости, 21'),
(6, 'Брестская область', 'Брест, ул. Советская, 56'),
(7, 'Брестская область', 'Жабинка, ул. Кирова, 126'),
(8, 'Брестская область', 'Брест, ул.Кижеватова, 76'),
(9, 'Брестская область', 'Береза, ул.Ленина, 104'),
(10, 'Брестская область', 'Пинск, ул. Солнечная, 57'),
(11, 'Витебская область', 'Витебск ул.Ленина, 26а'),
(12, 'Витебская область', 'Витебск, пр-т Московский, 33'),
(13, 'Витебская область', 'Полоцк, ул. Е. Полоцкой, 77б'),
(14, 'Витебская область', 'Орша, ул.Могилёвская, 95а'),
(15, 'Витебская область', 'Новополоцк, ул.Якуба Коласа, 6'),
(16, 'Гомельская область', 'Гомель, ул.Полесская, 19Б'),
(17, 'Гомельская область', 'Гомель, ул.Гагарина, 65'),
(18, 'Гомельская область', 'Мозырь, ул. Котловца, 14'),
(19, 'Гомельская область', 'Светлогорск, ул.Калинина, 4'),
(20, 'Гомельская область', 'Жлобин, ул.Первомайская, 77a'),
(21, 'Гродненская область', 'Гродно, пр.Дзержинского, 100'),
(22, 'Гродненская область', 'Гродно, ул.Фомичева, 2'),
(23, 'Гродненская область', 'Лида, ул.Кирова, 10'),
(24, 'Гродненская область', 'Волковыск, ул.Ленина, 26'),
(25, 'Гродненская область', 'Слоним , ул. Первомайская, 4'),
(26, 'Могилевская область', 'Могилев, ул.Первомайская, 28а'),
(27, 'Могилевская область', 'Могилев, ул.Ленинская ,47'),
(28, 'Могилевская область', 'Горки, ул.Ленина, 20'),
(29, 'Могилевская область', 'Бобруйск, ул.Социалистическая, 84'),
(30, 'Могилевская область', 'Бобруйск, ул.Советская, 129');

-- 
-- Вывод данных для таблицы auth_rule
--
-- Таблица bank_project.auth_rule не содержит данных

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'Юрий', 'Цыманович', '$2y$13$lc0NYug2nys9RfSPUfLgou/CwF2YCYJ5RIniQveWbmjsnikPPlMBC', 'admin'),
(2, 'Иван', 'Иванов', '$2y$13$XAAT9gh8LT7ZG76lwXawzec0jf0uoLs.eI0FQPO1yXjblJlbxsWOi', 'operator'),
(3, 'Василий', 'Потапов', '$2y$13$jZmcCO9CslMh1AyjzMzB9OkEY4GZQIQEiXNmM9TmUxAtnRKPOF4/u', 'engineer'),
(11, 'Александр', 'Курцев', '$2y$13$jZmcCO9CslMh1AyjzMzB9OkEY4GZQIQEiXNmM9TmUxAtnRKPOF4/u', 'engineer'),
(14, 'Петр', 'Петров', '$2y$13$GhVPJylafql7qvwQyaOekOsRRBE5uYf6bnb4KKG6.SCFOltU5JUC2', 'operator'),
(40, 'Семен', 'Семенов', '$2y$13$RuY9js0OqVI/yP.86GJewOnAS8GyZ5VH7GTEz1I/KZJdN8bRxYbXy', 'operator'),
(41, 'Роман', 'Жук', '$2y$13$ovJz3AkEIJjcxWeA6PitreJfMzvUitQTZuisT845Dn6Cl2SoWz16C', 'operator');

-- 
-- Вывод данных для таблицы bankatm
--
INSERT INTO bankatm VALUES
(1245378, 3, 9),
(1245852, 4, 19),
(2235687, 8, 15),
(2534685, 4, 10),
(3265125, 3, 5),
(3325632, 3, 28),
(3659635, 1, 22),
(4254325, 5, 11),
(4325624, 1, 7),
(4477665, 10, 13),
(4532652, 2, 21),
(5243658, 11, 12),
(5632543, 11, 26),
(5843586, 1, 2),
(5967314, 5, 18),
(6535874, 7, 16),
(6539856, 9, 24),
(6701032, 8, 3),
(6708951, 5, 1),
(6715016, 2, 4),
(6739011, 4, 6),
(6758532, 6, 17),
(6853754, 6, 23),
(7539515, 1, 30),
(7586352, 10, 25),
(7665453, 2, 8),
(8563256, 6, 27),
(9653258, 9, 14),
(9653285, 7, 29),
(9863523, 3, 20);

-- 
-- Вывод данных для таблицы auth_item
--
INSERT INTO auth_item VALUES
('admin', 1, NULL, NULL, NULL, 1556805142, 1556805142),
('inkass', 1, NULL, NULL, NULL, 1556805142, 1556805142),
('repair', 1, NULL, NULL, NULL, 1556805142, 1556805142),
('updateInkass', 2, 'Инкассация', NULL, NULL, 1556805142, 1556805142),
('updateRepair', 2, 'Ремонт', NULL, NULL, 1556805142, 1556805142),
('viewAdminPage', 2, 'Просмотр админки', NULL, NULL, 1556805142, 1556805142);

-- 
-- Вывод данных для таблицы repair
--
INSERT INTO repair VALUES
(1, 'Замена картридера', '2019-04-17 00:00:00', 6715016, 3),
(2, 'Ремонт диспенсера', '2019-02-07 19:12:04', 1245378, 11),
(3, 'Ремонт чекового принтера', '2019-03-13 00:00:00', 6708951, 11),
(4, 'Тех. обслуживание', '2019-05-08 00:00:00', 6701032, 3),
(5, 'Замятие чековой ленты', '2019-03-21 00:00:00', 1245378, 11),
(6, 'Замена винчестера', '2019-05-14 00:00:00', 9653285, 3),
(7, 'Ремонт монитора', '2018-12-21 00:00:00', 4254325, 3),
(8, 'Замена клавиатуры', '2019-03-06 00:00:00', 3325632, 11),
(9, 'Чистка механизмов', '2019-03-20 00:00:00', 6701032, 3),
(10, 'Замена вентилятора системника', '2019-01-17 00:00:00', 6701032, 11);

-- 
-- Вывод данных для таблицы migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1556803279);

-- 
-- Вывод данных для таблицы inkass
--
INSERT INTO inkass VALUES
(1, '20000', '2019-05-02 13:23:14', 6701032, 2),
(2, '30000', '2019-05-07 13:22:11', 1245378, 14),
(3, '20000', '2019-04-11 14:32:32', 1245852, 40),
(4, '20000', '2019-05-15 15:43:52', 1245378, 14),
(5, '30000', '2019-03-13 15:02:00', 3325632, 2),
(6, '30000', '2019-05-16 14:51:26', 2235687, 2),
(7, '20000', '2019-03-21 14:52:00', 9863523, 2),
(8, '30000', '2019-03-01 13:56:01', 9863523, 40),
(9, '40000', '2019-04-26 00:00:00', 9653285, 14),
(10, '40000', '2019-05-07 00:00:00', 9653285, 14),
(11, '20000', '2019-04-20 19:00:00', 3659635, 41);

-- 
-- Вывод данных для таблицы country1
--
INSERT INTO country1 VALUES
('AU', 'Australia', 24016400),
('BR', 'Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- 
-- Вывод данных для таблицы auth_item_child
--
INSERT INTO auth_item_child VALUES
('admin', 'updateInkass'),
('inkass', 'updateInkass'),
('admin', 'updateRepair'),
('repair', 'updateRepair'),
('admin', 'viewAdminPage');

-- 
-- Вывод данных для таблицы auth_assignment
--
INSERT INTO auth_assignment VALUES
('admin', '1', 1556805142),
('inkass', '14', 1557999027),
('inkass', '2', 1556805142),
('inkass', '39', 1556873916),
('inkass', '40', 1557999280),
('inkass', '41', 1558091804),
('repair', '3', 1556805142),
('repair', '37', 1556873812),
('repair', '42', 1558092254);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;