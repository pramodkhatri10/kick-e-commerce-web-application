-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 13, 2020 at 09:12 AM
-- Server version: 8.0.18
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kick`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(200) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `size` int(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip_code` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `size` int(20) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `description` text,
  `image` text,
  `brand` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `selling_price`, `description`, `image`, `brand`) VALUES
(9, 'GRANT HILL 2', 150, NULL, 'Originally founded in 1911, FILA began as a humble textile manufacturer in the small town of Biella, Italy, eventually evolving into one of the country’s premier knitwear producers. In the 1960s and 1970s the company began to focus their efforts on sportswear, bringing a sense of individual expression and creativity to new athletic collections.', 'fila.jpg', 'FILA'),
(10, 'MIRAGE ROWAN', 60, NULL, 'Vans’ origin story begins in Anaheim, California in 1966. The Van Doren brothers, Paul and Jim, along with partners Gorden Lee and Serge Delia, opened The Van Doren Rubber Company. Manufacturing shoes on-site for customers, the company’s unique, rubber-soled deck shoes quickly become synonymous with Southern California’s laidback culture and burgeoning skateboarding community.', 'vans.png', 'VANS'),
(11, 'JACKSONS LANDING DRIFT', 120, NULL, 'Features include a classic moccasin construction, a custom fit lacing system and a special sole design for excellent traction on slippery or wet surfaces. Premium, full-grain leather and handsewn vamp for comfort good looks and durability. 360 degree rawhide lacing system. 3/4 leather-covered EVA heel cup for cushioning support. Siped rubber outsole for traction. Upper stitched to rubber midsole, which is cemented to outsole for durability', 'timberland.jpeg', 'TIMBERLAND'),
(12, 'ULTRABOOST RUNNING SHOES', 140, NULL, 'These running shoes prepare kids for action-packed days. Responsive cushioning energizes every stride, and a grippy rubber outsole lets them cut and accelerate without fear of slipping. The textile upper hugs their feet with targeted support.', 'adidas.jpg', 'ADIDAS'),
(13, 'ALESSANDRO GALET SCRITTO', 890, NULL, 'Bringing hot lava vibes, these come with a core black upper and sole. Theres also a core black SPLY-350 branding across a scorching hot core red stripe on both sides. These dropped in November 2016 and retailed at $220. Add more sauce to your sneaker collection and buy now on Kicks. ', 'yeezy.jpg', 'YEEZY BOOST 350 V2 BLACK RED'),
(14, 'SPEED 500 RAPID', 80, NULL, 'A new set of waves are rolling in as the adidas Yeezy Wave Runner 700s get ready for their first restock on March 10th, 2018. First releasing in November of 2017, the Yeezy Boost 700’s represented what was a significant shift in Kanye’s design aesthetic, moving from the minimalistic silhouettes of early Yeezy seasons to this chunky runner model. It once again showed how Kanye stays ahead of the curve, as chunkier sneakers became more en vogue in 2018. The shoe features an upper with grey and black suede overlays, premium leather with blue mesh underlays, neon green laces, and its signature chunky midsole with encapsulated Boost technology.', 'waverunner.jpg', 'YEEZY 700 WAVERUNNER'),
(15, 'AIR MAX 270 REACT', 160, NULL, 'Made with the first-ever Max Air unit created for Nike Sportswear, the Nike Air Max 270 elevates your look and creates cushioned comfort with every step you take. These sneakers are updated to deliver modern comfort, but keep elements of the original Air Max 180 dating back to 1991 and the Air Max 93 from 1993 so you have a sleek look with hints of a throwback feel. ', 'nike.jpg', 'NIKE'),
(16, 'AIR JORDAN 10 RETRO', 200, NULL, 'The 10th iteration of Air Jordan sneakers made waves in the mid ‘90s upon its release, namely because Jordan was in the midst of his professional baseball career. Designed by Tinker Hatfield, this model would go on to reach legendary status as the Air Jordan Retro 10. The Jordan 10 basketball shoes pay homage to MJ’s ground-breaking career, while also delivering performance and style fans loved', 'jordan.jpg', 'JORDAN'),
(17, 'ZIG KINETICA', 140, NULL, 'Taking progressive design inspiration from the early ‘00s, the Reebok Men’s Zig Kinetica shoes bring a futuristic look coupled with amazing comfort to keep you moving for miles. ', 'reebok.jpg', 'REEBOK'),
(18, 'UA VALSETZ RTS', 125, NULL, 'Light and flexible is the name of the game here. A lot of mesh for breathability and Charged Cushioning™ to help protect against impact. Just put on these mesh running shoes for men and run for miles. ?', 'underarmour.jpg', 'UNDERARMOUR'),
(19, 'THE VERROCCHIO DRESS', 650, NULL, 'Created by designer Virgil Abloh, the Air Jordan 1 x OFF-WHITE comes in the classic Chicago colorway. Some of the sneakers half-finished features include a Swoosh connected to the shoe with visible blue stitching, Air printed on the midsole, and an OFF-WHITE zip tie on the collar. The box comes deconstructed as its been turned inside-out with the inside consisting of a black base and gold Jumpman logo, while the outside is plain cardboard with the words Jumpman printed on it. ', 'offwhite.jpg', 'OFF-WHITE AIR JORDAN 1'),
(20, 'Chuck Taylor All Star', 55, NULL, 'Classic Chucks! Converse Chuck Taylor All Star High Top shoes. Canvas upper. Padded insole. Rubber toe cap. Vulcanized rubber outsole. Rubber Converse All Star heel badge. Converse All Star logo on inside of ankle. ', 'converse.jpg', 'CONVERSE'),
(21, 'Chuck Taylor All Star', 55, NULL, 'Classic Chucks! Converse Chuck Taylor All Star High Top shoes. Canvas upper. Padded insole. Rubber toe cap. Vulcanized rubber outsole. Rubber Converse All Star heel badge. Converse All Star logo on inside of ankle. ', 'converse.jpg', 'CONVERSE');

-- --------------------------------------------------------
--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `password` text,
  `address` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip_code` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `address`, `city`, `state`, `zip_code`) VALUES
(7, 'Admin', 'User', 'admin@admin.com', 'admin', 'admin123', '01 Street 01, Country Yard 2,', 'Glenfield', 'Australia', '101202');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
