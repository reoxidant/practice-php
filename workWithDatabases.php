<!-- <?php 
	//Устанавливает доступы к базе данных:
	$host = 'localhost';//имя хоста, на локальном компьютере это localhost
	$user = 'root'; //имя пользователя, по умолчанию - root
	$password = ''; //пароль - пустой
	$db_name = 'test';//имя базы данных

	//Соединяемся с базой данных использую наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name);

	/*
		Соединение записывается в переменную $link,
		которая используется дальше для работы mysqi_query.
	*/
?> -->

<!-- <?php
	$host = 'localhost';
	$user = 'root';
	$password ="";
	$db_name = 'test';

	//Соединяемся с базой данных используя наши доступы:
	mysqli_connect($host, $user, $possword, $db_name) or die(mysqli_error($link));

	//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
	mysqli_query($link, "SET NAMES 'utf8'");

	//Формируем тестовый запрос:
	$query = "SELECT * FROM workers WHERE id > 0";

	//Делаем запрос к БД, результат запроса пишем в $result:
	$result = mysqli_query($link, $query) or die(mysqli_error($link));

	//Запись в обычный массив $date[]
	for($date = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

?> -->
