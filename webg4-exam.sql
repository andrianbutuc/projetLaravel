-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 oct. 2021 à 18:54
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webg4-exam`
--

-- --------------------------------------------------------

--
-- Structure de la table `commits`
--

CREATE TABLE `commits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `repository_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commits`
--

INSERT INTO `commits` (`id`, `message`, `date`, `repository_id`) VALUES
(1, 'Un premier message', '2021-05-01', 1),
(2, 'Un second message', '2021-05-04', 1),
(3, 'Un message', '2021-05-02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contributors`
--

CREATE TABLE `contributors` (
  `login` varchar(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contributors`
--

INSERT INTO `contributors` (`login`, `name`) VALUES
('mcd', 'Marco Codutti pour de faux'),
('nri', 'Nicolas Richard');

-- --------------------------------------------------------

--
-- Structure de la table `repositories`
--

CREATE TABLE `repositories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `contributor_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repositories`
--

INSERT INTO `repositories` (`id`, `name`, `contributor_login`) VALUES
(1, 'PremierDepot', 'nri'),
(2, 'SecondDepot', 'nri'),
(3, 'PremierDepot de mcd', 'mcd');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commits`
--
ALTER TABLE `commits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commits_repository_id_foreign` (`repository_id`);

--
-- Index pour la table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `repositories`
--
ALTER TABLE `repositories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commits`
--
ALTER TABLE `commits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `repositories`
--
ALTER TABLE `repositories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commits`
--
ALTER TABLE `commits`
  ADD CONSTRAINT `commits_repository_id_foreign` FOREIGN KEY (`repository_id`) REFERENCES `repositories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
