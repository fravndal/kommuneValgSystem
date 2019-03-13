-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13. Mar, 2019 15:52 PM
-- Tjener-versjon: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kommune`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `aktiver_bruker_passord_pollett`
--

CREATE TABLE `aktiver_bruker_passord_pollett` (
  `bruker_id` int(11) NOT NULL,
  `velg_hash` char(16) NOT NULL,
  `pollett` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `epost` varchar(50) NOT NULL,
  `passord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `rolle` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `aktivert` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `epost`, `passord`, `salt`, `rolle`, `admin`, `aktivert`) VALUES
(1, 'lqk@live.no', 'd3174744c6dc66f69e4de96d0de546c657bc165a99a7d5cf3dde67d3ea803a4f475efcc9c6a5af4808ff84ab2cd2b3873be5fe6b074f84dbae1910fc003cf3ab', '7b22549e6027eead4405a1336e7edd3d4a0358479cb975d809f028e573278f6fe76f64580e5b4630ebcbc5f054778099650abb630671742a32b7f69eec36945b', 'Leder', 1, 1),
(38, 'fredrik.ravndal@gmail.com', 'be51023d3f8a77ca5967670e24ac730b66db89634d517102bcc1bfee67ab5ac5e02c6e2ae8d909ba07ed2c2523d6cd004ae35c3a355af71bc9d3bdec4f82a812', '1efc3f62c20df2b6177b1ece3c1808e33a0a20d4b6a53007f4e14773d9ea557f22a4bd959eeee1b75b92c1cde3dbc2b56c4ce802b7abefbac38039afc891d04d', 'Leder', 0, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `bruker_info`
--

CREATE TABLE `bruker_info` (
  `bruker_id` int(11) NOT NULL,
  `navn` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `fodselnr` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` char(45) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postkode` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `bil` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `norskferd` enum('1','2','3','4','5') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataferd` enum('1','2','3','4','5') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dataark for tabell `bruker_info`
--

INSERT INTO `bruker_info` (`bruker_id`, `navn`, `fodselnr`, `adresse`, `city`, `postkode`, `telefon`, `bil`, `norskferd`, `dataferd`) VALUES
(38, 'Fredrik Ravndal', '03119338327', 'hofs 1', 'hone', '3517', '94665612', 'Bil og førerkort', '5', '5');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `cookie_logginn_autentisering`
--

CREATE TABLE `cookie_logginn_autentisering` (
  `bruker_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `cookie_logginn_autentisering`
--

INSERT INTO `cookie_logginn_autentisering` (`bruker_id`, `hash`) VALUES
(38, '6956a17232913985676ca59be5492b6f5f393e332202e9b9bfcefe0d43b21a9c362667fda6bcaebda29cc698d6aa246cd38d49b15d5277d542df8303e939087b');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `glemt_passord_pollett`
--

CREATE TABLE `glemt_passord_pollett` (
  `bruker_id` int(11) NOT NULL,
  `velg_hash` char(16) NOT NULL,
  `pollett` char(64) NOT NULL,
  `utløpt_dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `logginn_forsok`
--

CREATE TABLE `logginn_forsok` (
  `bruker_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `pollett_logginn_autentisering`
--

CREATE TABLE `pollett_logginn_autentisering` (
  `bruker_id` int(11) NOT NULL,
  `passord_hash` varchar(255) NOT NULL,
  `valg_hash` varchar(255) NOT NULL,
  `utløpt` int(11) NOT NULL DEFAULT '0',
  `utløpt_dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `soknad`
--

CREATE TABLE `soknad` (
  `id` int(10) NOT NULL,
  `navn` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `fodselnr` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` char(45) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postkode` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `bil` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `norskferd` enum('1','2','3','4','5') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataferd` enum('1','2','3','4','5') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dataark for tabell `soknad`
--

INSERT INTO `soknad` (`id`, `navn`, `fodselnr`, `adresse`, `city`, `postkode`, `telefon`, `email`, `bil`, `norskferd`, `dataferd`) VALUES
(1, 'Fredrik Ravndal', '03119338327', 'Hofsveine 1', 'Hønefoss', '3517', '94338186', 'lqk@live.no', 'Bil og førerkort', '5', '5'),
(2, 'Ola Putten', '01126445645', 'glova 1', 'Oslo', '4312', '84458745', 'olapb96@gmail.com', 'Bil og førerkort', '2', '1'),
(3, 'Ole Dahl', '05059398765', 'vear 1', 'Tønsberg', '3160', '84515684', 'olef93@gmail.com', 'Bil og førerkort', '3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiver_bruker_passord_pollett`
--
ALTER TABLE `aktiver_bruker_passord_pollett`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_epost` (`epost`);

--
-- Indexes for table `bruker_info`
--
ALTER TABLE `bruker_info`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `id_bruker` (`bruker_id`);

--
-- Indexes for table `cookie_logginn_autentisering`
--
ALTER TABLE `cookie_logginn_autentisering`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `glemt_passord_pollett`
--
ALTER TABLE `glemt_passord_pollett`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `logginn_forsok`
--
ALTER TABLE `logginn_forsok`
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `pollett_logginn_autentisering`
--
ALTER TABLE `pollett_logginn_autentisering`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `soknad`
--
ALTER TABLE `soknad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `soknad`
--
ALTER TABLE `soknad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `aktiver_bruker_passord_pollett`
--
ALTER TABLE `aktiver_bruker_passord_pollett`
  ADD CONSTRAINT `aktiver_bruker_passord_pollett_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `bruker_info`
--
ALTER TABLE `bruker_info`
  ADD CONSTRAINT `bruker_info_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `cookie_logginn_autentisering`
--
ALTER TABLE `cookie_logginn_autentisering`
  ADD CONSTRAINT `cookie_logginn_autentisering_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `glemt_passord_pollett`
--
ALTER TABLE `glemt_passord_pollett`
  ADD CONSTRAINT `glemt_passord_pollett_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `logginn_forsok`
--
ALTER TABLE `logginn_forsok`
  ADD CONSTRAINT `logginn_forsok_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `pollett_logginn_autentisering`
--
ALTER TABLE `pollett_logginn_autentisering`
  ADD CONSTRAINT `pollett_logginn_autentisering_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
