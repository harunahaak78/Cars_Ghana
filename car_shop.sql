-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 09:07 AM
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
-- Database: `car_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `Status` enum('pending','processing','completed','cancelled') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(5, 'Audi', 150, '   Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n            ', 'img/audi.jpg'),
(6, 'Jeep', 300, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n           ', 'img/jeep2.jpg'),
(7, 'Rang Rover', 200, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n    ', 'img/range-rover.jpg'),
(9, 'Sedan', 120, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n           ', 'img/sedan.jpg'),
(12, 'Jeep', 100, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n            ', 'img/jeep3.jpg'),
(13, 'Lamborghini', 1000000, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n            ', 'img/lanbo1.jpg'),
(14, 'Rolls Royce', 1000000, ' Lorem ipsum dolor sit, amet consectetur \r\n              adipisicing elit. Corporis velit doloribus \r\n              vel labore modi quae? Porro neque, voluptatum \r\n              perspiciatis architecto debitis nihil voluptatem \r\n              sapiente possimus illum, sunt ab. Quis expedita \r\n              mollitia provident sunt, itaque quaerat excepturi rerum!\r\n            ', 'img/rose.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'abdul_haak', 'Abdul-Haak', 'Haruna', 'abdulhaakharuna@gmail.com', '$2y$10$RD.rt6qN3vBpGOMzjU89/u6ZVWdpbwaDIIqHCY/WhYh2HO02FMz5a', '2025-02-09 05:55:54'),
(5, 'haak', 'bate', 'test', 'testbate@gmail.com', '$2y$10$T2y0FOBfZ9GF0oHsnmYwmOFdZdd3UcXat8HXsPFSCYZjXN9d04wDq', '2025-02-11 07:06:30'),
(16, 'abdul89', 'Abdul-Haak', 'Haruna', 'rafiu@gmail.com', '$2y$10$omRKVoyeJ4nvvlUlOrKbme0GPZxVSrWiFFDdeGe2sVsHkhrsm4EQm', '2025-02-11 07:26:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
