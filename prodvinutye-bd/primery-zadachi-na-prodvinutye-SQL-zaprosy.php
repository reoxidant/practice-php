<?php
//Тема: Задачи на продвинутые SQL запросы

//Задача №1
//Задача. Выберите из таблицы workers записи с id равным 3, 5, 6, 10.

//SELECT * FROM workers WHERE id IN(3,5,6,10)

//Задача №2
//Задача. Выберите из таблицы workers записи с id равным 3, 5, 6, 10 и логином, равным 'eee', 'zzz' или 'ggg'.

//SELECT * FROM workers WHERE id IN(1,2,4) AND login IN('eee','ggg','zzz')

//Задача №3
//Задача. Выберите из таблицы workers записи c зарплатой от 500 до 1500.

//SELECT * FROM workers WHERE price BETWEEN 500 AND 1500;

//Задача №4.
//Выберите из таблицы workers все записи так, чтобы вместо id было workersId, вместо login – workersLogin, вместо salary - workersSalary.
//SELECT workers.id AS workersId, workers.login as workersLogin, workers.price as workersSalary FROM workers

//Задача №5.
//Задача. Найдите в таблице workers минимальный возраст.

//SELECT min(workers.age) FROM workers

//Задача №6
//Задача. Найдите в таблице workers суммарный возраст.

//SELECT SUM(workers.age) FROM workers

//Задача №7
//Задача. Вставьте в таблицу workers запись с полем date с текущим моментом времени в формате 'год-месяц-день часы:минуты:секунды'.

//INSERT INTO workers (name,date) VALUES('Вася', NOW())

//Задача №8
//Задача. Вставьте в таблицу workers запись с полем date с текущей датой в формате 'год-месяц-день'.

//INSERT INTO workers (name, date) VALUES('Петя', CURDATE())

//Задача №9
//Задача. При выборке из таблицы workers запишите день, месяц и год в отдельные поля.

/*SELECT EXTRACT(DAY FROM date) AS day,
    EXTRACT(MONTH FROM date) AS month,
    EXTRACT(YEAR FROM date) AS year
FROM workers*/

//Задача №10
//Задача. Выберите из таблицы workers записи, в которых минуты больше секунд.

//SELECT * FROM workers WHERE HOUR(date) > SECOND(date)

//Задача №11
//Задача. При выборке из таблицы workers прибавьте к дате 1 год.

//SELECT DATE_ADD(date, INTERVAL - 1 YEAR) as date FROM workers
//или
//SELECT date + INTERVAL 1 YEAR as date FROM workers

//Задача №12
//Задача. При выборке из таблицы workers отнимите от даты 1 год.

//SELECT DATE_ADD(date, INTERVAL - 1 YEAR) as date FROM workers
//или
//SELECT date - INTERVAL 1 YEAR as date FROM workers

//Задача №13
//Задача. При выборке из таблицы workers прибавьте к дате 3 года, 4 месяца.

//SELECT DATE_ADD(date, INTERVAL '3:4' YEAR_MONTH) as date FROM workers
//или
//SELECT data + INTERVAL 3 YEAR + INTERVAL 4 MONTH as date FROM workers

//Задача №14
//Задача. При выборке из таблицы workers прибавьте к дате 3 дня и отнимите 2 часа.

//SELECT + INTERVAL 3 DAY - INVERVAL HOUR 2 FROM workers
