-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thapabikal`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `user_name` text DEFAULT NULL,
  `repo_name` text DEFAULT NULL,
  `thumb_1` text DEFAULT NULL,
  `thumb_2` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `dates` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `user_name`, `repo_name`, `thumb_1`, `thumb_2`, `title`, `dates`) VALUES
(2, 'bikalthapa', 'rubicks_cube', 'rubicks_cube_project_pic1.png', 'rubicks_cube_project_pic2.png', 'Rubicks Cube', '2023-07-31'),
(3, 'bikalthapa', 'Shree-Shanti-Bhagwati-Sec-School', 'ssbss_project_pic1.png', 'ssbss_project_pic2.png', 'School Website', '2023-07-31'),
(17, 'bikalthapa', 'tic-tac-toe', 'tic-tac-toe_project_pic1.png', 'rubicks_cube_project_pic2.png', 'Tic Tac Toe Game', '2023-08-05'),
(18, 'bikalthapa', 'quiz', 'quiz_project_pic2.png', 'quic_project_pic1.png', 'Quiz Game', '2023-08-05'),
(20, 'bikalthapa', 'mental-maths', 'mental_maths_game_pic1.png', 'mental_maths_game_pic2.png', 'Maths Game', '2023-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `topic_src`
--

CREATE TABLE `topic_src` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `topic_src` varchar(255) DEFAULT NULL,
  `tut_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic_src`
--

INSERT INTO `topic_src` (`topic_id`, `topic_name`, `topic_src`, `tut_id`) VALUES
(18, 'Introduction', 'c++_introduction.txt', 42),
(19, 'Getting Started', 'getting_started.txt', 42),
(20, 'Character set and Token', 'getting_started.txt', 42),
(21, 'Variable declaration', 'variable declaration.txt', 42),
(22, 'Statements', 'statement.txt', 42),
(23, 'Data Types', 'datatypes.txt', 42),
(24, 'Type conversion and promotion rules', 'conversion.txt', 42),
(25, 'Preprocessor Directives', 'directive.txt', 42),
(26, 'Namespace', 'namespace.txt', 42),
(27, 'User Defined Constant', 'constant.txt', 42),
(28, 'Dynamic Memory Allocation', 'memory.txt', 42),
(29, 'Control Statements', 'control.txt', 42);

-- --------------------------------------------------------

--
-- Table structure for table `turtorial`
--

CREATE TABLE `turtorial` (
  `tut_id` int(11) NOT NULL,
  `tut_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turtorial`
--

INSERT INTO `turtorial` (`tut_id`, `tut_name`) VALUES
(42, 'c++');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_src`
--
ALTER TABLE `topic_src`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `turtorial`
--
ALTER TABLE `turtorial`
  ADD PRIMARY KEY (`tut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `topic_src`
--
ALTER TABLE `topic_src`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `turtorial`
--
ALTER TABLE `turtorial`
  MODIFY `tut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
