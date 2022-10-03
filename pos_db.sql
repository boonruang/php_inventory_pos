-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 06:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`) VALUES
(18, 'mobile'),
(19, 'computer'),
(20, 'Laptop'),
(21, 'Tablet'),
(22, 'camera'),
(24, 'Phone'),
(26, 'drinks'),
(27, 'food'),
(28, 'algohol'),
(29, 'coffee'),
(30, 'ittalian soda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `subtotal` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `customer_name`, `order_date`, `subtotal`, `tax`, `discount`, `total`, `paid`, `due`, `payment_type`) VALUES
(7, 'Boonruang Seedapunt', '2022-10-02', 2000, 100, 10, 2090, 2500, -410, 'Card'),
(8, 'Kobfha Seedpaunt', '2022-10-02', 1000, 50, 0, 1050, 1500, -450, 'Cash'),
(9, 'Ocean', '2022-10-02', 2000, 100, 0, 2100, 2500, -400, 'Cash'),
(11, 'Toyashi Habuto', '2022-10-03', 7650, 382.5, 0, 8032.5, 8100, -67.5, 'Cash'),
(12, 'Toy', '2022-10-03', 3100, 155, 0, 3255, 3500, -245, 'Cash'),
(13, 'Sky', '2022-10-03', 13200, 660, 0, 13860, 13500, 360, 'Cash'),
(14, 'aaa', '2022-10-03', 3000, 150, 0, 3150, 3200, -50, 'Cash'),
(15, 'faizen', '2022-10-03', 14400, 720, 0, 15120, 16000, -880, 'Check'),
(16, 'Salah Uddin', '2022-10-03', 5850, 292.5, 0, 6142.5, 6200, -57.5, 'Cash'),
(17, 'Kishore', '2022-10-03', 4050, 202.5, 0, 4252.5, 4300, -47.5, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_details`
--

CREATE TABLE `tbl_invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice_details`
--

INSERT INTO `tbl_invoice_details` (`id`, `invoice_id`, `product_id`, `product_name`, `qty`, `price`, `order_date`) VALUES
(12, 7, 3, 'Ipad', 1, 1000, '2022-10-02'),
(13, 7, 11, 'Iphone 14 Pro', 1, 1000, '2022-10-02'),
(14, 8, 3, 'Ipad', 1, 1000, '2022-10-02'),
(15, 9, 3, 'Ipad', 1, 1000, '2022-10-02'),
(16, 9, 11, 'Iphone 14 Pro', 1, 1000, '2022-10-02'),
(21, 12, 3, 'Ipad', 1, 1000, '2022-10-03'),
(22, 12, 6, 'Ipad pro', 1, 1200, '2022-10-03'),
(23, 12, 12, 'Iphone 14', 1, 900, '2022-10-03'),
(127, 17, 1, 'Macbook Pro', 3, 1300, '2022-10-03'),
(128, 17, 14, 'Harddisk 3.5', 1, 150, '2022-10-03'),
(129, 11, 13, 'Harddisk', 51, 150, '2022-10-03'),
(130, 13, 6, 'Ipad pro', 11, 1200, '2022-10-03'),
(131, 14, 14, 'Harddisk 3.5', 20, 150, '2022-10-03'),
(132, 15, 15, 'Lenovo Miix 630 Laptop', 16, 900, '2022-10-03'),
(133, 16, 16, 'Redmi 5A', 2, 450, '2022-10-03'),
(134, 16, 10, 'Iphone 14 Pro Max', 4, 1200, '2022-10-03'),
(135, 16, 13, 'Harddisk', 1, 150, '2022-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pcategory` varchar(200) NOT NULL,
  `purchaseprice` float NOT NULL,
  `saleprice` float NOT NULL,
  `pstock` int(11) NOT NULL,
  `pdescription` varchar(250) NOT NULL,
  `pimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `pname`, `pcategory`, `purchaseprice`, `saleprice`, `pstock`, `pdescription`, `pimage`) VALUES
(1, 'Macbook Pro', 'computer', 1200, 1300, 7, 'Apple is working on a larger MacBook Air, which is on track for release in 2023', '6328ad7709e3d.jpg'),
(2, 'Samsung Tablet', 'Tablet', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED', '63335f590c59e.jpg'),
(3, 'Ipad', 'Tablet', 900, 1000, 47, 'Released 2019, July · 345g (Wi-Fi), 347g (LTE), 8mm thickness · Android 9.0, up to Android 11 · 32GB/64GB storage, microSDXC', '6333697e434b1.jpg'),
(5, 'Macbook Pro1', 'computer', 1200, 1300, 10, 'Apple is working on a larger MacBook Air, which is on track for release in 2023', '6328ad7709e3d.jpg'),
(6, 'Ipad pro', 'Tablet', 900, 1200, 38, 'Released 2019, July · 345g (Wi-Fi), 347g (LTE), 8mm thickness · Android 9.0, up to Android 11 · 32GB/64GB storage, microSDXC', '6333697e434b1.jpg'),
(7, 'Samsung mobile', 'Tablet', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED', '63335f590c59e.jpg'),
(8, 'Readmi mobile', 'mobile', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED  ', '63346ffab3fb9.jpg'),
(10, 'Iphone 14 Pro Max', 'mobile', 1100, 1200, 216, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg'),
(11, 'Iphone 14 Pro', 'mobile', 900, 1000, 99, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg'),
(12, 'Iphone 14', 'mobile', 800, 900, 99, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg'),
(13, 'Harddisk', 'Laptop', 140, 150, 348, 'Harddisk 2.5\" for laptop', '63346ffab3fb9.jpg'),
(14, 'Harddisk 3.5\"', 'Laptop', 140, 150, 379, 'Harddisk 3.5\" for laptop', '63346ffab3fb9.jpg'),
(15, 'Lenovo Miix 630 Laptop', 'Laptop', 800, 900, 80, 'Lenovo Miix 630 Laptop Harddisk 3.5\" laptop', '63346ffab3fb9.jpg'),
(16, 'Redmi 5A', 'mobile', 400, 450, 98, 'เชื่อมต่อ Redmi 5A ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED  ', '63346ffab3fb9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `useremail`, `password`, `role`) VALUES
(13, 'scubatoy', 'scubatoy@gmail.com', '1234', 'Admin'),
(14, 'boonruang', 'boonruang@gmail.com', '1234', 'User'),
(15, 'Toyashi', 'Toyashi@hotmail.com', '1234', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
