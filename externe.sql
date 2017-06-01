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
-- Database: `externe`
--

-- --------------------------------------------------------

--
-- Table structure for table `Batiment_Administratif`
--

CREATE TABLE `Batiment_Administratif` (
  `ID_bat` int(11) NOT NULL,
  `Nom_bat` varchar(100) DEFAULT NULL,
  `Adresse_bat` varchar(100) DEFAULT NULL,
  `Tel_bat` varchar(10) DEFAULT NULL,
  `Fax_bat` varchar(10) DEFAULT NULL,
  `Longitude_bat` double DEFAULT NULL,
  `Latitude_bat` double DEFAULT NULL,
  `ID_cat_bat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Batiment_Administratif`
--

INSERT INTO `Batiment_Administratif` (`ID_bat`, `Nom_bat`, `Adresse_bat`, `Tel_bat`, `Fax_bat`, `Longitude_bat`, `Latitude_bat`, `ID_cat_bat`) VALUES
(1, 'Mairie annexe Plaine des Cafres', '10 rue Raphaël Douyère 23ème Km', '0262591919', '0262591870', 55.55287170410156, -21.21856117248535, 1),
(2, 'Mairie annexe Bérive', '3 rue de l''école 97430 Le Tampon', '0262389107', '0262388423', 55.53728485107422, -21.31106185913086, 1),
(3, 'Mairie annexe Bras-Creux', '166 chemin Chalet', '0262570461', '0262599369', 55.53461456298828, -21.256973266601562, 1),
(4, 'Mairie annexe Trois-Mares', '19, Rue Charles Beaudelaire', '0262273673', '0262598518', 55.50392150878906, -21.2611141204834, 1),
(5, 'Mairie Annexe du 17ème KM', 'Route des Caféiers', '0262272837', '', 55.54673767089844, -21.255046844482422, 1),
(6, 'Mairie Annexe de Pont d''Yves', '20, chemin des longoses', '0262598153', '', 55.506575, -21.235537, 1),
(7, 'Service Restauration Scolaire', '83, Rue Auguste Lacaussade', '0262579820', '0262395015', 55.52962112426758, -21.2738037109375, 5),
(8, 'Service Aménagement du Territoire, du Développement Durable et du Foncier', '14, Rue du Général Bigeard', '0262578663', '0262571054', 55.51633, -21.276718, 5),
(9, 'Service Urbanisme', '2 rue Jules Ferry', '0262578441', '0262248572', 55.516566, -21.276958, 5),
(10, 'Service Superstructure / Cadastre', '138, Rue du Général de Gaulle', '0262578657', '', 55.514356, -21.269835, 5),
(11, 'Service Bâtiment du 14ème KM', '', '', '', 55.528006, -21.254414, 5),
(13, 'Parc Municipal engins', '', '', '', 55.52722, -21.286735, 11),
(14, 'Parc des Palmiers', 'chemin de Dassy', '', '', 55.494432, -21.254502, 11),
(15, 'Poste de Police Municipale', '224, Rue Hubert Delisle 97430 Le Tampon', '0262270210', '0262571344', 55.516303, -21.279787, 9),
(16, 'Poste de Police Municipale du 23ème KM', 'Rue Raphaël Douyère', '0262275028', '0262275028', 55.552465, -21.218166, 9),
(17, 'Gare routière', 'Rue Albert Fréjaville (près du marché couvert)', '0262570304', '', 55.51347732543945, -21.279796600341797, 15),
(18, 'Marché couvert', 'Rue Albert Fréjaville', '0262272552', '', 55.51304244995117, -21.280092239379883, 15),
(19, 'Mairie du Tampon', '256 rue Hubert Delisle BP 449, 97430 Le Tampon', '0262578686', '0262578426', 55.51533126831055, -21.278228759765625, 1),
(20, 'Centre Municipale du 14ème KM', '1 rue Jean-Baptiste Lulli', '0262717212', '0262717211', 55.52204895019531, -21.253612518310547, 15),
(21, 'Réseaux Divers, Voiries, Environnement', '10 rue Du Général Bigeard', '0262578699', '0262572866', 55.516942, -21.277238, 15),
(22, 'Communauté d''Agglomérations du SUD', '379 rue Hubert Delisle 97430 Le Tampon', '', '', 55.510394, -21.26886, 15),
(23, 'La Gendarmerie Nationale', '167 rue Hubert Delisle 97430 Le Tampon', '0262270008', '', 55.517805, -21.281637, 9),
(24, 'Magasin central', '23 chemin Luspot', '0262279949', '0262591514', 55.526796, -21.255204, 15),
(25, 'Atelier communal PDC', '', '', '', 55.552754, -21.217926, 15),
(26, 'Atelier communal Bois Fer dépôt AEP', '17 rue Montaigne', '0262270722', '0262423898', 55.494103, -21.263493, 15),
(27, 'Direction Vie Associative et Citoyenneté-Maison des Associations', '8 rue Paul Hermann', '0262579671', '0262496965', 55.512977, -21.273769, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Categorie_Batiment`
--

CREATE TABLE `Categorie_Batiment` (
  `ID_cat_bat` int(11) NOT NULL,
  `Nom_cat_bat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categorie_Batiment`
--

INSERT INTO `Categorie_Batiment` (`ID_cat_bat`, `Nom_cat_bat`) VALUES
(1, 'Mairie / Mairie Annexe'),
(5, 'Service / Direction'),
(9, 'Poste de Police / Gendarmerie'),
(11, 'Parc'),
(15, 'Autres');

-- --------------------------------------------------------

--
-- Table structure for table `Categorie_Ecole`
--

CREATE TABLE `Categorie_Ecole` (
  `ID_cat_ecole` int(11) NOT NULL,
  `Nom_cat_ecole` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categorie_Ecole`
--

INSERT INTO `Categorie_Ecole` (`ID_cat_ecole`, `Nom_cat_ecole`) VALUES
(1, 'Ecole Maternelle'),
(2, 'Ecole Primaire'),
(3, 'Ecole Elémentaire'),
(4, 'Ecole Catholique'),
(5, 'College'),
(6, 'Lycée'),
(7, 'Université'),
(8, 'Groupe Scolaire');

-- --------------------------------------------------------

--
-- Table structure for table `Categorie_Site`
--

CREATE TABLE `Categorie_Site` (
  `ID_cat_site` int(11) NOT NULL,
  `Nom_cat_site` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categorie_Site`
--

INSERT INTO `Categorie_Site` (`ID_cat_site`, `Nom_cat_site`) VALUES
(1, 'Médiathèque'),
(2, 'Site Sportif'),
(3, 'Théâtre'),
(4, 'Boulodrome'),
(5, 'Stade'),
(6, 'Bibliothèque'),
(7, 'Salle'),
(8, 'Autres');

-- --------------------------------------------------------

--
-- Table structure for table `Ecole`
--

CREATE TABLE `Ecole` (
  `ID_ecole` int(11) NOT NULL,
  `Nom_ecole` varchar(100) DEFAULT NULL,
  `Adresse_ecole` varchar(100) DEFAULT NULL,
  `Tel_ecole` varchar(10) DEFAULT NULL,
  `Fax_ecole` varchar(10) DEFAULT NULL,
  `Longitude_ecole` double DEFAULT NULL,
  `Latitude_ecole` double DEFAULT NULL,
  `ID_cat_ecole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ecole`
--

INSERT INTO `Ecole` (`ID_ecole`, `Nom_ecole`, `Adresse_ecole`, `Tel_ecole`, `Fax_ecole`, `Longitude_ecole`, `Latitude_ecole`, `ID_cat_ecole`) VALUES
(1, 'Ecole maternelle de Bras Creux', 'Impasse des Pétunias', '0262278226', '', 55.536087, -21.256757, 1),
(2, 'Ecole Maternelle du 14ème KM', '11 rue des Bambins', '0262271742', '', 55.521989, -21.251367, 1),
(3, 'Ecole Maternelle Georges Besson', '3 chemin Mazeau', '0262572780', '', 55.504357, -21.260261, 1),
(4, 'Ecole Maternelle du 12ème KM', '30 chemin Bigey', '0262272625', '', 55.525203, -21.26937, 1),
(5, 'Ecole Maternelle Jules Ferry', 'Rue Jules Ferry', '0262270313', '', 55.518336, -21.275138, 1),
(6, 'Ecole Maternelle SIDR 400', 'BP 262 - rue Jules Bertaut', '0262270364', '', 55.512414, -21.282986, 1),
(7, 'Ecole Maternelle de Terrain Fleury', '1 rue des Abeilles', '0262270386', '', 55.52155, -21.28758, 1),
(8, 'Ecole Primaire Aristide Briand', '8 rue Aristide Briand', '0262270396', '', 55.515059, -21.277503, 2),
(9, 'Ecole Primaire Vincent Séry', '105 chemin Stéphane', '0262576072', '', 55.503091, -21.260886, 2),
(10, 'Ecole Primaire Iris Hoarau', '19 rue Charles Beaudelaire', '0262271394', '', 55.502898, -21.260021, 2),
(11, 'Ecole primaire Just Sauveur', '16 rue d''Allemagne', '0262574494', '', 55.504802, -21.278852, 2),
(12, 'Ecole Primaire Alfred Isautier', '10 chemin de l''Ecole', '0262389080', '', 55.536361, -21.310676, 2),
(13, 'Ecole Primaire du Petit Tampon', '133 chemin Jean Baptiste Huet', '0262271047', '', 55.53738, -21.281672, 2),
(14, 'Ecole Primaire Jean Albany', '201, route du grand Tampon', '0262272463', '', 55.562968, -21.281077, 2),
(15, 'Ecole Primaire de Notre Dame de la Paix', '160 route N. Dame de la Paix', '0262275086', '', 55.593985, -21.245862, 2),
(16, 'Ecole Primaire de la Petite Ferme', '45 route N Dame de la Paix', '0262275278', '', 55.573155, -21.225747, 2),
(17, 'Ecole Primaire de Piton Ravine Blanche', '1 chemin Rosemont 24ème Km', '0262275289', '', 55.569089, -21.234867, 2),
(18, 'Ecole Primaire du Coin Tranquille', '2 impasse des Marmailles', '0262275424', '', 55.557421, -21.235642, 2),
(19, 'Ecole Primaire Ernest Vélia', 'RN3 au PK19', '', '', 55.541725, -21.238192, 2),
(20, 'Ecole Primaire Piton Hyacinthe', '59 chemin des Acacias 97418 Plaine des cafres', '0262275197', '', 55.530277, -21.222841, 2),
(21, 'Ecole Primaire Edgar Avril', '22 rue de l''école', '0262275141', '', 55.548967, -21.219821, 2),
(22, 'Ecole Primaire de Bois Court', '2 allée des Campeurs', '0262275484', '', 55.539064, -21.197266, 2),
(23, 'Ecole Primaire de Bourg Murat', '9 rue Josémont Lauret', '0262275076', '', 55.579684, -21.203288, 2),
(24, 'Ecole Primaire la Grande Ferme', '12 route de la Grande Ferme', '0262275263', '', 55.589747, -21.21562, 2),
(25, 'Ecole Primaire de Pont d''Yves', 'Chemin Henri Cabeu', '0262271361', '0262276352', 55.50543, -21.235032, 2),
(26, 'Ecole Primaire de Bras de Pontho', '1 rue Pierre Larousse', '0262272717', '', 55.492351, -21.242682, 2),
(27, 'Ecole Primaire du Dassy', '28 chemin du Dassy', '0262270109', '', 55.485957, -21.256734, 2),
(28, 'Ecole Elémentaire de Bras Creux', 'Impasse des Pétunias', '0262278679', '', 55.536039, -21.256467, 3),
(29, 'Ecole Elémentaire du 14ème KM', '26 RN3', '0262270517', '', 55.521496, -21.250732, 3),
(30, 'Ecole Elémentaire du 12ème KM', '65 rue St Vincent de Paul', '0262270577', '', 55.528722, -21.270659, 3),
(31, 'Ecole Elémentaire Jules Ferry', '29 rue Jules Ferry', '0262270281', '', 55.517542, -21.275778, 3),
(32, 'Ecole Elémentaire Louis Clerc Fontaine', '74 rue Jules Bertaut', '0262270255', '', 55.51368, -21.283216, 3),
(33, 'Ecole Elémentaire Antoine Lucas', '3 rue des Abeilles', '0262270579', '', 55.521378, -21.287905, 3),
(34, 'Ecole Elémentaire Ligne d''Equerre', '10 chemin Ligne d''Equerre', '0262389238', '', 55.561753, -21.296727, 3),
(35, 'Ecole Catholique Marthe Robin', '136 rue Jules Bertaut', '0262573318', '', 55.518401, -21.280227, 4),
(36, 'Collège du 14ème KM', '98 chemin Armanette', '0262273452', '', 55.525487, -21.251577, 5),
(37, 'Collège de Trois-Mares', '75 rue Montaigne', '0262579989', '', 55.499893, -21.259451, 5),
(38, 'Collège de la Chatoire', '2 rue d''Autriche', '0262595341', '', 55.505784, -21.277668, 5),
(39, 'Collège de Terrain Fleury', 'Rue Edgar Avril', '0262272429', '', 55.527456, -21.283976, 5),
(40, 'Collège du 23ème KM Michel Debré', '5 rue du Collège', '0262275232', '', 55.554149, -21.217541, 5),
(41, 'Lycée Bois Joly Potier', 'BP 468 - rue Ignace Pleyel 14ème KM 97418 Le Tampon', '0262579030', '', 55.524441, -21.249717, 6),
(42, 'Lycée Roland Garros', 'BP 461 - 97839 Le Tampon Cedex', '0262578100', '', 55.519581, -21.274099, 6),
(43, 'Université de la Réunion Antenne Sud avec IUFM', '117 rue du Général Ailleret 97430 Le Tampon', '0262579559', '', 55.506781, -21.270369, 7),
(44, 'Groupe Scolaire du 23ème KM', '268 rue des émeraudes 97418 Plaine des Cafres', '0262386742', '0262389107', 55.557035, -21.220721, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Site_sportif_culturel`
--

CREATE TABLE `Site_sportif_culturel` (
  `ID_site` int(11) NOT NULL,
  `Nom_site` varchar(100) DEFAULT NULL,
  `Adresse_site` varchar(100) DEFAULT NULL,
  `Tel_site` varchar(10) DEFAULT NULL,
  `Fax_site` varchar(10) DEFAULT NULL,
  `Longitude_site` double DEFAULT NULL,
  `Latitude_site` double DEFAULT NULL,
  `ID_cat_site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Site_sportif_culturel`
--

INSERT INTO `Site_sportif_culturel` (`ID_site`, `Nom_site`, `Adresse_site`, `Tel_site`, `Fax_site`, `Longitude_site`, `Latitude_site`, `ID_cat_site`) VALUES
(5, 'Médiathèque du Tampon', '20 rue Victor le Vigoureux 97430 Le Tampon', '0262550219', '0262349766', 55.51951599121094, -21.28058624267578, 1),
(6, 'Médiathèque Ludothèque PK23', 'rue des écoles', '0262598031', '', 55.551724, -21.219301, 1),
(7, 'Site sportif du collège de la ZAC', '', '', '', 55.505245208740234, -21.278308868408203, 2),
(8, 'Site sportif du collège de Terrain Fleury', '', '', '', 55.526683, -21.284136, 2),
(9, 'Site sportif de l''Ecole Primaire de Terrain Fleury', '', '', '', 55.526125, -21.285536, 2),
(10, 'Site sportif de la Pointe', '', '', '', 55.5178, -21.294173, 2),
(11, 'Site sportif du Petit Tampon', '', '', '', 55.536253, -21.283236, 2),
(12, 'Site Sportif de l''école Jules Ferry', '', '', '', 55.51706, -21.275188, 2),
(13, 'Site sportif de l''Université de la Réunion Antenne Sud', '', '', '', 55.506181, -21.270229, 2),
(14, 'Site sportif de l''Ecole de Bras Creux', '', '', '', 55.536522, -21.256072, 2),
(15, 'Site sportif de Bras de Pontho', '', '', '', 55.491772, -21.243542, 2),
(16, 'Site sportif de Pont d''Yves', '', '', '', 55.504689, -21.234842, 2),
(17, 'Site sportif du 17ème KM', '', '', '', 55.529612, -21.240452, 2),
(18, 'Théâtre Luc Donat', '20 rue Victor le Vigoureux 97430 Le Tampon', '', '0262272436', 55.52025604248047, -21.280427932739258, 3),
(19, 'Théâtre d''Azur', '', '', '', 55.51737976074219, -21.283315658569336, 3),
(20, 'Salle Beaudemoulin', 'Rue Albert Fréjaville 97430 Le Tampon', '0262576266', '0262578643', 55.51334762573242, -21.280017852783203, 7),
(21, 'Salle d''Animation du Dassy', '', '', '', 55.498359, -21.253992, 7),
(22, 'Salle d''animation du 23ème KM', '', '', '', 55.550973, -21.21648, 7),
(23, 'Boulodrome Ignace Hoarau', '', '', '', 55.51308822631836, -21.28412628173828, 4),
(24, 'Boulodrome Araucarias', '', '', '', 55.520825, -21.275408, 4),
(25, 'Boulodrome Bras de Pontho', '', '', '', 55.493692, -21.239762, 4),
(26, 'Boulodrome 23ème KM', '', '', '', 55.550416, -21.21636, 4),
(27, 'Stade Klébert Picard', '', '', '', 55.521888, -21.272399, 5),
(28, 'Stade du 27ème KM', '', '', '', 55.568204, -21.205698, 5),
(29, 'Bibliothèque du Petit Tampon', '', '', '', 55.538056, -21.281767, 6),
(30, 'Bibliothèque de Bras Creux', '', '', '', 55.534548, -21.256962, 6),
(31, 'Bibliothèque de Pont d''Yves', '', '', '', 55.506309, -21.235572, 6),
(32, 'Maison des Jeunes et de la Culture (MJC)', '', '', '', 55.519954681396484, -21.280786514282227, 1),
(33, 'TCMT', '', '', '', 55.525095, -21.283956, 8),
(34, 'Parcours de santé Bel Air', '', '', '', 55.5178, -21.291834, 8),
(35, 'Site sportif du 12ème KM', '', '', '', 55.531549, -21.266725, 2),
(36, 'Complexe sportif du 14ème KM', '', '', '', 55.52663, -21.251502, 2),
(37, 'Parc des Palmiers', '', '', '', 55.494851, -21.254312, 8),
(38, 'Complexe sportif de Trois Mares', '', '', '', 55.501041, -21.258301, 2),
(39, 'Complexe sportif du 23ème KM', '', '', '', 55.549686, -21.218781, 2),
(40, 'Les Grands Kiosques', '', '', '', 55.572238, -21.204938, 8),
(41, 'Musée du Volcan', '', '', '', 55.574609, -21.202848, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Batiment_Administratif`
--
ALTER TABLE `Batiment_Administratif`
  ADD PRIMARY KEY (`ID_bat`),
  ADD KEY `FK_Batiment_Administratif_ID_cat_bat` (`ID_cat_bat`);

--
-- Indexes for table `Categorie_Batiment`
--
ALTER TABLE `Categorie_Batiment`
  ADD PRIMARY KEY (`ID_cat_bat`);

--
-- Indexes for table `Categorie_Ecole`
--
ALTER TABLE `Categorie_Ecole`
  ADD PRIMARY KEY (`ID_cat_ecole`);

--
-- Indexes for table `Categorie_Site`
--
ALTER TABLE `Categorie_Site`
  ADD PRIMARY KEY (`ID_cat_site`);

--
-- Indexes for table `Ecole`
--
ALTER TABLE `Ecole`
  ADD PRIMARY KEY (`ID_ecole`),
  ADD KEY `FK_Ecole_ID_cat_ecole` (`ID_cat_ecole`);

--
-- Indexes for table `Site_sportif_culturel`
--
ALTER TABLE `Site_sportif_culturel`
  ADD PRIMARY KEY (`ID_site`),
  ADD KEY `FK_Site_sportif_culturel_ID_cat_site` (`ID_cat_site`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Batiment_Administratif`
--
ALTER TABLE `Batiment_Administratif`
  MODIFY `ID_bat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `Categorie_Batiment`
--
ALTER TABLE `Categorie_Batiment`
  MODIFY `ID_cat_bat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Categorie_Ecole`
--
ALTER TABLE `Categorie_Ecole`
  MODIFY `ID_cat_ecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Categorie_Site`
--
ALTER TABLE `Categorie_Site`
  MODIFY `ID_cat_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ecole`
--
ALTER TABLE `Ecole`
  MODIFY `ID_ecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `Site_sportif_culturel`
--
ALTER TABLE `Site_sportif_culturel`
  MODIFY `ID_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Batiment_Administratif`
--
ALTER TABLE `Batiment_Administratif`
  ADD CONSTRAINT `FK_Batiment_Administratif_ID_cat_bat` FOREIGN KEY (`ID_cat_bat`) REFERENCES `Categorie_Batiment` (`ID_cat_bat`);

--
-- Constraints for table `Ecole`
--
ALTER TABLE `Ecole`
  ADD CONSTRAINT `FK_Ecole_ID_cat_ecole` FOREIGN KEY (`ID_cat_ecole`) REFERENCES `Categorie_Ecole` (`ID_cat_ecole`);

--
-- Constraints for table `Site_sportif_culturel`
--
ALTER TABLE `Site_sportif_culturel`
  ADD CONSTRAINT `FK_Site_sportif_culturel_ID_cat_site` FOREIGN KEY (`ID_cat_site`) REFERENCES `Categorie_Site` (`ID_cat_site`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
