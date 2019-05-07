-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07. Mai, 2019 18:13 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ansatt`
--

CREATE TABLE `ansatt` (
  `bruker_id` int(11) NOT NULL,
  `navn` char(100) COLLATE utf8mb4_bin NOT NULL,
  `fodselnr` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `adresse` char(45) COLLATE utf8mb4_bin NOT NULL,
  `city` char(55) COLLATE utf8mb4_bin DEFAULT NULL,
  `postkode` varchar(4) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` char(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefon` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `kretsNr` int(10) NOT NULL,
  `rolle` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `bil` char(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `norskferd` enum('1','2','3','4','5') COLLATE utf8mb4_bin DEFAULT NULL,
  `dataferd` enum('1','2','3','4','5') COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `epost` varchar(50) NOT NULL,
  `passord` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `aktivert` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `epost`, `passord`, `salt`, `admin`, `aktivert`) VALUES
(1, 'fredrik.ravndal@gmail.com', '0c84db3c2b9db07ef190c2f14b841be60c28a57cc4e98bae18c82b15eb45cda624f111cece30489b94141e434aa5e6f36aeb831826203cc76ffce4ea1c203b5f', '1efc3f62c20df2b6177b1ece3c1808e33a0a20d4b6a53007f4e14773d9ea557f22a4bd959eeee1b75b92c1cde3dbc2b56c4ce802b7abefbac38039afc891d04d', 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `cookie_logginn_autentisering`
--

CREATE TABLE `cookie_logginn_autentisering` (
  `bruker_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `glemt_passord_pollett`
--

CREATE TABLE `glemt_passord_pollett` (
  `bruker_id` int(11) NOT NULL,
  `velg_hash` char(16) NOT NULL,
  `pollett` char(64) NOT NULL,
  `utløpt_dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `image_table`
--

CREATE TABLE `image_table` (
  `img_id` int(11) NOT NULL,
  `bruker_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `logginn_forsok`
--

CREATE TABLE `logginn_forsok` (
  `bruker_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `opplæringsmateriell`
--

CREATE TABLE `opplæringsmateriell` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rolle`
--

CREATE TABLE `rolle` (
  `rolle` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dataark for tabell `rolle`
--

INSERT INTO `rolle` (`rolle`) VALUES
('leder'),
('nestLeder'),
('sekreter'),
('vaktmester');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `soknad`
--

CREATE TABLE `soknad` (
  `id` int(10) NOT NULL,
  `navn` char(150) COLLATE utf8mb4_bin NOT NULL,
  `fodselnr` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `adresse` char(45) COLLATE utf8mb4_bin NOT NULL,
  `city` char(55) COLLATE utf8mb4_bin DEFAULT NULL,
  `postkode` varchar(4) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefon` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `email` char(150) COLLATE utf8mb4_bin NOT NULL,
  `bil` char(25) COLLATE utf8mb4_bin DEFAULT NULL,
  `norskferd` enum('1','2','3','4','5') COLLATE utf8mb4_bin DEFAULT NULL,
  `dataferd` enum('1','2','3','4','5') COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `stemmesteder`
--

CREATE TABLE `stemmesteder` (
  `id` int(10) NOT NULL,
  `kretsNr` int(10) NOT NULL,
  `sted` char(55) COLLATE utf8mb4_bin NOT NULL,
  `stemmeBer` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dataark for tabell `stemmesteder`
--

INSERT INTO `stemmesteder` (`id`, `kretsNr`, `sted`, `stemmeBer`) VALUES
(1, 1, 're', 1000),
(2, 2, 'stokke', 1200),
(3, 3, 'tønsberg', 25000),
(4, 4, 'våle', 589);

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
-- Indexes for table `ansatt`
--
ALTER TABLE `ansatt`
  ADD PRIMARY KEY (`bruker_id`),
  ADD KEY `fk_kretsnr` (`kretsNr`);

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_epost` (`epost`);

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
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `logginn_forsok`
--
ALTER TABLE `logginn_forsok`
  ADD KEY `bruker_id` (`bruker_id`);

--
-- Indexes for table `opplæringsmateriell`
--
ALTER TABLE `opplæringsmateriell`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `stemmesteder`
--
ALTER TABLE `stemmesteder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kretsNr` (`kretsNr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ansatt`
--
ALTER TABLE `ansatt`
  MODIFY `bruker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opplæringsmateriell`
--
ALTER TABLE `opplæringsmateriell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soknad`
--
ALTER TABLE `soknad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stemmesteder`
--
ALTER TABLE `stemmesteder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `aktiver_bruker_passord_pollett`
--
ALTER TABLE `aktiver_bruker_passord_pollett`
  ADD CONSTRAINT `aktiver_bruker_passord_pollett_ibfk_1` FOREIGN KEY (`bruker_id`) REFERENCES `brukere` (`id`);

--
-- Begrensninger for tabell `ansatt`
--
ALTER TABLE `ansatt`
  ADD CONSTRAINT `fk_kretsnr` FOREIGN KEY (`kretsNr`) REFERENCES `stemmesteder` (`kretsNr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
