-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2024 г., 15:48
-- Версия сервера: 10.5.17-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `documentFlow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academic_title`
--

CREATE TABLE `academic_title` (
  `id_title` int(11) NOT NULL,
  `title_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_abbreviation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `academic_title`
--

INSERT INTO `academic_title` (`id_title`, `title_name`, `title_abbreviation`) VALUES
(1, 'доктор технических наук', 'д.т.н.'),
(2, 'кандидат технических наук', 'к.т.н.д.'),
(3, 'кандидат сельскохозяйственных наук', 'к.с-х.н.'),
(4, 'доцент, кандидат педагогических наук кафедры', 'д.,к.п.н.'),
(5, 'Заведующий кафедрой', 'з.к.');

-- --------------------------------------------------------

--
-- Структура таблицы `access_lvl`
--

CREATE TABLE `access_lvl` (
  `Id_access` int(11) NOT NULL,
  `access_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `access_lvl`
--

INSERT INTO `access_lvl` (`Id_access`, `access_name`) VALUES
(5, 'Administrator'),
(4, 'Head of department'),
(3, 'Professor'),
(2, 'Student'),
(1, 'Unregistered user');

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `department_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_professor` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id_department`, `id_faculty`, `department_name`, `department_abbreviation`, `id_professor`) VALUES
(1, 1, 'Кафедра радиосвязи и вещания', 'РСиВ', 1),
(2, 1, 'Кафедра радиосистем и обработки сигналов', 'РОС', 1),
(3, 1, 'Кафедра телевидения и метрологии', 'ТВиМ', 1),
(4, 1, 'Кафедра конструирования и производства радиоэлектронных средств', 'КПРЭС', 1),
(5, 1, 'Кафедра экологической безопасности телекоммуникаций', 'ЭБТ', 1),
(6, 2, 'Кафедра инфокоммуникационных систем', 'ИКС', 1),
(7, 2, 'Кафедра программной инженерии и вычислительной техники', 'ПИиВТ', 1),
(8, 2, 'Кафедра сетей связи и передачи данных', 'ССиПД', 1),
(9, 2, 'Кафедра фотоники и линий связи', 'ФиЛС', 1),
(10, 2, 'Кафедра защищенных систем связи', 'ЗСС', 1),
(11, 3, 'Кафедра Безопасности информационных систем', 'БИС', 1),
(12, 3, 'Кафедра Информатики и компьютерного дизайна', 'ИКД', 1),
(13, 3, 'Кафедра Интеллектуальных систем автоматизации и управления', 'ИСАУ', 1),
(14, 3, 'Кафедра Информационных управляющих систем', 'ИУС', 1),
(15, 4, 'Кафедра управления и моделирования в социально-экономических системах', 'УМСЭС', 1),
(16, 4, 'Кафедра экономики и менеджмента инфокоммуникаций', 'ЭМИ', 1),
(17, 4, 'Кафедра бизнес-информатики', 'БИ', 1),
(18, 5, 'Кафедра истории и регионоведения', 'ИиРВ', 1),
(19, 5, 'Кафедра социально-политических наук', 'СПН', 1),
(20, 5, 'Кафедра иностранных и русского языков', 'ИНиРЯ', 1),
(21, 5, 'Кафедра иностранных языков', 'ИЯ', 1),
(22, 5, 'Кафедра физической культуры', 'ФК', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE `faculty` (
  `id_faculty` int(11) NOT NULL,
  `faculty_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`id_faculty`, `faculty_name`, `faculty_abbreviation`) VALUES
(1, 'Факультет радиотехнологий связи', 'РТС'),
(2, 'Факультет инфокоммуникационных сетей и систем', 'ИКСС'),
(3, 'Факультет информационных систем и технологий', 'ИСиТ'),
(4, 'Факультет цифровой экономики, управления и бизнес-информатики', 'ЦЭУБИ'),
(5, 'Факультет социальных цифровых технологий ', 'СЦТ');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id_group`, `group_name`) VALUES
(13, 'БИ-03'),
(15, 'ЗР-03'),
(17, 'ИБ-31вп'),
(18, 'ИБ-91вп'),
(16, 'ИБ-92вп'),
(5, 'ИБК-33'),
(4, 'ИБС-01'),
(6, 'ИКПИ-11'),
(1, 'ИКТ-311'),
(2, 'ИКТ-314'),
(7, 'ИКТО-02'),
(3, 'ИКТР-12'),
(8, 'ИКФ-21'),
(9, 'ИСТ-011'),
(10, 'ИСТ-222'),
(11, 'ИСТ-322'),
(12, 'ФП-01'),
(14, 'ЭМ-09');

-- --------------------------------------------------------

--
-- Структура таблицы `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `access_lvl` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `professor`
--

INSERT INTO `professor` (`id_professor`, `surname`, `name`, `patronymic`, `mail`, `phone`, `password`, `position`, `academic_title`, `id_faculty`, `id_department`, `access_lvl`) VALUES
(3, 'Бородянский', 'Юрий', 'Михайлович', 'borodyanskii.um@sut.ru', '+7999555112', '$2y$10$.nP8YlL1mBauAr7l8dHc4uDrOfPqkF1YN210KXBxKHw5xx4u./GK6', '5', '2', 3, 11, 4),
(6, 'Поведайко', 'Максим', 'Дмитриевич', '89119854561@yandex.ru', '89119854561', '$2y$10$DUcOyc/5TF8AdyLb68NHb.vo2D0d//7DUDYE/h3V2SUnnbqmqHfiS', '1', '2', 3, 11, 3),
(8, 'Иванов', 'Иван', 'Иванович', 'IV@mail.ru', '89119866140', '$2y$10$75shashzEGiKh1HWrvm0C.lTZMT95qGtrivjIZoAZ4h25x0wKlzli', '1', '1', 3, 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `professor_position`
--

CREATE TABLE `professor_position` (
  `id_position` int(11) NOT NULL,
  `position_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `professor_position`
--

INSERT INTO `professor_position` (`id_position`, `position_name`) VALUES
(1, 'доцент кафедры'),
(5, 'Заведующий кафедрой'),
(4, 'преподаватель кафедры'),
(3, 'профессор кафедры'),
(2, 'ст. преподаватель кафедры');

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(42) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `course` int(1) NOT NULL,
  `topic_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_group_name` int(11) NOT NULL,
  `access_lvl` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id_student`, `surname`, `name`, `patronymic`, `mail`, `phone`, `password`, `id_faculty`, `id_department`, `course`, `topic_name`, `id_professor`, `id_group_name`, `access_lvl`) VALUES
(2, 'admin', 'admin', 'admin', 'admin@mail.ru', '8900154233', '$2y$10$FGt1ZU2xFRw6A/J1wmItMeYwSHA.zRg9KqALPkNwhrOiKbbcMnTA2', 3, 1, 5, NULL, NULL, 16, 5),
(3, 'Лукина', 'Юлия', 'Павловна', 'lukina.julie@yandex.ru', '89006465119', '$2y$10$9cnuGzrO0yhm6Bi.SHJ3eug63M72jXaKofrk54059912jtWIVTEku', 3, 11, 5, 'Разработка информационной системы автоматизации государственной итоговой аттестации', 6, 16, 2),
(4, 'Шишова', 'Анна', 'Юрьевна', 'mail@mail.ru', '890077777777', '$2y$10$sX4XZ9.PjAm1ucG/8aMm7Oe3/XCPgt2IXKaWAAHklTDv7yPleyKMy', 3, 11, 5, NULL, NULL, 16, 2),
(9, 'Урунова', 'Мубина', 'Уктамовна', 'Urunova@mail.ru', '89006478890', '$2y$10$wGI/z7aDqwSmI9Hev.jbvu/HjlXsr6kIACz/2LQIF8F48YTPYh7Im', 3, 11, 5, 'Разработка информационной системы обработки заявок для технической поддержки', 6, 16, 2),
(10, 'Соколова', 'София', 'Ивановна', 'sokol@gmail.com', '89119554563', '$2y$10$wprI0lZt8M4bxrCgaDTzKOiHbzUXm9WeWwP/TBK1hgJ1Ushyx00NG', 3, 12, 4, NULL, NULL, 9, 1),
(11, 'Трофимов', 'Ярослав', 'Вадимович', 'trof.yarik@maol.ru', '89119953685', '$2y$10$japHKyhrQuCZiCzBVsA0R.rZEZHbc0lVLNxT6chu67ks002NHem/m', 3, 12, 4, NULL, NULL, 9, 1),
(12, 'Березина', 'Вероника', 'Давидовна', 'berezina.vera@mail.ru', '89009745860', '$2y$10$quSGEtg99phlknBwiOvWiuqBB4FusRnn31f45nynXGyZFn47bq4Vu', 3, 12, 4, NULL, NULL, 9, 1),
(13, 'Орлова', 'Вероника', 'Михайловна', 'orel@mail.ru', '89116587115', '$2y$10$pJDUoyGogbOFHXniqBmdOOylkJTUWDX4wu6kE1XUobbyOXIj4eFtG', 3, 12, 4, NULL, NULL, 9, 1),
(14, 'Сальников', 'Виктор', 'Ильич', 'sal.v@mail.ru', '89005679330', '$2y$10$yAdfD83SPLxqKD4e9b1YjOHiPFR5P7/UtcHFFcKm/1ttW4XhQmtAK', 3, 12, 4, NULL, NULL, 9, 1),
(15, 'Гаврилова', 'Арина', 'Сергеевна', 'arya@mail.ru', '89115487890', '$2y$10$AkrkYydPEQ1IpYGLeetKc.fR3jh9f0JqQxcmUO.YEXue5WMSkBA0S', 3, 11, 4, NULL, NULL, 17, 1),
(16, 'Зайцев', 'Егор', 'Кириллович', 'Zaytsev.E@mail.ru', '89613546545', '$2y$10$eVMgvQDUFID2Tls/Mry2Ie0/fG8k2imkT1cNUqHqckvI5I.Yu6Tj6', 2, 6, 4, NULL, NULL, 1, 1),
(17, 'Тихонов', 'Артемий', 'Тимофеевич', 'tich@mail.ru', '89005911234', '$2y$10$/fUkC9C5Y5Y4.43gJ5PAQ.sueMBn0iCsk99XcM9XtlRKPg0NW2T0O', 3, 11, 4, NULL, NULL, 17, 1),
(18, 'Савина', 'Александра', 'Павловна', 'Alexandra-S@mail.ru', '89114567921', '$2y$10$1W7v9v4wOmkqnUd6b6J2qO2pJdmpIqb3AAuPF.flbr9Fg9/kvoFJm', 3, 12, 4, NULL, NULL, 9, 1),
(19, 'Иванников', 'Святослав', 'Юрьевич', 'SPB_Ivannikov_Svyatoslav@mail.ru', '+79992410523', '$2y$10$5efV5VhbFnE5ah5UlHuaUukCb5pi.vTUmE8J7uF8ZrJhwQHlGpdoy', 3, 11, 5, 'Разработка программного ядра изометрических компьютерных игр', 3, 16, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `academic_title`
--
ALTER TABLE `academic_title`
  ADD PRIMARY KEY (`id_title`),
  ADD UNIQUE KEY `title_name` (`title_name`),
  ADD UNIQUE KEY `title_abbreviation` (`title_abbreviation`);

--
-- Индексы таблицы `access_lvl`
--
ALTER TABLE `access_lvl`
  ADD PRIMARY KEY (`Id_access`),
  ADD UNIQUE KEY `access_name` (`access_name`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`),
  ADD UNIQUE KEY `department_name` (`department_name`),
  ADD UNIQUE KEY `department_abbreviation` (`department_abbreviation`);

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id_faculty`),
  ADD UNIQUE KEY `faculty_name` (`faculty_name`),
  ADD UNIQUE KEY `abbreviation` (`faculty_abbreviation`),
  ADD UNIQUE KEY `faculty_abbreviation` (`faculty_abbreviation`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Индексы таблицы `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Индексы таблицы `professor_position`
--
ALTER TABLE `professor_position`
  ADD PRIMARY KEY (`id_position`),
  ADD UNIQUE KEY `position_name` (`position_name`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `academic_title`
--
ALTER TABLE `academic_title`
  MODIFY `id_title` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `access_lvl`
--
ALTER TABLE `access_lvl`
  MODIFY `Id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id_faculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `professor_position`
--
ALTER TABLE `professor_position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
