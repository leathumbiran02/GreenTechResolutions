-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 12:58 PM
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
-- Table structure for table `community_fish`
--

CREATE TABLE `community_fish` (
  `fish_id` int NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `fish_name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `community_fish`
--

INSERT INTO `community_fish` (`fish_id`, `user_email`, `fish_name`, `description`, `image`, `price`) VALUES
(1, 'leathumbiran@gmail.com', 'Koi', 'Koi fish are elegant and colorful freshwater fish often associated with beauty and perseverance.', 'https://i.pinimg.com/originals/3a/08/aa/3a08aa8caf683a6bf2c1b27b60ca3e15.jpg', '150.00'),
(2, 'leathumbiran@gmail.com', 'Trout', 'Trout are freshwater fish known for their distinctive speckled appearance and delicious taste.', 'https://i.pinimg.com/originals/27/a2/8a/27a28ad1c589b9cd379b76a8ae9599cb.jpg', '100.00'),
(3, 'leathumbiran@gmail.com', 'Salmon', 'Salmon is a nutritious and flavorful fish prized for its pink flesh and rich omega-3 fatty acids.', 'https://i.pinimg.com/originals/09/7b/20/097b20e86fc1098876af8952fc28eee9.jpg', '200.00'),
(4, 'leathumbiran@gmail.com', 'Pike', 'Pike is a species of freshwater fish known for its distinctive markings and aggressive behaviour.', 'https://i.pinimg.com/originals/c2/f3/30/c2f33053b8c654fc4aaca4877d8e4d7b.jpg', '250.00'),
(5, 'leathumbiran@gmail.com', 'Bluegill', 'Bluegill is a freshwater fish species native to North America.', 'https://i.pinimg.com/originals/6c/fc/9f/6cfc9f5222d063eece4627f78db4b978.jpg', '230.00'),
(6, 'leathumbiran@gmail.com', 'Perch', 'Perch is a freshwater fish known for its small size and distinctive spiny dorsal fin.', 'https://i.pinimg.com/originals/2f/e9/01/2fe90170c191d93303ca185300bf3eba.jpg', '150.00'),
(7, 'leathumbiran@gmail.com', 'Catfish', 'Catfish are freshwater fish known for their distinctive whisker-like barbels and often having a bottom-dwelling behavior.', 'https://i.pinimg.com/originals/0b/38/f2/0b38f29e018389c0a71a1525f6e2a795.jpg', '300.00'),
(8, 'leathumbiran@gmail.com', 'Walleye', 'Walleye is a popular freshwater fish known for its delicious taste and distinctive large, glassy eyes.', 'https://i.pinimg.com/originals/51/9d/2b/519d2b75aeaa1053caf0c05b0aba7d92.jpg', '450.00'),
(9, 'leathumbiran@gmail.com', 'Bass', 'Bass fish are known for their strong fighting spirit and delicious flavour.', 'https://i.pinimg.com/originals/75/de/22/75de226b523a73107af3a41921afe05e.jpg', '250.00'),
(10, 'leathumbiran@gmail.com', 'Carp', 'Carp are freshwater fish known for their distinctive scales and bottom-feeding habits.', 'https://i.pinimg.com/originals/7d/79/82/7d7982efaa407018bb6662946c15dbad.jpg', '500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_fish`
--
ALTER TABLE `community_fish`
  ADD PRIMARY KEY (`fish_id`),
  ADD KEY `fk_community_fish_users` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_fish`
--
ALTER TABLE `community_fish`
  MODIFY `fish_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community_fish`
--
ALTER TABLE `community_fish`
  ADD CONSTRAINT `fk_community_fish_users` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
