-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 mai 2020 à 13:42
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP :  7.3.14-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ericd995946`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `auth` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_comment` datetime NOT NULL,
  `signalement` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `chapter_number`, `auth`, `comment`, `date_comment`, `signalement`) VALUES
(1, 1, 'eric', 'Super chapitre !', '2019-07-12 11:52:19', 1),
(2, 1, 'moi', 'C\'est vrai qu\'il est bien ce chapitre !', '2019-07-12 11:55:01', 0),
(3, 2, 'eric', 'Aussi bien que le premier!', '2019-07-12 11:55:35', 0),
(4, 2, 'moi', 'Oui bah moi je ne suis pas d\'accord !', '2019-07-12 11:56:08', 1),
(5, 3, 'eric', 'Toujours aussi sympa.', '2019-07-12 11:56:50', 0),
(6, 4, 'moi', 'Bah moi j\'aime toujours pas !', '2019-07-12 11:57:28', 0),
(7, 6, 'eric', 'IntÃ©ressant. ', '2019-07-12 19:37:35', 1),
(8, 5, 'Eric', 'Pas mal.', '2019-07-13 16:57:01', 1),
(9, 1, 'marcel', 'I usually try to keep my sadness pent up inside where it can fester quietly as a mental illness. Hey, what kinda party is this? There\'s no booze and only one hooker. I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.\r\n\r\nTake me to your leader! When the lights go out, it\'s nobody\'s business what goes on between two consenting adults. Yeah, and if you were the pope they\'d be all, &quot;Straighten your pope hat.&quot; And &quot;Put on your good vestments.&quot;\r\n\r\nAh, computer dating. It\'s like pimping, but you rarely have to use the phrase &quot;upside your head.&quot; Tell them I hate them. Oh dear! She\'s stuck in an infinite loop, and he\'s an idiot! Well, that\'s love for you.\r\n\r\nAnd yet you haven\'t said what I told you to say! How can any of us trust you? And until then, I can never die? Say what? Son, as your lawyer, I declare y\'all are in a 12-piece bucket o\' trouble. But I done struck you a deal: Five hours of community service cleanin\' up that ol\' mess you caused.\r\n\r\nBut I\'ve never been to the moon! You know, I was God once. Bender, this is Fry\'s decisionâ€¦ and he made it wrong. So it\'s time for us to interfere in his life. When will that be? Bender, this is Fry\'s decisionâ€¦ and he made it wrong. So it\'s time for us to interfere in his life.', '2019-07-14 10:05:25', 1),
(11, 2, 'Blabla', 'Salut', '2019-08-08 16:32:23', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

