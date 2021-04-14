-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 14 avr. 2021 à 07:07
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `linked_account`
--

DROP TABLE IF EXISTS `linked_account`;
CREATE TABLE IF NOT EXISTS `linked_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `linked_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_linked_account` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `running_tasks`
--

DROP TABLE IF EXISTS `running_tasks`;
CREATE TABLE IF NOT EXISTS `running_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `creation_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'En cours',
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(3, 'cccc', '$2y$10$oVGkI7VKIABuUdKbetyvCeX2CApCl6/emhXlkZGeKHG7CIl4qgwpa', 'cccc@cccc.com'),
(4, 'aaaa', '$2y$10$051vLmTsSGJPds6t8HemZ.NM5cYMWJUrFkbNeL1tCyeJzqD1/.iJ6', 'aaaa@aaaa.com'),
(5, 'bbbb', '$2y$10$KPj1YnRqYAU08Noz3ZiUp.QwAw9BVUaGP/SR0fSK0fINem/YJO9qe', 'bbbb@bbbb.com'),
(6, 'dddd', '$2y$10$xPvZmr9ayxv8oKVTkcE0D.V49gJAZUMyvwKPqg8aYMZ5xApeQv606', 'dddd@dddd.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
