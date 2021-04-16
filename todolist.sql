-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 avr. 2021 à 13:03
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `running_tasks`
--

INSERT INTO `running_tasks` (`id`, `user_id`, `task`, `creation_date`, `status`, `end_date`) VALUES
(1, 1, 'test', '2021-04-14', 'Terminé', '2021-04-16'),
(2, 4, 'test', '2021-04-14', 'Terminé', '2021-04-16'),
(3, 4, 'test', '2021-04-14', 'Terminé', '2021-04-16'),
(9, 4, 'test', '2021-04-15', 'Terminé', '2021-04-16'),
(5, 4, 'test', '2021-04-14', 'Terminé', '2021-04-16'),
(10, 4, 'test4', '2021-04-16', 'Terminé', '2021-04-16'),
(11, 4, 'test7', '2021-04-16', 'Terminé', '2021-04-16'),
(12, 4, 'test10', '2021-04-16', 'Terminé', '2021-04-16'),
(17, 4, 'test8', '2021-04-16', 'En cours', NULL),
(16, 4, 'test8', '2021-04-16', 'En cours', NULL),
(18, 4, 'test 15', '2021-04-16', 'En cours', NULL),
(19, 4, 'test 15', '2021-04-16', 'En cours', NULL),
(20, 4, 'test3', '2021-04-16', 'En cours', NULL),
(21, 4, 'test25', '2021-04-16', 'En cours', NULL),
(22, 4, 'test', '2021-04-16', 'En cours', NULL),
(23, 4, 'test', '2021-04-16', 'En cours', NULL),
(24, 4, 'test', '2021-04-16', 'En cours', NULL),
(25, 10, 'test4', '2021-04-16', 'Terminé', '2021-04-16');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(3, 'cccc', '$2y$10$oVGkI7VKIABuUdKbetyvCeX2CApCl6/emhXlkZGeKHG7CIl4qgwpa', 'cccc@cccc.com'),
(4, 'aaaa', '$2y$10$051vLmTsSGJPds6t8HemZ.NM5cYMWJUrFkbNeL1tCyeJzqD1/.iJ6', 'aaaa@aaaa.com'),
(5, 'bbbb', '$2y$10$KPj1YnRqYAU08Noz3ZiUp.QwAw9BVUaGP/SR0fSK0fINem/YJO9qe', 'bbbb@bbbb.com'),
(6, 'dddd', '$2y$10$xPvZmr9ayxv8oKVTkcE0D.V49gJAZUMyvwKPqg8aYMZ5xApeQv606', 'dddd@dddd.com'),
(10, 'wwww', '$2y$10$85pgSwBnS4DUETETQ45rtekAKLDk7zb09KfUELF7uyi1hg4eecJzK', 'wwww@wwww;com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
