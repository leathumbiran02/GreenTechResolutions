-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 03:36 PM
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

INSERT INTO plant_details (plant_details_id, plant_name, description, image, health_benefits, recipe) VALUES
(1, 'Tomato', 'Tomato is a versatile and delicious fruit commonly used in various culinary dishes.', 'https://th.bing.com/th/id/OIP.NNiG9NKcVyJ8fPh66V3WSgHaFW?pid=ImgDet&rs=1', 'https://www.health.com/nutrition/health-benefits-tomatoes', 'https://www.delish.com/cooking/g1448/quick-easy-tomato-recipes/'),
(2, 'Cauliflower', 'Cauliflower is a nutritious vegetable with a mild, versatile flavor.', 'https://th.bing.com/th/id/R.a9bb5f4e2784a4e038cbae92634cef10?rik=WkEZnPmHt7FiNQ&riu=http%3a%2f%2fnutrawiki.org%2fwp-content%2fuploads%2f2015%2f09%2fCauliflower.jpg&ehk=McP9NlaloU%2bdei9SFVtIx%2fNOFu1Xsc1nnFpasDVm4xI%3d&risl=&pid=ImgRaw&r=0', 'https://www.medicalnewstoday.com/articles/282844', 'https://www.delish.com/cooking/recipe-ideas/g2861/cauliflower-recipes/'),
(3, 'Spinach', 'Spinach is a nutritious leafy green vegetable packed with vitamins and minerals.', 'https://cdn.mos.cms.futurecdn.net/atyrpYQoxdoTzmEgu8HMWE-1200-80.jpg', 'https://pharmeasy.in/blog/15-reasons-why-spinach-is-called-a-superfood/', 'https://www.delish.com/cooking/g2013/spinach/'),
(4, 'Carrot', 'The carrot is a nutritious orange root vegetable.', 'https://th.bing.com/th/id/R.2f44d15737bd7c1f6bd5d843ec289879?rik=MGTrOg5HZ5jVCQ&pid=ImgRaw&r=0', 'https://www.health.com/nutrition/health-benefits-of-carrots#:~:text=Carrots%20are%20full%20of%20benefits,this%20vegetable%20into%20your%20diet.', 'https://www.delish.com/cooking/g929/carrot-recipes/'),
(5, 'Broccoli', 'Broccoli is a nutritious green vegetable.', 'https://th.bing.com/th/id/R.60331a2e67ae8eadeeba0cd68363d114?rik=ZwcO9IoH6suCyw&riu=http%3a%2f%2f2.bp.blogspot.com%2f-jWeRRnyX-VE%2fWQX674gHsLI%2fAAAAAAAABkU%2ftAoB82mDfY0oRe9RU0t4KMUrT9wL8s74ACK4B%2fs1600%2fbroccoli.jpg&ehk=g7eLMymMcibpJDqh%2fxj1tJWeld3lGdv4LAg76SPTrkM%3d&risl=&pid=ImgRaw&r=0', 'https://www.health.com/food/health-benefits-broccoli', 'https://www.delish.com/cooking/nutrition/g241/broccoli-recipes/'),
(6, 'Bell pepper', 'Bell pepper is a sweet and colorful vegetable.', 'https://th.bing.com/th/id/OIP.wZfzxUAZIGewi3SEIzI43wHaJ4?pid=ImgDet&rs=1', 'https://www.healthline.com/nutrition/foods/bell-peppers', 'https://www.delish.com/cooking/recipe-ideas/g40327395/bell-pepper-recipes/'),
(7, ' Strawberries', 'Strawberries are sweet, juicy, and vibrant red fruits loved by many.', 'https://th.bing.com/th/id/OIP.fR3uGTXu0iwcQ9jHnItVzQHaLH?pid=ImgDet&rs=1', 'https://www.healthline.com/nutrition/foods/strawberries', 'https://www.delish.com/cooking/g906/strawberry-desserts-round-up/'),
(8, 'Blueberries', 'Blueberries are small, delicious, and nutritious fruits.', 'https://th.bing.com/th/id/OIP.9wCxblC6uhozuXdGYOFV2AHaFj?pid=ImgDet&rs=1', 'https://www.healthline.com/nutrition/10-proven-benefits-of-blueberries', 'https://www.delish.com/cooking/recipe-ideas/g97/blueberry-desserts-recipes/'); 

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
  MODIFY `plant_details_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
