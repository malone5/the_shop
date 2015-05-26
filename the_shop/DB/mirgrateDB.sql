-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 07:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
`cartID` int(5) NOT NULL,
  `userID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vendorID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `productID` smallint(10) NOT NULL,
  `item_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`) VALUES
('Cleats'),
('Equipment'),
('Jerseys'),
('Other'),
('Soccer Balls'),
('Training');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE IF NOT EXISTS `product_master` (
`productID` smallint(10) NOT NULL,
  `userID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `features` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `constraints` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_amt` decimal(10,2) NOT NULL,
  `approved` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`productID`, `userID`, `item_name`, `category`, `image_url`, `description`, `features`, `constraints`, `price`, `discount_amt`, `approved`) VALUES
(13, 'SoccerWorldInc', 'South African Confederations Cup Match Ball', 'Soccer Balls', 'http://www.soccerfans.com/images/_full/ADI_80080_E.jpeg', '                2009 match ball design from the 2009 Confederations Cup. Inspired by the following World Cup year in South Africa.              ', '              High Quality Latex, FIFA Approved, Professional Match Quality              ', 'No refunds', '90.00', '10.00', 'Yes'),
(14, 'SoccerWorldInc', 'Red/Green/Blue Match Ball', 'Soccer Balls', 'http://www.soccergarage.com/images/T/M36927.jpg', 'Quality match ball used at the highest level of play. ', 'Pro Match level Quality, Premium Product', 'N/A', '150.00', '0.00', 'Yes'),
(15, 'SoccerWorldInc', 'Training Ball [Orange]', 'Soccer Balls', 'http://www.soccergarage.com/images/T/M36889-01.jpg', 'Affordable option for training and buying in bulk. ', 'Nylon Cover', 'N/A', '20.00', '5.00', 'Yes'),
(16, 'SoccerWorldInc', '"The Rock" Training Ball', 'Soccer Balls', 'http://www.soccergarage.com/images/T/5-62.jpg', 'Affordable training soccer ball. PVC stitching.', 'Made for heavy use and tough conditions', 'This is not a match quality ball.', '17.00', '0.00', 'Yes'),
(17, 'SoccerWorldInc', 'Girly Foo Foo Ball', 'Soccer Balls', 'http://www.soccergarage.com/images/T/adidas%20sala%20ball.jpg', 'You better have great ball control or you are going to look like a fool using this ball.', 'Attach all the attention, good or bad.', 'If you are a guy you will be made fun of.', '35.00', '5.00', 'Yes'),
(18, 'SoccerWorldInc', 'Training Jersey Black/Silver pattern', 'Jerseys', 'http://www.soccergarage.com/images/T/G74076_01.jpg', 'Sleek design with more diamonds then you can imagine! Look good. Play good.', 'Polyester', 'N/A', '45.00', '3.99', 'Yes'),
(19, 'SoccerWorldInc', 'Match Quality Jersey [Navy]', 'Jerseys', 'http://www.soccergarage.com/images/T/navyfront.jpg', 'This navy jersey made of high quality CLIMACOOL technology will survive the toughest conditions', 'Polyester Interlock', 'This shirt will burn if you light it on fire', '65.00', '0.00', 'No'),
(20, 'SoccerWorldInc', 'Training Jersey Black/Silver pattern', 'Jerseys', 'http://www.soccergarage.com/images/T/G74076_01.jpg', 'Sleek design with more diamonds then you can imagine! Look good. Play good.', 'Polyester', 'N/A', '45.00', '3.99', 'No'),
(21, 'SoccerWorldInc', 'High Quality Training Jersey', 'Jerseys', 'http://www.soccergarage.com/images/T/tabela%2014%20jer%20sky.jpg', 'Training jersey made of high quality material will leave you looking good for the ladies as you score in more ways then one.', 'Polyester Interlock', 'May make you too sexy.', '54.99', '9.99', 'Yes'),
(22, 'SoccerWorldInc', 'High Quality Training Jersey', 'Jerseys', 'http://www.soccergarage.com/images/T/tabela%2014%20jer%20sky.jpg', 'Training jersey made of high quality material will leave you looking good for the ladies as you score in more ways then one.', 'Polyester Interlock', 'May make you too sexy.', '54.99', '9.99', 'Yes'),
(23, 'SoccerWorldInc', 'High Quality Training Jersey', 'Jerseys', 'http://www.soccergarage.com/images/T/tabela%2014%20jer%20sky.jpg', 'Training jersey made of high quality material will leave you looking good for the ladies as you score in more ways then one.', 'Polyester Interlock', 'May make you too sexy.', '54.99', '9.99', 'No'),
(24, 'SoccerWorldInc', 'High Quality Training Jersey', 'Jerseys', 'http://www.soccergarage.com/images/T/tabela%2014%20jer%20sky.jpg', 'Training jersey made of high quality material will leave you looking good for the ladies as you score in more ways then one.', 'Polyester Interlock', 'May make you too sexy.', '54.99', '9.99', 'Yes'),
(25, 'SoccerWorldInc', 'Training Vest [Yellow] 22-Pack', 'Training', 'http://www.soccergarage.com/images/D/1052-1.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'Yes'),
(26, 'SoccerWorldInc', 'Training Vest [Yellow] 22-Pack', 'Training', 'http://www.soccergarage.com/images/D/1052-1.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'Yes'),
(27, 'SoccerWorldInc', 'Training Vest [Yellow] 22-Pack', 'Training', 'http://www.soccergarage.com/images/D/1052-1.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'Yes'),
(28, 'SoccerWorldInc', 'Training Vest [Yellow] 22-Pack', 'Training', 'http://www.soccergarage.com/images/D/1052-1.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'No'),
(29, 'SoccerWorldInc', 'Training Vest [Orange] 22-Pack', 'Training', 'http://www.soccergarage.com/images/T/1052.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'Yes'),
(30, 'SoccerWorldInc', 'Training Vest [Orange] 22-Pack', 'Training', 'http://www.soccergarage.com/images/T/1052.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'No'),
(31, 'SoccerWorldInc', 'Training Vest [Orange] 22-Pack', 'Training', 'http://www.soccergarage.com/images/T/1052.jpg', 'Training vests great for organizing scrimmages and pickup games', 'Tight fit for all.', 'May make you too sexy.', '120.00', '15.00', 'Yes'),
(32, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRX FG BLACK/CORE', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Lining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '80.00', '0.00', 'Yes'),
(33, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRX FG BLACK/CORE PRO', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Pro Level.\r\nLining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '120.00', '0.00', 'No'),
(34, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRAINER', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Training Level\r\nLining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '60.00', '0.00', 'Yes'),
(35, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRAINER', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Training Level\r\nLining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '60.00', '0.00', 'Yes'),
(36, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRAINER', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Training Level\r\nLining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '60.00', '0.00', 'No'),
(37, 'FutbalGear', 'ADIDAS ADIPURE 11PRO TRAINER', 'Cleats', 'http://www.soccergarage.com/images/T/11pro%20m17744.jpg', 'Put on and play. The 11pro pairs pitch proven design with unrivaled fit and feel right from the box. Comfort outsole has smaller and more numerous studs to penetrate firm ground and a Comfort Frame to distribute pressure.', 'Training Level\r\nLining: Comfort suede lining keeps the upper especially soft for a comfort fit.\r\nInlay: Memory foam molds to the foot for a custom fit.', 'Firm Ground Only', '60.00', '0.00', 'Yes'),
(38, 'FutbalGear', '6 FOOT POP UP SOCCER GOALS', 'Equipment', 'http://www.soccergarage.com/images/T/ppbg.jpg', 'For quick games anywhere', 'Weighs less than 7 lbs per goal.\r\nAnchoring pegs.\r\nFolds down to a 1-in flat oval.\r\nIncludes carry bag.', 'N/A', '40.00', '10.00', 'Yes'),
(39, 'FutbalGear', 'INSTA-BENCH BLACK 6-SEATER', 'Equipment', 'http://www.soccergarage.com/images/P/Picture12-01.jpg', 'These Insta Bench portable folding benches are great for soccer games and other sporting events. They feature:', 'Heavy-duty steel frame holds up to 250 lbs per seat.\r\n\r\nFolded-up bench is compact, lightweight and portable carry bag has adjustable shoulder strap and reinforced bottom.\r\n\r\nStorage net along one side of bench.\r\n\r\nPerfect for sidelines, tailgate parties, camping, picnics, or anytime extra seating is needed.', 'Closed bench & bag measure only 18" x 6" x 25" and weighing only 20 lbs.', '50.00', '10.00', 'Yes'),
(40, 'FutbalGear', 'INSTA-BENCH BLUE 6-SEATER', 'Equipment', 'http://www.soccergarage.com/images/P/Picture12.jpg', 'These Insta Bench portable folding benches are great for soccer games and other sporting events. They feature:', 'Heavy-duty steel frame holds up to 250 lbs per seat.\r\n\r\nFolded-up bench is compact, lightweight and portable carry bag has adjustable shoulder strap and reinforced bottom.\r\n\r\nStorage net along one side of bench.\r\n\r\nPerfect for sidelines, tailgate parties, camping, picnics, or anytime extra seating is needed.', 'Closed bench & bag measure only 18" x 6" x 25" and weighing only 20 lbs.', '50.00', '10.00', 'Yes'),
(41, 'FutbalGear', 'INSTA-BENCH BLUE 6-SEATER', 'Equipment', 'http://www.soccergarage.com/images/P/Picture12.jpg', 'These Insta Bench portable folding benches are great for soccer games and other sporting events. They feature:', 'Heavy-duty steel frame holds up to 250 lbs per seat.\r\n\r\nFolded-up bench is compact, lightweight and portable carry bag has adjustable shoulder strap and reinforced bottom.\r\n\r\nStorage net along one side of bench.\r\n\r\nPerfect for sidelines, tailgate parties, camping, picnics, or anytime extra seating is needed.', 'Closed bench & bag measure only 18" x 6" x 25" and weighing only 20 lbs.', '50.00', '10.00', 'No'),
(42, 'FutbalGear', 'INSTA-BENCH RED 6-SEATER', 'Equipment', 'http://www.soccergarage.com/images/P/Picture1-10.jpg', 'These Insta Bench portable folding benches are great for soccer games and other sporting events. They feature:', 'Heavy-duty steel frame holds up to 250 lbs per seat.\r\n\r\nFolded-up bench is compact, lightweight and portable carry bag has adjustable shoulder strap and reinforced bottom.\r\n\r\nStorage net along one side of bench.\r\n\r\nPerfect for sidelines, tailgate parties, camping, picnics, or anytime extra seating is needed.', 'Closed bench & bag measure only 18" x 6" x 25" and weighing only 20 lbs.', '50.00', '10.00', 'Yes'),
(43, 'FutbalGear', 'INSTA-BENCH RED 6-SEATER', 'Equipment', 'http://www.soccergarage.com/images/P/Picture1-10.jpg', 'These Insta Bench portable folding benches are great for soccer games and other sporting events. They feature:', 'Heavy-duty steel frame holds up to 250 lbs per seat.\r\n\r\nFolded-up bench is compact, lightweight and portable carry bag has adjustable shoulder strap and reinforced bottom.\r\n\r\nStorage net along one side of bench.\r\n\r\nPerfect for sidelines, tailgate parties, camping, picnics, or anytime extra seating is needed.', 'Closed bench & bag measure only 18" x 6" x 25" and weighing only 20 lbs.', '50.00', '10.00', 'No'),
(44, 'FutbalGear', 'ADIDAS F50 ADIZERO Yellow/Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/D67119_Front.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'Yes'),
(45, 'FutbalGear', 'ADIDAS F50 ADIZERO Yellow/Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/D67119_Front.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'Yes'),
(46, 'FutbalGear', 'ADIDAS F50 ADIZERO Yellow/Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/D67119_Front.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'Yes'),
(47, 'FutbalGear', 'ADIDAS F50 ADIZERO Yellow/Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/D67119_Front.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'No'),
(48, 'FutbalGear', 'ADIDAS F50 ADIZERO Full Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/F32693a.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'Yes'),
(49, 'FutbalGear', 'ADIDAS F50 ADIZERO Full Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/F32693a.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'Yes'),
(50, 'FutbalGear', 'ADIDAS F50 ADIZERO Full Orange Cleat', 'Cleats', 'http://www.soccergarage.com/images/T/F32693a.jpg', 'When being the fastest on the pitch is a given, the F50 Adizero goes beyond. Supersoft Hybridtouch upper, Dribbletex 3D grip texture and SPEEDTRAXION studs rapidly accelerate on firm ground. Comes miCoach ready.', 'Upper: Hybridtouch supersoft upper material \r\nInsole: Internal SPRINTWEB \r\nOutsole: SPEEDTRAXION outsole with a new high-speed stud', 'Runs Small', '75.00', '5.00', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`transID` smallint(10) NOT NULL,
  `userID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vendorID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `productID` smallint(10) NOT NULL,
  `item_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `action` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `userID`, `vendorID`, `productID`, `item_name`, `price`, `action`, `status`, `date`) VALUES
(9, 'Customer_Sean', 'FutbalGear', 38, '6 FOOT POP UP SOCCER GOALS', '30.00', 'Ordered', 'Processing', '2015-04-28 00:58:46'),
(10, 'Customer_Sean', 'SoccerWorldInc', 18, 'Training Jersey Black/Silver pattern', '41.01', 'Ordered', 'Shipped', '2015-04-28 00:58:46'),
(11, 'Customer_Sean', 'FutbalGear', 32, 'ADIDAS ADIPURE 11PRO TRX FG BLACK/CORE', '80.00', 'Ordered', 'Processing', '2015-04-28 00:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `psword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `credit_card` int(16) NOT NULL,
  `role` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `approved` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `psword`, `fname`, `lname`, `address`, `city`, `state`, `zip`, `email`, `phone`, `credit_card`, `role`, `approved`) VALUES
('admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Sean', 'M', '5 Main St', 'NYC', 'NY', 0, 'test@test.com', '1111111111', 0, 'Admin', 'Yes'),
('Customer_Sean', 'b39f008e318efd2bb988d724a161b61c6909677f', 'Sean', 'Malone', '543 Bayview Ave', 'Galloway', 'AL', 12345, 's0795687@monmouth.edu', '111-111-1111', 2147483647, 'Customer', 'No'),
('FutbalGear', 'd0e143026d072d00bfd1dae50f65b6b3111e0a40', 'Hanna', 'Renalt', '432 Fake St', 'Galloway', 'NJ', 0, 's0795687@monmouth.edu', '111-111-1111', 2147483647, 'Vendor', 'Yes'),
('SoccerWorldInc', '5c17fa03e6d5fc247565e1cd8ffa70e1bfe5b8d9', 'Mark', 'Joyner', '342', 'Williamsburg', 'AL', 13453, 's0795687@monmouth.edu', '111-111-1111', 2147483647, 'Vendor', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
 ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
 ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
MODIFY `cartID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
MODIFY `productID` smallint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transID` smallint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
