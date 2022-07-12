-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2021 at 09:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-299`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `tourist_id` smallint(4) NOT NULL,
  `hotel_id` varchar(6) NOT NULL,
  `package_id` varchar(10) NOT NULL,
  `transport_id` varchar(6) NOT NULL,
  `transaction_id` varchar(7) NOT NULL,
  `transport_type` varchar(15) NOT NULL,
  `num_person` smallint(3) NOT NULL,
  `travel_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `guide_id` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cardinfo`
--

CREATE TABLE `cardinfo` (
  `card_no` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `exp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` varchar(3) NOT NULL,
  `city_name` varchar(10) NOT NULL,
  `city_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_image`) VALUES
('bar', 'Barisal', 'barisal.jpg'),
('ctg', 'Chittagong', 'cox_bazar.jpg'),
('dhk', 'Dhaka', 'dhaka.jpg'),
('khl', 'Khulna', 'sundarbans_pic.jpg'),
('rng', 'Rangamati', 'rangamati.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` smallint(4) NOT NULL,
  `guide_lastName` varchar(25) NOT NULL,
  `guide_firstName` varchar(25) NOT NULL,
  `guide_email` varchar(32) NOT NULL,
  `guide_phone` bigint(11) NOT NULL,
  `guide_address` varchar(50) NOT NULL,
  `guide_password` varchar(12) NOT NULL,
  `guide_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` varchar(6) NOT NULL,
  `hotel_stars` smallint(5) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_address` varchar(90) NOT NULL,
  `hotel_cost` decimal(10,2) NOT NULL,
  `city_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_stars`, `hotel_name`, `hotel_address`, `hotel_cost`, `city_id`) VALUES
('1', 5, 'Pan Pacific Sonargaon Dhaka', '107 Kazi Nazrul Islam Ave, Dhaka 1215', '8418.00', 'dhk'),
('10', 3, 'Aronnak Holiday Resort', 'N 106', '2000.00', 'rng'),
('11', 3, 'Hill Taj Resort', 'C O. Office Ghat, Furfura Tila Rangamati, Hill Tracts, Chittagong, 4500', '2500.00', 'rng'),
('12', 3, 'Hotel Castle Salam', 'G-8 Taltola Lane, KDA Avenue, Khulna 9000', '5000.00', 'khl'),
('13', 5, 'City Inn Ltd.', 'B, 1 Majid Sarani, Khulna 9100', '7000.00', 'khl'),
('2', 4, 'Asia Pacific Hotel', 'House# 02, Road # 02 Block # K Baridhara Diplomatic Zone, Dhaka 1212', '6846.00', 'dhk'),
('3', 4, 'Coventina Lake Suites', 'House- 28, Road- 113, Lake Shore Dr, Dhaka 1212', '8573.00', 'dhk'),
('4', 4, 'Well Park Residence', 'Road # 01, Plot # 02, O.R. Nizam Rd, Chattogram 4200', '5452.00', 'ctg'),
('5', 4, 'The Avenue Hotel & Suites', 'Ispahani Moor, Lalkhan Bazar, Chattogram 4150', '6585.00', 'ctg'),
('6', 2, 'Executive Residence', '2nd floor, Jiban Bima Bhaban, 1053, Sheikh Mujib Road,Agrabad, Chattogram', '2993.00', 'ctg'),
('7', 3, 'Hotel Grand Park Barisal', 'Bell\'s Park, Band Road, Barishal 8200', '29569.00', 'bar'),
('8', 4, 'Hotel Sedona International', 'Sadar Rd, Barishal', '5000.00', 'bar'),
('9', 3, 'Hotel Moti Mahal', 'Reserve Bazar', '1555.00', 'rng');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` varchar(10) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `attractions` varchar(100) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `duration` smallint(3) NOT NULL,
  `package_cost` decimal(10,2) NOT NULL,
  `hotel_id` varchar(6) DEFAULT NULL,
  `city_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `attractions`, `destination`, `duration`, `package_cost`, `hotel_id`, `city_id`) VALUES
('bar01', 'Barisal Tour 1', 'Guthia Mosque, Bibir Pukur, Barisal Muktijoddha Park', 'Barisal', 6, '8000.00', '7', 'bar'),
('bar02', 'Barisal Tour 2', 'Lalkhutia Zomindar Bari, Durga Sagar', 'Barisal', 5, '7000.00', '8', 'bar'),
('ctg01', 'Chittagong Tour 1', 'Patenga beach, Foy\'s Lake, Ethnological Museum', 'Chittagong', 11, '25000.00', '4', 'ctg'),
('ctg02', 'Chittagong Tour 2', 'Chittagong Zoo, Parki Beach, Chittagong war cemetery', 'Chittagong', 9, '15000.00', '5', 'ctg'),
('ctg03', 'Chittagong Tour 3', 'Zia Memorial Museum, Foy\'s Lake Amusement World, Bayezid Bostami Mazar', 'Chittagong', 7, '10000.00', '6', 'ctg'),
('dhk01', 'Dhaka Tour 1', 'Ahsan Monzil, Lalbagh Fort, Armenian Church', 'Dhaka', 10, '20000.00', '1', 'dhk'),
('dhk02', 'Dhaka Tour 2', 'Star Mosque, Dhakeshwari Mondir, Sadarghat', 'Dhaka', 7, '15000.00', '2', 'dhk'),
('dhk03', 'Dhaka Tour 3', 'Parliament building, Bait Ur Rouf Mosque, Liberation War Museum', 'Dhaka', 6, '12000.00', '3', 'dhk'),
('khl01', 'Khulna Tour 1', 'Khan Jahan Ali, Shahid Hadis park, Khulna Divisional Museum', 'Khulna', 8, '11000.00', '12', 'khl'),
('khl02', 'Khulna Tour 2', 'Mujgunni Park Lake, Pithavoge Rabindra Memorial Complex, Govt. B.L. College Shahid Minar\r\n', 'Khulna', 10, '9000.00', '13', 'khl'),
('rng01', 'Rangamati Tour 1', 'Paulwell Park, Hanging Bridge', 'Rangamati', 4, '7000.00', '9', 'rng'),
('rng02', 'Rangamati Tour 2', 'Rajbana Vihara, Hanging Bridge', 'Rangamati', 4, '7000.00', '10', 'rng'),
('rng03', 'Rangamati Tour 3', 'Love point, Furomon Hill', 'Rangamati', 3, '6000.00', '11', 'rng');

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `tourist_id` smallint(4) NOT NULL,
  `tourist_lastName` varchar(25) NOT NULL,
  `tourist_firstName` varchar(25) NOT NULL,
  `tourist_email` varchar(32) NOT NULL,
  `tourist_phone` bigint(11) NOT NULL,
  `tourist_address` varchar(50) NOT NULL,
  `tourist_card_no` varchar(16) NOT NULL,
  `tourist_image` varchar(1000) DEFAULT NULL,
  `tourist_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`tourist_id`, `tourist_lastName`, `tourist_firstName`, `tourist_email`, `tourist_phone`, `tourist_address`, `tourist_card_no`, `tourist_image`, `tourist_password`) VALUES
(1, 'tuki', 'tuk', 'shithi1@gmail.com', 1533036514, 'dhaka', '1235467898765432', NULL, 'peeppeep'),
(2, 'lol', 'hello', 'shithi12d@gmail.com', 1533036527, 'dhaka', '1235467898765438', NULL, 'peeppeep'),
(3, 'd', 's', 'sd@gmail.com', 1213293421, 'asd', '131Gvas', NULL, 'as');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(7) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transport_id` varchar(6) NOT NULL,
  `transport_type` varchar(30) NOT NULL,
  `transport_name` varchar(25) NOT NULL,
  `transport_route` varchar(50) NOT NULL,
  `transport_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tourist_id` (`tourist_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `login_ibfk_1` (`guide_id`);

--
-- Indexes for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD PRIMARY KEY (`card_no`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD UNIQUE KEY `guide_email` (`guide_email`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`tourist_id`),
  ADD UNIQUE KEY `tourist_email` (`tourist_email`),
  ADD UNIQUE KEY `tourist_card_no` (`tourist_card_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `tourist_id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourist_id`) REFERENCES `tourist` (`tourist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
