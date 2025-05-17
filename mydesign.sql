-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 12:01 AM
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
-- Database: `mydesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_end_category`
--

CREATE TABLE `tbl_end_category` (
  `ecat_id` int(11) NOT NULL,
  `ecat_name` varchar(255) NOT NULL,
  `mcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_end_category`
--

INSERT INTO `tbl_end_category` (`ecat_id`, `ecat_name`, `mcat_id`) VALUES
(1, 'Business Cards', 1),
(2, 'Letterheads', 1),
(3, 'Envelopes', 1),
(4, 'Folders', 1),
(5, 'Notepads', 1),
(6, 'Notebook &amp; Journal', 1),
(7, 'Binding', 1),
(8, 'Thank You Cards', 1),
(9, 'Certificates', 1),
(10, 'Calendars', 1),
(11, 'Hang Tags', 1),
(12, 'Brochures', 2),
(13, 'Flyers', 2),
(14, 'Booklets &amp; Catalogues', 2),
(15, 'Die Cut Stickers', 3),
(16, 'Print &amp; Cut Stickers', 3),
(17, 'Paper Sticker Gloss / Matt', 3),
(18, 'Transparent Stickers', 3),
(19, 'PVC Stickers White', 3),
(20, 'White Ink Stickers', 3),
(21, 'Epoxy Stickers', 3),
(22, 'Windshield Stickers', 3),
(23, 'Stencil Stickers', 3),
(24, 'Foil Stickers', 3),
(25, 'Metal Stickers', 3),
(26, 'Embossing Seal Stickers', 3),
(27, 'Helmet Stickers', 3),
(28, 'Hologram Stickers', 3),
(29, 'Kraft Paper Stickers', 3),
(30, 'Boat / Yachts Stickers', 3),
(31, 'Self Ink Stamps', 4),
(32, 'Wax Seal', 4),
(33, 'Embossing Seal', 4),
(34, 'CD / DVD Printing', 5),
(35, 'CD / DVD Covers', 5),
(36, 'Compliment Slips', 6),
(37, 'Tickets & Coupons', 6),
(38, 'Scratch & Win Coupons', 6),
(39, 'Tent Cards', 6),
(40, 'Car Mat', 6),
(41, 'Table Mat', 6),
(42, 'Scarf', 8),
(43, 'Sheila', 8),
(44, 'Bandana', 8),
(45, 'Hair Scarf', 8),
(46, 'Abaya', 8),
(47, 'Sarong', 8),
(48, 'Beach Shorts', 8),
(49, 'Pocket Handkerchief', 8),
(50, 'Scrunchie', 8),
(51, 'Bag Scarf', 8),
(52, 'Decorative Pillows', 9),
(53, 'Floor Cushion', 9),
(54, 'Tiny Cushion', 9),
(55, 'Bolster Pillow', 9),
(56, 'Bean Bags', 9),
(57, 'Blanket', 9),
(58, 'Fabric Wrap', 9),
(59, 'Armband', 10),
(60, 'Sash', 10),
(61, 'Hand Umbrella', 10),
(62, 'Face Masks', 10),
(63, 'Apron', 10),
(64, 'Placemat', 11),
(65, 'Table Napkin', 11),
(66, 'Dinning Table Cloth', 11),
(67, 'Drawstring Pouches', 12),
(68, 'Reverse Cut Frosted Sticker', 15),
(69, 'Standard Cut Frosted Sticker', 15),
(70, 'Printed Frosted Sticker', 15),
(71, 'Blank Frosted Sticker', 15),
(72, 'Wall Vinyl Lettering', 16),
(73, 'Wall Graphics', 16),
(74, 'Floor Display Gondola', 17),
(75, 'Counter Top Stand', 17),
(76, 'Home Wallpaper', 19),
(77, 'Car Magnets', 20),
(78, 'Fridge Magnets', 20),
(79, 'Magnetic Wall', 20),
(80, 'Domed Magnet', 20),
(81, 'Window Vinyl Lettering', 18),
(82, 'Window Graphics', 18),
(83, 'One Way Vision Sticker', 18),
(84, 'Window Films', 18),
(85, 'Canvas Frames', 21),
(86, 'Wooden Frames', 21),
(87, 'Acrylic Frames', 16),
(88, 'Metal Art', 16),
(89, 'Half Wrap Vehicle', 22),
(90, 'Unlit 3D Signage', 28),
(91, 'Frontlit 3D Signage', 28),
(92, 'Backlit 3D Signage', 28),
(93, 'Outlit 3D Signage', 28),
(94, 'Push Through 3D Signage', 28),
(95, 'Neon 3D Signage', 28),
(96, 'Flex Face Light Box', 29),
(97, 'Fabric Light Box', 29),
(98, 'Acrylic Light Box', 29),
(99, 'Poster Light Box', 29),
(100, 'Metal Name Plates', 30),
(101, 'Acrylic Name Plates', 30),
(102, 'Wooden Name Plates', 30),
(103, 'Table Top Plates / Sign', 30),
(104, 'Flex Face Sign Board', 33),
(105, 'Frontlit 3D Sign Board', 33),
(106, 'Backlit 3D Sign Board', 33),
(107, 'Push Through Sign Board', 33),
(108, 'Neon Sign Board', 33),
(109, 'Self-Standing Signage', 31),
(110, 'Wall Mounted Signage', 31),
(111, 'Hanging Signage', 31),
(112, 'Directory Signage', 31),
(113, 'Self-Standing Sign', 32),
(114, 'Wall Mounted Sign', 32),
(115, 'Floor Sign / Floor Graphics', 32),
(116, 'Metal Letters', 34),
(117, 'Wooden Letters', 34),
(118, 'Acrylic Letters', 34),
(119, 'Forex / Foam Letters', 34),
(120, 'Traffolyte / PVC / Acrylic Labels', 35),
(121, 'Metal Labels', 35),
(122, 'Wooden Labels', 35),
(123, 'Acrylic Labels', 35),
(124, 'Sail Flags', 36),
(125, 'Tear Drop Flags', 36),
(126, 'L Shape Flags', 36),
(127, 'Blade Flags', 36),
(128, 'Telescopic Flags', 36),
(129, 'Pole Flags', 37),
(130, 'Hand Flags', 37),
(131, 'Finish Line', 37),
(132, 'Body Flags', 37),
(133, 'Fan Scarf', 37),
(134, 'Hoisting Flags', 40),
(135, 'Wall Mounted Flags', 40),
(136, 'Stadium Flags', 40),
(137, 'Advertising Flags', 40),
(138, 'Festival Flags', 40),
(139, 'Table Flags', 38),
(140, 'Table Flags - Royal', 38),
(141, 'Conference Flags', 38),
(142, 'Conference Flags - Hanging', 38),
(143, 'Car Flags', 39),
(144, 'Car Desert Flags', 39),
(145, 'Dashboard Flags', 39),
(146, 'Pennant Flags', 39),
(147, 'Bunting Flags', 39),
(148, 'Toothpick Flags', 39),
(149, 'Concrete Base', 41),
(150, 'Cross Base', 41),
(151, 'Water Base', 41),
(152, 'Spike Base', 41),
(153, 'Rollup Banners', 42),
(154, 'X Banners', 42),
(155, 'Backlit Snapfold Standee', 42),
(156, 'Classic Backlit Standee', 42),
(157, 'Totem Self Standee', 42),
(158, 'Banners - PVC & Fabric', 42),
(159, 'Fence Banners', 42),
(160, 'Lama Stand', 42),
(161, 'Popout Banner / Spring A Board', 42),
(162, 'Toblerone Frame', 42),
(163, 'Cutout Standee', 42),
(164, 'Pop Ups', 43),
(165, 'Fabric Pop Ups', 43),
(166, 'Fabric Backdrop - Indoor', 43),
(167, 'Fabric Backdrop - Outdoor', 43),
(168, 'Wooden Backdrop', 43),
(169, 'Step & Repeat Backdrop', 43),
(170, 'Curved Backdrop', 43),
(171, 'Backlit Backdrop', 43),
(172, 'Balloon Decorators', 43),
(173, 'Promotion Table', 44),
(174, 'Exhibition Counters', 44),
(175, 'Tent / Canopy / Gazebo', 44),
(176, 'Parasol Umbrella', 44),
(177, 'Table Cover & Table Cloth', 44),
(178, 'Social Media Frame', 44),
(179, 'Party Props', 44),
(180, 'Foam Board', 44),
(181, 'Panel / Seamless Branding', 45),
(182, 'Island Backlit Shell Scheme', 45),
(183, 'Modular Backlit Booths', 45),
(184, 'Pens', 46),
(185, 'PU Notebooks', 46),
(186, 'PU Organizer', 46),
(187, 'Mouse Pad', 46),
(188, 'T-Shirt', 49),
(189, 'Jersey', 49),
(190, 'Caps', 49),
(191, 'Neck Tie', 49),
(192, 'Safety Vest', 49),
(193, 'Mugs', 50),
(194, 'Bottles', 50),
(195, 'Tumblers', 50),
(196, 'Coaster', 50),
(197, 'Coffee Stencil', 50),
(198, 'Wristband', 47),
(199, 'Name Badges', 47),
(200, 'Lanyards', 47),
(201, 'ID Cards & Badge Reel', 47),
(202, 'Keychain', 47),
(203, 'USB', 47),
(204, 'Paper Bag', 48),
(205, 'Kraft Bag', 48),
(206, 'Non Woven Bag', 48),
(207, 'Jute Bag', 48),
(208, 'Tote Bag', 48),
(209, 'Canvas Bag', 48),
(210, 'Drawstring Bag', 48),
(211, 'Cotton String Bag', 48),
(212, 'Napkin', 51),
(213, 'Paper Cup', 51),
(214, 'Water Bottle Label', 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mid_category`
--

CREATE TABLE `tbl_mid_category` (
  `mcat_id` int(11) NOT NULL,
  `mcat_name` varchar(255) NOT NULL,
  `tcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mid_category`
--

INSERT INTO `tbl_mid_category` (`mcat_id`, `mcat_name`, `tcat_id`) VALUES
(1, 'Stationery & Corporate Identity ', 1),
(2, 'Brochures & Flyers', 1),
(3, 'Stickers ', 1),
(4, 'Seals ', 1),
(5, 'CD / DVD', 1),
(6, 'Crowd Promotion ', 1),
(7, 'Voucher Books ', 1),
(8, 'Fashion', 2),
(9, 'Soft Furnishing', 2),
(10, 'Lifestyle', 2),
(11, 'Dining', 2),
(12, 'Pouches', 2),
(13, 'Fabric Range', 2),
(14, 'Patterns', 2),
(15, 'Frosted Sticker', 3),
(16, 'Wall Branding', 3),
(17, 'POS Display Stands', 3),
(18, 'Window Branding', 3),
(19, 'Wall Décor', 3),
(20, 'Magnetic Sheet', 3),
(21, 'Wall Frames', 3),
(22, 'Vehicle Graphics', 3),
(23, 'Ceremonial Ribbon', 3),
(24, 'Workplace', 3),
(25, 'Posters', 3),
(26, 'Floor Sticker', 3),
(27, 'Repositionable Cling', 3),
(28, '3D Indoor / Outdoor Signage', 4),
(29, 'Light Box Signages', 4),
(30, 'Name Plate', 4),
(31, 'Direction / Wayfinding Signage', 4),
(32, 'Safety Signage', 4),
(33, 'Sign Board', 4),
(34, 'Self Standing Letters', 4),
(35, 'Labels', 4),
(36, 'Advertising Flags', 5),
(37, 'Waving Flags', 5),
(38, 'Office Flags', 5),
(39, 'Decorative Flags', 5),
(40, 'Outdoor Flags', 5),
(41, 'Flag Base', 5),
(42, 'Standees', 6),
(43, 'Backdrops', 6),
(44, 'Exhibition & Events', 6),
(45, 'Shell Scheme Booths', 6),
(46, 'Office Essentials', 7),
(47, 'Trade Shows & Events', 7),
(48, 'Shopping/Promotional Bags', 7),
(49, 'Apparel', 7),
(50, 'Drinkware', 7),
(51, 'Event Disposables', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `size`, `color`, `quantity`, `unit_price`, `payment_id`) VALUES
(1, 83, 'Men\'s Ultra Cotton T-Shirt, Multipack', 'XL', 'Gray', '1', '19', '1647629329'),
(2, 92, 'Travelpro Laptop Carry-on Travel Tote Bag', 'One Size for All', 'Midnight Blue', '1', '91', '1647798593'),
(4, 101, 'Digital Infrared Thermometer for Adults and Kids', 'One Size for All', 'White', '1', '70', '1647799174'),
(5, 94, 'WD 5TB Elements Portable External Hard Drive HDD', '5T', 'Black', '1', '149', '1647800902');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(10) NOT NULL,
  `p_featured_photo` varchar(255) NOT NULL,
  `p_sec_photo` varchar(255) NOT NULL,
  `p_third_photo` varchar(225) NOT NULL,
  `p_feature` text NOT NULL,
  `ecat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_price`, `p_featured_photo`, `p_sec_photo`, `p_third_photo`, `p_feature`, `ecat_id`) VALUES
(10, 'Bristol Pack Business Cards', '1005', 'standard_business_cards.png', 'standard_business_cards_printing_dubai_01.png', '', '<li style=\"padding: 0px; margin: 0px; outline: none; color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">400 gsm Smooth white card</li><li style=\"padding: 0px; margin: 0px; outline: none; color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Matt Finish</li><li style=\"padding: 0px; margin: 0px; outline: none; color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Premium look and feel</li>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `image_url`) VALUES
(6, 'slider-6.png', 'https://www.dlxprint.com/digital-printing-services-dubai.html'),
(7, 'slider-7.png', 'https://www.dlxprint.com/fabric-and-fashion-printing-dubai.html'),
(8, 'slider-8.png', 'https://www.dlxprint.com/fabric-and-fashion-printing-dubai.html');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_top_category`
--

CREATE TABLE `tbl_top_category` (
  `tcat_id` int(11) NOT NULL,
  `tcat_name` varchar(255) NOT NULL,
  `show_on_menu` int(1) NOT NULL,
  `tcat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_top_category`
--

INSERT INTO `tbl_top_category` (`tcat_id`, `tcat_name`, `show_on_menu`, `tcat_image`) VALUES
(1, 'Print & Marketing', 1, '1723846557_Print And Marketing.png'),
(2, 'Fabric & Fashion ', 1, '1723846827_FABRIC & FASHION icon.jpg'),
(3, 'Office & Store Branding ', 1, '1723846931_OFFICE & STORE BRANDING icon.jpg'),
(4, 'Signages ', 1, '1723847027_Singages.jpg'),
(5, 'Flags', 1, '1723847088_Flag.png'),
(6, 'Backdrops & Exhibition', 1, '1723847139_BACKDROPS & EXHIBITION.jpg'),
(7, 'Corporate Gifts & Bags ', 1, '1723847171_CORPORATE GIFTS & BAGS.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(2, 'admin', 'admin@gmail.com', '1234', '21232f297a57a5a743894a0e4a801fc3', '', 'Super Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_end_category`
--
ALTER TABLE `tbl_end_category`
  ADD PRIMARY KEY (`ecat_id`);

--
-- Indexes for table `tbl_mid_category`
--
ALTER TABLE `tbl_mid_category`
  ADD PRIMARY KEY (`mcat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_ecat_id` (`ecat_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_top_category`
--
ALTER TABLE `tbl_top_category`
  ADD PRIMARY KEY (`tcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_end_category`
--
ALTER TABLE `tbl_end_category`
  MODIFY `ecat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `tbl_mid_category`
--
ALTER TABLE `tbl_mid_category`
  MODIFY `mcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_top_category`
--
ALTER TABLE `tbl_top_category`
  MODIFY `tcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_ecat_id` FOREIGN KEY (`ecat_id`) REFERENCES `tbl_end_category` (`ecat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
