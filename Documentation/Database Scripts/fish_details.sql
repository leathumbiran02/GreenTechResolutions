-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 10:43 AM
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
(1, 'Koi', 'Koi fish are elegant and colorful freshwater fish often associated with beauty and perseverance.', 'https://i.pinimg.com/originals/3a/08/aa/3a08aa8caf683a6bf2c1b27b60ca3e15.jpg', 'https://www.americanoceans.org/facts/can-you-eat-koi-fish/#:~:text=Koi%20fish%20have%20a%20rich,most%20parts%20of%20the%20world.', 'https://cookpad.com/us/search/koi'),
(2, 'Trout', 'Trout are freshwater fish known for their distinctive speckled appearance and delicious taste.', 'https://i.pinimg.com/originals/27/a2/8a/27a28ad1c589b9cd379b76a8ae9599cb.jpg', 'https://www.nutritionadvance.com/rainbow-trout-nutrition-benefits/', 'https://www.foodandwine.com/seafood/fish/trout/trout-recipes'),
(3, 'Salmon', 'Salmon is a nutritious and flavorful fish prized for its pink flesh and rich omega-3 fatty acids.', 'https://i.pinimg.com/originals/09/7b/20/097b20e86fc1098876af8952fc28eee9.jpg', 'https://www.healthline.com/nutrition/salmon-nutrition-and-health-benefits#4', 'https://www.delish.com/cooking/recipe-ideas/g2039/salmon-recipes/'),
(4, 'Pike', 'Pike is a species of freshwater fish known for its distinctive markings and aggressive behaviour.', 'https://i.pinimg.com/originals/c2/f3/30/c2f33053b8c654fc4aaca4877d8e4d7b.jpg', 'https://www.webmd.com/diet/what-are-health-benefits-pike#:~:text=As%20a%20high%2Dprotein%20food,your%20bones%20and%20muscles%20strong.', 'https://cookingchew.com/pike-recipes.html'),
(5, 'Bluegill', 'Bluegill is a freshwater fish species native to North America.', 'https://i.pinimg.com/originals/6c/fc/9f/6cfc9f5222d063eece4627f78db4b978.jpg', 'https://healthfully.com/543501-nutritional-value-of-bluegills.html', 'https://www.tasteofhome.com/recipes/bluegill-parmesan/'),
(6, 'Perch', 'Perch is a freshwater fish known for its small size and distinctive spiny dorsal fin.', 'https://i.pinimg.com/originals/2f/e9/01/2fe90170c191d93303ca185300bf3eba.jpg\r\n', 'https://toplist.info/top-list/health-benefits-of-eating-perch-9085.htm', 'https://www.yummly.com/recipes/perch-fish'),
(7, 'Catfish', 'Catfish are freshwater fish known for their distinctive whisker-like barbels and often having a bottom-dwelling behavior.', 'https://i.pinimg.com/originals/0b/38/f2/0b38f29e018389c0a71a1525f6e2a795.jpg\r\n', 'https://www.healthline.com/nutrition/is-catfish-healthy#:~:text=Catfish%20is%20low%20in%20calories,methods%20like%20baking%20or%20broiling.', 'https://www.tasteofhome.com/collection/catfish-recipes/'),
(8, 'Walleye', 'Walleye is a popular freshwater fish known for its delicious taste and distinctive large, glassy eyes.', 'https://i.pinimg.com/originals/51/9d/2b/519d2b75aeaa1053caf0c05b0aba7d92.jpg\r\n', 'https://www.nutrition-and-you.com/walleye-fish.html', 'https://insanelygoodrecipes.com/walleye-recipes/'),
(9, 'Bass', 'Bass fish are known for their strong fighting spirit and delicious flavour.', 'https://i.pinimg.com/originals/75/de/22/75de226b523a73107af3a41921afe05e.jpg\r\n', 'https://www.verywellfit.com/bass-fish-nutrition-facts-and-health-benefits-5207335#:~:text=Among%20the%20list%20of%20health,and%20combats%20anxiety%20and%20depression.', 'https://insanelygoodrecipes.com/bass-recipes/'),
(10, 'Carp', 'Carp are freshwater fish known for their distinctive scales and bottom-feeding habits.', 'https://i.pinimg.com/originals/7d/79/82/7d7982efaa407018bb6662946c15dbad.jpg\r\n', 'https://www.nutrition-and-you.com/common-carp.html', 'https://cookpad.com/us/search/carp');

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
