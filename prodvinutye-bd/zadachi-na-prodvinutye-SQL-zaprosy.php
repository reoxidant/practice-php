<?php
//Задачи для решения
//Во всех задачах ниже считайте, что таблица workers имеет поля id, login, salary, age, date, description (и другие при необходимости).

//На IN
//Для решения задач данного блока вам понадобятся следующие SQL команды и функции: IN.

//TODO 1. Выберите из таблицы workers записи с id равным 1, 2, 3, 5, 14.
//SELECT * FROM workers WHERE id IN(1,2,3,4,5,14)

//TODO 2. Выберите из таблицы workers записи с login равным 'eee', 'bbb', 'zzz'
//SELECT * FROM workers WHERE login IN('eee','bbb','zzz');

//TODO 3. Выберите из таблицы workers записи с id равным 1, 2, 3, 7, 9, и логином, равным 'user', 'admin', 'ivan' и зарплатой больше 300.
//SELECT * FROM workers WHERE id IN(1,2,3,7,9) AND login IN('user','admin','ivan') AND salary > 300

//На BETWEEN
//TODO 4. Выберите из таблицы workers записи c зарплатой от 100 до 1000.
//SELECT * FROM workers salary BETWEEN 100 AND 1000

//TODO 5. Выберите из таблицы workers записи c id от 3 до 10 и зарплатой от 300 до 500.
//SELECT * FROM workers WHERE id BETWEEN 3 AND 100 AND salary BETWEEN 300 AND 500

//На JOIN
//TODO 69. Даны две таблицы: таблица category с полями id и name и таблица page с полями id, name и category_id.
// Достаньте одним запросом все страницы вместе с их категориями.

//SELECT * FROM category LEFT JOIN page ON page.category_id = category_id

//TODO 70. Даны 3 таблицы: таблица category с полями id и name, таблица sub_category с полями id и name и таблица page с полями id, name и sub_category_id.
// Достаньте одним запросом все страницы вместе с их подкатегориями и категориями.

/*SELECT * FROM page
LEFT JOIN category ON page.category_id = category.id
LEFT JOIN sub_category ON page.sub_category_id = sub_category.id*/


