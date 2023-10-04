-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 10:04 PM
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
(1, 'Koi', 'Koi fish are elegant and colorful freshwater fish often associated with beauty and perseverance.', 'https://th.bing.com/th/id/R.9da8b6d7cb62860a50e18dacb6ab3de6?rik=8YimSHqNGIE2JA&pid=ImgRaw&r=0', 'https://www.americanoceans.org/facts/can-you-eat-koi-fish/#:~:text=Koi%20fish%20have%20a%20rich,most%20parts%20of%20the%20world.', 'https://cookpad.com/us/search/koi'),
(2, 'Trout', 'Trout are freshwater fish known for their distinctive speckled appearance and delicious taste.', 'https://th.bing.com/th/id/R.bbe78ccf12cfc4b596982d121a07fe46?rik=T3nuBVyjpvj%2f3g&riu=http%3a%2f%2fwww.animalspot.net%2fwp-content%2fuploads%2f2012%2f11%2fBrook-Trout-Pictures.jpg&ehk=iY%2fVNpmsXWsr1C%2bjnnFoVDvN4Pe0HX%2b6iOa0hlt3Eac%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1', 'https://www.nutritionadvance.com/rainbow-trout-nutrition-benefits/', 'https://www.foodandwine.com/seafood/fish/trout/trout-recipes'),
(3, 'Salmon', 'Salmon is a nutritious and flavorful fish prized for its pink flesh and rich omega-3 fatty acids.', 'https://th.bing.com/th/id/R.f1316fa05853225245edd0b1f611cf79?rik=u%2fYbFo%2bVp%2bbHdg&pid=ImgRaw&r=0', 'https://www.healthline.com/nutrition/salmon-nutrition-and-health-benefits#4', 'https://www.delish.com/cooking/recipe-ideas/g2039/salmon-recipes/'),
(4, 'Pike', 'Pike is a species of freshwater fish known for its distinctive markings and aggressive behaviour.', 'https://th.bing.com/th/id/R.484ec6c0be245379bff2e988cdef5165?rik=ZwTeP%2f2gPEqOlA&pid=ImgRaw&r=0', 'https://www.webmd.com/diet/what-are-health-benefits-pike#:~:text=As%20a%20high%2Dprotein%20food,your%20bones%20and%20muscles%20strong.', 'https://cookingchew.com/pike-recipes.html'),
(5, 'Bluegill', 'Bluegill is a freshwater fish species native to North America.', 'https://th.bing.com/th/id/OIP._6jI3q05-BYUr0UmWebjLAHaE2?pid=ImgDet&rs=1', 'https://healthfully.com/543501-nutritional-value-of-bluegills.html', 'https://www.tasteofhome.com/recipes/bluegill-parmesan/'),
(6, 'Perch', 'Perch is a freshwater fish known for its small size and distinctive spiny dorsal fin.', 'https://th.bing.com/th/id/R.b7cc79e498dc97de277303a987375c10?rik=bIBW1bXJyiAofg&pid=ImgRaw&r=0', 'https://toplist.info/top-list/health-benefits-of-eating-perch-9085.htm', 'https://www.yummly.com/recipes/perch-fish'),
(7, 'Catfish', 'Catfish are freshwater fish known for their distinctive whisker-like barbels and often having a bottom-dwelling behavior.', 'https://th.bing.com/th/id/OIP.5LujS28-cbi31sNpO4vaqgHaE5?pid=ImgDet&rs=1', 'https://www.healthline.com/nutrition/is-catfish-healthy#:~:text=Catfish%20is%20low%20in%20calories,methods%20like%20baking%20or%20broiling.', 'https://www.tasteofhome.com/collection/catfish-recipes/'),
(8, 'Walleye', 'Walleye is a popular freshwater fish known for its delicious taste and distinctive large, glassy eyes.', 'https://th.bing.com/th/id/OIP.4Uu0MRsC_q9BBNjqZzryJgHaEK?pid=ImgDet&rs=1', 'https://www.nutrition-and-you.com/walleye-fish.html', 'https://insanelygoodrecipes.com/walleye-recipes/'),
(9, 'Bass', 'Bass fish are known for their strong fighting spirit and delicious flavour.', 'https://th.bing.com/th/id/OIP.cMX4stKPkldmj61tP7Yl6AHaE-?pid=ImgDet&rs=1', 'https://www.verywellfit.com/bass-fish-nutrition-facts-and-health-benefits-5207335#:~:text=Among%20the%20list%20of%20health,and%20combats%20anxiety%20and%20depression.', 'https://insanelygoodrecipes.com/bass-recipes/'),
(10, 'Carp', 'Carp are freshwater fish known for their distinctive scales and bottom-feeding habits.', 'https://th.bing.com/th/id/OIP._r4OqD_WZU_YTVrnjWkJngHaE8?pid=ImgDet&rs=1', 'https://www.nutrition-and-you.com/common-carp.html', 'https://cookpad.com/us/search/carp');

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
