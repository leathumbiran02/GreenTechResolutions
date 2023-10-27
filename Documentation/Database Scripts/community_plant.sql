-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 01:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greentech_resolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `community_plant`
--

CREATE TABLE `community_plant` (
  `plant_id` int NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `plant_name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `community_plant`
--

INSERT INTO `community_plant` (`plant_id`, `user_email`, `plant_name`, `description`, `image`, `price`) VALUES
(1, 'leathumbiran@gmail.com', 'Tomato', 'Tomato is a versatile and delicious fruit commonly used in various culinary dishes.', 'https://i.pinimg.com/originals/f4/db/1b/f4db1bc6273b8479c6c354f325228748.jpg', '10.00'),
(2, 'leathumbiran@gmail.com', 'Cauliflower', 'Cauliflower is a nutritious vegetable with a mild, versatile flavor.', 'https://i.pinimg.com/originals/2e/a0/7c/2ea07c91b80166bc23cf1c195c71a260.jpg', '20.00'),
(3, 'leathumbiran@gmail.com', 'Spinach', 'Spinach is a nutritious leafy green vegetable packed with vitamins and minerals.', 'https://cdn.mos.cms.futurecdn.net/atyrpYQoxdoTzmEgu8HMWE-1200-80.jpg', '30.00'),
(4, 'leathumbiran@gmail.com', 'Carrot', 'The carrot is a nutritious orange root vegetable.', 'https://i.pinimg.com/originals/d9/a6/1b/d9a61ba54f0381c4bc022aba9a5beefc.jpg', '22.00'),
(5, 'leathumbiran@gmail.com', 'Broccoli', 'Broccoli is a nutritious green vegetable.', 'https://i.pinimg.com/originals/e6/c1/4e/e6c14edf1247f131db5574bcfa4c626a.jpg', '15.00'),
(6, 'leathumbiran@gmail.com', 'Bell pepper', 'Bell pepper is a sweet and colorful vegetable.', 'https://i.pinimg.com/originals/cb/06/11/cb06117703f54845979451af286dd6ac.jpg', '8.00'),
(7, 'leathumbiran@gmail.com', ' Strawberries', 'Strawberries are sweet, juicy, and vibrant red fruits loved by many.', 'https://i.pinimg.com/originals/2b/53/6e/2b536e6e9eb4d488682bfdb2dd17d382.jpg', '25.00'),
(8, 'leathumbiran@gmail.com', 'Blueberries', 'Blueberries are small, delicious, and nutritious fruits.', 'https://th.bing.com/th/id/OIP.9wCxblC6uhozuXdGYOFV2AHaFj?pid=ImgDet&rs=1', '35.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_plant`
--
ALTER TABLE `community_plant`
  ADD PRIMARY KEY (`plant_id`),
  ADD KEY `fk_community_plant_users` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_plant`
--
ALTER TABLE `community_plant`
  MODIFY `plant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community_plant`
--
ALTER TABLE `community_plant`
  ADD CONSTRAINT `fk_community_plant_users` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
