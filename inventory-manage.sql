-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 06:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory-manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Anjaly', 'anjaly22@gmail.com', 'anjaly22@'),
(2, 'Athira', 'athiraka999@gmail.com', 'athiraka999@');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `category_id`) VALUES
(1, 'Oppo', 6),
(2, 'Boat', 1),
(3, 'Canon', 2),
(4, 'JBL', 3),
(5, 'Firebolt', 4),
(6, 'Acer', 5),
(7, 'Sony', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_email`, `product_id`) VALUES
('anjaly22@gmail.com', 1),
('anjaly22@gmail.com', 2),
('anjaly22@gmail.com', 7),
('anjaly22@gmail.com', 4),
('anjaly22@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_photo`) VALUES
(1, 'Headphone', 'Headphone.jpg'),
(2, 'Camera', 'Camera.webp'),
(3, 'Speaker', 'Speaker.jpg'),
(4, 'Smartwatch', 'Smartwatch.jpg'),
(5, 'Laptop', 'Laptop.jpg'),
(6, 'Smartphones', 'Smartphones.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phno` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_gender` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pincode` int(100) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phno`, `customer_address`, `customer_dob`, `customer_gender`, `customer_city`, `customer_email`, `customer_pincode`, `customer_state`, `customer_password`) VALUES
(5, 'Anjali', '9988774455', 'ernakulam po ernakulam', '2023-10-28', '', 'ernakulam', 'anjaly22@gmail.com', 968574, 'kerala', 'anjalikutty'),
(6, 'jishna', '9865548878', 'kozhikode po kozhikode', '2023-11-28', 'female', 'palayam', 'jishna22@gmail.com', 652635, 'kerala', 'jishna22@#'),
(7, 'Amarnath  E K', '9696969696', 'Albert Street , North', '2024-06-01', '', 'New Delhi', 'amar123@gmail.com', 985785, 'tamilnadu', 'amar123@');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`supplier_id`, `product_id`, `product_name`, `product_photo`, `product_quantity`, `product_price`, `product_desc`, `category_id`, `category_name`, `brand_id`, `brand_name`) VALUES
(0, 1, 'Rockerz 450', 'Rockerz 450.jpg', '10', 1020, 'Better Sound Quality, Active Noise Cancellation.', 1, 'Headphone', 2, 'Boat'),
(0, 2, 'Canon R5', 'Canon R5.jpeg', '15', 80000, 'Mirred lenses', 2, 'Camera', 3, 'Canon'),
(0, 3, 'Boombox 3', 'Boombox 3.jpg', '20', 25000, 'Better bass', 3, 'Speaker', 4, 'JBL'),
(0, 4, 'Legacy', 'Legacy.webp', '15', 2499, 'AmoLED Display, Bluetooth Calling, AOD', 4, 'Smartwatch', 5, 'Firebolt'),
(0, 5, 'Aspire 5 Slim', 'Aspire 5 Slim.webp', '25', 97928, 'Full HD ipsDisplay, 10th Gen Intel Core i5 ', 5, 'Laptop', 6, 'Acer'),
(0, 6, 'Oppo N2 Flip', 'Oppo N2 Flip.webp', '30', 35000, 'Flip model,', 6, 'Smartphones', 1, 'Oppo'),
(0, 7, 'Sony MDR XB450', 'Sony MDR XB450.jpg', '10', 599, 'Sound Quality', 1, 'Headphone', 7, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `p_order`
--

CREATE TABLE `p_order` (
  `order_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phno` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pincode` int(100) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_order`
--

INSERT INTO `p_order` (`order_id`, `brand_id`, `brand_name`, `category_id`, `category_name`, `product_id`, `product_name`, `product_photo`, `product_quantity`, `product_price`, `customer_id`, `customer_name`, `customer_phno`, `customer_address`, `customer_city`, `customer_email`, `customer_pincode`, `customer_state`, `payment_method`, `order_date`) VALUES
(1, 1, 'Oppo', 6, 'Smartphones', 6, 'Oppo N2 Flip', 'Oppo N2 Flip.webp', 1, 35010, 5, 'Anjali', '9988774455', 'ernakulumamwdiedwnjcjwencnwejc', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-12'),
(4, 3, 'Canon', 2, 'Camera', 2, 'Canon R5', 'Canon R5.jpeg', 2, 80010, 5, 'Anjali', '9988774455', 'ernakulumamwdiedwnjcjwencnwejc', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-13'),
(6, 4, 'JBL', 3, 'Speaker', 3, 'Boombox 3', 'Boombox 3.jpg', 1, 25010, 5, 'Anjali', '9988774455', 'ernakulumamwdiedwnjcjwencnwejc', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-14'),
(7, 4, 'JBL', 3, 'Speaker', 3, 'Boombox 3', 'Boombox 3.jpg', 3, 25010, 5, 'Anjali', '9988774455', 'ernakulumamwdiedwnjcjwencnwejc', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-14'),
(8, 4, 'JBL', 3, 'Speaker', 3, 'Boombox 3', 'Boombox 3.jpg', 1, 25010, 5, 'Anjali', '9988774455', 'ernakulumamwdiedwnjcjwencnwejc', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-14'),
(9, 7, 'Sony', 1, 'Headphone', 7, 'Sony MDR XB450', 'Sony MDR XB450.jpg', 1, 609, 6, 'jishna', '9865548878', 'kozhikode po kozhikode', 'palayam', 'jishna22@gmail.com', 652635, 'Kerala', 'paypal', '2023-11-15'),
(10, 4, 'JBL', 3, 'Speaker', 3, 'Boombox 3', 'Boombox 3.jpg', 1, 25010, 6, 'albin', '8113858585', 'kozhikode po palayam,', 'palayam', 'albin23@gmail.com', 685745, 'Karnataka', 'paypal', '2023-11-15'),
(17, 5, 'Firebolt', 4, 'Smartwatch', 4, 'Legacy', 'Legacy.webp', 1, 2509, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-16'),
(18, 2, 'Boat', 1, 'Headphone', 1, 'Rockerz 450', 'Rockerz 450.jpg', 1, 1030, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-16'),
(19, 6, 'Acer', 5, 'Laptop', 5, 'Aspire 5 Slim', 'Aspire 5 Slim.webp', 1, 97938, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-17'),
(20, 2, 'Boat', 1, 'Headphone', 1, 'Rockerz 450', 'Rockerz 450.jpg', 1, 1030, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-17'),
(21, 4, 'JBL', 3, 'Speaker', 3, 'Boombox 3', 'Boombox 3.jpg', 3, 25010, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-17'),
(22, 1, 'Oppo', 6, 'Smartphones', 6, 'Oppo N2 Flip', 'Oppo N2 Flip.webp', 2, 35010, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-18'),
(23, 7, 'Sony', 1, 'Headphone', 7, 'Sony MDR XB450', 'Sony MDR XB450.jpg', 4, 609, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-18'),
(24, 7, 'Sony', 1, 'Headphone', 7, 'Sony MDR XB450', 'Sony MDR XB450.jpg', 3, 609, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-18'),
(25, 7, 'Sony', 1, 'Headphone', 7, 'Sony MDR XB450', 'Sony MDR XB450.jpg', 1, 609, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-19'),
(26, 6, 'Acer', 5, 'Laptop', 5, 'Aspire 5 Slim', 'Aspire 5 Slim.webp', 1, 97938, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-19'),
(27, 6, 'Acer', 5, 'Laptop', 5, 'Aspire 5 Slim', 'Aspire 5 Slim.webp', 1, 97938, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-19'),
(28, 2, 'Boat', 1, 'Headphone', 1, 'Rockerz 450', 'Rockerz 450.jpg', 1, 1030, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-19'),
(29, 1, 'Oppo', 6, 'Smartphones', 6, 'Oppo N2 Flip', 'Oppo N2 Flip.webp', 0, 35010, 5, 'Anjali', '9988774455', 'ernakulam po ernakulam', 'ernakulam', 'anjaly22@gmail.com', 968574, 'Kerala', 'paypal', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `p_return`
--

CREATE TABLE `p_return` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phno` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_pincode` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `return_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_return`
--

INSERT INTO `p_return` (`return_id`, `order_id`, `customer_id`, `customer_name`, `customer_email`, `customer_phno`, `customer_address`, `customer_state`, `customer_city`, `customer_pincode`, `product_id`, `product_name`, `brand_name`, `product_quantity`, `product_price`, `product_photo`, `return_cause`) VALUES
(1, 0, 0, 'Anjali', 'anjaly22@gmail.com', '9988774455', ' ernakulumamwdiedwnjcjwencnwejc', 'Kerala', 'ernakulam', 968574, 6, 'Oppo N2 Flip', 'Oppo', '2', 35000, 'Oppo N2 Flip.webp', 'wrong product...'),
(2, 0, 0, 'Anjali', 'anjaly22@gmail.com', '9988774455', ' Ernakulam po ernakulam', 'Kerala', 'ernakulam', 968574, 2, 'Canon R5', 'Canon', '1', 80000, 'Canon R5.jpeg', 'damaged product');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_mail` varchar(100) NOT NULL,
  `review_rating` varchar(10) NOT NULL,
  `review_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `customer_name`, `customer_mail`, `review_rating`, `review_text`) VALUES
(1, 'abin', '0', '', 'bag product'),
(2, 'abin', 'abin22@gmail.com', '', 'good awesome product'),
(3, 'abin', 'abin22@gmail.com', '', 'bag product'),
(4, 'abin', 'abin22@gmail.com', '', 'bag product'),
(5, 'abin', 'abin22@gmail.com', '', 'bag product'),
(6, 'abin', 'abin22@gmail.com', '', 'bag product');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_phno` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phno`, `supplier_address`, `supplier_email`, `brand_id`, `brand_name`, `category_id`, `category_name`, `product_id`, `product_name`, `product_photo`, `product_quantity`, `product_price`, `product_desc`) VALUES
(1, 'AB mobiles', '9865325458', 'south park avanue factory road', 'abmobiles23@gmail.com', 1, 'Oppo', 6, 'Smartphones', 0, 'Oppok 10 5g', '.', '15', 55000, 'at discount rate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `p_order`
--
ALTER TABLE `p_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `p_return`
--
ALTER TABLE `p_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p_order`
--
ALTER TABLE `p_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `p_return`
--
ALTER TABLE `p_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
