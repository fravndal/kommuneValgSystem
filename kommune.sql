-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25. Apr, 2019 23:25 PM
-- Server-versjon: 5.7.22-log
-- PHP Version: 7.1.9

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

--
-- Dataark for tabell `aktiver_bruker_passord_pollett`
--

INSERT INTO `aktiver_bruker_passord_pollett` (`bruker_id`, `velg_hash`, `pollett`) VALUES
(40, '08c96012654d7585', 'd57f92ed6d34acf437a757d6afcf545854ba4ff74ccc6f8ccc8b637934eeec40');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ansatt`
--

CREATE TABLE `ansatt` (
  `id` int(10) NOT NULL,
  `kretsNr` int(10) NOT NULL,
  `navn` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fodselsaar` int(4) NOT NULL,
  `leder` tinyint(1) DEFAULT NULL,
  `nestLeder` tinyint(1) DEFAULT NULL,
  `sekreter` tinyint(1) DEFAULT NULL,
  `vaktmester` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dataark for tabell `ansatt`
--

INSERT INTO `ansatt` (`id`, `kretsNr`, `navn`, `telefon`, `email`, `fodselsaar`, `leder`, `nestLeder`, `sekreter`, `vaktmester`) VALUES
(1, 1, 'Fredrik Hulaas', '98821561', 'hønefoss@gamil.com', 1993, 1, 0, 0, 0),
(2, 2, 'Fredrik Ravndal', '98821562', 'hønefoss1@hot.com', 1994, 0, 1, 0, 1),
(3, 2, 'Ole Kristian Gran', '98821563', 'hønefoss2@live.com', 1995, 0, 1, 0, 0),
(4, 3, 'Håvard Betten', '98821564', 'hønefos3s@msn.com', 1996, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `epost` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passord` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `rolle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `aktivert` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `epost`, `passord`, `salt`, `rolle`, `admin`, `aktivert`) VALUES
(1, 'lqk@live.no', 'd3174744c6dc66f69e4de96d0de546c657bc165a99a7d5cf3dde67d3ea803a4f475efcc9c6a5af4808ff84ab2cd2b3873be5fe6b074f84dbae1910fc003cf3ab', '7b22549e6027eead4405a1336e7edd3d4a0358479cb975d809f028e573278f6fe76f64580e5b4630ebcbc5f054778099650abb630671742a32b7f69eec36945b', 'Leder', 1, 1),
(38, 'fredrik.ravndal@gmail.com', '421ae6259578875ce33f1c058935b2a1cab3a62198e8409f42b5979204472d226136aa45b2b7e3136ef1258f07861d9666dbdabca73e975fdce0f76ce3f9c9f6', '1efc3f62c20df2b6177b1ece3c1808e33a0a20d4b6a53007f4e14773d9ea557f22a4bd959eeee1b75b92c1cde3dbc2b56c4ce802b7abefbac38039afc891d04d', 'Leder', 0, 1),
(39, 'lqk1337@gmail.com', '943e6a25489a073b8689c83cf0a69fdb2c4edf352cfc877746c2fc9c18065ede12084e9669045769add73c2f16609ba35075799ff053132421f9328d30af17c3', '51075213b1973314908826f02185a06c10519eeaf309e4a9f11e7d9ca04d2a1ddd325d47a8f7fa510aaff4bd4d2f10eb361ca19e826be325ae06fd37379f34bd', 'Leder', 1, 1),
(40, 'olapb96@gmail.com', '5b88c3d0552a0a78834d443c267f70b5d3f6c6c2fdb84abd6f7ff0062cb0625fea0656fb9339fc4acd83d3d9fb703e93b215721ff1f565b1d06473873191dc8d', 'f5035aba6adf97d08b521b6d215472a9c5ee052b977a75ff06877a979cac0f6892310c5f3dbeafce4a0dbdb23638c02e23ae5053774a228eac07ab770284a70b', 'Leder', 0, 0);

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
(38, 'Fredrik Ravndal', '03119338327', 'hofs 1', 'hone', '3517', '94665612', 'Bil og førerkort', '5', '5'),
(39, 'Henrik Kulaseng', '03119345345', 'hofs1', 'Hønefoss', '3164', '32435465', 'Bil og førerkort', '1', '1'),
(40, 'Ola Putten', '01126445645', 'glova 1', 'Oslo', '4312', '84458745', 'Bil og førerkort', '2', '1');

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
(1, '417c94b5aed34abfbc37e00b75b93fe0535f827c2d9b950ca4e559dec1facd3420c5ee7e5dc87221cacd2010860d4cefa9c61bf370b002e8471b2b1a9d850a1b');

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

--
-- Dataark for tabell `glemt_passord_pollett`
--

INSERT INTO `glemt_passord_pollett` (`bruker_id`, `velg_hash`, `pollett`, `utløpt_dato`) VALUES
(39, '46815bba21f35303', 'a27353249c06fbb3142625187fea17434107b8a0050747e62c4cdc040baa645b', '2019-03-22 12:59:53');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `image_table`
--

CREATE TABLE `image_table` (
  `img_id` int(11) NOT NULL,
  `bruker_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
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
-- Tabellstruktur for tabell `opplæringsmateriell`
--

CREATE TABLE `opplæringsmateriell` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Fredrik Ravndal', '03119338327', 'Hofsveine 1', 'Hønefoss', '3517', '94338186', 'lqk@live.no', 'Bil og førerkort', '5', '5');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `stemmesteder`
--

CREATE TABLE `stemmesteder` (
  `id` int(10) NOT NULL,
  `kretsNr` int(10) NOT NULL,
  `sted` char(55) COLLATE utf8_unicode_ci NOT NULL,
  `stemmeBer` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kretsnr` (`kretsNr`);

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
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`img_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opplæringsmateriell`
--
ALTER TABLE `opplæringsmateriell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
