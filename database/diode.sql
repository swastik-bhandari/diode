-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 03:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diode`
--

-- --------------------------------------------------------

--
-- Table structure for table `mentor_experience`
--

CREATE TABLE `mentor_experience` (
  `username` varchar(255) NOT NULL,
  `first_exp` int(11) DEFAULT NULL,
  `second_exp` int(11) DEFAULT NULL,
  `third_exp` int(11) DEFAULT NULL,
  `fourth_exp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_experience`
--

INSERT INTO `mentor_experience` (`username`, `first_exp`, `second_exp`, `third_exp`, `fourth_exp`) VALUES
('AbhiyanRegmi11', 0, 0, 0, 1),
('ASDFGHJKL123', 0, 0, 0, 1),
('QWERTYUIOP1', 0, 1, 0, 0),
('SwastikBhandari11', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_info`
--

CREATE TABLE `mentor_info` (
  `username` varchar(200) NOT NULL,
  `programming` int(11) NOT NULL,
  `data_science` int(11) NOT NULL,
  `ai` int(11) NOT NULL,
  `software_engineering` int(11) NOT NULL,
  `database_management` int(11) NOT NULL,
  `networking` int(11) NOT NULL,
  `cloud` int(11) NOT NULL,
  `ui_ux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_info`
--

INSERT INTO `mentor_info` (`username`, `programming`, `data_science`, `ai`, `software_engineering`, `database_management`, `networking`, `cloud`, `ui_ux`) VALUES
('AbhiyanRegmi11', 1, 1, 1, 1, 1, 1, 1, 1),
('ASDFGHJKL123', 0, 1, 1, 1, 1, 1, 1, 0),
('QWERTYUIOP1', 0, 1, 0, 0, 0, 0, 0, 0),
('SwastikBhandari11', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `username` varchar(255) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`username`, `start_time`, `end_time`) VALUES
('AbhiyanRegmi11', '14:56:00', '18:00:00'),
('ASDFGHJKL123', '06:52:00', '08:52:00'),
('QWERTYUIOP1', '20:45:00', '01:40:00'),
('SwastikBhandari11', '04:33:00', '07:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `password`) VALUES
('AbhiyanRegmi11', '$2y$10$JbckSiWTTEsLMWCcxa7vTueJumSpzCS3u/2zwXRu.oCn6S8zM2KPi'),
('AbhiyanRegmi12', '$2y$10$CE1nxYoX4AcmRQwPXHBWLu1pCG4US7D1IwnjMcuxfOv2axC8ihKQ2'),
('abhiyanregmi123', '$2y$10$A/qwZODgG2WmqhuWAMSsC.EwUAMcXYw5exLycBgSKYSyYrHQH92/C'),
('AbhiyanRegmi1234', '$2y$10$lVns6e3dvZH6OvP0HJg3uOPfISvr5.3nGqzu5WcHrsFtl.A9Tb8wO'),
('abhiyanregmi12345', '$2y$10$Tnh6MiKfncvehwLaB144feMJGQeMK4UuEWaHIdWpmTSexgcl2Hqbe'),
('abhiyanregmi12345453453', '$2y$10$W.DoKovCNSv18pu8ShTDheETLPNPu89/bVKJofdmeaehdCd1Nj/WW'),
('abhiyanregmi12345453453fsdfasdfas', '$2y$10$rXWMF3rmsgEBNU8dDlCBaeVssX/PnD42n7QfxECAQLqb3MBIMuMdy'),
('adarshfuckboi23', '$2y$10$.p.zgW5eiT3QBLIc.IQLEujqb3BITLuSsiTOo9IBpN5//yjM3inxG'),
('ASDFGHJKL123', '$2y$10$x6oTg7q.JmrIR8FSTPx54.T78NJFhyK4UqL6CPkC.yYzX/DscmDlq'),
('ChristopherHawking', '$2y$10$jiHyLuKYa3/zLnSE.S8pSu6D3j1MZy.YQOfTJEZQDqAhyuVme8sa2'),
('dfasdsdfsdfsdfsd', '$2y$10$bjxqDoCE.3XuBidJPcSFROLTpE53mzgQUXOUh7uY9qyAalchi6HHe'),
('dfsdfs453sd', '$2y$10$tKtvG3CpmflaSmLqQpG2F./rEAmxpp8IJDeviv8WpUSnBa9XOK4Uu'),
('dfsdfs453sdedc', '$2y$10$.Hl02WWfHtdBlUwFo7LeU.9oLBGKjlruwCkDwQ82kDIXkHpWdTXoy'),
('dsfdfsadfdfasdf454', '$2y$10$yw1oVId.FjCPw1ty0vOBHe6ImWWM8JUWUrJgM17eS3FogqBAHVpuu'),
('fasdfasdfaksdjflaskdj456', '$2y$10$2z.sKaF/908e79S6oBcsLO1CwyTGS/a3v4IMsqdNQVEHbpr5wnIge'),
('fasdfasdfaksdjflaskdj456s', '$2y$10$64C/OoEaCWwOCIPDDZVT0eC4.BK6Ag5n/2Dj/MACtWFyM7TosMdgC'),
('fasdfasdfaksdjflaskdj456s4', '$2y$10$3vdKiZc3Cln6ed8RpqoFbeVqPt5rIloMx4Ug/yoEiLGJYL2V9z4da'),
('fasdfasdfaksdjflaskdj456s4s', '$2y$10$FUuWvteyh/3zIxZfloYmeek20QnI3udY9DNK1R0eXbokqQZFG7FJS'),
('QWERTYUIOP1', '$2y$10$AJdn5gW0Cd4vE1jZyVD/s./jhT779pXQEz8PEVEorrraBZ885jxuu'),
('SwastikBhandari11', '$2y$10$Bj4kdvujN0a6JDF6I65LCeJcnc1Lgqal7w73K4k4QmqMbW77GFZAG');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `username` varchar(50) NOT NULL,
  `student` int(20) NOT NULL,
  `mentor` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`username`, `student`, `mentor`) VALUES
('AbhiyanRegmi11', 0, 1),
('ASDFGHJKL123', 0, 1),
('QWERTYUIOP1', 0, 1),
('SwastikBhandari11', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_schedule`
--

CREATE TABLE `weekly_schedule` (
  `username` varchar(255) NOT NULL,
  `sunday` int(11) DEFAULT NULL,
  `monday` int(11) DEFAULT NULL,
  `tuesday` int(11) DEFAULT NULL,
  `wednesday` int(11) DEFAULT NULL,
  `thursday` int(11) DEFAULT NULL,
  `friday` int(11) DEFAULT NULL,
  `saturday` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_schedule`
--

INSERT INTO `weekly_schedule` (`username`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
('AbhiyanRegmi11', 1, 1, 1, 1, 1, 1, 1),
('ASDFGHJKL123', 0, 1, 1, 1, 1, 0, 0),
('QWERTYUIOP1', 0, 1, 0, 0, 0, 0, 0),
('SwastikBhandari11', 1, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mentor_experience`
--
ALTER TABLE `mentor_experience`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mentor_info`
--
ALTER TABLE `mentor_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `weekly_schedule`
--
ALTER TABLE `weekly_schedule`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
