-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Mai 2024 um 19:48
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
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `messages`
--

INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `message`, `timestamp`) VALUES
(1, 2, 1, 'Tester', '2024-05-02 15:42:57'),
(2, 2, 1, 'Maninasd', '2024-05-02 15:43:03'),
(3, 2, 1, 'Maninasd', '2024-05-02 15:44:11'),
(4, 2, 1, 'asdasd', '2024-05-02 15:44:14'),
(5, 2, 1, 'asd', '2024-05-02 15:47:06'),
(6, 2, 1, 'asd', '2024-05-02 15:50:12'),
(7, 2, 1, 'asd', '2024-05-02 15:50:17'),
(8, 3, 2, 'Hi', '2024-05-02 15:51:08'),
(9, 2, 3, 'Hi man', '2024-05-02 15:51:30'),
(10, 3, 2, 'Hallo Wie gehst', '2024-05-02 16:35:32'),
(11, 2, 4, 'asd', '2024-05-16 15:41:14'),
(12, 4, 2, 'sdasd', '2024-05-16 15:41:24'),
(13, 4, 2, 'asdasdasdas', '2024-05-16 15:41:32'),
(14, 4, 2, 'asdasdad', '2024-05-16 15:49:32'),
(15, 2, 4, 'Hallo', '2024-05-16 15:49:52'),
(16, 4, 2, 'Testing', '2024-05-16 15:51:59'),
(17, 4, 2, 'Hallo', '2024-05-16 15:52:05'),
(18, 4, 2, 'Testing', '2024-05-16 15:53:45'),
(19, 4, 2, 'Test\n', '2024-05-16 15:55:18');

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
  `profiletext` varchar(1999) NOT NULL,
  `picturepath` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `age`, `major`, `profiletext`, `picturepath`) VALUES
(1, 'Test', 'Test', 'Test', 'Test', 'Test@Test.Test', 'user', 21, 'Test', 'Test', ''),
(2, 'rokudara', 'Matteo', 'Habsburg-Lothringen', '$2y$10$5b9Ye45lTTBxDBPTQIpETOFlaAOkX8QokUo9XvtL12qTpDyvFgBiS', 'matteo.habsburg@gmx.at', 'admin', 0, '', '', ''),
(3, 'rokudara2', 'Matteo', 'Habsburg-Lothringen', '$2y$10$3rj1Ihl92Qzznobey9WH.O6ytH7bs8Pw1XOLKIYuVrNudXNli9oPO', 'matteo.habsburg@gmx.at', 'guest', 0, '', '', ''),
(4, 'Tester', 'Tester', 'Tester', '$2y$10$ERhWCe9WSQ3rkIF20AEVA.Wfyk3G2QCIjgtmeAZCJZHdY7A0.Y3eC', 'Test@test.testtest', 'guest', 0, '', '', ''),
(5, 'theoo', 'theo', 'wendel', '$2y$10$BINSM2uh8Kzb0orjIm8SMOO2KJ8qic0OminvVJf.WG8mxPvef7hpG', 'theo@theo.theo', 'guest', 19, 'Informatik', 'Das ist meine about-section!', '20171031_174936.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
