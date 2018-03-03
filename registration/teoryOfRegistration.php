<form action="" method="POST">
	<p>
		логин: 	<br>	
		<input name="login" type="login" value="<?php echo isset($_POST['login']) ? $_POST['login']:'';?>">
	</p>
	<p>
		пароль: <br>
		<input name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password']:'';?>">
	</p>
	<p>
		подтвердите введеный пароль:
		<br><input name="password_confirm" type="password" value="<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm']:'';?>">
	</p>
	<input type="submit" value="Отправить">
</form>

<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'reg';

	$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link));
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die (mysqli_error($link));
	mysqli_select_db($link, $db_name) or die(mysqli_error($link));
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
		id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(100) NOT NULL,
		password VARCHAR(100) NOT NULL,
		UNIQUE KEY us (login)
		)") or die (mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link));

	if(!empty($_REQUEST['password']) and !empty($_REQUEST['password_confirm'] and !empty($_REQUEST['login']))){
		$login = $_REQUEST['login'];
		$password = $_REQUEST['password'];
		$password_confirm = $_REQUEST['password_confirm'];

		echo $login."<br>";
		$isTrue = mysqli_query($link, "SELECT * FROM users WHERE login='$login'");

		if($password_confirm == $password){
			$query = 'SELECT * FROM users WHERE login="'.$login.'"';
			$is_login_free = mysqli_query($link, $query) or die(mysqli_error($link));

			if(mysqli_num_rows($is_login_free) == 0){
				$query = 'INSERT INTO users SET login="'.$login.'", password="'.$password.'"';
				mysqli_query($link, $query) or die(mysqli_error($link));
				echo "Вы успешно зарегистрировались!";
			}else{
				echo "Такой логин уже занят!";
			}
		} else{
			echo "Пароли не совпадают.";
		}
	}else{
		echo "Не были заполнены поля!";
	}
?>