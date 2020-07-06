-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 25 fév. 2020 à 14:59
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camping`
--
CREATE DATABASE IF NOT EXISTS `camping` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `camping`;

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

DROP TABLE IF EXISTS `lieux`;
CREATE TABLE IF NOT EXISTS `lieux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`id`, `lieu`) VALUES
(1, 'Les Pins'),
(2, 'Le Maquis'),
(3, 'La Plage');

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE IF NOT EXISTS `prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id`, `nom`, `prix`) VALUES
(1, 'lieu', 10),
(2, 'borne', 2),
(3, 'club', 17),
(4, 'activites', 30);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `lieu` varchar(140) NOT NULL,
  `emplacement` int(11) NOT NULL,
  `options` varchar(220) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `checkin`, `checkout`, `lieu`, `emplacement`, `options`, `prix`, `id_utilisateur`) VALUES
(7, '2020-05-01', '2020-05-08', 'pins', 1, 'borne,disco,pack,', 413, 1),
(8, '2020-04-02', '2020-04-05', 'pins', 1, 'borne,', 36, 1),
(9, '2020-02-29', '2020-03-01', 'pins', 1, 'borne,', 12, 3),
(10, '2020-02-29', '2020-03-01', 'pins', 1, 'borne,', 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `mdp`, `mail`, `permissions`) VALUES
(1, 'test', 'test', 'test', '$2y$12$a/oAblWoJuuJOi7IBOHcZuzR.eewuaj.24TmtEZv6EMcjF4OqHW0W', 'test@test.com', 'membre'),
(2, 'admin', 'admin', 'admin', '$2y$12$I59AELWbePBuFYsvS6MEFOB3PVWOkDXl.ZWDrFAHYI.zIqelp46em', 'admin@gmail.com', 'admin'),
(3, 'sarah', 'sarah', 'sarah', '$2y$12$NbR7zNT9Yrg8t3Rkz0kMXeUkqZS0czqSppz8I/Njyj/bxNq2OMMn2', 'sarah@gmail.com', 'membre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
