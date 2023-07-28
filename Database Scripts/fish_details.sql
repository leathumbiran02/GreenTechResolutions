-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 03:26 PM
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
-- Table structure for table `fish_details`
--

CREATE TABLE `fish_details` (
  `fish_details_id` int NOT NULL,
  `fish_name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `health_benefits` varchar(1000) DEFAULT NULL,
  `recipe` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fish_details`
--

INSERT INTO `fish_details` (`fish_details_id`, `fish_name`, `description`, `image`, `health_benefits`, `recipe`) VALUES
(1, 'Koi', 'Koi fish are elegant and colorful freshwater fish often associated with beauty and perseverance.', 'https://th.bing.com/th/id/R.9da8b6d7cb62860a50e18dacb6ab3de6?rik=8YimSHqNGIE2JA&pid=ImgRaw&r=0', 'placeholderlink1', 'placeholderlink1'),
(2, 'Trout', 'Trout are freshwater fish known for their distinctive speckled appearance and delicious taste.', 'https://th.bing.com/th/id/R.bbe78ccf12cfc4b596982d121a07fe46?rik=T3nuBVyjpvj%2f3g&riu=http%3a%2f%2fwww.animalspot.net%2fwp-content%2fuploads%2f2012%2f11%2fBrook-Trout-Pictures.jpg&ehk=iY%2fVNpmsXWsr1C%2bjnnFoVDvN4Pe0HX%2b6iOa0hlt3Eac%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1', 'placeholderlink2', 'placeholderlink2'),
(3, 'Salmon', 'Salmon is a nutritious and flavorful fish prized for its pink flesh and rich omega-3 fatty acids.', 'https://th.bing.com/th/id/R.f1316fa05853225245edd0b1f611cf79?rik=u%2fYbFo%2bVp%2bbHdg&pid=ImgRaw&r=0', 'placeholderlink3', 'placeholderlink3'),
(4, 'Pike', 'Pike is a species of freshwater fish known for its distinctive markings and aggressive behaviour.', 'https://th.bing.com/th/id/R.484ec6c0be245379bff2e988cdef5165?rik=ZwTeP%2f2gPEqOlA&pid=ImgRaw&r=0', 'placeholderlink4', 'placeholderlink4'),
(5, 'Bluegill', 'Bluegill is a freshwater fish species native to North America.', 'https://th.bing.com/th/id/OIP._6jI3q05-BYUr0UmWebjLAHaE2?pid=ImgDet&rs=1', 'placeholderlink5', 'placeholderlink5'),
(6, 'Perch', 'Perch is a freshwater fish known for its small size and distinctive spiny dorsal fin.', 'https://th.bing.com/th/id/R.b7cc79e498dc97de277303a987375c10?rik=bIBW1bXJyiAofg&pid=ImgRaw&r=0', 'placeholderlink6', 'placeholderlink6'),
(7, 'Catfish', 'Catfish are freshwater fish known for their distinctive whisker-like barbels and often having a bottom-dwelling behavior.', 'https://th.bing.com/th/id/OIP.5LujS28-cbi31sNpO4vaqgHaE5?pid=ImgDet&rs=1', 'placeholderlink7', 'placeholderlink7'),
(8, 'Walleye', 'Walleye is a popular freshwater fish known for its delicious taste and distinctive large, glassy eyes.', 'https://th.bing.com/th/id/OIP.4Uu0MRsC_q9BBNjqZzryJgHaEK?pid=ImgDet&rs=1', 'placeholderlink8', 'placeholderlink8'),
(9, 'Bass', 'Bass fish are known for their strong fighting spirit and delicious flavour.', 'https://th.bing.com/th/id/OIP.cMX4stKPkldmj61tP7Yl6AHaE-?pid=ImgDet&rs=1', 'placeholderlink9', 'placeholderlink9'),
(10, 'Carp', 'Carp are freshwater fish known for their distinctive scales and bottom-feeding habits.', 'https://th.bing.com/th/id/OIP._r4OqD_WZU_YTVrnjWkJngHaE8?pid=ImgDet&rs=1', 'placeholderlink10', 'placeholderlink10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fish_details`
--
ALTER TABLE `fish_details`
  ADD PRIMARY KEY (`fish_details_id`),
  ADD UNIQUE KEY `fish_name` (`fish_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fish_details`
--
ALTER TABLE `fish_details`
  MODIFY `fish_details_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
