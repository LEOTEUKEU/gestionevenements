-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 juin 2024 à 10:11
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `admini`
--


CREATE TABLE `admini` (
  `id_ad` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ad`)
) 

--
-- Déchargement des données de la table `admini`
--

INSERT INTO `admini` (`id_ad`, `pseudo`, `code`) VALUES
(1, 'fst', '123');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_ev` int NOT NULL AUTO_INCREMENT,
  `id_org` int NOT NULL,
  `intitulé` varchar(255) NOT NULL,
  `thème` varchar(255) NOT NULL,
  `date_db` datetime(6) NOT NULL,
  `date_fn` datetime(6) NOT NULL,
  `salle` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `id_salle` int NOT NULL,
  PRIMARY KEY (`id_ev`),
  KEY `organisateur` (`id_org`)
) 

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id_ev`, `id_org`, `intitulé`, `thème`, `date_db`, `date_fn`, `salle`, `commentaire`, `id_salle`) VALUES
(9, 1, 'fete', 'fete de la jeunesse ', '2024-06-02 22:24:00.000000', '2024-05-19 22:24:00.000000', 'Salle de conférence', 'ert', 0),
(10, 1, 'fete', 'fete de la jeunesse ', '2024-05-18 22:36:00.000000', '2024-05-26 22:36:00.000000', 'Salle1', 'ert', 0),
(11, 1, 'fete', 'fete de la jeunesse ', '2024-05-18 23:19:00.000000', '2024-05-19 23:19:00.000000', '', 'qwerty', 9),
(12, 1, 'fete', 'fete de la jeunesse ', '2024-05-18 02:40:00.000000', '2024-05-25 03:40:00.000000', '', 'good', 5);

-- --------------------------------------------------------

--
-- Structure de la table `organisatuer`
--


CREATE TABLE `organisateur` (
  `id_org` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(200) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `profession` varchar(45) NOT NULL,
  `num_tel` int NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prénom` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`id_org`)
) 

--
-- Déchargement des données de la table `organisatuer`
--

INSERT INTO `organisatuer` (`id_org`, `pseudo`, `mail`, `profession`, `num_tel`, `nom`, `prénom`, `mdp`) VALUES
(1, 'omd34', 'omd34@gmail.com', 'banquier', 12345678, 'Senateur', 'Mengueme', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--


CREATE TABLE  `reservation` (
  `id_ev` int NOT NULL,
  `id_salle` int NOT NULL,
  KEY `id_ev` (`id_ev`),
  KEY `id_salle` (`id_salle`)
) 

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--


CREATE TABLE `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(25) NOT NULL,
  `nbr_salle` int NOT NULL,
  PRIMARY KEY (`id_salle`)
) 

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `nbr_salle`) VALUES
(5, 'Salle4', 0),
(8, 'salle de fete', 0),
(9, 'salle de ceremonie cultur', 0),
(10, '', 0),
(11, 'salle5', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `organisateur` FOREIGN KEY (`id_org`) REFERENCES `organisatuer` (`id_org`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `events` FOREIGN KEY (`id_ev`) REFERENCES `events` (`id_ev`),
  ADD CONSTRAINT `salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
