-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 30 2022 г., 10:16
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `iAdminId` int(20) NOT NULL,
  `vName` varchar(30) NOT NULL,
  `vSurName` varchar(30) NOT NULL,
  `vEmail` varchar(30) NOT NULL,
  `vPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`iAdminId`, `vName`, `vSurName`, `vEmail`, `vPassword`) VALUES
(1, 'Aram', '', 'aram@gmail.com', '123456'),
(2, 'Artur', 'Sargsyan', 'artur@gmail.com', '123456'),
(3, 'Arman', 'Hovsepyan', 'arman@gmail.com', '123456'),
(4, 'gevorg', 'Petrosyan', 'gevorg@gmail.com', '123456'),
(6, 'Aram', 'Petrosyan', 'serob@gmail.com', '123456'),
(7, 'Zohrab', 'Mazmanyan', 'zohrab@gmail.comhgrfhrtujtruet', '123456'),
(8, 'Zohrab', 'Mazmanyan', 'zohrab@gmail.com', '123456'),
(9, 'Armen', 'Petrosyan', 'armen@gmail.com', '123456'),
(10, 'Աիդա', 'մաթևոսյան', 'aidmatevosyan@mail.ru', '123456');

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `iCardId` int(20) NOT NULL,
  `iProdId` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `vEmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `iCatId` int(20) NOT NULL,
  `vCatName` varchar(100) NOT NULL,
  `eStatus` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`iCatId`, `vCatName`, `eStatus`) VALUES
(1, 'Smartphone', 'Inactive'),
(3, 'Hamakargich', 'Inactive'),
(4, 'Odorakich', 'Inactive'),
(5, 'Smartphone', 'Inactive'),
(6, 'Tey', 'Inactive'),
(7, 'Sale', 'Active'),
(8, 'New Collection', 'Active'),
(9, 'Top Products', 'Active'),
(10, 'sarnaran', 'Inactive'),
(11, 'hjgvjhv', 'Inactive'),
(12, 'gvhjv', 'Inactive'),
(13, 'hjvh', 'Inactive'),
(14, ' cxz zx', 'Inactive'),
(15, '111', 'Inactive'),
(16, 'sdvcdsvc', 'Inactive'),
(17, 'sdaxcscds', 'Inactive'),
(18, 'vhjh', 'Inactive'),
(19, 'ring', 'Inactive'),
(20, 'bjjbj', 'Inactive'),
(21, 'sarnaran', 'Inactive'),
(22, 'km ', 'Inactive'),
(23, 'm ', 'Inactive'),
(24, 'k nk', 'Inactive');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `iOrderId` int(20) NOT NULL,
  `iProdId` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `vEmail` varchar(40) NOT NULL,
  `eConfirmed` enum('true','false') DEFAULT 'false',
  `eStatus` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`iOrderId`, `iProdId`, `quantity`, `vEmail`, `eConfirmed`, `eStatus`) VALUES
(7, 6, 3, 'zohrab@gmail.com', 'true', 'Inactive'),
(9, 5, 1, 'zohrab@gmail.com', 'true', 'Inactive'),
(10, 8, 3, 'zohrab@gmail.com', 'true', 'Inactive'),
(11, 6, 5, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(12, 7, 2, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(17, 13, 11, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(18, 22, 14, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(19, 14, 5, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(27, 20, 5, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(37, 12, 3, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(38, 31, 4, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(39, 21, 6, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(42, 29, 2, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(43, 32, 2, 'aidmatevosyan@mail.ru', 'true', 'Inactive'),
(54, 29, 3, 'zohrab@gmail.com', 'true', 'Inactive'),
(55, 31, 2, 'zohrab@gmail.com', 'true', 'Inactive'),
(56, 32, 2, 'zohrab@gmail.com', 'true', 'Inactive'),
(57, 15, 2, 'zohrab@gmail.com', 'true', 'Inactive'),
(58, 35, 2, 'zohrab@gmail.com', 'true', 'Inactive'),
(59, 22, 4, 'zohrab@gmail.com', 'true', 'Inactive'),
(60, 14, 2, 'zohrab@gmail.com', 'true', 'Inactive'),
(61, 30, 1, 'zohrab@gmail.com', 'true', 'Inactive'),
(62, 22, 3, 'vardan@mail.ru', 'true', 'Inactive'),
(63, 12, 1, 'vardan@mail.ru', 'true', 'Inactive'),
(64, 20, 1, 'vardan@mail.ru', 'true', 'Inactive'),
(65, 31, 1, 'vardan@mail.ru', 'true', 'Inactive'),
(66, 32, 2, 'vardan@mail.ru', 'true', 'Inactive'),
(67, 30, 1, 'vardan@mail.ru', 'true', 'Inactive'),
(68, 21, 1, 'Naira@mail.ru', 'true', 'Inactive'),
(69, 21, 4, 'zohrab@gmail.com', 'true', 'Inactive'),
(70, 32, 1, 'narek@mail.ru', 'true', 'Inactive'),
(71, 31, 1, 'Naira@mail.ru', 'true', 'Inactive'),
(72, 13, 1, 'vardan@mail.ru', 'true', 'Inactive'),
(73, 32, 2, 'Naira@mail.ru', 'true', 'Inactive'),
(74, 20, 1, 'zohrab@gmail.com', 'true', 'Inactive'),
(75, 13, 1, 'zohrab@gmail.com', 'true', 'Active'),
(76, 23, 1, 'zohrab@gmail.com', 'true', 'Active');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `iProdId` int(20) NOT NULL,
  `iCatId` int(20) NOT NULL,
  `vProdName` varchar(200) NOT NULL,
  `iProdPrice` int(20) NOT NULL,
  `vProdDesc` longtext NOT NULL,
  `vProdImage` varchar(50) DEFAULT NULL,
  `eStatus` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`iProdId`, `iCatId`, `vProdName`, `iProdPrice`, `vProdDesc`, `vProdImage`, `eStatus`) VALUES
(5, 4, 'heraxos', 1000, 'rgrgrgrgr', 'cta-bg.jpg', 'Active'),
(6, 7, 'koshik', 500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1662732245_65.png', 'Inactive'),
(7, 7, 'fdfdgdfgd', 100, 'sdgdfgfgfdg', 'Image20220817144724.png', 'Inactive'),
(8, 7, 'Lipton', 700, 'gefretryhtrytr', 'cta-bg.jpg', 'Inactive'),
(9, 7, 'Model No:1', 30000, 'vb c bvc xc xxxxxxxxxxxxxxxxxxxxxxxxx', '9bedadf0-ec85-4054-b8b5-ee2da4b67849.jpg', 'Inactive'),
(10, 7, 'xccdxc', 0, 'dcscd', '9bedadf0-ec85-4054-b8b5-ee2da4b67849.jpg', 'Inactive'),
(11, 7, 'klmjn', 0, 'kmnb', '9bedadf0-ec85-4054-b8b5-ee2da4b67849.jpg', 'Inactive'),
(12, 7, 'Model No 1', 30, 'Yellow Gold', 'sale6.jpg', 'Active'),
(13, 7, 'Model No: 2', 20, 'Yellow Gold', 'sale10.jpg', 'Active'),
(14, 7, 'Model No: 3', 40, 'High Quality Gold', '7.jpg', 'Active'),
(15, 7, 'Model No:4', 30, 'High Quality Gold', 'sale4.jpg', 'Active'),
(16, 7, 'Model No:5', 50, 'High Quality Gold', 'sale8.jpg', 'Active'),
(17, 7, 'Model No:6', 50, 'High Quality Gold', 'sale7.jpg', 'Active'),
(18, 7, 'Model No:7', 40, 'High Quality Gold', 'top2jpg.jpg', 'Active'),
(19, 7, 'Model No:8', 35, 'High Quality Gold', 'sale5.jpg', 'Active'),
(20, 8, 'Model No:1', 90, 'wear our new range', 'z1011587.jpg', 'Active'),
(21, 8, 'Model No:2', 60000, 'wear our new range', '2.jpg', 'Active'),
(22, 8, 'Model No:3', 70000, 'wear our new range', 'images (2).jpg', 'Active'),
(23, 8, 'Model No:4', 80000, 'wear our new range', 'images1.jpg', 'Active'),
(24, 8, '	Model No:5', 700, 'wear our new range', '12118993_963420110395194_5828996338019265863_n.jpg', 'Active'),
(25, 8, 'Model No:6', 9000, 'wear our new range', '1664058261_7ea5ea2c331e4bc76e3e96701bbb5a9a.jpg', 'Active'),
(26, 8, 'Model No:7', 80, 'wear our new range', '1664058333_s-l640.jpg', 'Active'),
(27, 8, 'Model No:8', 90, 'wear our new range', '1664059079_1664058445_images.jpg', 'Active'),
(28, 9, 'Model No:1', 60, 'Check out our top products', '1664060158_Pearl-Two-Tone-Engagement-Ring-973x650.', 'Inactive'),
(29, 9, 'Model No:1', 50, 'Check out our top products', '1664060218_emiliaring.jpg', 'Active'),
(30, 9, 'Model No:2', 60, 'Check out our top products', 'new1.jpg', 'Active'),
(31, 9, 'Model No:3', 80, 'Check out our top products', 'top1.jpg', 'Active'),
(32, 9, 'Model No:4', 100, 'Check out our top products', '0DS_2081-Edit-1-900x900.jpg', 'Active'),
(33, 9, 'Model No:5', 60, 'Check out our top products', '1664060615_1664060218_emiliaring.jpg', 'Active'),
(34, 9, 'Model No:6', 70, 'Check out our top products', 'images (2).jpg', 'Active'),
(35, 9, 'Model No:7', 80, 'Check out our top products', 'z1011587.jpg', 'Active'),
(36, 9, 'Model No:8', 70, 'Check out our top products', 'z1110148.jpg', 'Active');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `iUserId` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`iUserId`, `name`, `lastName`, `email`, `password`, `phone`) VALUES
(4, 'Zohrab', 'Mazmanyan', 'zohrab@gmail.com', '123456', '094149954'),
(5, 'Աիդա', 'մաթևոսյան', 'aidmatevosyan@mail.ru', '123456', '077046553'),
(6, 'Աիդա', 'Gevorgyan', 'aida@gmail.com', '123456', '55454'),
(7, 'vardan', 'podosyan', 'vardan@mail.ru', '123456', '098092191'),
(8, 'Naira', 'Podosyan', 'Naira@mail.ru', '123456', '1515145'),
(9, 'narek', 'gukasyan', 'narek@mail.ru', '123456', '141');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`iAdminId`);

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`iCardId`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`iCatId`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`iOrderId`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`iProdId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iUserId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `iAdminId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `iCardId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `iCatId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `iOrderId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `iProdId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `iUserId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
