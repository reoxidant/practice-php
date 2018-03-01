<?php 
	session_start();
?>
<?php  
	$host = 'localhost';
	$user = 'root';	
	$password = '';
	$db_name = 'test';

	$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
	mysqli_select_db($link, $db_name);
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(id INT(4) NULL AUTO_INCREMENT PRIMARY KEY, login VARCHAR(100), password VARCHAR(100))") or die(mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8'");

	$user_log = 'user';
	$admin_log = 'admin';
	$user_pass = md5('12345');
	$admin_pass = md5('54321');

	$queryUser = "INSERT INTO users SET login='$user_log', password='$user_pass'";
	$queryAdmin = "INSERT INTO users SET login='$admin_log', password='$admin_pass'";
	mysqli_query($link, $queryUser) or die(mysqli_error($link));
	mysqli_query($link, $queryAdmin) or die(mysqli_error($link));

	if(!empty($_REQUEST['login']) and !empty($_REQUEST['password'])){
		$login = $_REQUEST['login'];
		$password = md5($_REQUEST['password']);

	$query = 'SELECT*FROM users WHERE login="'.$login.'" AND password="'.$password.'"';

	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);
	if(!empty($user)){
		
		$_SESSION['auth'] = true;
		$_SESSION['id'] = $user['id'];
		$_SESSION['login'] = $user['login'];
		echo "Добро пожаловать, ".$_SESSION['login']."!";
	} else {
		echo "Неправильный логин или пароль.";
	}
}
?>

<form action="" method="POST">
	<p>Введите логин:<br><input type="text" name="login"></p>
	<p>Введите пароль:<br><input type="password" name="password"></p>
	<input type="submit" value="Отправить">
</form>