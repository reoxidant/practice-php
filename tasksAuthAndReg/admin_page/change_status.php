<?php
	session_start();
	define('KEY', true);
	include('../config.php');
	include('../bd/bd.php');
	include('../scripts/func/main.php');

	$id = isset($_REQUEST['user_id'])? $_REQUEST['user_id'] : '';
	$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);

	if(isset($_REQUEST['back'])){
		header('Location:' .HOST. 'tasksAuthAndReg/admin_page/admin.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Изменить статус</title>
</head>
<body>
	<?php 
	if(isAdmin()){
		$flag = false;
		if(isset($_REQUEST['type']) and isset($_REQUEST['change'])){
			$type = $_REQUEST['type'];
			mysqli_query($link, "UPDATE users SET status='$type' WHERE id='$id'") or die (mysqli_error($link));
			$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
			$user = mysqli_fetch_assoc($result); 
			$flag = true;
			
		}
		
	?>
	<fieldset>
		<legend>Изменить статус</legend>
		<form action="" method="post">
			<p>
				<b>Тип текущего пользователя:</b><br>
				<?php 
					if($user['status'] == 10){
				?>
					<input type="radio" name="type" value="10" checked="checked" id="1"><label for="1">Администратор</label><br>
				<?php
					}else{
				?>
					<input type="radio" name="type" value="10" id="1"><label for="1">Администратор</label><br>
				<?php 
				} 
				?>
				<?php 
					if($user['status'] == 2){
				?>
					<input type="radio" name="type" value="2"  checked="checked" id="2"><label for="2">Модератор</label><br>
				<?php
					}else{
				?>
					<input type="radio" name="type" value="2" id="2"><label for="2">Модератор</label><br>
				<?php 
				} 
				?>
				<?php 
					if($user['status'] == 1){
				?>
					<input type="radio" name="type" value="1"  checked="checked" id="3"><label for="3">Пользователь</label><br>
				<?php
					}else{
				?>
					<input type="radio" name="type" value="1" id="3"><label for="3">Пользователь</label><br>
				<?php 
				} 
				?>
			</p>
			<input type="submit" name="change" value="Изменить статус" >
			<input type="submit" name="back" value="Назад в админку">
		</form>
	</fieldset>
	<?php 
		if($flag){
			echo "Статус сменен!";
		}
	?>
	<?php 
		}else{
			echo "Доступно только администратору сайта!";
		}
	 ?>
</body>
</html>