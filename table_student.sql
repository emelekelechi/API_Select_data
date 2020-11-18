-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2020 at 02:19 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_api_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_student`
--

DROP TABLE IF EXISTS `table_student`;
CREATE TABLE IF NOT EXISTS `table_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_student`
--

INSERT INTO `table_student` (`id`, `name`, `email`, `phone`, `status`, `created_at`) VALUES
(1, 'Emele Kelechi Samuel', 'emelekelex@gmail.com', '08166761792', 1, '2020-11-17 02:33:26'),
(2, 'Linus Mba Emmanuel', 'mbalinus@gmail.com', '09054733429', 1, '2020-11-17 02:33:26'),
(3, 'Victor Chigozie Mba', 'evicto@gmail.com', '08097345255', 1, '2020-11-17 15:02:07'),
(4, 'Victor Chigozie Mba', 'evicto@gmail.com', '08097345255', 1, '2020-11-17 15:06:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
