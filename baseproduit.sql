-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 mai 2021 à 15:56
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
-- Base de données : `baseproduit`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCateg` int(10) NOT NULL AUTO_INCREMENT,
  `libCateg` varchar(200) NOT NULL,
  PRIMARY KEY (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Table Des Catégories de Figurine';

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCateg`, `libCateg`) VALUES
(1, 'One Piece'),
(2, 'Naruto');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCpt` int(10) NOT NULL AUTO_INCREMENT,
  `civCpt` char(1) NOT NULL,
  `nomCpt` varchar(40) NOT NULL,
  `prenomCpt` varchar(40) NOT NULL,
  `pseudoCpt` varchar(40) NOT NULL,
  `dateNaissCpt` date DEFAULT NULL,
  `adCpt` varchar(40) DEFAULT NULL,
  `cpCpt` int(6) DEFAULT NULL,
  `villeCpt` varchar(40) DEFAULT NULL,
  `mailCpt` varchar(40) DEFAULT NULL,
  `mdpCpt` varchar(40) NOT NULL,
  PRIMARY KEY (`idCpt`),
  UNIQUE KEY `CodeCompte` (`idCpt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idCpt`, `civCpt`, `nomCpt`, `prenomCpt`, `pseudoCpt`, `dateNaissCpt`, `adCpt`, `cpCpt`, `villeCpt`, `mailCpt`, `mdpCpt`) VALUES
(1, 'M', 'Claire', 'Arnaud', 'Admin', '1999-11-05', '7 rue des Jardins du Pignarel', 34570, 'Pignan', 'arnaudclaire20@yahoo.fr', '64c453cbb15ea81f1111cb062c1a66c5f5b797bc');

-- --------------------------------------------------------

--
-- Structure de la table `figurine`
--

DROP TABLE IF EXISTS `figurine`;
CREATE TABLE IF NOT EXISTS `figurine` (
  `idFig` int(10) NOT NULL AUTO_INCREMENT,
  `nomFig` varchar(200) NOT NULL,
  `cheminImageFig` varchar(200) NOT NULL,
  `descriptionFig` varchar(500) NOT NULL,
  `tailleFig` int(3) NOT NULL,
  `editeurFig` varchar(40) DEFAULT NULL,
  `prixFig` float NOT NULL,
  `idCateg` int(10) NOT NULL,
  PRIMARY KEY (`idFig`),
  KEY `fk_idCateg` (`idCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `figurine`
--

INSERT INTO `figurine` (`idFig`, `nomFig`, `cheminImageFig`, `descriptionFig`, `tailleFig`, `editeurFig`, `prixFig`, `idCateg`) VALUES
(2, 'STATUE COLLECTOR ONE PIECE LUFFY GEAR SECOND ET GEAR FOURTH', '../Documents/Figurines/one-piece-luffy-gear-4.jpg', 'Figurine  premium de l\'univers One Piece pour les vrais pirates', 40, '', 849.9, 1),
(3, 'RÃ‰PLIQUE ONE PIECE THOUSAND SUNNY', '../Documents/Figurines/bateau-one-piece.jpg', ' Figurine  premium de l\'univers One Piece pour les vrais pirates', 28, '', 49.9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idCompte` varchar(40) NOT NULL,
  `Titre` varchar(40) NOT NULL,
  KEY `CodeCompte` (`idCompte`,`Titre`),
  KEY `Titre` (`Titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `Titre` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `image` text CHARACTER SET utf8mb4 NOT NULL,
  `Libelle` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `Type` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `Prix` decimal(4,2) NOT NULL,
  PRIMARY KEY (`Titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Titre`, `image`, `Libelle`, `Type`, `Prix`) VALUES
('&', '\\Site\\vue\\images\\_3651.jpg', 'Une employée administrative dans un hôpital décide d accomplir son rêve et de démarrer une activité professionnelle parallèle. \r\nElle veut ouvrir un salon de manucure qui n ouvre que le soir, pour les femmes actives qui veulent rester coquettes.', 'Josei', '13.00'),
('Afumi no Umi - Minamo ga Yureru Toki', '\\Site\\vue\\images\\afumi_no_umi_-_minamo_ga_yureru_toki_14903.jpg', 'Un guerrier rare enfoui dans l histoire repeint l histoire japonaise ! \r\nUn drame de réincarnation qui dépeint hardiment la vie du seigneur de guerre Sengoku, Kuchiki Mototsuna, \r\nqui a sauvé Nobunaga, Hideyoshi et Ieyasu!', 'Shojo', '11.00'),
('Fairy tail', '\\Site\\vue\\images\\fairy-tail-cover.jpg', 'Le Royaume de Fiore. Ce pays perpétuellement neutre qui compte 17 millions d\'habitants, est aussi un monde de magie et de mystères. La magie fait partie du quotidien et son commerce y est entièrement libre. Ainsi, certains, passés maîtres, décident d\'en faire leur profession. On les appelle les Mages. Contre rétribution, ils œuvrent pour le bien de la communauté. Leur force est aussi leur nombre, ils se regroupent dans différentes guildes, disséminées un peu partout dans le royaume. Parmi celles', 'Shonen', '6.95'),
('one piece', '\\Site\\vue\\images\\One_Piece.jpg', 'Gloire, fortune et puissance, \r\nc est ce que possédait Gold Roger, le tout puissant roi des pirates, \r\navant de mourir sur l échafaud. Mais ses dernières paroles ont éveillées bien des convoitises.', 'Shonen', '10.50');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `figurine`
--
ALTER TABLE `figurine`
  ADD CONSTRAINT `fk_idCateg` FOREIGN KEY (`idCateg`) REFERENCES `categorie` (`idCateg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
