-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 04, 2024 at 06:54 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `user_name`, `time`) VALUES
(164, 'Czesc', 'Jakub', '2024-10-04 16:32:19'),
(165, 'Hej', 'Janek', '2024-10-04 16:32:24'),
(166, 'Co u ciebie?', 'Jakub', '2024-10-04 16:32:30'),
(167, 'Wszystko okej', 'Janek', '2024-10-04 16:32:36'),
(168, 'Hej', 'Jakub', '2024-10-04 16:44:07'),
(169, 'Test2', 'Jakub', '2024-10-04 16:50:51'),
(170, 'a', 'Jakub', '2024-10-04 16:50:54'),
(171, 'b', 'Jakub', '2024-10-04 16:50:56'),
(172, 'c', 'Jakub', '2024-10-04 16:50:59'),
(173, 'd', 'Jakub', '2024-10-04 16:51:02'),
(174, 'Hejho', 'Jakub', '2024-10-04 16:52:40');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
