-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 mai 2020 à 05:15
-- Version du serveur :  10.5.2-MariaDB
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
-- Base de données :  `fitbody`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(350) NOT NULL,
  `statut` varchar(6) NOT NULL DEFAULT 'NON LU',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `message`, `statut`, `created_at`) VALUES
(1, 'Ilan', 'JOURNO', 'ilan.journo@gmail.com', 'Bonjour, je vous contact pour en savoir plus sur vos offres ! Merci d\'avance pour votre retour !', 'false', '2020-05-03 17:39:18'),
(2, 'David', 'JOURNO', 'davjourno@gmail.com', 'Bonsoir', 'false', '2020-05-03 17:42:57');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `idgroups` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgroups`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`idgroups`, `name`) VALUES
(1, 'adhérent'),
(2, 'coach'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id_sports` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sports`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sports`
--

INSERT INTO `sports` (`id_sports`, `name`) VALUES
(1, 'Zumba'),
(2, 'Body combat'),
(3, 'Body pump'),
(4, 'Body sculpt'),
(5, 'Fit Hiit'),
(6, 'Fit Caf'),
(7, 'Fit Step'),
(8, 'Fit Stretch'),
(9, 'Fit Pilates'),
(10, 'Fit cross training'),
(11, 'Fit Boxe & Rope'),
(14, 'Fit Intense'),
(15, 'Fit Ultra');

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribe`
--

INSERT INTO `subscribe` (`id`, `name`) VALUES
(1, 'Standard'),
(2, 'Advanced'),
(3, 'Prenium');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(5) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(145) DEFAULT NULL,
  `birth_date` varchar(10) DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `profil_picture` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `sexe`, `firstname`, `lastname`, `birth_date`, `birth_place`, `description`, `profil_picture`, `created_at`) VALUES
(1, 'Homme', 'Ilan', 'JOURNO', '22-03-2001', 'Montmorency', NULL, 'https://zupimages.net/up/20/18/tlzg.jpeg', '2020-05-03 03:36:58'),
(2, 'Homme', 'Raphael', 'WEYS', '25-08-1998', 'Beauvais', NULL, 'https://cdn.discordapp.com/attachments/646349137683415040/703791893992964197/IMG_20200329_174805.jpg', '2020-05-03 03:36:58'),
(3, 'Homme', 'Julien', 'ZAMOR', '13-03-1989', 'Paris 15ème', NULL, 'https://www.proarti.fr/uploads/media/user/0001/21/thumb_20487_user_profile.jpeg', '2020-05-03 03:41:38'),
(59, 'Femme', 'Laura', 'NAKACHE', '13-03-2000', 'Paris', NULL, '', '2020-05-04 00:26:57'),
(60, 'Homme', 'Emmanuel', 'MACRON', '21-12-1977', 'Amiens', NULL, 'https://img.huffingtonpost.com/asset/5d9f48b0210000b908acc485.jpeg?cache=jlyL6hRyv7&ops=scalefit_630_noupscale', '2020-05-04 00:34:28'),
(74, 'Femme', 'Kelly', 'Abisror', '22-03-2001', 'Paris', NULL, '', '2020-05-04 05:03:17');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_groups`
--

DROP TABLE IF EXISTS `users_has_groups`;
CREATE TABLE IF NOT EXISTS `users_has_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `idgroups` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_has_groups`
--

INSERT INTO `users_has_groups` (`id`, `id_users`, `id_sub`, `idgroups`, `email`, `password`) VALUES
(1, 1, 0, 3, 'ilan.journo555@gmail.com', 'aa'),
(3, 3, 0, 3, 'julienzamor@gmail.com', 'ddd'),
(5, 2, 2, 1, 'raphael.weys@gmail.com', 'aka'),
(7, 59, 3, 1, 'nakache.lau@gmail.com', 'dd'),
(8, 60, 3, 2, 'macronpresident@gouv.fr', 'dd'),
(10, 2, 2, 2, 'raphael.weys@gmail.com', 'aka'),
(11, 1, 3, 2, 'ilan.journo555@gmail.com', 'aa'),
(12, 59, 3, 2, 'nakache.lau@gmail.com', 'dd'),
(25, 74, 2, 1, 'kelly@gmail.com', 'aa'),
(26, 3, 3, 2, 'julienzamor@gmail.com', 'ddd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
