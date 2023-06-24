-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 10:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educo`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `Ad_ID` char(36) NOT NULL,
  `Package` int(11) DEFAULT NULL,
  `User_ID` char(36) DEFAULT NULL,
  `Admin_ID` char(36) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Verification` char(1) DEFAULT NULL,
  `Expiration` date DEFAULT NULL,
  `Directory` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `Game_ID` char(36) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `GType` varchar(10) DEFAULT NULL,
  `Game_Directory` varchar(200) DEFAULT NULL,
  `Developer_ID` char(36) DEFAULT NULL,
  `Admin_ID` char(36) DEFAULT NULL,
  `How_to_play` varchar(800) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Verification` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`Game_ID`, `Name`, `Description`, `GType`, `Game_Directory`, `Developer_ID`, `Admin_ID`, `How_to_play`, `Rating`, `Verification`) VALUES
('g0000000-0000-0000-0000-000000000000', 'DEFAULT', 'DEFUALT', 'DEFAULT', 'games/approved/g0000000-0000-0000-0000-000000000000', 'u0000000-0000-0000-0000-000000000000', 'u0000000-0000-0000-0000-000000000000', 'DAFAULT', 0, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `game_scoreboard`
--

CREATE TABLE `game_scoreboard` (
  `ID` int(11) NOT NULL,
  `Game_ID` char(36) NOT NULL DEFAULT 'g0000000-0000-0000-0000-000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `ID` int(11) NOT NULL,
  `Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE `subscribed` (
  `User_ID` char(36) NOT NULL,
  `Game_ID` char(36) NOT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` char(36) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Account_Type` int(11) DEFAULT NULL,
  `Profile_Directory` varchar(200) DEFAULT NULL,
  `Verification` varchar(50) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Email`, `Username`, `Gender`, `Account_Type`, `Profile_Directory`, `Verification`, `Password`) VALUES
('u0000000-0000-0000-0000-000000000000', 'educosliit@gmail.com', 'EDUCO', 'M', 3, 'users/u0000000-0000-0000-0000-000000000000/', 'V', '0'),
('u141ec4c-57b6-4c9e-a0ef-8d0dcce357b0', 'it22344892@my.sliit.lk', 'luke', 'M', 2, 'users/u141ec4c-57b6-4c9e-a0ef-8d0dcce357b0/', '123456', '$2y$10$wuIUf48DYubx7R4rIbI0luMkcc3qN4GkSTOfi7oGhd1g1cKKeC0Ie'),
('u39dfcbf-84a0-4e79-a7c7-b6730ab1f229', 'it22925336@my.sliit.lk', 'ravindu', 'M', 2, 'users/u39dfcbf-84a0-4e79-a7c7-b6730ab1f229/', '123456', '$2y$10$Stg7hSO5wHF/lKpOOKrBS.WpWza.M8mR/BmASKGbC1Gq1s1odz4uu'),
('u65345d0-463a-4694-8f75-9fe699ad490f', 'it22033864+user1@my.sliit.lk', 'user1', 'M', 0, 'users/u65345d0-463a-4694-8f75-9fe699ad490f/', '123456', '$2y$10$nyQ/bszlYxAtErh7scZ5U.0h6TBi1t2CZW2f9qciJ5t8rmxLP0TyO'),
('ud51d58d-04d6-4679-a606-39625968e0d6', 'it22033864+user2@my.sliit.lk', 'user2', 'M', 0, 'users/ud51d58d-04d6-4679-a606-39625968e0d6/', '123456', '$2y$10$.t7S6OMaFMp7U7aVnNV4B.OLa3Pz6g.Kd/6dPpYLb5tIBHIw2Dz72'),
('udedc771-eb9e-48eb-abcd-c83b139686f6', 'it22033864+dev2@my.sliit.lk', 'dev2', 'M', 1, 'users/udedc771-eb9e-48eb-abcd-c83b139686f6/', '123456', '$2y$10$L6ukKYHpZ6ni6yxAEX.20.5Jy50Le1cVMDWG2R6jD.i1fBmBrIBJu'),
('ufb5030c-9283-4a68-9d44-23df4f6fbc59', 'it22033864@my.sliit.lk', 'sunera', 'M', 2, 'users/ufb5030c-9283-4a68-9d44-23df4f6fbc59/', '123456', '$2y$10$H8pSp6jD.wGYZmm9y/S9teWQAGQ8YbePs7KV/u9iEcSkh9iAPZsiW'),
('ufd264d5-cc69-42bd-8e18-edfc42444b65', 'it22033864+dev1@my.sliit.lk', 'dev1', 'F', 1, 'users/ufd264d5-cc69-42bd-8e18-edfc42444b65/', '123456', '$2y$10$4rPvQ42IJdwoOgkUanayv.HWya1bHFW3xn322cPG4pfchqOySm52i'),
('ufefbdd3-373d-484e-b998-ce9b9fc62a38', 'it22925022@my.sliit.lk', 'charith', 'M', 2, 'users/ufefbdd3-373d-484e-b998-ce9b9fc62a38/', '123456', '$2y$10$0FODSw9voteElao8Gk/BauiEgtGUQRWjpeXcED39J06mrx6Ka9JtW');

-- --------------------------------------------------------

--
-- Table structure for table `user_scoreboard`
--

CREATE TABLE `user_scoreboard` (
  `ID` int(11) NOT NULL,
  `User_ID` char(36) NOT NULL DEFAULT 'u0000000-0000-0000-0000-000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`Ad_ID`),
  ADD KEY `fKey1_a` (`User_ID`),
  ADD KEY `fKey2_a` (`Admin_ID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`Game_ID`),
  ADD KEY `fKey1_g` (`Developer_ID`),
  ADD KEY `fKey2_g` (`Admin_ID`);

--
-- Indexes for table `game_scoreboard`
--
ALTER TABLE `game_scoreboard`
  ADD PRIMARY KEY (`ID`,`Game_ID`),
  ADD KEY `fKey_gs` (`Game_ID`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`User_ID`,`Game_ID`),
  ADD KEY `fKey2_su` (`Game_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_scoreboard`
--
ALTER TABLE `user_scoreboard`
  ADD PRIMARY KEY (`ID`,`User_ID`),
  ADD KEY `fKey_us` (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `fKey1_a` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fKey2_a` FOREIGN KEY (`Admin_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fKey1_g` FOREIGN KEY (`Developer_ID`) REFERENCES `user` (`User_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fKey2_g` FOREIGN KEY (`Admin_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `game_scoreboard`
--
ALTER TABLE `game_scoreboard`
  ADD CONSTRAINT `fKey_gs` FOREIGN KEY (`Game_ID`) REFERENCES `game` (`Game_ID`) ON DELETE NO ACTION;

--
-- Constraints for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD CONSTRAINT `fKey1_su` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fKey2_su` FOREIGN KEY (`Game_ID`) REFERENCES `game` (`Game_ID`) ON DELETE CASCADE;

--
-- Constraints for table `user_scoreboard`
--
ALTER TABLE `user_scoreboard`
  ADD CONSTRAINT `fKey_us` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
