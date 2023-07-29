-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 04:32 PM
-- Server version: 8.0.28
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
(1, 'leathumbiran@gmail.com', 'Tomato', 'Tomato is a versatile and delicious fruit commonly used in various culinary dishes.', 'https://th.bing.com/th/id/OIP.NNiG9NKcVyJ8fPh66V3WSgHaFW?pid=ImgDet&rs=1', '10.00'),
(2, 'leathumbiran@gmail.com', 'Cauliflower', 'Cauliflower is a nutritious vegetable with a mild, versatile flavor.', 'https://th.bing.com/th/id/R.a9bb5f4e2784a4e038cbae92634cef10?rik=WkEZnPmHt7FiNQ&riu=http%3a%2f%2fnutrawiki.org%2fwp-content%2fuploads%2f2015%2f09%2fCauliflower.jpg&ehk=McP9NlaloU%2bdei9SFVtIx%2fNOFu1Xsc1nnFpasDVm4xI%3d&risl=&pid=ImgRaw&r=0', '20.00'),
(3, 'leathumbiran@gmail.com', 'Spinach', 'Spinach is a nutritious leafy green vegetable packed with vitamins and minerals.', 'https://cdn.mos.cms.futurecdn.net/atyrpYQoxdoTzmEgu8HMWE-1200-80.jpg', '30.00'),
(4, 'leathumbiran@gmail.com', 'Carrot', 'The carrot is a nutritious orange root vegetable.', 'https://th.bing.com/th/id/R.2f44d15737bd7c1f6bd5d843ec289879?rik=MGTrOg5HZ5jVCQ&pid=ImgRaw&r=0', '22.00'),
(5, 'leathumbiran@gmail.com', 'Broccoli', 'Broccoli is a nutritious green vegetable.', 'https://th.bing.com/th/id/R.60331a2e67ae8eadeeba0cd68363d114?rik=ZwcO9IoH6suCyw&riu=http%3a%2f%2f2.bp.blogspot.com%2f-jWeRRnyX-VE%2fWQX674gHsLI%2fAAAAAAAABkU%2ftAoB82mDfY0oRe9RU0t4KMUrT9wL8s74ACK4B%2fs1600%2fbroccoli.jpg&ehk=g7eLMymMcibpJDqh%2fxj1tJWeld3lGdv4LAg76SPTrkM%3d&risl=&pid=ImgRaw&r=0', '15.00'),
(6, 'leathumbiran@gmail.com', 'Bell pepper', 'Bell pepper is a sweet and colorful vegetable.', 'https://th.bing.com/th/id/OIP.wZfzxUAZIGewi3SEIzI43wHaJ4?pid=ImgDet&rs=1', '8.00'),
(7, 'leathumbiran@gmail.com', ' Strawberries', 'Strawberries are sweet, juicy, and vibrant red fruits loved by many.', 'https://th.bing.com/th/id/OIP.fR3uGTXu0iwcQ9jHnItVzQHaLH?pid=ImgDet&rs=1', '25.00'),
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
