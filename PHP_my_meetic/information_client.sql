-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2018 at 03:35 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_meetic_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `information_client`
--

CREATE TABLE `information_client` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information_client`
--

INSERT INTO `information_client` (`id_membre`, `nom`, `prenom`, `date_de_naissance`, `sexe`, `ville`, `email`, `password`, `active`) VALUES
(5, 'Gasparac', 'Nico', 25, 'Homme', 'Lyon', 'Gaspa@hotmail.fr', 'Lolilol37', 1),
(6, 'heuline', 'flo', 23, 'homme', 'grenoble', 'flo@hotmail.fr', 'Lolilol37', 1),
(43, 'desfontaines', 'rene', 48, 'homme', 'Lille', 'quentouz@hotmail.fr', 'pd', 1),
(49, 'bonnebouche', 'victor', 24, 'femme', 'paris', 'victor@hotmail.fr', 'Lolilol37', 1),
(50, 'caprio', 'yoann', 18, 'homme', 'Lyon', 'yoyo@hotmail.fr', 'Lolilol37', 1),
(51, 'Ribah', 'Romain', 34, 'homme', 'Lyon', 'ribah@hotmail.fr', 'Looooooool37', 1),
(52, 'Wagner', 'Jolan', 50, 'homme', 'Berlin', 'jolan@hotmail.fr', 'Lolilol37', 1),
(54, 'Maison', 'Maxime', 19, 'Autre', 'Lyon', 'max@hotmail.fr', 'Lolilol37', 1),
(55, 'Chapel', 'Kevin', 19, 'homme', 'Lyon', 'kevin@hotmail.fr', 'Lolilol37', 1),
(56, 'martinot', 'Vivien', 23, 'autre', 'Lyon', 'vivien@hotmail.fr', 'Lolilol37', 1),
(57, 'trlololol', 'terry', 21, 'Femme', 'marseille', 'terry@hotmail.fr', 'Lolilol37', 1),
(68, 'Margotin', 'Juju', 27, 'Homme', 'tours', 'juju@hotmail.fr', 'Lolilol37', 1),
(69, 'blohorn', 'Barbara', 25, 'Femme', 'Villeurbanne', 'barbara.bloblo@hotmail.fr', '1Raphtordu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information_client`
--
ALTER TABLE `information_client`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information_client`
--
ALTER TABLE `information_client`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
