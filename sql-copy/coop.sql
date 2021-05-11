-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 08 2020 г., 21:07
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `depart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `text`, `sender_id`, `recipient_id`, `time`, `depart_id`) VALUES
(30, 'тест \r\n', 4, 0, '19:13:11', 2),
(31, 'ответ коля ', 5, 0, '19:14:07', 2),
(40, 'перторо привет', 2, 0, '20:31:25', 1),
(41, 'ответ от Перта', 3, 0, '20:38:16', 1),
(42, 'всем привет', 16, 0, '20:51:15', 8),
(43, 'о  ПРивет  \r\n', 17, 0, '20:52:17', 8),
(44, 'Оооо як багато грущыков ', 18, 0, '20:53:14', 8),
(45, 'да весело буде працювати', 16, 0, '20:54:07', 8),
(46, 'привет ', 16, 18, '20:54:31', 0),
(55, 'ну  наконецто ajax для роздела департаменты  робочий \n\n', 16, 0, '22:37:38', 8),
(56, 'привет ', 16, 6, '22:46:54', 0),
(57, 'добрый  день', 16, 3, '10:21:38', 0),
(69, 'тест ajax в приватных сообщениях ', 16, 8, '11:08:12', 0),
(70, 'Борисович  одолжыте 100 грн.  до зарплаты\n', 16, 3, '11:09:17', 0),
(71, 'Саша салют', 16, 18, '11:10:04', 0),
(72, 'коли аванс?', 16, 8, '11:10:36', 0),
(73, 'почем рубероид ', 16, 5, '12:11:21', 0),
(74, 'как у нас  с  долгами ', 2, 8, '14:56:13', 0),
(75, 'тест ', 2, 16, '15:47:04', 0),
(76, 'тест скрол ', 17, 0, '21:12:36', 8),
(77, 'тест', 17, 3, '21:14:25', 0),
(78, 'test', 17, 7, '21:30:50', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `public_chat`
--

CREATE TABLE `public_chat` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_sender` int(11) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `public_chat`
--

INSERT INTO `public_chat` (`id`, `text`, `id_sender`, `time`) VALUES
(12, 'TEST ajax', 16, '23:36:09'),
(13, 'test ajax', 16, '23:36:48'),
(14, '1 код ajax  обробляе 2 чата ', 16, '23:39:17'),
(15, 'а тепер и 3 чата )))))', 2, '12:20:09'),
(25, 'интересно  еовые сообщения  в верху переписки ', 17, '20:20:06'),
(26, 'тест  скрол ', 17, '20:29:37'),
(39, 'тест скрол ', 17, '20:33:25'),
(40, 'удачно', 17, '20:33:34'),
(41, '77777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777', 17, '20:33:44'),
(42, 'тест   длинного сообщения ', 17, '20:59:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `office` varchar(255) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `lastvisittime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `office`, `depart_id`, `lastvisittime`) VALUES
(2, 'Игор Всилевич', 'vasylevch@.gmail.com', 7777, 'директор', 1, '2020-11-08 14:58:29'),
(3, 'Петро Борисович', 'brys@gmail.ua', 1234, 'первый зам', 1, '2020-11-06 19:51:43'),
(4, 'коля ', 'koly@gmail.com', 1234, 'продавец', 9, '2020-11-06 18:13:12'),
(5, 'вася ', 'vasiliy@gmail.com', 1234, 'продавец', 9, '2020-11-06 18:15:25'),
(6, 'Андрей ', 'andrey@gmail.com', 1234, 'водила', 2, '2020-11-05 21:51:58'),
(7, 'Михаил', 'misha@gmail.com', 123, 'водила', 2, '2020-11-05 21:51:58'),
(8, 'Валентина Маряновна', 'valentina@gmail.com', 1234, 'Бугалтер', 5, '2020-11-05 21:51:58'),
(16, 'Адрей', 'andry@gmail.com', 1234, 'грущик', 8, '2020-11-08 11:15:24'),
(17, 'Виталька', 'Виталька@gmail', 1234, 'грущик', 8, '2020-11-08 20:31:02'),
(18, 'Саша', 'Sasha@gmail', 1234, 'грущик', 8, '2020-11-06 19:53:14'),
(19, 'Игор ', 'Игор@gmail', 1234, 'грущик', 8, '2020-11-06 20:50:22'),
(20, 'Максим', 'макс@gmail', 1234, 'грущик', 8, '2020-11-06 20:50:22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `public_chat`
--
ALTER TABLE `public_chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `public_chat`
--
ALTER TABLE `public_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
