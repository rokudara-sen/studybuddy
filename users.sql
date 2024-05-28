-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mai 2024 um 18:36
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
... (52 lines left)
