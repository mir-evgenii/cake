-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 12 2017 г., 11:19
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

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
(9, 2, 'Заявка user2', 'Выполнено', '2017-02-18 15:46:15', '2017-02-18 16:30:58'),
(10, 1, 'что то не работает', 'Выполнено', '2017-04-20 13:12:58', '2017-04-20 13:13:07');

-- --------------------------------------------------------

--
-- Структура таблицы `iptvs`
--

CREATE TABLE `iptvs` (
  `id` int(11) NOT NULL,
  `tariff` set('Промо','Базовый','Супербазовый','Отключено') NOT NULL DEFAULT 'Отключено',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `iptvs`
--

INSERT INTO `iptvs` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'Базовый', 100, '01.05.17'),
(2, 'Супербазовый', 250, '01.05.17'),
(6, 'Промо', 0, '01.05.17'),
(7, 'Базовый', 360, '01.05.17'),
(8, 'Супербазовый', 500, '01.05.17'),
(9, 'Отключено', 0, '01.05.17'),
(10, 'Базовый', 100, '01.05.17'),
(11, 'Базовый', 150, '01.05.17'),
(12, 'Отключено', 0, '01.05.17'),
(13, 'Супербазовый', 400, '01.05.17'),
(14, 'Базовый', 160, '01.05.17'),
(15, 'Отключено', 0, '01.05.17'),
(16, 'Промо', 0, '01.05.17'),
(17, 'Базовый', 300, '01.05.17'),
(18, 'Супербазовый', 360, '01.05.17'),
(19, 'Отключено', 0, '01.05.17'),
(20, 'Базовый', 100, '01.05.17'),
(21, 'Базовый', 100, '01.05.17'),
(22, 'Отключено', 0, '01.05.17'),
(23, 'Супербазовый', 560, '01.05.17'),
(24, 'Базовый', 250, '01.05.17'),
(25, 'Отключено', 0, '01.05.17'),
(26, 'Промо', 0, '01.05.17'),
(27, 'Базовый', 240, '01.05.17'),
(28, 'Супербазовый', 500, '01.05.17'),
(29, 'Отключено', 0, '01.05.17'),
(30, 'Базовый', 100, '01.05.17'),
(31, 'Базовый', 200, '01.05.17'),
(32, 'Отключено', 0, '01.05.17'),
(33, 'Супербазовый', 900, '01.05.17'),
(34, 'Базовый', 60, '01.05.17'),
(35, 'Отключено', 0, '01.05.17'),
(36, 'Промо', 100, '01.05.17'),
(37, 'Базовый', 367, '01.05.17'),
(38, 'Супербазовый', 570, '01.05.17'),
(39, 'Отключено', 0, '01.05.17'),
(40, 'Базовый', 110, '01.05.17');

-- --------------------------------------------------------

--
-- Структура таблицы `nets`
--

CREATE TABLE `nets` (
  `id` int(255) NOT NULL,
  `tariff` set('iFlat 390','iFlat 490','iFlat 590','iFlat 690','iFlat 790','Отключен') NOT NULL DEFAULT 'Отключен',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `nets`
--

INSERT INTO `nets` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'iFlat 490', 550, '01.05.17'),
(2, 'iFlat 690', 1000, '01.05.17'),
(6, 'iFlat 390', 345, '01.05.17'),
(7, 'iFlat 590', 590, '01.05.17'),
(8, 'iFlat 490', 345, '01.05.17'),
(9, 'iFlat 390', 1345, '01.05.17'),
(10, 'iFlat 690', 850, '01.05.17'),
(11, 'iFlat 390', 345, '01.05.17'),
(12, 'iFlat 790', 790, '01.05.17'),
(13, 'iFlat 390', 390, '01.05.17'),
(14, 'iFlat 590', 200, '01.05.17'),
(15, 'iFlat 590', 590, '01.05.17'),
(16, 'iFlat 390', 500, '01.05.17'),
(17, 'iFlat 590', 590, '01.05.17'),
(18, 'iFlat 490', 345, '01.05.17'),
(19, 'iFlat 390', 1345, '01.05.17'),
(20, 'iFlat 690', 850, '01.05.17'),
(21, 'iFlat 390', 345, '01.05.17'),
(22, 'iFlat 790', 790, '01.05.17'),
(23, 'iFlat 390', 390, '01.05.17'),
(24, 'iFlat 590', 200, '01.05.17'),
(25, 'iFlat 590', 590, '01.05.17'),
(26, 'iFlat 390', 500, '01.05.17'),
(27, 'iFlat 590', 590, '01.05.17'),
(28, 'iFlat 490', 345, '01.05.17'),
(29, 'iFlat 390', 1345, '01.05.17'),
(30, 'iFlat 690', 850, '01.05.17'),
(31, 'iFlat 390', 345, '01.05.17'),
(32, 'iFlat 790', 790, '01.05.17'),
(33, 'iFlat 390', 390, '01.05.17'),
(34, 'iFlat 590', 200, '01.05.17'),
(35, 'iFlat 590', 590, '01.05.17'),
(36, 'iFlat 390', 500, '01.05.17'),
(37, 'iFlat 590', 590, '01.05.17'),
(38, 'iFlat 490', 345, '01.05.17'),
(39, 'iFlat 390', 1345, '01.05.17'),
(40, 'iFlat 690', 850, '01.05.17'),
(41, 'iFlat 390', 345, '01.05.17');

-- --------------------------------------------------------

--
-- Структура таблицы `tels`
--

CREATE TABLE `tels` (
  `id` int(11) NOT NULL,
  `tariff` set('Безлимитный','Комбинированный','Повременный','Отключен') NOT NULL DEFAULT 'Отключен',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `tels`
--

INSERT INTO `tels` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, 'Комбинированный', 100, '01.05.17'),
(2, 'Безлимитный', 200, '01.05.17'),
(6, 'Отключен', 0, '01.05.17'),
(7, 'Повременный', 45, '01.05.17'),
(8, 'Комбинированный', 120, '01.05.17'),
(9, 'Безлимитный', 250, '01.05.17'),
(10, 'Отключен', 0, '01.05.17'),
(11, 'Повременный', 78, '01.05.17'),
(12, 'Комбинированный', 112, '01.05.17'),
(13, 'Безлимитный', 151, '01.05.17'),
(14, 'Отключен', 0, '01.05.17'),
(15, 'Отключен', 0, '01.05.17'),
(16, 'Отключен', 0, '01.05.17'),
(17, 'Повременный', 45, '01.05.17'),
(18, 'Комбинированный', 120, '01.05.17'),
(19, 'Безлимитный', 250, '01.05.17'),
(20, 'Отключен', 0, '01.05.17'),
(21, 'Повременный', 78, '01.05.17'),
(22, 'Комбинированный', 112, '01.05.17'),
(23, 'Безлимитный', 151, '01.05.17'),
(24, 'Отключен', 0, '01.05.17'),
(25, 'Отключен', 0, '01.05.17'),
(26, 'Отключен', 0, '01.05.17'),
(27, 'Повременный', 45, '01.05.17'),
(28, 'Комбинированный', 120, '01.05.17'),
(29, 'Безлимитный', 250, '01.05.17'),
(30, 'Отключен', 0, '01.05.17'),
(31, 'Повременный', 78, '01.05.17'),
(32, 'Комбинированный', 112, '01.05.17'),
(33, 'Безлимитный', 151, '01.05.17'),
(34, 'Отключен', 0, '01.05.17'),
(35, 'Отключен', 0, '01.05.17'),
(36, 'Отключен', 0, '01.05.17'),
(37, 'Повременный', 45, '01.05.17'),
(38, 'Комбинированный', 120, '01.05.17'),
(39, 'Безлимитный', 250, '01.05.17'),
(40, 'Отключен', 0, '01.05.17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `fio` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','thec','account') DEFAULT 'user',
  `address` text,
  `phone` bigint(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `username`, `password`, `role`, `address`, `phone`, `created`, `modified`) VALUES
(1, 'Иванов Иван Иванович', 'user1', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi', 'user', '31 - 54', 89061918848, '2017-02-05 21:14:43', '2017-03-05 20:31:46'),
(2, 'Петров Максим Максимович', 'user2', '$2a$10$a0qxq67LFmDx406M9Y413.LkgJhRadG56XcUVD5zFd3XoOFZAL8Ze', 'user', '28 - 62', 89061819847, '2017-02-18 15:45:31', '2017-03-05 20:31:59'),
(3, 'Винев Илья Викторович', 'admin', '$2a$10$NZuf.vHBcG1TxgZgwxV/b.wMu9R6n1ALTZHUMVkGeRysNBqwTD2dy', 'admin', '11-35', 89061114678, NULL, NULL),
(4, 'Куров Виктор Константинович', 'thec', '$2a$10$ZDsi9T1clmL4c6ItYDiEC.y0SoYK2m21iy0o7zGHWzumG.O/9WYzO', 'thec', '13-56', 89063421213, NULL, NULL),
(5, 'Брякина Виктория Павловна', 'account', '$2a$10$igorXKIt6MGEoyp3NMIRA.pa9NDZUKI5eunWR21PFQ7yyqx.0f2MC', 'account', '40-11', 89067892425, NULL, NULL),
(6, 'Аборкина Анна Васильевна\r\n', 'genek', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '4-7\r\n', 89651300364, NULL, NULL),
(7, 'Адкина Евгения Борисовна\r\n', 'adk', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-96\r\n', 89057373554, NULL, NULL),
(8, 'Акишина Анастасия Валерьевна\r\n', 'akish', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '5-24\r\n', 89651300435, NULL, NULL),
(9, 'Аксенова Марина Владимировна\r\n', 'aks', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '4-52\r\n', 89651300409, NULL, NULL),
(10, 'Алексеев Владимир Владимирович\r\n', 'aleks', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '6-31\r\n', 89032381836, NULL, NULL),
(11, 'Алмаева Карина Владимировна\r\n', 'carina', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-29\r\n', 89032381896, NULL, NULL),
(12, 'Баранов Владимир Алексеевич\r\n', 'almak', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '12-8\r\n', 89057373597, NULL, NULL),
(13, 'Баранов Вячеслав Михайлович\r\n', 'ama', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-26\r\n', 89032382060, NULL, NULL),
(14, 'Барановский Александр Дмитриевич\r\n', 'amo', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '13-11\r\n', 89094396142, NULL, NULL),
(15, 'Баркалов Mихаил Евгеньевич\r\n', 'anash', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-30\r\n', 89032381897, NULL, NULL),
(16, 'Баронин Геннадий Федорович\r\n', 'and', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-8\r\n', 89032382042, NULL, NULL),
(17, 'Барсуков Сергей Аркадьевич\r\n', 'andruh', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '12-17\r\n', 89057457511, NULL, NULL),
(18, 'Барсукова Наталья Валерьевна\r\n', 'ankud', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '14-27\r\n', 89035065339, NULL, NULL),
(19, 'Басенко Светлана Николаевна\r\n', 'anoh', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-17\r\n', 89032381884, NULL, NULL),
(20, 'Бастрыкина Венера Ильясовна\r\n', 'anton', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '7-8\r\n', 89032381840, NULL, NULL),
(21, 'Веретельников Роман Эдуардович\r\n', 'ant', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-36\r\n', 89032382070, NULL, NULL),
(22, 'Верижникова Ольга Анатольевна\r\n', 'apa', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-59\r\n', 89057373517, NULL, NULL),
(23, 'Верозуб Игорь Александрович\r\n', 'artem', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '5-26\r\n', 89651300437, NULL, NULL),
(24, 'Верозуб Юлия Витальевна\r\n', 'art', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '2-08\r\n', 89651300306, NULL, NULL),
(25, 'Викс Александра Валерьевна\r\n', 'arhip', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '5-25\r\n', 89651300436, NULL, NULL),
(27, 'Вислоух Вадим Валентинович\r\n', 'ast', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-27\r\n', 89032382061, NULL, NULL),
(28, 'Вишневская Ирина Викторовна\r\n', 'afro', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-18\r\n', 89032381885, NULL, NULL),
(29, 'Водолеев Виталий Юрьевич\r\n', 'babaev', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '5-52\r\n', 89032381803, NULL, NULL),
(30, 'Вилков Алексей Анатольевич\r\n', 'arsh\r\n', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '7-19\r\n', 89032381851, NULL, NULL),
(31, 'Вислоух Вадим Валентинович\r\n', 'ast', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-27\r\n', 89032382061, NULL, NULL),
(32, 'Вишневская Ирина Викторовна\r\n', 'afro', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-18\r\n', 89032381885, NULL, NULL),
(33, 'Водолеев Виталий Юрьевич\r\n', 'babaev', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '5-52\r\n', 89032381803, NULL, NULL),
(34, 'Волков Анатолий Родионович\r\n', 'babi', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '10-32\r\n', 89032381987, NULL, NULL),
(35, 'Волков Николай Никифорович\r\n', 'baz', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '11-124\r\n', 89057373582, NULL, NULL),
(36, 'Волкова Татьяна Николаевна\r\n', 'barn', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '8-8\r\n', 89032381875, NULL, NULL),
(37, 'Волощенко Владимир Владимирович', 'bara', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '7-14', 89032381846, NULL, NULL),
(38, 'Воробьев Борис Михайлович', 'brn', '$2a$10$R9paJDZkajYSE5zh3rvQcu29Op2109IDnUXolC0PDlFdcZ8dYL1Bi\r\n', 'user', '12-20', 89057826395, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `tariff` set('360 руб/мес','Отключено') NOT NULL DEFAULT 'Отключено',
  `bill` int(11) DEFAULT NULL,
  `chek` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `tariff`, `bill`, `chek`) VALUES
(1, '360 руб/мес', 350, '01.05.17'),
(2, '360 руб/мес', 430, '01.05.17'),
(6, 'Отключено', 0, '01.05.17'),
(7, '360 руб/мес', 360, '01.05.17'),
(8, '360 руб/мес', 360, '01.05.17'),
(9, 'Отключено', 0, '01.05.17'),
(10, 'Отключено', 0, '01.05.17'),
(11, 'Отключено', 0, '01.05.17'),
(12, 'Отключено', 0, '01.05.17'),
(13, '360 руб/мес', 360, '01.05.17'),
(14, '360 руб/мес', 360, '01.05.17'),
(15, 'Отключено', 0, '01.05.17'),
(16, 'Отключено', 0, '01.05.17'),
(17, '360 руб/мес', 360, '01.05.17'),
(18, 'Отключено', 0, '01.05.17'),
(19, 'Отключено', 0, '01.05.17'),
(20, 'Отключено', 0, '01.05.17'),
(21, '360 руб/мес', 360, '01.05.17'),
(22, 'Отключено', 0, '01.05.17'),
(23, 'Отключено', 0, '01.05.17'),
(24, 'Отключено', 0, '01.05.17'),
(25, '360 руб/мес', 360, '01.05.17'),
(26, '360 руб/мес', 360, '01.05.17'),
(27, '360 руб/мес', 360, '01.05.17'),
(28, 'Отключено', 0, '01.05.17'),
(29, 'Отключено', 0, '01.05.17'),
(30, 'Отключено', 0, '01.05.17'),
(31, '360 руб/мес', 360, '01.05.17'),
(32, 'Отключено', 0, '01.05.17'),
(33, 'Отключено', 0, '01.05.17'),
(34, 'Отключено', 0, '01.05.17'),
(35, 'Отключено', 0, '01.05.17'),
(36, '360 руб/мес', 360, '01.05.17'),
(37, 'Отключено', 0, '01.05.17'),
(38, '360 руб/мес', 360, '01.05.17'),
(39, 'Отключено', 0, '01.05.17'),
(40, 'Отключено', 0, '01.05.17');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `iptvs`
--
ALTER TABLE `iptvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `nets`
--
ALTER TABLE `nets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `tels`
--
ALTER TABLE `tels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
