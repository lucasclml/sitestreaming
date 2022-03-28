-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 mars 2022 à 15:31
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `application`
--

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `nom_serie` varchar(50) NOT NULL,
  `episode` int(30) NOT NULL,
  `saison` int(30) NOT NULL,
  `etat_serie` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `annee_sortie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`nom_serie`, `episode`, `saison`, `etat_serie`, `image`, `annee_sortie`) VALUES
('Stranger_Things', 20, 3, 'standby', 'image/serie/strangerthings.jpg', '2016'),
('Prison_Break', 40, 6, 'termine', 'image/serie/prison_break.jpg', '2008'),
('DragonBallZ', 10, 3, 'termine', 'image/serie/dragonballz.jpg', ''),
('murder', 20, 5, 'termine', 'image/serie/murder.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `suivie`
--

CREATE TABLE `suivie` (
  `nom_serie` varchar(50) NOT NULL,
  `saison_encours` int(11) NOT NULL,
  `episode_encours` int(11) NOT NULL,
  `derniere_modification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `email` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `genre` varchar(5) NOT NULL,
  `date_naissance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`email`, `user`, `password`, `genre`, `date_naissance`) VALUES
('admin@admin.fr', 'admin', 'admin', 'M', '03/06/2000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
