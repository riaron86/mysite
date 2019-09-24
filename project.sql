-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2019 г., 20:01
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `user_login` varchar(64) NOT NULL,
  `text` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`chat_id`, `user_login`, `text`, `date`) VALUES
(10, 'orders', 'cgb', '1569341098'),
(11, 'orders', 'cgb', '1569341144'),
(12, 'orders', 'ma5j4se', '1569341160'),
(13, 'admon', 'jgftxutftcgv', '1569342875'),
(14, 'sdgv', 'sdv', '1569343321'),
(15, 'sdv', 'sdv', '1569343327'),
(16, 'sdf', 'sdgf', '1569343333'),
(17, 'afds', 'xbc vxvc', '1569343352'),
(18, 'vcxvzzvcx', 'xzzvvzvzvcz', '1569343360'),
(19, 'zxcxczcxz', 'xczxczxczxczx', '1569343368'),
(20, 'cxzcxzxczxcz', 'xczxczcxzcxzcxzcxz', '1569343375');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL DEFAULT '',
  `phon` varchar(64) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`, `phon`, `photo`, `gender`, `about`, `age`) VALUES
(29, 'SteveO', '696d29e0940a4957748fe3fc9efd22a3', 'tQ12oYtLa1', '84956666666', 'files/pics/c430a3433fb640e5e3a1444f6c606b981513032402-1468771018-ne-poyman-ne-vor-filmanias-2.jpg', 'm', 'Something', 19);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
