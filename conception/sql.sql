
-- Partie 1

-- Exercice 1
CREATE DATABASE `languages`;

-- Exercice 2
CREATE DATABASE `webDevelopment` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

-- Exercice 3
CREATE DATABASE IF NOT EXISTS `frameworks` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

-- Exercice 4
CREATE DATABASE IF NOT EXISTS `languages` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Exercice 5  
DROP DATABASE `languages`;

-- Exercice 6
DROP DATABASE IF EXISTS `frameworks`;

-- Exercice 7
DROP DATABASE IF EXISTS `languages`;

-- Partie 2
-- Exercice 1
USE `webDevelopment`;
CREATE TABLE `languages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `language` VARCHAR(15) NOT NULL
) ENGINE=InnoDB;

-- Exercice 2
USE `webDevelopment`;
CREATE TABLE `tools` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
    `tool` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Exercice 3
USE `webDevelopment`;
CREATE TABLE `frameworks` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Exercice 4
USE `webDevelopment`;
CREATE TABLE `libraries` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
    `library` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Exercice 5
USE `webDevelopment`;
CREATE TABLE `ide` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ideName` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Exercice 6
USE `webDevelopment`;
CREATE TABLE IF NOT EXISTS `frameworks` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Exercice 7
USE `webDevelopment`;
DROP TABLE IF EXISTS  `tools`;

-- Exercice 8
USE `webDevelopment`;
DROP TABLE `libraries`;

-- Exercice 9
USE `webDevelopment`;
DROP TABLE `ide`;

-- TP
CREATE DATABASE `codex` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `codex`;

CREATE TABLE `clients` (
   `id`INT AUTO_INCREMENT PRIMARY KEY, 
    `lastname` VARCHAR(20) NOT NULL,
    `firstname` VARCHAR(20) NOT NULL,
    `birthdate` DATE NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `firstPhoneNumber` INT NOT NULL,
    `secondPhoneNumber` INT,
    `mail` VARCHAR(50)  NOT NULL
) ENGINE=InnoDB;

-- Partie 3

-- Exercice 1
USE `webDevelopment`;
ALTER TABLE `languages`
ADD COLUMN `versions` VARCHAR(10);

-- Exercice 2
USE `webDevelopment`;
ALTER TABLE `frameworks`
ADD COLUMN `version` INT;

-- Exercice 3
USE `webDevelopment`;
ALTER TABLE `languages`
CHANGE `versions` `version` INT;

-- Exercice 4
USE `webDevelopment`;
ALTER TABLE `frameworks`
CHANGE `name` `framework` VARCHAR(10);

-- Exercice 5
USE `webDevelopment`;
ALTER TABLE `frameworks`
CHANGE `version` `version` VARCHAR(10);

-- TP
USE `codex`;
ALTER TABLE `clients`
DROP COLUMN `secondPhoneNumber`,
CHANGE `firstPhoneNumber` `phoneNumber` VARCHAR(15),
ADD COLUMN `zipCode` VARCHAR(5) NOT NULL,
ADD COLUMN `city` VARCHAR(20) NOT NULL;

-- Partie 4

-- Exercice 1
USE `webDevelopment`;
INSERT INTO `languages` (`language`, `version`)
VALUES ('JavaScript', 5),
('PHP', 5.2),
('PHP', 5.4),
('HTML', 5.1),
('JavaScript', 6),
('JavaScript', 7),
('JavaScript', 8),
('PHP', 7);

-- Exercice 2
USE `webDevelopment`;
INSERT INTO `frameworks` (`framework`, `version`)
VALUES ('Symfony', 2.8),
('Symfony', 3),
('Jquery', 1.6),
('Jquery', 2.10);

-- Partie 5

-- Exercice 1
USE `webDevelopment`;
SELECT * FROM `languages`;

-- Exercice 2
USE `webDevelopment`;
SELECT `version` FROM `languages` WHERE `language` = 'PHP';

-- Exercice 3
USE `webDevelopment`;
SELECT `version` FROM `languages` WHERE `language` = 'PHP' OR `language` = 'JavaScript';

-- Exercice 4
USE `webDevelopment`;
SELECT * FROM `languages` WHERE `id` = 3 OR `id` = 5 OR `id` = 7;

-- OU
USE `webDevelopment`;
SELECT * FROM `languages` WHERE `id` IN (3, 5, 7);

-- Exercice 5
SELECT `id`, `language` 
FROM `languages` 
WHERE `language` = 'Javascript'
LIMIT 2;

-- Exercice 6
SELECT `id`, `language` 
FROM `languages` 
WHERE NOT `language` = 'PHP'

-- OU
SELECT `id`, `language`
FROM `languages`
WHERE `language` != 'PHP';

-- OU
SELECT `id`, `language`
FROM `languages`
WHERE `language` <> 'PHP';

-- Exercice 7
SELECT DISTINCT `language` 
FROM `languages` 
ORDER BY `language` ASC;

-- OU
SELECT `language`
FROM `languages`
GROUP BY `language`
ORDER BY `language` ASC;

-- Partie 6

-- Exercice 1
SELECT *
FROM `frameworks`
WHERE `version` LIKE '2.%'

-- Exercice 2
-- Ne donne pas de résultats, une colonne ne peut avoir qu'une seule 
SELECT * FROM `frameworks` WHERE `id` = 1 AND `id` = 3;
-- Donne des résultats
SELECT * FROM `frameworks` WHERE `id` = 1 OR `id` = 3;

-- Exercice 3
SELECT * FROM `ide` WHERE date BETWEEN '2010-01-01' AND '2011-12-31';

-- Partie 7

-- Exercice 1
DELETE FROM `languages` WHERE `language` = 'HTML';

-- Exercice 2
UPDATE `frameworks` SET `framework` = 'Symfony2' WHERE `framework`= 'Symfony';

-- Exercice 3
UPDATE `languages` SET `version` = 6 WHERE `language`= 'JavaScript' AND `version` = 5;

-- Partie 8
-- Exercice 1
SELECT `l`.`id`, `l`.`name`, `f`.`id`, `f`.`name` FROM `languages` AS `l` LEFT JOIN `frameworks` AS `f` ON `languagesId` = `l`.`id`;

--Exercice 2 
SELECT `l`.`id`, `l`.`name`, `f`.`id`, `f`.`name` FROM `languages` AS `l` INNER JOIN `frameworks` AS `f` ON `languagesId` = `l`.`id`;

-- Exercice 3
SELECT `l`.`name`, COUNT(`f`.`id`)
FROM `languages` AS `l`
LEFT JOIN `frameworks` AS `f` ON `languagesId` = `l`.`id`
GROUP BY `l`.`name`
