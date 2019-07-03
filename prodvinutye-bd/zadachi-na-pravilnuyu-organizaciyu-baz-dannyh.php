<?php
//Задачи для решения

/*В задачах данного блока вам необходимо написать нормализованные таблицы и поля в этих таблицах.
Затем написать запросы по этим таблицам (если это указано в задаче).
В ответах на задачи таблицы описаны следующим образом: таблица1(поле1, поле2...), таблица2(поле1, поле2...).*/

//Простое связывание

/*1. Товар (название, цена, количество), категория товара.
Запросы: (1) достать товары вместе с категориями,
TODO (2) достать товары из категории 'Овощи',
TODO (3) достать товары из категорий 'Овощи', 'Мясо', 'Морепродукты',
TODO (4) достать все категории (без товаров, только названия категорий),
TODO (5) достать все категории, в которых есть товары (без товаров, только названия категорий, без дублей).*/

/*1. SELECT product.name, product.price, product.count
FROM product
LEFT JOIN category ON product.category_id = category.id;*/

/*2. SELECT * FROM goods
INNER JOIN category
ON
goods.category_id = category.id
WHERE category.name = 'Овощи';*/

/*3. SELECT * FROM goods
INNER JOIN category
ON
goods.category_id = category.id
WHERE category.name IN('Овощи','Мясо','Морепродукты'); */

//4.  SELECT category.name FROM category

/*5. SELECT DISTINCT category.name FROM category
INNER JOIN goods
ON
category.id = goods.category_id*/

/*2.  Товар (название, цена, количество), подкатегория товара, категория товара.
Товар принадлежит подкатегории, подкатегория — категории.
Пример: помидорки черри (товар), помидоры (подкатегория), овощи (категория).
Запросы:
TODO (1) достать товары вместе с подкатегориями и категориями,
TODO (2) достать товары из подкатегории 'Помидоры',
TODO (3) достать все подкатегории категории 'Овощи'.*/

/*1. SELECT * FROM goods
JOIN
subcategory
ON goods.subcategory_id = subcategory.id
JOIN
category
ON subcategory.category_id = category.id*/

/*2. SELECT * FROM goods
INNER JOIN subcategory
ON goods.subcategory_id = subcategory.id WHERE subcategory.name = 'Помидоры'*/

/*3. SELECT * FROM subcategory
INNER JOIN
category
ON subcategory.category_id = category.id
WHERE category.name = 'Овощи'*/

/*3. Товар, категория, склад, брэнд. Товар принадлежит категории, складу и бренду.
Запросы:
//TODO (1) достать товары с их категорией, складом и брэндом, (2) достать все склады. */

//1.
/*SELECT * FROM goods
LEFT JOIN category
ON goods.category_id = category.id
LEFT JOIN warehouse
ON category.warehouse_id = warehouse.id
LEFT JOIN brand ON warehouse.brand_id = brand.id*/

//2.
//SELECT * FROM warehouse

/*4. Товар, подкатегория, категория, склад, брэнд.
Последние 3 никак не связаны, подкатегория принадлежит категории (например, помидоры овощам).
TODO Запросы: (1) достать товары с их подкатегорией и категорией, складом и брэндом. */

/*1)
SELECT * FROM goods
JOIN LEFT subcategory ON goods.id_subcategory = subcategory.id
JOIN LEFT category ON subcategory.id_category = category.id
UNION SELECT * FROM warehouse UNION SELECT * FROM brand*/

/*5. Пользователь, его город.
Запросы:
TODO (1) достать пользователей вместе с их городом,
TODO (2) достать все города,
TODO (3) достать всех пользователей из города Минск,
TODO (4) достать все города, в которых есть пользователи,
TODO (5) достать все города, в которых нет пользователей,
TODO (6) вывести список городов с количеством пользователей в них,
TODO (7) вывести список городов, в которых количество пользователей больше трех. */

/*1) SELECT * FROM users
JOIN LEFT city ON users.id_city = city.id*/
//2) SELECT * FROM city
//3) SELECT * FROM user JOIN LEFT city ON user.city_id = city.id WHERE city.name = 'Минск'
//4) SELECT * FROM user JOIN LEFT city ON user.city_id = city.id WHERE user.city_id IN NOT NULL
//5) SELECT * FROM user JOIN LEF city ON user.city_id = city.id WHERE user.city_id IS NULL
//6) SELECT city.name, COUNT(user.city_id) AS cityUsers FROM city RIGHT JOIN user ON city.id = user.city_id
//7) SELECT city.name, COUNT(user.city_id) as cityUsers FROM city JOIN RIGHT user ON city.id = user.city_id WHERE COUNT(user.city_id) > 3

/*6. Пользователь, его город, страна.
Запросы:
TODO (1) достать всех пользователей вместе с их городом и страной,
TODO (2) достать все города с их странами,
TODO (3) достать всех пользователей из страны Беларусь (без городов),
TODO (4) достать всех пользователей из города Минск (без страны),
TODO (5) вывести список стран с количеством пользователей в них. */

/*1) SELECT * FROM user
JOIN LEFT city
ON
user.city_id = city.id
JOIN LEFT
country
ON city.county_id = county.id*/

/*2) SELECT city.name, country.name FROM city
JOIN LEFT country
ON city.country_id = country.id*/

/*3) SELECT county.name FROM user
JOIN LEFT city
ON user.city_id = city.id JOIN LEFT county ON city.country_id = country.id WHERE country.name = 'Беларусь'*/

//4) SELECT user.name, city.name FROM user JOIN LEFT city ON user.city_id = city.id WHERE city.name = 'Минск'

/*5) SELECT country.name, COUNT(city_id) FROM user
LEFT JOIN city ON user.city_id = city.id LEFT JOIN country ON city.country_id = country.id*/