-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 18 nov. 2023 à 10:55
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

DROP TABLE IF EXISTS `réservation`;
CREATE TABLE IF NOT EXISTS `réservation` (
  `id_Utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_Trajet` int(11) NOT NULL,
  `Date_réservation` datetime NOT NULL,
  PRIMARY KEY (`id_Utilisateur`,`id_Trajet`),
  KEY `réservation_ibfk_1` (`id_Trajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `réservation`
--

INSERT INTO `réservation` (`id_Utilisateur`, `id_Trajet`, `Date_réservation`) VALUES
('20230611_0002', 57, '2023-06-11 13:08:36'),
('20230923_0001', 58, '2023-09-23 23:02:46');

--
-- Déclencheurs `réservation`
--
DROP TRIGGER IF EXISTS `trigger_place_01`;
DELIMITER $$
CREATE TRIGGER `trigger_place_01` AFTER INSERT ON `réservation` FOR EACH ROW BEGIN
UPDATE trajet
set trajet.nbr_place_dispo=trajet.nbr_place_dispo-1
WHERE trajet.id_Trajet=new.id_Trajet;
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_reservation`;
DELIMITER $$
CREATE TRIGGER `trigger_reservation` AFTER DELETE ON `réservation` FOR EACH ROW BEGIN
update trajet
set trajet.nbr_place_dispo=trajet.nbr_place_dispo+1
WHERE trajet.id_Trajet=old.id_Trajet;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id_Trajet` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_place` int(11) NOT NULL,
  `nbr_place_dispo` int(11) DEFAULT NULL,
  `Date_Depart` date NOT NULL,
  `Heure_depart` time NOT NULL,
  `Heure_arrive` time NOT NULL,
  `Ville_Depart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville_Arrive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cigarette` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prise_electrique` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Climatisation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prix` float NOT NULL,
  `itineraire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_Trajet`),
  KEY `key1` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_Trajet`, `id_utilisateur`, `nbr_place`, `nbr_place_dispo`, `Date_Depart`, `Heure_depart`, `Heure_arrive`, `Ville_Depart`, `Ville_Arrive`, `Cigarette`, `Prise_electrique`, `Climatisation`, `Prix`, `itineraire`) VALUES
(55, '20230608_0001', 2, 2, '2023-06-18', '18:00:00', '00:02:00', 'Annaba, Algeria', 'Alger, Algeria', 'on', ' off', 'on', 5350, 'Itinéraire 1: 545 km, 6 hours 2 mins, A1'),
(56, '20230608_0001', 2, 2, '2023-06-18', '18:00:00', '00:02:00', 'Annaba, Algeria', 'Alger, Algeria', 'on', ' off', 'on', 5350, 'Itinéraire 1: 545 km, 6 hours 2 mins, A1'),
(58, '20230611_0001', 3, 2, '2023-06-15', '16:00:00', '16:41:00', 'Béjaïa, Algeria', 'Toudja, Algeria', 'on', ' off', 'on', 125.2, 'Itinéraire 1: 25.2 km, 41 mins, N12 and W43'),
(59, '20230907_0001', 4, 4, '2023-09-08', '18:00:00', '18:00:00', 'toudja', 'bejaia', 'off', ' on', 'off', 10, 'choisissez un itinéraire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_Utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Civilite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `Telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` longblob,
  `Bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Note` float NOT NULL DEFAULT '0',
  `nbr_Pnote` int(11) DEFAULT '0',
  `Temp_Code` datetime DEFAULT NULL,
  `Code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_Utilisateur`, `nom`, `prenom`, `Email`, `mot_de_passe`, `Civilite`, `date_naissance`, `Telephone`, `adresse`, `photo`, `Bio`, `Note`, `nbr_Pnote`, `Temp_Code`, `Code`) VALUES
('20230610_0001', 'REBOUH', ' akram', 'massinsadi2022@gmail.com', 'b4e5b8c32efd83d0ba121d416dc8783ec993b6c699277d4zdbafz5b480gb4009', 'Homme', '2002-05-07', '0675712539', 'Akfadou', NULL, NULL, 4.5, 2, NULL, NULL),
('20230611_0001', 'SADI', 'Azedinne', 'sadiazedinne@gmail.com', 'c9e6b7c32efd83d0ba121d416dc8783ec993b6c699277dz2dbcf75a7307b4d78', 'Homme', '1956-10-17', '0556501096', 'Toudja', NULL, 'jrghrgd', 5, 1, NULL, NULL),
('20230611_0002', 'Kenzi', 'mebarki', 'massinsadi2020@gmail.com', 'c9e5b8c32efd83d0ba121d416dc8783ec993b6c699277d42dbcf75a4807b4dd8', 'Homme', '2002-10-02', '0553141979', 'Toudja', NULL, 'okey cest la fin', 1, 1, NULL, NULL),
('20230923_0001', 'LARBI', 'Bouythbiren', 'idirlarbi@gmail.com', 'c96d9dec11fp50fdcya44w4cdddf0do621d2y0839nae05be37be4109840f005f', 'Homme', '2001-04-02', '0675712512', 'Toudja', NULL, 'Smail', 2.25, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `immatriculation` int(11) NOT NULL,
  `id_Utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Anne` int(11) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`immatriculation`, `id_Utilisateur`, `marque`, `modele`, `color`, `Anne`) VALUES
(1010101010, '20230608_0001', 'volkswagen', 'golf', 'Noir', 2023),
(158210611, '20230611_0001', 'hyundai', 'accent', 'Gris', 2011),
(1010101113, '20230611_0002', 'seat', 'ibiza', 'Blanc', 2016);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
