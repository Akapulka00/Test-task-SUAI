-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 12 2022 г., 10:04
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `suai`
--

-- --------------------------------------------------------

--
-- Структура таблицы `group_lesson`
--

CREATE TABLE `group_lesson` (
  `ID_group` int NOT NULL,
  `ID_lesson` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `group_lesson`
--

INSERT INTO `group_lesson` (`ID_group`, `ID_lesson`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `gruppa`
--

CREATE TABLE `gruppa` (
  `ID` int NOT NULL,
  `group_number` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `num_stud` int NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gruppa`
--

INSERT INTO `gruppa` (`ID`, `group_number`, `specialization`, `num_stud`, `year`) VALUES
(1, '1742', '090301', 27, 2017),
(2, '1722', '09331', 22, 2017);

-- --------------------------------------------------------

--
-- Структура таблицы `inspector`
--

CREATE TABLE `inspector` (
  `ID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `degree` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `inspector`
--

INSERT INTO `inspector` (`ID`, `name`, `surname`, `patronymic`, `degree`) VALUES
(1, 'Сыщиков', 'Алексей', 'Юрьевич', 'доцент');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `ID` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `auditorium` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`ID`, `title`, `auditorium`, `date`) VALUES
(1, 'МПДС', '52-01', '2008-11-11'),
(2, 'Физра', '14-43', '2008-12-12');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_inspector`
--

CREATE TABLE `lesson_inspector` (
  `ID_inspector` int NOT NULL,
  `ID_lesson` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lesson_inspector`
--

INSERT INTO `lesson_inspector` (`ID_inspector`, `ID_lesson`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `ID` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`ID`, `name`, `surname`, `patronymic`, `year`) VALUES
(1, 'Vadim', 'Sedov', 'Aleksandrovisch', 1999),
(2, 'Anna', 'Lukianova', 'Olegovna', 1998);

-- --------------------------------------------------------

--
-- Структура таблицы `students_group`
--

CREATE TABLE `students_group` (
  `ID_students` int NOT NULL,
  `ID_group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `students_group`
--

INSERT INTO `students_group` (`ID_students`, `ID_group`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `stud_task`
--

CREATE TABLE `stud_task` (
  `ID_stud` int NOT NULL,
  `ID_task` int NOT NULL,
  `stat` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `stud_task`
--

INSERT INTO `stud_task` (`ID_stud`, `ID_task`, `stat`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `ID` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `max` int NOT NULL,
  `assigned_to_stu` int DEFAULT NULL,
  `assigned_to_grou` int DEFAULT NULL,
  `assigned_to_lesson` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`ID`, `title`, `date`, `max`, `assigned_to_stu`, `assigned_to_grou`, `assigned_to_lesson`) VALUES
(1, 'Мпдс-лаб1', '2022-01-02', 10, 1, 1, NULL),
(2, 'Спец задание', '2022-03-02', 20, 1, NULL, NULL),
(3, 'Физра', '2028-01-02', 10, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `task_inspector`
--

CREATE TABLE `task_inspector` (
  `ID_inspector` int NOT NULL,
  `ID_task` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `task_inspector`
--

INSERT INTO `task_inspector` (`ID_inspector`, `ID_task`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `group_lesson`
--
ALTER TABLE `group_lesson`
  ADD PRIMARY KEY (`ID_group`,`ID_lesson`),
  ADD KEY `ID_lesson` (`ID_lesson`),
  ADD KEY `ID_group` (`ID_group`);

--
-- Индексы таблицы `gruppa`
--
ALTER TABLE `gruppa`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `inspector`
--
ALTER TABLE `inspector`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `lesson_inspector`
--
ALTER TABLE `lesson_inspector`
  ADD PRIMARY KEY (`ID_inspector`,`ID_lesson`),
  ADD KEY `ID_inspector` (`ID_inspector`),
  ADD KEY `ID_lesson` (`ID_lesson`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `students_group`
--
ALTER TABLE `students_group`
  ADD PRIMARY KEY (`ID_students`,`ID_group`),
  ADD KEY `ID_students` (`ID_students`),
  ADD KEY `ID_group` (`ID_group`);

--
-- Индексы таблицы `stud_task`
--
ALTER TABLE `stud_task`
  ADD PRIMARY KEY (`ID_stud`,`ID_task`),
  ADD KEY `ID_task` (`ID_task`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `task_inspector`
--
ALTER TABLE `task_inspector`
  ADD PRIMARY KEY (`ID_inspector`,`ID_task`),
  ADD KEY `ID_task` (`ID_task`),
  ADD KEY `ID_inspector` (`ID_inspector`),
  ADD KEY `ID_task_2` (`ID_task`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gruppa`
--
ALTER TABLE `gruppa`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `inspector`
--
ALTER TABLE `inspector`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group_lesson`
--
ALTER TABLE `group_lesson`
  ADD CONSTRAINT `group_lesson_ibfk_1` FOREIGN KEY (`ID_lesson`) REFERENCES `lesson` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `group_lesson_ibfk_2` FOREIGN KEY (`ID_group`) REFERENCES `gruppa` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `lesson_inspector`
--
ALTER TABLE `lesson_inspector`
  ADD CONSTRAINT `lesson_inspector_ibfk_1` FOREIGN KEY (`ID_inspector`) REFERENCES `inspector` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lesson_inspector_ibfk_2` FOREIGN KEY (`ID_lesson`) REFERENCES `lesson` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `students_group`
--
ALTER TABLE `students_group`
  ADD CONSTRAINT `students_group_ibfk_1` FOREIGN KEY (`ID_group`) REFERENCES `gruppa` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `students_group_ibfk_2` FOREIGN KEY (`ID_students`) REFERENCES `students` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `stud_task`
--
ALTER TABLE `stud_task`
  ADD CONSTRAINT `stud_task_ibfk_1` FOREIGN KEY (`ID_stud`) REFERENCES `students` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `stud_task_ibfk_2` FOREIGN KEY (`ID_task`) REFERENCES `task` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `task_inspector`
--
ALTER TABLE `task_inspector`
  ADD CONSTRAINT `task_inspector_ibfk_1` FOREIGN KEY (`ID_inspector`) REFERENCES `inspector` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_inspector_ibfk_2` FOREIGN KEY (`ID_task`) REFERENCES `task` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
