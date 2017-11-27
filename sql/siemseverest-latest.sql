-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 05:50 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siemseverest`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `bank_amount` int(11) DEFAULT NULL,
  `cash_amount` int(11) DEFAULT NULL,
  `ref_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `bank_amount`, `cash_amount`, `ref_id`) VALUES
(1, 0, 0, '{\"table\":\"intial\",\"id\":0}'),
(2, 10000, 10000, '{\"table\":\"intial\",\"id\":1}'),
(3, 9980, 10000, '{\"table\":\"withdraw\",\"id\":7}');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `job_post` varchar(200) NOT NULL,
  `sallery` double NOT NULL,
  `citizenship_number` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `first_name`, `last_name`, `address`, `contact`, `job_type`, `job_post`, `sallery`, `citizenship_number`, `image`, `status`) VALUES
(1, 2, 'Ronash', 'Dhakal', 'Changunarayan-2, Bhaktapur, Nepal', '9851219115', 'Permanent', 'Manager', 30000, '21353267236', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/20638387_1539284199425526_1631190336996143153_n.jpg?oh=59182bcf1f9e0478ff42ce64756a16fd&oe=5A6EE632', 1),
(2, 3, 'Govind', 'Baral', 'Gathaghar', '9841131037', 'Permanent', 'Team Leader', 30000, '34653568', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/561054_4000870820625_319986412_n.jpg?oh=f4d9c42674d9c562ca945858a0647681&oe=5AAB3AE2', 1),
(3, 4, 'Juddha Raj', 'Neupane', 'Sallaghari', '9848099244', 'Contract', 'Programmer', 30000, '32429', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22140895_1584088938338849_6208402969784372633_n.jpg?oh=57b0c6f9d0641b8702a5eb7715c667d3&oe=5A70CAD9', 1),
(4, 5, 'Bipin', 'Pandey', 'Pulchowk, Kathmandu', '9846090617', 'Provision', 'Programmer', 30000, '431017/292', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/19059038_1060085370791084_7208413769108948510_n.jpg?oh=1a3783565e4fd79635d51302b232b91f&oe=5A6ECB69', 1),
(5, 6, 'Aabhushan', 'Gautam', 'Kapan, Kathmandu', '9861551591', 'Contract', 'Internship', 20000, '27-01-71-07210', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22853327_1499587503430313_5887538937610731082_n.jpg?oh=2b8de483dca287bf77a43052816bf9ef&oe=5A675010', 1),
(6, 7, 'Mukesh', 'Pandey', 'Kapan, Kathmandu', '9849708099', 'Permanent', 'Accountant', 5000, '123456789', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22853157_1978968598796277_3361759399033477340_n.jpg?oh=f73cd173928ada45908e9733db14481a&oe=5AA7CE7E', 1),
(7, 8, 'Renu', 'Dhakal', 'Changunarayan-2, Bhaktapur, Nepal', '9841580002', 'Permanent', 'Office Assistance', 20000, '123456789', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/21743399_1448283371888063_7406596548859357926_n.jpg?oh=842a96b9b57176f0627901ff2066b26d&oe=5A781A79', 1),
(8, 9, 'Lokesh', 'Dhakal', 'Malmo, Sweden', '47623008522', 'Permanent', 'C.E.O', 30000, '12345667890', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/21151332_1897219790304421_5202034321394373576_n.jpg?oh=007de449beaaa397a173a72fbb4ab227&oe=5A716371', 1),
(9, 10, 'Suraj', 'Baral', 'Malmo, Sweden', '47623008522', 'Permanent', 'Programmer', 30000, '123456897', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/19366337_10154941610574032_6075203468646540578_n.jpg?oh=e409eed4f1cf6ecf3b3755a6bf2e7f14&oe=5AA51702', 1),
(10, 11, 'Shanta', 'Timsina', 'Changunarayan-2, Bhaktapur, Nepal', '9840062014', 'Contract', 'Office Assistance', 25000, '1234567890', 'https://scontent.fktm3-1.fna.fbcdn.net/v/t1.0-9/22405744_494948240883320_3988605393440685544_n.jpg?oh=0b0a25cc7a86aaf09626ad382987ca95&oe=5A797DE5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `amount`, `date`, `description`, `status`) VALUES
(1, 'Salary', 30000000, '2017-11-14 00:00:00', 'November sal', 0),
(2, 'insurance', 100, '2017-11-30 00:00:00', 'asd', 0),
(3, 'xyz', 2147483647, '2017-11-14 00:00:00', 'kiuy', 1),
(4, 'medical', 1, '2017-11-23 00:00:00', 'sd', 1),
(5, 'insurance', 1, '2017-11-29 00:00:00', 'a', 1),
(6, 'insurance', 1, '2017-11-23 00:00:00', 'liuyg', 1),
(7, 'sad', 7, '2017-12-05 00:00:00', 'asd', 1),
(8, 'a', 1994, '2017-11-27 00:00:00', 'asd', 1),
(9, 'bill', 5, '2017-11-14 00:00:00', 'asdasd', 1),
(10, 'bill', 50, '2017-11-14 00:00:00', 'asd', 1),
(11, 'a', 4, '2017-11-18 00:00:00', 'i', 1);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `amount`, `source`, `date`, `received_by`, `description`, `status`) VALUES
(2, 1, 'ProA', '2017-07-07', 'Ronash', 'akd', 0),
(3, 20000, 'ProjB', '2017-08-07', 'SEIMS', 'TEST', 1),
(4, 966, 'MNP', '0000-00-00', 'Ronash', 'asd', 1),
(5, 900, 'aijhj', '0000-00-00', '1', 'jgfc', 1),
(6, 85, 'sd', '0000-00-00', 'Ronash', 'a', 1),
(8, 989, 'as', '1900-11-19', 'Ronash', 'iuyfg', 1),
(9, 500, 'iad', '2017-11-16', 'Ronash', 'asdklhads', 1),
(10, 800, 'abc', '2017-11-09', 'Ronash', 'saiduiyj', 1),
(11, 8963025, 'ProjM', '2017-11-23', 'Ronash', 'a', 1),
(12, 785214, 'ProjX', '2017-11-23', 'Ronash', 'jh', 1),
(13, 1, 'amn', '2017-11-23', 'Ronash', 'iu', 1),
(14, 2000, 'ProjB', '2017-12-01', 'Ronash', 'k', 1),
(15, 85, 'j', '2017-11-06', 'Ronash', 'k', 0),
(16, 500, 'jkbhgm', '2017-11-23', 'Ronash', 'jnb', 1),
(17, 8, 'l', '2017-11-29', 'Ronash', 'i', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1509423030),
('m140209_132017_init', 1511345466),
('m140403_174025_create_account_table', 1511345468),
('m140504_113157_update_tables', 1511345473),
('m140504_130429_create_token_table', 1511345475),
('m140830_171933_fix_ip_field', 1511345476),
('m140830_172703_change_account_table_name', 1511345477),
('m141222_110026_update_ip_field', 1511345478),
('m141222_135246_alter_username_length', 1511345480),
('m150614_103145_update_social_account_table', 1511345482),
('m150623_212711_fix_username_notnull', 1511345482),
('m151218_234654_add_timezone_to_profile', 1511345483),
('m160929_103127_add_last_login_at_to_user_table', 1511345483),
('m171122_082525_add_incomes_table', 1511342784),
('m171122_152339_create_expenses_table', 1511413257),
('m171123_072445_add_withdraw_table', 1511424749),
('m171123_101936_add_balance_table', 1511432726),
('m171123_105654_add_balance_table', 1511434848),
('m171124_051127_add_column_status_to_income_table', 1511500530),
('m171124_065735_add_balance_table', 1511507338),
('m171124_074507_remove_fk_withdraw_table', 1511509970),
('m171124_083505_remove_col_title_withdraw', 1511512574),
('m171124_114114_add_col_to_voucher', 1511523941),
('m171124_114550_add_table_tax', 1511524386),
('m171124_133812_modify_voucher_table_col_tax_amount', 1511530773);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `start_range` int(11) DEFAULT NULL,
  `end_range` int(11) DEFAULT NULL,
  `tax_perc` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `start_range`, `end_range`, `tax_perc`) VALUES
(1, 0, 25000, 0.075),
(2, 25000, 50000, 0.1),
(3, 50000, 75000, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'binay', 'binay@gmail.com', 'asddsad', 'asda', NULL, 'binay@gmail.com', NULL, NULL, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `paid_to` int(200) NOT NULL,
  `account_of` varchar(200) NOT NULL,
  `has_received` varchar(100) NOT NULL,
  `accountant` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `information` text,
  `tax_amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `date`, `amount`, `paid_to`, `account_of`, `has_received`, `accountant`, `approved_by`, `information`, `tax_amount`) VALUES
(1, '2017-10-31', 29700, 3, '', '0', 6, 1, 'monthly salary', NULL),
(2, '2017-10-31', 29700, 4, '', '1', 6, 1, 'monthly salary', NULL),
(3, '2017-10-31', 29700, 2, '', '0', 6, 1, 'monthly salary', NULL),
(4, '2017-10-31', 29700, 9, '', '0', 6, 1, 'monthly salary', NULL),
(5, '2017-10-31', 29700, 8, '', '0', 6, 1, 'monthly salary', NULL),
(6, '2017-10-31', 29700, 1, '', '0', 6, 1, 'monthly salary', NULL),
(7, '2017-10-31', 19800, 5, '', '0', 6, 1, 'monthly salary', NULL),
(8, '2017-10-31', 19800, 7, '', '0', 6, 1, 'Monthly Salary', NULL),
(9, '2017-10-31', 4950, 6, '', '0', 6, 1, 'monthly salary', NULL),
(10, '2017-11-03', 25000, 10, '', '1', 6, 1, 'Furniture ', NULL),
(11, '2017-11-28', 5000, 2, '', '1', 6, 1, 'kxk', NULL),
(12, '2017-11-27', 2, 3, '', '0', 6, 1, 'a', NULL),
(13, '2017-11-24', 200, 3, '', '1', 6, 1, 'uyy', NULL),
(14, '2017-11-24', 50000, 2, '', '0', 6, 1, 'a', NULL),
(15, '2017-11-23', 29700, 3, '', '1', 6, 1, 'ka', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `purpose` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `amount`, `date`, `received_by`, `description`, `purpose`, `status`) VALUES
(1, 20, '2017-11-14', '3', 'lkjhg', 'dfghj', 1),
(2, NULL, NULL, NULL, '', '', 1),
(6, 800, '2017-11-14', 'Bipin Pandey', 'h', 'k', 1),
(7, 20, '2017-11-14', 'asdb', 'lkjhg', 'dfghj', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountant` (`accountant`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `paid_to` (`paid_to`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-withdraw-received_by` (`received_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
