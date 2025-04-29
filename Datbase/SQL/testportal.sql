-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 apr 2025 om 20:54
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testportal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `naam`, `achternaam`, `email`, `wachtwoord`) VALUES
(1, 'soufiane', 'kidour', 'haha@gmail.com', '$2y$10$Am5STLYEEuFbm.nqNy83xu5cq5XfdVigSflcXuL56x5XJ8ibB4Xi6'),
(2, 'soufiane', 'kidour', 'hoi@gmail.com', '$2y$10$QOK07ZigTLtUpRVQoIQqBOJKSFKhqpaFx/TO2POpa7zSiSyIG2RPi'),
(3, 'oke', 'oke', 'wat@gmail.com', '$2y$10$slGk6N37mCso2V2P7JdVROiOJUwC16.j3ZW2Hvyglkf7DvPPb9o.e');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `gebruikerid` int(11) NOT NULL,
  `prioriteit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `list`
--

INSERT INTO `list` (`id`, `naam`, `omschrijving`, `gebruikerid`, `prioriteit`) VALUES
(4, 'nee', 'nee', 2, 0),
(6, 'huis', 'op 12 april wil ik een huis bouwen', 3, 1),
(7, 'ps4', 'ik wil een ps4 kopen', 3, 2),
(8, 'test', 'test', 3, 0),
(9, 'tets', '', 3, 0),
(10, 'test', 'test', 3, 0),
(11, 'test', 'test', 3, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
