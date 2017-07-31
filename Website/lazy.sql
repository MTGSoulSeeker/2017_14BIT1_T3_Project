-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 05:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `telephone`, `birthday`, `address`, `avatar`) VALUES
(1, 'minh123', 'e10adc3949ba59abbe56e057f20f883e', 'minh123', 'minh@minh.vn', '123456789', '2017-07-10', '1234567891', '1013439_141573809374088_1713735750_n_zps96c29cc0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_delivery` int(11) NOT NULL,
  `bill_date` date DEFAULT NULL,
  `price` float NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_delivery`, `bill_date`, `price`, `status`) VALUES
(1, 2, '2017-07-03', 1000, 1),
(2, 123, '2017-07-29', 4123, 2),
(13, 22, '2017-07-03', 1200, 1),
(123, 123, '2017-07-18', 4123, 1),
(134, 123, '2017-07-29', 4123, 1),
(135, 3, '2017-07-29', 1880, 2),
(136, 4, '2017-07-30', 340, 0),
(137, 5, '2017-07-30', 1600, 1),
(138, 6, '2017-07-30', 900, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `product_id`, `quantity`, `sum`) VALUES
(1, 2, 1, 80),
(1, 4, 2, 800),
(135, 2, 1, 80),
(135, 7, 2, 1800),
(136, 6, 1, 340),
(137, 4, 4, 1600),
(138, 7, 1, 900);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `coemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `delivery` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_info`
--

INSERT INTO `delivery_info` (`id`, `id_user`, `fname`, `lname`, `company`, `street`, `ward`, `zip`, `city`, `country`, `phone`, `coemail`, `delivery`, `payment`) VALUES
(1, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Grab', 'Card'),
(2, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(3, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(4, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Grab', 'Card'),
(5, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Paypal'),
(6, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Grab', 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `sale` int(11) NOT NULL,
  `sale_percent` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `detail`, `price`, `sale`, `sale_percent`, `status`) VALUES
(2, 'abc', 'jeans', 'brown, length 100cm, weight 50g', 100, 1, 0.2, 0),
(3, 'White Blouse Armani', 'T-shirt', 'Product details  White lace top, woven, has a round neck, short sleeves, has knitted lining attached  Material & care  Polyester Machine wash Size & Fit  Regular fit The model (height 5\'8\" and chest 33\") is wearing a size S Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.', 300, 1, 0.6, 2),
(4, 'product 2 testing', 'Shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 400, 400, 0.3, 3),
(5, 'Product 3 testing', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 600, 600, 0, 2),
(6, 'Product 4 testing', 'Pant', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 340, 340, 0.5, 2),
(7, 'Product 5 testing', 'Jeans', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 900, 900, 0, 3),
(8, 'Product 6 testing', 'Jeans', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 900, 900, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`img_id`, `product_id`, `img`) VALUES
(5, 3, 'detailbig1.jpg'),
(6, 3, 'detailbig2.jpg'),
(7, 3, 'detailbig3.jpg'),
(8, 3, 'detailsquare.jpg'),
(9, 2, 'product1.jpg'),
(10, 2, 'product2.jpg'),
(11, 2, 'product3.jpg'),
(12, 2, 'product3_2.jpg'),
(13, 4, 'product1_2.jpg'),
(14, 4, 'product2_2.jpg'),
(15, 4, 'product3.jpg'),
(16, 4, 'product3_2.jpg'),
(17, 5, 'product2.jpg'),
(18, 5, 'product3.jpg'),
(19, 5, 'product3_2.jpg'),
(20, 5, 'product1_2.jpg'),
(21, 6, 'product3.jpg'),
(22, 6, 'product1_2.jpg'),
(23, 6, 'product2_2.jpg'),
(24, 6, 'product3_2.jpg'),
(25, 7, 'product3.jpg'),
(26, 7, 'product1.jpg'),
(27, 7, 'product2.jpg'),
(28, 7, 'product3_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birthday`, `address`, `zip`, `country`, `telephone`, `email`, `password`, `avatar`) VALUES
(1, 'Minh kute', '2017-07-07', 'asdasdlasjl', '70000', 'Vietnam', '021657986', 'minh@minh.vn', 'e8ac674c976207b822e73bd097a1b10a', '19598604_1360241740698381_4823887552537727118_n.jpg'),
(2, 'Minh123', '0000-00-00', '', '', '', '', 'nhoxmar294@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_delivery` (`id_delivery`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`,`product_id`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_delivery` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_to_productimg` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
