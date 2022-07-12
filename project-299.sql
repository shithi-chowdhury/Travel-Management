-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 12:30 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
  `booking_id` int(11) UNSIGNED NOT NULL,
  `tourist_id` smallint(4) UNSIGNED NOT NULL,
  `hotel_id` varchar(6) NOT NULL,
  `package_id` varchar(10) NOT NULL,
  `transport_id` varchar(6) DEFAULT NULL,
  `num_person` smallint(3) NOT NULL,
  `travel_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `guide_id` smallint(4) UNSIGNED NOT NULL,
  `pm_id` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `tourist_id`, `hotel_id`, `package_id`, `transport_id`, `num_person`, `travel_date`, `guide_id`, `pm_id`) VALUES
(3, 3, '1', 'dhk01', 'AIR002', 4, '2021-04-27 18:00:00', 1, NULL),
(4, 3, '1', 'dhk01', 'AIR002', 4, '2021-05-02 07:38:56', 1, 'p'),
(5, 3, '7', 'bar01', 'AIR005', 1, '2021-05-02 07:52:38', 2, 'p'),
(6, 3, '1', 'dhk01', 'AIR002', 1, '2021-05-02 10:40:59', 1, 'p'),
(7, 3, '2', 'dhk02', 'AIR002', 4, '2021-05-07 15:11:21', 1, 'p'),
(8, 3, '2', 'dhk02', 'AIR002', 1, '2021-05-10 14:09:20', 1, 'p'),
(9, 3, '3', 'dhk03', 'AIR002', 1, '2021-05-10 14:11:11', 1, 'p'),
(10, 3, '7', 'bar01', 'AIR005', 1, '2021-05-10 14:10:21', 2, 'p'),
(11, 3, '2', 'dhk02', 'AIR002', 1, '2021-05-10 14:12:05', 1, 'p'),
(12, 3, '1', 'dhk01', 'AIR002', 1, '2021-05-10 14:12:26', 1, 'p'),
(13, 3, '2', 'dhk02', 'AIR002', 1, '2021-05-10 14:14:45', 1, 'p'),
(14, 3, '3', 'dhk03', 'AIR002', 1, '2021-05-10 14:15:17', 1, 'p'),
(15, 3, '2', 'dhk02', 'AIR002', 1, '2021-05-10 14:15:35', 1, 'p'),
(16, 2, '18', 'raj01', 'BUS016', 1, '2021-05-27 18:00:00', 4, 'u');

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
('ban', 'Bandarban', 'bandarban.jpg'),
('bar', 'Barisal', 'barisal.jpg'),
('com', 'Comilla', 'Comilla.jpg'),
('ctg', 'Chittagong', 'cox_bazar.jpg'),
('dhk', 'Dhaka', 'dhaka.jpg'),
('khl', 'Khulna', 'sundarbans_pic.jpg'),
('mym', 'Mymensingh', 'mymensingh.jpg'),
('raj', 'Rajshahi', 'rajshahi.jpg'),
('ran', 'Rangpur', 'rangpur.jpg'),
('rng', 'Rangamati', 'rangamati.jpg'),
('syl', 'Sylhet', 'Sylhet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` smallint(3) UNSIGNED NOT NULL,
  `food_name` varchar(25) NOT NULL,
  `food_price` decimal(6,2) NOT NULL,
  `food_description` varchar(150) NOT NULL,
  `food_image` varchar(1000) NOT NULL,
  `restaurant_id` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `food_description`, `food_image`, `restaurant_id`) VALUES
(1, 'Pizza', '300.00', 'This is good food. Made with chicken.', 'pizza.jpg', 1),
(2, 'Burger', '240.00', 'Made with chicken.', 'burger.jpg', 3),
(3, 'French Fry', '100.00', 'Less oily.', 'french_fries.jpg', 2),
(4, 'Speghatti', '300.00', 'Italian style.', 'speghatti.jpg', 1),
(5, 'Fried Rice', '300.00', 'Less oily. Made with chicken, egg and mashrooms.', 'fried_rice.jpg', 1),
(6, 'Pancake', '100.00', 'Comes with honey.', 'pancake.jpg', 2),
(7, 'Ice Cream', '150.00', 'Very tasty', 'ice_cream.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` smallint(4) UNSIGNED NOT NULL,
  `guide_lastName` varchar(25) NOT NULL,
  `guide_firstName` varchar(25) NOT NULL,
  `guide_email` varchar(32) NOT NULL,
  `guide_phone` bigint(11) NOT NULL,
  `guide_address` varchar(50) NOT NULL,
  `guide_password` varchar(12) NOT NULL,
  `guide_image` varchar(1000) DEFAULT NULL,
  `city_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guide_id`, `guide_lastName`, `guide_firstName`, `guide_email`, `guide_phone`, `guide_address`, `guide_password`, `guide_image`, `city_id`) VALUES
(1, 'Ahmed', 'Shafique', 'shafiqueahmed@gmail.com', 1218312731, '10/I, Monirul villa, Dhaka', 'qw', NULL, 'dhk'),
(2, 'Ullah', 'Habib', 'habibullah@gmail.com', 1218314562, '100/I, Moni villa, Barisal', 'we', NULL, 'bar'),
(3, 'Akib', 'Rahat', 'rahatakib@gmail.com', 1218314125, '99/A, Natok ghor, Rangpur', 'asd', NULL, 'rng'),
(4, 'Rahul', 'Chowdhury', 'rahulC@gmail.com', 1214314125, '95/A, Azimpur, Chittagong', 'dsa', NULL, 'ctg'),
(5, 'Maruf', 'Ahsan', 'maruf@gmail.com', 1745414125, '5/A, Rakhalpara, Khulna', 'tars', NULL, 'khl');

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
  `city_id` varchar(3) NOT NULL
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
('14', 3, 'Hotel Noorjahan Grand', 'Waves 1, Ritz Tower, Dargah Gate, Sylhet City 3100 Bangladesh', '3000.00', 'syl'),
('15', 4, 'Hotel Skypark', 'Chowmohana, Sreemangal, Moulvibazar., 3210 Sreemangal, Bangladesh ', '2115.00', 'syl'),
('16', 3, 'Hill Side Resort  Milonchhori', 'Chimbuk Road 4 kilometers from Bandarban town, Bandarban 1217 Bangladesh', '1500.00', 'ban'),
('17', 5, 'Sairu Hill Resorts', 'Baro Mile, Chimbuk Road, Y Junction Shualock, Bandarban 4600 Bangladesh', '3000.00', 'ban'),
('18', 3, 'Parjatan Motel', 'Abdul Majid Road, off Nawabganj Road, Rajshahi City Bangladesh', '1550.00', 'raj'),
('19', 3, 'Hotel Le Merian', 'Dhaka Road,Bypass Circle, Digharkanda, Mymensingh 2200 · 105.95 km', '1500.00', 'mym'),
('2', 4, 'Asia Pacific Hotel', 'House# 02, Road # 02 Block # K Baridhara Diplomatic Zone, Dhaka 1212', '6846.00', 'dhk'),
('20', 3, 'Hotel Victory Abashik Cumilla', 'Jahangir Jam Jam Tower(7th,8th Floor), Victoria College Rd, Kandirpar, Comilla, 3500, Bang', '1770.00', 'com'),
('21', 3, 'Caspia The Home', 'Cantonment Rd, Rangpur, Rangpur Division, 5400, Bangladesh', '2000.00', 'ran'),
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
  `hotel_id` varchar(6) NOT NULL,
  `city_id` varchar(3) NOT NULL,
  `guide_id` smallint(4) UNSIGNED NOT NULL,
  `package_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `attractions`, `destination`, `duration`, `package_cost`, `hotel_id`, `city_id`, `guide_id`, `package_image`) VALUES
('ban01', 'Bandarban Tour 1', 'Chimbuk Hill , Nilgiri hill and Thanchi, Nilachol', 'Bandarban', 4, '6000.00', '17', 'ban', 1, 'bandp1.jpg'),
('ban02', 'Bandarban Tour 2', 'Amiakhum, Nafakhum, Boga Lake, Buddha Dhatu Jadi , Shangu River', 'Bandarban', 4, '6000.00', '17', 'ban', 3, 'bandp2.jpg'),
('bar01', 'Barisal Tour 1', 'Guthia Mosque, Bibir Pukur, Barisal Muktijoddha Park', 'Barisal', 6, '8000.00', '7', 'bar', 2, 'guthia_mosque.jpg'),
('bar02', 'Barisal Tour 2', 'Lalkhutia Zomindar Bari, Durga Sagar', 'Barisal', 5, '7000.00', '8', 'bar', 2, 'durga_sagar.jpg'),
('com01', 'Comilla Tour 1', 'Maynamati ruins, Shalban Bihar, Dharmasagar Pond, Magic Paradise Park', 'Comillla', 2, '4000.00', '20', 'com', 5, 'Comillap.jpg'),
('ctg01', 'Chittagong Tour 1', 'Patenga beach, Foy\'s Lake, Ethnological Museum', 'Chittagong', 11, '25000.00', '4', 'ctg', 4, 'patenga.jpg'),
('ctg02', 'Chittagong Tour 2', 'Chittagong Zoo, Parki Beach, Chittagong war cemetery', 'Chittagong', 9, '15000.00', '5', 'ctg', 4, 'parki_beach.jpg'),
('ctg03', 'Chittagong Tour 3', 'Zia Memorial Museum, Foy\'s Lake Amusement World, Bayezid Bostami Mazar', 'Chittagong', 7, '10000.00', '6', 'ctg', 4, 'foy\'s_lake.jpg'),
('dhk01', 'Dhaka Tour 1', 'Ahsan Monzil, Lalbagh Fort, Armenian Church', 'Dhaka', 10, '20000.00', '1', 'dhk', 1, 'ahsan_manzil.jpg'),
('dhk02', 'Dhaka Tour 2', 'Star Mosque, Dhakeshwari Mondir, Sadarghat', 'Dhaka', 7, '15000.00', '2', 'dhk', 1, 'dhakeshwari_temple.jpg'),
('dhk03', 'Dhaka Tour 3', 'Parliament building, Bait Ur Rouf Mosque, Liberation War Museum', 'Dhaka', 6, '12000.00', '3', 'dhk', 1, 'parliament.jpg'),
('khl01', 'Khulna Tour 1', 'Khan Jahan Ali, Shahid Hadis park, Khulna Divisional Museum', 'Khulna', 8, '11000.00', '12', 'khl', 5, 'hadis_park.jpg'),
('khl02', 'Khulna Tour 2', 'Mujgunni Park Lake, Pithavoge Rabindra Memorial Complex, Govt. B.L. College Shahid Minar\r\n', 'Khulna', 10, '9000.00', '13', 'khl', 5, 'prithavoge.jpg'),
('mym01', 'Mymensingh Tour 1 ', 'Muktagacha Jomidar Bari ,Bangladesh Agricultural University,Bangladesh institute of nuclear agricult', 'Mymensingh', 2, '4000.00', '19', 'mym', 2, 'mymp1.jpg'),
('raj01', 'Rajshahi Tour', 'Ramshagor Dighi,Kantajew Tample,Varendra Research Museum, Puthia Rajbari', 'Rajshahi', 3, '5000.00', '18', 'raj', 4, 'rajp.jpg'),
('ran01', 'Rangpur Tour 1', 'Tajhat palace, Vinnya Jagat, Rangpur Zoo,Kellaband Mosque', 'Rangpur', 3, '6500.00', '21', 'ran', 5, 'ranp1.jpg'),
('rng01', 'Rangamati Tour 1', 'Paulwell Park, Hanging Bridge', 'Rangamati', 4, '7000.00', '9', 'rng', 3, 'rangamati_hanging_Bridge.jpg'),
('rng02', 'Rangamati Tour 2', 'Rajbana Vihara, Hanging Bridge', 'Rangamati', 4, '7000.00', '10', 'rng', 3, 'rajbana_vihara.jpg'),
('rng03', 'Rangamati Tour 3', 'Love point, Furomon Hill', 'Rangamati', 3, '6000.00', '11', 'rng', 3, 'furomown_hill.png'),
('syl01', 'Sylhet Tour 1', 'Jaflong and Lalakhal, keane Bridge, Dargashariff,Bisanakandi, Ratargul Swamp Forest', 'Sylhet', 3, '5500.00', '14', 'syl', 2, 'sylhetp.jpg'),
('syl02', 'Sylhet Tour 2', 'Lawachhara National Park, Hakaluki Haor, Sreemangal Tea Garden, Madhabkundu, Baikka Beel', 'Sylhet', 3, '6550.00', '15', 'syl', 5, 'sylhet2p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `pm_id` varchar(1) NOT NULL,
  `pm_name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`pm_id`, `pm_name`) VALUES
('p', 'Paid'),
('u', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` smallint(3) UNSIGNED NOT NULL,
  `restaurant_name` varchar(32) NOT NULL,
  `restaurant_email` varchar(40) NOT NULL,
  `restaurant_phone_number` bigint(11) NOT NULL,
  `restaurant_address` varchar(100) NOT NULL,
  `restaurant_description` varchar(300) NOT NULL,
  `restaurant_password` varchar(16) NOT NULL,
  `city_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_email`, `restaurant_phone_number`, `restaurant_address`, `restaurant_description`, `restaurant_password`, `city_id`) VALUES
(1, 'Test', 'test@gmail.com', 1214547841, 'asdasd', 'asdasd', 'a', 'khl'),
(2, 'Test2', 'test2@gmail.com', 1214547745, 'asdasda', 'asdasdasd', 'asd', 'dhk'),
(3, 'Test3', 'test3@gmail.com', 1214545555, 'asdasdqwe', 'asdasdaxcasxd', 'as', 'dhk');

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `tourist_id` smallint(4) UNSIGNED NOT NULL,
  `tourist_lastName` varchar(25) NOT NULL,
  `tourist_firstName` varchar(25) NOT NULL,
  `tourist_email` varchar(32) NOT NULL,
  `tourist_phone` bigint(11) NOT NULL,
  `tourist_address` varchar(50) NOT NULL,
  `tourist_image` varchar(1000) DEFAULT NULL,
  `tourist_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`tourist_id`, `tourist_lastName`, `tourist_firstName`, `tourist_email`, `tourist_phone`, `tourist_address`, `tourist_image`, `tourist_password`) VALUES
(1, 'tuki', 'tuk', 'shithi1@gmail.com', 1533036514, 'dhaka', NULL, 'peeppeep'),
(2, 'lol', 'hello', 'shithi12d@gmail.com', 1533036527, 'dhaka', NULL, 'peeppeep'),
(3, 'd', 's', 'sd@gmail.com', 1213293421, 'asd', NULL, 'as');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(7) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL,
  `booking_id` int(11) UNSIGNED NOT NULL,
  `phone_number` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_date`, `amount`, `booking_id`, `phone_number`) VALUES
('123asdq', '2021-05-12 18:00:00', '2400.00', 10, 1712312121),
('asdasdq', '2021-05-11 18:00:00', '4500.00', 14, 1712332142),
('asdq12w', '2021-05-03 18:00:00', '24000.00', 4, 1712333256),
('asdq131', '2021-05-11 18:00:00', '2400.00', 5, 1712332142),
('asdqcaz', '2021-05-10 18:00:00', '3600.00', 8, 1712332142),
('asdqcx1', '2021-05-18 18:00:00', '6000.00', 12, 1712332653),
('asqasqq', '2021-05-04 18:00:00', '6000.00', 6, 1712332142),
('asxdasd', '2021-05-11 18:00:00', '4500.00', 13, 1712332142),
('bnas218', '2021-05-18 18:00:00', '18000.00', 7, 1712332142),
('qerq3r1', '2021-05-10 18:00:00', '4500.00', 9, 1712333256);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transport_id` varchar(6) NOT NULL,
  `transport_type` varchar(30) NOT NULL,
  `transport_name` varchar(60) NOT NULL,
  `to` varchar(60) NOT NULL,
  `transport_price` decimal(10,2) NOT NULL,
  `fr_om` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_type`, `transport_name`, `to`, `transport_price`, `fr_om`) VALUES
('AIR001', 'Air', 'BD AIR', 'Coxs Bazar', '4000.00', 'Dhaka'),
('AIR002', 'Air', 'BD AIR', 'Dhaka ', '4000.00', 'Chittagong'),
('AIR005', 'Air', 'BD AIR', 'Barisal', '4000.00', 'Dhaka'),
('BUS001', 'Bus', 'Nabil Paribahan', ' Dinajpur', '650.00', 'Dhaka'),
('BUS002', 'Bus', 'Haque Enterprise', 'Dhaka', '550.00', 'Rajshahi'),
('BUS003', 'Bus', 'Hanif Enterprise', 'Comilla', '800.00', 'Dhaka'),
('BUS004', 'Bus', 'Hanif Enterprise', 'Bandarban', '1000.00', 'Dhaka'),
('BUS005', 'Bus', 'Shohagh Paribahan', 'Dhaka', '800.00', 'Chittagong'),
('BUS006', 'Bus', 'Ena Transport', 'Chittagong', '1500.00', 'Dhaka'),
('BUS007', 'Bus', 'Akota Transport', 'Dhaka', '480.00', 'Rajshahi'),
('BUS008', 'Bus', 'Hanif Enterprise', 'Sylhet', '600.00', 'Dhaka'),
('BUS009', 'Bus', 'Shohagh Paribahan', 'Bandarban', '650.00', 'Dhaka'),
('BUS010', 'Bus', 'Diganta Paribahan', 'Khulna', '500.00', 'Dhaka'),
('BUS011', 'Bus', 'Ena Transport', 'Mymensingh', '750.00', 'Dhaka'),
('BUS012', 'Bus', 'Royal Coach', 'Rajshahi', '500.00', 'Dhaka'),
('BUS013', 'Bus', 'Hanif Enterprise', 'Rangpur', '650.00', 'Dhaka'),
('BUS014', 'Bus', 'StarLine Bus', 'Dhaka', '400.00', 'Comilla'),
('BUS015', 'Bus', 'Hanif Enterprise', ' Srimangal', '380.00', 'Dhaka'),
('BUS016', 'Bus', 'Green Line', 'Rajshahi', '800.00', 'Dhaka'),
('WTR002', 'Water', 'Sundarban 10', 'Barisal', '3000.00', 'Dhaka'),
('WTR003', 'Water', 'KOKO 5', 'Dhaka', '3000.00', 'Bhola');

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
  ADD KEY `package_id` (`package_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `guide_id` (`guide_id`),
  ADD KEY `pm_id` (`pm_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `city_id` (`city_id`);

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
  ADD KEY `city_id` (`city_id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`tourist_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `booking_id` (`booking_id`);

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
  MODIFY `booking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `tourist_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourist_id`) REFERENCES `tourist` (`tourist_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`),
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`),
  ADD CONSTRAINT `booking_ibfk_6` FOREIGN KEY (`pm_id`) REFERENCES `payment_status` (`pm_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

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
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `package_ibfk_3` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
