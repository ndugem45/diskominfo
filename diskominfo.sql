-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Des 2023 pada 06.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `mentor` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `course`, `mentor`, `title`) VALUES
(1, 'C+', 'Ari', 'Dr.'),
(2, 'C#', 'Ari', 'Dr.'),
(3, 'CSS', 'Cania', 'S.Kom'),
(4, 'HTML', 'Cania', 'S.Kom'),
(5, 'Javascript', 'Cania', 'S.Kom'),
(6, 'Python', 'Barry', 'S.T'),
(7, 'Micropython', 'Barry', 'S.T'),
(8, 'Java', 'Darren', 'M.T'),
(9, 'Ruby', 'Darren', 'M.T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userCourse`
--

DROP TABLE IF EXISTS `userCourse`;
CREATE TABLE `userCourse` (
  `id_user` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userCourse`
--

INSERT INTO `userCourse` (`id_user`, `id_course`, `id`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(2, 4, 4),
(2, 5, 5),
(2, 6, 6),
(3, 7, 7),
(3, 8, 8),
(3, 9, 9),
(4, 1, 10),
(4, 3, 11),
(4, 5, 12),
(5, 2, 13),
(5, 4, 14),
(5, 6, 15),
(6, 7, 16),
(6, 8, 17),
(6, 9, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Andik', 'andi@andi.com', '12345', '2023-12-12 02:10:12', '2023-12-12 02:10:12'),
(2, 'Budi', 'budi@budi.com', '67890', '2023-12-12 02:10:12', '2023-12-12 02:10:12'),
(3, 'Caca', 'caca@caca.com', 'abcde', '2023-12-12 02:10:58', '2023-12-12 02:10:58'),
(4, 'Deni', 'deni@deni.com', 'fghij', '2023-12-12 02:10:58', '2023-12-12 02:10:58'),
(5, 'Euis', 'euis@euis.com', 'klmo', '2023-12-12 02:11:43', '2023-12-12 02:11:43'),
(6, 'Fafa', 'fafa@fafa.com', 'pqrst', '2023-12-12 02:11:43', '2023-12-12 02:11:43'),
(8, 'root', 'hey@hey.com', '', '2023-12-12 04:03:37', '2023-12-12 04:03:37'),
(9, 'root', 'cek@cek.com', '', '2023-12-12 04:04:44', '2023-12-12 04:04:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userCourse`
--
ALTER TABLE `userCourse`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `userCourse`
--
ALTER TABLE `userCourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
