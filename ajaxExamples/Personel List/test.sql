-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Oca 2020, 22:05:31
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 7.2.4

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
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `progress` int(11) NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `dob` date NOT NULL,
  `driver` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`id`, `name`, `progress`, `location`, `rating`, `dob`, `driver`) VALUES
(21, 'Jamie Newhart', 23, 'India', 3, '1985-05-14', 0),
(20, 'Frank Harbours', 38, 'Russia', 4, '1966-05-12', 1),
(19, 'Margret Marmajuke', 16, 'Canada', 5, '1999-01-31', 1),
(18, 'Brendon Philips', 100, 'USA', 1, '1980-08-01', 1),
(15, 'Oli Bob', 12, 'United Kingdom', 1, '1984-04-14', 0),
(23, 'Emily Sykes', 42, 'South Korea', 1, '1970-11-11', 1),
(24, 'James Newman', 73, 'Japan', 5, '1998-03-22', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
