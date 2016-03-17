-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2015 at 04:38 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `actcode` varchar(50) NOT NULL,
  `activated` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first`, `last`, `email`, `password`, `gender`, `contact`, `city`, `state`, `actcode`, `activated`) VALUES
(1, 'sunder', 'sunder', 'manoj', 'sunderis10@gmail.com', '27266bb844f846a15a54ab10295a63d2', 'm', '+918608686047', 'chennai', 'tamilnadu', '', 1),
(2, 'sunder1', 'Manoj', 'Sunder', 'sunderis100@gmail.com', '1f5c21945aa1a6b6cbf7233fd101d8bb', 'M', '8608686047', 'sagar', 'Madhya Pardesh', '', 1),
(3, 'sunderis10@gmail.com', 'sunder', 'sunder', 'sunderis10@gmail.com', '1f5c21945aa1a6b6cbf7233fd101d8bb', 'M', '160986986', 'ss', 'ss', '', 1),
(4, 'sundermanoj', 'sunder', 'sunder', 'sunderis100@gmail.com', '1f5c21945aa1a6b6cbf7233fd101d8bb', 'M', '18970986', 'Potheri', 'TamilNadu', 'aUZNqQwNq3', 1),
(5, 'sunderis100', 'sunder', 'sunder', 'sunderis10@gmail.com', '1f5c21945aa1a6b6cbf7233fd101d8bb', 'M', '2147483647', 'Sagar', 'Mp', 'qDEB2bMFX3', 1),
(6, 'rsunder19', 'sunder', 'sunder', 'sunderis10@gmail.com', '1f5c21945aa1a6b6cbf7233fd101d8bb', 'M', '197', 'sagar', 'mp', 'X7RFGjE9Xj', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
