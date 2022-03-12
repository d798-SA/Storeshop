-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 10:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `general_user_interface`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) UNSIGNED NOT NULL,
  `contact_name` varchar(155) COLLATE utf8mb4_bin NOT NULL,
  `contact_email` varchar(155) COLLATE utf8mb4_bin NOT NULL,
  `contact_message` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `contact_document` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `contact_name`, `contact_email`, `contact_message`, `contact_document`) VALUES
(1, 'd7 Dark', 'fffff@gmail.com', 'Ricin', 'uploads/report/2021/11/16357576363AFDD4B9-3FF2-4D15-9D26-EA2EB08FC466.jpeg'),
(2, 'Nana', 'boom@gmail.com', 'Cool right', 'uploads/report/2021/11/16357580451E3E18CA-D021-4543-867F-1E5D0F71947A.jpeg'),
(3, 'Nana', 'boom@gmail.com', 'Cool right', 'uploads/report/2021/11/16357580501E3E18CA-D021-4543-867F-1E5D0F71947A.jpeg'),
(4, 'dart', 'd798asa@gmail.com', '11', 'uploads/report/2021/11/1636582277maxresdefault (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `user_id`, `token`, `expires_at`, `created_at`) VALUES
(12, 19, '375a13f4d9110f251c72644134ae8de828ac', '2021-12-05 12:59:28', '2021-12-04 14:59:28'),
(16, 14, 'e8ef476fb013fae42c8439652c11df89676b', '2022-01-11 04:55:50', '2022-01-10 06:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `role` enum('user','seller','admin','') COLLATE utf8mb4_bin NOT NULL DEFAULT 'user',
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `create_at`) VALUES
(1, 'jsjs', 'mm@mm.com', '111', 'user', '2021-11-11 01:19:41'),
(2, '$', '$email', '$password', 'user', '2021-11-12 17:22:10'),
(3, '$username', '$email', '$password', 'user', '2021-11-12 17:23:48'),
(5, 'd798', '44@gmail.com', '$2y$10$WtLA5L3qeMZq5X5izG5IjOEcsNKKr0wD5qyjZjBTX9NFNAOCsdDou', 'user', '2021-11-12 17:28:48'),
(6, 'd798', '111111111www@gmail.com', '$2y$10$kddyxTjXgwSVFQXfXVSi0.3DOjjJ6yl2M3gd12OJ8l55mC/R/hiJO', 'user', '2021-11-12 17:37:17'),
(7, 'd798', 'd798111111asa@gmail.com', '$2y$10$N.cLSTTOUiR8grX78bSm5.9X9bzXx1WCO0GM/iObImgGiKwY5LxS6', 'user', '2021-11-12 17:42:06'),
(8, 'd798', '111111111@gmail.com', '$2y$10$cBZCk3FRaQdUmBIPlCH19eWIoVITODBX8Rftdv.rvUof2r49p.G/G', 'user', '2021-11-12 17:46:24'),
(9, 'd798', 'd79eecx8asa@gmail.com', '$2y$10$gtzVMY9DTFWL8y2nWiA0S.sfNnYj54QeTWKwW/sXnbcomBStRLidq', 'user', '2021-11-12 17:47:13'),
(10, '511sweet1me', 'd791118asa@gmail.com', '$2y$10$XowIZvg8Ur.geS3/kTn/GuNtmPriHOhA8Fy6ED2cBCz9GqTej5WSe', 'user', '2021-11-12 17:51:24'),
(11, 'd798', 'd791q1q8asa@gmail.com', '$2y$10$D9PBMG9DZUriOWVh5/m5w.SdGO0jSbEwR5fgjs0qcAvzhFqcaBLGu', 'user', '2021-11-12 17:52:15'),
(12, '1111ss11111www@gmail.com', '1111cc11111www@gmail.com', '$2y$10$olWJIrUP9Y5NghCfDSLQYOLzCiWYVnJYinWtiSmraQeJp9hc9Zg5W', 'user', '2021-11-12 18:03:43'),
(13, 'd798', 'd798dwwasa@gmail.com', '$2y$10$AiGOxQqMtEHxot/PD0gAPeZH8uMKVT5sPjOWqrtg./CwQv3qWWAI2', 'user', '2021-11-12 18:03:59'),
(14, '511sweet1me', 'd798asa@gmail.com', '$2y$10$PON58ugq9I.ucvy1hUg0nu0Gheivkx/608BENulW0EjsW.7oFEN.2', 'user', '2021-11-12 18:11:46'),
(15, 'Ss', 'Ss@ss.com', '$2y$10$54AIM2SzjCkccX6.VVmQWeFaM/Go8o4OuI5uC2/GP9Ih.jFkoeWTK', 'user', '2021-11-12 21:28:01'),
(16, 'nothing just try', '1111111@gmail.com', '$2y$10$VPlngQ3IxF9to1sFG8KYu.XvmQabPzZSdh2CElMjubkgIKtstU1/O', 'user', '2021-11-21 16:33:35'),
(17, 'nothing just try', '12345ss@gmail.com', '$2y$10$LEhCSFaVp5slGe6IkhfMT.a.RBbvHq3xJeTLMylEsEINxiVgAgg6e', 'user', '2021-11-21 16:34:12'),
(18, '11221111111www@gmail.com', '11221111111www@gmail.com', '$2y$10$lEq3YXj6d5qxSSS/akDNj.f/aoRPJUhxMdfD6xYoZWwbVU/agV3Xe', 'user', '2021-11-21 17:08:56'),
(19, '111111111ww1ww@gmail.com', '111111111ww1ww@gmail.com', '$2y$10$s5ap6fh/m7Hkxx1oshEK1OaPoedVeLACo5A/h71qkFSuQB6Q9S..i', 'user', '2021-11-21 17:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_reset_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
