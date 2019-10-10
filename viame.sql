-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 07:48 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viame`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `_id` varchar(500) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `user_id` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`_id`, `title`, `description`, `user_id`, `status`, `created_date`) VALUES
('15705481115d9ca98f3bf311', 'test', 'description', '15705468975d9ca4d1c8cf54', 3, '2019-10-08 19:21:51'),
('15705481485d9ca9b4c4bb72', 'test', 'description', '15705468975d9ca4d1c8cf54', 4, '2019-10-08 19:22:28'),
('15705495505d9caf2ee54903', 'hello', 'hi', '15705468975d9ca4d1c8cf54', 3, '2019-10-08 19:45:50'),
('15705495975d9caf5d090344', 'test2', 'hi shehzad', '15705468975d9ca4d1c8cf54', 4, '2019-10-08 19:46:37'),
('15705497225d9cafda923ad5', 'test4', 'hello this test 4', '15705468975d9ca4d1c8cf54', 5, '2019-10-08 19:48:42'),
('15705497625d9cb002c6f996', 'test5', 'this is test 5', '15705468975d9ca4d1c8cf54', 3, '2019-10-08 19:49:22'),
('15705555455d9cc6995cf6e7', 'hello', 'this  is task', '15705468975d9ca4d1c8cf54', 5, '2019-10-08 21:25:45'),
('15705556715d9cc7174b7f18', 'hello how are your', 'teste', '15705468975d9ca4d1c8cf54', 1, '2019-10-08 21:27:51'),
('15705557605d9cc77007c059', 'test', 'allow', '15705468975d9ca4d1c8cf54', 1, '2019-10-08 21:29:20'),
('15705558985d9cc7faf2bde10', 'hellow', 'test6', '15705468975d9ca4d1c8cf54', 1, '2019-10-08 21:31:38'),
('15705560105d9cc86aad86011', 'hello', 'test5', '15705468975d9ca4d1c8cf54', 1, '2019-10-08 21:33:30'),
('15705561215d9cc8d96576912', 'test3', 'hello', '15705468975d9ca4d1c8cf54', 1, '2019-10-08 21:35:21'),
('15705562995d9cc98b8906513', 'test23', 'test', '15705468975d9ca4d1c8cf54', 5, '2019-10-08 21:38:19'),
('15705563395d9cc9b34bd9014', 'test1', 'description', '15705452325d9c9e504bc202', 5, '2019-10-08 21:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`, `created_date`, `status`) VALUES
(1, 'ansarishehzad@gmail.com', '$2y$10$pA9Peep59ekBfBzYf1n1Ae2VqbIUX0hFICNilJVD1w2TTTLyZIUpi', '15705443165d9c9abcce6f31', '2019-10-08 18:18:36', 1),
(2, 'ansarishehzad2@gmail.com', '$2y$10$JsXFecaFKUfUDslSjzPvHeRGdbdwG.BZaLzdZDYrmGTrgvXw1Ioli', '15705452325d9c9e504bc202', '2019-10-08 18:33:52', 1),
(3, 'ansarishehzad23@gmail.com', '$2y$10$y.gYqcqhr3cSSGK0uuK8GeJY5zw83utBHzK7OLV9YJ9QsgRScWxxG', '15705462895d9ca2716aa973', '2019-10-08 18:51:29', 1),
(4, 'sajid@gmail.com', '$2y$10$6gcVariWFfHcih3SMxLtUeshGM2qP6S.MTDzsYLK1CHEHXO5w81Gy', '15705468975d9ca4d1c8cf54', '2019-10-08 19:01:37', 1),
(5, 'test@gmail.com', '$2y$10$il6C03wspp7euAOIjDYpxeB58hR.HhN5Fg0ahNX2t/7hCw7aHiU2e', '15705563675d9cc9cf385825', '2019-10-08 21:39:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
