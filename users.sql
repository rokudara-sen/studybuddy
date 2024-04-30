-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Apr 2024 um 18:16
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `studybuddy`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `vorname` varchar(256) NOT NULL,
  `nachname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `userTyp` varchar(12) NOT NULL DEFAULT 'guest',
  `age` int(11) NOT NULL,
  `major` varchar(40) NOT NULL,
  `profiletext` varchar(1999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `userStatus`, `age`, `major`, `profiletext`) VALUES
(6, 'admin1', 'Beni', 'Zel', '$2y$10$SODqPgoMJAyS7WZD3njIk.hH1Fr4ILIArNSTQNrFZO3MMI8xYL6Te', 'admin@gmai.com', 'guest', 'active', 0, '', ''),
(10, 'theo', 'Theo', 'Wendel', '$2y$10$x1imLMNGbSuPOSg083rm7eL8EHYvL6/iwQoKXPD8M/p2toVdp3hWi', 'theo@theo', 'guest', 'active', 24, 'Informatik', 'Das ist eine about-Sektion');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
