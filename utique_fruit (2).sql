-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 26 avr. 2020 à 20:21
-- Version du serveur :  8.0.18
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
-- Base de données :  `utique_fruit`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `reff_note` int(11) NOT NULL,
  `avis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `reff_note` (`reff_note`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `saison` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `infosgenerales` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `nom`, `saison`, `infosgenerales`) VALUES
('1234', 'cat1', 's1', '\r\n'),
('147', 'cat2', 'saison2', 'aadsdazd');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` varchar(20) NOT NULL,
  `pays` varchar(10) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `pays`, `ville`, `code_postal`) VALUES
('1234', 'TN', 'tunis', '25080'),
('mahdi', 'tunisie', 'tunis', '2080');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(255) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` varchar(20) NOT NULL,
  `prix_total` float NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fkcommande` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `reference_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_proprietaire` varchar(20) NOT NULL,
  `reference_sujet` int(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  PRIMARY KEY (`reference_commentaire`),
  KEY `fkcommentaire` (`reference_sujet`),
  KEY `fkcommentaire_prop` (`id_proprietaire`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`reference_commentaire`, `id_proprietaire`, `reference_sujet`, `commentaire`) VALUES
(2, '1234', 8, 'commentaire 1 '),
(3, 'admin', 8, 'commentaire 2 '),
(5, 'mahdi', 8, 'commentaire 4 \r\n5000');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `adresse_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `motdepasse`, `adresse_email`, `type`) VALUES
('1234', '1234', 'mahdi.maalawi@esprit.tn', 'client'),
('admin', 'admin', 'mehdi.maalawi@gmail.com', 'admin'),
('mahdi', '1234', 'mahdi.maalawi@esprit.tn', 'client');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` int(11) NOT NULL DEFAULT '0',
  `cin_livreur` int(11) DEFAULT NULL,
  `num_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_livraison`),
  KEY `cin_livreur` (`cin_livreur`),
  KEY `fkliv` (`num_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `cin` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `secteur` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `reff_note` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_produit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `note_val` int(11) NOT NULL,
  PRIMARY KEY (`reff_note`),
  KEY `fk_client_note` (`id_client`),
  KEY `fklivraison_commande` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`reff_note`, `id_client`, `id_produit`, `note_val`) VALUES
(1, 'mahdi', '1189', 3);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_client` varchar(20) NOT NULL,
  `id_produit` varchar(20) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  PRIMARY KEY (`id_client`,`id_produit`),
  KEY `fk_panier_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idprod` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomprod` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prixkg` float NOT NULL,
  `disponibilite` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qtedispo` float NOT NULL,
  `lienimage` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idcat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idprod`),
  KEY `fk_idcat` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idprod`, `nomprod`, `description`, `prixkg`, `disponibilite`, `qtedispo`, `lienimage`, `idcat`) VALUES
('1189', 'Produit1', 'Fake texte, texte te', 15, 'oui', 4, 'images/1.png', '1234'),
('1564', 'prod5', 'ollllaallala\r\n', 3, 'oui', 7, 'images/3.png', '147'),
('541', 'prod2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus dui eget porttitor dapibus. Nunc id metus at orci lobortis pretium at id tellus. Ut pulvinar blandit risus, in tempus sapien pretium in. Morbi malesuada consectetur augue, ac di', 7, 'oui', 5, 'images/2.png', '1234'),
('8080', 'prod3', 'There are many varia', 5, 'oui', 6, 'images/4.jpg', '1234'),
('888', 'prod4', 'Praesent fringilla venenatis lacus, et fringilla diam. Nulla eu tortor volutpat, luctus lorem sed, varius dolor. Vestibulum id ipsum id urna mollis mattis. Cras erat nulla, condimentum nec arcu quis, pharetra egestas dui. Sed non accumsan quam, in cu', 9, 'oui', 4, 'images/4.png', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_reclamation` varchar(20) NOT NULL,
  `id_client` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `avis` text NOT NULL,
  `id_commande` int(255) NOT NULL,
  PRIMARY KEY (`id_reclamation`),
  KEY `fkreclamation` (`id_client`),
  KEY `fkreclamation2` (`type`),
  KEY `fk_commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `reference_sujet` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `etat` int(1) NOT NULL,
  `id_produit` varchar(20) NOT NULL,
  PRIMARY KEY (`reference_sujet`),
  KEY `fksujet` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`reference_sujet`, `titre`, `etat`, `id_produit`) VALUES
(6, 'prod3', 0, '8080'),
(7, 'prod5', 0, '1564'),
(8, 'prod4', 1, '888');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type` varchar(20) NOT NULL,
  `nbr_etoile` int(20) NOT NULL,
  `necesssite` varchar(20) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id`) REFERENCES `compte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fkcommande` FOREIGN KEY (`id_utilisateur`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fkcommentaire_prop` FOREIGN KEY (`id_proprietaire`) REFERENCES `compte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fkliv` FOREIGN KEY (`num_commande`) REFERENCES `commande` (`id_commande`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fklivrasion_livreur` FOREIGN KEY (`cin_livreur`) REFERENCES `livreur` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_client_note` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fklivraison_commande` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_idcat` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fksujet` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
