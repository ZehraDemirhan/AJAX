-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Oca 2020, 12:50:01
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addedcourse`
--

DROP TABLE IF EXISTS `addedcourse`;
CREATE TABLE IF NOT EXISTS `addedcourse` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `addedcourse`
--

INSERT INTO `addedcourse` (`id`) VALUES
(62163),
(62166),
(62256);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `abbr` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `lab` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `abbr`, `name`, `credit`, `lab`) VALUES
(62151, 'CTIS151', 'Introduction to Programming', 5, 1),
(62152, 'CTIS152', 'Algorithms and Data Structures', 5, 1),
(62163, 'CTIS163', 'Discrete Mathematics', 4, 0),
(62164, 'CTIS164', 'Technical Mathematics with Programming', 4, 0),
(62165, 'CTIS165', 'Fundamentals of Information Systems', 3, 1),
(62166, 'CTIS166', 'Information Technologies', 3, 0),
(62255, 'CTIS255', 'Web Technologies 1', 3, 0),
(62256, 'CTIS256', 'Web Technologies 2', 3, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
