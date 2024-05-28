-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mai 2024 um 18:52
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.0.28

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

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `age`, `major`, `profiletext`) VALUES
(1, 'Test', 'Test', 'Test', 'Test', 'Test@Test.Test', 'user', 21, 'Test', 'Test'),
(2, 'rokudara', 'Matteo', 'Habsburg-Lothringen', '$2y$10$5b9Ye45lTTBxDBPTQIpETOFlaAOkX8QokUo9XvtL12qTpDyvFgBiS', 'matteo.habsburg@gmx.at', 'admin', 0, '', ''),
(3, 'rokudara2', 'Matteo', 'Habsburg-Lothringen', '$2y$10$3rj1Ihl92Qzznobey9WH.O6ytH7bs8Pw1XOLKIYuVrNudXNli9oPO', 'matteo.habsburg@gmx.at', 'guest', 0, '', ''),
(4, 'Tester', 'Tester', 'Tester', '$2y$10$ERhWCe9WSQ3rkIF20AEVA.Wfyk3G2QCIjgtmeAZCJZHdY7A0.Y3eC', 'Test@test.testtest', 'guest', 0, '', '');

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
