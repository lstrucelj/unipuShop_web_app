-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 12:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unipudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakulteti`
--

CREATE TABLE `fakulteti` (
  `id` int(10) NOT NULL,
  `naziv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fakulteti`
--

INSERT INTO `fakulteti` (`id`, `naziv`) VALUES
(1, 'FIPU'),
(2, 'FET'),
(3, 'FOOZ'),
(4, 'FITIKS'),
(5, 'ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `id_tip`
--

CREATE TABLE `id_tip` (
  `id` int(11) NOT NULL,
  `tip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `id_tip`
--

INSERT INTO `id_tip` (`id`, `tip`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(10) NOT NULL,
  `naziv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'majice'),
(2, 'rokovnici'),
(3, 'kemijske'),
(4, 'dukse'),
(5, 'kišobrani'),
(6, 'ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(10) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(100) NOT NULL,
  `id_tip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `email`, `lozinka`, `id_tip`) VALUES
(1, 'dcscds', 'vfad@gmail.com', '123456', 2),
(2, 'Leona123', 'leona@gmail.com', '111111', 1),
(3, 'tghtrhr', 'rhzzrwrzh', '3242334', 2),
(4, 'gvstgs', 'gstdgstf', '6567', 2),
(5, 'test', 'test@gmail.com', 'test', 1),
(8, 'lala', 'lala@gmail.com', 'lala', 2),
(9, 'korisnik', 'korisnik@korisnik.hr', 'korisnik', 2),
(12, 'iva12', 'iva12@gmail.com', 'iva12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kosarica`
--

CREATE TABLE `kosarica` (
  `id` int(10) NOT NULL,
  `kolicina` int(11) DEFAULT NULL,
  `velicina` text DEFAULT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_proizvod` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kosarica`
--

INSERT INTO `kosarica` (`id`, `kolicina`, `velicina`, `id_korisnik`, `id_proizvod`, `status`) VALUES
(13, 2, 'M', 5, 3, 'N'),
(16, 3, 'M', 5, 3, 'N'),
(17, 1, 'L', 5, 2, 'N'),
(18, 1, 'XL', 5, 5, 'N'),
(19, 1, 'S', 5, 3, 'K'),
(20, 3, 'M', 5, 12, 'K'),
(21, 2, 'M', 5, 11, 'K');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(10) NOT NULL,
  `kategorija` int(10) NOT NULL,
  `fakultet` int(10) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `naziv` text NOT NULL,
  `slika` text NOT NULL,
  `cijena` decimal(10,2) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `kategorija`, `fakultet`, `datum`, `naziv`, `slika`, `cijena`, `opis`) VALUES
(2, 1, 5, '2019-09-16 22:33:41', 'UNIPU majica', '46495848_1290600007746622_3411253748800946176_n.png', '100.00', 'PamuÄna majica kratkih rukava.'),
(3, 1, 5, '2019-09-16 22:33:41', 'UNIPU majica', 'unipu_majica4.png', '100.00', 'PamuÄna majica kratkih rukava.'),
(5, 1, 5, '2019-09-16 22:33:41', 'UNIPU majica', 'unipu_majica5.png', '100.00', 'Pamučna majica kratkih rukava.\r\nBoja: crna, bijeli logo'),
(7, 4, 1, '2019-09-16 21:51:54', 'FIPU duksa', 'Snimka zaslona (24).jpg', '150.00', 'Majica dugih rukava - 80% pamuk, 20% poliester\r\nBoja: crna, sky blue logo'),
(8, 4, 1, '2019-09-16 21:52:38', 'FIPU duksa', 'Snimka zaslona (17).png', '150.00', 'Majica dugih rukava - 80% pamuk, 20% poliester\r\nBoja: siva'),
(9, 4, 5, '2019-09-16 22:33:41', 'UNIPU duksa', 'Snimka zaslona (16).png', '150.00', 'Majica dugih rukava - 80% pamuk, 20% poliester\r\nBoja: navy, zlatni logo'),
(11, 1, 5, '2019-09-16 22:33:41', 'UNIPU majica', 'Primjedba 2019-04-01 135633.jpg', '100.00', 'PamuÄna majica kratkih rukava\r\nBoja: navy, prljavo Å¾uti logo'),
(12, 4, 1, '2019-09-16 21:56:10', 'FIPU duksa', 'Snimka zaslona (31).png', '150.00', 'Majica dugih rukava - 80% pamuk, 20% poliester\r\nBoja: crna, sky blue logo'),
(13, 4, 5, '2019-09-16 22:33:41', 'UNIPU majica', '46493737_196033777884727_4479129519352971264_n.png', '100.00', 'PamuÄna majica kratkih rukava\r\nBoja: navy'),
(14, 1, 5, '2019-09-16 22:33:41', 'UNIPU majica', '46486378_2159152601065974_4766055518231855104_n.png', '100.00', 'PamuÄna majica kratkih rukava.\r\nBoja: navy'),
(15, 4, 5, '2019-09-16 22:33:41', 'UNIPU duksa', '46771333_454821625041177_3497959195657895936_n.png', '150.00', 'Majica dugih rukava - 80% pamuk, 20% poliester\r\nBoja: navy, bijeli logo'),
(16, 6, 5, '2019-09-16 22:04:20', 'UNIPU boÄica', '1.png', '40.00', 'PlastiÄna boÄica plave boje, logo sveuÄiliÅ¡taprljavo Å¾ute boje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakulteti`
--
ALTER TABLE `fakulteti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_tip`
--
ALTER TABLE `id_tip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tip` (`id_tip`);

--
-- Indexes for table `kosarica`
--
ALTER TABLE `kosarica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_proizvod` (`id_proizvod`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija` (`kategorija`),
  ADD KEY `fakultet` (`fakultet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakulteti`
--
ALTER TABLE `fakulteti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `id_tip`
--
ALTER TABLE `id_tip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kosarica`
--
ALTER TABLE `kosarica`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_tip`) REFERENCES `id_tip` (`id`);

--
-- Constraints for table `kosarica`
--
ALTER TABLE `kosarica`
  ADD CONSTRAINT `kosarica_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `kosarica_ibfk_2` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvodi` (`id`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`id`),
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`fakultet`) REFERENCES `fakulteti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
