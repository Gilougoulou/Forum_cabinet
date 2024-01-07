DROP DATABASE IF EXISTS `forum_video`;

CREATE DATABASE IF NOT EXISTS `forum_video`;

USE `forum_video`;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `questions`;
DROP TABLE IF EXISTS `answers`;

CREATE TABLE IF NOT EXISTS `users`
(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `prenom` VARCHAR(255) NOT NULL,
    `nom` VARCHAR(255) NOT NULL,
    `pseudo` VARCHAR(255) NOT NULL UNIQUE,
    `mdp` VARCHAR(255) NOT NULL,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS `questions`
(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `titre` TEXT NOT NULL,
    `description` TEXT NOT NULL,
    `contenu` TEXT NOT NULL,
    `id_auteur` INT(11) NOT NULL,
    `pseudo_auteur` VARCHAR(255) NOT NULL,
    `date_publication` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `answers`
(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `id_auteur` INT(11) NOT NULL,
    `pseudo_auteur` VARCHAR(255) NOT NULL,
    `id_question` INT(11) NOT NULL,
    `contenu` TEXT NOT NULL,
    `date_publication` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `code_pin`
(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT(11) NOT NULL,
    `code_pin` INT(6) NOT NULL,
    `date_creation_code` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- commande utile
/*
    SELECT * FROM `users`;
    SELECT * FROM `questions`;

    DESCRIBE `users`;
    DESCRIBE `questions`;

    ALTER TABLE questions
    MODIFY 
*/