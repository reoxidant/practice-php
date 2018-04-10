<?php 
	define('KEY', true);

	include('../config.php');
	include('../bd/bd.php');
	include('../scripts/func/main.php');

	session_start();

	$id = isset($_SESSION['id'])? $_SESSION['id'] : '';
	$login = isset($_SESSION['login'])? $_SESSION['login'] : $_COOKIE['login'];

	if(isset($_REQUEST['back'])){
		header('Location: profile.php?id='.$_SESSION['id'].'');
		exit;
	}

	ob_start();
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
				Введите пароль:
				<br>
				<input type="password" name="password">
			</p>
			<input type="submit" name="next" value="Удалить аккаунт">
			<input type="submit" name="back" value="Назад">
		</form>
	</fieldset>
	<?php
		}else{
			echo "Вам необходимо авторизоваться!";
		}
		if(!empty($_REQUEST['password']) and isset($_REQUEST['next'])){

			$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die (mysqli_error($link));

			$user = mysqli_fetch_assoc($result);

			$password = $_REQUEST['password'];
			$salt = $user['salt'];
			$user_password = $user['password'];

			$saltedPassword = generateSaltedPassword($login, $password, $salt);

			if($user_password == $saltedPassword){
				mysqli_query($link, "DELETE FROM users WHERE id='$id'") or die(mysqli_error($link));
				header('Location: logout.php?del');
				
			}
		}
		else if(isset($_REQUEST['next'])){
			echo "Заполните все поля!";
		}	

		ob_end_flush();
	?>
</body>
</html>
