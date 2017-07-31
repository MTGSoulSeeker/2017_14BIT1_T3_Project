-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 05:12 PM
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
(1, 'minh123', 'e10adc3949ba59abbe56e057f20f883e', 'minh123', 'minh@minh.vn', '123456789', '2017-07-10', '1234567891', 'BeautyPlus_20140717180240_save.jpg'),
(2, 'aaaaa', '202cb962ac59075b964b07152d234b70', 'aaaaaa', 'aaa@gmail.com', '12344444', '2017-07-04', '1111111', '');

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
(136, 4, '2017-07-30', 340, 2),
(137, 5, '2017-07-30', 1600, 1),
(138, 6, '2017-07-30', 900, 1),
(139, 7, '2017-07-31', 11111, 1),
(140, 8, '2017-07-31', 900, 1),
(141, 9, '2017-07-31', 1200, 1),
(142, 15, '2017-07-31', 1020, 1);

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
(138, 7, 1, 900),
(139, 9, 1, 11111),
(140, 7, 1, 900),
(141, 18, 1, 800),
(141, 19, 1, 400),
(142, 14, 2, 720),
(142, 15, 3, 300);

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
(6, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Grab', 'Card'),
(7, 3, 'aaa', 'aaa', 'a', 'aa', 'aaa', '123', 'a', 'a', '1', '12345@gmail.com', 'USPS', 'Card'),
(8, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'USPS', 'Card'),
(9, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(10, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(11, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(12, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(13, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(14, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Uber', 'Card'),
(15, 1, 'Minh', 'Pham', 'IPSIP', 'Nguyen Thi Minh Khai', 'Dakao', '7000', 'Ho Chi Minh', 'Vietnam', '937516001', 'nhoxmar294@gmail.com', 'Grab', 'Card');

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
(10, 'Product 1', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 500, 500, 0.3, 1),
(11, 'Product 2', 'Shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 300, 300, 0, 2),
(12, 'Product 3', 'Pant', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 500, 500, 0.5, 1),
(13, 'Product 4', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 600, 600, 0, 3),
(14, 'Product 5', 'Pant', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 400, 400, 0.1, 1),
(15, 'Product 6', 'Jeans', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 100, 100, 0, 2),
(16, 'Product 7', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 700, 700, 0.4, 1),
(17, 'Product 8', 'Pant', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 350, 350, 0, 3),
(18, 'Product 9', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 800, 800, 0.2, 1),
(19, 'Product 10', 'T-shirt', 'This is the lead paragraph of the article. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.', 400, 400, 0, 3);

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
(30, 10, '_MG_9943.jpg'),
(31, 10, '6a00e54ecca8b98833012875d5f417970c-450wi.jpg'),
(32, 10, '05179a16a53e907bf24e0e9d029020cb.jpg'),
(33, 10, '7780ecc387aabc6afbb84bfa1cdf51ea--leather-men-leather-jackets.jpg'),
(34, 11, 'ClarissaTinker127111995332.jpg'),
(35, 11, 'dress_varennamaxi_peach_fl3_grande.jpg'),
(36, 11, 'fccb15f7eb70b3d4b78a0dddef0204da--men-summer-summer-.jpg'),
(37, 11, 'd9095e096e1a7004993ba393c5e82e83--le-style-fashion-shoot.jpg'),
(38, 12, 'harriett_mchugh_6.jpg'),
(39, 12, 'ml_50ed9c48-bf78-4f96-805d-05a80a4e4996.jpg'),
(40, 12, 'prt_450x600_1497264575.jpg'),
(41, 12, 'SUITCASE-Magazine-Fashion-Week-Daniela-Barros.jpg'),
(42, 13, '0c4fc0746b27a9b75941ebb219eaf5c4--tokyo-fashion-k-fashion.jpg'),
(43, 13, '6_61987.jpg'),
(44, 13, '8e38ee9453c36b8c79f75a1429b216d3--ulzzang-fashion-k-fashion.jpg'),
(45, 13, '9ee297512b2ba56d2402427d602b02e8--yoon-eun-hye-couple.jpg'),
(46, 14, '043d82429d1aae91937d1cacbca2110e--k-pop-girls-kpop-fashion.jpg'),
(47, 14, '80cf2fc2a74b5a75b1a180ae27ec365c--girls-generation-sunny-kpop-fashion.jpg'),
(48, 14, '105d73abfc1e1aef775f448d8f5427f0--korean-idols-korean-men.jpg'),
(49, 14, '191ce4cb5df35027cb64cbab6c066474--go-ara-latest-fashion.jpg'),
(50, 15, '7100af6da8ace48f359bd0c5168afd94--red-skater-skirt-skater-skirts.jpg'),
(51, 15, '29732.jpg'),
(52, 15, '144416_P_1406083459760.jpg'),
(53, 15, '144416_P_1406083459837.jpg'),
(54, 16, '9839127710878-4347.jpg'),
(55, 16, 'a6ae0ee1861b6bc26a5d0678f61d44da--k-pop-girls-k-fashion.jpg'),
(56, 16, 'Bae.Suzy.600.107619.jpg'),
(57, 16, 'e1a21ed9c6f052e607db2188c2850f6d--fall-winter-fashion-fall-.jpg'),
(58, 17, 'fb8a082e6af18f49b7bdff6efae0f17d--kpop-fashion-asian-fashion.jpg'),
(59, 17, 'fd1e249867ccd4402562357bd7cd5e87--fall--winner-kpop.jpg'),
(60, 17, 'IU.600.84265.jpg'),
(61, 17, 'large.jpg'),
(62, 18, 'original.jpg'),
(63, 18, 'yoona-10-nam-kpop-19.jpg'),
(64, 18, '_MG_9943.jpg'),
(65, 18, '6a00e54ecca8b98833012875d5f417970c-450wi.jpg'),
(66, 19, '05179a16a53e907bf24e0e9d029020cb.jpg'),
(67, 19, '7780ecc387aabc6afbb84bfa1cdf51ea--leather-men-leather-jackets.jpg'),
(68, 19, 'ClarissaTinker127111995332.jpg'),
(69, 19, 'd9095e096e1a7004993ba393c5e82e83--le-style-fashion-shoot.jpg');

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
(2, 'Minh123', '0000-00-00', '', '', '', '', 'nhoxmar294@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(3, 'Ã¡dasd', '0000-00-00', '', '', '', '', '12345@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(4, 'zxcasd', '0000-00-00', '', '', '', '', 'micas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
