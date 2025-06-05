-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 05 juin 2025 à 12:07
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demosymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `boardgame`
--

CREATE TABLE `boardgame` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_year` smallint NOT NULL,
  `publisher` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_duration` smallint NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boardgame`
--

INSERT INTO `boardgame` (`id`, `title`, `release_year`, `publisher`, `picture`, `player_number`, `age`, `average_duration`, `description`) VALUES
(1, 'Dune Imperium', 2021, 'Lucky Duck Games', 'dune-imperium.webp', '1-4', '14+', 105, '<div>Dune : Imperium est un jeu qui s\'inspire des éléments et des personnages de l\'héritage de Dune, à la fois le nouveau film de Legendary Pictures et la série littéraire de Frank Herbert, Brian Herbert et Kevin J. Anderson. En tant que chef de l\'une des grandes maisons du Landsraad, levez votre bannière et rassemblez vos forces et vos espions. La guerre arrive et au centre du conflit se trouve Arrakis - Dune, la planète du désert. Dune : Imperium utilise le deck building pour ajouter un angle d\'information caché au placement traditionnel des travailleurs. Vous commencez avec une carte leader unique, ainsi qu\'un jeu de cartes identique à celui de vos adversaires. Au fur et à mesure que vous acquérez des cartes et que vous construisez votre jeu, vos choix définissent vos forces et vos faiblesses. Les cartes vous permettent d\'envoyer vos agents à certains endroits du plateau de jeu, de sorte que l\'évolution de votre jeu influe sur votre stratégie. Vous pourriez devenir plus puissant militairement, capable de déployer plus de troupes que vos adversaires. Vous pouvez aussi acquérir des cartes qui vous donnent un avantage sur les quatre factions politiques représentées dans le jeu : l\'Empereur, la Guilde des Espaces, le Bene Gesserit et les Fremen. Contrairement à de nombreux jeux de deck building, vous ne jouez pas toute votre main en un seul tour. Au lieu de cela, vous tirez une main de cartes au début de chaque tour et vous alternez avec les autres joueurs, en prenant un tour d\'agent à la fois (en jouant une carte pour envoyer un de vos agents sur le plateau de jeu). Lorsque c\'est votre tour et que vous n\'avez plus d\'agents à placer, vous prenez un tour de révélation, en révélant le reste de vos cartes, ce qui vous permet de vous procurer Persuasion et Épées. La Persuasion est utilisée pour acquérir plus de cartes, et les Épées aident vos troupes à se battre pour les récompenses du tour en cours, comme indiqué sur la carte Conflit révélée. Vainquez vos rivaux au combat, dirigez habilement les factions politiques et acquérez les précieuses cartes The Spice Must Flow pour mener votre Maison à la victoire !</div>'),
(2, 'Twisted Fables', 2021, 'Dimension Games', 'twisted-fables-683f04ef052d8.jpg', '2', '14+', 45, '<div>Twisted Fables est un jeu de combat de conte de fées au rythme effréné, inspiré des combattants d\'arcade 2D de la vieille école. Dans Twisted Fables, les joueurs jouent le rôle d\'héroïnes bien-aimées issues de certaines des histoires, mythes et légendes les plus célèbres de l\'histoire. Retirés de leur cadre traditionnel, ces personnages ont été jetés dans un monde d\'assassins cybernétiques, de manipulations magiques et de ténèbres malveillantes. Ce ne sont pas les personnages classiques dont vous vous souvenez, mais plutôt des fables surpuissantes tirées de leurs propres terres pour combattre dans des dimensions et des réalités alternatives bizarres et radicales. Quelle force mystérieuse les a rassemblés ? Quel est le but de leur guerre ? Seul le Tisseur de Contes le sait avec certitude. Piloté par le deck building, Twisted Fables est un jeu pour deux joueurs en mode 1v1 ou quatre joueurs en mode 2v2 (disponible avec le pack d\'amélioration 2v2 disponible séparément.) Dans le jeu, chaque guerrier va renforcer ses capacités, apprendre de nouvelles compétences puissantes, débloquer des pouvoirs spéciaux dévastateurs et utiliser des stratégies asymétriques uniques pour vaincre ses adversaires. Même un même personnage peut afficher des styles de combat complètement différents selon les décisions de son joueur. Les différentes spécialisations qu\'un personnage peut choisir lui offrent non seulement des choix tactiques fantastiquement flexibles, mais aussi une couche supplémentaire de profondeur et de surprise pour ce combattant frénétique et frénétique. Twisted Fables apporte aux constructeurs de ponts une expérience hautement interactive sur laquelle vous voudrez revenir encore et encore. Le livre est ouvert. Les fables sont apparues. Commençons.</div>'),
(4, 'Champ d\'Honneur', 2019, 'Gigamic', 'champ-d-honneur-683f050b63c0d.webp', '2-4', '14+', 45, 'Champ D\'Honneur,\r\n\r\nGlissez vous dans la peau d\'un chef de guerre médiéval qui cherche à étendre son territoire. Choisissez bien les unités adéquates en fonction de vos ennemies\r\n\r\nChamp D\'Honneur est un wargame avec une mécanique de bag-building. \r\n\r\nAu début du jeu, recrutez vos armées en sélectionnant par un système de draft les unités que vous utilisez ensuite pour capturer les points clés sur le plateau. Pour réussir dans Champ D\'Honneur, vous devez gérer avec succès non seulement vos armées sur le champ de bataille, mais aussi celles qui attendent d\'être déployées.\r\n\r\nÀ chaque tour, vous tirez trois pièces de votre sac, puis vous les utilisez à tour de rôle pour effectuer des actions. Chaque pièce montre une unité militaire sur une face et peut être utilisée pour une ou plusieurs actions. La partie se termine lorsqu\'un joueur - ou une équipe dans le cas d\'une partie à quatre joueurs - a placé tous ses marqueurs de contrôle. Ce joueur ou cette équipe gagne !');

-- --------------------------------------------------------

--
-- Structure de la table `boardgame_category`
--

CREATE TABLE `boardgame_category` (
  `boardgame_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boardgame_category`
--

INSERT INTO `boardgame_category` (`boardgame_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Deckbuilding'),
(3, 'Placement d\'ouvriers'),
(4, 'Bagbuilding'),
(5, 'Gestion de ressource');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250527133752', '2025-05-27 13:42:04', 111),
('DoctrineMigrations\\Version20250527140832', '2025-05-27 14:09:31', 101),
('DoctrineMigrations\\Version20250602132814', '2025-06-02 13:29:32', 199),
('DoctrineMigrations\\Version20250603064659', '2025-06-03 06:47:19', 97),
('DoctrineMigrations\\Version20250603094128', '2025-06-03 09:42:04', 135),
('DoctrineMigrations\\Version20250604141111', '2025-06-04 14:11:34', 197);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `boardgame_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `commentary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `boardgame_id`, `user_id`, `rating`, `commentary`) VALUES
(1, 1, 1, 5, 'Super jeu !');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `pseudo`) VALUES
(1, 'gregory.fourmaux@afpa.fr', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$i0CwIJb0UHtgGVfw5dvpBusrD2IQuWITPK6Is5Wc2dn8SZPn2pHoG', 'Egregorion'),
(2, 'gregory.fourmaux@gmail.com', '[]', '$2y$13$ne0ReclQl5cw1IsN2Ulz1.vz01lI1sh22DY/3TImrP/MZiZ4OrRae', 'Gregorein');

-- --------------------------------------------------------

--
-- Structure de la table `user_boardgame`
--

CREATE TABLE `user_boardgame` (
  `user_id` int NOT NULL,
  `boardgame_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boardgame`
--
ALTER TABLE `boardgame`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boardgame_category`
--
ALTER TABLE `boardgame_category`
  ADD PRIMARY KEY (`boardgame_id`,`category_id`),
  ADD KEY `IDX_3E9DDF39B1A27A21` (`boardgame_id`),
  ADD KEY `IDX_3E9DDF3912469DE2` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6970EB0FB1A27A21` (`boardgame_id`),
  ADD KEY `IDX_6970EB0FA76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64986CC499D` (`pseudo`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- Index pour la table `user_boardgame`
--
ALTER TABLE `user_boardgame`
  ADD PRIMARY KEY (`user_id`,`boardgame_id`),
  ADD KEY `IDX_984156F9A76ED395` (`user_id`),
  ADD KEY `IDX_984156F9B1A27A21` (`boardgame_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boardgame`
--
ALTER TABLE `boardgame`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boardgame_category`
--
ALTER TABLE `boardgame_category`
  ADD CONSTRAINT `FK_3E9DDF3912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3E9DDF39B1A27A21` FOREIGN KEY (`boardgame_id`) REFERENCES `boardgame` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_6970EB0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_6970EB0FB1A27A21` FOREIGN KEY (`boardgame_id`) REFERENCES `boardgame` (`id`);

--
-- Contraintes pour la table `user_boardgame`
--
ALTER TABLE `user_boardgame`
  ADD CONSTRAINT `FK_984156F9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_984156F9B1A27A21` FOREIGN KEY (`boardgame_id`) REFERENCES `boardgame` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
