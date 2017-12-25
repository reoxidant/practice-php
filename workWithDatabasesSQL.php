<!--  
	// <-ПРИМЕРЫ

	/*$host = "localhost";
	$name = 'root';
	$password = '';
	$db_name = 'test';

	$link = mysqli_connect($host, $name, $password, $db_name) or die(mysqli_error($link));

	mysqli_query($link, "SET NAMES 'utf8'");*/

	// Задача. Выбрать работника с id=10.
	// $query = "SELECT * FROM workers WHERE id=10";

	// Задача. Выбрать работников с зарплатой 500$.
	// $query = "SELECT * FROM workers WHERE salary=500";

	// Задача. Выбрать работников с зарплатой 500$ и id больше 3.
	// $query = "SELECT * FROM workers WHERE salary=500 AND id>3";

	// Задача. Добавьте нового работника Джона, 20 лет, зарплата 700$.
	// $query = "INSERT INTO workers SET name='Джон', age=20, salary=700";
	// $query = "INSERT INTO workers (name, age, salary) VALUES ('Джон', 20, 700)";

	// Задача. Добавьте одним запросом трех новых работников: Катю, 20 лет, зарплата 500$, Юлю, 25 лет, зарплата 600$, Женю, 30 лет, зарплата 900$.
	// $query = "INSERT INTO workers (name, age, salary) VALUES ('Катя', 20, 500), ('Юля', 25, 600), ('Женя', 30, 900)";

	// Задача. Удалите работника Джона.
	// $query = "DELETE FROM workers WHERE name='Джон'";

	// Задача. Поставьте Диме зарплату в 1000$.
	// $query = "UPDATE workers SET salary=1000 WHERE name='Дима'";

	// Задача. Поставьте Диме зарплату в 1000$ и возраст 20 лет.
	// $query = "UPDATE workers SET salary=1000,age=20 WHERE name='Дима'";

	/*$result = mysqli_query($link, $query) or die (mysqli_error($link));

	for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

	var_dump($data);*/
	// <ПРИМЕРЫ
-->


<!-- <?php 
	//Тема: Задачи на основы работы с базами данных SQL
	// $host = 'localhost';
	// $user = 'root';
	// $password = '';
	// $db_name = 'test';
	// $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
	// mysqli_query($link, "SET NAMES 'utf8'");

	//Тема: Задачи на SELECT

	// 1. Выбрать работника с id = 3
	// $query = "SELECT * FROM workers WHERE id=3";

	// 2. Выбрать работников с зарплатой 1000$.
	// $query = "SELECT * FROM workers WHERE salary=1000";

	// 3. Выбрать работников в возрасте 23 года. 
	// $query = "SELECT * FROM workers WHERE age=23";

	// 4. Выбрать работников с зарплатой более 400$.
	// $query = "SELECT * FROM workers WHERE salary>400";

	// 5. Выбрать работников с зарплатой равной или большей 500$. 
	// $query = "SELECT * FROM workers WHERE salary>=500";

	// 6. Выбрать работников с зарплатой НЕ равной 500$. 
	// $query = "SELECT * FROM workers WHERE salary!=500";

	// 7. Выбрать работников с зарплатой равной или меньшей 900$.
	// $query = "SELECT * FROM workers WHERE salary<=900";

	// 8. Узнайте зарплату и возраст Васи.
	// $query = "SELECT salary, age FROM workers WHERE name='Вася'";

	// Тема: Задачи на OR и AND

	// 9. Выбрать работников в возрасте от 25 (не включительно) до 28 лет (включительно). 
	// $query = "SELECT * FROM workers WHERE age>25 AND age<=28";

	// 10. Выбрать работника Петю.
	// $query = "SELECT * FROM workers WHERE name = 'Петя'";

	// 11. Выбрать работников Петю и Васю.
	// $query = "SELECT * FROM workers WHERE name='Петя' OR name='Вася'";

	// 12. Выбрать всех, кроме работника Петя.
	// $query = "SELECT * FROM workers WHERE name != 'Петя'";

	// 13. Выбрать всех работников в возрасте 27 лет или с зарплатой 1000$.
	// $query = "SELECT * FROM workers WHERE age=27 OR salary=1000";

	// 14. Выбрать всех работников в возрасте от 23 лет (включительно) до 27 лет (не включительно) или с зарплатой 1000$.
	// $query = "SELECT * FROM workers WHERE (age>=23 AND age<27) OR salary=1000";

	// 15. Выбрать всех работников в возрасте от 23 лет до 27 лет или с зарплатой от 400$ до 1000$.
	// $query = "SELECT * FROM workers WHERE (age>23 AND age<27) OR (salary>400 AND salary<1000)";

	// 16. Выбрать всех работников в возрасте 27 лет или с зарплатой не равной 400$.
	// $query = "SELECT * FROM workers WHERE age=27 OR salary!=400";

	// Тема: Задачи на INSERT

	// 17. Добавьте нового работника Никиту, 26 лет, зарплата 300$. Воспользуйтесь первым синтаксисом.
	// $query = "INSERT INTO workers SET name='Никита', age=26, salary=300";

	// 18. Добавьте нового работника Светлану с зарплатой 1200$. Воспользуйтесь вторым синтаксисом.
	// $query = "INSERT INTO workers (name, age, salary) VALUES ('Светлана',20, 1200)";

	// 19. Добавьте двух новых работников одним запросом: Ярослава с зарплатой 1200$ и возрастом 30, Петра с зарплатой 1000$ и возрастом 31. 
	// $query = "INSERT INTO workers (name, age, salary) VALUES ('Ярослав', 30, 1200), ('Петя', 31, 1000)";

	// Тема: Задачи на DELETE

	// 20. Удалите работника с id=7.
	// $query = "DELETE FROM workers WHERE id=7";

	// 21. Удалите Колю.
	// $query = "DELETE FROM workers WHERE name='Коля'";

	// 22. Удалите всех работников, у которых возраст 23 года.
	// $query = "DELETE FROM workers WHERE age=23";

	// Задачи на UPDATE

	// 23. Поставьте Васе зарплату в 200$.
	// $query = "UPDATE workers SET salary=200 WHERE name='Вася'";

	// 24. Работнику с id=4 поставьте возраст 35 лет.
	// $query = "UPDATE workers SET age=35 WHERE id=4";

	// 25. Всем, у кого зарплата 500$ сделайте ее 700$.
	// $query = "UPDATE workers SET salary=700 WHERE salary=500";

	// 26. Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23. 
	// $query = "UPDATE workers SET age=23 WHERE id>2 AND id<5";

	// 27. Поменяйте Васю на Женю и прибавьте ему зарплату до 900$.
	// $query = "UPDATE workers SET name='Женя', salary=900 WHERE name='Вася'";

	// $result = mysqli_query($link, $query) or die(mysqli_error($link));

	// for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

	// var_dump($data);

?> -->

<!-- Тема: Команды ORDER BY, LIMIT, COUNT, LIKE в SQL -->

<?php 
	// ПРИМЕРЫ
	// $host = 'localhost';
	// $user = 'root';
	// $password = '';
	// $db_name = 'test';

	// $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));

	//В $data строки будут отсортированы по возрасту от меньшего к большему:
	// $query = "SELECT * FROM workers WHERE id>0 ORDER BY age";

	//В $data строки будут отсортированы по возрасту от большего к меньшего:
	// $query = "SELECT * FROM workers WHERE id>0 ORDER BY age DESC";

	//В $data будут строки со второй, пять штук:
	// $query = "SELECT * FROM workers WHERE id>0 LIMIT 2,5";

	//В $data будут строки со вторую, 5 штук, отсортированные по убыванию id
	// $query = "SELECT * FROM workers WHERE id>0 ORDER BY id DESC LIMIT 2,5";

	//В $result будет лежать количество строк:
	// $query = "SELECT COUNT(*) as count FROM workers WHERE id>0";
	// $result = mysqli_query($link, $query) or die(mysqli_error($link));
	// $count = mysqli_fetch_assoc($result);
	// var_dump($count);

	//ВЫБРАТЬ все ИЗ таблицы ГДЕ имя ПОДОБНО любой_строке_заканчивающейся_на_я
	// $query = "SELECT * FROM workers WHERE name LIKE '%я'";
	// $result = mysqli_query($link, $query) or die(mysqli_error($link));
	// for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	// var_dump($data);

	// ПРИМЕРЫ

	// Тема: Задачи на базы данных SQL.
	// $host = 'localhost';
	// $user = 'root';
	// $password = '';
	// $db_name = 'test';
	// $link = mysqli_connect($host,$user,$password,$db_name) or die(mysqli_error($link));
	// mysqli_query($link, "SET NAMES 'utf8'");

	// Тема: Задачи на LIMIT.

	// 1. Из таблицы workers достаньте первые 6 записей.
	// $query = "SELECT * FROM workers WHERE id>0 LIMIT 6";

	// 2. Из таблицы workers достаньте записи со вторую, 3 штуки. 
	// $query = "SELECT * FROM workers WHERE id>0 LIMIT 2,3";

	// Тема: Задачи на ORDER BY

	// 3. Из таблицы workers достаньте всех работников и отсортируйте их по возрастанию зарплаты.
	// $query = "SELECT * FROM workers ORDER BY salary";

	// 4. Из таблицы workers достаньте всех работников и отсортируйте их по убыванию зарплаты.
	// $query = "SELECT * FROM workers ORDER BY salary DESC";

	// 5. Из таблицы workers достаньте работников со второго по шестого и отсортируйте их по возрастанию возраста. 
	// $query = "SELECT * FROM workers ORDER BY age LIMIT 2,4";

	// Тема: Задачи на COUNT

	// 6. В таблице workers подсчитайте всех работников.
	// $query = "SELECT COUNT(*) as count FROM workers WHERE id>0";

	// 7. В таблице workers подсчитайте всех работников c зарплатой 300$. 
	// $query = "SELECT COUNT(*) as count FROM workers WHERE salary=300";

	// Тема: Задачи на LIKE.

	// 8. В таблице pages найти строки, в которых фамилия автора заканчивается на "ов". 
	// $query = "SELECT * FROM pages WHERE athor LIKE '%ов'";

	// 9. В таблице pages найти строки, в которых есть слово "элемент" (искать только по колонке article). 
	// $query = "SELECT * FROM pages WHERE article LIKE '%элемент%'";

	// 10. В таблице workers найти строки, в которых возраст работника начинается с числа 3, а далее идет только одна цифра. 
	// $query = "SELECT * FROM workers WHERE age LIKE '3_'";

	// 11. В таблице workers найти строки, в которых имя работника заканчивается на "я". 
	// $query = "SELECT * FROM workers WHERE name LIKE '%я'";
	
	// $result = mysqli_query($link, $query) or die(mysqli_error($link));
	// for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	// var_dump($data);
	
?>
