-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studybuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `matchID` int(11) NOT NULL,
  `user_match_1` int(11) NOT NULL,
  `user_match_2` int(11) NOT NULL,
  `likes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`matchID`, `user_match_1`, `user_match_2`, `likes`) VALUES
(1, 12, 13, 1),
(2, 13, 12, 1),
(22, 14, 25, 1),
(23, 25, 14, 1),
(24, 15, 26, 1),
(25, 26, 15, 1),
(26, 27, 23, 1),
(27, 23, 27, 1),
(28, 24, 16, 1),
(29, 16, 24, 1),
(30, 18, 24, 1),
(31, 24, 18, 1),
(32, 16, 18, 1),
(33, 18, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `message`, `timestamp`) VALUES
(25, 12, 13, 'Hi Bob, I see you are a Mathematics major. I am a CS student working on a machine learning project. Do you have experience with linear algebra and probability?', '2024-06-21 15:35:23'),
(26, 13, 12, 'Hey Alice! Yes, I do. I have taken several courses in linear algebra and probability. I would be happy to help you out. Are you free to meet up this week?', '2024-06-21 15:35:42'),
(27, 12, 13, 'That would be great! How about Thursday afternoon?', '2024-06-21 15:35:49'),
(28, 13, 12, 'Perfect. Lets meet at the library at 3 PM.', '2024-06-21 15:36:04'),
(29, 14, 25, 'Hi Natalie, I noticed you are also a Physics major. I am currently studying quantum mechanics. Do you have any good study resources?', '2024-06-21 15:39:40'),
(30, 25, 14, 'Hi Carol! Yes, I have some great textbooks and online resources. I am also working on a quantum mechanics project. Maybe we can study together?', '2024-06-21 15:39:54'),
(31, 14, 25, 'That sounds perfect! How about we meet at the physics lab tomorrow at 2 PM?', '2024-06-21 15:40:01'),
(32, 25, 14, 'Sure, see you then!', '2024-06-21 15:40:07'),
(33, 15, 26, 'Hi Thomas, I see you are into organic chemistry. I am a Chemistry major too, and I am currently working on synthesizing new compounds. Could use a study buddy. Interested?', '2024-06-21 15:42:45'),
(34, 26, 15, 'Hey David, that sounds awesome. I would love to join you. I have been working on similar projects. When do you usually study?', '2024-06-21 15:42:53'),
(35, 15, 26, 'I usually study in the evenings. How about we meet at the chem lab at 6 PM tomorrow?', '2024-06-21 15:43:01'),
(36, 26, 15, 'Works for me. See you then!', '2024-06-21 15:43:07'),
(37, 23, 27, ' Hi Laura, I am a CS major focused on cybersecurity. I saw you are interested in UI/UX design. I am working on a project that could use some design input. Want to collaborate?', '2024-06-21 15:45:27'),
(38, 27, 23, 'Hi Julia! I would love to help out. I am always looking for practical projects to apply my design skills. When can we meet?', '2024-06-21 15:45:34'),
(39, 23, 27, 'How about meeting at the campus cafe tomorrow at 10 AM?', '2024-06-21 15:45:44'),
(40, 27, 23, 'Sounds good! See you then.', '2024-06-21 15:46:27'),
(41, 16, 24, 'Hi Mark, I see you are a Mathematics major. I am studying Biology and could use some help with the statistical analysis of my data. Interested?', '2024-06-21 15:51:35'),
(42, 24, 16, 'Hi Emma, I would be happy to help. Statistics is one of my strong suits. When do you want to meet?', '2024-06-21 15:51:40'),
(43, 16, 24, 'How about Wednesday at 4 PM in the study hall?', '2024-06-21 15:51:45'),
(44, 24, 16, 'That works for me. See you then.', '2024-06-21 15:51:51'),
(45, 18, 24, 'Hi Mark, I noticed you are a Mathematics major. I need help with statistical analysis for a market research project. Can you help?', '2024-06-21 15:53:07'),
(46, 24, 18, 'Hi Grace, sure, I would be happy to help. I am meeting Emma tomorrow to discuss similar topics. Would you like to join us?', '2024-06-21 15:53:13'),
(47, 18, 24, 'That sounds great! What time?', '2024-06-21 15:53:18'),
(48, 24, 18, 'We are meeting at 4 PM in the study hall.', '2024-06-21 15:53:25'),
(49, 18, 24, 'Perfect, see you there!', '2024-06-21 15:53:35'),
(50, 16, 18, 'Hi Grace, Mark mentioned you need help with statistics too. Would you like to join our study session tomorrow?', '2024-06-21 15:56:07'),
(51, 18, 16, 'Yes, that would be great. See you tomorrow at 4 PM!', '2024-06-21 15:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `reported_user` int(11) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `reported_user`, `reported_by`, `reason`) VALUES
(3, 28, 23, 'Fake account.'),
(4, 28, 13, 'probably not a real human.'),
(5, 28, 26, 'Remove this fake account please.'),
(6, 28, 27, 'Not real, delete this imposter.'),
(7, 13, 18, 'I do not like Bobs profile picture.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `vorname`, `nachname`, `password`, `email`, `userTyp`, `age`, `major`, `profiletext`, `picturepath`) VALUES
(12, 'alice_j', 'Alice', 'Johnson', '$2y$10$4KqngI/Gc7MjbhssY3saFePA/AYaovgjKEWN5yy/YpxOfd9JV4iM2', 'alice_j@example.com', 'guest', 22, 'Computer Science', 'Enthusiastic about AI and machine learning. Loves working on open-source projects.', 'Alice Johnson.jpg'),
(13, 'bob_s', 'Bob', 'Smith', '$2y$10$U1GckvacHzzBqciy4vQr1eDcxffdidiEs5uKYm8EN2.LCIKagOzC6', 'bob_s@example.com', 'guest', 21, 'Mathematics', 'Passionate about solving complex equations. Enjoys tutoring fellow students.', 'Bob Smith.jpg'),
(14, 'carol_d', 'Carol', 'Davis', '$2y$10$txNdbk/nlYYgIwhRz2Lw.uuC/yuZ6lMNRm6mrHUMdCM6EzvrMb52W', 'carol_d@example.com', 'guest', 23, 'Physics', 'Interested in quantum mechanics. Frequently participates in science fairs.', 'Carol Davis.jpg'),
(15, 'david_l', 'David', 'Lee', '$2y$10$5ncYg6YdUa3M0jC2EYCxNe73ouQpm6Wm.jrri56FA0J412ekNbJyW', 'david_l@example.com', 'guest', 22, 'Chemistry', 'Loves conducting experiments in the lab. Member of the chemistry club.', 'David Lee.jpg'),
(16, 'emma_w', 'Emma', 'Wilson', '$2y$10$QEPfcqw9ubxCI5n9gpJtzOzk5vW3GKra4xojrIpf1f2EWySPAQp1O', 'emma_w@example.com', 'guest', 21, 'Biology', 'Aspires to be a biologist. Enjoys fieldwork and studying ecosystems.', 'Emma Wilson.jpg'),
(17, 'frank_m', 'Frank', 'Miller', '$2y$10$EIOYCJFF4pA76F8p0uJO6uokHbl/4cbNMi.gbz5vTpIb/87Xg4QO2', 'frank_m@example.com', 'guest', 24, 'Engineering', 'Focused on mechanical engineering. Loves building and designing machines.', 'Frank Miller.jpg'),
(18, 'grace_t', 'Grace', 'Thompson', '$2y$10$1oCCdSakB4X0kNFup6c5Ku7jNgtg1.2MT0WY65yk8b3YszpzN0ZNy', 'grace_t@example.com', 'guest', 22, 'Business', 'Interested in entrepreneurship and startups. Active in business competitions.', 'Grace Thompson.jpg'),
(19, 'henry_g', 'Henry', 'Garcia', '$2y$10$JcGUZFmUrgFule8AqNMoeu/vst6ZiEkfgJy5D6Q/DLIa40gxjpVpq', 'henry_g@example.com', 'guest', 23, 'Economics', 'Fascinated by market trends and financial analysis. Enjoys reading economic journals.', 'Henry Garcia.jpg'),
(20, 'isabella_m', 'Isabella', 'Martinez', '$2y$10$CpSHF0MLXD3odaofCslkVeyOWhammOZdeueWUDQSzQZhOFNjaOOCa', 'isabella_m@example.com', 'guest', 21, 'Literature', 'Avid reader and writer. Enjoys discussing classic and contemporary literature.', 'Isabella Martinez.jpg'),
(21, 'jack_b', 'Jack', 'Brown', '$2y$10$0WuQYv4xGqpIgm0v9X7b9OA5Ic6d67F.rTrQ1efwNsTG9w7rsP8um', 'jack_b@example.com', 'guest', 22, 'Psychology', 'Interested in human behavior and cognitive processes. Volunteers at a counseling center.', 'Jack Brown.jpg'),
(22, 'admin', 'John', 'Doe', '$2y$10$2NMwJFdIoKKZ6qOcID9gv.GYo4odL6uTrJAOlOpyDllSuEVVidJZy', 'admin@example.com', 'admin', 30, 'Administration', 'Admin account for overseeing study partner matches and managing user interactions.', 'team-1.jpg'),
(23, 'julia_k', 'Julia', 'Kim', '$2y$10$tIjPgVUN7ysu1NpKCYtAI.zQvjSmJOkEZ8rQQ2bcylRaXG3.l6y7K', 'julia_k@example.com', 'guest', 23, 'Computer Science', 'Loves coding and cybersecurity. Enjoys participating in hackathons.', 'Julia Kim.jpg'),
(24, 'mark_t', 'Mark', 'Turner', '$2y$10$9swphRmr3RajjdjzSt1Fu.RRzoY.Nxaeh68w2gLwWXJozT023auFC', 'mark_t@example.com', 'guest', 22, 'Mathematics', 'Interested in applied mathematics and algorithms. Frequently attends math conferences.', 'Mark Turner.jpg'),
(25, 'natalie_e', 'Natalie', 'Evans', '$2y$10$inoZYqJWbkDCLESNFOg2h.AJZB7/mqruSUZJojD6COtDdjeA2lIHe', 'natalie_e@example.com', 'guest', 24, 'Physics', 'Specializes in astrophysics. Loves stargazing and working on space-related projects.', 'Natalie Evans.jpg'),
(26, 'thomas_g', 'Thomas', 'Green', '$2y$10$5..6qiUe8aOebyDlYnccB.dkYZFPCe9lfgg8/pU8XFHCOTCyygcca', 'thomas_g@example.com', 'guest', 23, 'Chemistry', 'Focuses on organic chemistry. Enjoys synthesizing new compounds and exploring chemical reactions.', 'Thomas Green.jpg'),
(27, 'laura_w', 'Laura', 'White', '$2y$10$sFo4LLOaeRzTy4uCTjPH6uLUrOEpkR5GhVS9KbfqWfR9pv7koThCG', 'laura_w@example.com', 'guest', 22, 'Computer Science', 'Interested in software development and UI/UX design. Loves creating user-friendly applications.', 'Laura White.jpg'),
(28, 'bot_user', 'Bot', 'User', '$2y$10$VDhXd373jR6YLiOFMEJIleiQqsnbWOT8ygrzFffscbPyKeioqJUpq', 'bot_user@example.com', 'guest', 1, 'Robotics', 'definitely not a Robot, I am a real Human.', 'OIP.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matchID`),
  ADD KEY `user_match_1` (`user_match_1`),
  ADD KEY `user_match_2` (`user_match_2`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `matchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`user_match_1`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`user_match_2`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
