-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2019 at 02:27 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ads`
--

DROP TABLE IF EXISTS `tabel_ads`;
CREATE TABLE IF NOT EXISTS `tabel_ads` (
  `idAds` varchar(50) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `url` text,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_ads`
--

INSERT INTO `tabel_ads` (`idAds`, `title`, `description`, `url`, `createdAt`) VALUES
('1', 'Yasser ads', 'An advert about codeigniter PHP code.\r\n   ', 'http://www.codeignter.com', '2019-01-14 05:07:32'),
('19ed6e6471fe4509896ce79e8d85770d', 'yasser final', 'this time it will work isa gooood  ', 'http://www.google.com', '2019-01-30 04:01:37'),
('1f732fde145c436aba4b2760eb14f862', 'yasser', 'New advertisement about codeIgniter\r\n', 'http://www.codeignter.com', '2019-02-01 09:31:32'),
('8c55f71d94e444bea231088e39440a61', 'New ads', 'New advertisement about laravel', 'http://www.google.com', '2019-02-07 06:16:12'),
('2091e26bedbc49c6899e3a98780be77f', 'yasser', 'adsafdsfd gfhgfjhgjh jkhkjkl', 'http://www.codeignter.com', '2019-03-04 18:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_notification`
--

DROP TABLE IF EXISTS `tabel_notification`;
CREATE TABLE IF NOT EXISTS `tabel_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPosting` varchar(50) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idPosting` (`idPosting`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_notification`
--

INSERT INTO `tabel_notification` (`id`, `idPosting`, `idUser`, `status`) VALUES
(8, '6d09d9e1c6134e3e9bae64c01e5595bb', '58c30fe3bdfe446db3d51b38cc8953bd', 1),
(9, 'c6f631493850452597dfca41e0cdc55e', '58c30fe3bdfe446db3d51b38cc8953bd', 1),
(10, 'c6f631493850452597dfca41e0cdc55e', 'USR-451BF190-8A26-587E-A3B8-9DCA52349B23', 0),
(11, 'bc9355b26e4543cdaaf9a37a716e409b', 'useridyasser', 1),
(12, '97d0758c09ee49c28cc5f398b951ab1e', '58c30fe3bdfe446db3d51b38cc8953bd', 1),
(13, '97d0758c09ee49c28cc5f398b951ab1e', 'USR-451BF190-8A26-587E-A3B8-9DCA52349B23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_offer`
--

DROP TABLE IF EXISTS `tabel_offer`;
CREATE TABLE IF NOT EXISTS `tabel_offer` (
  `idOffer` varchar(100) NOT NULL,
  `idUser` varchar(100) NOT NULL,
  `idPosting` varchar(100) NOT NULL,
  `message` text,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idOffer`),
  KEY `idUser` (`idUser`),
  KEY `idPosting` (`idPosting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_offer`
--

INSERT INTO `tabel_offer` (`idOffer`, `idUser`, `idPosting`, `message`, `accepted`, `createdAt`, `readAt`) VALUES
('3f724379fd22455798a7c1c83d496cdf', '58c30fe3bdfe446db3d51b38cc8953bd', '6d09d9e1c6134e3e9bae64c01e5595bb', 'this is my offer for it\'s a good one', 1, '2019-03-04 20:31:36', '2019-03-04 20:32:24'),
('6a678fb5c90441e399dc1b26a9fd9714', '58c30fe3bdfe446db3d51b38cc8953bd', '0d3a775ab00a4b7ea28234f3159eaf75', 'test message', 0, '2019-03-05 09:21:39', '2019-03-05 09:22:28'),
('8c65862298764e70aaa2c32ebef25d54', '58c30fe3bdfe446db3d51b38cc8953bd', '0d3a775ab00a4b7ea28234f3159eaf75', 'I have an offer ', 0, '2019-03-05 07:45:45', '2019-03-05 07:47:24'),
('a38a11ba054f4dd7a658fdc85fe9554e', '58c30fe3bdfe446db3d51b38cc8953bd', 'c6f631493850452597dfca41e0cdc55e', 'test', 0, '2019-03-05 09:14:39', NULL),
('c22a10917b6648cdb57c72d05c3b817a', '58c30fe3bdfe446db3d51b38cc8953bd', 'c6f631493850452597dfca41e0cdc55e', 'Test', 0, '2019-03-05 09:56:25', NULL),
('f508b9387336429c957dd5d2bd3f0125', '58c30fe3bdfe446db3d51b38cc8953bd', '0d3a775ab00a4b7ea28234f3159eaf75', 'message', 0, '2019-03-05 09:12:42', '2019-03-05 09:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_payment`
--

DROP TABLE IF EXISTS `tabel_payment`;
CREATE TABLE IF NOT EXISTS `tabel_payment` (
  `idPayment` varchar(100) NOT NULL,
  `idUser` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` enum('Silver','Gold','Platinum') NOT NULL,
  `verifDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verification` tinyint(1) NOT NULL DEFAULT '0',
  `verifMessage` text,
  PRIMARY KEY (`idPayment`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_posting`
--

DROP TABLE IF EXISTS `tabel_posting`;
CREATE TABLE IF NOT EXISTS `tabel_posting` (
  `idPosting` varchar(100) NOT NULL,
  `idUser` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `minimumBudget` int(11) NOT NULL,
  `maximumBudget` int(11) NOT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT '0',
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verifMessage` text,
  `productCategory` enum('Rumah','Ruko','Tanah','Apartemen','Vila','Office','Pabrik','Gudang') NOT NULL,
  `requestCategory` enum('Beli','Sewa') NOT NULL,
  `location` varchar(100) NOT NULL,
  `promotedAt` timestamp NULL DEFAULT NULL,
  `verifDate` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `sponsorTime` smallint(6) NOT NULL DEFAULT '0',
  `sponsorDate` date DEFAULT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPosting`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_posting`
--

INSERT INTO `tabel_posting` (`idPosting`, `idUser`, `title`, `description`, `minimumBudget`, `maximumBudget`, `verification`, `postingDate`, `verifMessage`, `productCategory`, `requestCategory`, `location`, `promotedAt`, `verifDate`, `views`, `sponsorTime`, `sponsorDate`, `complete`) VALUES
('062571f61dba4581bb065923e22a5451', 'useridyasser', 'two post', 'the searching test is going here', 20000000, 30000000, 1, '2019-03-05 20:25:22', 'ok', 'Rumah', 'Beli', 'Bangka Belitung', '2019-03-05 18:25:22', '2019-03-05 18:25:45', 5, 0, NULL, 0),
('0d3a775ab00a4b7ea28234f3159eaf75', 'useridyasser', 'New Free Wifi Office', 'In a good location between toll and city.', 20000, 20000000, 1, '2019-03-05 09:38:30', 'ok', 'Office', 'Beli', 'Sulawesi Tengah', '2019-03-05 07:38:30', '2019-03-05 08:07:30', 50, 0, NULL, 0),
('6d09d9e1c6134e3e9bae64c01e5595bb', 'useridyasser', 'First post', 'this is the first post for the user Panel', 2000000, 3000000, 1, '2019-03-04 22:22:01', 'Ok', 'Rumah', 'Beli', 'Bali', '2019-03-04 20:22:01', '2019-03-04 20:22:39', 4, 0, NULL, 1),
('97d0758c09ee49c28cc5f398b951ab1e', 'useridyasser', 'five post', 'this is the fifth post mmmmmm', 2000000, 300000000, 1, '2019-03-06 02:24:51', 'ok', 'Rumah', 'Beli', 'Bali', '2019-03-06 00:24:51', '2019-03-06 00:25:32', 2, 0, NULL, 0),
('bc9355b26e4543cdaaf9a37a716e409b', '58c30fe3bdfe446db3d51b38cc8953bd', 'Penyewaan Kantor', 'Penyewaan Kantor di Kalimantan Tengah', 200000000, 300000000, 0, '2019-03-05 11:29:28', NULL, 'Office', 'Sewa', 'Kalimantan Tengah', '2019-03-05 09:29:28', NULL, 2, 0, NULL, 0),
('c6f631493850452597dfca41e0cdc55e', 'useridyasser', 'second one', 'this is the second one for soponsor', 200000000, 300000000, 1, '2019-03-04 23:14:59', 'ok', 'Rumah', 'Sewa', 'Bali', '2019-03-04 21:14:59', '2019-03-04 21:15:36', 20, 4, '2019-03-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

DROP TABLE IF EXISTS `tabel_user`;
CREATE TABLE IF NOT EXISTS `tabel_user` (
  `idUser` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(20) NOT NULL,
  `password` varchar(50) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `level` varchar(45) NOT NULL,
  `subscribes` text,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`idUser`, `name`, `address`, `phoneNumber`, `email`, `location`, `password`, `createdAt`, `status`, `level`, `subscribes`) VALUES
('58c30fe3bdfe446db3d51b38cc8953bd', 'bhagaskara', 'Jl Kemuning', '085769009084', 'asdf@gmail.com', 'Palembang', '1adbb3178591fd5bb0c248518f39bf6d', '2019-03-04 11:01:17', 1, 'User-y583s682r-262B-5EB7-B609-E89FC7DC9699', 'Bali-DKI Jakarta-DI Yogyakarta-Gorontalo-Kalimantan Selatan-'),
('useridyasser', 'yasser', 'Mansours', '', 'yasser_e2005@hotmail.com', 'Banten', 'eebae2d8743ab041dbc2fc259a92ca5d', '2019-01-13 18:41:12', 1, 'Admin-y583s682r-5889-5791-AE8F-347F25FC0172', 'Kalimantan Barat-Kalimantan Tengah-'),
('USR-451BF190-8A26-587E-A3B8-9DCA52349B23', 'bhagaskara123', 'Jl. Kemuning', '085769009084', 'bhagaskaraliancer@gmail.com', 'Sumatera Selatan', '25d55ad283aa400af464c76d713c07ad', '2019-01-06 04:44:52', 1, 'User-y583s682r-262B-5EB7-B609-E89FC7DC9699', 'Bali-Jambi-');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `version_app` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`version_app`) VALUES
('1.0.0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_notification`
--
ALTER TABLE `tabel_notification`
  ADD CONSTRAINT `tabel_notification_ibfk_1` FOREIGN KEY (`idPosting`) REFERENCES `tabel_posting` (`idPosting`),
  ADD CONSTRAINT `tabel_notification_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tabel_user` (`idUser`);

--
-- Constraints for table `tabel_offer`
--
ALTER TABLE `tabel_offer`
  ADD CONSTRAINT `tabel_offer_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tabel_user` (`idUser`),
  ADD CONSTRAINT `tabel_offer_ibfk_2` FOREIGN KEY (`idPosting`) REFERENCES `tabel_posting` (`idPosting`);

--
-- Constraints for table `tabel_payment`
--
ALTER TABLE `tabel_payment`
  ADD CONSTRAINT `tabel_payment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tabel_user` (`idUser`);

--
-- Constraints for table `tabel_posting`
--
ALTER TABLE `tabel_posting`
  ADD CONSTRAINT `tabel_posting_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tabel_user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
