-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 déc. 2023 à 15:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `corrections_pdo_la-manu-post`
--
CREATE DATABASE IF NOT EXISTS `corrections_pdo_la-manu-post` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `corrections_pdo_la-manu-post`;

-- --------------------------------------------------------

--
-- Structure de la table `pab7o_articles`
--

DROP TABLE IF EXISTS `pab7o_articles`;
CREATE TABLE IF NOT EXISTS `pab7o_articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_users` int NOT NULL,
  `id_postsCategories` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_postsCategories_FK` (`id_postsCategories`),
  KEY `posts_users_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pab7o_articlescategories`
--

DROP TABLE IF EXISTS `pab7o_articlescategories`;
CREATE TABLE IF NOT EXISTS `pab7o_articlescategories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pab7o_articlescategories`
--

INSERT INTO `pab7o_articlescategories` (`id`, `name`) VALUES
(1, 'Lifestyle'),
(2, 'Animaux'),
(3, 'Technologie'),
(4, 'Education'),
(5, 'Cuisine'),
(6, 'Actus'),
(7, 'Divertissement'),
(8, 'Automobile'),
(9, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `pab7o_comments`
--

DROP TABLE IF EXISTS `pab7o_comments`;
CREATE TABLE IF NOT EXISTS `pab7o_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_posts` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_FK` (`id_users`),
  KEY `comments_posts_FK` (`id_posts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pab7o_users`
--

DROP TABLE IF EXISTS `pab7o_users`;
CREATE TABLE IF NOT EXISTS `pab7o_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `registerDate` date NOT NULL,
  `id_usersRoles` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_usersRoles_FK` (`id_usersRoles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pab7o_usersroles`
--

DROP TABLE IF EXISTS `pab7o_usersroles`;
CREATE TABLE IF NOT EXISTS `pab7o_usersroles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pab7o_usersroles`
--

INSERT INTO `pab7o_usersroles` (`id`, `name`) VALUES
(1, 'Utilisateur'),
(128, 'Modérateur'),
(258, 'Administrateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pab7o_articles`
--
ALTER TABLE `pab7o_articles`
  ADD CONSTRAINT `posts_postsCategories_FK` FOREIGN KEY (`id_postsCategories`) REFERENCES `pab7o_articlescategories` (`id`),
  ADD CONSTRAINT `posts_users_FK` FOREIGN KEY (`id_users`) REFERENCES `pab7o_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `pab7o_comments`
--
ALTER TABLE `pab7o_comments`
  ADD CONSTRAINT `comments_posts_FK` FOREIGN KEY (`id_posts`) REFERENCES `pab7o_articles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `pab7o_users` (`id`);

--
-- Contraintes pour la table `pab7o_users`
--
ALTER TABLE `pab7o_users`
  ADD CONSTRAINT `users_usersRoles_FK` FOREIGN KEY (`id_usersRoles`) REFERENCES `pab7o_usersroles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
