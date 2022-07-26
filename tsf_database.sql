SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Balance` int(10) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `money`(
`user` varchar(9) NOT NULL,
`amount` int NOT NULL,
`beneficiary` varchar(20) NOT NULL
);
--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Email`, `Phone`, `Balance`) VALUES
(1, 'Amol J', 'amol@gmail.com', '7878787878', 80000),
(2, 'Vishal K', 'vishal@gmail.com', '4545544545', 54000),
(3, 'Kanak P', 'kanak@gmail.com', '9696696969', 75000),
(4, 'Reshma L', 'reshma@gmail.com', '8181818181', 85500),
(5, 'Naman P', 'naman@gmail.com', '9090909090', 45000),
(6, 'Kailash K', 'kailash@gmail.com', '9292929292', 82000),
(7, 'Palak P', 'palak@gmail.com', '9339939339', 81000),
(8, 'Isha N', 'isha@gmail.com', '9229229229', 83500),
(9, 'Aman A', 'aman@gmail.com', '8585858585', 65000),
(10, 'Sundar M', 'sundar@gmail.com', '8585858585', 65000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Sno` int(5) NOT NULL,
  `Name1` varchar(30) NOT NULL,
  `Name2` varchar(30) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Sno`, `Name1`, `Name2`, `Amount`, `Time`) VALUES
(1, 'Raman R', 'Paras K', 1000, '2022-06-20 15:05:01'),
INSERT INTO `transactions` (`Sno`, `Name1`, `Name2`, `Amount`, `Time`) VALUES
(2, 'Ya', 'Paras K', 1000, '2022-06-20 15:05:01'),

DELETE FROM `transactions`
WHERE Sno=2;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
