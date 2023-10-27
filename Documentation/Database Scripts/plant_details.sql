-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 10:47 AM
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
-- Table structure for table `plant_details`
--

CREATE TABLE `plant_details` (
  `plant_details_id` int NOT NULL,
  `plant_name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `health_benefits` varchar(1000) DEFAULT NULL,
  `recipe` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `plant_details`
--

INSERT INTO `plant_details` (`plant_details_id`, `plant_name`, `description`, `image`, `health_benefits`, `recipe`) VALUES
(1, 'Tomato', 'Tomato is a versatile and delicious fruit commonly used in various culinary dishes.', 'https://i.pinimg.com/originals/f4/db/1b/f4db1bc6273b8479c6c354f325228748.jpg', 'placeholderlink1', 'placeholderlink1'),
(2, 'Cauliflower', 'Cauliflower is a nutritious vegetable with a mild, versatile flavor.', 'https://i.pinimg.com/originals/2e/a0/7c/2ea07c91b80166bc23cf1c195c71a260.jpg', 'placeholderlink2', 'placeholderlink2'),
(3, 'Spinach', 'Spinach is a nutritious leafy green vegetable packed with vitamins and minerals.', 'https://cdn.mos.cms.futurecdn.net/atyrpYQoxdoTzmEgu8HMWE-1200-80.jpg', 'placeholderlink3', 'placeholderlink3'),
(4, 'Carrot', 'The carrot is a nutritious orange root vegetable.', 'https://i.pinimg.com/originals/d9/a6/1b/d9a61ba54f0381c4bc022aba9a5beefc.jpg', 'placeholderlink4', 'placeholderlink4'),
(5, 'Broccoli', 'Broccoli is a nutritious green vegetable.', 'https://i.pinimg.com/originals/e6/c1/4e/e6c14edf1247f131db5574bcfa4c626a.jpg', 'placeholderlink5', 'placeholderlink5'),
(6, 'Bell pepper', 'Bell pepper is a sweet and colorful vegetable.', 'https://i.pinimg.com/originals/cb/06/11/cb06117703f54845979451af286dd6ac.jpg', 'placeholderlink6', 'placeholderlink6'),
(7, ' Strawberries', 'Strawberries are sweet, juicy, and vibrant red fruits loved by many.', 'https://i.pinimg.com/originals/2b/53/6e/2b536e6e9eb4d488682bfdb2dd17d382.jpg', 'placeholderlink7', 'placeholderlink7'),
(8, 'Blueberries', 'Blueberries are small, delicious, and nutritious fruits.', 'https://th.bing.com/th/id/OIP.9wCxblC6uhozuXdGYOFV2AHaFj?pid=ImgDet&rs=1', 'placeholderlink8', 'placeholderlink8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plant_details`
--
ALTER TABLE `plant_details`
  ADD PRIMARY KEY (`plant_details_id`),
  ADD UNIQUE KEY `plant_name` (`plant_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plant_details`
--
ALTER TABLE `plant_details`
  MODIFY `plant_details_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
