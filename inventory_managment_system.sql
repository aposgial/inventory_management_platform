-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 21 Δεκ 2023 στις 02:52:02
-- Έκδοση διακομιστή: 10.4.25-MariaDB
-- Έκδοση PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `inventory managment system`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `username`, `email`, `phone`, `city`) VALUES
(9, 151, 'root', 'makis@gmail.com', '11111111', 'la'),
(9, 1280, 'mmmmm', 'var@gmail.com', '7777777777777778', 'mmc');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `items`
--

CREATE TABLE `items` (
  `customer_id` int(11) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `items`
--

INSERT INTO `items` (`customer_id`, `item_id`, `quantity`, `price`) VALUES
(66, 0, 0, ''),
(475, 0, 0, ''),
(151, 0, 0, ''),
(111, 0, 0, ''),
(1280, 0, 0, ''),
(0, 7, 2, '37'),
(0, 7, 2, '37');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `created`, `updated`) VALUES
(1, 'apostolos', 'gialamas', '1321', 'apostolosgial@gmail.com', '2023-12-01', '2023-12-02'),
(2, 'kostas', 'nikou', '1234', 'nik@gmail.com', '2023-12-05', '2023-12-06'),
(9, 'valios', 'mpezos', '98765', 'valios@gmail.com', '2023-12-20', '2023-12-20');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Ευρετήρια για πίνακα `items`
--
ALTER TABLE `items`
  ADD KEY `customer_id` (`customer_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `items` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
