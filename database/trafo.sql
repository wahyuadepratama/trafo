-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 04:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trafo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$rOSEzCI5rpu5E6p7QIM8je9lYGK.8/R5KSH4ZP3bAh4C8zXM/hm.C');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(190) DEFAULT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pole_type` varchar(190) NOT NULL,
  `pole_construction` varchar(190) NOT NULL,
  `pole_photo` varchar(190) NOT NULL,
  `foundation_photo` varchar(190) NOT NULL,
  `is_trafo_input` tinyint(1) NOT NULL,
  `transformer_power` varchar(190) DEFAULT NULL,
  `fasa` varchar(190) DEFAULT NULL,
  `transformer_photo` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `project_id`, `name`, `lat`, `lang`, `uploaded_at`, `pole_type`, `pole_construction`, `pole_photo`, `foundation_photo`, `is_trafo_input`, `transformer_power`, `fasa`, `transformer_photo`) VALUES
(1, 1, 'Data 1', 0, 0, '2020-06-23 12:51:19', 'Besi', 'SC1', '/upload/pole/1.png', '/upload/foundation/1.png', 0, '', '', ''),
(2, 1, 'Data 2', 0, 0, '2020-06-24 03:17:28', 'Beton', 'C1', '/upload/pole/2.png', '/upload/foundation/2.png', 1, '25', 'RST', '/upload/transformer/1.png'),
(3, 2, 'Data 3', 0, 0, '2020-06-23 12:52:21', 'Besi', 'SC2', '/upload/pole/3.png', '/upload/foundation/3.png', 1, '50', 'RST', '/upload/transformer/2.png'),
(4, 1, 'Data 4', 37.4219691, -122.0840166, '2020-06-23 12:52:25', 'Besi', 'SC1', '/upload/pole/1592902111.png', '/upload/foundation/1592902111.png', 0, NULL, NULL, '/upload/transformer/1592902111.png');

-- --------------------------------------------------------

--
-- Table structure for table `pole_attribute`
--

CREATE TABLE `pole_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pole_attribute`
--

INSERT INTO `pole_attribute` (`id`, `name`, `data_id`) VALUES
(5, 'CT', 2),
(6, 'PT', 2),
(7, 'RELE', 2),
(8, 'LVC', 2),
(9, 'RECLOSER', 3),
(10, 'SECTIONALIZER', 3),
(11, 'LBS', 3),
(12, 'TRAFO', 4),
(13, 'FCO', 4),
(14, 'LA', 4),
(15, 'TRAFO', 5),
(16, 'FCO', 5),
(17, 'LA', 5),
(18, 'RELE', 6),
(19, 'LVC', 6),
(20, 'TRAFO', 7),
(21, 'LVC', 7),
(22, 'TRAFO', 8),
(23, 'FCO', 8),
(24, 'TRAFO', 9),
(25, 'LA', 9),
(26, 'TRAFO', 10),
(27, 'LVC', 10),
(36, 'TRAFO', 1),
(37, 'FCO', 1),
(38, 'LA', 1),
(39, 'RELE', 1),
(40, 'RECLOSER', 1),
(41, 'SECTIONALIZER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `reference_number` varchar(190) NOT NULL,
  `ulp` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `reference_number`, `ulp`) VALUES
(1, 'Project 1', '9123912839183298', 'bla'),
(2, 'Project 2', '13892839128391', 'lorem'),
(3, 'Project 3', '7217391239289', 'lorem ipsum'),
(4, 'Project testing', '7238123', 'Sibolga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pole_attribute`
--
ALTER TABLE `pole_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pole_attribute`
--
ALTER TABLE `pole_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
