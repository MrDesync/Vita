-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 02:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(100) NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductCode` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductDescription` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductPhoto` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `ProductCategory` int(10) NOT NULL,
  `ProductStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductCode`, `ProductDescription`, `ProductPhoto`, `ProductPrice`, `ProductCategory`, `ProductStatus`) VALUES
(1, 'A vitamin', 'AV001', 'Az A-vitamin (Retinol) könnyen alkalmazható kapszula formában tartalmaz adagonként 3000 mcg A-vitamint - ez a mennyiség fedezi a vitamin ajánlott napi beviteli mennyiségét. Az A-vitamin hozzájárul az immunrendszer normál működéséhez, emellett pedig jótékony hatásai vannak a nyálkahártya, a bőr és a látás egészségére.', 'productIMG/vitamin_A_.jpg', 1700, 1, 1),
(2, 'B vitamin', 'BV001', 'A B-vitamin komplex mind a 8 alapvető fontosságú B-vitamint kellő mennyiségben tartalmazza, amelyek részt vesznek a szervezetben zajló összes létfontosságú folyamat megfelelő működésében. Ezek közül például a B12-vitamin hatással van az immunitás optimális működésére, és a B6-vitaminnal együtt segít csökkenteni a fáradtságot és a kimerültséget. Így a B-vitamin-komplex képezi az általános egészség és vitalitás támogatásának alapját..', 'productIMG/vitamin_B_.jpg', 1890, 1, 1),
(3, 'C vitamin', 'CV001', 'A C-vitamin 1000 mg egy L-aszkorbinsav (C-vitamin) tartalmú táplálékkiegészítő könnyen lenyelhető tabletta formájában. Ez az alapvető fontosságú vitamin közismerten számos biológiai folyamatban vesz részt a szervezetünkben. Hozzájárul például az immunrendszer, az idegrendszer és a psziché megfelelő működéséhez. Hatásainak köszönhetően népszerű a sportolók, az aktív életmód kedvelői, valamint mindazok körében, akik szeretnék elősegíteni az általános egészséget és vitalitást.', 'productIMG/vitamin_C_.jpg', 1090, 1, 1),
(4, 'D vitamin', 'DV001', 'A D3-vitamin 2000 IU a D-vitaminu formája, amely hozzájárul az immunrendszer megfelelő működéséhez. Emellett fenntartja a fogak, csontok és izmok egészségét. A D-vitamint főleg a napfényből nyeri a szervezetünk, de ez nem elégséges, ezért érdemes táplálékkiegészítők átal pótolni.', 'productIMG/vitamin_D_.jpg', 3590, 1, 1),
(5, 'E vitamin', 'EV001', 'Az E-vitamin (tokoferol) egy olyan étrend-kiegészítő, amely hozzájárul a sejtek oxidatív stresszel szembeni védelméhez. Ezt a fajta stresszt a szervezetben lévő szabadgyökök és az antioxidánsok közötti egyensúlyhiány okozza, amelyek a szervezetben természetesen fordulnak elő. Az E-vitamin segíthet csökkenteni ennek az egyensúlyhiánynak a hatásait. Ráadásul könnyen fogyasztható, és mindenki értékelni fogja, aki igazán szeretné támogatni egészségét és a vitalitását.', 'productIMG/vitamin_E_.jpg', 1222, 1, 0),
(6, 'K vitamin', 'K2V001', 'A K2-vitamin (MK-7, menakinon) a K-vitamin biológiailag leghatásosabb formája hatékony kapszulák formájában. Hozzájárul a megfelelő véralvadáshoz és a csontok egészségének fenntartásához.', 'productIMG/vitamin_K_.jpg', 3690, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(255) NOT NULL,
  `PurchaseNumber` int(255) NOT NULL,
  `UserID` int(100) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `ProductQuantity` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PurchaseID`, `PurchaseNumber`, `UserID`, `ProductID`, `ProductPrice`, `ProductQuantity`, `PurchaseDate`) VALUES
(8, 3, 18, 3, 1090, 2, '2023-05-01'),
(9, 3, 18, 2, 1890, 2, '2023-05-01'),
(10, 4, 18, 1, 1290, 1, '2023-05-01'),
(11, 4, 18, 2, 1890, 1, '2023-05-01'),
(12, 4, 18, 3, 1090, 1, '2023-05-01'),
(13, 4, 18, 4, 3590, 1, '2023-05-01'),
(14, 5, 18, 4, 3590, 4, '2023-05-01'),
(15, 6, 18, 1, 1290, 1, '2023-05-01'),
(16, 7, 18, 3, 1090, 1, '2023-05-01'),
(17, 8, 22, 2, 1890, 1, '2023-05-02'),
(18, 8, 22, 3, 1090, 1, '2023-05-02'),
(19, 9, 22, 3, 1090, 1, '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(100) NOT NULL,
  `UserName` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `UserPassword` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `UserType` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserType`) VALUES
(17, 'Admin', '$2y$10$/if2HHdfE6FF1gV8xBeF2OkGfzb5qTIWiJJEx3kwgA8mabTvwpd5y', 'admin@admin.hu', 99),
(18, 'User', '$2y$10$75HJ/Dq6.o3i4u.DOT/to.MFUyuVuI8/f6jpTJAwFCsBXNjWTrfIK', 'user@user.hu', 1),
(19, 'Zoltán', '$2y$10$gujgA5CACppSvbbHRJR89uUjA7LNwQwsAvNZ/2x1/bvknwoy5P3QC', 'zoli@index.hu', 1),
(20, 'Erika', '$2y$10$AEjdNcwHfQ9boZqMFtFiPu7XPqLX70Jy1IkQUctUqJzZL7atBwzzS', 'era@freemail.hu', 1),
(21, 'valami', '$2y$10$DlYK9OzAcrGy6fiF8fkhiOce9o/9AY9GenGsXbVIvWRizwLh91Ttu', 'valami@v.hu', 1),
(22, 'qwe', '$2y$10$9I6cCit.M.vf7WFvNrI2SuzDo4t9svucie6fgVsdsQKk1ZA538RzG', 'qwe@qwe.hu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ProductCategory` (`ProductCategory`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `UserID` (`UserID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ProductCategory`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `prod_id_fr` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
