-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2018 at 12:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `dDebut` datetime NOT NULL,
  `dFin` datetime NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `dDebut`, `dFin`, `eleve_id`, `session_id`, `matiere_id`) VALUES
(4, '2018-03-08 07:30:00', '2018-03-08 09:00:00', 5, 1, 3),
(5, '2018-03-20 09:30:00', '2018-03-20 11:30:00', 5, 1, 1),
(6, '2018-03-05 07:30:00', '2018-03-05 09:30:00', 5, 1, 2),
(7, '2018-05-02 07:30:00', '2018-05-02 09:00:00', 6, 1, 3),
(8, '2018-05-02 09:05:00', '2018-05-02 11:40:00', 6, 1, 4),
(9, '2018-04-29 12:30:00', '2018-04-29 14:10:00', 6, 1, 1),
(10, '2018-04-28 07:30:00', '2018-04-28 09:10:00', 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `salle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `niveau_id`, `serie_id`, `salle_id`) VALUES
(1, 1, NULL, 1),
(2, 1, NULL, 3),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quartier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateIn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `nom`, `quartier`, `ville`, `telephone`, `mail`, `siteweb`, `bp`, `dateIn`) VALUES
(1, 'Collège Mirabelle', 'Mikono', 'Yaoundé', 694030591, 'mirabelle.college@yahoo.fr', NULL, '512 Yaoundé', '2017-12-24'),
(2, 'Lycée Technique de Koum', 'Bibine', 'Douala', 2147483647, 'ltk-bibine@yahoo.fr', NULL, '71548', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `devoirs`
--

CREATE TABLE `devoirs` (
  `id` int(11) NOT NULL,
  `dateDevoir` date NOT NULL,
  `type` int(11) NOT NULL,
  `dateRemiseNotes` date NOT NULL,
  `college_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `devoirs`
--

INSERT INTO `devoirs` (`id`, `dateDevoir`, `type`, `dateRemiseNotes`, `college_id`, `classe_id`) VALUES
(1, '2018-01-08', 1, '2018-01-18', 1, 3),
(2, '2017-12-18', 2, '2018-01-10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sanction` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dated` date NOT NULL,
  `session_id` int(11) NOT NULL,
  `eleve_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `libelle`, `description`, `sanction`, `dated`, `session_id`, `eleve_id`) VALUES
(1, 'Eleve vacataire', 'De nombreuses absences observées. L\'élève est reconnu comme absentéiste et récidiviste', '3 jours d\'exclusion avec corvée à partir du 15 janvier 2017', '2017-01-03', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

CREATE TABLE `eleves` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `date_n` date NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `sexe`, `date_n`, `slug`, `photo`, `parent_id`) VALUES
(5, 'tchafack', 'duhamel', 'H', '1995-01-11', 'tchafack-duhamel', 'pupil-avatar.png', 25),
(6, 'Tabou', 'Jack', 'H', '2007-03-22', 'tabou-jack', 'avatar.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `elevesclasses`
--

CREATE TABLE `elevesclasses` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elevesclasses`
--

INSERT INTO `elevesclasses` (`id`, `session_id`, `college_id`, `eleve_id`, `classe_id`) VALUES
(1, 1, 1, 5, 1),
(2, 1, 2, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` int(11) NOT NULL,
  `avance` decimal(10,2) NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datePayment` date NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `avance`, `detail`, `datePayment`, `eleve_id`, `session_id`) VALUES
(1, '50000.00', 'Tranche 1 + avance tranche 2', '2018-02-07', 5, 1),
(2, '10000.00', 'Avance 2 tranche 2', '2018-02-14', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(11) NOT NULL,
  `matiere` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id`, `matiere`) VALUES
(4, 'Anglais'),
(3, 'Français'),
(1, 'Mathématiques'),
(2, 'Physique');

-- --------------------------------------------------------

--
-- Table structure for table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `niveau` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `niveaux`
--

INSERT INTO `niveaux` (`id`, `niveau`) VALUES
(2, '1ere'),
(1, '6e');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `devoir_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `eleve_id` int(11) NOT NULL,
  `note` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `devoir_id`, `matiere_id`, `eleve_id`, `note`) VALUES
(1, 1, 1, 5, 10),
(2, 2, 3, 5, 18),
(3, 1, 3, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `nom`, `username`, `password`, `enabled`, `prenom`, `ville`, `telephone`, `email`, `username_canonical`, `email_canonical`, `salt`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(25, 'Tchafack', 'theo', 'AKROtEGuNI6IiSwcNHbYKU55Dq5r/eAXeT1iaUNimRDa4QW2MCj7UDny3tuC+XNvRlooT9a/vjGkqONXeVg8Qg==', 1, 'Theo', 'Douala', '6974465', '', 'theo', '', 'Gt2zWL3Y0YpzHaSjIdwAE.pey3mlGm9iYtgnztpEeig', '2018-05-02 12:39:20', NULL, NULL, 'a:1:{i:0;s:11:\"ROLE_PARENT\";}'),
(28, 'Admin', 'admin1', 'H9WxbdHBHdz4Hl0UNQkxDD03yFGIhBD8oypNScwTUOA6BXlKPMFJAT/1ZQcNqt5bHt61NTs58pMjbmQ9oeINdA==', 1, 'Ad', 'Pmol', '25326256', '', 'admin1', '', 'CtiMHopNVrY9Efp.P5UVfM9KS.Xl8pTKGjYWcO8/nbw', '2018-05-02 12:40:05', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(30, 'Super', 'super', 'ki+uBTcpRcfkgJJge0cqac/WW7UYv1NTPAq8rNAnwM5j4VmfGBugpdlIsYwc4IclHTtC4DN2zHLR+fICJElufg==', 1, 'Admin', 'All', '0', '', 'super', '', 't64GVbiGGFGv8kCzECnSA6iHRHkHx/huqFJmSK5RaHM', NULL, NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE `plannings` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `effectif` int(11) NOT NULL,
  `prixScolarite` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `path`, `titulaire`, `session_id`, `college_id`, `classe_id`, `effectif`, `prixScolarite`) VALUES
(3, '6bd7e61e6a6573ad9e4eb1f89d203ffb.png', 'Bendal', 1, 1, 1, 50, '110000.00'),
(4, '0e476c35703a890c2091fe95aee54058.png', 'Tahoo', 1, 2, 3, 45, '215000.00');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `salle` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id`, `salle`) VALUES
(3, '1'),
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `serie` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `serie`) VALUES
(1, 'A4'),
(3, 'A4 Al'),
(2, 'A4 Es');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `debut`, `fin`) VALUES
(1, '2016-10-10', '2017-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'jack', 'jack', 'jack@sv.net', 'jack@sv.net', 1, 'Q1FXTFWn94ug3h/lYQDKF0C5Cudg/TliB/u8gK9C8bU', 'xNVNep0OxeQeBFjlVLNZRZGQRCGMSda18gKDic1kibB9zjpcPm6i7Aw0xlO2KYueTzVsw1MamQZhVkw0ld8fjA==', '2018-02-05 18:50:41', NULL, NULL, 'a:0:{}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F9C0EFFFA6CC7B2` (`eleve_id`),
  ADD KEY `IDX_F9C0EFFF613FECDF` (`session_id`),
  ADD KEY `IDX_F9C0EFFFF46CD258` (`matiere_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2ED7EC5B3E9C81` (`niveau_id`),
  ADD KEY `IDX_2ED7EC5D94388BD` (`serie_id`),
  ADD KEY `IDX_2ED7EC5DC304035` (`salle_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3C781006770124B2` (`college_id`),
  ADD KEY `IDX_3C7810068F5EA509` (`classe_id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AD1D5CD8613FECDF` (`session_id`),
  ADD KEY `IDX_AD1D5CD8A6CC7B2` (`eleve_id`);

--
-- Indexes for table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_383B09B1989D9B62` (`slug`),
  ADD KEY `IDX_383B09B1727ACA70` (`parent_id`);

--
-- Indexes for table `elevesclasses`
--
ALTER TABLE `elevesclasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_408E32C0613FECDF` (`session_id`),
  ADD KEY `IDX_408E32C0770124B2` (`college_id`),
  ADD KEY `IDX_408E32C0A6CC7B2` (`eleve_id`),
  ADD KEY `IDX_408E32C08F5EA509` (`classe_id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BBCA0599A6CC7B2` (`eleve_id`),
  ADD KEY `IDX_BBCA0599613FECDF` (`session_id`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D9773D29014574A` (`matiere`);

--
-- Indexes for table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_56F771A04BDFF36B` (`niveau`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_11BA68CC583534E` (`devoir_id`),
  ADD KEY `IDX_11BA68CF46CD258` (`matiere_id`),
  ADD KEY `IDX_11BA68CA6CC7B2` (`eleve_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FD501D6A92FC23A8` (`username_canonical`);

--
-- Indexes for table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4F04019D613FECDF` (`session_id`),
  ADD KEY `IDX_4F04019D770124B2` (`college_id`),
  ADD KEY `IDX_4F04019D8F5EA509` (`classe_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_799D45AA4E977E5C` (`salle`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3A10012DAA3A9334` (`serie`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `devoirs`
--
ALTER TABLE `devoirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `elevesclasses`
--
ALTER TABLE `elevesclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `FK_F9C0EFFF613FECDF` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `FK_F9C0EFFFA6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `FK_F9C0EFFFF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `FK_2ED7EC5B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `FK_2ED7EC5D94388BD` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `FK_2ED7EC5DC304035` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`);

--
-- Constraints for table `devoirs`
--
ALTER TABLE `devoirs`
  ADD CONSTRAINT `FK_3C781006770124B2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `FK_3C7810068F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `FK_AD1D5CD8613FECDF` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `FK_AD1D5CD8A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Constraints for table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `FK_383B09B1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Constraints for table `elevesclasses`
--
ALTER TABLE `elevesclasses`
  ADD CONSTRAINT `FK_408E32C0613FECDF` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `FK_408E32C0770124B2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `FK_408E32C08F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `FK_408E32C0A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Constraints for table `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `FK_BBCA0599613FECDF` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `FK_BBCA0599A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_11BA68CA6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `FK_11BA68CC583534E` FOREIGN KEY (`devoir_id`) REFERENCES `devoirs` (`id`),
  ADD CONSTRAINT `FK_11BA68CF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`);

--
-- Constraints for table `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `FK_4F04019D613FECDF` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `FK_4F04019D770124B2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `FK_4F04019D8F5EA509` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
