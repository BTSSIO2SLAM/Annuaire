-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2017 at 11:58 
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annuaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `Image`
--

CREATE TABLE `Image` (
  `code_image` int(11) NOT NULL,
  `nom_image` varchar(100) NOT NULL,
  `code_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Image`
--

INSERT INTO `Image` (`code_image`, `nom_image`, `code_user`) VALUES
(2, 'ldap_ldap.jpg', 'ldap');

-- --------------------------------------------------------

--
-- Table structure for table `Palier1`
--

CREATE TABLE `Palier1` (
  `idPalier1` int(11) NOT NULL,
  `nomPalier1` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Palier1`
--

INSERT INTO `Palier1` (`idPalier1`, `nomPalier1`) VALUES
(1, 'Pole Administration / Ressources / Règlementation'),
(2, 'Pole Education / Prevention / Insertion / Solidarité'),
(3, 'Pole Technique'),
(5, 'Direction générale des services'),
(6, 'Cabinet');

-- --------------------------------------------------------

--
-- Table structure for table `Palier2`
--

CREATE TABLE `Palier2` (
  `idPalier2` int(11) NOT NULL,
  `nomPalier2` varchar(100) DEFAULT NULL,
  `idPalier1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Palier2`
--

INSERT INTO `Palier2` (`idPalier2`, `nomPalier2`, `idPalier1`) VALUES
(1, 'Direction Administration Général / Système d''Information', 1),
(2, 'Direction des Affaires Juridiques / Règlementation / Commande Publique', 1),
(3, 'Direction des Ressources Humaines', 1),
(4, 'Direction Finances / Controle de Gestion', 1),
(5, 'Direction Vie Scolaire / Restauration', 2),
(6, 'Direction Sport / Jeunesse / Vie Associative', 2),
(7, 'Direction Cohésion Sociale', 2),
(8, 'Direction de la Solidarité / Santé', 2),
(9, 'Direction Aménagement du Territoire / Développement Economique', 3),
(10, 'Direction Architecture / Urbanisme Superstructures', 3),
(11, 'Direction Voirie / Energie / Logistique', 3),
(12, 'Direction Environnement / Sécurité / Eau Agricole', 3),
(20, 'Direction Culture / Animation', 5),
(21, 'Cabinet', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Palier3`
--

CREATE TABLE `Palier3` (
  `idPalier3` int(11) NOT NULL,
  `nomPalier3` varchar(64) DEFAULT NULL,
  `Position` int(11) NOT NULL,
  `idPalier2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Palier3`
--

INSERT INTO `Palier3` (`idPalier3`, `nomPalier3`, `Position`, `idPalier2`) VALUES
(1, 'Service Etat civil / Passeport / Cartes d''identité', 2, 1),
(2, 'Service Bureau électoral', 3, 1),
(3, 'Service Cimetières / Chapelle ardentes', 7, 1),
(4, 'Service Systèmes d''information', 8, 1),
(5, 'Service Commande Publique', 2, 2),
(6, 'Contentieux', 3, 2),
(7, 'Règlementation / Procédures / Contrôle juridique interne', 4, 2),
(8, 'Assurance', 5, 2),
(9, 'Service Recrutement', 2, 3),
(10, 'Service Paie-Carrières', 3, 3),
(11, 'Service Paie des Contrats Aidés', 4, 3),
(12, 'Service Formation / Gestion de temps / Inaptitude physique', 5, 3),
(13, 'Service Budget / Recettes / Fiscalité', 2, 4),
(14, 'Service Comptabilité', 3, 4),
(15, 'Service Régies', 4, 4),
(16, 'Contrôle de gestion / Achats', 5, 4),
(17, 'Service des Ecoles', 2, 5),
(18, 'Service Restauration', 3, 5),
(19, 'Caisse des Ecoles', 4, 5),
(20, 'Service Equipements et Sites Sportifs', 2, 6),
(21, 'Service Manifestations / Evènements', 3, 6),
(22, 'Service Education / Animation / Centres de loisirs', 4, 6),
(23, 'Service Vie Associative', 5, 6),
(24, 'Service Politique de la Ville', 2, 7),
(25, 'Economie Sociale et Solidaire / Insertion / Jardins collectifs', 3, 7),
(26, 'CLSPD', 4, 7),
(27, 'Point d''accès au droit', 5, 7),
(28, 'Personnes Agées / Personnes Handicapées / Santé Publique', 2, 8),
(29, 'CCAS Accueil / Aides Sociales', 3, 8),
(30, 'Logement Social et Cadre de Vie', 4, 8),
(31, 'Aides à domicile', 5, 8),
(32, 'Soutien à la parentalité (LAEP et RAM)', 6, 8),
(33, 'Service Foncier / Patrimoine Communal', 2, 9),
(34, 'Aménagement du territoire', 3, 9),
(35, 'Développement Economique / Dynamisaton du territoire', 4, 9),
(36, 'Régie Touristique / OTT', 5, 9),
(37, 'Service Urbanisme', 2, 10),
(38, 'Service Maintenance des bâtiments communaux', 3, 10),
(39, 'Architecture', 4, 10),
(40, 'Service Logistique', 2, 11),
(41, 'Service Dessin', 3, 11),
(42, 'Voirie / Permission de voirie', 4, 11),
(43, 'Service Environnement', 2, 12),
(44, 'Service Sécurité / Prévention des risques', 4, 12),
(45, 'Endiguement des ravines', 5, 12),
(46, 'Aires de jeux / Commissions de sécurité hors bâtiments communaux', 8, 12),
(47, 'Régie d''irrigation / Retenues cullinaires', 9, 12),
(48, 'Direction des ressources humaines', 1, 3),
(49, 'Direction des affaires scolaires', 1, 5),
(50, 'Direction Administration générale / Système d''information', 1, 1),
(51, 'Direction des affaires juridiques', 1, 2),
(52, 'Direction Finances / Contrôle de gestion', 1, 4),
(53, 'Direction Sport / Jeunesse / Vie associative', 1, 6),
(54, 'Direction Cohésion Sociale', 1, 7),
(55, 'Direction de la Solidarité / Santé', 1, 8),
(56, 'Direction Aménagement du territoire / Développement économique', 1, 9),
(57, 'Direction Architecture / Urbanisme / Superstructure', 1, 10),
(58, 'Direction Voirie / Energie / Logistique', 1, 11),
(59, 'Direction Environnement / Sécurité / Eau agricole', 1, 12),
(60, 'Cabinet', 1, 21),
(61, 'Protocole', 2, 21),
(62, 'Communication', 3, 21),
(63, 'Pole élus', 4, 21),
(64, 'Conseil des quartiers', 5, 21),
(65, 'Intercommunalité', 6, 21),
(71, 'Direction Culture / Animation', 1, 20),
(72, 'Lecture Publique', 2, 20),
(73, 'Développement Culturel', 3, 20),
(74, 'Animation / Evènements', 4, 20),
(75, 'Signalisation routière / Numérotation postale', 5, 11),
(76, 'Ouvrages hydrauliques', 6, 12),
(77, 'Assainissement pluvial', 7, 12),
(78, 'Service Courrier', 4, 1),
(79, 'Service Reprographie', 5, 1),
(80, 'Service Agences postales', 6, 1),
(81, 'Parc des Palmiers / Pépinières', 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `idService` int(11) NOT NULL,
  `NomService` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`idService`, `NomService`) VALUES
(1, 'Service Etat civil / Passeport / Cartes d''identité'),
(2, 'Service Bureau électoral'),
(3, 'Service Cimetières / Chapelle ardentes'),
(4, 'Service Systèmes d''information'),
(5, 'Service Commande Publique'),
(6, 'Contentieux'),
(7, 'Règlementation / Procédures / Contrôle juridique interne'),
(8, 'Assurance'),
(9, 'Service Recrutement'),
(10, 'Service Paie-Carrières'),
(11, 'Service Paie des Contrats Aidés'),
(12, 'Service Formation / Gestion de temps / Inaptitude physique'),
(13, 'Service Budget / Recettes / Fiscalité'),
(14, 'Service Comptabilité'),
(15, 'Service Régies'),
(16, 'Contrôle de gestion / Achats'),
(17, 'Service des Ecoles'),
(19, 'Caisse des Ecoles'),
(20, 'Service Equipements et Sites Sportifs'),
(21, 'Service Manifestations / Evènements'),
(22, 'Service Education / Animation / Centres de loisirs'),
(23, 'Service Vie Associative'),
(24, 'Service Politique de la Ville'),
(25, 'Economie Sociale et Solidaire / Insertion / Jardins collectifs'),
(26, 'CLSPD'),
(27, 'Point d''accès au droit'),
(28, 'Personnes Agées / Personnes Handicapées / Santé Publique'),
(29, 'CCAS Accueil / Aides Sociales'),
(30, 'Logement Social et Cadre de Vie'),
(31, 'Aides à domicile'),
(32, 'Soutien à la parentalité (LAEP et RAM)'),
(33, 'Service Foncier / Patrimoine Communal'),
(34, 'Aménagement du territoire'),
(35, 'Développement Economique / Dynamisaton du territoire'),
(36, 'Régie Touristique / OTT'),
(37, 'Service Urbanisme'),
(38, 'Service Maintenance des bâtiments communaux'),
(39, 'Architecture'),
(40, 'Service Logistique'),
(41, 'Service Dessin'),
(42, 'Voirie / Permission de voirie'),
(43, 'Service Environnement'),
(44, 'Service Sécurité / Prévention des risques'),
(45, 'Endiguement des ravines'),
(46, 'Aires de jeux / Commissions de sécurité hors bâtiments communaux'),
(47, 'Régie d''irrigation / Retenues cullinaires'),
(48, ''),
(50, 'Direction des ressources humaines'),
(51, 'Direction des affaires scolaires'),
(52, 'Direction Administration Générale / Système d''information'),
(53, 'Direction des Affaires juridiques'),
(54, 'Direction Finances / Contrôle de gestion'),
(55, 'Direction Sport / Jeunesse / Vie associative'),
(56, 'Direction Cohésion Sociale'),
(57, 'Direction de la Solidarité / Santé'),
(58, 'Direction Aménagement du territoire / Développement économique'),
(59, 'Direction Architecture / Urbanisme / Superstructure'),
(60, 'Direction Voirie / Energie / Logistique'),
(61, 'Direction Environnement / Sécurité / Eau agricole'),
(62, 'Signalisation routière, Numérotation postale'),
(63, 'Direction Culture / Animation'),
(64, 'Lecture Publique'),
(65, 'Développement Culturel'),
(66, 'Animation / Evènements'),
(67, 'Police municipale'),
(68, 'Cabinet'),
(69, 'Protocole'),
(70, 'Communication'),
(71, 'Pole élus'),
(72, 'Conseil des quartiers'),
(73, 'Intercommunalité'),
(74, 'Direction générale des services'),
(75, 'Ouvrages hydrauliques'),
(76, 'Assainissement pluvial'),
(77, 'Service Courrier'),
(78, 'Service Reprographie'),
(79, 'Service Agences postales'),
(80, 'Parc des palmiers / Pépinières'),
(81, 'Service Restauration'),
(82, 'Secrétariat du Maire'),
(83, 'Secrétariat DGS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`code_image`);

--
-- Indexes for table `Palier1`
--
ALTER TABLE `Palier1`
  ADD PRIMARY KEY (`idPalier1`);

--
-- Indexes for table `Palier2`
--
ALTER TABLE `Palier2`
  ADD PRIMARY KEY (`idPalier2`),
  ADD KEY `FK_Palier2_idPalier1` (`idPalier1`);

--
-- Indexes for table `Palier3`
--
ALTER TABLE `Palier3`
  ADD PRIMARY KEY (`idPalier3`),
  ADD KEY `FK_Palier3_idPalier2` (`idPalier2`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Image`
--
ALTER TABLE `Image`
  MODIFY `code_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Palier1`
--
ALTER TABLE `Palier1`
  MODIFY `idPalier1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Palier2`
--
ALTER TABLE `Palier2`
  MODIFY `idPalier2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Palier3`
--
ALTER TABLE `Palier3`
  MODIFY `idPalier3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
