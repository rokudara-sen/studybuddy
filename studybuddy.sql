-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2024 um 11:49
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
-- Tabellenstruktur für Tabelle `matches`
--

CREATE TABLE `matches` (
  `matchID` int(11) NOT NULL,
  `user_match_1` int(11) NOT NULL,
  `user_match_2` int(11) NOT NULL,
  `likes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `matches`
--

INSERT INTO `matches` (`matchID`, `user_match_1`, `user_match_2`, `likes`) VALUES
(1, 9, 1, 1),
(2, 9, 2, 1),
(3, 9, 3, 1),
(4, 9, 4, 1),
(5, 9, 8, 1),
(6, 2, 1, 1),
(7, 2, 3, 1),
(8, 2, 4, 1),
(9, 2, 8, 1),
(10, 2, 9, 1),
(11, 10, 2, 1),
(12, 2, 10, 1);

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
(19, 4, 2, 'Test\n', '2024-05-16 15:55:18'),
(0, 6, 0, '', '2024-05-16 17:38:30'),
(0, 6, 0, '', '2024-05-16 17:38:37'),
(0, 6, 0, '', '2024-05-16 17:38:45'),
(0, 2, 10, 'Test', '2024-05-30 11:45:24');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `reported_user` int(11) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `report`
--

INSERT INTO `report` (`report_id`, `reported_user`, `reported_by`, `reason`) VALUES
(1, 2, 5, 'ka'),
(2, 5, 2, 'ka');

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
  `picturepath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `age`, `major`, `profiletext`, `picturepath`) VALUES
(1, 'YannPolini', 'Yann', 'Polini', 'Test', 'Test@Test.Test', 'guest', 21, 'Wirtschaft', 'Ich bin Yann, und ich mag Wirtschaft.', 'lucy.jpg'),
(2, 'MatteoHL', 'Matteo', 'Habsburg-Lothringen', '$2y$10$5b9Ye45lTTBxDBPTQIpETOFlaAOkX8QokUo9XvtL12qTpDyvFgBiS', 'matteo.habsburg@gmx.at', 'guest', 21, 'Physik', 'Ich bin Matteo, und ich mag Physik.', 'vi.jpg'),
(3, 'TheoWendel', 'Theo', 'Wendel', '$2y$10$3rj1Ihl92Qzznobey9WH.O6ytH7bs8Pw1XOLKIYuVrNudXNli9oPO', 'matteo.habsburg@gmx.at', 'guest', 200, 'Recht', 'Ich bin Theo, und ich mag Recht.', 'caitlyn.jpg'),
(4, 'MichaelKovacevic', 'Michael', 'Kovacevic', '$2y$10$ERhWCe9WSQ3rkIF20AEVA.Wfyk3G2QCIjgtmeAZCJZHdY7A0.Y3eC', 'Test@test.testtest', 'guest', 30, 'Mathematik', 'Ich bin Michael, und ich mag Mathematik.', 'jinx.jpg'),
(8, 'BenjaminZelenay', 'Benjamin', 'Zelenay', '$2y$10$rKKS0netidooEnAWwaUA4uLvRFhS4t2EXRlv5cdKCWGiuF9Vy1A4C', 'hallo@hallo.hallo', 'admin', 50, 'Informatik', 'Ich bin Benjamin, und ich mag Informatik.', 'songbird.jpg'),
(9, 'NameSurname', 'Name', 'Surname', '$2y$10$3L6WKPDkLEDygPC5eLMfmeIaL39der8MtqfIQL0CpqVOXwhdF0/t2', 'name.surname@gmail.com', 'guest', 0, '', '', ''),
(10, 'TestingStuff', 'Tester', 'Tester', '$2y$10$99E8xxM3a8p.L0LV1t/H6.oX6rv7fia9oC38Ez7lSdlDWmccjaC1S', 'Test@test.testtest', 'guest', 0, '', '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matchID`),
  ADD KEY `user_match_1` (`user_match_1`),
  ADD KEY `user_match_2` (`user_match_2`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `matches`
--
ALTER TABLE `matches`
  MODIFY `matchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`user_match_1`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`user_match_2`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
