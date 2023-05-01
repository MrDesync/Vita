-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 01. 21:13
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vitashop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `ProductID` int(100) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductCode` varchar(100) NOT NULL,
  `ProductDescription` varchar(500) NOT NULL,
  `ProductPhoto` varchar(255) NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `ProductCategory` smallint(10) NOT NULL,
  `ProductStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
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
-- Tábla szerkezet ehhez a táblához `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(255) NOT NULL,
  `PurchaseNumber` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `ProductQuantity` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `purchases`
--

INSERT INTO `purchases` (`PurchaseID`, `PurchaseNumber`, `UserID`, `ProductID`, `ProductPrice`, `ProductQuantity`, `PurchaseDate`) VALUES
(2, 1, 3, 4, 3590, 4, '2023-04-23'),
(3, 1, 3, 1, 1290, 1, '2023-04-23'),
(4, 1, 3, 2, 1890, 1, '2023-04-23'),
(5, 1, 3, 3, 1090, 1, '2023-04-23'),
(6, 2, 3, 3, 1090, 3, '2023-04-23'),
(7, 2, 3, 4, 3590, 1, '2023-04-23'),
(8, 3, 18, 3, 1090, 2, '2023-05-01'),
(9, 3, 18, 2, 1890, 2, '2023-05-01'),
(10, 4, 18, 1, 1290, 1, '2023-05-01'),
(11, 4, 18, 2, 1890, 1, '2023-05-01'),
(12, 4, 18, 3, 1090, 1, '2023-05-01'),
(13, 4, 18, 4, 3590, 1, '2023-05-01'),
(14, 5, 18, 4, 3590, 4, '2023-05-01'),
(15, 6, 18, 1, 1290, 1, '2023-05-01'),
(16, 7, 18, 3, 1090, 1, '2023-05-01');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `UserID` int(100) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserType` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserType`) VALUES
(17, 'Admin', '$2y$10$/if2HHdfE6FF1gV8xBeF2OkGfzb5qTIWiJJEx3kwgA8mabTvwpd5y', 'admin@admin.hu', 99),
(18, 'User', '$2y$10$75HJ/Dq6.o3i4u.DOT/to.MFUyuVuI8/f6jpTJAwFCsBXNjWTrfIK', 'user@user.hu', 1),
(19, 'Zoltán', '$2y$10$gujgA5CACppSvbbHRJR89uUjA7LNwQwsAvNZ/2x1/bvknwoy5P3QC', 'zoli@index.hu', 1),
(20, 'Erika', '$2y$10$AEjdNcwHfQ9boZqMFtFiPu7XPqLX70Jy1IkQUctUqJzZL7atBwzzS', 'era@freemail.hu', 1),
(21, 'valami', '$2y$10$DlYK9OzAcrGy6fiF8fkhiOce9o/9AY9GenGsXbVIvWRizwLh91Ttu', 'valami@v.hu', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `usertypes`
--

CREATE TABLE `usertypes` (
  `UserTypeID` int(10) NOT NULL,
  `UserTypeName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- A tábla indexei `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- A tábla indexei `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `usertypes`
--
ALTER TABLE `usertypes`
  ADD CONSTRAINT `usertypes_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
