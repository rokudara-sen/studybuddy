-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mai 2024 um 20:11
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

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
(19, 4, 2, 'Test\n', '2024-05-16 15:55:18'),
(0, 6, 0, '', '2024-05-16 17:38:30'),
(0, 6, 0, '', '2024-05-16 17:38:37'),
(0, 6, 0, '', '2024-05-16 17:38:45');

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
  `userStatus` varchar(12) NOT NULL DEFAULT 'active',
  `age` int(11) NOT NULL,
  `major` varchar(40) NOT NULL,
  `profiletext` varchar(1999) DEFAULT NULL,
  `picturepath` varchar(1999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `userStatus`, `age`, `major`, `profiletext`, `picturepath`) VALUES
(6, 'admin2', 'BeniTestet', 'Zel1', '$2y$10$C3o9T3Ef5gMc2w51VgpY7ev3fyrWsU6ANL34YP.YvauvRRwyHgDSS', 'admin@gmai.com', 'admin', 'active', 12, 'IT', 'Kein Text', 'WhatsApp Bild 2024-01-15 um 19.20.58_4dc7fcb5.jpg'),
(7, 'Beni1', 'Benjamin', 'Zelenay', '$2y$10$RcmaFRuX8AzS3q9NJh68f.XhaRIxXD.GO00eauaXzuA9G4OFlFVpq', 'benjaminzelenay@gmail.com', 'guest', 'active', 15, 'IT', 'Kein Text', 'Bild'),
(8, 'Users1', 'Users1', 'Users1', '$2y$10$YEgvnWH9g.IXDB0zPKJvt.KFgmvNt0f1jsxtecET.BjemAMGR5mGK', 'User1@User1.User1', 'guest', 'active', 0, '', NULL, NULL),
(9, 'users2', 'users2', 'users2', '$2y$10$vxL5KBf.aLti5LHsOhBdJuOay2GJQYsYCewh7ZBwNtwj3s6FjLyii', 'users2@users2.users2', 'guest', 'active', 0, '', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
