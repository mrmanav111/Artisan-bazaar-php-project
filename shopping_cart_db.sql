-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2025 at 04:31 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2025-01-13 08:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `total`, `created_at`) VALUES
(1, 'silvio', 'silvio@nocilla', 'asSasa', '2354', '129.98', '2025-02-15 07:04:01'),
(4, 'ddsdasd', 'sdsad@mail', 'sddasd', '12345', '149.97', '2025-02-15 07:06:50'),
(5, 'ss', 'ss@mail', 'sdas', '123456', '12.50', '2025-02-17 10:24:33'),
(6, 'sfsdf', 's@mail.com', 'sdfsdf', '1232456', '39.99', '2025-02-17 13:29:48'),
(7, 'ssss', 'S@gmail.com', 'sdadasd', '12315465', '39.98', '2025-02-17 13:35:47'),
(8, 'ssd', 'sdsds@mail.com', 'dfsdfdsfsdf', '23131541', '19.99', '2025-02-17 13:40:28'),
(9, 'sadsad', 'sda@mail', 'aasadsa', 'd321354654', '39.99', '2025-02-17 13:43:09'),
(10, 'ssss', 'sss@mail.com', 'scaca', '321231321', '69.97', '2025-02-17 13:45:53'),
(11, 'xz`zx', '`zxz@gmail', 'xzczc', '5454545', '39.99', '2025-02-17 13:48:01'),
(12, 'dhjkjshf', 'dsfs@gmail', 'sadadad', '23154', '19.99', '2025-02-17 15:52:17'),
(13, 'sassadada', 'dsf@mail', 'dsfdsf', '3213213', '19.99', '2025-02-17 16:40:17'),
(14, 'silvio', 'silvio@nocilal.org', 'irfhrioehgoirehgv', '123456', '19.99', '2025-02-22 08:40:09'),
(16, 'Manav', 'rockm1433@gmail.com', 'efffdf', '1234', '1562.50', '2025-05-01 02:30:52'),
(17, 'Manav', 'rockm1433@gmail.com', 'ewedd', '12345', '300.00', '2025-05-01 02:32:36'),
(18, 'Manav', 'rockm1433@gmail.com', 'scvsdv', '2123', '200.00', '2025-05-01 10:41:39'),
(20, 'Manav', 'devanimanav6@gmail.com', 'Maesaskala', '+356 79646049', '4750.00', '2025-05-02 20:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`) VALUES
(1, 4, 8, 'AI Poster', '20.00', 3),
(2, 4, 3, 'Product 3', '39.99', 1),
(3, 4, 5, 'Product 5', '29.99', 1),
(4, 4, 4, 'Product 4', '19.99', 1),
(5, 5, 7, 'Product 7', '12.50', 1),
(6, 6, 3, 'Product 3', '39.99', 1),
(7, 7, 4, 'Product 4', '19.99', 1),
(8, 7, 1, 'Product 1', '19.99', 1),
(9, 8, 4, 'Product 4', '19.99', 1),
(10, 9, 3, 'Product 3', '39.99', 1),
(11, 10, 4, 'Product 4', '19.99', 1),
(12, 10, 1, 'Product 1', '19.99', 1),
(13, 10, 5, 'Product 5', '29.99', 1),
(14, 11, 3, 'Product 3', '39.99', 1),
(15, 12, 4, 'Product 4', '19.99', 1),
(16, 13, 4, 'Product 4', '19.99', 1),
(17, 14, 4, 'Product 4', '19.99', 1),
(19, 16, 3, 'handmade wall watch.jpeg', '300.00', 5),
(20, 16, 6, 'Product 7', '12.50', 1),
(21, 16, 2, 'Handmade kites', '50.00', 1),
(22, 17, 3, 'handmade wall watch', '300.00', 1),
(23, 18, 2, 'Handmade kites', '50.00', 3),
(24, 18, 8, 'Wooden elephant', '50.00', 1),
(26, 20, 1, 'artwork painting', '200.00', 1),
(27, 20, 2, 'Handmade kites', '50.00', 1),
(28, 20, 3, 'handmade wall watch', '300.00', 1),
(29, 20, 4, 'Handmade Woven Hanging Pendant Bamboo Light', '600.00', 2),
(30, 20, 5, 'Hexagon Wooden Table Lamp', '500.00', 1),
(31, 20, 6, 'Living Room Wall Art Painting', '200.00', 1),
(32, 20, 7, 'Peacock feather Painting ', '800.00', 1),
(33, 20, 9, 'Wooden elephant', '500.00', 1),
(34, 20, 13, 'ying yang piece, home decore', '1000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `stock` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `stock`) VALUES
(1, 'artwork painting', '200.00', 'images/artwork painting.jpeg', NULL, 10),
(2, 'Handmade kites', '50.00', 'images/Handmade kites.jpg', NULL, 10),
(3, 'handmade wall watch', '300.00', 'images/handmade wall watch.jpeg', NULL, 10),
(4, 'Handmade Woven Hanging Pendant Bamboo Light', '600.00', 'images/Hemis - Unique handmade Woven Hanging Pendant Light, NaturalBamboo.jpg', NULL, 10),
(5, 'Hexagon Wooden Table Lamp', '500.00', 'images/Hexagon Wooden Table Lamp, Handmade.jpeg', NULL, 10),
(6, 'Living Room Wall Art Painting', '200.00', 'images/Large Acrylic Painting, Living Room Wall Art Painting.jpg', NULL, 10),
(7, 'Peacock feather Painting ', '800.00', 'images/peacock feather Painting.jpeg', NULL, 10),
(8, 'Wall-mounted Decorative Art', '900.00', 'images/Wall-mounted Decorative Art.webp', NULL, 10),
(9, 'Wooden elephant', '500.00', 'images/wooden elephant Artwork.jpeg', NULL, 10),
(13, 'ying yang piece, home decore', '1000.00', 'images/ying yang piecehandmade home decore.jpeg', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'snocilla@gmail.com', '2ff6e281b292bcc53a4324195b1e670e', '2025-01-13 08:44:43'),
(2, 'monaliza@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2025-01-13 10:42:59'),
(3, 'silvio@nocilla.org', 'e10adc3949ba59abbe56e057f20f883e', '2025-02-05 16:56:13'),
(7, 's@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2025-02-05 17:12:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
