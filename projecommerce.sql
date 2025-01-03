-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 jan. 2025 à 00:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('SYSTEM', 'SYSTEM');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `quantiteStock` int(11) NOT NULL DEFAULT 0,
  `categorie` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `description`, `prix`, `quantiteStock`, `categorie`, `image`) VALUES
(1, 'Ordinateur Dell', 'PC portable performant avec Intel Core i5, 8GB RAM, 256GB SSD.', 749.99, 10, 1, 'images/ordi1.jpg'),
(2, 'HP Gaming', 'Ordinateur gamer avec Nvidia GTX 1650, Intel Core i7, 16GB RAM.', 1199.99, 5, 1, 'images/ordi2.jpg'),
(3, 'MacBook', 'Laptop ultra-fin avec puce Apple M2, 8GB RAM, 512GB SSD.', 1299.99, 8, 1, 'images/ordi3.jpg'),
(4, 'Lenovo ThinkPad', 'PC professionnel avec Intel Core i7, 16GB RAM, 1TB SSD.', 1599.99, 3, 1, 'images/ordi4.jpg'),
(5, 'Asus ROG Zephyrus', 'Ordinateur gaming haut de gamme avec RTX 3060, Ryzen 7, 16GB RAM.', 1799.99, 4, 1, 'images/ordi5.jpg'),
(6, 'Acer', 'Laptop pour usage quotidien avec AMD Ryzen 5, 8GB RAM, 512GB SSD.', 649.99, 15, 1, 'images/ordi6.jpg'),
(7, 'Tablette Samsung Galaxy Tab A7', 'Tablette 10.4 pouces avec écran WUXGA+ et 32GB de stockage.', 229.99, 15, 2, 'images/galaxy_tab_a7.jpg'),
(8, 'Apple iPad 10.2', 'iPad 10.2 pouces avec puce A13 Bionic, 64GB et compatibilité Apple Pencil.', 329.99, 12, 2, 'images/ipad_10_2.jpg'),
(9, 'Lenovo Tab M10', 'Tablette 10.1 pouces HD avec processeur octa-core et 64GB de stockage.', 189.99, 20, 2, 'images/lenovo_tab_m10.jpg'),
(10, 'Huawei MatePad 11', 'Tablette 11 pouces avec écran 120 Hz et 128GB de stockage.', 399.99, 8, 2, 'images/huawei_matepad_11.jpg'),
(11, 'Microsoft Surface Go 3', 'Tablette 10.5 pouces avec processeur Intel Pentium Gold et Windows 11.', 499.99, 5, 2, 'images/surface_go_3.jpg'),
(12, 'Xiaomi Pad 5', 'Tablette 11 pouces avec processeur Snapdragon 860 et 128GB de stockage.', 349.99, 10, 2, 'images/xiaomi_pad_5.jpg'),
(13, 'iPhone 13', 'Smartphone Apple avec écran Super Retina XDR de 6.1 pouces, 128GB de stockage.', 899.99, 20, 3, 'images/iphone_13.jpg'),
(14, 'Samsung Galaxy S21', 'Smartphone avec écran AMOLED 6.2 pouces, triple caméra et 128GB de stockage.', 799.99, 25, 3, 'images/galaxy_s21.jpg'),
(15, 'Google Pixel 6', 'Smartphone avec écran OLED de 6.4 pouces et processeur Google Tensor.', 649.99, 18, 3, 'images/pixel_6.jpg'),
(16, 'OnePlus 9 Pro', 'Smartphone avec écran Fluid AMOLED de 6.7 pouces, 12GB RAM et 256GB stockage.', 969.99, 10, 3, 'images/oneplus_9_pro.jpg'),
(17, 'Xiaomi Mi 11 Lite', 'Smartphone ultra fin avec écran AMOLED 6.55 pouces et 128GB de stockage.', 399.99, 30, 3, 'images/mi_11_lite.jpg'),
(18, 'Sony Xperia 5 III', 'Smartphone compact avec écran OLED de 6.1 pouces et triple caméra Zeiss.', 899.99, 12, 3, 'images/xperia_5_iii.jpg'),
(20, 'ordinateur  test test', 'ordinateur', 4000.00, 5, 1, 'images/ordi3.jpg'),
(22, 'ordinateur', 'ORDINATEUR PLUS', 2345.00, 2, 1, 'images/ordi1.jpg'),
(23, 'ordinateur PLUS PLUS', 'ordinateur plus', 2345.00, 6, 1, 'images/ordi4.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
