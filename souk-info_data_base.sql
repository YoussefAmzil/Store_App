-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Juin 2017 à 14:28
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `souk-info`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `nom_admin` text CHARACTER SET latin1 NOT NULL,
  `email_admin` text CHARACTER SET latin1 NOT NULL,
  `mot-passe` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `email_admin`, `mot-passe`) VALUES
(1, 'youssef', 'youssef@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(100) NOT NULL,
  `nom_cat` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_cat`) VALUES
(1, 'telephone'),
(2, 'tablet'),
(3, 'imprimante'),
(4, 'cam&eacute;ra'),
(5, 'pc');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` int(100) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `id_client` int(100) NOT NULL,
  `nom_prod` text NOT NULL,
  `quantite` int(10) NOT NULL,
  `date_comm` date NOT NULL,
  `etat_comm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `nom` text NOT NULL,
  `message` text NOT NULL,
  `date_rec` date NOT NULL,
  `etat_email` int(11) NOT NULL,
  `email_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `email`
--

INSERT INTO `email` (`id_email`, `nom`, `message`, `date_rec`, `etat_email`, `email_user`) VALUES
(10, 'sanba', 'bonjour', '2017-06-09', 1, 'sanba@gmail.com'),
(11, 'sanba', 'merci', '2017-05-25', 1, 'sanba@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `image`) VALUES
(1, 'url.jpg'),
(2, 'xampp-logo.jpg'),
(3, 'Use Case diagram.png'),
(4, 'fly0.png');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(100) NOT NULL,
  `image1` varchar(3000) NOT NULL,
  `image2` varchar(3000) NOT NULL,
  `image3` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id_image`, `image1`, `image2`, `image3`) VALUES
(1, '18010254_1393877237358538_6908433818370240858_n.png', '418724.jpg', 'url.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int(100) NOT NULL,
  `nom_prod` text CHARACTER SET utf8 NOT NULL,
  `categor_pro` text NOT NULL,
  `nbr_stock` int(10) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `prix` int(100) NOT NULL,
  `refe_prod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `nom_prod`, `categor_pro`, `nbr_stock`, `description`, `image`, `prix`, `refe_prod`) VALUES
(2, 'tablet samsung galaxy m4', 'tablet', 2, '5 gb ram\r\n2 mpx caméra\r\ngarantie 2 ans\r\nchargeur original', 'xampp-logo.jpg', 2000, ''),
(3, 'tablet samsung galaxy s4', 'telephone', 16, '   4 gb ram \r\n3 mpx camï¿½ra\r\ngarantie 2 ans', 'webrtc-logo-vert-retro-255x305.png', 2200, ''),
(13, 'iphone 6 plus', 'telephone', 12, '4 gb ram\r\n20 mpx camÃ©ra\r\npochete ladre', 'url.jpg', 4500, 'E5443723'),
(14, 'telephone samsung', 'telephone', 16, 'bonne qua', '607866.png', 2000, 'F45534');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `mot_passe` text NOT NULL,
  `date_re` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `adresse`, `telephone`, `email`, `mot_passe`, `date_re`) VALUES
(2, 'sanba xd', 'tmanare', '0678987654', 'sanba@gmail.com', 'az', '2017-05-07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comm` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
