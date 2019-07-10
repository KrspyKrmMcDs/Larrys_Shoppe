-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 04:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larrys_shoppe`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `date`, `first_name`, `last_name`, `street`, `city`, `state`, `zip`, `phone`, `email`) VALUES
(1, '2019-02-13 20:31:46', 'Brent', 'Futterman', '123 Pointer Drive', 'Winston-Salem', 'NC', '27023', '9996661234', 'b_rent@gmail.com'),
(2, '2019-02-13 20:45:42', 'Jack', 'Charles', '134 Data Field Road', 'Winston-Salem', 'NC', '27012', '3369996545', 'jChar@gmail.com'),
(3, '2019-02-13 20:45:42', 'Carol', 'Osbourne', '146 Smith Creek Way', 'Greensboro', 'NC', '27456', '3365551236', 'carol_o@gmail.com'),
(4, '2019-02-13 20:45:42', 'Price', 'Wheeler', '7789 Lawndale Drive', 'Greensboro', 'NC', '27458', '3365541234', 'wheeler@gmail.com'),
(5, '2019-02-13 20:45:42', 'Berry', 'Weiman', '556 Chester Lane', 'Greensboro', 'NC', '27495', '3365547894', 'berry@me.com'),
(6, '2019-02-13 20:45:42', 'Barbara', 'Jefferson', '345 Array Way', 'Winston-Salem', 'NC', '27045', '2223355478', 'Barb@hotmail.com'),
(7, '2019-02-13 20:45:42', 'Jerry', 'Anderson', '222 Syntax Drive', 'Thomasville', 'NC', '27990', '8895461235', 'JerAnd@gmail.com'),
(8, '2019-02-13 20:45:42', 'Perry', 'Armstrong', '3345 Deer Creek Drive', 'High Point', 'NC', '27123', '5566651236', 'parmstrong@yahoo.com'),
(9, '2019-02-13 20:45:42', 'Abdul', 'Amari', '2234 For Loop Road', 'High Point', 'NC', '27163', '5578955646', 'abdul@gmail.com'),
(10, '2019-02-13 20:45:42', 'Tyron', 'Crawford', '899 Greenway Drive', 'Winston-Salem', 'NC', '27025', '5564551236', 'TyCraw@gmail.com'),
(29, '2019-03-18 02:08:50', 'Larry', 'Baynes', '239 Kello Drive', 'Greensboro', 'NC', '27455', '9995556321', 'jacob@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `date`, `first_name`, `last_name`, `street`, `city`, `state`, `zip`, `phone`, `email`) VALUES
(1, '2019-02-14 13:07:25', 'John', 'Wayne', '149 Driver Drive', 'Greensboro', 'NC', '27455', '6699874563', 'PatWay@gmail.com'),
(2, '2019-02-14 13:07:25', 'Renae', 'Bradford', '7789 Select Road', 'Greensboro', 'NC', '27458', '3355569874', 'Bradford@gmail.com'),
(3, '2019-02-14 13:07:25', 'Rachel', 'Howard', '987 Harley Lane', 'Greensboro', 'NC', '27468', '6674568899', 'gerward@gmail.com'),
(4, '2019-02-14 13:07:25', 'Timothy', 'Kronish', '234 Switch Road', 'Greensboro', 'NC', '27436', '5567894561', 'kronish@gmail.com'),
(5, '2019-02-14 13:07:25', 'Jennifer', 'Towers', '556 Cotswald Avenue', 'Greensboro', 'NC', '27456', '3369784562', 'towers@gmail.com'),
(6, '2019-02-14 13:07:25', 'Dylan', 'Dawn', '1992 Pearson Drive', 'Greensboro', 'NC', '27451', '3325641230', 'g_dawn@gmail.com'),
(7, '2019-02-14 13:07:25', 'Jeremy', 'Rogan', '104 Lady Bird Drive', 'Greensboro', 'NC', '27453', '3365541205', 'rogan@gmail.com'),
(8, '2019-02-14 13:07:25', 'Linda', 'Andrews', '4568 Kello Drive', 'Greensboro', 'NC', '27455', '3354561234', 'andrews@gmail.com'),
(9, '2019-02-14 13:07:25', 'Mary', 'Johnson', '1876 Wolf Court', 'Greensboro', 'NC', '27485', '3362145698', 'avery@gmail.com'),
(10, '2019-02-14 13:07:25', 'Derrick', 'Lawry', '258 Willow Drive', 'Greensboro', 'NC', '27465', '2588966541', 'tish@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` varchar(250) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `quantity_in_stock` int(50) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `creation_date`, `update_date`, `description`, `price`, `quantity_in_stock`, `vendor_id`) VALUES
(21, '2019-02-14 00:23:19', '2019-05-06 00:08:20', 'StudioSuits Vintage Glasgow Brown Tweed Suit', '220.00', 8, 10),
(22, '2019-02-14 00:23:19', '2019-05-06 00:08:20', 'Kenneth Cole Reaction Men\'s Techni-Cole Solid Black Slim-Fit Suit', '158.00', 2, 7),
(23, '2019-02-14 00:23:19', '2019-05-05 14:10:47', 'Combatant Gentlemen Blue Slim Fit Suit', '160.00', 5, 3),
(24, '2019-02-14 00:23:19', '2019-04-22 00:34:41', 'Vintage Flat Green Herringbone Tweed Suit', '220.00', 8, 2),
(25, '2019-02-14 00:23:19', '2019-04-18 20:13:15', 'Black Red 4 Button Single Breasted Vested Suit with Bold Paisley Vest', '127.00', 9, 1),
(26, '2019-02-14 00:23:19', '0000-00-00 00:00:00', 'Men\'s Ted Baker London Jay Trim Fit Suit', '798.00', 2, 6),
(27, '2019-02-14 00:23:19', '0000-00-00 00:00:00', 'Italy Pleated Pants Vested Suits Mens 3 Piece Regular Fit Burgundy', '149.00', 9, 5),
(28, '2019-02-14 00:23:19', '0000-00-00 00:00:00', 'Lauren Ralph Lauren Men\'s Blue Plaid Suit - Bright Navy', '300.00', 5, 8),
(29, '2019-02-14 00:23:19', '2019-04-18 21:03:37', 'Tweed Wool Suiting Multi Fabric', '9.00', 13, 9),
(30, '2019-02-14 00:23:19', '2019-04-18 21:03:37', 'Royal Blue Gabardine Fabric', '5.00', 19, 4),
(31, '2019-03-29 19:39:14', '2019-04-14 02:59:52', 'big fat suit', '250.30', 0, 5),
(32, '2019-05-06 00:02:49', '2019-05-06 00:02:49', 'Big fat Tie', '20.00', 4, 10),
(33, '2019-05-06 00:06:02', '2019-05-06 00:06:56', 'small little jacket', '100.00', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `po_number` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ship_date` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(25) NOT NULL,
  `units` int(25) NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `amount` decimal(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`po_number`, `order_date`, `ship_date`, `vendor_id`, `item_id`, `quantity`, `units`, `price`, `emp_id`, `amount`) VALUES
(1, '2019-04-27 17:35:51', '2019-02-18 02:00:11', 3, 23, 5, 1, '160.00', 1, '800.00'),
(2, '2019-02-14 00:43:25', '2019-02-15 03:16:00', 4, 30, 10, 2, '5.00', 7, '100.00'),
(3, '2019-02-14 02:01:43', '2019-02-22 02:14:00', 8, 28, 1, 1, '300.00', 6, '300.00'),
(4, '2019-04-27 17:35:51', '2019-02-19 05:09:17', 1, 25, 1, 1, '127.00', 3, '127.00'),
(5, '2019-04-27 17:35:51', '2019-02-18 02:22:00', 5, 27, 6, 1, '149.00', 2, '894.00'),
(6, '2019-04-27 17:35:51', '2019-02-19 01:10:24', 2, 24, 1, 1, '220.00', 5, '220.00'),
(7, '2019-04-27 17:35:51', '2019-02-19 06:14:00', 6, 26, 1, 1, '798.00', 10, '798.00'),
(8, '2019-04-27 17:35:51', '2019-02-15 07:17:00', 9, 29, 10, 2, '9.00', 9, '180.00'),
(9, '2019-04-27 17:35:51', '2019-02-24 06:04:00', 7, 22, 5, 1, '158.00', 4, '790.00'),
(10, '2019-04-27 17:35:51', '2019-02-20 04:09:00', 10, 21, 5, 1, '220.00', 8, '1100.00');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `paycheck_number` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `payer_name` varchar(50) NOT NULL DEFAULT 'Larry Fitzpatrick',
  `amount` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`paycheck_number`, `date`, `emp_id`, `emp_name`, `payer_name`, `amount`) VALUES
(1, '2019-04-17 19:26:08', 2, 'Renae Bradford', '', '800.00'),
(2, '2019-04-17 19:26:08', 4, 'Timothy Kronish', '', '800.00'),
(3, '2019-04-17 19:26:08', 6, 'Dylan Dawn', '', '900.00'),
(4, '2019-04-17 19:26:08', 8, 'Linda Andrews', '', '900.00'),
(5, '2019-04-17 19:26:08', 10, 'Derrick Lawry', '', '1000.00'),
(6, '2019-04-17 19:26:08', 1, 'John Wayne', '', '1000.00'),
(7, '2019-04-17 19:26:08', 3, 'Rachel Howard', '', '750.00'),
(8, '2019-04-17 19:26:08', 5, 'Jennifer Towers', '', '900.00'),
(9, '2019-02-17 20:27:10', 7, 'Jeremy Rogan', '', '900.00'),
(10, '2019-02-17 20:27:10', 9, 'Mary Johnson', '', '800.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cust_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `quantity` int(25) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `total` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `date`, `cust_id`, `item_id`, `emp_id`, `quantity`, `price`, `total`) VALUES
(1, '2019-04-27 16:52:10', 2, 25, 9, 1, '127.00', '127.00'),
(2, '2019-04-27 16:52:10', 4, 27, 1, 2, '149.00', '298.00'),
(3, '2019-04-27 16:52:10', 6, 29, 3, 10, '9.00', '90.00'),
(4, '2019-04-27 16:52:10', 8, 21, 5, 1, '220.00', '220.00'),
(5, '2019-04-27 16:52:10', 10, 23, 7, 1, '160.00', '160.00'),
(6, '2019-04-27 16:52:10', 3, 24, 10, 1, '220.00', '220.00'),
(7, '2019-04-27 16:52:10', 5, 26, 2, 1, '798.00', '798.00'),
(8, '2019-04-27 16:52:10', 7, 28, 4, 1, '300.00', '300.00'),
(9, '2019-04-27 16:52:10', 9, 30, 6, 12, '5.00', '60.00'),
(10, '2019-04-27 16:52:10', 1, 22, 8, 2, '158.00', '316.00'),
(11, '2019-04-27 16:52:10', 1, 29, 1, 1, '9.00', '9.00'),
(12, '2019-04-27 16:52:10', 1, 30, 1, 1, '5.00', '5.00'),
(13, '2019-04-27 16:52:10', 2, 30, 4, 2, '5.00', '10.00'),
(14, '2019-04-27 16:52:10', 2, 31, 4, 1, '250.30', '250.30'),
(15, '2019-04-27 16:52:10', 5, 28, 8, 1, '300.00', '300.00'),
(16, '2019-04-27 16:52:10', 5, 30, 8, 1, '5.00', '5.00'),
(17, '2019-04-14 00:31:14', 1, 28, 5, 1, '300.00', '300.00'),
(18, '2019-04-14 00:31:14', 1, 30, 5, 2, '5.00', '10.00'),
(19, '2019-04-14 02:00:55', 1, 30, 3, 1, '5.00', '5.00'),
(20, '2019-04-14 02:03:25', 2, 28, 4, 1, '300.00', '300.00'),
(21, '2019-04-14 02:03:25', 2, 29, 4, 2, '9.00', '18.00'),
(22, '2019-04-14 02:03:25', 2, 30, 4, 2, '5.00', '10.00'),
(23, '2019-04-14 02:52:30', 1, 28, 3, 1, '300.00', '300.00'),
(27, '2019-04-18 20:53:57', 3, 29, 2, 5, '9.00', '45.00'),
(28, '2019-04-18 21:00:18', 1, 30, 2, 5, '5.00', '25.00'),
(29, '2019-04-18 21:01:39', 5, 29, 4, 1, '9.00', '9.00'),
(30, '2019-04-18 21:01:39', 5, 30, 4, 5, '5.00', '25.00'),
(31, '2019-04-18 21:03:37', 3, 29, 1, 1, '9.00', '9.00'),
(32, '2019-04-18 21:03:37', 3, 30, 1, 1, '5.00', '5.00'),
(33, '2019-04-22 00:34:41', 2, 21, 3, 1, '220.00', '220.00'),
(34, '2019-04-22 00:34:41', 2, 24, 3, 1, '220.00', '220.00'),
(35, '2019-04-22 00:40:06', 3, 22, 6, 2, '158.00', '316.00'),
(36, '2019-05-05 14:10:47', 1, 21, 5, 2, '220.00', '440.00'),
(37, '2019-05-05 14:10:47', 1, 23, 5, 2, '160.00', '320.00'),
(38, '2019-05-06 00:08:18', 1, 21, 4, 3, '220.00', '660.00'),
(39, '2019-05-06 00:08:20', 1, 22, 4, 1, '158.00', '158.00');

-- --------------------------------------------------------

--
-- Table structure for table `time cards`
--

CREATE TABLE `time cards` (
  `time_card_num` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `hours` int(2) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time cards`
--

INSERT INTO `time cards` (`time_card_num`, `date`, `emp_id`, `emp_name`, `time_in`, `time_out`, `hours`, `total`) VALUES
(1, '2019-02-14 13:09:39', 1, 'John Wayne', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(2, '2019-02-14 13:09:39', 3, 'Rachel Howard', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(3, '2019-02-14 13:09:39', 5, 'Jennifer Towers', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(4, '2019-02-14 13:09:39', 7, 'Jeremy Rogan', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(5, '2019-02-14 13:09:39', 9, 'Mary Johnson', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(6, '2019-02-14 13:09:39', 10, 'Derrick Lawry', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(7, '2019-02-14 13:09:39', 2, 'Renae Bradford', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(8, '2019-02-14 13:09:39', 4, 'Timothy Kronish', '2019-02-14 08:00:00', '2019-02-14 18:00:00', 10, 30),
(9, '2019-02-14 13:09:39', 6, 'Dylan Dawn', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24),
(10, '2019-02-14 13:09:39', 8, 'Linda Andrews', '2019-02-14 08:00:00', '2019-02-14 16:00:00', 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vendor_name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `customer_serv_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `date`, `vendor_name`, `street`, `city`, `state`, `zip`, `phone`, `customer_serv_contact`) VALUES
(1, '2019-02-14 00:26:08', 'DL Outfitters', '102 Corporate Park Way', 'Autin', 'TX', '73301', '5567894561', 'Sherry Watts'),
(2, '2019-02-14 00:26:08', 'Grayson Fabrics', '4033 Terrance Drive', 'Hawthorne', 'CA', '90210', '5587896541', 'Rachel Werz'),
(3, '2019-02-14 00:26:08', 'Crafter Inc.', '908 Jester Park Road', 'Wilmington', 'NC', '28401', '9105296541', 'Rebecca Wolf'),
(4, '2019-02-14 00:26:08', 'VF Corporation', '903 Elm Street', 'Greensboro', 'NC', '27456', '3369875462', 'Barney Childress'),
(5, '2019-02-14 00:26:08', 'Kipton Company', '567 Pennington Road', 'Charleston', 'WV', '25303', '6697894561', 'Bill Jones'),
(6, '2019-02-14 00:26:08', 'Easton Goods', '778 West Crestwood Drive', 'Philadelphia', 'PA', '19091', '5548875412', 'Kesha Weathers'),
(7, '2019-02-14 00:26:08', 'Kenneth Cole Suits', '1234 Coverdale Drive', 'Chicago', 'IL', '62563', '5599874563', 'Jennifer Henry'),
(8, '2019-02-14 00:26:08', 'Ralph Lauren', '345 East Market Street', 'New York City', 'NY', '10002', '6689874566', 'Jessica Price'),
(9, '2019-02-14 00:26:08', 'Alpha Fabrics', '504 Main Street', 'Los Angeles', 'CA', '90004', '3354567894', 'Alfred Cox'),
(10, '2019-02-14 00:26:08', 'Studio Suits', '3478 Cameron Drive', 'Portland', 'OR', '97035', '5597894561', 'Kristy Denton');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`) USING BTREE;

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`) USING BTREE,
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`po_number`),
  ADD KEY `vendor_id` (`vendor_id`,`item_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`paycheck_number`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `cust_id` (`cust_id`,`item_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `time cards`
--
ALTER TABLE `time cards`
  ADD PRIMARY KEY (`time_card_num`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `po_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `paycheck_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `time cards`
--
ALTER TABLE `time cards`
  MODIFY `time_card_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_ID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_ID`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`);

--
-- Constraints for table `time cards`
--
ALTER TABLE `time cards`
  ADD CONSTRAINT `time cards_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
