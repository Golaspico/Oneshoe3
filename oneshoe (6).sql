-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 03:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneshoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartsID` int(11) NOT NULL,
  `UsersID` int(11) NOT NULL,
  `ProductsID` int(11) NOT NULL,
  `SizesID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `Color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartsID`, `UsersID`, `ProductsID`, `SizesID`, `Amount`, `Price`, `TotalAmount`, `OrderID`, `Color`) VALUES
(69, 13, 29, 18, 45, 350, 15750, 4, 'Gray'),
(70, 13, 30, 24, 32, 30, 960, 4, 'Gray'),
(71, 16, 28, 29, 7, 32, 224, 0, 'White'),
(72, 16, 29, 22, 12, 350, 4200, 0, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UsersID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UsersID`, `Status`, `Message`, `Date`) VALUES
(1, 13, 1, 'Completed', '2016-09-12 16:47:48'),
(2, 13, 1, 'Completed', '2016-09-12 16:47:48'),
(3, 13, 1, 'Completed', '2016-09-16 16:47:48'),
(4, 13, 1, 'Completed', '2016-09-18 16:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductsID` int(11) NOT NULL,
  `UsersID` int(11) NOT NULL,
  `ProductName` text NOT NULL,
  `ProductPrice` float(11,0) NOT NULL,
  `Image` text NOT NULL,
  `Category` int(11) NOT NULL DEFAULT '1',
  `Details` text NOT NULL,
  `Status` int(11) DEFAULT '0',
  `Stocks` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductsID`, `UsersID`, `ProductName`, `ProductPrice`, `Image`, `Category`, `Details`, `Status`, `Stocks`) VALUES
(28, 11, 'Captain America Slippers', 32, 'kslippers4.jpg', 8, 'Kids Hero', 1, 32),
(29, 11, 'Minions Slippers', 350, 'kslippers1.jpg', 8, 'Banana Slippers', 1, 10),
(30, 11, 'SpiderMan Slippers', 30, 'kslippers5.jpg', 8, 'Tsinelas', 1, 40),
(31, 11, 'Leather Boots', 500, 'mleather1.jpg', 1, 'Leather', 1, 30),
(34, 17, 'Heels', 1234, 'gwedges5.jpg', 5, 'Heels', 1, 21),
(35, 17, 'Testing Product', 30, 'mslippers1.jpg', 3, 'tisnala', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `SizesID` int(11) NOT NULL,
  `ProductsID` int(11) NOT NULL,
  `Size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`SizesID`, `ProductsID`, `Size`) VALUES
(1, 25, 23),
(2, 25, 43),
(3, 25, 23),
(4, 25, 12),
(5, 26, 12),
(6, 26, 14),
(7, 26, 16),
(8, 26, 20),
(9, 27, 30),
(10, 27, 31),
(11, 27, 33),
(12, 27, 38),
(13, 28, 24),
(14, 28, 26),
(15, 28, 29),
(16, 28, 32),
(17, 29, 14),
(18, 29, 17),
(19, 29, 18),
(20, 29, 22),
(21, 30, 16),
(22, 30, 19),
(23, 30, 20),
(24, 30, 24),
(25, 31, 30),
(26, 31, 31),
(27, 31, 32),
(28, 31, 33),
(29, 0, 36),
(30, 0, 37),
(31, 0, 38),
(32, 0, 39),
(33, 0, 36),
(34, 0, 37),
(35, 0, 38),
(36, 0, 39),
(37, 0, 36),
(38, 0, 37),
(39, 0, 38),
(40, 0, 39),
(41, 0, 36),
(42, 0, 37),
(43, 0, 38),
(44, 0, 39),
(45, 0, 36),
(46, 0, 37),
(47, 0, 38),
(48, 0, 39),
(49, 32, 31),
(50, 32, 32),
(51, 32, 33),
(52, 32, 34),
(53, 33, 36),
(54, 33, 37),
(55, 33, 38),
(56, 33, 39),
(57, 34, 36),
(58, 34, 37),
(59, 34, 38),
(60, 34, 39),
(61, 35, 30),
(62, 35, 31),
(63, 35, 32),
(64, 35, 33);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_paypal`
--

CREATE TABLE `transaction_paypal` (
  `Id` int(11) NOT NULL,
  `UsersID` int(11) NOT NULL,
  `PaymentID` varchar(255) NOT NULL,
  `Hash` varchar(255) NOT NULL,
  `Complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_paypal`
--

INSERT INTO `transaction_paypal` (`Id`, `UsersID`, `PaymentID`, `Hash`, `Complete`) VALUES
(0, 13, 'PAY-7SD740577B518232JK7K2IHI', 'a71749eea7b04165284472025b017477', 0),
(0, 13, 'PAY-9GY225114D087715AK7K25AQ', '359b455eb69d96e37031933e604fe180', 0),
(0, 13, 'PAY-0RJ902206E9720300K7K25OY', '94d0b9b80c1765fe885bf7562287d0ad', 0),
(0, 13, 'PAY-7XD00958AU4638935K7K3ABA', 'b165b74a59ccbd44c758ae36847c570f', 0),
(0, 13, 'PAY-2LM70848MV3343802K7K3BHI', '5b723bfff2b0c24d55acbb105d914456', 0),
(0, 13, 'PAY-1P051276AB214650SK7K3DXY', '36f284b386bbedcf576d0f9e5867e95a', 0),
(0, 13, 'PAY-2CB943424D313963NK7K3F6Y', '3bba49a188ab569bd161c8e3fb4a96f2', 0),
(0, 13, 'PAY-6V408469S05560126K7K3IEI', '9da26ed96a8f2382de7690017d87feb8', 0),
(0, 13, 'PAY-2WM59563KT339830UK7K3LWI', '594f77d85cc077f10d1bb9ac8b56e77a', 0),
(0, 13, 'PAY-82410997CA616492SK7K3MBQ', '864152a0bcf5e49a6f6f42cf594c0423', 0),
(0, 13, 'PAY-2GD47391E6791425NK7LKKJI', '0926c70936b2478baa933cd9428f6734', 0),
(0, 13, 'PAY-3AC888410P582041TK7LLS2A', 'b1f457234c47a0fa7736f3b3114f481a', 0),
(0, 13, 'PAY-4U784253D14343057K7LL7QI', '5db66d8fa931352fde6807e7fa5daad9', 0),
(0, 13, 'PAY-25323602L93289238K7LMEZA', '93cfc8370b3c0b5bbb53a486c638ee20', 0),
(0, 13, 'PAY-0JD42895P8031394KK7LMQ3I', '2098a61eaedcbe0efefd3d2a8914c4f0', 0),
(0, 13, 'PAY-9XC2410755200742UK7LMQ4Y', '520e6ebd57538e7d5dc49dbd62a16bb5', 0),
(0, 13, 'PAY-4YU7256997099093RK7LMQ6A', 'a7fb4dabffad6b102216bd392df29b2c', 0),
(0, 13, 'PAY-79336110NJ406004WK7LMRVA', '23e2ab2877ebff4afe7183eb476dba76', 0),
(0, 13, 'PAY-8VW84552CM559781YK7LNTHQ', '1d6d73a4c13c24b2d6bde0ebaacba389', 0),
(0, 13, 'PAY-5V987854CF289060CK7LNVJQ', 'd4c6b8243013d9293be037a9d2d2f511', 0),
(0, 13, 'PAY-4AR51048AE415670CK7LNV4A', 'c366c654c9295497e4b63a4bb4c8a717', 0),
(0, 13, 'PAY-56Y48367LA449144WK7LNW7I', 'ef462c26c046958ec9346569ad886c05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UsersID` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `FullName` text NOT NULL,
  `Address` text NOT NULL,
  `Email` text NOT NULL,
  `Role` int(11) DEFAULT '0',
  `Profile` varchar(255) DEFAULT '../../images/profile/default_profile.jpg',
  `member` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UsersID`, `UserName`, `Password`, `FullName`, `Address`, `Email`, `Role`, `Profile`, `member`) VALUES
(1, 'JohnMayer', '94a07738a4a7bff8919453bc98bc6a6c', 'John Smith', 'Address', 'hwoarang@yahoo.com', 2, '../../images/profile/7pjiadhul6e69n6', 0),
(11, 'Merchant', '0cef1fb10f60529028a71f58e54ed07b', 'Ejercito Yu', '456 pantaleon st. Hulo Mandaluyong', 'merchant@solesearch.com', 1, '../../images/profile/odurhkcl6znouq0', 0),
(12, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Main Admin', 'Address', 'admin@solesearch.com', 2, '../../images/profile/qo4e5wcgh0n0bey', 0),
(13, 'Customer', '0cef1fb10f60529028a71f58e54ed07b', 'Juan Delacruz', '123 Pinas', 'customer@solesearch.com', 0, '../../images/profile/rm4gnegoa4vfgmf', 0),
(15, 'Bea Labrague', '402fd6af80d80e346b96c89d37aae805', 'Bea Marie', 'San Joaquin, Pasig City', 'bealabrague@yahoo.com.ph', 2, '../../images/profile/default_profile.jpg', 0),
(16, 'Anne', 'cad62f11e507f72776e1d1ec9ba6a244', 'Rose Ann Boa', '876 Plainview, Fabella St. Mandaluyong City', 'boa_roseann@yahoo.com', 0, '../../images/profile/default_profile.jpg', 0),
(17, 'Shoe Factory', '2cc0ee2e7eb2b7ca2974dd0559a4631a', 'Bea Labrague', 'Pasig City', 'beyalabrague@yahoo.com.ph', 1, '../../images/profile/default_profile.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartsID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductsID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`SizesID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UsersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `SizesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UsersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
