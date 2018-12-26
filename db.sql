-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Nov 27, 2018 at 05:31 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_kylear`
--

-- --------------------------------------------------------

--
-- Table structure for table `Gym`
--

CREATE TABLE `Gym` (
  `Gym_id` int(10) UNSIGNED NOT NULL,
  `Leader_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gym_team` int(10) UNSIGNED NOT NULL,
  `Gym_reg` int(10) UNSIGNED NOT NULL,
  `Gym_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Gym`
--

INSERT INTO `Gym` (`Gym_id`, `Leader_name`, `Gym_team`, `Gym_reg`, `Gym_type`) VALUES
(1, 'Hellboy', 2, 3, 'Fire'),
(2, 'Blake', 2, 1, 'Fire'),
(3, 'Flannery', 2, 3, 'Fire'),
(4, 'Sheldon', 19, 4, 'Rock'),
(5, 'Skyrim', 19, 3, 'Dragon'),
(6, 'ex-GF', 19, 3, 'Ice'),
(7, '\'Murica', 19, 5, 'Steel'),
(8, 'McGregor', 19, 1, 'Fighting'),
(9, 'Superman', 19, 2, 'Flying'),
(10, 'Kody', 19, 1, 'Poison');

-- --------------------------------------------------------

--
-- Table structure for table `Pokemon`
--

CREATE TABLE `Pokemon` (
  `Pok_id` int(10) UNSIGNED NOT NULL,
  `Pok_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pok_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Normal',
  `Pok_reg` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Pokemon`
--

INSERT INTO `Pokemon` (`Pok_id`, `Pok_name`, `Pok_type`, `Pok_reg`) VALUES
(1, 'Charizard', 'Fire', 1),
(3, 'Lugia', 'Flying', 2),
(4, 'Palkia', 'Dragon', 4),
(5, 'Sceptile', 'Grass', 3),
(6, 'Persian', 'Normal', 1),
(7, 'Wishiwashi', 'Water', 6),
(8, 'Nidoking', 'Fighting', 1),
(9, 'Exploud', 'Normal', 3),
(10, 'Cyndiquil', 'Fire', 2),
(11, 'Genesect', 'Bug', 5),
(12, 'Entei', 'Fire', 2),
(13, 'Hitmonlee', 'Fighting', 1),
(14, 'Onyx', 'Rock', 1),
(15, 'Arcanine', 'Fire', 1),
(16, 'Steelix', 'Steel', 2),
(18, 'Pikachu', 'Electric', 1),
(19, 'Dialga', 'Steel', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Region`
--

CREATE TABLE `Region` (
  `Reg_id` int(10) UNSIGNED NOT NULL,
  `Reg_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Region`
--

INSERT INTO `Region` (`Reg_id`, `Reg_name`) VALUES
(6, 'Alola'),
(3, 'Hoenn'),
(2, 'Johto'),
(1, 'Kanto'),
(4, 'Sinnoh'),
(5, 'Unova');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `Team_ID` int(10) UNSIGNED NOT NULL,
  `Mem_1` int(10) UNSIGNED NOT NULL,
  `Mem_2` int(10) UNSIGNED DEFAULT NULL,
  `Mem_3` int(10) UNSIGNED DEFAULT NULL,
  `Mem_4` int(10) UNSIGNED DEFAULT NULL,
  `Mem_5` int(10) UNSIGNED DEFAULT NULL,
  `Mem_6` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`Team_ID`, `Mem_1`, `Mem_2`, `Mem_3`, `Mem_4`, `Mem_5`, `Mem_6`) VALUES
(1, 1, 4, 8, 3, 7, 13),
(2, 1, 10, 12, 7, 15, 1),
(7, 3, 6, 5, 9, 14, 12),
(13, 6, 4, 11, 8, 7, 5),
(14, 19, 18, 16, 15, 14, 13),
(15, 1, 9, 16, 19, 4, 3),
(16, 10, 8, 12, 11, 14, 7),
(17, 9, 6, 11, 3, 12, 7),
(18, 3, 5, 10, 4, 11, 7),
(19, 4, 8, 11, 5, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Trainer`
--

CREATE TABLE `Trainer` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Home` int(10) UNSIGNED NOT NULL,
  `Team` int(10) UNSIGNED DEFAULT NULL,
  `Age` int(10) UNSIGNED NOT NULL,
  `Gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Trainer`
--

INSERT INTO `Trainer` (`ID`, `Name`, `Home`, `Team`, `Age`, `Gender`) VALUES
(1, 'Ash', 1, 1, 10, 'Male'),
(4, 'Sarah', 3, 13, 18, 'Female'),
(5, 'Edward', 3, 19, 21, 'Male'),
(6, 'Ashley', 3, 17, 30, 'Female'),
(7, 'Malinda', 3, 14, 47, 'Female'),
(8, 'James', 3, 18, 46, 'Male'),
(9, 'Nixxon', 3, 15, 19, 'Male'),
(10, 'Marshall', 3, 16, 56, 'Male'),
(11, 'Hillary', 3, 7, 25, 'Female'),
(12, 'Donald', 3, 2, 33, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Gym`
--
ALTER TABLE `Gym`
  ADD PRIMARY KEY (`Gym_id`),
  ADD KEY `Gym_team` (`Gym_team`),
  ADD KEY `Gym_reg` (`Gym_reg`);

--
-- Indexes for table `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD PRIMARY KEY (`Pok_id`),
  ADD KEY `Pok_reg` (`Pok_reg`);

--
-- Indexes for table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`Reg_id`),
  ADD UNIQUE KEY `Reg_name` (`Reg_name`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Mem_1` (`Mem_1`),
  ADD KEY `Mem_2` (`Mem_2`),
  ADD KEY `Mem_3` (`Mem_3`),
  ADD KEY `Mem_4` (`Mem_4`),
  ADD KEY `Mem_5` (`Mem_5`),
  ADD KEY `Mem_6` (`Mem_6`);

--
-- Indexes for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Home` (`Home`),
  ADD KEY `Team` (`Team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Gym`
--
ALTER TABLE `Gym`
  MODIFY `Gym_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Pokemon`
--
ALTER TABLE `Pokemon`
  MODIFY `Pok_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Region`
--
ALTER TABLE `Region`
  MODIFY `Reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `Team_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Trainer`
--
ALTER TABLE `Trainer`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Gym`
--
ALTER TABLE `Gym`
  ADD CONSTRAINT `Gym_ibfk_1` FOREIGN KEY (`Gym_team`) REFERENCES `Teams` (`Team_ID`),
  ADD CONSTRAINT `Gym_ibfk_2` FOREIGN KEY (`Gym_reg`) REFERENCES `Region` (`Reg_id`);

--
-- Constraints for table `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD CONSTRAINT `Pokemon_ibfk_1` FOREIGN KEY (`Pok_reg`) REFERENCES `Region` (`Reg_id`);

--
-- Constraints for table `Teams`
--
ALTER TABLE `Teams`
  ADD CONSTRAINT `Teams_ibfk_1` FOREIGN KEY (`Mem_1`) REFERENCES `Pokemon` (`Pok_id`),
  ADD CONSTRAINT `Teams_ibfk_2` FOREIGN KEY (`Mem_2`) REFERENCES `Pokemon` (`Pok_id`),
  ADD CONSTRAINT `Teams_ibfk_3` FOREIGN KEY (`Mem_3`) REFERENCES `Pokemon` (`Pok_id`),
  ADD CONSTRAINT `Teams_ibfk_4` FOREIGN KEY (`Mem_4`) REFERENCES `Pokemon` (`Pok_id`),
  ADD CONSTRAINT `Teams_ibfk_5` FOREIGN KEY (`Mem_5`) REFERENCES `Pokemon` (`Pok_id`),
  ADD CONSTRAINT `Teams_ibfk_6` FOREIGN KEY (`Mem_6`) REFERENCES `Pokemon` (`Pok_id`);

--
-- Constraints for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD CONSTRAINT `Trainer_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `Teams` (`Team_ID`),
  ADD CONSTRAINT `Trainer_ibfk_2` FOREIGN KEY (`Home`) REFERENCES `Region` (`Reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
