-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvshows`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Shishir', 'shishir@gmail.com', 'shishir123');

-- --------------------------------------------------------

--
-- Table structure for table `myshows`
--

CREATE TABLE `myshows` (
  `myshow_id` int(255) NOT NULL,
  `myshow_name` varchar(255) NOT NULL,
  `mychannel` varchar(255) NOT NULL,
  `mycategory` varchar(255) NOT NULL,
  `mytime` varchar(255) NOT NULL,
  `myday` varchar(255) NOT NULL,
  `myschedule` varchar(255) NOT NULL,
  `myshow_img` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `show_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myshows`
--

INSERT INTO `myshows` (`myshow_id`, `myshow_name`, `mychannel`, `mycategory`, `mytime`, `myday`, `myschedule`, `myshow_img`, `rating`, `show_id`, `user_id`) VALUES
(1, 'Graduate', 'NTV', 'Serial Drama', '08:45', 'tuesday,wednesday', 'Morning', 'show-60a8ca5d7388a1.18374940.jpg', 0, 3, 11),
(2, 'Ek shobdhe Quran Shikkhar Ashor', 'NTV', 'Islamic Show', '05:25', 'everyday', 'Night', 'show-60a8cefa688078.63349743.jpg', 0, 9, 11),
(3, 'Astro Boy', 'RTV', 'Cartoon', '20:30', 'saturday,wednesday,thursday', 'Night', 'show-60a8e9f2e28640.06219513.jpg', 0, 26, 11),
(4, 'Morning News', 'ATN Bangla', 'News', '07:00', 'everyday', 'Morning', 'show-60a9264194bb33.89353992.jpg', 0, 29, 11),
(5, 'Bow Jokhon Beautiful', 'Bangla Vision', 'Drama', '21:00', 'saturday', 'Night', 'show-60a92f05c20e09.13489846.jpg', 0, 39, 5),
(6, 'Bangla Vision Shongbaad', 'Bangla Vision', 'News', '19:30', 'everyday', 'Evening', 'show-60a92da6670802.06853950.jpg', 0, 37, 5),
(7, 'Megh Boleche Jabo Jabo', 'NTV', 'Serial Drama', '14:35', 'tuesday,wednesday,thursday', 'Noon', 'show-60a8ca20b2cc99.65814187.jpg', 0, 5, 5),
(8, 'Rater Khobor', 'NTV', 'News', '22:30', 'everyday', 'Night', 'show-60a8cbe87398c4.35790353.jpg', 0, 7, 5),
(9, 'Dupurer Khobor', 'NTV', 'News', '14:00', 'everyday', 'Noon', 'show-60a8cb854acf77.30519149.jpg', 0, 6, 5),
(10, 'Graduate', 'NTV', 'Serial Drama', '08:45', 'tuesday,wednesday', 'Morning', 'show-60a8ca5d7388a1.18374940.jpg', 0, 3, 6),
(11, 'Shastho Protidin', 'NTV', 'Health', '08:45', 'everyday', 'Morning', 'show-60a8c8aa2fcd57.71406280.jpg', 4, 4, 6),
(12, 'Megh Boleche Jabo Jabo', 'NTV', 'Serial Drama', '14:35', 'tuesday,wednesday,thursday', 'Noon', 'show-60a8ca20b2cc99.65814187.jpg', 3, 5, 6),
(13, 'Ek shobdhe Quran Shikkhar Ashor', 'NTV', 'Islamic Show', '05:25', 'everyday', 'Night', 'show-60a8cefa688078.63349743.jpg', 4, 9, 6),
(14, 'Buker Ba Pashe', 'NTV', 'Telefilm', '20:30', 'friday', 'Night', 'show-60a8d31ce53319.61993983.jpg', 4, 13, 6),
(15, 'Rater Khobor', 'NTV', 'News', '22:30', 'everyday', 'Night', 'show-60a8cbe87398c4.35790353.jpg', 4, 7, 7),
(16, 'Namta', 'Channel i', 'Movie', '14:10', 'friday', 'Noon', 'show-60a8d9782f7162.67828955.jpg', 5, 19, 7),
(17, 'Gaaner Bazar', 'NTV', 'Musical Show', '18:45', 'everyday', 'Evening', 'show-60a8d2254b8f88.58665902.jpg', 3, 12, 7),
(18, 'Tritiyo Matra', 'Channel i', 'Talk Show', '08:45', 'everyday', 'Morning', 'show-60a8d6a5b3c139.07597970.jpg', 4, 16, 7),
(20, 'Shobar Upore Prem', 'RTV', 'Movie', '15:00', 'friday', 'Noon', 'show-60a8ea96e68738.80930502.jpg', 2, 27, 7),
(21, 'Gaane Gaane Shokal Shuru', 'Channel i', 'Musical Show', '07:05', 'everyday', 'Morning', 'show-60a8d4db57e173.32703945.jpg', 4, 14, 8),
(22, 'Cinemar Gaan', 'Channel i', 'Musical Show', '12:05', 'everyday', 'Noon', 'show-60a8d784675c14.60595095.jpg', 3, 17, 8),
(23, 'Khacha', 'Channel i', 'Telefilm', '14:00', 'saturday', 'Noon', 'show-60a8d805797fd1.20563804.jpg', 3, 18, 8),
(24, 'Gol Table', 'RTV', 'Talk Show', '20:02', 'thursday', 'Night', 'show-60a8e9641593b4.60005584.jpg', 4, 25, 8),
(25, 'Dui Purush', 'ATN Bangla', 'Movie', '12:30', 'friday', 'Noon', 'show-60a926c87fa1b6.23293364.jpg', 5, 30, 8),
(26, 'Moha Shonggram', 'Bangla Vision', 'Movie', '12:05', 'friday', 'Noon', 'show-60a92c9ae55eb3.91552243.jpg', 4, 36, 9),
(27, 'Talimul Quaran', 'ATN Bangla', 'Islamic Show', '05:30', 'everyday', 'Morning', 'show-60a9259740d539.23329108.jpg', 5, 28, 9),
(28, 'Dhohon', 'ATN Bangla', 'Serial Drama', '20:00', 'everyday', 'Night', 'show-60a927ea8f9254.37819653.jpg', 3, 32, 9),
(29, 'Cinemar Gaan', 'Bangla Vision', 'Musical Show', '00:00', 'everyday', 'Night', 'show-60a92e47c3c0d3.84009782.jpg', 3, 38, 9),
(30, 'Bow Jokhon Beautiful', 'Bangla Vision', 'Drama', '21:00', 'saturday', 'Night', 'show-60a92f05c20e09.13489846.jpg', 4, 39, 9),
(31, 'Graduate', 'NTV', 'Serial Drama', '08:45', 'tuesday,wednesday', 'Morning', 'show-60a8ca5d7388a1.18374940.jpg', 4, 3, 10),
(32, 'Megh Boleche Jabo Jabo', 'NTV', 'Serial Drama', '14:35', 'tuesday,wednesday,thursday', 'Noon', 'show-60a8ca20b2cc99.65814187.jpg', 3, 5, 10),
(33, 'Dupurer Khobor', 'NTV', 'News', '14:00', 'everyday', 'Noon', 'show-60a8cb854acf77.30519149.jpg', 3, 6, 10),
(34, 'Rater Khobor', 'NTV', 'News', '22:30', 'everyday', 'Night', 'show-60a8cbe87398c4.35790353.jpg', 3, 7, 10),
(35, 'Namta', 'Channel i', 'Movie', '14:10', 'friday', 'Noon', 'show-60a8d9782f7162.67828955.jpg', 4, 19, 10),
(37, 'Graduate', 'NTV', 'Serial Drama', '08:45', 'tuesday,wednesday', 'Morning', 'show-60a8ca5d7388a1.18374940.jpg', 5, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tvshows`
--

CREATE TABLE `tvshows` (
  `show_id` int(255) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `show_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvshows`
--

INSERT INTO `tvshows` (`show_id`, `show_name`, `channel`, `time`, `day`, `schedule`, `category`, `show_img`) VALUES
(3, 'Graduate', 'NTV', '08:45', 'tuesday,wednesday', 'Morning', 'Serial Drama', 'show-60a8ca5d7388a1.18374940.jpg'),
(4, 'Shastho Protidin', 'NTV', '08:45', 'everyday', 'Morning', 'Health', 'show-60a8c8aa2fcd57.71406280.jpg'),
(5, 'Megh Boleche Jabo Jabo', 'NTV', '14:35', 'tuesday,wednesday,thursday', 'Noon', 'Serial Drama', 'show-60a8ca20b2cc99.65814187.jpg'),
(6, 'Dupurer Khobor', 'NTV', '14:00', 'everyday', 'Noon', 'News', 'show-60a8cb854acf77.30519149.jpg'),
(7, 'Rater Khobor', 'NTV', '22:30', 'everyday', 'Night', 'News', 'show-60a8cbe87398c4.35790353.jpg'),
(8, 'Ai Shomoi', 'NTV', '00:30', 'everyday', 'Night', 'Talk Show', 'show-60a8cdc2b1ec83.07880958.jpg'),
(9, 'Ek shobdhe Quran Shikkhar Ashor', 'NTV', '05:25', 'everyday', 'Night', 'Islamic Show', 'show-60a8cefa688078.63349743.jpg'),
(10, 'Koti Takar Kabin', 'NTV', '08:45', 'saturday', 'Morning', 'Movie', 'show-60a8cfe8160cf8.38676714.jpg'),
(12, 'Gaaner Bazar', 'NTV', '18:45', 'everyday', 'Evening', 'Musical Show', 'show-60a8d2254b8f88.58665902.jpg'),
(13, 'Buker Ba Pashe', 'NTV', '20:30', 'friday', 'Night', 'Telefilm', 'show-60a8d31ce53319.61993983.jpg'),
(14, 'Gaane Gaane Shokal Shuru', 'Channel i', '07:05', 'everyday', 'Morning', 'Musical Show', 'show-60a8d4db57e173.32703945.jpg'),
(15, 'Shokaler Shongbaad', 'Channel i', '08:00', 'everyday', 'Morning', 'News', 'show-60a8d5a20e48e1.47439102.jpg'),
(16, 'Tritiyo Matra', 'Channel i', '08:45', 'everyday', 'Morning', 'Talk Show', 'show-60a8d6a5b3c139.07597970.jpg'),
(17, 'Cinemar Gaan', 'Channel i', '12:05', 'everyday', 'Noon', 'Musical Show', 'show-60a8d784675c14.60595095.jpg'),
(18, 'Khacha', 'Channel i', '14:00', 'saturday', 'Noon', 'Telefilm', 'show-60a8d805797fd1.20563804.jpg'),
(19, 'Namta', 'Channel i', '14:10', 'friday', 'Noon', 'Movie', 'show-60a8d9782f7162.67828955.jpg'),
(20, 'Golden vai', 'Channel i', '20:45', 'tuesday,wednesday,thursday', 'Night', 'Serial Drama', 'show-60a8d9f97c9172.31766121.jpg'),
(22, 'Jibon Joti', 'RTV', '17:30', 'everyday', 'Afternoon', 'Islamic Show', 'show-60a8e730e15f78.06215996.jpg'),
(23, 'Cheating Master', 'RTV', '19:02', 'saturday,thursday', 'Evening', 'Serial Drama', 'show-60a8e7b1f33527.80445719.jpg'),
(24, 'Shomoier Golpo', 'RTV', '20:00', 'monday', 'Night', 'Telefilm', 'show-60a8e86d16a3d6.46731854.jpg'),
(25, 'Gol Table', 'RTV', '20:02', 'thursday', 'Night', 'Talk Show', 'show-60a8e9641593b4.60005584.jpg'),
(26, 'Astro Boy', 'RTV', '20:30', 'saturday,wednesday,thursday', 'Night', 'Cartoon', 'show-60a8e9f2e28640.06219513.jpg'),
(27, 'Shobar Upore Prem', 'RTV', '15:00', 'friday', 'Noon', 'Movie', 'show-60a8ea96e68738.80930502.jpg'),
(28, 'Talimul Quaran', 'ATN Bangla', '05:30', 'everyday', 'Morning', 'Islamic Show', 'show-60a9259740d539.23329108.jpg'),
(29, 'Morning News', 'ATN Bangla', '07:00', 'everyday', 'Morning', 'News', 'show-60a9264194bb33.89353992.jpg'),
(30, 'Dui Purush', 'ATN Bangla', '12:30', 'friday', 'Noon', 'Movie', 'show-60a926c87fa1b6.23293364.jpg'),
(31, 'Shustho Thakun', 'ATN Bangla', '18:15', 'everyday', 'Evening', 'Health', 'show-60a92757242620.34335782.jpg'),
(32, 'Dhohon', 'ATN Bangla', '20:00', 'everyday', 'Night', 'Serial Drama', 'show-60a927ea8f9254.37819653.jpg'),
(33, 'Onno Dristi', 'ATN Bangla', '00:30', 'everyday', 'Night', 'Talk Show', 'show-60a92854aa6ab9.99655105.jpg'),
(34, 'Khorkuta', 'Bangla Vision', '21:30', 'everyday', 'Night', 'Serial Drama', 'show-60a92a9b123ca0.16307215.jpg'),
(35, 'Din Protidin', 'Bangla Vision', '05:30', 'everyday', 'Morning', 'Talk Show', 'show-60a92b469f5158.83953933.jpg'),
(36, 'Moha Shonggram', 'Bangla Vision', '12:05', 'friday', 'Noon', 'Movie', 'show-60a92c9ae55eb3.91552243.jpg'),
(37, 'Bangla Vision Shongbaad', 'Bangla Vision', '19:30', 'everyday', 'Evening', 'News', 'show-60a92da6670802.06853950.jpg'),
(38, 'Cinemar Gaan', 'Bangla Vision', '00:00', 'everyday', 'Night', 'Musical Show', 'show-60a92e47c3c0d3.84009782.jpg'),
(39, 'Bow Jokhon Beautiful', 'Bangla Vision', '21:00', 'saturday', 'Night', 'Drama', 'show-60a92f05c20e09.13489846.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `mobile`, `profile`) VALUES
(5, 'Emma Clinton', 'emma@gmail.com', 'emmaemma1', '01872345231', 'profile-60a98345459b98.50156763.jpg'),
(6, 'Jack Sparrow', 'jack@gmail.com', 'jackjack1', '01378569011', 'profile-60a98394b07007.83050902.jpg'),
(7, 'Luke Rich', 'luke@gmail.com', 'lukeluke1', '01911336756', 'profile-60a983e808f479.60161160.jpeg'),
(8, 'Merry Kristina', 'merry@gmail.com', 'merrymerry1', '01734205522', 'profile-60a9842cee82d9.57138962.jpg'),
(9, 'Oscar Minguiza', 'oscar@gmail.com', 'oscaroscar1', '01625670012', 'profile-60a98493254ae9.58477451.jpg'),
(10, 'Richard Thompson', 'richard@gmail.com', 'richardrichard1', '01967855221', 'profile-60a984e5ac5624.94240625.jpg'),
(11, 'Robert Jackson', 'robert@gmail.com', 'robertrobert1', '01575114538', 'profile-60a985237a04d2.06025824.jpg'),
(12, 'Ariful Islam', 'ariful@gmail.com', 'arifulariful1', '01575114538', 'profile-60ad759ea682b2.23502290.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myshows`
--
ALTER TABLE `myshows`
  ADD PRIMARY KEY (`myshow_id`),
  ADD KEY `tvshows` (`show_id`),
  ADD KEY `users` (`user_id`);

--
-- Indexes for table `tvshows`
--
ALTER TABLE `tvshows`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myshows`
--
ALTER TABLE `myshows`
  MODIFY `myshow_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tvshows`
--
ALTER TABLE `tvshows`
  MODIFY `show_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
