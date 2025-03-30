-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch_store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(29, 'dong ho moi nhat', '200', 'dh9.jpg', 2),
(30, 'dong ho7', '50', 'dh7.jpg', 2),
(31, 'dong ho 112', '48', 'dh6.jpg', 1),
(33, 'm', '450', 'penguin meme.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `city`, `total_products`, `total_price`) VALUES
(1, 'Tran Ngoc Phuoc', '1115161652', 'dilysthuc051@hotmail.com', 'acsacasc', 'dong ho 5 (2) , dong ho 112 (1) ', '144'),
(3, 'Phước', '0123456987', 'nam@gmail.com', '68 Đặng Thuỳ Trâm, phường 13, Quận Bình Thạnh, TP.HCM', 'dong ho 5 (2) , dong ho 112 (1) ', '144'),
(5, 'Tran Ngoc Phuoc', '012854228', 'phuoc.2274802010699@vanlanguni.vn', '68 Đặng Thuỳ Trâm, phường 13, Quận Bình Thạnh, TP.HCM', 'dong ho 2 (3) , dong ho 5 (1) ', '225'),
(6, 'Tran Ngoc Nam', '0123658497', 'men@gmail.com', 'Ha noi', 'dong ho 2 (5) , dong ho 5 (1) , dong ho moi nhat (1) ', '543'),
(9, 'Tran Ngoc Phuoc', '0125849685', 'phuoctran.22102004@gmail.com', '68 Đặng Thuỳ Trâm, phường 13, Quận Bình Thạnh, TP.HCM', 'dong ho moi nhat (2) , dong ho7 (2) ', '500');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(6, 'dong ho 2', '50', 'dh8.jpg'),
(8, 'dong ho 112', '48', 'dh6.jpg'),
(9, 'dong ho 5', '50', 'dh3.jpg'),
(10, 'dong ho 3', '58', 'dh2.jpg'),
(12, 'dong ho7', '50', 'dh7.jpg'),
(13, 'dong ho 99', '90', 'dh4.jpg'),
(14, 'dong ho moi nhat', '200', 'dh9.jpg'),
(15, 'm', '450', 'penguin meme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`, `role`) VALUES
(1, 'Admin', 'khang180424@gmail.com', '202cb962ac59075b964b07152d234b70', '', '0'),
(10, 'Khang', 'khang.2274802010389@vanlanguni.vn', '220466675e31b9d20c051d5e57974150', 'penguin meme.jpg', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
