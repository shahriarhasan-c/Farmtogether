-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 10:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_together`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farm_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farm_id`, `name`, `email`, `contact_number`, `password`) VALUES
(7, 'Shahriar Hasan', 'sh.shahriar5@gmail.com', '01679592991', 'e2fc714c4727ee9395f324cd2e7f331f'),
(8, 'AKM', 'akm@gmail.com', '01797713600', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'mim', 'sj.sumaiyajahan@gmail.com', '01733793327', '626e4c5d2df625e81a213f5cf622de73'),
(10, 'a', 'a@gmail.com', '021558655', 'e2fc714c4727ee9395f324cd2e7f331f'),
(11, 'b', 'b@gmail.com', '02115636', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'c', 'c@gmail.com', '15515456', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `final_booking`
--

CREATE TABLE `final_booking` (
  `postpost_id` int(11) NOT NULL,
  `yes_or_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `message` varchar(255) DEFAULT NULL,
  `Farmerfarm_id` int(10) NOT NULL,
  `Investorinv_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE `investor` (
  `inv_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investor`
--

INSERT INTO `investor` (`inv_id`, `name`, `email`, `contact_number`, `password`) VALUES
(1, 'Asif', 'asif@gmail.com', '01797713600', 'abcde');

-- --------------------------------------------------------

--
-- Table structure for table `investor_subscription`
--

CREATE TABLE `investor_subscription` (
  `Investorinv_id` int(10) NOT NULL,
  `subscriptions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `postpost_id` int(11) NOT NULL,
  `confirm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Farmerfarm_id` int(10) DEFAULT NULL,
  `Investorinv_id` int(10) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_invest` varchar(255) NOT NULL,
  `est_ret_profit` varchar(255) NOT NULL,
  `farm_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `profit_deadline` date NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Farmerfarm_id`, `Investorinv_id`, `title`, `location`, `min_invest`, `est_ret_profit`, `farm_type`, `description`, `picture`, `interest`, `profit_deadline`, `post_id`) VALUES
(8, NULL, 'Want to keep rabbits', 'Tangail', '$500', '$700', 'Rabbits', 'I am a good Farmer.', 'post_img/conejo-6010353_960_720.jpg', NULL, '2021-07-11', 66),
(10, NULL, 'Rice', 'sdf', '234', '455', 'Rice land', 'I am a good Farmer.', 'post_img/Paddy-field-Minamiuonuma-Japan.jpg', NULL, '2021-07-11', 67);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Farmerfarm_id` int(10) NOT NULL,
  `Investorinv_id` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `s_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `final_booking`
--
ALTER TABLE `final_booking`
  ADD KEY `FKfinal_book153838` (`postpost_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD KEY `FKinterest217794` (`Farmerfarm_id`),
  ADD KEY `FKinterest153700` (`Investorinv_id`);

--
-- Indexes for table `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `investor_subscription`
--
ALTER TABLE `investor_subscription`
  ADD PRIMARY KEY (`Investorinv_id`,`subscriptions_id`),
  ADD KEY `FKInvestor_s457510` (`Investorinv_id`),
  ADD KEY `FKInvestor_s594948` (`subscriptions_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `FKpayment762041` (`postpost_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `create_post` (`Farmerfarm_id`),
  ADD KEY `FKpost197475` (`Investorinv_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD KEY `update_status` (`Farmerfarm_id`),
  ADD KEY `FKstatus268085` (`Investorinv_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `investor`
--
ALTER TABLE `investor`
  MODIFY `inv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `final_booking`
--
ALTER TABLE `final_booking`
  ADD CONSTRAINT `FKfinal_book153838` FOREIGN KEY (`postpost_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `FKinterest153700` FOREIGN KEY (`Investorinv_id`) REFERENCES `investor` (`inv_id`),
  ADD CONSTRAINT `FKinterest217794` FOREIGN KEY (`Farmerfarm_id`) REFERENCES `farmer` (`farm_id`);

--
-- Constraints for table `investor_subscription`
--
ALTER TABLE `investor_subscription`
  ADD CONSTRAINT `FKInvestor_s457510` FOREIGN KEY (`Investorinv_id`) REFERENCES `investor` (`inv_id`),
  ADD CONSTRAINT `FKInvestor_s594948` FOREIGN KEY (`subscriptions_id`) REFERENCES `subscription` (`s_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FKpayment762041` FOREIGN KEY (`postpost_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FKpost197475` FOREIGN KEY (`Investorinv_id`) REFERENCES `investor` (`inv_id`),
  ADD CONSTRAINT `create_post` FOREIGN KEY (`Farmerfarm_id`) REFERENCES `farmer` (`farm_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `FKstatus268085` FOREIGN KEY (`Investorinv_id`) REFERENCES `investor` (`inv_id`),
  ADD CONSTRAINT `update_status` FOREIGN KEY (`Farmerfarm_id`) REFERENCES `farmer` (`farm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
