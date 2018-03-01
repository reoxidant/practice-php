<?php 
	session_start(); 
?>
<!-- 1. Сделайте авторизацию по таблице со следующими полями: имя, фамилия, email (+логин, пароль и другое, что нужно). Все задачи ниже относятся к данной таблице, если не сказано иное. -->
<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'auth';

	$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
	mysqli_select_db($link, $db_name) or die(mysqli_error($link));
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(id INT(4) AUTO_INCREMENT PRIMARY KEY, login VARCHAR(100), password VARCHAR(100), name VARCHAR(100), surname VARCHAR(100), email VARCHAR(100))") or die(mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link));

	$user_login = 'user';
	$user_pass = '12345';
	$user_name = 'pavel';
	$user_surname = 'durov';
	$user_email = 'durov@gmail.com';

	$admin_login = 'admin';
	$admin_pass = '54321';
	$admin_name = 'steve';
	$admin_surname = 'jobs';
	$admin_email = 'jobs@gmail.com';

	$queryUser = "INSERT INTO users SET login='$user_login', password='$user_pass', name='$user_name', surname='$user_surname', email='$user_email'";
	mysqli_query($link, $queryUser) or die (mysqli_error($link));

	$queryAdmin = "INSERT INTO users SET login='$admin_login', password='$admin_pass', name='$admin_name', surname='$admin_surname', email='$admin_email'";
	mysqli_query($link, $queryAdmin) or die (mysqli_error($link));

	if(!empty($_REQUEST['password']) and !empty($_REQUEST['login']) and !empty($_REQUEST['name']) and !empty($_REQUEST['surname']) and !empty($_REQUEST['email'])){
		$login = $_REQUEST['login'];
		$password = $_REQUEST['password'];
		$name = $_REQUEST['name'];
		$surname = $_REQUEST['surname'];
		$email = $_REQUEST['email'];

		$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password' AND name='$name' AND surname='$surname' AND email='$email'";
		$result = mysqli_query($link, $query) or die (mysqli_error($link));
		$user = mysqli_fetch_assoc($result);
		if(!empty($user)){
			$SESSION['auth'] = true;
			$SESSION['login'] = $user['login'];
			$SESSION['password'] = $user['password'];
			echo "Добро пожаловать, ".$user['name']."!";
		} else {
			echo "Некорректный логин или пароль.";
		}
	}
?>

<form action="" method="POST">
	<p>Введите логин:<br><input type="text" name="login"></p>
	<p>Введите пароль:<br><input type="password" name="password"></p>
	<p>Введите свое имя:<br><input type="text" name="name"></p>
	<p>Введите свою фамилию:<br><input type="text" name="surname"></p>
	<p>Введите свой e-mail:<br><input type="email" name="email"></p>
	<input type="submit" value="Отправить">
</form>