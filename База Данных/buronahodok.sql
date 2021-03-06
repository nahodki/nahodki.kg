-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 11 2018 г., 09:33
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `buronahodok`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `category` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `nomer` varchar(250) NOT NULL,
  `des` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `vip` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `data`, `category`, `caption`, `city`, `nomer`, `des`, `id_category`, `picture`, `vip`, `id_user`) VALUES
(1, '0000-00-00', 1, 'Потерял собаку', '1', '+9967777777777', 'ebevrtvvrvrvt4', 1, 'default.png', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `found` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `found`) VALUES
(1, 'Документы', '24'),
(2, 'Животные', '11'),
(3, 'Электроника', '17'),
(5, 'Бытовые вещи', '0'),
(6, 'Спортинвентарь', '2'),
(7, 'Другое', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `category_tip`
--

CREATE TABLE IF NOT EXISTS `category_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `category_tip`
--

INSERT INTO `category_tip` (`id`, `name`) VALUES
(1, 'Найден'),
(2, 'Потерян');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `tip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `tip`) VALUES
(1, 'Ош', 0),
(2, 'Жалал-Абад', 0),
(3, 'Талас', 0),
(4, 'Чуй', 0),
(5, 'Ысык-Кол', 0),
(6, 'Бишкек', 0),
(7, 'Нарын', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `id_category`) VALUES
(1, 'Паспорт', 1),
(2, 'Диплом', 1),
(3, 'Пропуск', 1),
(4, 'Удостоверение', 1),
(5, 'Билет', 1),
(6, 'Водительское удостоверение (Права)', 1),
(7, 'Кот \\ Кошка', 2),
(8, 'Собака', 2),
(9, 'Видеокамера', 3),
(10, 'Мобильный телефон', 3),
(11, 'Ноутбук', 3),
(12, 'Плеер', 3),
(13, 'Фотоаппарат', 3),
(17, 'Зонт', 5),
(18, 'Ключи', 5),
(19, 'Кошелек\r\n', 5),
(20, 'Сумка', 5),
(21, 'Чемодан', 5),
(22, 'Коньки', 6),
(23, 'Лыжи', 6),
(24, 'Ролики', 6),
(25, 'Сноуборд', 6),
(26, 'Другое', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `number`, `email`) VALUES
(1, 'baystan', 'e4cd1175d85bef0786e1d82a255f212f', '0771390338', 'baystan.@gmail.com'),
(2, 'kuba', 'e4cd1175d85bef0786e1d82a255f212f', '0777111111111', 'tashkulov@gmail.com'),
(3, 'bay', '1fccb567a44880e8665b7cb9d0f97271', '0771390338', 'bas@gmail.com'),
(4, 'baay', '35e47c8a7e27d512b4cf3b052ffe1960', '0771390338', 'ja@gmail.com'),
(5, 'doni', '202cb962ac59075b964b07152d234b70', '7713939', 'asasx@gmail.com'),
(6, 'lev', '202cb962ac59075b964b07152d234b70', '0771390338', 'asasx@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
