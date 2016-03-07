-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2016 at 01:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndw`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', '{"contributor" : 3}'),
(2, 'Administrator', '{"admin" : 1, "moderator" : 2, "contributor" : 3}'),
(3, 'Moderator', '{"moderator" : 2, "contributor" : 3}');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `merchant_reference` varchar(50) DEFAULT '0',
  `pesapal_tracking_id` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `merchant_reference`, `pesapal_tracking_id`, `status`) VALUES
(1, '001', 'a62d18b9-c589-47ee-be1a-e6fcf583a513', 'COMPLETED'),
(5, '003', '580beb7e-595e-4d6d-8de3-b83c032843e8', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `category_desc` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `app_name` varchar(80) NOT NULL,
  `app_link_main` varchar(255) NOT NULL,
  `app_name_extra` varchar(80) NOT NULL,
  `app_link_extra` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `country` varchar(255) NOT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `company`, `job_title`, `category_desc`, `zipcode`, `app_name`, `app_link_main`, `app_name_extra`, `app_link_extra`, `email`, `gender`, `phone`, `country`, `joined`) VALUES
(16, 'Perrin ', 'Clark', 'White Hat Dev ', 'CEO', 'Full time employed developer', '', 'Biker', 'http://test.com/biker', '', '', 'perrin@yahoo.com', 'Male', 724778017, 'DZ', '0000-00-00 00:00:00'),
(17, 'Caitlyn', 'Mayer', 'CaMey', 'Growth Hacker', 'Bootstrapped or early stage startup', '', '', '', '', '', 'caitlyn@mayer.com', 'Female', 723458291, 'BH', '2016-03-06 11:35:52'),
(20, 'Kevin ', 'Barasa', 'CloudCore Technologies', 'CEO', 'Full time employed developer', '', '', '', '', '', 'bkevin@yahoo.com', 'Male', 724778017, 'AD', '2016-03-06 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
