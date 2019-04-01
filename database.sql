-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2018 at 07:42 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahihishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `ACC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACC_NAME` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ACC_PASS` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ACC_TYPE` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'Active',
  `ACC_PER` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`ACC_ID`),
  UNIQUE KEY `ACC_NAME` (`ACC_NAME`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ACC_ID`, `ACC_NAME`, `ACC_PASS`, `ACC_TYPE`, `ACC_PER`) VALUES
(2, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'Active', 'All'),
(4, 'ToaiToai', '4297f44b13955235245b2497399d7a93', 'Active', 'Comment'),
(5, 'Khuong', 'e10adc3949ba59abbe56e057f20f883e', 'Active', 'News'),
(9, 'TamTam', '4297f44b13955235245b2497399d7a93', 'Active', 'Product'),
(10, 'BachBach', '96e79218965eb72c92a549dd5a330112', 'Active', 'Comment');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `BILL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BILL_DATEORDER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BILL_DATESEND` date DEFAULT NULL,
  `BILL_STATUS` int(11) NOT NULL DEFAULT '0',
  `BILL_DISCOUNT` int(11) DEFAULT NULL,
  `BILL_TOTAL` double DEFAULT NULL,
  `BILL_ADDRESS` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BILL_ID`),
  KEY `CUS_ID` (`CUS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billinfo`
--

DROP TABLE IF EXISTS `billinfo`;
CREATE TABLE IF NOT EXISTS `billinfo` (
  `BILLINFO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BILL_ID` int(11) NOT NULL,
  `PRO_ID` int(11) NOT NULL,
  `BILNINFO_QUANTITY` int(11) NOT NULL DEFAULT '0',
  `BILLINFO_PRICE` double DEFAULT NULL,
  PRIMARY KEY (`BILLINFO_ID`),
  KEY `BILL_ID` (`BILL_ID`),
  KEY `PRO_ID` (`PRO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CATE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CATE_NAME` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `CATE_STATUS` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`CATE_ID`),
  UNIQUE KEY `CATE_NAME` (`CATE_NAME`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATE_ID`, `CATE_NAME`, `CATE_STATUS`) VALUES
(1, 'Shirt', 'Active'),
(4, 'Pants', 'Active'),
(5, 'Tshirt', 'Active'),
(6, 'Accessories', 'Active'),
(7, 'Other', 'Active'),
(16, 'Sweater', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMMENT_CONTENT` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `COMMENT_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `COMMENT_NAME` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PRO_ID` int(11) DEFAULT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `COMMENT_EMAIL` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`COMMENT_ID`),
  KEY `CUS_ID` (`CUS_ID`),
  KEY `PRO_ID` (`PRO_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`COMMENT_ID`, `COMMENT_CONTENT`, `COMMENT_DATE`, `COMMENT_NAME`, `PRO_ID`, `CUS_ID`, `COMMENT_EMAIL`) VALUES
(4, 'dddddddddddddddddddddddddddddddddddddddÄ‘', '2018-11-30 08:33:24', 'Pháº¡m Huá»³nh ChÃ­ TÃ¢m', 27, 1, 'khuon@gmail.com'),
(3, 'Ã¡ddddddddÄ‘', '2018-11-30 08:31:50', 'Ã¡Ä‘Ã¢sÄ‘Ã¢sÄ‘Ã¢sÄ‘Ã¢sd', 27, NULL, 'kgovier1@nsw.gov.au');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUS_USERNAME` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CUS_PASSWORD` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CUS_NAME` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `CUS_EMAIL` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CUS_PHONE` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `CUS_ADDRESS` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`CUS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_USERNAME`, `CUS_PASSWORD`, `CUS_NAME`, `CUS_EMAIL`, `CUS_PHONE`, `CUS_ADDRESS`) VALUES
(1, 'khuong', '123456', 'khương', 'khuon@gmail.com', '1234567889', 'áđâsdsáđâsđâsdá');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FEEDBACK_NAME` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `FEEDBACK_CONTENT` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `FEEDBACK_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FEEDBACK_TITLE` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `FEEDBACK_STATUS` int(11) DEFAULT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `FEEDBACK_EMAIL` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `FEEDBACK_REPLY` mediumtext COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`FEEDBACK_ID`),
  KEY `CUS_ID` (`CUS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FEEDBACK_ID`, `FEEDBACK_NAME`, `FEEDBACK_CONTENT`, `FEEDBACK_DATE`, `FEEDBACK_TITLE`, `FEEDBACK_STATUS`, `CUS_ID`, `FEEDBACK_EMAIL`, `FEEDBACK_REPLY`) VALUES
(1, 'Pháº¡m Huá»³nh ChÃ­ TÃ¢m', 'asdasdasdasdasds', '2018-11-30 07:52:58', 'a', 0, 1, 'toloag1811@gmail.com', ''),
(2, 'Pháº¡m Huá»³nh ChÃ­ TÃ¢m', 'asdasdasdasdasds', '2018-11-30 07:53:03', 'Samsung1', 0, NULL, 'toloag1811@gmail.com', ''),
(3, 'abcd', 'so good', '2018-11-30 11:37:06', 'ahihi', 0, NULL, 'abc@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NEWS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEWS_TITLE` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `NEWS_CONTENT` longtext COLLATE utf8_vietnamese_ci NOT NULL,
  `NEWS_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NEWS_IMG` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`NEWS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NEWS_ID`, `NEWS_TITLE`, `NEWS_CONTENT`, `NEWS_DATE`, `NEWS_IMG`) VALUES
(11, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet', '2018-11-28 20:51:09', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313670/2.jpg'),
(18, 'Lorem ipsum dolor sit amet', 'CÃ³ ráº¥t nhiá»u biáº¿n thá»ƒ cá»§a Lorem Ipsum mÃ  báº¡n cÃ³ thá»ƒ tÃ¬m tháº¥y, nhÆ°ng Ä‘a sá»‘ Ä‘Æ°á»£c biáº¿n Ä‘á»•i báº±ng cÃ¡ch thÃªm cÃ¡c yáº¿u tá»‘ hÃ i hÆ°á»›c, cÃ¡c tá»« ngáº«u nhiÃªn cÃ³ khi khÃ´ng cÃ³ váº» gÃ¬ lÃ  cÃ³ Ã½ nghÄ©a. Náº¿u báº¡n Ä‘á»‹nh sá»­ dá»¥ng má»™t Ä‘oáº¡n Lorem Ipsum, báº¡n nÃªn kiá»ƒm tra kÄ© Ä‘á»ƒ cháº¯n cháº¯n lÃ  khÃ´ng cÃ³ gÃ¬ nháº¡y cáº£m Ä‘Æ°á»£c giáº¥u á»Ÿ giá»¯a Ä‘oáº¡n vÄƒn báº£n. Táº¥t cáº£ cÃ¡c cÃ´ng cá»¥ sáº£n xuáº¥t vÄƒn báº£n máº«u Lorem Ipsum Ä‘á»u Ä‘Æ°á»£c lÃ m theo cÃ¡ch láº·p Ä‘i láº·p láº¡i cÃ¡c Ä‘oáº¡n chá»¯ cho tá»›i Ä‘á»§ thÃ¬ thÃ´i, khiáº¿n cho lipsum.com trá»Ÿ thÃ nh cÃ´ng cá»¥ sáº£n xuáº¥t Lorem Ipsum Ä‘Ã¡ng giÃ¡ nháº¥t trÃªn máº¡ng. Trang web nÃ y sá»­ dá»¥ng hÆ¡n 200 tá»« la-tinh, káº¿t há»£p thuáº§n thá»¥c nhiá»u cáº¥u trÃºc cÃ¢u Ä‘á»ƒ táº¡o ra vÄƒn báº£n Lorem Ipsum trÃ´ng cÃ³ váº» tháº­t sá»± há»£p lÃ­. Nhá» tháº¿, vÄƒn báº£n Lorem Ipsum Ä‘Æ°á»£c táº¡o ra mÃ  khÃ´ng cáº§n má»™t sá»± láº·p láº¡i nÃ o, cÅ©ng khÃ´ng cáº§n chÃ¨n thÃªm cÃ¡c tá»« ngá»¯ hÃ³m há»‰nh hay thiáº¿u tráº­t tá»±.', '2018-11-29 20:35:36', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313670/5.jpg'),
(19, 'Lorem ipsum dolor sit amet', 'chá»‰ lÃ  má»™t Ä‘oáº¡n vÄƒn báº£n ngáº«u nhiÃªn. NgÆ°á»i ta tÃ¬m tháº¥y nguá»“n gá»‘c cá»§a nÃ³ tá»« nhá»¯ng tÃ¡c pháº©m vÄƒn há»c la-tinh cá»• Ä‘iá»ƒn xuáº¥t hiá»‡n tá»« nÄƒm 45 trÆ°á»›c CÃ´ng NguyÃªn, nghÄ©a lÃ  nÃ³ Ä‘Ã£ cÃ³ khoáº£ng hÆ¡n 2000 tuá»•i. Má»™t giÃ¡o sÆ° cá»§a trÆ°á»ng Hampden-Sydney College (bang Virginia - Má»¹) quan tÃ¢m tá»›i má»™t trong nhá»¯ng tá»« la-tinh khÃ³ hiá»ƒu nháº¥t, \"consectetur\", trÃ­ch tá»« má»™t Ä‘oáº¡n cá»§a Lorem Ipsum, vÃ  Ä‘Ã£ nghiÃªn cá»©u táº¥t cáº£ cÃ¡c á»©ng dá»¥ng cá»§a tá»« nÃ y trong vÄƒn há»c cá»• Ä‘iá»ƒn, Ä‘á»ƒ tá»« Ä‘Ã³ tÃ¬m ra nguá»“n gá»‘c khÃ´ng thá»ƒ chá»‘i cÃ£i cá»§a Lorem Ipsum. Tháº­t ra, nÃ³ Ä‘Æ°á»£c tÃ¬m tháº¥y trong cÃ¡c Ä‘oáº¡n 1.10.32 vÃ  1.10.33 cá»§a \"De Finibus Bonorum et Malorum\" (Äá»‰nh tá»‘i thÆ°á»£ng cá»§a CÃ¡i Tá»‘t vÃ  CÃ¡i Xáº¥u) viáº¿t bá»Ÿi Cicero vÃ o nÄƒm 45 trÆ°á»›c CÃ´ng NguyÃªn. Cuá»‘n sÃ¡ch nÃ y lÃ  má»™t luáº­n thuyáº¿t Ä‘áº¡o lÃ­ ráº¥t phá»• biáº¿n trong thá»i kÃ¬ Phá»¥c HÆ°ng. DÃ²ng Ä‘áº§u tiÃªn cá»§a Lorem Ipsum, \"Lorem ipsum dolor sit amet...\" Ä‘Æ°á»£c trÃ­ch tá»« má»™t cÃ¢u trong Ä‘oáº¡n thá»© 1.10.32.', '2018-11-29 20:35:57', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313671/YSL-Travis-Scott-4.jpg'),
(20, 'Lorem ipsum dolor sit amet', 'chá»‰ lÃ  má»™t Ä‘oáº¡n vÄƒn báº£n ngáº«u nhiÃªn. NgÆ°á»i ta tÃ¬m tháº¥y nguá»“n gá»‘c cá»§a nÃ³ tá»« nhá»¯ng tÃ¡c pháº©m vÄƒn há»c la-tinh cá»• Ä‘iá»ƒn xuáº¥t hiá»‡n tá»« nÄƒm 45 trÆ°á»›c CÃ´ng NguyÃªn, nghÄ©a lÃ  nÃ³ Ä‘Ã£ cÃ³ khoáº£ng hÆ¡n 2000 tuá»•i. Má»™t giÃ¡o sÆ° cá»§a trÆ°á»ng Hampden-Sydney College (bang Virginia - Má»¹) quan tÃ¢m tá»›i má»™t trong nhá»¯ng tá»« la-tinh khÃ³ hiá»ƒu nháº¥t, \"consectetur\", trÃ­ch tá»« má»™t Ä‘oáº¡n cá»§a Lorem Ipsum, vÃ  Ä‘Ã£ nghiÃªn cá»©u táº¥t cáº£ cÃ¡c á»©ng dá»¥ng cá»§a tá»« nÃ y trong vÄƒn há»c cá»• Ä‘iá»ƒn, Ä‘á»ƒ tá»« Ä‘Ã³ tÃ¬m ra nguá»“n gá»‘c khÃ´ng thá»ƒ chá»‘i cÃ£i cá»§a Lorem Ipsum. Tháº­t ra, nÃ³ Ä‘Æ°á»£c tÃ¬m tháº¥y trong cÃ¡c Ä‘oáº¡n 1.10.32 vÃ  1.10.33 cá»§a \"De Finibus Bonorum et Malorum\" (Äá»‰nh tá»‘i thÆ°á»£ng cá»§a CÃ¡i Tá»‘t vÃ  CÃ¡i Xáº¥u) viáº¿t bá»Ÿi Cicero vÃ o nÄƒm 45 trÆ°á»›c CÃ´ng NguyÃªn. Cuá»‘n sÃ¡ch nÃ y lÃ  má»™t luáº­n thuyáº¿t Ä‘áº¡o lÃ­ ráº¥t phá»• biáº¿n trong thá»i kÃ¬ Phá»¥c HÆ°ng. DÃ²ng Ä‘áº§u tiÃªn cá»§a Lorem Ipsum, \"Lorem ipsum dolor sit amet...\" Ä‘Æ°á»£c trÃ­ch tá»« má»™t cÃ¢u trong Ä‘oáº¡n thá»© 1.10.32.', '2018-11-29 20:36:11', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313670/4.jpg'),
(21, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tristique nibh non quam a\r\nSed a neque cursus, auctor tortor eu, volutpat magna. Vestibulum nibh nunc, blandit in velit in, posuere luctus ipsum. Nam eget purus blandit, suscipit leo ac, ullamcorper mi. Aliquam erat volutpat. Cras vestibulum, lacus a lacinia egestas, ipsum sem viverra felis, nec feugiat nibh sem eu odio. Vestibulum metus tellus, tincidunt vitae dapibus et, sodales id sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur et nisi tincidunt, egestas ', '2018-11-29 20:36:42', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313670/3.jpg'),
(22, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur aivamus sagittis urna dignissim nisl dictum, non gravida nibh molestie. Nam imperdiet felis justo, et consequat ante ornare ac.', '2018-11-29 20:37:01', 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1543313670/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_NAME` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `PRO_PRICE` double NOT NULL,
  `PRO_IMG` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PRO_DESCRIPTION` varchar(500) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `CATE_ID` int(11) DEFAULT NULL,
  `PRO_SEASON` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PRO_GENDER` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PRO_STATUS` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT 'Active',
  PRIMARY KEY (`PRO_ID`),
  UNIQUE KEY `PRO_NAME` (`PRO_NAME`),
  KEY `CATE_ID` (`CATE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRO_ID`, `PRO_NAME`, `PRO_PRICE`, `PRO_IMG`, `PRO_DESCRIPTION`, `CATE_ID`, `PRO_SEASON`, `PRO_GENDER`, `PRO_STATUS`) VALUES
(21, 'Havana', 200, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_18.jpg', 'lamaba12', 7, 'All', 'Unisex', 'Active'),
(11, 'Watch', 150, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807706/asset_4.jpg', '100', 6, 'All', 'Unisex', 'Active'),
(12, 'Summer Shirt', 80, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_10.jpg', 'dddddddd', 1, 'Summer', 'Male', 'Active'),
(13, 'Sexy', 110, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807706/asset_1.jpg', '111', 5, 'All', 'Female', 'Active'),
(20, 'Nice pants', 200, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807706/asset_3.jpg', 'lamaba', 4, 'All', 'Male', 'Active'),
(22, 'Good Hat', 100, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_14.jpg', 'lorem', 7, 'All', 'Unisex', 'Active'),
(23, 'Lalala', 100, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_19.jpg', 'lorem', 1, 'Winter', 'Male', 'Active'),
(24, 'Shirt 2', 145, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_17.jpg', 'lorem', 1, 'All', 'Male', 'Active'),
(25, 'Black Hat', 3, '  https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_13.jpg', 'Lorem', 7, 'Winter', 'Unisex', 'Active'),
(26, 'Glass', 50, '  https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807706/asset_2.jpg', 'Lorem', 6, 'All', 'Unisex', 'Active'),
(27, 'Men t-shirt', 180, '      https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807706/asset_16.jpg', 'Lorem', 7, 'All', 'Male', 'Active'),
(28, 'Backpack', 123, 'https://res.cloudinary.com/dnm7dhpwb/image/upload/v1540807707/asset_19.jpg', 'dgdfgdfgdfgdfgf', 16, 'All', 'Unisex', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
