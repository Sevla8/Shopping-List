-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 23 mars 2019 à 12:14
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `article` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAchat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bill`
--

INSERT INTO `bill` (`id`, `id_member`, `price`, `article`, `dateAchat`) VALUES
(7, 'Sevla', 7, '', '2019-02-20 14:12:31'),
(8, 'Raizen', 96, '', '2019-02-20 14:13:13'),
(9, 'Raizen', 8, '', '2019-02-20 14:14:00'),
(10, '3', 55, '', '2019-03-20 22:44:55'),
(11, '3', 55, '', '2019-03-20 22:45:12'),
(12, '3', 5, '', '2019-03-20 22:45:22'),
(13, '3', 77, '', '2019-03-20 22:46:59'),
(14, '5', 4, '', '2019-03-20 23:01:35'),
(15, '4', 52, '', '2019-03-20 23:11:02'),
(16, '4', 55, '', '2019-03-23 10:30:49'),
(17, '4', 12, 'Array', '2019-03-23 10:45:53'),
(18, '4', 12, 'Array', '2019-03-23 10:46:16'),
(19, '4', 55, 'poire', '2019-03-23 10:46:51'),
(20, '5', 999, 'banane', '2019-03-23 10:47:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
