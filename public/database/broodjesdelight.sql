-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broodjesdelight`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `sandwich_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `ordered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sandwiches`
--

CREATE TABLE `sandwiches` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `picture` text NOT NULL,
  `featured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sandwiches`
--

INSERT INTO `sandwiches` (`id`, `name`, `description`, `price`, `picture`, `featured`) VALUES
(1, 'Cheese', 'sandwich with young cheese', 1.90, 'kaas.jpg', 0),
(2, 'Ham', 'sandwich with ham', 1.90, 'ham.jpg', 0),
(3, 'Ham and cheese', 'sandwich with ham and cheese', 2.10, 'kaasham.jpg', 1),
(4, 'Fitness chicken', 'chicken, yoghurt dressing, peach, cress, tomato and cucumber', 3.50, 'fitnesskip.jpg', 0),
(5, 'Sombrero sandwich', 'chicken, andalouse sauce, red pepper, corn, lettuce, cucumber, tomato, egg and onion', 3.70, 'sombrero.jpg', 0),
(6, 'Broodje americain-American tartare sandwich', 'american, tartar sauce, onion, cucumber, egg and garden cress', 3.50, 'americaintartaar.jpg', 0),
(7, 'Indian chicken sandwich', 'chicken, pineapple, garden cress, cucumber and curry dressing', 4.00, 'indiankip.jpg', 1),
(8, 'Greek sandwich', 'feta, garden cress, cucumber, tomato and olive tapenade', 3.90, 'grieksbroodje.jpg', 1),
(9, 'Tuna Tino', 'spicy tuna, onion, gherkin, martini sauce and (tabasco)', 2.60, 'tonijntino.jpg', 0),
(10, 'Wrap exotic', 'chicken, cocktail sauce, lettuce, tomato, cucumber, egg and pineapple', 3.70, 'wrapexotisch.jpg', 1),
(11, 'Wrap chicken bacon', 'chicken, bacon, BBQ sauce, lettuce, tomato and cucumber', 4.00, 'wrapkipspek.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Ordered'),
(2, 'Prepared'),
(3, 'Picked up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sandwiches`
--
ALTER TABLE `sandwiches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sandwiches`
--
ALTER TABLE `sandwiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
