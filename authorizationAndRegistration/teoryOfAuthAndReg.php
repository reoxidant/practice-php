<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div style="float:left; display: inline-block; ">
		<p>Форма регистрации.</p>
		<form action="" method="POST">
			<p>
				Логин:<br>
				<input type="text" name="login">
			</p>
			<p>
				Пароль:<br>
				<input type="password" name="password">
			</p>
			<p>
				Подтверждение пароля:<br>
				<input type="password" name="pass_confirm">
			</p>
			<input type="submit" name="submit" value="Отправить">
		</form>
		<br>

	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'reg';

		$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name) or die (mysqli_error($link));
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
			id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			login VARCHAR(100) NOT NULL,
			password VARCHAR(100) NOT NULL,
			salt VARCHAR(100) NOT NULL
			)") or die (mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link));

		if(!empty($_REQUEST['pass_confirm']) and !empty($_REQUEST['login']) and !empty($_REQUEST['password']) and isset($_REQUEST['submit'])){
			$login = $_REQUEST['login'];
			$password = $_REQUEST['password'];
			$pass_confirm = $_REQUEST['pass_confirm'];

			if($password == $pass_confirm){
				$is_login_free = mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'") or die (mysqli_error($link)."55");
				if(mysqli_num_rows($is_login_free) == 0){
					$salt = generateSalt();
					$saltedPassword = md5($password.$salt);
					mysqli_query($link, "INSERT INTO users SET login='".$login."', password='".$saltedPassword."', salt='".$salt."'") or die (mysqli_error($link));
					echo "Вы успешно зарегистрировались!";
				}else{
					echo "Такой логин занят!";
				}
			}else{
				echo "Пароли не совпадают!";
			}
		}else if(isset($_REQUEST['submit'])){
			echo "Поля пустые.";
		}
	?>
	<?php 
		function generateSalt()
		{
			$salt = '';
			$length = 8;
			for ($i=0; $i < $length; $i++) { 
				$salt .= chr(mt_rand(33,126));
			}
			return $salt;
		}
	?>
	</div>
	
	<div style="display: inline-block; padding-left: 50px;">
		<p>Форма авторизации.</p>
		<form action="" method="POST">
			<p>Логин:<br><input type="text" name="a_login"></p>
			<p>Пароль:<br><input type="password" name="a_password"></p>
			<input type="submit" name="submit2">
		</form>
		<br>
		<?php 
		if(!empty($_REQUEST['a_password']) and !empty($_REQUEST['a_login']) and isset($_REQUEST['submit2'])){

			$login = $_REQUEST['a_login'];
			$password = $_REQUEST['a_password'];
			
			$result = mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'") or die (mysqli_error($link));

			$user = mysqli_fetch_assoc($result);

			if(!empty($user)){

				$salt = $user['salt'];
				$saltedPassword = md5($password.$salt);

				if($user['password'] == $saltedPassword){

					$_SESSION['auth'] = true;
					$_SESSION['id'] = $user['id'];
					$_SESSION['login'] = $user['login'];

					if($_SESSION['auth'] == true){
						echo "Вы успешно авторизовались!";
					}

				}else{
					echo "Неправильный логин или пароль!";
				}
			}else{
				echo "Неправильный логин или пароль!";
			} 
		}else if(isset($_REQUEST['submit2'])){
			echo "Вы не ввели все поля!";
		}
	?>
	</div>
</body>
</html>

