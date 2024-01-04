-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 08:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoavenue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CarID` int(11) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `Year` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CarID`, `Model`, `Year`, `Price`, `Location`, `Image`, `Availability`) VALUES
(1, 'Toyota Camry', 2022, 25000.00, 'Montreal, QC', 'camry.jpeg', 1),
(2, 'Honda Civic', 2022, 45000.00, 'Edmonton, AB', 'honda2022.jpeg', 1),
(3, 'Honda Civic', 2021, 22000.00, 'Vancouver, BC', 'honda2021.jpeg', 0),
(4, 'Ford Mustang', 2023, 35000.00, 'Montreal, QC', 'mustang2023.jpeg', 1),
(5, 'Chevrolet Equinox', 2022, 28000.00, 'Calgary, AB', 'chevroletequinox2021.jpeg', 1),
(6, 'BMW 3 Series', 2021, 42000.00, 'Ottawa, ON', 'bmw3series.jpeg', 0),
(7, 'Nissan Altima', 2023, 24000.00, 'Edmonton, AB', 'altima2023.jpeg', 1),
(8, 'Audi Q5', 2022, 48000.00, 'Quebec City, QC', 'audiq5.jpeg', 1),
(9, 'Hyundai Tucson', 2021, 26000.00, 'Winnipeg, MB', 'tucson2021.jpeg', 0),
(10, 'Mercedes-Benz E-Class', 2023, 52000.00, 'Halifax, NS', 'Mercedes-Benz E-Class.jpeg', 1),
(11, 'Chevrolet Camaro', 2022, 38000.00, 'Saskatoon, SK', 'camaro.jpeg', 1),
(12, 'Toyota RAV4', 2021, 30000.00, 'Hamilton, ON', 'Toyota RAV4.jpeg', 0),
(13, 'Jeep Wrangler', 2023, 32000.00, 'Victoria, BC', 'jeepwrangler.jpeg', 0),
(14, 'Volkswagen Golf', 2022, 22000.00, 'Regina, SK', 'Volkswagen Golf.jpeg', 1),
(15, 'Ford Explorer', 2021, 36000.00, 'St. John\'s, NL', 'fordexplorer.jpeg', 1),
(16, 'Tesla Model 3', 2023, 50000.00, 'Quebec City, QC', 'tesla3.jpeg', 1),
(17, 'Honda Accord', 2022, 27000.00, 'Oshawa, ON', 'hondaaccord.jpeg', 0),
(18, 'Lexus RX', 2021, 45000.00, 'Surrey, BC', 'lexusrx.jpeg', 1),
(19, 'Subaru Outback', 2023, 28000.00, 'Fredericton, NB', 'subaru.jpeg', 0),
(20, 'Mazda CX-5', 2022, 26000.00, 'Halifax, NS', 'Mazda CX-5.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `FavID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`FavID`, `UserID`, `CarID`) VALUES
(5, 1, 5),
(6, 2, 6),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(17, 1, 2),
(19, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `RecommendationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RecommendedCarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`RecommendationID`, `UserID`, `RecommendedCarID`) VALUES
(8, 1, 16),
(9, 1, 17),
(10, 1, 18),
(11, 1, 19),
(12, 1, 20),
(13, 1, 1),
(14, 1, 2),
(15, 2, 1),
(16, 2, 2),
(17, 2, 3),
(18, 2, 4),
(19, 2, 5),
(20, 2, 6),
(21, 2, 7),
(22, 3, 8),
(23, 3, 9),
(24, 3, 10),
(25, 3, 11),
(26, 3, 12),
(27, 3, 13),
(28, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `RentalID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `RentalStart` date NOT NULL,
  `RentalEnd` date NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`RentalID`, `UserID`, `CarID`, `RentalStart`, `RentalEnd`, `TotalAmount`) VALUES
(13, 1, 1, '2023-01-15', '2023-01-18', 300.00),
(14, 1, 2, '2023-02-10', '2023-02-15', 400.00),
(15, 1, 3, '2023-03-05', '2023-03-10', 500.00),
(16, 2, 4, '2023-01-20', '2023-01-25', 350.00),
(17, 2, 5, '2023-02-15', '2023-02-20', 450.00),
(18, 2, 6, '2023-03-10', '2023-03-15', 550.00),
(19, 3, 7, '2023-01-25', '2023-01-30', 400.00),
(20, 3, 8, '2023-02-20', '2023-02-25', 500.00),
(21, 3, 9, '2023-03-15', '2023-03-20', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Email`, `PasswordHash`) VALUES
(1, 'Casey', 'Fuh-Cham', 'caseyfuhcham23@gmail.com', 'casey1234'),
(2, 'Malav', 'Chirag', 'malavdesai1712@gmail.com', 'malav1234'),
(3, 'Brandon', 'Ross', 'brandou03@gmail.com', 'brandon1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`FavID`),
  ADD KEY `UserID` (`UserID`) USING BTREE,
  ADD KEY `CarID` (`CarID`) USING BTREE;

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `UserID` (`UserID`) USING BTREE,
  ADD KEY `CarID` (`CarID`) USING BTREE;

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`RecommendationID`),
  ADD KEY `UserID` (`UserID`) USING BTREE,
  ADD KEY `RecommendedCarID` (`RecommendedCarID`) USING BTREE;

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`RentalID`),
  ADD KEY `UserID` (`UserID`) USING BTREE,
  ADD KEY `CarID` (`CarID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `FavID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `RecommendationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `RentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `CarID_FK2` FOREIGN KEY (`CarID`) REFERENCES `cars` (`CarID`),
  ADD CONSTRAINT `UserID_FK2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `CarID_FK1` FOREIGN KEY (`CarID`) REFERENCES `cars` (`CarID`),
  ADD CONSTRAINT `UserID_FK1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `CarID_FK3` FOREIGN KEY (`RecommendedCarID`) REFERENCES `cars` (`CarID`),
  ADD CONSTRAINT `UserID_FK3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `CarID_FK` FOREIGN KEY (`CarID`) REFERENCES `cars` (`CarID`),
  ADD CONSTRAINT `UserID_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
