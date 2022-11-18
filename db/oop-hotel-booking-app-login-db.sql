-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 07:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop-hotel-booking-app-login-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name_guest` varchar(100) NOT NULL,
  `name_hotel` varchar(1000) NOT NULL,
  `hotel_description` varchar(10000) NOT NULL,
  `price_per_night` int(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `guest_stay` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `num_of_guests` int(100) NOT NULL,
  `image_hotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `name_guest`, `name_hotel`, `hotel_description`, `price_per_night`, `check_in_date`, `check_out_date`, `placed_on`, `guest_stay`, `price`, `num_of_guests`, `image_hotel`) VALUES
(84, 17, 'Duane', 'Bushmans Kloof Wilderness Reserve Wellness Retreat', '', 494, '2022-11-18', '2022-11-21', '2022-11-18', 3, 988, 2, 'Bushmans-Kloof-south-africa-prod.jpg'),
(91, 17, '', 'Bushmans Kloof Wilderness Reserve Wellness Retreat', '', 494, '0000-00-00', '0000-00-00', '2022-11-18', 0, 0, 0, 'Bushmans-Kloof-south-africa-prod.jpg'),
(93, 17, 'test', 'Steenberg Farm', '', 209, '2022-11-08', '2022-11-30', '2022-11-18', 22, 627, 3, 'steenberg-farm-cape-town-p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name_guest` varchar(1000) NOT NULL,
  `name_hotel` varchar(100) NOT NULL,
  `hotel_description` varchar(1000) NOT NULL,
  `image_hotel` varchar(10000) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address_guest` varchar(500) NOT NULL,
  `total_nights` varchar(1000) NOT NULL,
  `number_guests_staying` int(100) NOT NULL,
  `price_per_night` int(255) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `name_guest`, `name_hotel`, `hotel_description`, `image_hotel`, `number`, `email`, `method`, `address_guest`, `total_nights`, `number_guests_staying`, `price_per_night`, `total_price`, `placed_on`, `payment_status`, `check_in_date`, `check_out_date`) VALUES
(1, 123, 'Jimmy!', 'Happy Holiday inn', '', '', '2', 'test@test', 'card', 'city Rhlea', '\r\n4', 0, 0, 400, 'placed on', 'completed', '2022-11-16', '2022-11-18'),
(3, 5, 'Camilla', 'Palm Springs', '', '', '3', 'test@test', 'card', 'home', '4', 0, 0, 300, 'today', 'completed', '2022-11-01', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(100) NOT NULL,
  `name_hotel` varchar(100) NOT NULL,
  `price_per_night` int(100) NOT NULL,
  `image_hotel` varchar(255) NOT NULL,
  `hotel_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name_hotel`, `price_per_night`, `image_hotel`, `hotel_description`) VALUES
(32, 'Steenberg Farm', 209, 'steenberg-farm-cape-town-p.jpg', 'Travellers regularly vote Steenberg – a luxury hotel situated in Constantia, the closest wine-growing region to Cape – as their favourite luxury hotel in Africa, and with good reason. Renovations have been sensitive to its 17th-century roots, but contemporary facilities, such as a pool, mean it\'s a cut above. '),
(34, 'Bushmans Kloof Wilderness Reserve Wellness Retreat', 494, 'Bushmans-Kloof-south-africa-prod.jpg', 'Bushmans Kloof is a study in luxury, situated in the heart of the scarred and impenetrable Cederberg Mountains. It effortlessly harnesses the unique feel of this beautiful part of the world into a bespoke African experience like no other, through its themed dining experiences.'),
(36, 'The Oyster Box', 354, 'oyster-box-southafrica-p.jpg', 'The porters wear pith helmets, even in the summer heat, at this South African institution. But with its friendly ambience, and zeal for Durban cuisine and KwaZulu art, in all their colour and spice, it is more quirky than imposing grande dame. '),
(37, 'Camissa House', 329, 'camissa-house-cape-town-p.jpg', 'With Table Mountain in your back garden and the city at your feet, this eight-room “house hotel” combines an enviable location with sumptuous décor, on-point service and a relaxing atmosphere; the kind that invites padding about barefoot, and helping yourself to the fridge. '),
(50, 'Lekkerwater Beach Lodge', 169, 'la-residence-south-africa-p.jpg', 'Lekkerwater Beach Lodge perches above the pearly sands and dolphin-studded waves of De Hoop Nature Reserve, just under four hours from Cape Town. Whales are the big draw but throw in spotless wild beaches, fynbos-swathed hills, delicious food and top-notch wine and you’ve got one of the country\'s best beach retreats. '),
(51, 'test hotel', 7, 'bunny.jpg', '7');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 16, 'test', 'test@test', '666666666498', 'test'),
(3, 16, 'test', 'test@test', '1233', 'test'),
(4, 17, 'testhello', 'hello@hello', '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(12, 'guest', 'guest@guest', '084e0343a0486ff05530df6c705c8bb4', 'user'),
(13, 'guest2', 'guest@guest', 'c4e799fad53c0dec94d4f201a4dd5e78', 'user'),
(14, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(15, 'guest3', 'guest@guest', '800e07f96539ce15ae6bf604dd9cc73f', 'user'),
(16, 'guest1', 'guest@guest', '15dac3875ad0f994a832043be841dc7e', 'user'),
(17, 'test', 'test@test', '098f6bcd4621d373cade4e832627b4f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
