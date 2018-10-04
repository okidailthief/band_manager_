-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2018 at 07:30 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zachb335_songs`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminNotes`
--

CREATE TABLE `AdminNotes` (
  `event_id` int(11) DEFAULT NULL,
  `note_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author_fName` varchar(30) DEFAULT NULL,
  `author_lName` varchar(30) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE `Artists` (
  `id` int(11) NOT NULL,
  `bandArtist` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`id`, `bandArtist`) VALUES
(1, NULL),
(2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Bands`
--

CREATE TABLE `Bands` (
  `band_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `members` varchar(8) DEFAULT NULL,
  `repetoire` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ClientNotes`
--

CREATE TABLE `ClientNotes` (
  `event_id` int(11) DEFAULT NULL,
  `note_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author_fName` varchar(30) DEFAULT NULL,
  `author_lName` varchar(30) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `client_id` int(11) NOT NULL,
  `fName` varchar(30) DEFAULT NULL,
  `lName` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `relation` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `event_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_lName` varchar(30) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `addr` varchar(40) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `budget` varchar(20) DEFAULT NULL,
  `pay` int(11) DEFAULT NULL,
  `song_requests` varchar(15) DEFAULT NULL,
  `song_choice` varchar(15) DEFAULT NULL,
  `notes` varchar(10) DEFAULT NULL,
  `schedule` int(11) DEFAULT NULL,
  `event_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Event_Schedule`
--

CREATE TABLE `Event_Schedule` (
  `sched_detail` varchar(20) DEFAULT NULL,
  `event_id` int(11) NOT NULL DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `carpool_depart` time DEFAULT NULL,
  `load_in` time DEFAULT NULL,
  `sound_check` time DEFAULT NULL,
  `guest_arrival` time DEFAULT NULL,
  `pre_cock` time DEFAULT NULL,
  `ceremony` time DEFAULT NULL,
  `post_cock` time DEFAULT NULL,
  `dining` time DEFAULT NULL,
  `reception` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Genres`
--

CREATE TABLE `Genres` (
  `song_id` int(11) DEFAULT NULL,
  `song_title` varchar(30) DEFAULT NULL,
  `rock` tinyint(1) DEFAULT NULL,
  `hip_hop` tinyint(1) DEFAULT NULL,
  `country` tinyint(1) DEFAULT NULL,
  `dance` tinyint(1) DEFAULT NULL,
  `wedding_app` tinyint(1) DEFAULT NULL,
  `pop` tinyint(1) DEFAULT NULL,
  `ballad` tinyint(1) DEFAULT NULL,
  `oldies` tinyint(1) DEFAULT NULL,
  `classical` tinyint(1) DEFAULT NULL,
  `jazz` tinyint(1) DEFAULT NULL,
  `blues` tinyint(1) DEFAULT NULL,
  `r_and_b` tinyint(1) DEFAULT NULL,
  `metal` tinyint(1) DEFAULT NULL,
  `reggae` tinyint(1) DEFAULT NULL,
  `folk` tinyint(1) DEFAULT NULL,
  `funk` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `member_id` int(11) NOT NULL,
  `member_fName` varchar(30) DEFAULT NULL,
  `member_lName` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `skills` varchar(400) DEFAULT NULL,
  `repertoire` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `service_id` int(11) NOT NULL,
  `service` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Skills`
--

CREATE TABLE `Skills` (
  `member_id` int(11) NOT NULL DEFAULT '0',
  `member_fName` varchar(30) DEFAULT NULL,
  `member_lName` varchar(30) DEFAULT NULL,
  `lead_vox` tinyint(1) DEFAULT NULL,
  `back_vox` tinyint(1) DEFAULT NULL,
  `lead_guit` tinyint(1) DEFAULT NULL,
  `rhythm_guit` tinyint(1) DEFAULT NULL,
  `bass_guit` tinyint(1) DEFAULT NULL,
  `drums` tinyint(1) DEFAULT NULL,
  `sax` tinyint(1) DEFAULT NULL,
  `trumpet` tinyint(1) DEFAULT NULL,
  `trombone` tinyint(1) DEFAULT NULL,
  `mc` tinyint(1) DEFAULT NULL,
  `dj` tinyint(1) DEFAULT NULL,
  `acous_guit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE `Songs` (
  `title` varchar(255) NOT NULL DEFAULT '',
  `artist` varchar(50) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `decade` char(4) DEFAULT NULL,
  `song_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`title`, `artist`, `genre`, `decade`, `song_id`, `artist_id`) VALUES
('Song In Nine', '', '', '10s', 13, 0),
('Song In Nine', '', '', '10s', 15, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminNotes`
--
ALTER TABLE `AdminNotes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Bands`
--
ALTER TABLE `Bands`
  ADD PRIMARY KEY (`band_id`);

--
-- Indexes for table `ClientNotes`
--
ALTER TABLE `ClientNotes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Event_Schedule`
--
ALTER TABLE `Event_Schedule`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `Scores`
--
ALTER TABLE `Scores`
  ADD KEY `team` (`team`,`day`,`opponent`,`runs`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
  ADD PRIMARY KEY (`song_id`,`title`,`artist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AdminNotes`
--
ALTER TABLE `AdminNotes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Bands`
--
ALTER TABLE `Bands`
  MODIFY `band_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ClientNotes`
--
ALTER TABLE `ClientNotes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
