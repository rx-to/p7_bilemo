-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 juin 2022 à 21:51
-- Version du serveur : 10.4.10-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bilemo`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `zip_code`, `city`, `email`, `phone_number`, `password`, `roles`) VALUES
(1, 'FNAC', 'Les Allées Provençales, 160 Av. Giuseppe Verdi', '13100', 'Aix-en-Provence', 'aix-en-provence@fnac.tm.fr', '+33825020020', '$2y$10$NaaWbcxVeGW7/kivpAS3EOm7DEFnJjQAnASEluDUDdav6Pl7dogeO', ''),
(2, 'Darty', ' Centre commercial Lillenium, 2 Rue du Faubourg des Postes', '59000', 'Lille', 'lille@darty.com', '+33892011010', '$2y$13$yUX51cW2bGg63VPSSKVwH.AfInwPTK/JtC.SrgiazBlYGk1P.wap6', ''),
(4, 'Orange ', '93 Rue Sainte-Catherine', '33000', 'Bordeaux', 'bordeaux@orange.fr', '+33969370364', '$2y$10$Lhm3zJ14abSMmSEPgxYsiOyDYTS2K2bBAFuJIKeTyc1p5RWbB2G/e', ''),
(5, 'Virgin', '85 Rue de la Verdière', '51000', 'Reims', 'reims@virgin.fr', '+33485784589', '$2y$10$B1eiQtlo9dvJJbbyp6IaNuULrwUIh/RyNFfzz/sIyPRpRAmKksh1G', '');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220426220127', '2022-04-26 22:01:35', 344),
('DoctrineMigrations\\Version20220503215504', '2022-05-03 21:55:13', 204),
('DoctrineMigrations\\Version20220507173435', '2022-05-07 17:34:48', 92),
('DoctrineMigrations\\Version20220520183007', '2022-05-20 18:30:14', 68),
('DoctrineMigrations\\Version20220603165036', '2022-06-03 16:50:52', 263);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `megapixels` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `operating_system`, `megapixels`, `brand`, `color`, `storage`, `price`) VALUES
(1, 'Galaxy S8', 'Android', 8, 'Samsung', 'noir', 64, 800),
(2, 'iPhone 11', 'iOS', 10, 'Apple', 'rouge', 32, 820),
(3, 'P50', 'Android', 40, 'Huawei', 'or', 512, 450),
(4, 'A1', 'Android', 12, 'Samsung', 'or', 32, 305),
(5, 'Nokia', 'Android', 40, 'Huawei', 'or', 512, 499),
(6, 'Curve', 'BlackBerry OS', 5, 'BlackBerry', 'noir', 64, 155),
(7, 'iPhone XR', 'iOS', 12, 'Apple', 'noir', 64, 930),
(8, 'Galaxy M', 'Android', 12, 'Samsung', 'noir', 32, 560),
(9, 'Y52', 'Android', 40, 'Wiko', 'noir', 16, 420),
(10, 'XR20', 'Android', 40, 'Nokia', 'or', 16, 458),
(11, 'Redmi Note 11 Pro+ 5G', 'Xiaomi', 40, 'Huawei', 'blanc', 512, 590);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_title` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `surname`, `name`, `email`, `address`, `zip_code`, `city`, `phone_number`, `personal_title`, `birthdate`, `customer_id`) VALUES
(1, 'ESPIASSE', 'François', 'franco1s.espiassec@gmail.com', '9 Bd Central', '13014', 'Marseille', '0654785479', 'M.', '1999-08-17', 1),
(3, 'FERRI', 'Jean-Marc', 'jmferri@gmail.com', '85 Allée de la Rose', '33300', 'Bordeaux', '0656421356', 'M.', '1956-02-07', 4),
(4, 'DUPONT', 'Alfred', 'alfreddupont@gmail.com', '3 Rue de la Liberté', '87000', 'Limoges', '0788461356', 'M.', '1920-05-01', 1),
(5, 'LUCIANI', 'Marie', 'mluciani@gmail.fr', '9 Rue Fesch', '20000', 'Ajaccio', '0789547855', 'Mme', '1995-07-11', 2),
(9, 'LHILA', 'Salima', 'lhilasalima@orange.fr', '45 Route de la Rose', '31100', 'Toulouse', '0645874598', 'Mme', '1920-05-01', 4),
(10, 'THIVEL', 'Hugo', 'thithi@live.fr', '85 Bouvelard Napoléon', '83000', 'Toulon', '0645454887', 'M.', '1999-02-26', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_81398E09E7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D6499395C3F3` (`customer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6499395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
