-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2020 г., 01:40
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `marlintesttask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Фрукты'),
(2, 'Овощи'),
(3, 'Без категории'),
(4, 'Категория 4'),
(5, 'Категория 5'),
(6, 'Категория 6'),
(7, 'Категория 7'),
(8, 'Категория 8'),
(10, 'Категория 10'),
(11, 'Категория 11'),
(12, 'Категория 12'),
(13, 'Категория 13');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '3',
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `text`, `image`, `category_id`, `status`, `date`) VALUES
(1, 'Яблоки', 'Красные яблоки', 'Урожай этого года', '', 1, 0, '2020-02-04'),
(2, 'Капуста', 'Белокочанная капуста', 'Осенний сбор этого года', 'tovar2.png', 2, 0, '2020-02-27'),
(3, '11', '', '', '', 3, 0, '0000-00-00'),
(4, '4', '', '', '', 3, 0, '0000-00-00'),
(8, 'Товар 8', 'Удалена категория', '44444444444444', '1582991987.png', 3, 0, '2020-02-29'),
(9, 'Категория 9', 'Короткое описание Категория 9', 'Полное описание Категория 9', '1582993995.png', 11, 0, '2020-02-29'),
(10, '10', 'Короткое описание Категория 9', 'Полное описание Категория 9', '1583000066.png', 10, 0, '2020-02-29'),
(11, '11', 'Короткое описание Категория 9', 'Полное описание Категория 9', '1583000572.png', 11, 0, '2020-02-29'),
(12, 'Категория 15', 'Краткое описание Категория 15', 'Полное описание Категория 15', '1583061546.png', 6, 0, '2020-03-01'),
(17, '3', 'Товар 14', 'Товар 14', '', 3, 0, '2020-03-01'),
(18, '18', 'Товар 20', 'Товар 20', '', 3, 0, '2020-03-01'),
(19, 'Товар 21', '', '', '', 3, 0, '2020-03-01'),
(20, '20', 'Товар 25', 'Товар 25', '1583097690.png', 10, 1, '2020-03-02'),
(21, '211', 'Товар 261', 'Товар 261', '1583100347.png', 10, 0, '2020-03-02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
