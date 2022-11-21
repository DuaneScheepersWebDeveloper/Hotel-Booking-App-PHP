-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 07:43 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name_guest` varchar(1000) NOT NULL,
  `name_hotel` varchar(100) NOT NULL,
  `image_hotel` varchar(10000) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address_guest` varchar(500) NOT NULL,
  `total_nights` varchar(1000) NOT NULL,
  `num_of_guests` int(100) NOT NULL,
  `price_per_night` int(255) NOT NULL,
  `total_bookings` int(255) NOT NULL,
  `guest_stay` int(254) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `name_guest`, `name_hotel`, `image_hotel`, `number`, `email`, `method`, `address_guest`, `total_nights`, `num_of_guests`, `price_per_night`, `total_bookings`, `guest_stay`, `total_price`, `placed_on`, `payment_status`, `check_in_date`, `check_out_date`) VALUES
(1, 123, 'Jimmy!', 'Happy Holiday inn', '', '2', 'test@test', 'card', 'city Rhlea', '\r\n4', 0, 0, 0, 0, 400, 'placed on', 'completed', '2022-11-16', '2022-11-18'),
(3, 5, 'Camilla', 'Palm Springs', '', '3', 'test@test', 'card', 'home', '4', 0, 0, 0, 0, 300, 'today', 'completed', '2022-11-01', '2022-11-25'),
(7, 17, 'test', '', '', '12324', 'test@test', 'flat no. 1, 1, test, test - 1234', 'cash on delivery', '', 0, 0, 0, 0, 4940, '20-Nov-2022', 'pending', '0000-00-00', '0000-00-00'),
(8, 17, '5', 'Lekkerwater Beach Lodge', '', '5', 'test@test', 'flat no. 2, 2, 2, 2 - 2', 'paypal', '', 1, 0, 0, 11, 1859, '20-Nov-2022', '', '0000-00-00', '0000-00-00'),
(9, 17, 'Debbie Scheepers', 'Camissa House', '', '12345', 'test@test', 'cash on delivery', 'flat no. 02, test, test, test - 12345', '', 4, 0, 0, 4, 1316, '20-Nov-2022', 'completed', '0000-00-00', '0000-00-00');

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
(52, 'Labotessa', 306, 'labotesa-cape-town-south-africa-p.jpg', 'A seven-key boutique hotel which balances old-world charm and on-point style: space and the height of chic in suites which feel like your own private pieds à terre in the CBD. One of the oldest addresses in South Africa, dating back to the 17th century, Labotessa lends an air of European townhouse to Church Square.'),
(53, 'Compass House Bantry Bay, Cape Town, South Africa ', 289, 'compass-house-south-africa-p.jpg', '\r\n\r\nA gem that manages to combine the standards of a boutique five-star hotel with the kind of relaxed intimacy and personal service of a well-staffed private house. Mesmerising views and an atmosphere worth forfeiting the day’s sightseeing. Because why go looking, when everything you want is right here.'),
(54, 'Emily Moon River Lodge', 190, 'emily-moon-river-lodge-south-africa-p (1).jpg', 'This nature-lover’s lair, comprising 16 cottage-suites built on a ridge overlooking the snaking Bitou River, is located just a few minutes from Plettenberg Bay. Beautiful views are augmented by eclectic contemporary Afro-chic décor, making this the best-value luxury lodge on the Garden Route. '),
(55, 'Tintswalo Atlantic', 352, 'tintswalo-atlantic-cape-town-p.jpg', 'Tintswalo is the only luxury Cape Town hotel located within Table Mountain National Park. At the base of precipitous Chapman’s Peak, it enjoys the most sublime location in the city, right on the ocean, with mesmerising views, excellent food and authentic, warm service. '),
(56, 'Mont Rochelle', 268, 'mont-rochelle-franschhoek-south-africa-room-p.jpg', 'The only bad thing about this great hotel is that it is so often fully booked. Perched on a vine-clad hillock with fabulous 360-degree mountain views, it has the most enviable position in Franschhoek, with beautiful gardens, décor that is both classy and hip, faultless service and generous extras.'),
(57, 'MannaBay', 166, 'manna-bay-cape-town-p.jpg', 'This tiny luxurious Cape Town hotel, located high on the slopes of Table Mountain, offers superb city and mountain views, an intimate atmosphere, highly personal service and generous touches such as complimentary high tea, house drinks, dinner and airport transfers.'),
(58, 'Delaire Graff Estate', 925, 'delaire-graff-estate-stellenbosch-p.jpg', 'An experience rather than a mere hotel, with a drive that sweeps upwards through a pristine garden to arrive at what is arguably the Cape’s most stupendous mountain view. Kudos to owner Graff that the art, design, wine, dining and service draw superlatives in equal measure.');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
