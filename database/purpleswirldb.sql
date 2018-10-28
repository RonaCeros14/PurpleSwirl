-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 08:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purpleswirldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminaccount`
--

CREATE TABLE `tbl_adminaccount` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userImage` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminaccount`
--

INSERT INTO `tbl_adminaccount` (`username`, `email`, `password`, `firstName`, `lastName`, `userImage`) VALUES
('maymay', '2ndrmzamoras@gmail.com', 'ronarona', 'rona', 'de juan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int(11) NOT NULL,
  `customerType` varchar(15) NOT NULL,
  `customerName` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerorder`
--

CREATE TABLE `tbl_customerorder` (
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `toppingsID` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `totalPrice` float NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  `otherDetails` varchar(80) DEFAULT NULL,
  `adminUserName` varchar(20) DEFAULT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemlist`
--

CREATE TABLE `tbl_itemlist` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemDescription` varchar(80) DEFAULT 'Description not available',
  `measurement` varchar(20) NOT NULL,
  `quantity` double NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemlist`
--

INSERT INTO `tbl_itemlist` (`itemID`, `itemName`, `itemDescription`, `measurement`, `quantity`, `dateUpdated`) VALUES
(4, 'Stay Healthy Yogurt Cup', 'Yogurt brand, ingredient used in creating a delicious frozen yogurt', 'cup', 129, '2018-10-28 02:19:45'),
(5, 'M&Ms Chocolate Flavor', 'Toppings for yogurt. ', 'grams', 280, '2018-10-28 02:23:44'),
(6, 'Paper Cups', 'Paper cups used as a cup for yogurt', 'piece', 126, '2018-10-28 06:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `productID` int(11) NOT NULL,
  `productName` varchar(80) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `unitPrice` double NOT NULL,
  `productImage` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`productID`, `productName`, `productDescription`, `unitPrice`, `productImage`) VALUES
(1, 'New York Cheese Cake (Small)', 'Small size new york cheese cake frozen yogurt', 85, 0x6e6577596f726b43686565736543616b652e6a7067),
(3, 'New York Cheese Cake (Medium)', 'Medium size new york cheese cake frozen yogurt', 100, ''),
(18, 'asdad', 'adadd', 85, ''),
(24, 'saddadg', 'gfddgdg', 225, ''),
(25, 'fsdfdfs', 'sdffs', 100, ''),
(26, 'fggdgdgh', 'sgsddf', 100, ''),
(27, 'fasfds', 'afffd', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitems`
--

CREATE TABLE `tbl_orderitems` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toppings`
--

CREATE TABLE `tbl_toppings` (
  `toppingsID` int(11) NOT NULL,
  `toppingsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toppings`
--

INSERT INTO `tbl_toppings` (`toppingsID`, `toppingsName`) VALUES
(2, 'M&Ms Chocolate Flavor'),
(3, 'Hershey Chocolate Syrup'),
(4, 'Rice Crisps'),
(5, 'Raspberry'),
(6, 'Strawberry'),
(7, 'Kiwi'),
(8, 'Chocolate Snickers'),
(9, 'Marshmallows'),
(10, 'Granola'),
(11, 'Popping Pearls Lychee'),
(12, 'Mango'),
(13, 'Twix'),
(14, 'Pineapple'),
(15, 'Banana'),
(16, 'Almond Flakes'),
(17, 'Chocolate Nutella'),
(18, 'Gummy Bears');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminaccount`
--
ALTER TABLE `tbl_adminaccount`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tbl_customerorder`
--
ALTER TABLE `tbl_customerorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_userName` (`adminUserName`),
  ADD KEY `fk_customerID` (`customerID`),
  ADD KEY `tbl_customerorder_ibfk_1` (`toppingsID`);

--
-- Indexes for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `uq_productName` (`productName`);

--
-- Indexes for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `tbl_toppings`
--
ALTER TABLE `tbl_toppings`
  ADD PRIMARY KEY (`toppingsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customerorder`
--
ALTER TABLE `tbl_customerorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_toppings`
--
ALTER TABLE `tbl_toppings`
  MODIFY `toppingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customerorder`
--
ALTER TABLE `tbl_customerorder`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userName` FOREIGN KEY (`adminUserName`) REFERENCES `tbl_adminaccount` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_customerorder_ibfk_1` FOREIGN KEY (`toppingsID`) REFERENCES `tbl_toppings` (`toppingsID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  ADD CONSTRAINT `tbl_orderitems_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `tbl_customerorder` (`orderID`),
  ADD CONSTRAINT `tbl_orderitems_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `tbl_menu` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
