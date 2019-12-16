-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 12:31 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cursophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `months` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `img`, `visible`, `months`, `created_at`, `updated_at`) VALUES
(1, 'php', 'Desarrollo en php', '', 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Devops', 'descripción devops', 'uploads/progrmaodr.png', 1, 10, '2019-12-08 07:32:09', '2019-12-08 07:32:09'),
(8, 'trabajo 1', 'hola', 'uploads/progrmaodr.png', 1, 10, '2019-12-17 00:13:25', '2019-12-17 00:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Projecto 1', 'descripción proyecto uno', '2019-11-29 19:58:53', '2019-11-29 19:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mmunozpozos@gmail.co', '$2y$10$WkG5dS7PazODeeeCvuvVU.cBKPb65SbJWT7.MNNNYxI6cIH09z.0y', '2019-11-29 19:35:43', '2019-11-29 19:35:43'),
(2, 'mmunozpozos@gmail.co', '$2y$10$hvvhNteSBo.61tpS7yGGK.cmC8ZqPDjwtxEozCM.jTM3OevCtZolq', '2019-11-29 19:36:22', '2019-11-29 19:36:22'),
(3, 'mmunozpozos@gmail.co', '$2y$10$dxWcCF91KvlafduQXET53OocpizinEgD6dVA4m0UUYRzT6JWNUZju', '2019-11-29 19:36:30', '2019-11-29 19:36:30'),
(4, 'mmunozpozos@gmail.co', '$2y$10$IdpU3x6uXSA3Eo.er9NEquZuonSVj2D5LorDy48FMe5mYtdNRY9QG', '2019-11-29 19:47:49', '2019-11-29 19:47:49'),
(5, 'mmunozpozos@gmail.com', '$2y$10$tBqCHfvRCRwhcnAt3RJm7epZ2rOSeTxNlAtCYnydrN8p0F.uUO1gm', '2019-11-30 02:47:30', '2019-11-30 02:47:30'),
(6, 'ayiz.fz@gmail.com', '$2y$10$3axQPwR42IxYSzic/qnl6Ol.RWHt3GM5BbXWCpGutOaU6MvZj9xPG', '2019-11-30 02:52:05', '2019-11-30 02:52:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
