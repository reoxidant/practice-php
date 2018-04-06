<?php 
	define('KEY', true);

	include('../config.php');
	include('../bd/bd.php');
	include('../scripts/func/main.php');

	session_start();

	$id = isset($_SESSION['id'])? $_SESSION['id'] : '';
	$login = isset($_SESSION['login'])? $_SESSION['login'] : $_COOKIE['login'];

	$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die (mysqli_error($link));

	$user = mysqli_fetch_assoc($result);

	if(isset($_REQUEST['back'])){
		header('Location: profile.php?id='.$_SESSION['id'].'');
		exit;
	}
	var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Удаление аккаунта</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['id']) and isset($_SESSION['login']) or isset($_COOKIE['login']) and isset($_COOKIE['key'])){
	?>
	<fieldset>
	<legend>Удалить аккаунт</legend>
		<form action="" method="POST">
			<p>
				Введите пароль для удаления аккаунта:
				<br>
				<input type="password" name="password">
			</p>
			<a href="logout.php">Удалить аккаунт</a>
			<input type="submit" name="back" value="Назад">
		</form>
	</fieldset>
	<?php
		}else{
			echo "Вам необходимо авторизоваться!";
		}
		if(!empty($_REQUEST['password']) and isset($_REQUEST['next'])){

			$password = $_REQUEST['password'];
			$salt = $user['salt'];
			$user_password = $user['password'];

			$saltedPassword = generateSaltedPassword($login, $password, $salt);

			if($user_password == $saltedPassword){
				mysqli_query($link, "DELETE FROM users WHERE id='$id'") or die(mysqli_error($link));
			}else{
				echo "Неправильный пароль!";
			}
		}
		else if(isset($_REQUEST['next'])){
			echo "Заполните все поля!";
		}	
	?>
</body>
</html>
