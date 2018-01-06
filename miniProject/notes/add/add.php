<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add new note</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			width: 100%;
		}
		form{
			width: 20%;
			margin: 0 auto;
		}
		#btn{
			display: block;
			text-align: center;
			text-decoration: none;
			width: 100%;
			height: 30px;
			color: white;
			background-color: #d8524e;
			border: 0px;
			padding-top: 2px; 
		}
		#btn:hover{
			background-color: #ee9390;
		}
		input{
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'notes';

		$link = mysqli_connect($host, $user, $password);
		mysqli_select_db($link, $db_name) or die(mysqli_error($link));
	?>
	<form action="../notes.php" method="GET">
		<h1>Новая запись</h1>
		<input style="width: 98%; height: 20px;" name="hl" type="text" placeholder="Название записи" required="">
		<textarea style="width: 98%;" name="msg" id="" cols="30" rows="5" placeholder="Введите ваше сообщение" required=""></textarea>
		<input id="btn" type="submit" name="new_note" value="Сохранить">
	</form>
</body>
</html>