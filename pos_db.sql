-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 08:43 PM
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
  `invoce_id` int(11) NOT NULL,
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
(1, 'Macbook Pro', 'computer', 1200, 1300, 10, 'Apple is working on a larger MacBook Air, which is on track for release in 2023', '6328ad7709e3d.jpg'),
(2, 'Samsung Tablet', 'Tablet', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED', '63335f590c59e.jpg'),
(3, 'Ipad', 'Tablet', 900, 1000, 50, 'Released 2019, July · 345g (Wi-Fi), 347g (LTE), 8mm thickness · Android 9.0, up to Android 11 · 32GB/64GB storage, microSDXC', '6333697e434b1.jpg'),
(5, 'Macbook Pro1', 'computer', 1200, 1300, 10, 'Apple is working on a larger MacBook Air, which is on track for release in 2023', '6328ad7709e3d.jpg'),
(6, 'Ipad pro', 'Tablet', 900, 1200, 50, 'Released 2019, July · 345g (Wi-Fi), 347g (LTE), 8mm thickness · Android 9.0, up to Android 11 · 32GB/64GB storage, microSDXC', '6333697e434b1.jpg'),
(7, 'Samsung mobile', 'Tablet', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED', '63335f590c59e.jpg'),
(8, 'Readmi mobile', 'mobile', 1000, 1200, 100, 'เชื่อมต่อ Samsung DeX ประสบการณ์การใช้งานคอมพิวเตอเดสก์ทอป ดีไซน์บางเฉียบ พกพาง่าย คุ้มค่า. แท็บเล็ตโทรได้ จอใหญ่ บาง เบา ชัด ใสด้วย Super AMOLED  ', '63346ffab3fb9.jpg'),
(10, 'Iphone 14 Pro Max', 'mobile', 1100, 1200, 100, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg'),
(11, 'Iphone 14 Pro', 'mobile', 900, 1000, 100, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg'),
(12, 'Iphone 14', 'mobile', 800, 900, 100, 'iPhone 14 Pro และ iPhone 14 Pro Max ไม่มีอะแดปเตอร์แปลงไฟหรือ EarPods ให้มาด้วย ซึ่งเป็นส่วนหนึ่งในความพยายามของเราที่จะไปสู่ ความเป็นกลางทางคาร์บอนภายในปี 2030 สิ่งที่มีมาให้ในกล่องได้แก่สาย USB‑C เป็น Lightning ', '6338630dddeb2.jpg');

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
  ADD PRIMARY KEY (`invoce_id`);

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
  MODIFY `invoce_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
