-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 18 nov. 2020 à 23:42
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `colocataire`
--

CREATE TABLE `colocataire` (
  `id` int(11) NOT NULL,
  `nom` char(11) NOT NULL,
  `prenom` char(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe_coloc` char(50) NOT NULL,
  `adresse` char(50) NOT NULL,
  `mdp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `colocataire`
--

INSERT INTO `colocataire` (`id`, `nom`, `prenom`, `age`, `sexe_coloc`, `adresse`, `mdp`) VALUES
(2, 'Sidibé', 'Ben Aly', 30, 'Femme', '13 rue nungesser, Dugny 93440', 'Benaly');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `colocataire`
--
ALTER TABLE `colocataire`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
