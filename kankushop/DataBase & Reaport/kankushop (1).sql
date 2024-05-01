-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 02:30 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `p_id`, `p_name`, `p_img`, `p_price`, `p_desc`, `qty`) VALUES
(26, 2, 4, 'LAKMÉ ABSOLUTE GEL STYLIST GLITTERATI COLLECTION', 'ezgif.com-webp-to-jpg.jpg', 250, 'This collection of amazing glitter shades gives you stunning gel-like nails and a scintillate finish with just one Swipe! The new Lakmé Absolute Glitterati shades have a rich color delivery with a reflective shimmer finish, that is perfect for minimal or ', 1),
(27, 5, 3, 'MATTE LIP', 'product-3.png', 179, 'Introducing Swiss Beauty\'s Ultra Smooth Matte Liquid Lipstick - the ultimate comfort-meets-performance product that is sure to take your lipstick game to the next level. This lightweight, long-wear lipstick is the perfect addition to any makeup kit.', 1),
(28, 9, 3, 'MATTE LIP', 'product-3.png', 179, 'Introducing Swiss Beauty\'s Ultra Smooth Matte Liquid Lipstick - the ultimate comfort-meets-performance product that is sure to take your lipstick game to the next level. This lightweight, long-wear lipstick is the perfect addition to any makeup kit.', 1),
(29, 9, 1, 'Red and yellow Nike Shoes ', 'shoe3.jpg', 650, 'Obsessed with glowing, shimmery cheekbones? We have the perfect product for you! Presenting the brand new Lakmé Absolute Liquid Highlighter for the perfect, dewy make-up look. Its liquid texture not only makes it easier to blend but also stays on for long', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_img`) VALUES
(1, 'Speaker', 'sp3.jpg'),
(2, 'Gucci T-shirt ', 'clothing.jpg'),
(3, 'Watches\r\n \r\n', 'blog-3-720x480.jpg'),
(4, 'Nike shoes', 'blog-4-720x480.jpg'),
(5, 'headphones', 'blog-5-720x480.jpg'),
(6, 'T-Shirt', 'blog-6-720x480.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_img`, `p_mrp`, `p_price`, `p_desc`, `c_id`, `qty`) VALUES
(1, 'Red and yellow Nike Shoes ', 'shoe3.jpg', 700, 650, '', 4, 1),
(2, 'black T-Shirt', 'clothing.jpg', 899, 764, '', 6, 1),
(3, 'Red Nike Shoes', 'shoes.jpg', 199, 179, '', 4, 1),
(4, 'Watch', 'watch4.jpg', 300, 250, '', 3, 1),
(5, 'Speaker', 'sp3.jpg', 499, 400, '', 1, 1),
(7, 'airpods', 'sp4.jpg', 599, 569, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimonial_data` varchar(255) NOT NULL,
  `testimonial_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `name`, `testimonial_data`, `testimonial_img`) VALUES
(1, 'Smit Pambhar', '', 'testimonial-1.jpg'),
(2, 'Krupa Moliya ', '', 'testimonial-2.jpg'),
(3, 'Naimish Siddhapura ', 'okey\r\n', 'testimonial-3.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(8, 'smit pambhar', 'smitpambhar5614@gmail.com', 'acdb5a1da6bf907205210587467c83c0', 'user'),
(9, 'Rinku Pambhar', 'rinkupambhar5614@gmail.com', '610c781d2ae8574abf1ceecea536ea17', 'user'),
(10, 'Smit Pambhar', 'smitpambhar5614@gmail.com', '8aa5ad98d2c92d0296c485d8d6d70a55', 'admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
