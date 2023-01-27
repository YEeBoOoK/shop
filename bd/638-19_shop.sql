-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 27 2023 г., 13:55
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `638-19_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `all_order`
--

CREATE TABLE `all_order` (
  `id_order` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(20) NOT NULL,
  `count` int(200) NOT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `status` enum('Новый','Подтвержден','Отменён') NOT NULL DEFAULT 'Новый',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `all_order`
--

INSERT INTO `all_order` (`id_order`, `user_id`, `product_id`, `count`, `reason`, `status`, `time`) VALUES
(11, 5, 7, 1, '[w', 'Подтвержден', '2023-01-27 10:47:51'),
(12, 5, 3, 2, NULL, 'Новый', '2023-01-26 15:25:08'),
(13, 5, 5, 1, NULL, 'Новый', '2023-01-26 15:25:08'),
(14, 5, 4, 1, NULL, 'Новый', '2023-01-26 15:25:08'),
(15, 5, 1, 1, NULL, 'Новый', '2023-01-26 15:25:08'),
(16, 6, 1, 1, NULL, 'Новый', '2023-01-27 06:44:50'),
(17, 1, 5, 1, NULL, 'Новый', '2023-01-27 10:35:35'),
(18, 1, 5, 1, '', 'Подтвержден', '2023-01-27 10:48:49');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(20) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Цветы'),
(2, 'Упаковка'),
(3, 'Дополнительно');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `country_of_origin` varchar(200) NOT NULL,
  `category_id` int(20) NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `left_product` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `image`, `name`, `price`, `country_of_origin`, `category_id`, `color`, `description`, `left_product`) VALUES
(1, '/web/ProductImage/PP9QT76-BJOvmVJRpKavP4UkJPIu7jZifEk60qOO_41c3ZhxzN.jpg', 'Гипсофилы', 3000, 'Россия', 1, 'Радужные', 'Радужные гипсофилы', 11),
(2, '/web/ProductImage/j2JpCxKqFcpdVkevkjMRlGBIorSc0ax7UE98646OtJqX6dqzLG.jpg', 'Гипсофилы', 3500, 'Армения', 1, 'Бело-голубые', 'Голубые гипсофилы', 4),
(3, '/web/ProductImage/ZZvIg7v8bGD2gDx8aHP02Ko14wGMOxih5B3XCC7FFQLBhNrt4y.jpg', 'Упаковочная бумага', 150, 'Россия', 2, 'Сирень', 'Упаковочная бумага с сиренью', 48),
(4, '/web/ProductImage/ux7FgXrmAUEquZFy2h3OE172VyNAc8J_7olUcvlo9YlyzYz9Se.jpg', 'Упаковочная обёртка', 150, 'Россия', 2, 'Космос', 'Космическая упаковочная обертка ', 48),
(5, '/web/ProductImage/tAEeX1GzoMPuKJHG8tXC5mtKr36UAArllN4kjFX-eUyQAZZOAM.png', 'Плюшевый мишка', 1200, 'Франция', 3, 'Светло-бежевый', 'Светло-бежевый плюшевый мишутка', 2),
(6, '/web/ProductImage/c0o22g2urL0QoCb0RphKzKF8dwphwgctkAkq-Oq0ZbGB2RYjgE.jpg', 'Обезьянка', 1500, 'Франция', 3, 'Коричневый', 'Коричневая обезьяна без банана, но с большими глазами', 0),
(7, '/web/ProductImage/pCl25gdwNZV6wwIGbNP8Db2JyCjVK6yiOywnPQJi-ZndeldZKr.jpg', 'Деталька', 999999999, 'Россия', 3, 'Белый', 'Писюна деталька', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'Мукалий', 'Виталов', 'Вовович', 'YITALYA', 'yii@iiy.iyi', '123', 0),
(2, 'Виталий', 'Мукалов', 'Владимирович', 'popa', 'gamepoad@mail.ru', '12312', 1),
(3, 'Кал', 'Говняной', 'Жопович', 'Kal228', 'Vitaly@mail.ru', '12345g', 0),
(4, 'Ленаа ', 'Ятебя', 'Лублууу', 'sasda', 'sadad@mail.ru', '123456g', 0),
(5, 'Ильюшенков', 'Леонид', 'Владимирович', 'leonid', 'admin@admin.ru', '123456', 0),
(6, 'Марина', 'Немынова', 'Александровна', 'Padla82', 'Padla82@mail.ru', '8022250nm', 0),
(7, 'ыф', 'ыф', 'ыф', 'aaaaa', 'sosi@sos.help', '11111', 0),
(8, 'Сосиска', 'Сосискова', 'Сосисковна', 'bbbbb', 'asgddg23bv@gmail.com', '12345', 0),
(9, 'Сосиска', 'Сосискова', 'Сосисковна', 'aaabb', 'asgddg23bdv@gmail.com', '12345', 0),
(10, 'Мукалий', 'Виталов', 'Вовович', 'YITALYaa', 'qwerty@gmail.com', '12312', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `all_order`
--
ALTER TABLE `all_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `all_order`
--
ALTER TABLE `all_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `all_order`
--
ALTER TABLE `all_order`
  ADD CONSTRAINT `all_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `all_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
