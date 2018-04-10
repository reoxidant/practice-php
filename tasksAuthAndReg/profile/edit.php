<?php
	session_start();
	define('KEY', true);
	include('../config.php');
	include('../bd/bd.php');
	include('../scripts/func/main.php');

	$id = isset($_SESSION['id'])? $_SESSION['id'] : '';
	$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);

	if(isset($_REQUEST['back'])){
		header('Location: profile.php?id='.$_SESSION['id'].'');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Редактирование профиля</title>
</head>
<body>
	<?php
		if(isset($_REQUEST['next']) and checkLenght($_REQUEST['email'], 1, 20) and checkLenght($_REQUEST['name'], 1, 20) and checkLenght($_REQUEST['surname'], 1, 20) and checkLenght($_REQUEST['age'], 1, 20) and checkLenght($_REQUEST['city'], 1, 20) and !empty($_REQUEST['lang'])){

			$email = $_REQUEST['email'];
			$name = $_REQUEST['name'];
			$surname = $_REQUEST['surname'];
			$age = $_REQUEST['age'];
			$city = $_REQUEST['city'];
			$lang = $_REQUEST['lang'];

			mysqli_query($link, "UPDATE users SET email='$email', name='$name', surname='$surname', age='$age', city='$city', lang='$lang' WHERE id='$id'") or die (mysqli_error($link));

			$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
			$user = mysqli_fetch_assoc($result);

			$flag = true;
		}else if(isset($_REQUEST['next'])){
			$flag = false;
		}
	?>
	<?php 
		if(empty($user)){
			echo "Войдите в аккаунт";
		}else{
	?>
	<fieldset>
		<legend>Редактирование профиля</legend>
		<form action="" method="POST">
			<p>
				Email: <br>
				<input type="text" name="email" value="<?php echo isset($_REQUEST['email'])? $_REQUEST['email'] : $user['email']; ?>">
			</p>
			<p>
				Имя: <br>
				<input type="text" name="name" value="<?php echo isset($_REQUEST['name'])? $_REQUEST['name'] : $user['name']; ?>">
			</p>
			<p>
				Фамилия: <br>
				<input type="text" name="surname" value="<?php echo isset($_REQUEST['surname'])? $_REQUEST['surname'] : $user['surname']; ?>">
			</p>
			<p>
				Возраст: <br>
				<input type="text" name="age" value="<?php echo isset($_REQUEST['age'])? $_REQUEST['age'] : $user['age']; ?>">
			</p>
			<p>
				Город: <br>
				<input type="text" name="city" value="<?php echo isset($_REQUEST['city'])? $_REQUEST['city'] : $user['city']; ?>">
			</p>
			<p>
				Язык: <br>
				<select name="lang" id="" style="width: 172px;">
	                <option value="ru" <?php echo $_REQUEST['lang'] == 'ru' ? 'selected="select"' : ''; ?>>Russian</option>
	                <option value="eng" <?php echo $_REQUEST['lang'] == 'eng' ? 'selected="select"' : ''; ?>>English</option>
	                <option value="uk" <?php echo $_REQUEST['lang'] == 'uk' ? 'selected="select"' : ''; ?>>Ukraine</option>
	            </select>
			</p>
			<input type="submit" name="next" value="Сохранить значение">
			<input type="submit" name="back" value="Назад к профилю">
		</form>
		<p>
			<?php 
				if($flag){
					echo "Профиль обновлен!";
				}else if(isset($_REQUEST['next'])){
					echo "Не возможно послать данные больше 20 и меньше 2 символов";
				}
			?>
		</p>
	</fieldset>
	<?php 
	} 
	?>
</body>
</html>