-- Pabal Ahmed
-- 2/13/2026
-- Phase-01 Login and Logout
-- IT202-004 Internet Applications
-- pa478@njit.edu

SHOW DATABASES;

CREATE DATABASE laptop;

SHOW CREATE DATABASE laptop;

-- DROP DATABASE laptop;

CREATE USER 'laptopDBadmin'@'localhost'
IDENTIFIED BY 'thinkp4d!'; --password

--DROP USER 'laptopDBadmin'@'localhost';

GRANT SELECT, UPDATE, INSERT, DELETE
ON laptop.* TO  'laptopDBadmin'@'localhost';

SHOW GRANTS FOR  'laptopDBadmin'@'localhost';

USE laptop;

CREATE TABLE laptop_users (
laptop_user_id  INT          NOT NULL AUTO_INCREMENT,
email_address   VARCHAR(255) NOT NULL UNIQUE,
password        VARCHAR(64)  NOT NULL,
pronouns        VARCHAR(60)  NOT NULL,
first_name      VARCHAR(60)  NOT NULL,
last_name       VARCHAR(60)  NOT NULL,
phone_number    VARCHAR(60)  NOT NULL,
date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (laptop_user_id)
);

SHOW TABLES;
SHOW CREATE TABLE laptop_users;

--DROP TABLE guitar_users;
DESCRIBE laptop_users;

--Master Chief from Halo--
INSERT INTO laptop_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('john117@laptops.com', SHA2('spartan117', 256), 'He/Him',
 'Master', 'Chief', '343-117-2892');

SELECT * FROM laptop_users;

--Donkey Kong from.. Donkey Kong--
INSERT INTO laptop_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('donkeykong@laptops.com', SHA2('king0fthejungle', 256), 'He/Him',
 'Donkey', 'Kong', '501-245-2255');

--Samus Aran from the video game series Metroid... also a Nintendo Game--
INSERT INTO laptop_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('samusaran@laptops.com', SHA2('metro1dlady', 256), 'She/Her',
 'Samus', 'Aran', '454-102-0000');

 --Pabal... me.--
INSERT INTO laptop_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('pabal@laptops.com', SHA2('ilikeicecre4m', 256), 'He/Him',
 'Pabal', 'Ahmed', '973-123-4567');