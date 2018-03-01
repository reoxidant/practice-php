<?php session_start(); 
	setcookie('dtime', date('Y-m-d H:i:s'), time()+3600*24*31, '/');
?>
<!-- 2.  Сделайте так, чтобы все данные из таблицы хранились в сессии. -->
<?php 
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'auth';

	$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link)."1");
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link)."2");
	mysqli_select_db($link, $db_name) or die (mysqli_error($link)."3");
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
		id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		login VARCHAR(100) NOT NULL, 
		password VARCHAR(100) NOT NULL, 
		name VARCHAR(100) NOT NULL, 
		surname VARCHAR(100) NOT NULL, 
		email VARCHAR(100) NOT NULL,
		dtime VARCHAR(100) NOT NULL,
		UNIQUE KEY us (login, email)
		)") or die (mysqli_error($link)."4");
	mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link)."5");

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

	$queryUser = "INSERT IGNORE INTO users SET login='$user_login', password='$user_pass', name='$user_name', surname='$user_surname', email='$user_email'";
	mysqli_query($link, $queryUser) or die(mysqli_error($link));

	$queryAdmin = "INSERT IGNORE INTO users SET login='$admin_login', password='$admin_pass', name='$admin_name', surname='$admin_surname', email='$admin_email'";
	mysqli_query($link, $queryAdmin) or die(mysqli_error($link));

	if(!empty($_REQUEST['login']) AND !empty($_REQUEST['password']) AND !empty($_REQUEST['name']) AND !empty($_REQUEST['surname']) AND !empty($_REQUEST['email'])){

		$login = $_REQUEST['login'];
		$password = $_REQUEST['password'];
		$name = $_REQUEST['name'];
		$surname = $_REQUEST['surname'];
		$email = $_REQUEST['email'];

		$resutl = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND password='$password' AND name='$name' AND surname='$surname' AND email='$email'") or die(mysqli_error($link));
		$user = mysqli_fetch_assoc($resutl);

		if(!empty($user)){
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $user['login'];
			$_SESSION['password'] = $user['password'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['surname'] = $user['surname'];
			$_SESSION['email'] = $user['email'];
			echo 'Добро пожаловать, '.$user['name']." ".$user['surname']."!";
		}else{
			echo "Неверный логин или пароль.";
		}

		// echo user('home');
		// echo isAuth();
		// echo isNotAuth();
		// echo getUser(1, $link);
		// echo loginTime($link, $login);
	}
?>

<?php 
	function loginTime($link, $login){
		if($_SESSION['auth'] == true){
			$time = isset($_COOKIE['dtime']) ? $_COOKIE['dtime'] : 'никогда';
			mysqli_query($link, "UPDATE users SET dtime='$time' WHERE login='$login'") or die (mysqli_error($link));
			return "<br>"."Дата последнего входа на сайт ".$time.".";
		}else{
			return "<br>"."Пользователь не авторизован!";
		}
	}
?> 

<?php 
	function user($value)
	{
		if(isset($_SESSION[$value])){
			return $_SESSION[$value];
		} else {
			return "Такого значения нет в массиве.";
		}
	}
?>

<?php 
	function isAuth()
	{
		if($_SESSION['auth'] != false AND isset($_SESSION['auth'])){
			return true;
		} else {
			return false;
		}
	}
?>

<?php 
	function isNotAuth()
	{
		if($_SESSION['auth'] != true AND !isset($_SESSION['auth'])){
			return true;
		} else {
			return false;
		}
	}
?>

<?php 
	function getUser($id='', $link)
	{
		if(!empty($id)){
			$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
			$user = mysqli_fetch_assoc($result) or die (mysqli_error($link));
			return "Пользователь: ".$user['name']." ".$user['surname']." email: ".$user['email'].".";
		}else{
			if(isset($_SESSION['auth'])){
				return "Пользователь: ".$_SESSION['name']." ".$_SESSION['surname']." email: ".$_SESSION['email'].".";
			} else {
				return "Сессия и id пользователя не существует.";
			}
		}
	}
?>

<?php 
	
?>

<form action="" method="POST">
	<p>Введите логин:<br><input type="text" name="login"></p>
	<p>Введите пароль:<br><input type="password" name="password"></p>
	<p>Введите свое имя:<br><input type="text" name="name"></p>
	<p>Введите свою фамилию:<br><input type="text" name="surname"></p>
	<p>Введите свой e-mail:<br><input type="email" name="email"></p>
	<input type="submit" value="Отправить">
</form>