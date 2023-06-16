

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festivoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `annoncesvehicules`
--

CREATE TABLE `annoncesvehicules` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `placeDisponibles` int(11) NOT NULL,
  `dateAller` date NOT NULL,
  `dateRetour` date DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annoncesvehicules`
--

INSERT INTO `annoncesvehicules` (`id`, `type`, `placeDisponibles`, `dateAller`, `dateRetour`, `id_utilisateur`) VALUES
(7, 'Golf 7', 4, '2023-06-24', NULL, 1),
(8, 'Nissan qashqai', 4, '2023-06-17', '2023-06-18', 2),
(9, 'Nissan qashqai', 3, '2023-06-30', '2023-07-01', 2),
(10, 'Hyundai Tucson', 2, '2023-06-30', NULL, 1),
(11, 'Renaut Megan', 2, '2023-07-01', '2023-06-03', 4),
(12, 'Renaut Megan', 3, '2023-07-08', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `datesfestivales`
--

CREATE TABLE `datesfestivales` (
  `id` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `id_festivale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `datesfestivales`
--

INSERT INTO `datesfestivales` (`id`, `date`, `id_festivale`) VALUES
(38, '2023-07-13', 5),
(39, '2023-07-14', 5),
(40, '2023-07-15', 5),
(41, '2023-08-04', 6),
(42, '2023-08-05', 6),
(43, '2023-08-06', 6),
(44, '2023-07-15', 7),
(45, '2023-07-16', 7),
(46, '2023-07-17', 7);

-- --------------------------------------------------------

--
-- Structure de la table `festivaliers`
--

CREATE TABLE `festivaliers` (
  `id_festivalier` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datePresence` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `festivaliers`
--

INSERT INTO `festivaliers` (`id_festivalier`, `nom`, `prenom`, `datePresence`, `login`, `motdepasse`, `id_vehicule`) VALUES
(4, 'test_nom', 'test_prenom', '2023-06-30', 'test_login', '$2y$10$fcUcdTJ6GiMmifAnt6JG0u0swCpuYb2iQDbKLrJ7/c3', 7),
(5, 'marc', 'Lepetit', '2023-07-06', 'marc_lepetit', '$2y$10$IPtBapya5Ah/d5XxuaorS.Vqy9iYbV5FTPzB108MI/J', 8),
(6, 'frederick', 'textier', '2023-06-22', 'frederick_textier', '$2y$10$N8OGHmCGDjDpu/CboNLigOTINVPaRX.8nuW8v6rRl1G', 11),
(7, 'jean', 'bruno', '2023-07-01', 'jean_bruno', '$2y$10$vSEn2d47iiUclYTwBa1Z1ezKHFWfUvnQ2tLtzSkEeIG', 10);

-- --------------------------------------------------------

--
-- Structure de la table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `festivals`
--

INSERT INTO `festivals` (`id`, `nom`, `localisation`, `photo`) VALUES
(5, 'Vielle Charrue', 'Calhaix, Ouest Bretagne, France', 'img-0.00453500 1686169405-charrue.jfif'),
(6, 'Bout du monde', 'île de Crozon dans le Finistère en Bretagne, France', 'img-0.22617600 1686169516-boutdumonde.jpg'),
(7, '\"Street food\" festivale', 'Lyon, France', 'img-0.84209300 1686599618-str food.jfif');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `login`, `motdepasse`, `role`) VALUES
(1, 'superadmin23', '$2y$10$x9Fmc9yL3ET8dUh3hzTBMu.blXVeY5uMriZ78PnnvjCztiWSelq3C', 'ROLE_SUPER_ADMIN'),
(2, 'user1_test', '$2y$10$hR9yogC15cJj/w6p5OTr6.6rlOMXvzKk8dYNRQMXxTaLmIxdLihIm', 'ROLE_USER'),
(4, 'user2_test', '$2y$10$tGrtUEwn4SuEERVrVT1J.ueLcT0jjrQZE6jcWJEX8NRkpZ60TM3Km', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annoncesvehicules`
--
ALTER TABLE `annoncesvehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `datesfestivales`
--
ALTER TABLE `datesfestivales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_festivale` (`id_festivale`);

--
-- Index pour la table `festivaliers`
--
ALTER TABLE `festivaliers`
  ADD PRIMARY KEY (`id_festivalier`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annoncesvehicules`
--
ALTER TABLE `annoncesvehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `datesfestivales`
--
ALTER TABLE `datesfestivales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `festivaliers`
--
ALTER TABLE `festivaliers`
  MODIFY `id_festivalier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annoncesvehicules`
--
ALTER TABLE `annoncesvehicules`
  ADD CONSTRAINT `annoncesvehicules_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `datesfestivales`
--
ALTER TABLE `datesfestivales`
  ADD CONSTRAINT `datesfestivales_ibfk_1` FOREIGN KEY (`id_festivale`) REFERENCES `festivals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `festivaliers`
--
ALTER TABLE `festivaliers`
  ADD CONSTRAINT `festivaliers_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `annoncesvehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
