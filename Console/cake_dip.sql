-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 26 2017 г., 13:03
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cake_dip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` enum('Не выполнено','Выполнено') NOT NULL DEFAULT 'Не выполнено',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `text`, `status`, `created`, `modified`) VALUES
(1, 1, 'Текст заявки1', 'Не выполнено', '0000-00-00 00:00:00', NULL),
(2, 1, 'Текст заявки!', 'Не выполнено', '0000-00-00 00:00:00', NULL),
(3, 1, 'текст заявки', 'Выполнено', '2017-02-18 13:14:48', '2017-02-18 16:27:46'),
(9, 2, 'Заявка user2', 'Выполнено', '2017-02-18 15:46:15', '2017-02-18 16:30:58');

-- --------------------------------------------------------

--
-- Структура таблицы `iptvs`
--

CREATE TABLE `iptvs` (
  `id` int(11) NOT NULL,
  `tariff` set('Промо','Базовый','Супербазовый','Отключено') NOT NULL DEFAULT 'Отключено',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `iptvs`
--

INSERT INTO `iptvs` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'Базовый', 100, '1'),
(2, 'Супербазовый', 250, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `nets`
--

CREATE TABLE `nets` (
  `id` int(255) NOT NULL,
  `tariff` set('iFlat 390','iFlat 490','iFlat 590','iFlat 690','iFlat 790','Отключен') NOT NULL DEFAULT 'Отключен',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nets`
--

INSERT INTO `nets` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'iFlat 490', 550, '1'),
(2, 'iFlat 690', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `tels`
--

CREATE TABLE `tels` (
  `id` int(11) NOT NULL,
  `tariff` set('Безлимитный','Комбинированный','Повременный','Отключен') NOT NULL DEFAULT 'Отключен',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tels`
--

INSERT INTO `tels` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'Комбинированный', 100, '1'),
(2, 'Безлимитный', 200, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','thec','account') DEFAULT 'user',
  `address` text,
  `phone` bigint(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `address`, `phone`, `created`, `modified`) VALUES
(1, 'Пользователь 1', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi', 'user', '31 - 54', 89061918848, '2017-02-05 21:14:43', '2017-03-05 20:31:46'),
(2, 'Пользователь 2', '$2a$10$a0qxq67LFmDx406M9Y413.LkgJhRadG56XcUVD5zFd3XoOFZAL8Ze', 'user', '28 - 62', 89061819847, '2017-02-18 15:45:31', '2017-03-05 20:31:59'),
(3, 'admin', '$2a$10$NZuf.vHBcG1TxgZgwxV/b.wMu9R6n1ALTZHUMVkGeRysNBqwTD2dy', 'admin', NULL, NULL, NULL, NULL),
(4, 'thec', '$2a$10$ZDsi9T1clmL4c6ItYDiEC.y0SoYK2m21iy0o7zGHWzumG.O/9WYzO', 'thec', NULL, NULL, NULL, NULL),
(5, 'account', '$2a$10$igorXKIt6MGEoyp3NMIRA.pa9NDZUKI5eunWR21PFQ7yyqx.0f2MC', 'account', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `tariff` set('360 руб/мес','Отключено') NOT NULL DEFAULT 'Отключено',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, '360 руб/мес', 350, '1'),
(2, '360 руб/мес', 430, '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `iptvs`
--
ALTER TABLE `iptvs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nets`
--
ALTER TABLE `nets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `tels`
--
ALTER TABLE `tels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `iptvs`
--
ALTER TABLE `iptvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `nets`
--
ALTER TABLE `nets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `tels`
--
ALTER TABLE `tels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
