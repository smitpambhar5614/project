-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 07:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kankushop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `p_id`, `p_name`, `p_img`, `p_price`, `p_desc`, `qty`) VALUES
(26, 2, 4, 'LAKMÉ ABSOLUTE GEL STYLIST GLITTERATI COLLECTION', 'ezgif.com-webp-to-jpg.jpg', 250, 'This collection of amazing glitter shades gives you stunning gel-like nails and a scintillate finish with just one Swipe! The new Lakmé Absolute Glitterati shades have a rich color delivery with a reflective shimmer finish, that is perfect for minimal or ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_img`) VALUES
(1, 'Eyes', 'blog-1-720x480.jpg'),
(2, 'Lips', 'blog-2-720x480.jpg'),
(3, 'Nails', 'blog-3-720x480.jpg'),
(4, 'Face', 'blog-4-720x480.jpg'),
(5, 'Brush', 'blog-5-720x480.jpg'),
(6, 'Skin Care', 'blog-6-720x480.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pre_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `pre_name`, `name`, `email`, `mno`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `payment`, `status`) VALUES
(27, 2, 389, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_mrp` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_img`, `p_mrp`, `p_price`, `p_desc`, `c_id`, `qty`) VALUES
(1, ' LIQUID HIGHLIGHTER', 'product-1-720x480.jpg', 700, 650, 'Obsessed with glowing, shimmery cheekbones? We have the perfect product for you! Presenting the brand new Lakmé Absolute Liquid Highlighter for the perfect, dewy make-up look. Its liquid texture not only makes it easier to blend but also stays on for long', 4, 1),
(2, 'PRO SERIES EYE BRUSH SET', 'product-2-720x480.jpg', 899, 764, 'Swiss Beauty presents the ultimate Pro Series Eye Brush Set with sturdy look, ultra soft bristles and a comfortable grip. It’s a complete eye makeup brush set containing 8 brushes for your all time eye makeup. These makeup brushes allow you to pick the ri', 5, 1),
(3, 'MATTE LIP', 'product-3.png', 199, 179, 'Introducing Swiss Beauty\'s Ultra Smooth Matte Liquid Lipstick - the ultimate comfort-meets-performance product that is sure to take your lipstick game to the next level. This lightweight, long-wear lipstick is the perfect addition to any makeup kit.', 2, 1),
(4, 'LAKMÉ ABSOLUTE GEL STYLIST GLITTERATI COLLECTION', 'ezgif.com-webp-to-jpg.jpg', 300, 250, 'This collection of amazing glitter shades gives you stunning gel-like nails and a scintillate finish with just one Swipe! The new Lakmé Absolute Glitterati shades have a rich color delivery with a reflective shimmer finish, that is perfect for minimal or ', 3, 1),
(5, 'LAKMÉ EYECONIC VOLUME MASCARA, 8.5ML', '29112_H1-8901030849282_1024x.jpg', 499, 400, 'Your eyes speak volumes, and when they do #TurnUpTheVolume, with the new Lakmé Eyeconic Volume Mascara. Infused with ingredients such as calendula extract and castor oil that are known to care for your lashes. One swipe of this Mascara instantly volumizes', 1, 1),
(7, 'Face Serum With Matmarine + Zinc ', '18d33a4MINIM00000001_1509231.jpg', 599, 569, 'Minimalist Niacinamide 10% + Zinc 1% Face Serum is a nourishing, daily serum packed with pure vitamin B3 and antibacterial mineral zinc that boosts dermal immunity, keeping your skin resilient and healthy. The soothing aloe-based formula contains pure 10%', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimonial_data` varchar(255) NOT NULL,
  `testimonial_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `name`, `testimonial_data`, `testimonial_img`) VALUES
(1, 'Drashti Makadiya', '\"Kanku\'s lipstick is a game-changer. The vibrant colors, long-lasting formula, and comfortable application make it a must-have for any makeup lover. Thank you, Kanku, for the perfect lipstick!\"', 'testimonial-1.jpg'),
(2, 'Isha Vala', '\"Kanku\'s nail paints are a must-have. The colors are stunning, and they last for days. Thank you, Kanku, for the fabulous nail collection!\" ', 'testimonial-2.jpg'),
(3, 'krishna Rupavatiya', '\"Kanku\'s lipstick exceeded expectations with vibrant colors and long-lasting formula. Highly recommended for beautiful, all-day lips.\"', 'testimonial-3.jpg'),
(4, 'Princy Parmar', '\"Good product, everything looks\r\nvery good and I like it, friendly and\r\npleasant service, next time I will\r\norder here again\"', 'testimonial-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'ayush', 'asangtani074@rku.ac.in', 'a35c8d7495a5887f82347c65ec9591ae', 'admin'),
(2, 'raj', 'raj@gmail.com', '3f2cdff8d0dc63cf459d91eeabebd2b4', 'user'),
(3, 'divyesh', 'dbhut076@rku.ac.in', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'ayush', 'ayush@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `user_id`, `p_id`, `p_name`, `p_img`, `qty`, `p_price`, `p_desc`) VALUES
(34, 2, 4, 'LAKMÉ ABSOLUTE GEL STYLIST GLITTERATI COLLECTION', 'ezgif.com-webp-to-jpg.jpg', 1, 250, 'This collection of amazing glitter shades gives you stunning gel-like nails and a scintillate finish with just one Swipe! The new Lakmé Absolute Glitterati shades have a rich color delivery with a reflective shimmer finish, that is perfect for minimal or ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
