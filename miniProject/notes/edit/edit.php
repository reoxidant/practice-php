<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Note</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			width: 100%;
		}
		form{
			width: 25%;
			margin: 0 auto;
		}
		a{
			text-decoration: none;
		}
		a:hover{
			text-decoration: underline;
		}
		#btn{
			display: block;
			text-align: center;
			text-decoration: none;
			width: 100%;
			height: 30px;
			color: white;
			background-color: #d8524e;
		}
		#btn:hover{
			background-color: #ee9390;
		}
		input{
			height: 25px;
			width: 96%;
			margin-top: 5px;
			padding: 0 5px;
		}
		textarea{
			margin: 5px 0;
			padding: 7px 7px;
		}
		#msg{
			width: 300px;
			margin: 25% auto;
		}
	</style>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'notes';

		$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
		mysqli_select_db($link, $db_name) or die (mysqli_error($link));
		$page = $_GET['id'];
	?>
	<form action="../note/note.php" method="GET">
		<?php
			$sql = mysqli_query($link, "SELECT * FROM list WHERE id = $page");
			while($result = mysqli_fetch_assoc($sql)){	
		?>
			<h1>Рекатировать запись</h1>
			<a href="../notes.php">на главную</a>
			<input style="display: none;" type="text" name='id' value="<?php echo $result['id']; ?>">
			<input type="text" name='dt' value="<?php echo $result['dt']; ?>">
			<input type="text" name='hl' value="<?php echo $result['headlist']; ?>">	
			<textarea name="content" id="" cols="30" rows="20" style="width: 96%;"><?php echo $result['content']; ?></textarea>
			<input id="btn" type="submit" name="red_id" value="Сохранить">
		<?php 
			}
			?>
	</form>
</body>
</html>