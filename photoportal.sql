-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Haz 2021, 15:55:57
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `photoportal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `photoid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `urlimg` varchar(100) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`photoid`, `userid`, `title`, `urlimg`, `postdate`, `rating`) VALUES
(1, 'yigittakk', 'Blue sky!', '0.jpeg', '2021-06-26 13:26:49', 10),
(2, 'halilsezgin', 'Me', '1.jpeg', '2021-06-26 13:30:07', 14),
(3, 'halilsezgin', 'What a beautiful view!!', '2.jpeg', '2021-06-26 13:31:40', 13),
(4, 'melihercan', 'Wright Brothers wow!', '3.jpg', '2021-06-26 13:34:08', 13),
(5, 'yigittakk', 'Büyük Dedelerim!', '4.jpg', '2021-06-26 13:35:51', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `postright` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `regdate`, `postright`) VALUES
(1, 'yigittakk', 'yigittakk@hotmail.com', '123kaplan152', '2021-06-26 13:22:48', 1),
(2, 'halilsezgin', 'halilsezgin@hotmail.com', '1234sezgin', '2021-06-26 13:28:25', 1),
(3, 'melihercan', 'melihercan@hotmail.com', '1234', '2021-06-26 13:32:32', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `votes`
--

CREATE TABLE `votes` (
  `voteid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `postid` int(11) NOT NULL,
  `rate` int(1) NOT NULL,
  `votedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `votes`
--

INSERT INTO `votes` (`voteid`, `userid`, `postid`, `rate`, `votedate`) VALUES
(1, 'yigittakk', 5, 5, '2021-06-26 13:36:05'),
(2, 'yigittakk', 4, 5, '2021-06-26 13:36:21'),
(3, 'yigittakk', 1, 2, '2021-06-26 13:36:30'),
(4, 'yigittakk', 2, 4, '2021-06-26 13:36:32'),
(5, 'yigittakk', 3, 3, '2021-06-26 13:36:34'),
(6, 'halilsezgin', 5, 5, '2021-06-26 13:36:57'),
(7, 'halilsezgin', 4, 5, '2021-06-26 13:37:01'),
(8, 'halilsezgin', 3, 5, '2021-06-26 13:37:04'),
(9, 'halilsezgin', 2, 5, '2021-06-26 13:37:08'),
(10, 'halilsezgin', 1, 3, '2021-06-26 13:37:11'),
(11, 'melihercan', 5, 5, '2021-06-26 13:37:25'),
(12, 'melihercan', 4, 3, '2021-06-26 13:37:27'),
(13, 'melihercan', 3, 5, '2021-06-26 13:37:30'),
(14, 'melihercan', 2, 5, '2021-06-26 13:37:32'),
(15, 'melihercan', 1, 5, '2021-06-26 13:37:33');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`photoid`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`voteid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `photoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `votes`
--
ALTER TABLE `votes`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
