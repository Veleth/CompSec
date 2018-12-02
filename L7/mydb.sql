-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Gru 2018, 16:00
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `Nick` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`ID`, `Nick`, `Time`, `Comment`) VALUES
(8, 'GoÅ›Ä‡1', '1970-01-01 09:23:00', 'CoÅ¼ za zacna strona!'),
(9, 'TurboH4x0r', '2018-06-11 14:10:21', 'komentarz&quot;); DROP DATABASE;'),
(10, 'Lorem Ipsum', '2018-06-11 14:11:42', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu'),
(11, 'Zco?', '2018-06-12 08:08:34', '&lt;script&gt;window.alert(&quot;CCWD&quot;);&lt;/script&gt;'),
(12, 'masterH4X0r', '2018-06-12 08:18:26', '\';DROP DATABASE;\''),
(13, 'masterH4X0r', '2018-06-12 08:20:42', '\'&quot;;DROP DATABASE;');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `ID` int(10) NOT NULL,
  `username` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(200) NOT NULL,
  `money` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`ID`, `username`, `email`, `password`, `money`) VALUES
(1, 'administrator', 'admin@mail.com', '$2y$10$h5oS0ZfWYM6EDc4nnzIJFeBed45LrGflLaXyJk35YYEfKDyYSsKcC', 59401),
(2, 'Streetlamp LeMoose', 'mail@mail.mail', '$2y$10$TFpZQDYk20c6zxutWUGCMe7UR1iNaZVtSAsaCO27Tie2YiOp/AOfS', 38955),
(3, 'Gabriel', 'gabrielt12@o2.pl', '$2y$10$PX5XTGsgZtyi92NBAmR4muh/Id0wwtg6NppmGBGQTz7iMnePxT4Um', 766),
(4, 'Evil Jones', 'jones@evil.com', '$2y$10$DcBulMXcNGS1jP1eVhQ/O.jrrUCf4OUHnXbBC6j/qQNdUGwncMsJS', 364),
(5, 'pkubiak', 'pkubiak@pkubiak.com', '$2y$10$TXzRs9d408t1O6PGV7t8ye.ZfK7FIJ6GAWq6FAkrQMGnttwLo.0la', -10023);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `sender` varchar(90) NOT NULL,
  `reciever` varchar(900) NOT NULL,
  `time` date NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `transactions`
--

INSERT INTO `transactions` (`sender`, `reciever`, `time`, `amount`, `status`, `ID`) VALUES
('3', '4', '0000-00-00', 132, 'pending', 1),
('1', '2', '2018-11-26', 300, 'pending', 2),
('1', '2', '2018-11-26', 100, 'pending', 3),
('1', '3', '2018-11-27', 999, 'pending', 4),
('1', '3', '2018-11-27', 333, 'pending', 5),
('1', '2', '2018-11-27', 12345, 'pending', 6),
('1', '2', '2018-11-29', 100, 'pending', 7),
('5', '11111', '2018-11-29', 5000, 'pending', 9),
('5', '3000', '2018-11-29', 123, 'pending', 10),
('3', '123', '2018-12-02', 10, 'pending', 11),
('3', '123', '2018-12-02', 10, 'pending', 12),
('3', '123', '2018-12-02', 10, 'pending', 13),
('3', '123', '2018-12-02', 10, 'pending', 14),
('3', '123', '2018-12-02', 100, 'pending', 15),
('3', '2', '2018-12-02', 10, 'pending', 16),
('3', '123', '2018-12-02', 123, 'pending', 17),
('3', '123', '2018-12-02', 10, 'pending', 18),
('3', '123', '2018-12-02', 10, 'pending', 19),
('3', '123', '2018-12-02', 123, 'pending', 20),
('3', '144', '2018-12-02', 441, 'pending', 21),
('3', '123', '2018-12-02', 10, 'pending', 22),
('3', '3', '2018-12-02', 90, 'pending', 23),
('3', '2', '2018-12-02', 123, 'pending', 24);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
