--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 26.04.2019 16:54:00
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
AUTO_INCREMENT = 11,
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
AUTO_INCREMENT = 7,
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
AUTO_INCREMENT = 14,
AVG_ROW_LENGTH = 3276,
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
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE repair
ADD CONSTRAINT FK_repair_atm_ID_ATM FOREIGN KEY (id_atm)
REFERENCES bankatm (id_atm);

--
-- Создать внешний ключ
--
ALTER TABLE repair
ADD CONSTRAINT FK_repair_users_id FOREIGN KEY (id_user)
REFERENCES users (id);

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
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE inkass
ADD CONSTRAINT FK_inkass_atm_ID_ATM FOREIGN KEY (id_atm)
REFERENCES bankatm (id_atm);

--
-- Создать внешний ключ
--
ALTER TABLE inkass
ADD CONSTRAINT FK_inkass_users_id FOREIGN KEY (id_user)
REFERENCES users (id);

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
(10, 'NCR', 2);

-- 
-- Вывод данных для таблицы address
--
INSERT INTO address VALUES
(1, 'Минск и Минская область', 'Минск, Коллекторная, 11-2'),
(2, 'Минск и Минская область', 'Минск, Бобруйская, 9'),
(3, 'Минск и Минская область', 'Минск, пр. Дзержинского, 3'),
(4, 'Минск и Минская область', 'Минск, ул. Слободская, 47'),
(5, 'Минск и Минская область', 'Минск, пр. Независимости, 21'),
(6, 'Брестская область', 'Брест');

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(9, 'Юрий', 'Цыманович', '$2y$13$lc0NYug2nys9RfSPUfLgou/CwF2YCYJ5RIniQveWbmjsnikPPlMBC', 'admin'),
(10, 'Василий', 'Потапов', '$2y$13$jZmcCO9CslMh1AyjzMzB9OkEY4GZQIQEiXNmM9TmUxAtnRKPOF4/u', 'engineer'),
(11, 'Александр', 'Курцев', '$2y$13$jZmcCO9CslMh1AyjzMzB9OkEY4GZQIQEiXNmM9TmUxAtnRKPOF4/u', 'engineer'),
(13, 'Франциск', 'Скорина', '$2y$13$XAAT9gh8LT7ZG76lwXawzec0jf0uoLs.eI0FQPO1yXjblJlbxsWOi', 'operator'),
(14, 'Владимир', 'Короткевич', '$2y$13$GhVPJylafql7qvwQyaOekOsRRBE5uYf6bnb4KKG6.SCFOltU5JUC2', 'operator');

-- 
-- Вывод данных для таблицы bankatm
--
INSERT INTO bankatm VALUES
(6701032, 3, 3),
(6705001, 1, 2),
(6712016, 2, 4),
(6739011, 4, 6);

-- 
-- Вывод данных для таблицы repair
--
-- Таблица bank_project.repair не содержит данных

-- 
-- Вывод данных для таблицы inkass
--
-- Таблица bank_project.inkass не содержит данных

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
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;