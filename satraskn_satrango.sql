-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 09:10 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satraskn_satrango`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(550) NOT NULL,
  `admin_email` varchar(550) NOT NULL,
  `admin_password` varchar(550) NOT NULL,
  `admin_image` varchar(550) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `phone`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '', '9989522372'),
(2, 'Phaneendra', 'dreamlandworks@gmail.com', '9989522372', '', '9989522372');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_feedback`
--

CREATE TABLE `app_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `profession_rating` int(11) NOT NULL,
  `services_rating` int(11) NOT NULL,
  `app_interface_rating` int(11) NOT NULL,
  `customer_support_rating` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_feedback`
--

INSERT INTO `app_feedback` (`id`, `user_id`, `message`, `rating`, `profession_rating`, `services_rating`, `app_interface_rating`, `customer_support_rating`, `type`, `date_time`) VALUES
(1, 4, 'asdsa', 4, 0, 3, 0, 2, '', '2021-01-20 11:47:50'),
(2, 2, 'dddd', 3, 2, 2, 2, 2, '', '2021-01-20 12:36:47'),
(3, 2, 'tesy', 2, 2, 1, 2, 1, '', '2021-01-20 03:29:44'),
(4, 2, 'tesy', 2, 2, 1, 2, 1, '', '2021-01-20 03:29:57'),
(5, 2, 'ffg\n\n\n', 4, 3, 3, 2, 3, '', '2021-01-21 01:55:18'),
(6, 29, 'Hgfhgh', 3, 3, 3, 3, 3, 'user', '2021-02-19 04:18:24'),
(7, 29, 'Goff gg', 4, 4, 5, 2, 5, 'user', '2021-02-20 07:46:01'),
(8, 46, 'alp is not working smoothly please do something ', 5, 5, 5, 5, 5, 'vendor', '2021-03-18 04:24:16'),
(9, 46, 'alp is not working smoothly please do something ', 5, 5, 5, 5, 5, 'vendor', '2021-03-18 04:24:19'),
(10, 46, 'alp is not working smoothly please do something ', 5, 5, 5, 5, 5, 'vendor', '2021-03-18 04:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `bid_job_payment`
--

CREATE TABLE `bid_job_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `bid_job_id` int(11) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `payment_type` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_job_payment`
--

INSERT INTO `bid_job_payment` (`id`, `user_id`, `vendor_id`, `bid_job_id`, `amount`, `payment_type`, `created_at`) VALUES
(1, 1, 11, 1, '11', 'sd', '2021-04-03 02:04:00'),
(2, 1, 11, 1, '11', 'sd', '2021-04-03 02:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `bid_on_job`
--

CREATE TABLE `bid_on_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `bid_amount` float NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `estimated_time` varchar(120) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `submission_type` enum('Sealed','Open','','') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted_by` int(11) NOT NULL COMMENT 'user_id',
  `reject_by` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=accept,2=reject',
  `modify_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_on_job`
--

INSERT INTO `bid_on_job` (`id`, `job_id`, `vendor_id`, `bid_amount`, `proposal`, `estimated_time`, `attachment`, `submission_type`, `created_date`, `accepted_by`, `reject_by`, `status`, `modify_date`) VALUES
(1, 38, 14, 7, 'u7u7u7', '8', '211292cdfa79a0ab983a905a58bc2d93.jpg', 'Open', '2021-03-31 03:28:49', 0, '', 0, '0000-00-00 00:00:00'),
(2, 38, 66, 120, 'hi uam vendor sanjay bids on this job', '2', '20573d63e3bdd2f7325d3f8533ed1ec8.jpg,e8b49a107f984a3aef4b038835ae92a7.jpg', 'Open', '2021-03-31 03:46:24', 55, '', 1, '2021-03-31 16:19:00'),
(4, 39, 29, 200, 'hii mnbmjk', '3', 'bc6539f6dfca3dcd7ec7a41d7d15cf13.jpg,bb4176b2eafc07b3b50c676d4f216ec0.jpg', 'Open', '2021-03-31 05:38:17', 55, '', 1, '2021-04-01 12:36:00'),
(5, 43, 66, 12000, 'sanjay vendr', '55', '701087e135f25b1fd34f114959f4cbec.jpg', 'Sealed', '2021-04-01 02:41:09', 55, '', 1, '2021-04-01 18:20:00'),
(11, 56, 66, 2000, 'hi it\'s a payment getaway checking .', '5 hours', '1d2995d25a8f75cf7d3f135ddaf897f7.jpg,732be28631be1a78e9bbdb6b8ad38180.jpg', 'Open', '2021-04-05 04:03:07', 14, '', 1, '2021-04-05 16:35:00'),
(8, 47, 66, 5000, 'subhash', '123', 'a0a653d2349caa714175f3f62bdf9657.jpg', 'Sealed', '2021-04-01 05:39:22', 0, '', 0, '0000-00-00 00:00:00'),
(9, 30, 29, 6000, 'Test add sdfs dsf ad asdf', '4 Days', 'fb84b05c856d837abc32c610991d78fa.jpeg', 'Sealed', '2021-04-03 04:47:56', 0, '', 0, '0000-00-00 00:00:00'),
(10, 51, 66, 1, 'bid amut est', '5 days', '', 'Open', '2021-04-05 02:39:29', 55, '', 1, '2021-04-05 15:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `id` int(11) NOT NULL,
  `bookingId` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `from_time` varchar(150) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `start_location1` varchar(255) NOT NULL,
  `to_location1` varchar(255) NOT NULL,
  `end_location1` varchar(255) NOT NULL,
  `to_loaction2` varchar(255) NOT NULL,
  `to_location3` varchar(255) NOT NULL,
  `work_description` varchar(255) NOT NULL,
  `upload_doc` varchar(255) NOT NULL,
  `job_estimate` varchar(150) NOT NULL,
  `weight` varchar(150) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `job_status` enum('Pending','Inprogress','Complete','Cancel','Upcoming','Resume','Paused') NOT NULL,
  `cancel_by` varchar(150) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `booking_type` varchar(50) NOT NULL,
  `otp` int(11) NOT NULL,
  `verify_otp` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `paused_time` time NOT NULL,
  `resume_time` time NOT NULL,
  `complete_time` time NOT NULL,
  `modified_date` datetime NOT NULL,
  `amount` double(65,2) NOT NULL,
  `extra_charge` double(65,2) NOT NULL,
  `extra_material` varchar(255) NOT NULL,
  `payment_status` enum('Unpaid','Paid','','') NOT NULL,
  `vendor_doc` varchar(255) NOT NULL,
  `appropriate_status` int(11) NOT NULL COMMENT '0=not,1=appropriated',
  `extra_charge_status` int(11) NOT NULL,
  `mark_complete` int(11) NOT NULL COMMENT '1=complete,0=not'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`id`, `bookingId`, `user_id`, `vendor_id`, `service_id`, `booking_date`, `from_time`, `to_time`, `start_location1`, `to_location1`, `end_location1`, `to_loaction2`, `to_location3`, `work_description`, `upload_doc`, `job_estimate`, `weight`, `date_time`, `job_status`, `cancel_by`, `reason`, `type`, `booking_type`, `otp`, `verify_otp`, `start_time`, `paused_time`, `resume_time`, `complete_time`, `modified_date`, `amount`, `extra_charge`, `extra_material`, `payment_status`, `vendor_doc`, `appropriate_status`, `extra_charge_status`, `mark_complete`) VALUES
(5, '10000005', 55, 66, 0, '2021-04-20', '6:24AM', '12:24PM', 'Indore', '', '', '', '', 'booking for 16', 'b6eb8311cd614b7e8143b187aad3faf5.jpg', '', '', '2021-04-16 05:40:51', 'Upcoming', '', '', 'single move', 'Book for now', 9021, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(3, '10000003', 14, 38, 0, '2021-04-18', '6:24AM', '7:0PM', '', '', '', '', '', 'gyy', '', 'Hours', '', '2021-04-15 10:06:01', 'Pending', '', '', 'blue collar', 'Book for now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(4, '10000004', 14, 148, 0, '2021-04-30', '12:0AM', '12:0PM', '', '', '', '', '', 'hgjkk', 'c92a0686ccdecbdfb74c2c3942417836.jpg', 'Hours', '', '2021-04-16 05:08:58', 'Upcoming', '', '', 'blue collar', 'Book for now', 3454, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(6, '10000005', 1, 66, 3, '2021-01-12', '10:30', '5:30', 'mr 10 sukhilya', '', '', '', '', 'its urgent booking plz reply first', 'd9fddaf1e7abd43ee4977c0e4ba521ef.jpg', '', '', '2021-04-16 07:15:01', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(7, '10000006', 1, 66, 3, '2021-01-12', '10:30', '5:30', 'mr 10 sukhilya', '', '', '', '', 'its urgent booking plz reply first', 'dbfd1ca209600ecea3d0a27f4189deb5.jpg', '', '', '2021-04-16 07:15:27', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(8, '10000007', 1, 66, 3, '2021-01-12', '10:30', '5:30', 'mr 10 sukhilya', '', '', '', '', 'its urgent booking plz reply first', '3caed529d7bc2eaeee8a239ca5998378.jpg', '', '', '2021-04-16 07:17:18', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(9, '10000008', 1, 66, 3, '2021-01-12', '10:30', '5:30', 'mr 10 sukhilya', '', '', '', '', 'its urgent booking plz reply first', '7f31075f1ff2fc1e15a07d9750634c34.jpg', '', '', '2021-04-16 09:38:33', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(10, '10000009', 55, 66, 3, '2021-01-12', '10:30', '5:30', 'mr 10 sukhilya', '', '', '', '', 'its urgent booking plz reply first', '80a5fafa593513f916cbe6cc27c5c23b.jpg', '', '', '2021-04-16 09:43:13', 'Upcoming', '', '', 'single move', 'Book now', 6826, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(11, '10000010', 55, 66, 3, '2021-04-24', '9:25AM', '5:25PM', 'Bombay Hospital Square', '', '', '', '', 'tekit third cry uh ', 'e6f23c27ef47f5a0f1b5ce040293ea9f.jpg', '', '', '2021-04-16 10:40:20', 'Pending', '', '', 'single move', 'Book for now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(12, '10000011', 55, 66, 3, '2021-04-17', '6:24AM', '12:24PM', 'Bombay Hospital Square', '', '', '', '', 'ask ', '4640cbd653956b6fc3519fdcfdf3e943.jpg', '', '', '2021-04-16 10:41:07', 'Pending', '', '', 'single move', 'Book for now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(13, '10000012', 55, 66, 2, '2021-04-16', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '8dd2b0356620451946ed00807007348c.png,eef194cd8dd1721082f5c03f32934f27.gif', '', '', '2021-04-16 10:43:56', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(14, '10000013', 55, 66, 2, '2021-04-16', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '61b7127923438436d212541a7734cfc0.png,e3f9d3c891b3bdf78674c428d62640ef.gif', '', '', '2021-04-16 10:44:08', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(15, '10000014', 55, 66, 2, '2021-04-16', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '2dca225c75c42dcac254db6d8755931f.png,2958e2e2d4aa83a2ca888f8666afabec.gif', '', '', '2021-04-16 10:45:43', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(16, '10000015', 55, 66, 2, '2021-01-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '1cfe9db83f341cb26cb64d8e67a14b37.png,7a46fefba19ef7d37646a538d7278583.gif', '', '', '2021-04-16 10:47:39', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(17, '10000016', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '65dca2df13cacb66230956d4f7eb6d73.png,c596d5d93fd84e602821cb5a7024efb5.gif', '', '', '2021-04-16 10:47:54', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(18, '10000017', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '43a1045ffe0a09404a440a80091fe370.png,29a3f86139dcfda3dfd88ba8f9c9533e.gif', '', '', '2021-04-16 10:47:58', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(19, '10000018', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '86bc46bae83085f3673b2486927b5e24.png,fd8a55744f53d0d9a232d9626257f309.gif', '', '', '2021-04-16 10:48:00', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(20, '10000019', 55, 66, 3, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '6410a257322eee9e653ffff382ff520d.jpg', '', '', '2021-04-16 10:54:08', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(21, '10000020', 55, 66, 3, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '9c0fbc312aa267d7d89a8dea9511f16e.jpg', '', '', '2021-04-16 10:55:28', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(22, '10000021', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '904165f2ff4da01568b7281967998003.png,a72d6a4c1d19133f2447d42235735162.gif', '', '', '2021-04-16 10:56:45', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(23, '10000022', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '9fbf20334713ca3f51b059da4a8fcf00.png,a7a1abd83f8f1d37c7730ab91f15ec5f.gif', '', '', '2021-04-16 10:56:52', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(24, '10000023', 55, 66, 2, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', 'e65229a98fc298814344484e16e98403.png,edfef770eb6a79bcccf9b73a195cecd6.gif', '', '', '2021-04-16 10:57:11', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(25, '10000024', 55, 66, 3, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', 'ce084e50c4e8988700a98ab2abc53132.png,da9ea3b5a6b60a5c64d2794e567e8b2e.gif', '', '', '2021-04-16 10:57:50', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(26, '10000025', 55, 66, 3, '2021-02-01', '6:24AM', '12:24PM', 'BBBB', '', '', '', '', 'its urgent anishplz reply firstBBB', '5c82742e4dc43481a388433a7737033c.png,b656ea850bfd2f6976ffb1ab5cf5ed8c.gif', '', '', '2021-04-16 10:58:01', 'Pending', '', '', 'single move', 'Book now', 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(27, '10000026', 55, 66, 3, '2021-04-22', '6:24AM', '12:24PM', 'Bombay Hospital Square', '', '', '', '', 'sham', '7cdc83196363c919d31e908aee0baca7.jpg', '', '', '2021-04-16 12:26:51', 'Complete', '', '', 'single move', 'Book for now', 1385, 1, '17:58:00', '00:00:00', '00:00:00', '17:58:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(28, '10000027', 55, 66, 5, '2021-04-30', '2:6PM', '4:6PM', '', '', '', '', '', 'UCI ', '39341559ef4583fcd8b729b0ae8aadfa.jpg', '1123Hours', '', '2021-04-16 12:43:18', 'Complete', '', '', 'blue collar', 'Book for now', 3925, 1, '18:14:00', '00:00:00', '00:00:00', '18:15:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(29, '10000028', 55, 66, 3, '2021-04-28', '6:24AM', '12:24PM', 'Bombay Hospital Square', '', '', '', '', 'truthful ', '1cdc3b44c5c758e585f29a83638be94b.jpg', '', '', '2021-04-16 12:55:44', 'Complete', '', '', 'single move', 'Book for now', 9267, 1, '18:27:00', '00:00:00', '00:00:00', '18:29:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(30, '10000029', 55, 66, 3, '2021-04-16', '6:29', '12:29', 'Bombay Hospital Square', '', '', '', '', 'iuhyv', '73230d42e6269520398b26681f2c6211.jpg', '', '', '2021-04-16 13:06:30', 'Complete', '', '', 'single move', 'Book for now', 2771, 1, '18:37:00', '00:00:00', '00:00:00', '18:37:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(31, '10000030', 55, 66, 3, '2021-04-30', '9:25AM', '5:25PM', 'Bombay Hospital Square', '', '', '', '', 'truth though thug ', '883cae7639c838cb9eefad6efb4ba919.jpg', '', '', '2021-04-16 13:33:08', 'Complete', '', '', 'single move', 'Book for now', 8259, 1, '19:04:00', '00:00:00', '00:00:00', '19:04:00', '0000-00-00 00:00:00', 0.00, 0.00, '', 'Unpaid', '', 0, 0, 0),
(32, '10000031', 55, 66, 3, '2021-04-17', '9:25AM', '5:25PM', 'Bombay Hospital Square', '', '', '', '', 'ujjjuuki6789', '94bf682a9069f6606a64cd7a255d6c98.jpg', '', '', '2021-04-17 04:17:24', 'Complete', '', '', 'single move', 'Book for now', 7495, 1, '09:49:00', '00:00:00', '00:00:00', '09:52:00', '0000-00-00 00:00:00', 0.00, 1.00, 'extra charges', 'Unpaid', '', 0, 1, 0),
(33, '10000032', 55, 66, 3, '2021-04-17', '6:24AM', '12:24PM', 'Vijay Nagar, Indore, Madhya Pradesh, India', '', '', '', '', 'hi i am testing 17 april data', 'fddecff20db504480e63d3526756271f.jpeg', '', '', '2021-04-17 04:40:59', 'Complete', '', '', 'single move', 'Book for now', 7436, 1, '10:14:00', '00:00:00', '00:00:00', '10:17:00', '0000-00-00 00:00:00', 0.00, 1.00, 'extra charges', 'Unpaid', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `icon` varchar(550) NOT NULL,
  `bgcolor` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `bgcolor`, `status`) VALUES
(1, 'Blue collar', 'OBJECTS2.png', '#563d7c', 0),
(2, 'Single Move', 'Group_38023.png', '#563d7c', 0),
(3, 'Multi Move', 'OBJECTS3.png', '#563d7c', 0),
(4, 'Top Picks', 'Group_38160@3x_(1).png', '#563d7c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` varchar(550) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `sender_id`, `receiver_id`, `status`, `created_date`) VALUES
(1, 'HI', 5, 0, 0, '2020-09-19 06:29:20'),
(2, 'HI', 5, 0, 0, '2020-09-19 06:36:48'),
(3, 'HI', 8, 0, 0, '2020-09-19 06:46:24'),
(4, 'Hello', 3, 0, 0, '2020-09-19 06:59:51'),
(5, 'Hi how can help you ?', 0, 3, 0, '2020-09-19 12:24:54'),
(6, 'Hi how can help you ?', 0, 3, 0, '2020-09-19 12:25:17'),
(7, 'how can i help you ?', 0, 5, 0, '2020-09-19 12:25:35'),
(8, 'how can i help you ?', 0, 8, 0, '2020-09-19 12:25:46'),
(9, 'test\n', 0, 3, 0, '2020-09-19 12:50:25'),
(10, 'hello', 0, 0, 0, '2021-04-13 17:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` varchar(120) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `reason`, `message`, `type`, `created_at`) VALUES
(1, 2, 'serives', 'ghgfhjjhh hhg', '', '2021-01-20 11:37:35'),
(2, 22, 're', 'fgdf', 'user', '2021-02-19 12:55:09'),
(3, 29, 'Booking/ Job Posting', 'Fgjhfgh', 'vendor', '2021-02-20 19:23:07'),
(4, 29, 'Booking/ Job Posting', 'Hfggh', 'user', '2021-02-20 19:40:30'),
(5, 29, 'Booking/ Job Posting', 'Sdfbbbbb', 'vendor', '2021-03-05 19:59:03'),
(6, 29, 'Booking/ Job Posting', 'Testing', 'vendor', '2021-03-25 12:21:33'),
(7, 29, 'Fund Transfers', 'Tesdf', 'vendor', '2021-03-25 12:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` longtext NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `type`, `status`) VALUES
(2, 'Do I need a desinger', '<p><span style=\"color: rgb(126, 130, 153); font-family: Poppins, Helvetica, sans-serif;\"><b>Anim pariatur </b>cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span><br></p>', 'user', 0),
(3, 'How do I get commissions?', '<p><tspan x=\"0\" y=\"0\" style=\"color: rgb(0, 0, 0); font-family: Quicksand-Regular, Quicksand; font-size: 12px;\"><span style=\"font-family: Arial;\">You can refer anyone whether Service Provider or anyone</span></tspan><tspan x=\"0\" y=\"15\" style=\"color: rgb(0, 0, 0); font-family: Quicksand-Regular, Quicksand; font-size: 12px;\"><span style=\"font-family: Arial;\">&nbsp;and can earn commissions as they use the app.</span></tspan><br></p>', 'user', 0),
(4, 'How does work  test?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'vendor', 0),
(5, 'Do I need a desinger', '<p><span style=\"color: rgb(126, 130, 153); font-family: Poppins, Helvetica, sans-serif;\"><b>Anim pariatur </b>cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span><br></p>', 'vendor', 0),
(6, 'How do I get commissions?', '<p><tspan x=\"0\" y=\"0\" style=\"color: rgb(0, 0, 0); font-family: Quicksand-Regular, Quicksand; font-size: 12px;\"><span style=\"font-family: Arial;\">You can refer anyone whether Service Provider or anyone</span></tspan><tspan x=\"0\" y=\"15\" style=\"color: rgb(0, 0, 0); font-family: Quicksand-Regular, Quicksand; font-size: 12px;\"><span style=\"font-family: Arial;\">&nbsp;and can earn commissions as they use the app.</span></tspan><br></p>', 'vendor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desecration` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `desecration`, `amount`, `start_date`, `end_date`, `status`) VALUES
(1, 5, 'Need Technician', 'job description', '20000', '2020-11-16', '2020-11-30', 1),
(2, 2, 'technical', 'technical software', '12000', '2020-11-11', '2020-11-18', 1),
(3, 7, 'Need Technician', 'job description', '20000', '2020-11-19', '2020-11-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_requires`
--

CREATE TABLE `job_requires` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bid_per` varchar(50) NOT NULL,
  `bid_min_range` int(11) NOT NULL,
  `bid_max_range` int(11) NOT NULL,
  `estimate_time` varchar(50) NOT NULL,
  `key_skills` int(11) NOT NULL COMMENT 'services',
  `language` varchar(50) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `apply_type` varchar(50) NOT NULL,
  `accept_bid_for` varchar(50) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cancel_by` varchar(50) NOT NULL,
  `status` enum('Pending','Confirm','Cancel','Complete') NOT NULL,
  `job_cat_type` enum('single_move','multi_move','blue_collar','') NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `to_location` varchar(255) DEFAULT NULL,
  `end_location` varchar(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `vehical_type` varchar(50) DEFAULT NULL,
  `bid_status` int(11) NOT NULL COMMENT '0=not_bid,1=bid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_requires`
--

INSERT INTO `job_requires` (`id`, `job_id`, `user_id`, `date`, `time`, `location`, `description`, `bid_per`, `bid_min_range`, `bid_max_range`, `estimate_time`, `key_skills`, `language`, `job_type`, `apply_type`, `accept_bid_for`, `attachment`, `type`, `vendor_id`, `cancel_by`, `status`, `job_cat_type`, `date_time`, `to_location`, `end_location`, `weight`, `vehical_type`, `bid_status`) VALUES
(40, '200038', 66, '2021-03-31', '04:38:00', 'Vijay Nagar, Indore, Madhya Pradesh, India', 'test', 'Hour', 1728, 6074, '2', 2, 'English', '', '', '3 Day', '52dcc28b15ccfa30282eeaf154403e74.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-31 04:11:56', '[{\"ToLocation\":\"second\"}]', 'test end location', 'medium', 'Car', 0),
(28, '200026', 14, '2022-03-03', '10:50:00', 'Amritsar, Punjab, India', 'nxnx jdjxj', 'Hour', 50, 83, '1', 4, 'Telugu', 'Free', 'yes', '7 Days', '44d1238ca82e8d8044d9688921297eac.jpg,41d03e2678c0dbd58b3d21c94df8a8b9.jpeg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-30 05:25:15', NULL, NULL, NULL, NULL, 0),
(29, '200027', 55, '2021-03-31', '07:41:00', 'Ghaziabad Railway Station, Railway Station Road, Sarai Nazar Ali, Madhopura, Ghaziabad, Uttar Pradesh, India', 'hdj  ddd', 'Day', 57, 81, '6', 1, 'English', '', '', '', 'c63ec9179e716c1de54a959c9436299b.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-30 07:12:46', '[]', 'Yusuf hdj', 'light', 'Motor', 0),
(30, '200028', 55, '2021-03-31', '08:48:00', 'Vijayawada, Andhra Pradesh, India', 'hdhdh    xhhs  d s jejwjjwj ahdhdhd hwhwwhhwhw hdhdhhdhd hdhhdhhdhueud hxhdhx', 'Day', 1, 10000, '', 2, 'English', 'Free', 'yes', '3 Days', '510f0b952db9849a2fb539069a2553ca.jpg,6833d820b255d9b1279fd902491c2629.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-30 07:19:12', NULL, NULL, NULL, NULL, 1),
(31, '200029', 29, '2021-03-31', '05:23:00', 'Vijayawada, Andhra Pradesh, India', 'bshhs', 'Day', 50, 74, '', 1, 'English', 'Free', 'yes', '3 Days', '8dab48c265fc65dcf17b7c891d6c4042.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-30 07:54:51', NULL, NULL, NULL, NULL, 0),
(32, '200030', 29, '2021-03-30', '20:18:00', 'Indianapolis, IN, USA', 'Test', '5.703703703703703 - 29.712542892596044', 6, 30, '40', 0, 'Hindi', '', '', '', 'd9bfbbcf4c81d1b03f5da60857a38e08.jpeg,a7b55103cc2f7d6dcc220f98c1832761.jpeg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-30 07:56:45', '[\"G\\/F Five Ecom Center, Pacific Drive, Mall of Asia Complex, Pasay City, 1308 Metro Manila, Philippines\",\"113 Elizabeth Rd, Midridge Park, Midrand, 1685, South Africa\"]', 'Akk 37 Tambo Section Gauteng, Libanon Gold Mine, Westonaria, 1779, South Africa', 'medium', 'car', 0),
(33, '200031', 55, '2021-03-31', '10:29:00', 'Vijayawada, Andhra Pradesh, India', 'vbsn bddj', 'Day', 52, 77, '1', 1, 'Hindi', 'Free', 'yes', '3 Days', '3352be6dd9e98c5b7d8e14d2231e7902.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-30 08:00:30', NULL, NULL, NULL, NULL, 0),
(34, '200032', 66, '2021-03-31', '10:41:00', 'Vijayanagar, Bengaluru, Karnataka, India', 'gahajmaa', 'Hour', 50, 70, '', 2, 'English', 'Free', 'yes', '1 Day', '4a03c6ab0d72bc4c30b3748a6c0f87bd.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-30 22:11:59', NULL, NULL, NULL, NULL, 0),
(35, '200033', 14, '2021-03-31', '12:39:00', 'Bombay Hospital Square', 'the description for\nmultiple lines\ncheck', 'Hour', 1753, 5926, '3', 3, 'English', '', '', '', 'c14a96ca778b016066b8c2d264c9b99a.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-30 23:19:32', '[{\"ToLocation\":\"test\"}]', 'end location', 'light', 'Car', 0),
(36, '200034', 14, '2021-04-15', '12:00:00', 'Bombay Hospital Square', 'more than 1 image add', 'Hour', 0, 3975, '2', 3, 'English', '', '', '', 'c9f30727bdf4677d8f63e3ac20071aaa.jpg,e1e73574fcd34ac019791500220547e3.jpg,62d1908ec637c110d3afa90e965ce15a.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-30 23:38:48', '[{\"ToLocation\":\"to locationn add\"}]', 'eend ocation', 'light', 'Motor', 0),
(37, '200035', 14, '2021-03-31', '02:00:00', 'Bombay Hospital Square', 'hhjyyjujujk thgjjggh', 'Day', 0, 10000, '2', 2, 'English', '', '', '', 'd75e9c49d88c2802bf88edd4189702d4.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-03-31 00:20:58', '[{\"ToLocation\":\"mid\"}]', 'last', 'light', 'Car', 0),
(38, '200036', 55, '2021-04-01', '07:03:00', 'Vijayawada, Andhra Pradesh, India', 'single move work any one can do please contact for more details . thanka', 'Hour', 1, 638, '8', 2, 'Hindi', 'Free', 'yes', '7 Days', '47e0a9d33a56ec37cea9f83464005553.jpg,488d72c958d4a364b4af4ad7ff405b6a.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-31 03:35:15', NULL, NULL, NULL, NULL, 1),
(39, '200037', 55, '2021-04-01', '05:10:00', 'Vijayawada, Andhra Pradesh, India', 'Hi I want to hire ac repairing  for single move for more details please contact . thanks', 'Hour', 1, 259, '', 2, 'Hindi', 'Free', 'yes', '7 Days', '445baba4b76a9ec034664699b7203002.jpg,59f8420ec066bc645f5d658f28104d6e.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-31 03:41:53', NULL, NULL, NULL, NULL, 1),
(41, '200038', 29, '2021-04-01', '12:23:00', 'Vijay Nagar, Indore, Madhya Pradesh, India', 'hdbxjivdhdbh ddbbdh dhdh dhdhsj vsv dhd dhdhdb dhdsbdb dvsjhd vs sbs sd\n', 'Hour', 1766, 8052, '2', 3, 'Hindi', 'Free', 'yes', '3 Days', '24c62e7dd9aeac75c27d84bd8b8ff13e.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-31 21:55:21', NULL, NULL, NULL, NULL, 0),
(42, '200039', 29, '2021-04-01', '01:00:00', 'Vijay Nagar, Indore, Madhya Pradesh, India', 'hi hdblueh dhsjhd jsbbxje jssbd bsbsbx hdd jds subhash', 'Hour', 3171, 8311, '2', 3, 'Hindi', 'Free', 'yes', '3 Days', '2ecf64343afb8902bba7b431bb15babf.jpg,6915ec1e4f3c4c9a365da8f9d094df82.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-03-31 22:33:30', NULL, NULL, NULL, NULL, 0),
(43, '200040', 55, '2021-04-01', '02:36:00', 'Bombay Hospital Square', 'hhjjj', 'Hour', 1285, 5482, '50', 2, 'English', 'Free', 'yes', '1 Day', '4e80bd64eee906658ab2224306c03e37.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-01 02:09:34', NULL, NULL, NULL, NULL, 1),
(44, '200041', 29, '2021-04-01', '16:04:00', 'Indore, Madhya Pradesh, India', 'Test', 'Hour', 11, 33, '4 Day', 0, 'HIndi', 'Free', '', '1 Day', '', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-01 03:36:38', NULL, NULL, NULL, NULL, 0),
(45, '200042', 29, '2021-04-01', '17:07:00', 'Indore, Madhya Pradesh, India', 'Test', 'Hour', 26, 80, '6 Day', 0, 'English', 'Free', '', '3 Day', 'FB2AA476-8BA3-4420-BB7C-BDB491268C24.jpeg,DF77B096-DD07-4354-B481-117506723C55.png', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-01 03:39:08', NULL, NULL, NULL, NULL, 0),
(46, '200043', 29, '2021-04-01', '18:28:00', 'Chhoti Gwaltoli, Indore, Madhya Pradesh 452007, India', 'Adsf sdfs afsdfasfas asdfs adsfa adf asdf as', 'Hour', 6, 36, '4 Day', 0, 'English', 'Free', '', '3 Day', '4FB9E355-0559-4F28-9B6F-090688E04BD1.png,189FA19B-D835-4593-B129-A8AD2298CA1B.png', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-01 03:59:39', NULL, NULL, NULL, NULL, 0),
(47, '200044', 29, '2021-04-01', '16:46:00', 'Indore, Madhya Pradesh, India', 'Adsfas as asdfads adds asf sdfsdf as ads asdf ds sdf. Sdf', 'Hour', 17, 49, '5 Day', 0, 'English', 'Free', '', '3 Day', '9869842ce844564819a3696e9134ebe6.jpeg,d6ba969394b72c7931ac73d6f3837626.jpeg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-01 04:17:19', NULL, NULL, NULL, NULL, 1),
(48, '200045', 66, '2021-04-04', '05:52:00', 'Agra, Uttar Pradesh, India', 'pic my coriour in Vijay Nagar indore', 'Day', 0, 1638, '2', 2, 'English', '', '', '3 Day', '0ed26d402dc4208f59c6a42694135778.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-04-03 03:23:42', '[{\"ToLocation\":\"Malviya nagar\"}]', 'vijay nagar', 'medium', 'Motor', 0),
(49, '200046', 55, '2021-04-26', '09:37:00', 'Vijayawada, Andhra Pradesh, India', 'gg bkk hhhj hccxkmnb UGC ', 'Day', 0, 3017, '2', 2, 'English', '', '', '1 Day', '367603015974109078d4a060d9c2eb2c.jpg', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-04-03 08:07:58', '[{\"ToLocation\":\"ghh hjj bhh hhh\"}]', 'h  hjjj off hhjj', 'medium', 'Motor', 0),
(55, '200047', 14, '2021-03-05', '10:45:00', 'jsdsad', '115', '2', 500, 800, '4', 2, 'English', '', '', '2', '', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-04-05 03:34:12', 'gf', 'gffg', '2', 'car', 0),
(56, '200048', 14, '2021-03-05', '10:45:00', 'jsdsad', '115', '2', 500, 800, '4', 2, 'English', '', '', '2', '', 'multi move job', 0, '', 'Pending', 'multi_move', '2021-04-05 03:37:47', 'gf', 'gffg', '2', 'car', 1),
(57, '200049', 29, '2021-04-05', '05:56:00', 'Vijay Nagar, Indore, Madhya Pradesh, India', 'hi i am user my new booking is', 'Hour', 3097, 8607, '2', 3, 'Hindi', 'Free', 'yes', '1 Day', 'fe528abbadce5d199834457512c1f0c1.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-05 05:27:20', NULL, NULL, NULL, NULL, 0),
(58, '200050', 29, '2021-04-06', '21:17:00', '', 'Tests adsf ds sdfsd d ads adds df a. Adsfa buttery are fasfasdfa dva', '38.481484307183145 - 77.44443596733946', 38, 77, '4 Day', 3, 'Hindi', '', '', '', '4f43a36541075b6380ddcde2d617a99c.jpeg', 'everywhere', 0, '', 'Pending', '', '2021-04-06 07:49:09', '', '', NULL, 'car', 0),
(59, '200051', 29, '2021-04-07', '21:21:00', '', 'Asdf sdfs sdf vadsfgdfgadsgerybsc z cxbvcxzvz adsfavcvasv', '29.962968614366314 - 63.925920274522596', 30, 64, '4 Day', 4, 'Hindi', '', '', '', '3be210ad9a0ec007c0297bace4aa7ac1.jpeg', 'everywhere', 0, '', 'Pending', '', '2021-04-06 07:53:08', '', '', NULL, 'car', 0),
(60, '200052', 29, '2021-04-09', '09:53:00', '', 'Fsdfsaf', '174.05008468627932 - 514.8999717712403', 174, 515, '3 Day', 3, 'Hindi', '', 'yes', '', '81cf50dc8206208b4f4340b9e4dfbea6.jpeg,60f8c82ab9953ca401670fcca093bfd5.jpeg,316a658c338bca4a97b30704c83fea8e.jpeg', 'everywhere', 0, '', 'Pending', '', '2021-04-08 21:29:13', '', '', NULL, 'car', 0),
(61, '200053', 66, '2021-04-17', '03:59:00', 'PVR Anupam Saket, Community Center, Ashok Vihar, Saket, New Delhi, Delhi, India', 'repair \n', 'Hour', 1, 10000, '2', 5, 'Telugu', 'Free', 'yes', '1 Day', '6492b76e8fa79ad8570750434adc4f8d.jpg', 'Job requirement', 0, '', 'Pending', 'single_move', '2021-04-15 01:31:47', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `bookingId` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_type` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `type_job` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `bookingId`, `sender_id`, `receiver_id`, `receiver_type`, `subject`, `message`, `type`, `type_job`, `created_date`) VALUES
(1, '1', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-15 05:59:00'),
(2, '1', 66, 55, 'user', '', '', '', '', '2021-04-15 05:59:13'),
(3, '2', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-15 07:23:32'),
(4, '2', 66, 55, 'user', '', '', '', '', '2021-04-15 07:23:40'),
(5, '2', 66, 55, 'user', '', '', '', '', '2021-04-15 07:27:47'),
(6, '2', 66, 55, 'user', '', '', '', '', '2021-04-15 07:27:47'),
(7, '61', 66, 14, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(8, '61', 66, 19, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(9, '61', 66, 22, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(10, '61', 66, 27, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(11, '61', 66, 29, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(12, '61', 66, 36, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:47'),
(13, '61', 66, 38, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(14, '61', 66, 46, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(15, '61', 66, 49, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(16, '61', 66, 50, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(17, '61', 66, 53, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(18, '61', 66, 55, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(19, '61', 66, 58, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(20, '61', 66, 59, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(21, '61', 66, 60, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(22, '61', 66, 61, 'vendor', '', 'You have new job request', 'job', '', '2021-04-15 08:31:48'),
(23, '3', 14, 38, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-15 10:06:01'),
(24, '4', 14, 148, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 05:08:58'),
(25, '4', 148, 14, 'user', '', '', '', '', '2021-04-16 05:09:18'),
(26, '5', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 05:40:51'),
(27, '5', 66, 55, 'user', '', '', '', '', '2021-04-16 05:41:00'),
(28, '8', 1, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 07:17:18'),
(29, '9', 1, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 09:38:33'),
(30, '10', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 09:43:13'),
(31, '10', 66, 55, 'user', '', '', '', '', '2021-04-16 09:44:53'),
(32, '11', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:40:20'),
(33, '12', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:41:07'),
(34, '13', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:43:57'),
(35, '14', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:44:08'),
(36, '15', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:45:43'),
(37, '16', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:47:39'),
(38, '17', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:47:54'),
(39, '18', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:47:58'),
(40, '19', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:48:00'),
(41, '21', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:55:28'),
(42, '22', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:56:45'),
(43, '23', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:56:52'),
(44, '24', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:57:11'),
(45, '25', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:57:50'),
(46, '26', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 10:58:01'),
(47, '27', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 12:26:51'),
(48, '27', 66, 55, 'user', '', '', '', '', '2021-04-16 12:27:00'),
(49, '27', 66, 55, 'user', '', '', '', '', '2021-04-16 12:28:18'),
(50, '27', 66, 55, 'user', '', '', '', '', '2021-04-16 12:28:19'),
(51, '28', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 12:43:18'),
(52, '28', 66, 55, 'user', '', '', '', '', '2021-04-16 12:43:23'),
(53, '28', 66, 55, 'user', '', '', '', '', '2021-04-16 12:44:55'),
(54, '28', 66, 55, 'user', '', '', '', '', '2021-04-16 12:44:56'),
(55, '29', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 12:55:44'),
(56, '29', 66, 55, 'user', '', '', '', '', '2021-04-16 12:55:53'),
(57, '29', 66, 55, 'user', '', '', '', '', '2021-04-16 12:57:08'),
(58, '29', 66, 55, 'user', '', '', '', '', '2021-04-16 12:57:09'),
(59, '30', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 13:06:30'),
(60, '30', 66, 55, 'user', '', '', '', '', '2021-04-16 13:06:34'),
(61, '30', 66, 55, 'user', '', '', '', '', '2021-04-16 13:07:36'),
(62, '30', 66, 55, 'user', '', '', '', '', '2021-04-16 13:07:37'),
(63, '31', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-16 13:33:09'),
(64, '31', 66, 55, 'user', '', '', '', '', '2021-04-16 13:33:14'),
(65, '31', 66, 55, 'user', '', '', '', '', '2021-04-16 13:34:19'),
(66, '31', 66, 55, 'user', '', '', '', '', '2021-04-16 13:34:19'),
(67, '32', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-17 04:17:25'),
(68, '32', 66, 55, 'user', '', '', '', '', '2021-04-17 04:17:31'),
(69, '32', 66, 55, 'user', '', '', '', '', '2021-04-17 04:19:12'),
(70, '32', 66, 55, 'user', '', '', '', '', '2021-04-17 04:19:12'),
(71, '33', 55, 66, 'vendor', '', 'You have new booking request', '', 'booking', '2021-04-17 04:40:59'),
(72, '33', 66, 55, 'user', '', '', '', '', '2021-04-17 04:41:13'),
(73, '33', 66, 55, 'user', '', '', '', '', '2021-04-17 04:44:43'),
(74, '33', 66, 55, 'user', '', '', '', '', '2021-04-17 04:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL COMMENT 'percentage amount',
  `percentage` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `banner` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `code`, `type`, `percentage`, `amount`, `status`, `start_date`, `end_date`, `banner`, `created_date`) VALUES
(1, 'test', 'test', 'percentage', 19, 0, 1, '2021-03-25', '2021-06-17', 'special-offer-vibrant-banner-background_105164-5581.jpg', '2021-03-26 10:55:05'),
(3, 'test one', 'sdser', 'Amount', 11, 0, 1, '2021-03-26', '2021-04-30', 'big-sale-limited-time-special-offer-off-just-now-word-red-background-illustration-d-rendering-big-sale-limited-time-1691552761.jpg', '2021-03-26 08:59:23'),
(4, 'loffer', 'LSG545S', 'percentage', 10, 0, 1, '2021-03-26', '2021-05-20', 'big-sale-limited-time-special-offer-off-just-now-word-red-background-illustration-d-rendering-big-sale-limited-time-169155276.jpg', '2021-03-27 06:08:45'),
(5, 'xyx testings', 'LSG54554S', 'percentage', 2, 0, 1, '2021-03-25', '2021-04-24', 'special-offer-vibrant-banner-background_105164-558.jpg', '2021-03-26 06:55:42'),
(6, 'xyx testings', 'LSG5455498', 'percentage', 2, 0, 1, '2021-02-24', '2021-02-28', 'special-offer-vibrant-banner-background_105164-558.jpg', '2021-02-22 06:55:42'),
(7, 'xyx testings', 'LSG54554', 'percentage', 2, 0, 1, '2021-02-24', '2021-02-28', 'special-offer-vibrant-banner-background_105164-558.jpg', '2021-02-22 06:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `terms` longtext NOT NULL,
  `type` varchar(50) NOT NULL,
  `modefied_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `content`, `terms`, `type`, `modefied_date`) VALUES
(1, '<g id=\"Scroll_Group_1\" data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text id=\"Lorem_ipsum_dolor_sit_amet_consetetur_sadipscing_elitr_sed_diam_nonumy_eirmod_tempor_invidunt_ut_labore_et_dolore_magna_aliquyam_erat_sed_diam_voluptua._At_vero_eos_et_accusam_et_justo_duo_dolores_et_ea_rebum._Stet_clita_kasd_gubergren_no_sea_takimata_\" data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\"><tspan x=\"0\" y=\"252\">&nbsp;</tspan><tspan x=\"0\" y=\"267\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</tspan><tspan x=\"0\" y=\"282\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</tspan><tspan x=\"0\" y=\"297\">erat, sed diam voluptua. At vero eos et accusam et justo&nbsp;</tspan><tspan x=\"0\" y=\"312\">duo dolores et ea rebum. Stet clita kasd gubergren, no&nbsp;</tspan><tspan x=\"0\" y=\"327\">sea takimata sanctus est Lorem ipsum dolor sit amet.</tspan><tspan x=\"0\" y=\"342\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,</tspan></text></g><g id=\"Group_38418\" data-name=\"Group 38418\" transform=\"translate(78 -128)\"><rect id=\"Rectangle_613-2\" data-name=\"Rectangle 613\" width=\"11\" height=\"12\" rx=\"5.5\" transform=\"translate(40 749)\" fill=\"#fe3e30\" style=\"color: rgb(0, 0, 0); font-family: \" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" medium;\"=\"\"></rect></g><br><div><g data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\"><tspan x=\"0\" y=\"342\"><br></tspan></text></g></div>', '<h6><tspan x=\"0\" y=\"12\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">vendor dummy Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</span></tspan><tspan x=\"0\" y=\"27\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</span></tspan><tspan x=\"0\" y=\"42\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</span></tspan><tspan x=\"0\" y=\"57\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</span></tspan><tspan x=\"0\" y=\"72\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</span></tspan><tspan x=\"0\" y=\"87\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,&nbsp;</span></tspan><tspan x=\"0\" y=\"102\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</span></tspan><tspan x=\"0\" y=\"117\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</span></tspan><tspan x=\"0\" y=\"132\" style=\"font-family: Poppins, Helvetica, sans-serif;\"><span times=\"\" new=\"\" roman\";\"=\"\" style=\"font-family: Arial;\">erat, sed diam voluptua.</span></tspan><br></h6>', 'user', '2020-09-18 08:27:11'),
(2, '<g id=\"Scroll_Group_1\" data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text id=\"Lorem_ipsum_dolor_sit_amet_consetetur_sadipscing_elitr_sed_diam_nonumy_eirmod_tempor_invidunt_ut_labore_et_dolore_magna_aliquyam_erat_sed_diam_voluptua._At_vero_eos_et_accusam_et_justo_duo_dolores_et_ea_rebum._Stet_clita_kasd_gubergren_no_sea_takimata_\" data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\"><tspan x=\"0\" y=\"12\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</tspan><tspan x=\"0\" y=\"27\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</tspan><tspan x=\"0\" y=\"42\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</tspan><tspan x=\"0\" y=\"57\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</tspan><tspan x=\"0\" y=\"72\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</tspan><tspan x=\"0\" y=\"87\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,&nbsp;</tspan><tspan x=\"0\" y=\"102\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</tspan><tspan x=\"0\" y=\"117\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</tspan><tspan x=\"0\" y=\"132\">erat, sed diam voluptua. At vero eos et accusam et justo&nbsp;</tspan><tspan x=\"0\" y=\"147\">duo dolores et ea rebum. Stet clita kasd gubergren, no&nbsp;</tspan><tspan x=\"0\" y=\"162\">sea takimata sanctus est Lorem ipsum dolor sit amet.</tspan><tspan x=\"0\" y=\"177\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</tspan><tspan x=\"0\" y=\"192\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</tspan><tspan x=\"0\" y=\"207\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</tspan><tspan x=\"0\" y=\"222\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</tspan><tspan x=\"0\" y=\"237\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</tspan><tspan x=\"0\" y=\"252\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,&nbsp;</tspan><tspan x=\"0\" y=\"267\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</tspan><tspan x=\"0\" y=\"282\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</tspan><tspan x=\"0\" y=\"297\">erat, sed diam voluptua. At vero eos et accusam et justo&nbsp;</tspan><tspan x=\"0\" y=\"312\">duo dolores et ea rebum. Stet clita kasd gubergren, no&nbsp;</tspan><tspan x=\"0\" y=\"327\">sea takimata sanctus est Lorem ipsum dolor sit amet.</tspan><tspan x=\"0\" y=\"342\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,</tspan></text></g><g id=\"Group_38418\" data-name=\"Group 38418\" transform=\"translate(78 -128)\"><rect id=\"Rectangle_613-2\" data-name=\"Rectangle 613\" width=\"11\" height=\"12\" rx=\"5.5\" transform=\"translate(40 749)\" fill=\"#fe3e30\" style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;\"></rect></g><br><div><g data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\"><tspan x=\"0\" y=\"342\"><br></tspan></text></g></div>', '<h6><g id=\"Scroll_Group_1\" data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text id=\"Lorem_ipsum_dolor_sit_amet_consetetur_sadipscing_elitr_sed_diam_nonumy_eirmod_tempor_invidunt_ut_labore_et_dolore_magna_aliquyam_erat_sed_diam_voluptua._At_vero_eos_et_accusam_et_justo_duo_dolores_et_ea_rebum._Stet_clita_kasd_gubergren_no_sea_takimata_\" data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\" style=\"background-color: rgb(255, 255, 255);\"><tspan x=\"0\" y=\"12\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</span></tspan><tspan x=\"0\" y=\"27\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</span></tspan><tspan x=\"0\" y=\"42\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</span></tspan><tspan x=\"0\" y=\"57\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</span></tspan><tspan x=\"0\" y=\"72\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</span></tspan><tspan x=\"0\" y=\"87\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,&nbsp;</span></tspan><tspan x=\"0\" y=\"102\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</span></tspan><tspan x=\"0\" y=\"117\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</span></tspan><tspan x=\"0\" y=\"132\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">erat, sed diam voluptua. At vero eos et accusam et justo&nbsp;</span></tspan><tspan x=\"0\" y=\"147\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">duo dolores et ea rebum. Stet clita kasd gubergren, no&nbsp;</span></tspan><tspan x=\"0\" y=\"162\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">sea takimata sanctus est Lorem ipsum dolor sit amet.</span></tspan><tspan x=\"0\" y=\"177\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</span></tspan><tspan x=\"0\" y=\"192\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</span></tspan><tspan x=\"0\" y=\"207\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</span></tspan><tspan x=\"0\" y=\"222\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</span></tspan><tspan x=\"0\" y=\"237\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</span></tspan><tspan x=\"0\" y=\"252\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,&nbsp;</span></tspan><tspan x=\"0\" y=\"267\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">consetetur sadipscing elitr, sed diam nonumy eirmod&nbsp;</span></tspan><tspan x=\"0\" y=\"282\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">tempor invidunt ut labore et dolore magna aliquyam&nbsp;</span></tspan><tspan x=\"0\" y=\"297\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">erat, sed diam voluptua. At vero eos et accusam et justo&nbsp;</span></tspan><tspan x=\"0\" y=\"312\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">duo dolores et ea rebum. Stet clita kasd gubergren, no&nbsp;</span></tspan><tspan x=\"0\" y=\"327\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">sea takimata sanctus est Lorem ipsum dolor sit amet.</span></tspan><tspan x=\"0\" y=\"342\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;</span></tspan><tspan x=\"0\" y=\"357\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">sed diam nonumy eirmod tempor invidunt ut labore et&nbsp;</span></tspan><tspan x=\"0\" y=\"372\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">dolore magna aliquyam erat, sed diam voluptua. At vero&nbsp;</span></tspan><tspan x=\"0\" y=\"387\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">eos et accusam et justo duo dolores et ea rebum. Stet&nbsp;</span></tspan><tspan x=\"0\" y=\"402\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">clita kasd gubergren, no sea takimata sanctus est Lorem&nbsp;</span></tspan><tspan x=\"0\" y=\"417\" style=\"\"><span style=\"font-family: Arial;\" times=\"\" new=\"\" roman\";\"=\"\">ipsum dolor sit amet. Lorem ipsum dolor sit amet,</span></tspan></text></g></h6><h6><g data-name=\"Scroll Group 1\" transform=\"translate(32 150)\" clip-path=\"url(#clip-path)\" style=\"isolation: isolate\"><text data-name=\"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata \" transform=\"translate(0 19)\" font-size=\"12\" font-family=\"Quicksand-Regular, Quicksand\"><tspan x=\"0\" y=\"417\"><br></tspan></text></g></h6>', 'vendor', '2020-09-18 08:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`) VALUES
(1, 'B.Tech'),
(2, 'M.Tech'),
(3, 'B.Pharma'),
(4, 'M.Pharma');

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `Professionalism_rating` decimal(10,0) NOT NULL,
  `Behaviour_rating` decimal(10,0) NOT NULL,
  `Satisfaction_rating` decimal(10,0) NOT NULL,
  `Skills_rating` decimal(10,0) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`id`, `user_id`, `vendor_id`, `service_id`, `rating`, `Professionalism_rating`, `Behaviour_rating`, `Satisfaction_rating`, `Skills_rating`, `message`, `date`, `time`) VALUES
(1, 2, 14, 1, '3', 5, 4, 4, 3, 'this is a perfect job', '2020-11-18', '12:24:06'),
(2, 1, 29, 1, '1', 0, 0, 0, 0, 'this is a perfect job', '2020-11-18', '12:48:15'),
(3, 1, 22, 2, '3', 4, 4, 3, 4, 'this is a perfect job', '2020-11-18', '12:49:00'),
(6, 1, 14, 2, '2.8', 2, 3, 2, 4, 'good', '2021-03-06', '10:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reportuser_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `reportuser_id`, `date`, `reason`) VALUES
(1, 2, 6, '2020-11-17 13:48:21', 'this is not perfect job'),
(2, 2, 5, '2020-11-18 13:47:10', 'this is not');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `earning` varchar(255) NOT NULL,
  `wages` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(250) NOT NULL DEFAULT 'blank.png',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `name`, `status`, `icon`, `created_date`) VALUES
(2, 2, 'Ac conditioner Repair', 0, 'digital5.jpg', '2021-05-12 04:28:49'),
(4, 2, 'Cycle repair', 0, '4-40433_transparent-bicycle-png-person-with-bike-png-png.png', '2021-02-25 08:32:23'),
(5, 2, 'Washing Machine Repair', 0, 'washing-machine-repair-service-surat.jpg', '2021-05-12 04:29:01'),
(6, 2, 'moter testing', 0, 'piston-pump_orig.jpg', '2021-03-06 14:16:37'),
(7, 1, 'App Development', 0, 'blank.png', '2021-05-12 04:29:53'),
(8, 3, 'Courier', 0, 'blank.png', '2021-05-12 04:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategory`
--

CREATE TABLE `sub_subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `bgcolor` varchar(255) NOT NULL,
  `status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_subcategory`
--

INSERT INTO `sub_subcategory` (`id`, `cat_id`, `subcat_id`, `name`, `icon`, `bgcolor`, `status`) VALUES
(1, 13, 6, 'test', '43610192bNgp60.jpg', '', '2021-01-07 11:42:28'),
(2, 9, 9, 'Air condition prepare', 'product-500x5001.jpeg', '', '2021-01-07 11:41:55'),
(3, 3, 2, 'dsad', 'admin-min-min.jpg', '', '2021-02-10 12:49:35'),
(4, 2, 6, 'single cat', 'download_(2).jpg', '', '2021-02-16 06:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion`
--

CREATE TABLE `tbl_discussion` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_msg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vendor_msg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `files` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion`
--

INSERT INTO `tbl_discussion` (`id`, `job_id`, `user_id`, `vendor_id`, `user_msg`, `vendor_msg`, `files`, `date_time`) VALUES
(10, 5, 14, 22, '', 'hii actually m bg ryt now', '', '2021-03-10 02:03:00'),
(8, 5, 14, 22, 'hello reply fast', '', '', '2021-03-10 02:00:00'),
(7, 5, 14, 22, 'hwz u', '', '', '2021-03-10 02:00:00'),
(11, 5, 14, 29, '', 'see', 'unnamed.jpg', '2021-03-10 02:12:00'),
(51, 5, 29, 10, 'okk', '', '1615631494_50589.jpeg', '2021-03-13 04:01:00'),
(50, 5, 29, 10, 'Hello', '', '', '2021-03-13 04:00:00'),
(48, 5, 29, 10, 'Hi', '', '', '2021-03-12 07:08:00'),
(49, 5, 29, 10, 'okk', '', '1615556322_665104.jpeg', '2021-03-12 07:08:00'),
(109, 17, 29, 22, 'hi', '', '', '2021-03-19 12:07:00'),
(108, 17, 10, 22, 'hi', '', '', '2021-03-19 11:27:00'),
(24, 0, 29, 11, 'Hi', '', '', '2021-03-12 04:56:00'),
(52, 5, 22, 14, '', 'hello Sir', '', '2021-03-13 04:55:00'),
(53, 5, 29, 11, '', 'Hi', '', '2021-03-15 11:16:00'),
(54, 5, 29, 11, '', 'hi', '', '2021-03-15 11:17:00'),
(55, 5, 29, 11, '', 'Hi', '', '2021-03-15 11:18:00'),
(56, 5, 29, 11, '', 'Hi', '', '2021-03-15 11:20:00'),
(57, 5, 29, 11, '', 'Hello', '', '2021-03-15 11:22:00'),
(58, 5, 29, 11, '', 'okk', '1615787738_297595.jpeg', '2021-03-15 11:25:00'),
(59, 4, 29, 11, '', 'Hi', '', '2021-03-15 12:23:00'),
(60, 4, 29, 11, '', 'Hello', '', '2021-03-15 12:23:00'),
(61, 11, 29, 10, 'Hi', '', '', '2021-03-15 12:27:00'),
(62, 11, 29, 11, ' Ok', '', '', '2021-03-15 12:29:00'),
(63, 4, 29, 11, '', 'Ok', '', '2021-03-15 12:29:00'),
(64, 7, 29, 11, 'Hi', '', '', '2021-03-15 12:33:00'),
(65, 7, 29, 11, 'hi', '', '', '2021-03-15 12:35:00'),
(66, 11, 29, 11, 'ok', '', '', '2021-03-15 12:36:00'),
(67, 11, 29, 11, 'ok', '', '', '2021-03-15 12:37:00'),
(68, 4, 29, 11, '', 'Greate', '', '2021-03-15 01:00:00'),
(69, 11, 29, 11, 'ok', '', '', '2021-03-15 01:00:00'),
(70, 11, 29, 10, 'Ok', '', '', '2021-03-15 01:20:00'),
(71, 11, 29, 10, 'Done', '', '', '2021-03-15 01:23:00'),
(72, 4, 29, 11, '', 'hmmm', '', '2021-03-15 01:27:00'),
(73, 5, 29, 11, '', 'Done', '', '2021-03-15 01:27:00'),
(74, 11, 29, 11, 'hm', '', '', '2021-03-15 01:28:00'),
(75, 11, 29, 10, 'okk', '', '', '2021-03-15 01:29:00'),
(76, 11, 29, 10, 'hu', '', '', '2021-03-15 01:30:00'),
(77, 11, 29, 10, 'okk', '', '1615795312_901015.jpeg', '2021-03-15 01:32:00'),
(78, 10, 29, 11, 'Hello', '', '', '2021-03-15 02:01:00'),
(79, 11, 29, 10, 'Test', '', '', '2021-03-15 03:00:00'),
(80, 11, 29, 10, 'ok', '', '', '2021-03-16 10:51:00'),
(81, 5, 14, 22, '', '', '', '2021-03-18 11:26:00'),
(82, 5, 14, 22, 'heloo', '', '', '2021-03-18 11:26:00'),
(83, 5, 14, 22, 'heloo', '', 'add_image_bg.png', '2021-03-18 11:26:00'),
(84, 5, 14, 22, 'hii', '', '', '2021-03-18 11:31:00'),
(85, 5, 14, 22, 'hii', '', '', '2021-03-18 11:32:00'),
(86, 5, 14, 22, 'hii', '', '', '2021-03-18 11:33:00'),
(87, 5, 14, 22, 'hii', '', '', '2021-03-18 12:03:00'),
(88, 5, 14, 22, 'hii', '', '', '2021-03-18 12:03:00'),
(89, 5, 14, 22, 'hii', '', '', '2021-03-18 12:04:00'),
(90, 5, 14, 22, 'hii', '', '', '2021-03-18 12:05:00'),
(91, 5, 14, 22, 'hii', '', '', '2021-03-18 12:07:00'),
(92, 5, 14, 22, 'hii', '', '', '2021-03-18 12:11:00'),
(93, 5, 14, 22, 'hii', '', '', '2021-03-18 12:12:00'),
(94, 5, 14, 22, 'hii', '', '', '2021-03-18 12:14:00'),
(95, 5, 14, 22, 'hii', '', '', '2021-03-18 12:18:00'),
(96, 5, 14, 22, 'hii', '', '', '2021-03-18 12:19:00'),
(97, 5, 14, 22, 'hii', '', '', '2021-03-18 12:21:00'),
(98, 5, 14, 22, 'hii', '', '', '2021-03-18 12:24:00'),
(99, 5, 14, 22, 'hii', '', '', '2021-03-18 12:25:00'),
(100, 5, 14, 22, 'hii', '', '', '2021-03-18 12:26:00'),
(101, 5, 14, 22, 'hii', '', '', '2021-03-18 12:28:00'),
(102, 5, 14, 22, 'hii', '', '', '2021-03-18 12:29:00'),
(103, 17, 29, 22, 'Hi', '', '', '2021-03-18 01:03:00'),
(104, 17, 29, 22, 'ok', '', '', '2021-03-18 01:49:00'),
(105, 5, 14, 22, 'd4t', '', '', '2021-03-18 01:52:00'),
(106, 5, 14, 22, 'orrjdjdjssjek', '', '', '2021-03-18 01:54:00'),
(107, 5, 14, 22, 'hshhs', '', '', '2021-03-18 01:55:00'),
(110, 17, 29, 22, 'okk', '', '1616137521_284173.jpeg', '2021-03-19 12:35:00'),
(111, 17, 29, 22, 'okk', '', '', '2021-03-19 12:35:00'),
(112, 17, 29, 22, 'pdf no upload', '', '', '2021-03-19 12:37:00'),
(113, 17, 29, 22, 'okk', '', '', '2021-03-19 12:38:00'),
(114, 17, 29, 22, 'okk', '', '', '2021-03-19 12:41:00'),
(115, 17, 29, 22, 'Hi', '', '', '2021-03-20 08:33:00'),
(116, 17, 29, 22, 'okk', '', '1616252603_751293.jpeg', '2021-03-20 08:33:00'),
(117, 17, 29, 22, 'hiii', '', '', '2021-03-20 08:35:00'),
(118, 17, 29, 22, 'okk', '', '1616252750_009059.jpeg', '2021-03-20 08:35:00'),
(119, 0, 29, 10, 'hi', '', '', '2021-03-22 04:46:00'),
(120, 0, 29, 10, 'hi', '', '', '2021-03-22 04:50:00'),
(121, 0, 29, 22, 'hello', '', '', '2021-03-25 10:30:00'),
(122, 0, 29, 22, 'hello', '', '', '2021-03-25 10:30:00'),
(123, 17, 29, 22, 'okk', '', 'Problems_Updated.pdf', '2021-03-25 10:31:00'),
(124, 17, 29, 22, 'okk', '', '1616648560.581862.jpeg', '2021-03-25 10:32:00'),
(125, 11, 29, 11, 'Good Morning', '', '', '2021-03-25 10:39:00'),
(126, 10, 29, 22, 'okk', '', 'Problems_Updated1.pdf', '2021-03-25 10:43:00'),
(127, 0, 29, 22, 'Good Morning', '', '', '2021-03-25 10:46:00'),
(128, 11, 29, 10, 'Good Morning', '', '', '2021-03-25 10:48:00'),
(129, 11, 29, 11, 'hi', '', '', '2021-03-25 10:48:00'),
(130, 0, 29, 11, 'hi', '', '', '2021-03-25 10:50:00'),
(131, 11, 29, 10, '', '', '', '2021-03-25 10:53:00'),
(132, 11, 29, 10, 'hi', '', '', '2021-03-25 10:53:00'),
(133, 0, 29, 14, '', 'test', '', '2021-03-25 01:50:00'),
(134, 0, 29, 14, '', 'test', '', '2021-03-25 01:52:00'),
(135, 0, 29, 14, '', 'test', '', '2021-03-25 01:59:00'),
(136, 0, 29, 14, '', 'test', '', '2021-03-25 02:01:00'),
(137, 0, 29, 14, '', 'hi', '', '2021-03-25 02:08:00'),
(138, 0, 29, 14, '', 'Hi', '', '2021-04-06 08:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(220) NOT NULL,
  `lname` varchar(220) NOT NULL,
  `email` varchar(550) NOT NULL,
  `phone` varchar(550) NOT NULL,
  `password` varchar(550) NOT NULL,
  `address` varchar(500) NOT NULL DEFAULT '0',
  `dob` date NOT NULL,
  `verify_otp` int(11) NOT NULL,
  `lat` double NOT NULL DEFAULT '0',
  `lang` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `image` varchar(550) NOT NULL DEFAULT 'users.png',
  `service_provider` int(11) NOT NULL,
  `email_status` int(11) NOT NULL,
  `phone_status` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fcm_id` varchar(550) NOT NULL,
  `offline` int(11) NOT NULL COMMENT '0=offline,1=online',
  `profession_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `video2` varchar(255) NOT NULL,
  `video3` varchar(255) NOT NULL,
  `id_proof` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `language` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL COMMENT 'servies',
  `qualification` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `pr_hours` double(65,2) NOT NULL,
  `pr_days` double(65,2) NOT NULL,
  `min_charge` double(65,2) NOT NULL,
  `extra_charge` double(65,2) NOT NULL,
  `profile` int(11) NOT NULL COMMENT '0=user,1=vendor',
  `job_points` int(11) NOT NULL COMMENT 'at job complete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `address`, `dob`, `verify_otp`, `lat`, `lang`, `status`, `otp`, `image`, `service_provider`, `email_status`, `phone_status`, `created_date`, `fcm_id`, `offline`, `profession_id`, `video`, `video2`, `video3`, `id_proof`, `gender`, `language`, `skills`, `qualification`, `about`, `pr_hours`, `pr_days`, `min_charge`, `extra_charge`, `profile`, `job_points`) VALUES
(14, 'anish', '', 'am@gmail.com', '9959574615', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '1981-02-10', 1, 22.752007, 75.9045192, 0, 2672, 'Screenshot_20210216_210513_com_instagram_android.jpg', 1, 0, 0, '2021-02-09 23:12:26', 'e5J1gL-9u3w:APA91bERsZKU5UDsfX1ql5Rrarbic2tUxO-juceACUjmkwrghyQptmDyimmO1rhBh70RAwQixaVCzxckL6York0hGAg4IIOJWC1eWF4qfdRiZ4FtgOHT4cIpsOOWi3xuJBezsmPg7_hU', 0, 4, 'RECORDING_20210210_114317889.mp4', 'RECORDING_20210210_114406749.mp4', 'RECORDING_20210210_114441612.mp4', 'IMG-20210210-WA0005.jpg', '', 'hindi', '3', 'btech', 'tethh', 150.00, 5000.00, 25.00, 150.00, 0, 7),
(19, 'sdf', '', 'sunil@gmail.com', '6265854125', '480ab761677c17f3f5c8dfaa23956ef5', 'vijay nagar', '2021-02-13', 1, 2275, 75.22, 0, 9961, 'users.png', 1, 0, 0, '2021-02-10 23:28:34', '', 0, 0, 'video15.mp4', 'video16.mp4', 'video17.mp4', '', 'Male', 'sd', '6', 'sdf', '', 1.00, 2.00, 3.00, 4.00, 0, 0),
(20, 'nckf', '', 'anil@gmail.com', '9926656613', '', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2021-02-11', 0, 22.7520126, 75.9045182, 0, 6678, 'users.png', 0, 0, 0, '2021-02-11 06:49:36', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(21, 'nami', '', 'nami@gmail.com', '8963965547', '81dc9bdb52d04dc20036dbd8313ed055', '148, behind MALVIYA PETROL PUMP Colony, Tapeshwari Bagh Colony, Indore, Madhya Pradesh 452010, India', '2021-02-11', 1, 22.7491088, 75.9045229, 0, 8089, 'users.png', 0, 0, 0, '2021-02-11 07:18:42', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(22, 'shivam', '', 'shivs@gmail.com', '9752768332', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '1992-02-12', 1, 22.7520058, 75.9045198, 0, 3757, 'users.png', 1, 0, 0, '2021-02-11 22:30:36', '', 0, 1, 'RECORDING_20210212_110103956.mp4', 'RECORDING_20210212_110138544.mp4', 'RECORDING_20210212_110238859.mp4', 'Screenshot_20201128_232745_com_instagram_android2.jpg', 'Male', 'hindi', '2,3', 'be', 'test', 150.00, 600.00, 200.00, 100.00, 0, 12),
(27, 'Vardhan', '', 'vsekursa@gmail.com', '9059503299', 'e10adc3949ba59abbe56e057f20f883e', 'Karachi Bakery', '1983-06-10', 1, 17.3704919, 78.4297678, 0, 3525, 'users.png', 1, 0, 0, '2021-02-13 22:05:39', 'djyD-67TEIE:APA91bGCbrtS6HgZ6zHRegg6sB2TxFEa_Ye0Po4_0areQP1qqchTa7VZoH56q27DN_C0KfqNspfb_ZQqr-DLPF-_jIIxJeCiaMIRzfQyWjw_D6fCzpmMxd_60j-350X0F_Wn-ijgwIBh', 0, 1, 'RECORDING_20210214_104249064.mp4', 'RECORDING_20210214_104254122.mp4', '', 'IMG_20210205_132840.jpg', 'Male', '', '', '', '', 300.00, 1500.00, 300.00, 300.00, 0, 0),
(29, 'Roshni ji', '', 'roshni@gmail.com', '7974568694', '81dc9bdb52d04dc20036dbd8313ed055', '', '2021-03-31', 1, 22.7520036, 75.9045206, 0, 6897, '', 1, 0, 0, '2021-02-15 03:27:06', 'ede69HvjQAs:APA91bFKKpm87eTrHk4rxFBKKIRG2QGrOACStlF03YYuxIvpXGw6sIYH0jqiMKekpxMGF2fm7nMEG-_Uqpu_j-wU36sQHqh4gkFo_KPC6WiSwqVaI2aTxT-48ImXSTrJH7ESrx3pH4tx', 0, 0, 'video33.mp4', 'video34.mp4', 'video35.mp4', '', '', '??Hindi', '1', 'MCA', 'test', 3.00, 2.00, 10.00, 50.00, 0, 6),
(34, 'Khushboo', '', 'khushboo@gmail.com', '8989274692', '81dc9bdb52d04dc20036dbd8313ed055', '78, Sheetal Nagar, Sceme No 54, Vijay Nagar, Indore, Madhya Pradesh 452010, India', '2021-02-20', 1, 22.7525782, 75.902602, 0, 9073, 'users.png', 0, 0, 0, '2021-02-20 07:17:59', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(36, 'subhash', '', 'subhash@gmail.com', '8982694107', '480ab761677c17f3f5c8dfaa23956ef5', 'Bombay Hospital Square', '1996-03-20', 1, 22.7520111, 75.9045138, 0, 4135, 'users.png', 1, 0, 0, '2021-02-21 22:16:33', '', 0, 4, 'video30.mp4', 'video31.mp4', 'video32.mp4', '1616064919831.jpg', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(38, 'm srinivasa rao', '', 'insurancesrinu@gmail.com', '9866715828', '5e91c44da26270ab210e66c2b3d9fbf4', 'Chillakallu Vedadri Bandipalem Konakanchi Road', '1975-07-10', 1, 16.4930441, 80.6558761, 0, 9761, 'users.png', 1, 0, 0, '2021-03-17 05:24:11', 'echUN-PrGFA:APA91bGCnt6uKGkQJWEwRmDwaBqA90iaxCsuiVUJshIGtnJ5wIRNFn8YHCeduuNakz83PYM4wXc-yzJkDq3wk3u0CZqKUbA6kJ-t6i-3rGLZe-e60GOFz91WQZwFssCg58svArRkvQoC', 0, 4, 'RECORDING_20210318_103112195.mp4', 'RECORDING_20210318_103126332.mp4', 'RECORDING_20210318_103136835.mp4', '1616043356917.jpg', 'Male', 'telugu', '5', '10', '10 years experience ', 500.00, 1500.00, 250.00, 50.00, 0, 0),
(39, 'Sanjay Prajapat', '', 'prajapats661@gmail.com', 'prajapats6', 'e10adc3949ba59abbe56e057f20f883e', 'Unnamed Road, Pushp Vihar Colony, Mahalaxmi Nagar, Indore, Madhya Pradesh 452010, India', '2021-03-08', 1, 22.7520144, 75.9045297, 0, 6832, 'users.png', 0, 0, 0, '2021-03-17 22:47:01', 'com.ilaj.ui.common.utils.TOKEN_ID', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(40, 'Sanjay Prajapat', '', 'prajapats66@gmail.com', '9827301638', 'e10adc3949ba59abbe56e057f20f883e', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2021-03-16', 1, 22.7520077, 75.9045274, 0, 3301, 'users.png', 0, 0, 0, '2021-03-17 22:50:11', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(41, 'subhash', '', 'subhashji@gmail.com', '7992345857', '827ccb0eea8a706c4c34a16891f84e7b', '', '1989-03-07', 1, 22.751762, 75.856164, 0, 2343, 'users.png', 0, 0, 0, '2021-03-18 00:44:58', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(42, 'cc', '', 'bsh@gmail.com', '7788365826', '', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2021-03-18', 0, 22.7520076, 75.9045213, 0, 7532, 'users.png', 0, 0, 0, '2021-03-18 03:12:49', 'dHxknN30oMo:APA91bFk2Yi_GYOruIQZt-bMRUPZ7KlJQypTe1nIfAJjMzqH35qhQF4Yo2DyqcBL7vM76REySW5z0lr0X54lSWL9CTOVeso_9zUrPre7wHINcKU6OQ_xTWxGbA4fi7EyVrxe0ZRinuWe', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(43, 'g', '', 'vcxdfc@gmail.com', '7788887887', '', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2021-03-18', 0, 22.7520081, 75.9045259, 0, 4441, 'users.png', 0, 0, 0, '2021-03-18 03:24:32', 'dHxknN30oMo:APA91bFk2Yi_GYOruIQZt-bMRUPZ7KlJQypTe1nIfAJjMzqH35qhQF4Yo2DyqcBL7vM76REySW5z0lr0X54lSWL9CTOVeso_9zUrPre7wHINcKU6OQ_xTWxGbA4fi7EyVrxe0ZRinuWe', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(46, '', '', 'anish.mitkari@gmail.com', '', '24cbfc933c649d2e5248d1e0dd475969', '', '0000-00-00', 1, 22.7520069, 75.9045296, 0, 7011, 'users.png', 1, 0, 0, '2021-03-18 03:32:02', 'dcp5hFKiBBQ:APA91bFQyQ7w-wG50b0eEEbbPe7rul7FiK4NP4tvhG9de2Gp1lo0nbj6dRtBBNR-JoCKxG7WRvhVy4zfE2-CPTfabv4j2YzIR2G0Rx__Yg2DgSXpMKO8A5xn1dW2Wp0a1QZaJUqtNku_', 0, 0, 'RECORDING_20210318_160727658.mp4', 'RECORDING_20210318_160930934.mp4', 'RECORDING_20210318_160941424.mp4', 'IMG-20210318-WA0013.jpg', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(47, 'sdfs', '', 'vxxcv@gmail.com', 'sdf', '', '', '2021-03-18', 0, 22.751762, 75.856164, 0, 1207, 'users.png', 0, 0, 0, '2021-03-18 04:03:47', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(48, 'sdf', '', 'sbvu@gmail.com', '3435', '', '', '2021-03-18', 0, 22.751762, 75.856164, 0, 2208, 'users.png', 0, 0, 0, '2021-03-18 04:09:16', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(49, 'kk', '', 'tested@gmail.com', 'zcx', '', '', '0000-00-00', 0, 22.751762, 75.856164, 0, 5717, 'users.png', 1, 0, 0, '2021-03-18 05:29:14', '1', 0, 0, '', '', '', '', '', '', '', 'M.E', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(50, 'kks', '', 'kks@gmail.com', '789789', '', '', '1997-03-25', 0, 22.751762, 75.856164, 0, 8037, 'users.png', 1, 0, 0, '2021-03-18 05:30:04', '1', 0, 0, '', '', '', '', 'Male', 'English', '2', 'BE', 'hii jsdsjd dssdhhsd aaa', 0.00, 0.00, 0.00, 0.00, 0, 0),
(51, 'reads', '', 'kou@gmail.com', '8596415267', '', '', '2021-03-18', 0, 22.751762, 75.856164, 0, 4154, 'users.png', 0, 0, 0, '2021-03-18 05:32:35', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(52, 'testt', '', 'xbur@gmail.com', '9382716482', '63c4b1baf3b4460fa9936b1a20919bec', '', '2021-03-18', 1, 22.751762, 75.856164, 0, 1209, 'users.png', 0, 0, 0, '2021-03-18 05:38:37', '1', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(53, 'testa', '', 'test12345@gmail.com', '9826311111', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '2008-03-19', 1, 22.7520059, 75.9045242, 0, 9522, 'users.png', 1, 0, 0, '2021-03-18 22:57:43', '', 0, 2, 'RECORDING_20210319_115000415.mp4', 'RECORDING_20210319_115037365.mp4', 'RECORDING_20210319_115141185.mp4', 'IMG-20210319-WA0001.jpg', 'Male', 'hindi,english', '1,2', 'jfdj', 'hi i am vendr', 300.00, 600.00, 50.00, 150.00, 0, 0),
(54, 'tes', '', 'ads@gmail.com', '234', '', '', '2021-03-19', 0, 22.751762, 75.856164, 0, 4855, 'users.png', 0, 0, 0, '2021-03-19 02:47:50', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(55, 'aa', '', 'aa@gmail.com', '9074652551', '24cbfc933c649d2e5248d1e0dd475969', 'Bombay Hospital Square', '1995-03-19', 1, 22.7520103, 75.9045251, 0, 1855, 'users.png', 1, 0, 0, '2021-03-19 02:50:55', 'e2jSJtNouBw:APA91bGHuNZA0HPWIqM4UEx3I9JejYDDd9Ac367YU9_YhJUSAvBxnqz0yvEnMJ_rShk1DzynRW7RDg5kgvDnkK70X4Dbm7X50kv8oJGfd_3FopxXgn3YfhHfnb0Iik9O5ByDvRdlMrp7', 0, 4, 'RECORDING_20210319_152630421.mp4', 'RECORDING_20210319_152713512.mp4', 'RECORDING_20210319_152749057.mp4', 'Retinol-Serum-1-1100x1100.jpg', 'Male', 'English,hind,Arabic,English,hind,Arabic', '2', 'engineering ', 'Hi I am a service provider i will provide 100% quality work', 50.00, 500.00, 200.00, 100.00, 0, 0),
(56, 'Sunil', '', 'sachin@gmail.com', '8956451256', '827ccb0eea8a706c4c34a16891f84e7b', '', '1998-03-19', 1, 22.751762, 75.856164, 0, 9320, 'users.png', 0, 0, 0, '2021-03-19 06:53:50', '1', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(57, 'raj', '', 'sh@gmail.com', '9685377424', '', '', '1987-03-20', 0, 22.751762, 75.856164, 0, 6910, 'users.png', 0, 0, 0, '2021-03-20 07:54:14', '1', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(58, 'shiva my', '', 'shivamm@gmail.com', '9752768335', '827ccb0eea8a706c4c34a16891f84e7b', '', '1995-03-20', 1, 22.751762, 75.856164, 0, 5802, 'users.png', 1, 0, 0, '2021-03-20 07:57:05', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(59, 'subhash ji', '', 'naveen@gmail.com', '8982694106', '81dc9bdb52d04dc20036dbd8313ed055', 'vijay nagar', '1996-03-20', 1, 22.7520114, 75.9045198, 0, 1110, '', 1, 0, 0, '2021-03-22 00:09:02', '', 0, 0, 'video36.mp4', 'video37.mp4', 'video38.mp4', '', 'Male', 'Hindi', 'test', 'MCA', '', 3.00, 4.00, 2.00, 6.00, 0, 0),
(60, 'testvn', '', 'tesyvn@gmail.com', '1112223333', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '2021-03-22', 1, 22.7520049, 75.904525, 0, 7688, 'users.png', 1, 0, 0, '2021-03-22 00:39:39', 'eAptXi-ssNo:APA91bEl5cE37TIomUfRHGSTZaDMPE23g-xj323-hLz1M9DhK8v0CQJ-sBSnvD0zooRZA8aAxI2b6eDaZJxXEC097V6ENPheCJzki1mkt5EzyLo-0v5ZNBx0XdDLCubTdh5CCZuc4t-a', 0, 3, 'RECORDING_20210322_131148815.mp4', 'RECORDING_20210322_131225011.mp4', 'RECORDING_20210322_131301710.mp4', '20210313_130511.jpg', 'Male', 'bkbibi,uubuh,hinh8', '2,3,4', 'jbbi', 'buhuhuhuuhuj  bujijiij buuhujij hur rxgy ygujju', 122.00, 200.00, 300.00, 500.00, 0, 0),
(61, 'testclient', '', 'trsrt22@gmail.com', '1472580369', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '2021-03-22', 1, 22.7520078, 75.9045241, 0, 7166, 'users.png', 1, 0, 0, '2021-03-22 01:37:13', 'cEfQ8lb72e4:APA91bHAJI-jB2iTnzwq_zCGPpMSShVKtFzJ-b_t70bqMmLv0mILe6663SJtXQxD5YgdSLX6QeXeSiwABiO6-wZoeVriXUxFgMaN_qzVvtH9yjOfU5o_XOoAxCj8YlPLu3AkHNz_jv9i', 0, 4, '', '', '', 'IMG_20191204_173149_HDR-01~2.jpeg', 'Male', 'vubb,vbybbu,ubhu', '1', 'jbjbub', 'hiijji bihihi', 100.00, 200.00, 300.00, 400.00, 0, 0),
(65, 'phaneendra kumar', '', '12131313', '12345679', '', '1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA', '2020-09-17', 0, 37.421998333333335, -122.08400000000002, 0, 2963, 'users.png', 0, 0, 0, '2021-03-23 08:03:45', 'c5bM23PYrjw:APA91bEQ8N8WIiIfUrIOFYSngf4KpS_Q6dmIIilv-rwDeYNwBR5ojPKy4rEPHSedSN8D50W6xeTtD6VGyI3yjGk2rH5fIchHfUDmjHavhtKu1eCGGSvz5VLjOu_PlbtQwxwAzDCUrwv8', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(66, 'sanjay', '', 'sanjay@gmail.com', '7000641818', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay Hospital Square', '2001-03-30', 1, 22.7520079, 75.9045249, 0, 9276, 'Screenshot_20210216_210513_com_instagram_android1.jpg', 1, 0, 0, '2021-03-26 00:34:42', '', 0, 4, 'RECORDING_20210326_130723546.mp4', 'RECORDING_20210326_130759634.mp4', 'RECORDING_20210326_130836426.mp4', '1613383353882.jpg', 'Male', '', '3,5', 'test', 'test', 100.00, 50.00, 150.00, 50.00, 0, 9),
(67, 'sk', '', 'aryansumit276@gmail.com', '8210251824', '', '', '1990-03-29', 0, 22.743213367648423, 75.89574596844614, 0, 7042, 'users.png', 0, 0, 0, '2021-03-29 06:10:09', 'f0Wtrpp49-M:APA91bG8iXeoduHrGBOlZzn5SRoXjwuU_WdTNeqx6LCh8h09DCwWs2ijl6Lux--UiI3DoEXWmPdRBDlIHV0SW2y7kIta16oamvsS3qgJpOZdbdiKABhbJsEysUUjTiMre0bZARHhXh_J', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(72, 'prakash', '', 'ruffurfu@gmail.com', '5986595859', '', '2nd Floor, MG Rd, above Rithika ShowroomOpp Malabar Gold, Opposite Kalanjali, Labbipet, Vijayawada, Andhra Pradesh 520010, India', '2021-04-08', 0, 16.5024101, 80.6414637, 0, 1707, 'users.png', 0, 0, 0, '2021-04-10 03:59:30', 'dK5tok35dMA:APA91bHRWbTLsRTTDVRE7nQaWZ6I0X2-1fOXs8PuCHQh6gqg24Y9rS9Jrh_JSkq_suA5EHnDkSsQzG57jKTkH63jzix1ibKPr1XkqtNuQjmCMJDMFeZ64rc1QkcDVS2GB9eri5reLJZP', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(73, 'v8bub7nun7', '', 'inijkikiij@gmail.com', '1234708965', '', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '1967-04-10', 0, 22.7520057, 75.904522, 0, 5132, 'users.png', 0, 0, 0, '2021-04-10 04:21:33', 'ff1A4vpAC14:APA91bGhqok7li2Neu-2KBLoAjTUdxZezUgKAJkr6bSBKl8e_vmxA29mFEPMI386G3EWjjoaZuvY_iXDZNlpA8bQNgJ-iHnSotYM6BNhtkXzqmbweMeC8bnLeF8aYWVwasnNCkrzz6vK', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(74, 'sk', '', 'sk@gmail.com', '8121545548', '', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2021-03-03', 0, 22.7520076, 75.904519, 0, 5630, 'users.png', 0, 0, 0, '2021-04-10 04:30:40', 'd91-Es6NXBU:APA91bHuec6WZlHmKNmlpiFr7k71IhD04Tqrf2Y5kiFsYxtbTQHeRVJPq2HmudfvHGedPS6_1eTQ9ao4cNSQHHanItQ95cy53P8sxY6aIOmViCsLPwgM_DFdqdqsQ-aiHVeDg8L2M0bP', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(75, 'RSVP', '', 'rajasekhar.tenneti@gmail.com', '9959574615', '', '2nd Floor, MG Rd, above Rithika ShowroomOpp Malabar Gold, Opposite Kalanjali, Labbipet, Vijayawada, Andhra Pradesh 520010, India', '2021-03-20', 0, 16.5023972, 80.6414611, 0, 3760, 'users.png', 0, 0, 0, '2021-04-10 04:46:08', 'com.ilaj.ui.common.utils.TOKEN_ID', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(76, 'RSVP', '', 'rajasekhaenneti@gmail.com', '9959574655', '', '2nd Floor, MG Rd, above Rithika ShowroomOpp Malabar Gold, Opposite Kalanjali, Labbipet, Vijayawada, Andhra Pradesh 520010, India', '2021-04-02', 0, 16.5023992, 80.6414594, 0, 3965, 'users.png', 0, 0, 0, '2021-04-10 04:50:48', 'com.ilaj.ui.common.utils.TOKEN_ID', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(78, 'dfhflsdhflkjsdhlkjfhdkghkjsdhkfu', '', 'fjchjkjh@gmail.com', '4546546546', '', '1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA', '2021-04-06', 0, 37.421998333333335, -122.08400000000002, 0, 2446, 'users.png', 0, 0, 0, '2021-04-10 06:12:48', 'fBP0JRN1yLs:APA91bF5pgV8oFJqBxtQLSNtpNxwD8f7uCQDIMPvilh0LAVvgUMzb7a5UWie0GY-jXZkxwTe__HZvp7sKIy7wsZ-0se2afs1YlZWdJGUvLCsWonJ8DceevamUfsl-uiHIe_uD5iYltDe', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(96, 'raj', '', 'rajasekhar.teneti@gmail.com', '9959574616', '', '2nd Floor, MG Rd, above Rithika ShowroomOpp Malabar Gold, Opposite Kalanjali, Labbipet, Vijayawada, Andhra Pradesh 520010, India', '2021-04-03', 0, 16.5024072, 80.6414583, 0, 2967, 'users.png', 0, 0, 0, '2021-04-11 22:01:57', 'eWcMPiH7LU0:APA91bF7LECK_rjl8AMFwz-XWUYG8N9UtfEFDkjen7ZoC4sIxxFhYPmn4nYagI67_3nGTPi3f-b7YVbQEVlBipiRWnWQj98BXElbipK4vC6uysnyJMr46fcD6C7yWsHXBkcPOqWO7m6f', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(109, 'jai', '', 'jhglfdjkglsdiuhfgkljh@gmail.com', '5263563258', '', '1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA', '2021-04-04', 0, 37.421998333333335, -122.08400000000002, 0, 7237, 'users.png', 0, 0, 0, '2021-04-11 22:21:18', 'fBP0JRN1yLs:APA91bF5pgV8oFJqBxtQLSNtpNxwD8f7uCQDIMPvilh0LAVvgUMzb7a5UWie0GY-jXZkxwTe__HZvp7sKIy7wsZ-0se2afs1YlZWdJGUvLCsWonJ8DceevamUfsl-uiHIe_uD5iYltDe', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(116, 'sanjay', '', 'snjay@gmail.com', '700064181', '', 'indore', '1993-11-27', 0, 22.4545, 75.45454, 0, 3267, 'users.png', 0, 0, 0, '2021-04-11 22:46:42', 'sdaddsds', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(117, 'jeetendra', '', 'golu@gmail.com', '8269829729', '24cbfc933c649d2e5248d1e0dd475969', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2004-04-14', 1, 22.7520046, 75.9045306, 0, 1160, '16183794365031.jpg', 0, 0, 0, '2021-04-13 22:43:58', 'esutnwPBlKg:APA91bE7UNB3Cx3cnEVxrfDpuJB1L4-bNm9pNNoBPDuYt1SG7q9WgAf8Hti9Pgg-Zo5MYYFc7hy3mtz3qh8JLwAZT5ttf9gAuCKDrA_eqAU1YHqfKlSbHoKj27_2RDnt_cSMLullPBnR', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(142, 'kk', '', 'jkhkj@gmail.com', '8319566719', '', 'indore', '1993-11-27', 0, 22.4545, 75.45454, 0, 9419, 'users.png', 0, 0, 0, '2021-04-14 06:02:30', 'sdaddsds', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(149, 'Prakash', '', 'prakashgurrala88@gmail.com', '868886555', '25d55ad283aa400af464c76d713c07ad', 'Rithika ShowroomOpp Malabar Gold', '2021-04-16', 1, 16.5024033, 80.6414597, 0, 6470, 'users.png', 1, 0, 0, '2021-04-15 03:21:19', '', 0, 4, 'RECORDING_20210415_182719670.mp4', 'RECORDING_20210415_182934236.mp4', 'RECORDING_20210415_182959846.mp4', 'Screenshot_20210415-090708_Way2News.jpg', 'Male', 'fvb', '5', 'yh', 'f', 1.00, 2.00, 5.00, 5.00, 0, 0),
(150, 'shivam', '', 'php2logicalsofttech2@gmail.com', '9752768331', 'e10adc3949ba59abbe56e057f20f883e', 'Ec 52 BN House Scheme Number 94 opp. Karnawat Bhojnalay, near Bombay Hospital Square, Pushp Vihar Colony, Scheme 94 Sector EC, Indore, Madhya Pradesh 452010, India', '2020-12-10', 1, 22.7520136, 75.9045274, 0, 3881, 'users.png', 0, 0, 0, '2021-04-16 11:10:55', '', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(152, 'Phaneendra Kumar Patnala', '', 'dreamlandworks@gmail.com', '8008218', '567624d76b88ac87f0a92309efcb0066', '54-14/7-78, Srinivasa Nagar Bank Colony, Vijayawada, Andhra Pradesh 520008, India', '2021-05-10', 1, 15.0869493, 77.9876048, 0, 4663, 'users.png', 1, 0, 0, '2021-05-11 07:32:06', 'cuEn--NsSPa44m_rhzQNRO:APA91bE-iv9gPYsrDh0GyyQuNUzImGWzl-vH1W44F2dvvF-NJO9Dis_hsfRoE4a9n5AzsCHM81RPoWDo3mmuGlnpb5cCO8viCH0vnVCMmdX5cBNcYUf2AeVn9u5kW6JsbXUxHlIKsxvj', 0, 0, '', '', '', '', 'Male', '', '5,7,8', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(153, 'Malli Ch', '', 'mallich546@gmail.com', '7989965092', 'f12f98ec74395a883d0a10d01746eaca', 'Unnamed Road, Ganapavaram, Andhra Pradesh 522619, India', '2021-05-11', 1, 16.1238251, 80.1695454, 0, 8027, 'IMG_20200802_120612_102.jpg', 0, 0, 0, '2021-05-11 08:06:15', 'enL4ipExSwS2Cp60iyss1b:APA91bGCuJXFAuA-fGPyeoHrXmWh-apB3gZ9y3evqq4maNldwKCg4Eow9kNl_XUCXuDmbKjPMjG3Wh2EtKLAW_ZqQx-x9s_OKAIhcqYbyWEcNtyzbeUDZFm3N11Qe0OJWiV2zmRzLgTW', 0, 0, '', '', '', '', 'Male', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0, 0),
(155, 'Phaneendra Kumar Patnala', '', 'indcarder1986@gmail.com', '7989434083', '567624d76b88ac87f0a92309efcb0066', '54-14/7-78', '2021-05-18', 1, 16.5094423, 80.6706665, 0, 9464, '1620745707532.jpg', 1, 0, 0, '2021-05-11 08:24:25', 'cM7T-kFzQLWQUtMAOjnieB:APA91bG2pEodjTymjvJVmHaR7cEbZDXouan1Y8OU3nkODK6mRvN8JRbMC3vKu5LsBQH5lxOIFsYTtWSR-R5W48-yUHSPDmQOAGGwJqjzd13I-ESPR0Mm6SHHMt8Qrq8Zh9Dkb-_deBvC', 0, 4, 'RECORDING_20210512_140632829.mp4', 'RECORDING_20210512_140638826.mp4', 'RECORDING_20210512_141522761.mp4', '1620808244921.jpg', 'Male', 'english,hindi,telugu', '5,7,8', 'B tech', 'hdbdkdlldd dkdlldldld dkdkdldldl skslsllsl', 1.00, 5.00, 1.00, 1.00, 0, 0),
(156, 'Prakash', '', 'g.prakash226@gmail.com', '8688865876', 'fcea920f7412b5da7be0cf42b8c93759', 'Unnamed Road', '2021-05-14', 1, 15.0869493, 77.9876048, 0, 8045, 'users.png', 1, 0, 0, '2021-05-12 03:27:46', 'cL8l5bF0SZuZwnqEorUgnw:APA91bHR7IoxWJB68U_rfvqYpObKRoJPcRTkV08SSL8NpgLW_rRNwrC2fcOwv7SoQA6LSWIc5W6blBPfJmrcF8NJGHqHLEVEwti97FSL92ZIMTmGf0e_Y1Uim7sOFAHEemxnI49leyPI', 0, 4, 'RECORDING_20210512_092935955.mp4', 'RECORDING_20210512_092942693.mp4', 'RECORDING_20210512_092948254.mp4', 'Screenshot_20210508-202144_One_UI_Home2.jpg', 'Male', 'English,telugu', '3,5,7,8', 'computers', 'hi ', 5.00, 5.00, 8.00, 8.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rating_review`
--

CREATE TABLE `user_rating_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rating_review`
--

INSERT INTO `user_rating_review` (`id`, `user_id`, `rating`, `message`, `vendor_id`, `date_time`) VALUES
(1, 4, 4, '', 2, '2021-01-22 07:23:39'),
(2, 3, 2, '', 2, '2021-01-22 07:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_tariff_time`
--

CREATE TABLE `vendor_tariff_time` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_time` varchar(255) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `day_type` varchar(255) NOT NULL,
  `day_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_tariff_time`
--

INSERT INTO `vendor_tariff_time` (`id`, `user_id`, `from_time`, `to_time`, `day_type`, `day_name`) VALUES
(1, 1, '[{\"FromTime\":\"3:54PM\"}]', '[{\"ToTime\":\"12:54PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"T\"}]'),
(2, 4, '[{\"FromTime\":\"10:21\"}]', '[{\"ToTime\":\"10:21\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"W\"}]'),
(3, 4, '[{\"FromTime\":\"10:21\"}]', '[{\"ToTime\":\"10:21\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(4, 4, '[{\"FromTime\":\"10:21\"}]', '[{\"ToTime\":\"10:21\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(5, 4, '[{\"FromTime\":\"11:6\"}]', '[{\"ToTime\":\"11:6\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"T\"}]'),
(6, 4, '[{\"FromTime\":\"11:6\"}]', '[{\"ToTime\":\"11:6\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(7, 4, '[{\"FromTime\":\"11:18\"}]', '[{\"ToTime\":\"11:18\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Th\"}]'),
(8, 4, '[{\"FromTime\":\"11:19\"}]', '[{\"ToTime\":\"11:19\"}]', '[{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"Th\"}]'),
(9, 14, '[{\"FromTime\":\"11:42AM\"},{\"FromTime\":\"11:42AM\"}]', '[{\"ToTime\":\"3:42PM\"},{\"ToTime\":\"6:42AM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekend\"}]', '[{\"Day_Name\":\"F,Sa\"},{\"Day_Name\":\"F,Sa\"}]'),
(10, 17, '[{\"FromTime\":\"6:0AM\"}]', '[{\"ToTime\":\"12:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(11, 17, '[{\"FromTime\":\"6:0AM\"}]', '[{\"ToTime\":\"12:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(12, 13, '{\"from_date\":[{\"FromTime\":\"17:20\"},{\"FromTime\":\"17:20\"}]}', '{\"to_date\":[{\"ToTime\":\"17:20\"},{\"ToTime\":\"17:20\"}]}', '{\"day_type\":[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]}', '{\"day_name\":[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"day_Name\":\"Tue\",\"Day_Name\":\"Mon,Mon,Tue\"},{\"day_Name\":\"Tue\",\"Day_Name\":\"Mon,Mon,Tue\"}]}'),
(13, 13, '{\"from_date\":[{\"FromTime\":\"17:20\"}]}', '{\"to_date\":[{\"ToTime\":\"17:20\"}]}', '{\"day_type\":[{\"Day_Type\":\"WeekDay\"}]}', '{\"day_name\":[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"day_Name\":\"Tue\",\"Day_Name\":\"Mon,Mon,Tue\"}]}'),
(14, 13, '[{\"FromTime\":\"17:31\"}]', '[{\"ToTime\":\"17:31\"}]', '[{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(15, 13, '[{\"FromTime\":\"17:31\"},{\"FromTime\":\"17:31\"}]', '[{\"ToTime\":\"17:31\"},{\"ToTime\":\"17:31\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(16, 18, '[{\"FromTime\":\"11:28AM\"},{\"FromTime\":\"12:0AM\"}]', '[{\"ToTime\":\"1:29AM\"},{\"ToTime\":\"1:25AM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"T,W\"},{\"Day_Name\":\"T,W\"}]'),
(17, 13, '[{\"FromTime\":\"10:11\"}]', '[{\"ToTime\":\"13:11\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(18, 13, '[{\"FromTime\":\"13:13\"}]', '[{\"ToTime\":\"13:13\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Th\"}]'),
(19, 13, '[{\"FromTime\":\"13:42\"}]', '[{\"ToTime\":\"16:42\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"W\"}]'),
(20, 13, '[{\"FromTime\":\"14:06\"}]', '[{\"ToTime\":\"23:06\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(21, 13, '[{\"FromTime\":\"14:55\"}]', '[{\"ToTime\":\"16:55\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(22, 13, '[{\"FromTime\":\"14:59\"}]', '[{\"ToTime\":\"17:59\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(23, 13, '[{\"FromTime\":\"16:14\"}]', '[{\"ToTime\":\"05:16\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(24, 13, '[{\"FromTime\":\"18:48\"}]', '[{\"ToTime\":\"20:48\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Mon\"}]'),
(25, 13, '[{\"FromTime\":\"18:58\"}]', '[{\"ToTime\":\"18:58\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(26, 13, '[{\"FromTime\":\"19:16\"}]', '[{\"ToTime\":\"21:16\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(27, 22, '[{\"FromTime\":\"10:59AM\"},{\"FromTime\":\"11:0AM\"},{\"FromTime\":\"10:0AM\"}]', '[{\"ToTime\":\"5:0AM\"},{\"ToTime\":\"3:0AM\"},{\"ToTime\":\"5:0AM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"Sa\"},{\"Day_Name\":\"Sa\"},{\"Day_Name\":\"Sa\"}]'),
(28, 18, '[{\"FromTime\":\"13:12\"}]', '[{\"ToTime\":\"16:14\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(29, 19, '[{\"FromTime\":\"16:55\"}]', '[{\"ToTime\":\"16:55\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(30, 19, '[{\"FromTime\":\"17:06\"}]', '[{\"ToTime\":\"19:06\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(31, 19, '[{\"FromTime\":\"19:28\"}]', '[{\"ToTime\":\"21:29\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(32, 19, '[{\"FromTime\":\"19:28\"},{\"FromTime\":\"19:28\"}]', '[{\"ToTime\":\"21:29\"},{\"ToTime\":\"21:29\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(33, 23, '[{\"FromTime\":\"19:40\"}]', '[{\"ToTime\":\"19:40\"}]', '[{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"W\"}]'),
(34, 19, '[{\"FromTime\":\"19:58\"}]', '[{\"ToTime\":\"21:59\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(35, 23, '[{\"FromTime\":\"00:46\"},{\"FromTime\":\"00:46\"}]', '[{\"ToTime\":\"23:46\"},{\"ToTime\":\"02:46\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue,Tue,Tue\"},{\"Day_Name\":\"W\"},{\"Day_Name\":\"W\"}]'),
(36, 23, '[{\"FromTime\":\"00:46\"},{\"FromTime\":\"00:46\"}]', '[{\"ToTime\":\"23:46\"},{\"ToTime\":\"02:46\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue,Tue,Tue\"},{\"Day_Name\":\"W\"},{\"Day_Name\":\"W\"}]'),
(37, 26, '[{\"FromTime\":\"23:08\"},{\"FromTime\":\"23:08\"}]', '[{\"ToTime\":\"00:08\"},{\"ToTime\":\"15:10\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(38, 26, '[{\"FromTime\":\"23:08\"},{\"FromTime\":\"23:08\"}]', '[{\"ToTime\":\"00:08\"},{\"ToTime\":\"15:10\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(39, 27, '[{\"FromTime\":\"8:0\"}]', '[{\"ToTime\":\"22:0\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(40, 28, '[{\"FromTime\":\"12:03\"}]', '[{\"ToTime\":\"14:03\"}]', '[{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(41, 30, '[{\"FromTime\":\"4:2PM\"}]', '[{\"ToTime\":\"6:2PM\"}]', '[{\"Day_Type\":\"Weekend\"}]', '[{\"Day_Name\":\"Sa,S\"}]'),
(42, 30, '[{\"FromTime\":\"4:9PM\"}]', '[{\"ToTime\":\"6:9PM\"}]', '[{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"W,M\"}]'),
(43, 29, '[{\"FromTime\":\"3:14PM\"}]', '[{\"ToTime\":\"6:14PM\"}]', '[{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"M,Sa\"}]'),
(44, 29, '[{\"FromTime\":\"19:37\"}]', '[{\"ToTime\":\"19:43\"}]', '[{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(45, 36, '[{\"FromTime\":\"10:49AM\"}]', '[{\"ToTime\":\"12:45AM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,W,Th,F,Sa\"}]'),
(46, 36, '[{\"FromTime\":\"10:49AM\"}]', '[{\"ToTime\":\"12:45AM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(47, 1, '10:30,12:30', '12:45,16:25', 'Weekned,Everyday', 'Sat,Sun'),
(48, 37, '[{\"FromTime\":\"8:8AM\"}]', '[{\"ToTime\":\"6:8PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(49, 37, '[{\"FromTime\":\"8:8AM\"}]', '[{\"ToTime\":\"6:8PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(50, 37, '[{\"FromTime\":\"8:10AM\"}]', '[{\"ToTime\":\"6:10PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(51, 29, '[{\"FromTime\":\"19:36\"}]', '[{\"ToTime\":\"20:36\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(52, 37, '[{\"FromTime\":\"6:0AM\"}]', '[{\"ToTime\":\"12:0AM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(53, 38, '[{\"FromTime\":\"6:18AM\"}]', '[{\"ToTime\":\"8:18PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,W,Th,F,Sa\"}]'),
(54, 38, '[{\"FromTime\":\"6:24AM\"}]', '[{\"ToTime\":\"7:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"M,S,T,W,Th,F\"}]'),
(55, 46, '[{\"FromTime\":\"6:6AM\"},{\"FromTime\":\"8:6AM\"}]', '[{\"ToTime\":\"10:6PM\"},{\"ToTime\":\"2:6PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"\"},{\"Day_Name\":\"\"}]'),
(56, 46, '[{\"FromTime\":\"18:19\"}]', '[{\"ToTime\":\"20:19\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,Th\"}]'),
(57, 36, '[{\"FromTime\":\"4:24PM\"},{\"FromTime\":\"5:24PM\"}]', '[{\"ToTime\":\"6:24PM\"},{\"ToTime\":\"6:30PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"M,T,W,Th\"},{\"Day_Name\":\"M,T,W,Th\"}]'),
(58, 53, '[{\"FromTime\":\"12:0AM\"},{\"FromTime\":\"1:0PM\"}]', '[{\"ToTime\":\"5:0PM\"},{\"ToTime\":\"3:0PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekend\"}]', '[{\"Day_Name\":\"Th,F,Sa\"},{\"Day_Name\":\"Th,F,Sa\"}]'),
(59, 55, '[{\"FromTime\":\"6:24AM\"},{\"FromTime\":\"9:25AM\"}]', '[{\"ToTime\":\"12:24PM\"},{\"ToTime\":\"5:25PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"\"},{\"Day_Name\":\"\"}]'),
(60, 55, '[{\"FromTime\":\"6:29\"}]', '[{\"ToTime\":\"12:29\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,Th,W,F\"}]'),
(61, 55, '[{\"FromTime\":\"6:29\"}]', '[{\"ToTime\":\"12:29\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,Th,W,F\"}]'),
(62, 29, '[{\"FromTime\":\"21:21\"},{\"FromTime\":\"21:21\"}]', '[{\"ToTime\":\"23:21\"},{\"ToTime\":\"01:21\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(63, 29, '[{\"FromTime\":\"21:21\"},{\"FromTime\":\"21:21\"}]', '[{\"ToTime\":\"23:21\"},{\"ToTime\":\"01:21\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(64, 36, '[{\"FromTime\":\"20:48\"},{\"FromTime\":\"20:48\"}]', '[{\"ToTime\":\"20:48\"},{\"ToTime\":\"23:48\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon\"},{\"Day_Name\":\"\"},{\"Day_Name\":\"\"}]'),
(65, 36, '[{\"FromTime\":\"20:48\"},{\"FromTime\":\"20:48\"}]', '[{\"ToTime\":\"20:48\"},{\"ToTime\":\"23:48\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon\"},{\"Day_Name\":\"\"},{\"Day_Name\":\"\"}]'),
(66, 29, '[{\"FromTime\":\"21:40\"},{\"FromTime\":\"21:40\"}]', '[{\"ToTime\":\"22:40\"},{\"ToTime\":\"02:40\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(67, 29, '[{\"FromTime\":\"21:40\"},{\"FromTime\":\"21:40\"}]', '[{\"ToTime\":\"22:40\"},{\"ToTime\":\"02:40\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(68, 29, '[{\"FromTime\":\"11:08\"}]', '[{\"ToTime\":\"11:08\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(69, 14, '[{\"FromTime\":\"12:54\"}]', '[{\"ToTime\":\"13:0\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"M,T,W,Th,F\"}]'),
(70, 60, '[{\"FromTime\":\"12:0PM\"},{\"FromTime\":\"1:9PM\"}]', '[{\"ToTime\":\"1:0PM\"},{\"ToTime\":\"2:9PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"T,W,Th,F\"},{\"Day_Name\":\"T,W,Th,F\"}]'),
(71, 61, '[{\"FromTime\":\"12:0PM\"},{\"FromTime\":\"2:0PM\"}]', '[{\"ToTime\":\"2:0PM\"},{\"ToTime\":\"4:0PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"T,W,Th\"},{\"Day_Name\":\"T,W,Th\"}]'),
(72, 14, '[{\"FromTime\":\"15:11\"},{\"FromTime\":\"15:11\"}]', '[{\"ToTime\":\"15:11\"},{\"ToTime\":\"18:11\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekend\"}]', '[{\"Day_Name\":\"Sa,F,Th\"},{\"Day_Name\":\"Sa,F,Th\"}]'),
(73, 14, '[{\"FromTime\":\"15:22\"},{\"FromTime\":\"15:23\"}]', '[{\"ToTime\":\"15:22\"},{\"ToTime\":\"19:23\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekend\"}]', '[]'),
(74, 59, '[{\"FromTime\":\"20:07\"},{\"FromTime\":\"20:07\"}]', '[{\"ToTime\":\"21:07\"},{\"ToTime\":\"00:07\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(75, 59, '[{\"FromTime\":\"20:07\"},{\"FromTime\":\"20:07\"}]', '[{\"ToTime\":\"21:07\"},{\"ToTime\":\"00:07\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon\"}]'),
(76, 59, '[{\"FromTime\":\"19:09\"}]', '[{\"ToTime\":\"19:09\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"\"}]'),
(77, 29, '[{\"FromTime\":\"20:14\"}]', '[{\"ToTime\":\"20:14\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"T,W,S,M,Th,F,Sa\"}]'),
(78, 29, '[{\"FromTime\":\"3:14PM\"}]', '[{\"ToTime\":\"6:14PM\"}]', '[{\"Day_Type\":\"WeekEnd\"}]', '[{\"Day_Name\":\"\"}]'),
(79, 29, '[{\"FromTime\":\"18:48\"}]', '[{\"ToTime\":\"20:48\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"T,Th,W,S,M,F,Sa\"}]'),
(80, 29, '[{\"FromTime\":\"21:11\"},{\"FromTime\":\"21:11\"}]', '[{\"ToTime\":\"20:11\"},{\"ToTime\":\"10:11\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(81, 29, '[{\"FromTime\":\"21:11\"},{\"FromTime\":\"21:11\"}]', '[{\"ToTime\":\"20:11\"},{\"ToTime\":\"10:11\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(82, 29, '[{\"FromTime\":\"20:11\"},{\"FromTime\":\"20:11\"}]', '[{\"ToTime\":\"21:11\"},{\"ToTime\":\"23:11\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(83, 29, '[{\"FromTime\":\"20:11\"},{\"FromTime\":\"20:11\"}]', '[{\"ToTime\":\"21:11\"},{\"ToTime\":\"23:11\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(84, 29, '[{\"FromTime\":\"22:26\"},{\"FromTime\":\"22:26\"}]', '[{\"ToTime\":\"21:26\"},{\"ToTime\":\"23:26\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(85, 29, '[{\"FromTime\":\"22:26\"},{\"FromTime\":\"22:26\"}]', '[{\"ToTime\":\"21:26\"},{\"ToTime\":\"23:26\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Mon,Tue,Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(86, 66, '[{\"FromTime\":\"2:6PM\"}]', '[{\"ToTime\":\"4:6PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T\"}]'),
(87, 29, '[{\"FromTime\":\"21:11\"},{\"FromTime\":\"21:11\"}]', '[{\"ToTime\":\"21:11\"},{\"ToTime\":\"23:11\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"W\"},{\"Day_Name\":\"W\"}]'),
(88, 29, '[{\"FromTime\":\"21:11\"},{\"FromTime\":\"21:11\"}]', '[{\"ToTime\":\"21:11\"},{\"ToTime\":\"23:11\"}]', '[{\"Day_Type\":\"WeekDay\"},{\"Day_Type\":\"WeekDay\"}]', '[{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"W\"},{\"Day_Name\":\"W\"}]'),
(89, 29, '[{\"FromTime\":\"12:49\"}]', '[{\"ToTime\":\"11:49\"}]', '[{\"Day_Type\":\"WeekEnd\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"}]'),
(90, 29, '[{\"FromTime\":\"12:49\"},{\"FromTime\":\"12:49\"}]', '[{\"ToTime\":\"11:49\"},{\"ToTime\":\"14:49\"}]', '[{\"Day_Type\":\"WeekEnd\"},{\"Day_Type\":\"WeekEnd\"}]', '[{\"Day_Name\":\"Mon\"},{\"Day_Name\":\"Mon,Tue\"},{\"Day_Name\":\"Tue\"},{\"Day_Name\":\"Tue\"}]'),
(91, 29, '[{\"FromTime\":\"10:53\"},{\"FromTime\":\"11:0\"}]', '[{\"ToTime\":\"6:53\"},{\"ToTime\":\"2:0\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"T, Th\"},{\"Day_Name\":\"T, Th\"}]'),
(92, 29, '[{\"FromTime\":\"10:53\"},{\"FromTime\":\"11:0\"}]', '[{\"ToTime\":\"6:53\"},{\"ToTime\":\"2:0\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"T, Th\"},{\"Day_Name\":\"T, Th\"}]'),
(93, 29, '10:30,12:30', '12:45,16:25', 'Weekned,Everyday', 'Sat,Sun'),
(94, 148, '[{\"FromTime\":\"12:0AM\"}]', '[{\"ToTime\":\"12:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(95, 148, '[{\"FromTime\":\"12:0AM\"}]', '[{\"ToTime\":\"12:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(96, 149, '[{\"FromTime\":\"12:34PM\"}]', '[{\"ToTime\":\"4:34PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,T,M,Sa,F\"}]'),
(97, 149, '[{\"FromTime\":\"12:34PM\"}]', '[{\"ToTime\":\"4:34PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(98, 149, '[{\"FromTime\":\"7:56PM\"}]', '[{\"ToTime\":\"3:55PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S\"}]'),
(99, 149, '[{\"FromTime\":\"7:56PM\"}]', '[{\"ToTime\":\"3:55PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(100, 149, '[{\"FromTime\":\"4:26PM\"}]', '[{\"ToTime\":\"8:26PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,W\"}]'),
(101, 150, '[{\"FromTime\":\"6:44PM\"},{\"FromTime\":\"7:44AM\"}]', '[{\"ToTime\":\"12:56PM\"},{\"ToTime\":\"8:45PM\"}]', '[{\"Day_Type\":\"Everyday\"},{\"Day_Type\":\"Weekend\"}]', '[{\"Day_Name\":\"Sa,Th,W,F,T,M\"},{\"Day_Name\":\"Sa,Th,W,F,T,M\"}]'),
(102, 156, '[{\"FromTime\":\"7:0AM\"}]', '[{\"ToTime\":\"9:13PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,W,Th,F,Sa\"}]'),
(103, 156, '[{\"FromTime\":\"7:0AM\"}]', '[{\"ToTime\":\"9:13PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(104, 156, '[{\"FromTime\":\"6:20AM\"}]', '[{\"ToTime\":\"9:21PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"M,S,W,Sa,F,Th,T\"}]'),
(105, 156, '[{\"FromTime\":\"9:24AM\"}]', '[{\"ToTime\":\"9:24PM\"}]', '[{\"Day_Type\":\"Weekday\"}]', '[{\"Day_Name\":\"\"}]'),
(106, 156, '[{\"FromTime\":\"7:26AM\"}]', '[{\"ToTime\":\"9:26PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"S,M,T,Sa,F,Th,W\"}]'),
(107, 156, '[{\"FromTime\":\"9:29AM\"}]', '[{\"ToTime\":\"9:29PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]'),
(108, 155, '[{\"FromTime\":\"12:0AM\"}]', '[{\"ToTime\":\"12:0PM\"}]', '[{\"Day_Type\":\"Everyday\"}]', '[{\"Day_Name\":\"\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_feedback`
--
ALTER TABLE `app_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_job_payment`
--
ALTER TABLE `bid_job_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_on_job`
--
ALTER TABLE `bid_on_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requires`
--
ALTER TABLE `job_requires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_subcategory`
--
ALTER TABLE `sub_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_rating_review`
--
ALTER TABLE `user_rating_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_tariff_time`
--
ALTER TABLE `vendor_tariff_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_feedback`
--
ALTER TABLE `app_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bid_job_payment`
--
ALTER TABLE `bid_job_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bid_on_job`
--
ALTER TABLE `bid_on_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_requires`
--
ALTER TABLE `job_requires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_subcategory`
--
ALTER TABLE `sub_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `user_rating_review`
--
ALTER TABLE `user_rating_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_tariff_time`
--
ALTER TABLE `vendor_tariff_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
