-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 04:54 AM
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
(1, 'leathumbiran@gmail.com', 'Koi', 'Koi fish are elegant and colorful freshwater fish often associated with beauty and perseverance.', 'https://th.bing.com/th/id/R.9da8b6d7cb62860a50e18dacb6ab3de6?rik=8YimSHqNGIE2JA&pid=ImgRaw&r=0', '150.00'),
(2, 'leathumbiran@gmail.com', 'Trout', 'Trout are freshwater fish known for their distinctive speckled appearance and delicious taste.', 'https://th.bing.com/th/id/R.bbe78ccf12cfc4b596982d121a07fe46?rik=T3nuBVyjpvj%2f3g&riu=http%3a%2f%2fwww.animalspot.net%2fwp-content%2fuploads%2f2012%2f11%2fBrook-Trout-Pictures.jpg&ehk=iY%2fVNpmsXWsr1C%2bjnnFoVDvN4Pe0HX%2b6iOa0hlt3Eac%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1', '100.00'),
(3, 'leathumbiran@gmail.com', 'Salmon', 'Salmon is a nutritious and flavorful fish prized for its pink flesh and rich omega-3 fatty acids.', 'https://th.bing.com/th/id/R.f1316fa05853225245edd0b1f611cf79?rik=u%2fYbFo%2bVp%2bbHdg&pid=ImgRaw&r=0', '200.00'),
(4, 'leathumbiran@gmail.com', 'Pike', 'Pike is a species of freshwater fish known for its distinctive markings and aggressive behaviour.', 'https://th.bing.com/th/id/R.484ec6c0be245379bff2e988cdef5165?rik=ZwTeP%2f2gPEqOlA&pid=ImgRaw&r=0', '250.00'),
(5, 'leathumbiran@gmail.com', 'Bluegill', 'Bluegill is a freshwater fish species native to North America.', 'https://th.bing.com/th/id/OIP._6jI3q05-BYUr0UmWebjLAHaE2?pid=ImgDet&rs=1', '230.00'),
(6, 'leathumbiran@gmail.com', 'Perch', 'Perch is a freshwater fish known for its small size and distinctive spiny dorsal fin.', 'https://th.bing.com/th/id/R.b7cc79e498dc97de277303a987375c10?rik=bIBW1bXJyiAofg&pid=ImgRaw&r=0', '150.00'),
(7, 'leathumbiran@gmail.com', 'Catfish', 'Catfish are freshwater fish known for their distinctive whisker-like barbels and often having a bottom-dwelling behavior.', 'https://th.bing.com/th/id/OIP.5LujS28-cbi31sNpO4vaqgHaE5?pid=ImgDet&rs=1', '300.00'),
(8, 'leathumbiran@gmail.com', 'Walleye', 'Walleye is a popular freshwater fish known for its delicious taste and distinctive large, glassy eyes.', 'https://th.bing.com/th/id/OIP.4Uu0MRsC_q9BBNjqZzryJgHaEK?pid=ImgDet&rs=1', '450.00'),
(9, 'leathumbiran@gmail.com', 'Bass', 'Bass fish are known for their strong fighting spirit and delicious flavour.', 'https://th.bing.com/th/id/OIP.cMX4stKPkldmj61tP7Yl6AHaE-?pid=ImgDet&rs=1', '250.00'),
(10, 'leathumbiran@gmail.com', 'Carp', 'Carp are freshwater fish known for their distinctive scales and bottom-feeding habits.', 'https://th.bing.com/th/id/OIP._r4OqD_WZU_YTVrnjWkJngHaE8?pid=ImgDet&rs=1', '500.00');

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
