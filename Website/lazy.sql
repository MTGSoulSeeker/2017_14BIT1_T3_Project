-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 05:11 AM
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
(62, 18, 'original.jpg'),
(63, 18, 'yoona-10-nam-kpop-19.jpg'),
(64, 18, '_MG_9943.jpg'),
(65, 18, '6a00e54ecca8b98833012875d5f417970c-450wi.jpg'),
(70, 10, '1ac39d28c310b00d381d09282f5d6b80--male-style-style-men.jpg'),
(71, 10, '2ce96e87e52b2f50ff0bedc42fb0718a--denim-men-jeans-denim.jpg'),
(72, 10, '3c9ee8acbc51b60add9d951c225b3201--men-fashion-shadows.jpg'),
(73, 10, '4f20ab1ca5fd5e9cc181d337e62fd08a.jpg'),
(74, 11, '5cbd37586717f5ac939852e53ea13f72.jpg'),
(75, 11, '5ff65a4b0f7745f61b64061ddf755e87--clothing-styles-men-fashion.jpg'),
(76, 11, '8e822a39db2b280c743845033b4c47cf--fashion-styles-fashion-men.jpg'),
(77, 11, '9df977f299803ac510ba96d7f28f7425--black-trousers-style-for-men.jpg'),
(78, 12, '24cb32867a4933575563d8cdabce1511--brown-tweed-suit-tweed-men.jpg'),
(79, 12, '48dd3bc22739a8e34c8501575309165d--fashion-casual-men-fashion.jpg'),
(80, 12, '66d9c84f872a64a27e21e23371ff7363--mens-fall-fashion-latest-men-fashion.jpg'),
(81, 12, '67bb7051e418a6e291f2d060a65014cb--mens-denim-blue-denim-shirt.jpg'),
(82, 13, '67d890da1bace894f72eb417c1a0f510--winter-coats-for-men-black-fur-coat.jpg'),
(83, 13, '79d8db0570be013e4974aeae371d50bc--fashion-for-men-bald-men-fashion-outfits.jpg'),
(84, 13, '374c91de01d00ffa0ac0f05ac198b4ab--street-style-fashion-men-fashion.jpg'),
(85, 13, '1278c8168476b5a5ab22db3f8c5fcaa0.jpg'),
(86, 14, '26840_P_1334202081607.jpg'),
(87, 14, '46501d174b94e6da5b94dd0e891a3f5e--groom-fashion-man-fashion.jpg'),
(88, 14, '76561dbcdfcaffe8a930a45038548066--bb-style-style-men.jpg'),
(89, 14, '961470a56200d6debdef38b8bda897f0--brunello-cucinelli-mens-suits.jpg'),
(90, 15, 'a20a9e0fc2806444287e3eb110477298--suit-fashion-mens-fashion.jpg'),
(91, 15, 'afb5f90fb72b636c685b9b11c1f9415a--mens-suits--boss-.jpg'),
(92, 15, 'bf6453cc0841ea471a4383d619a78f8d--fashion-models-fashion-men.jpg'),
(93, 15, 'c4f754c6f2c910b86f65c43b7437dd93--color-coordination-khakis.jpg'),
(98, 17, 'f42f49e7906141fb839fbc3770a3a3e7--guy-style-style-men.jpg'),
(99, 17, 'f77f896533821f9c4d5ba61dc8819aa7.jpg'),
(100, 17, 'male-fashion-fall-outfits-style-ideas.jpg'),
(101, 18, 'uH7RFf F C Polo Nike - Men Clothes.jpg'),
(102, 18, 'unnamed (1).jpg'),
(103, 18, 'unnamed.jpg'),
(104, 19, '9df977f299803ac510ba96d7f28f7425--black-trousers-style-for-men.jpg'),
(105, 19, '5cbd37586717f5ac939852e53ea13f72.jpg'),
(106, 19, '67bb7051e418a6e291f2d060a65014cb--mens-denim-blue-denim-shirt.jpg'),
(108, 10, '3c9ee8acbc51b60add9d951c225b3201--men-fashion-shadows.jpg'),
(109, 10, '48dd3bc22739a8e34c8501575309165d--fashion-casual-men-fashion.jpg'),
(110, 10, '8e822a39db2b280c743845033b4c47cf--fashion-styles-fashion-men.jpg'),
(111, 10, '79d8db0570be013e4974aeae371d50bc--fashion-for-men-bald-men-fashion-outfits.jpg'),
(112, 11, '5cbd37586717f5ac939852e53ea13f72.jpg'),
(113, 11, '67bb7051e418a6e291f2d060a65014cb--mens-denim-blue-denim-shirt.jpg'),
(114, 11, 'd03d1e8e43f45e83a61e3b4860ad8ab8.jpg'),
(115, 12, '961470a56200d6debdef38b8bda897f0--brunello-cucinelli-mens-suits.jpg'),
(116, 12, 'bf6453cc0841ea471a4383d619a78f8d--fashion-models-fashion-men.jpg'),
(117, 12, 'afb5f90fb72b636c685b9b11c1f9415a--mens-suits--boss-.jpg'),
(118, 12, 'unnamed (1).jpg'),
(119, 13, '5ff65a4b0f7745f61b64061ddf755e87--clothing-styles-men-fashion.jpg'),
(120, 13, 'c4f754c6f2c910b86f65c43b7437dd93--color-coordination-khakis.jpg'),
(121, 13, '374c91de01d00ffa0ac0f05ac198b4ab--street-style-fashion-men-fashion.jpg'),
(122, 13, 'bf6453cc0841ea471a4383d619a78f8d--fashion-models-fashion-men.jpg'),
(130, 17, 'e5efb9b0dd6e8b1084ae1e79fa34ec4f--daily-fashion-spring-fashion.jpg'),
(134, 19, 'a20a9e0fc2806444287e3eb110477298--suit-fashion-mens-fashion.jpg'),
(135, 16, '48dd3bc22739a8e34c8501575309165d--fashion-casual-men-fashion.jpg'),
(136, 16, 'afb5f90fb72b636c685b9b11c1f9415a--mens-suits--boss-.jpg'),
(137, 16, 'd03d1e8e43f45e83a61e3b4860ad8ab8.jpg'),
(138, 16, 'a20a9e0fc2806444287e3eb110477298--suit-fashion-mens-fashion.jpg');

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
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
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
