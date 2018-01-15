<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview</title>
</head>
<style>
	body{
		margin: 0;
		padding: 0;
	}
	.wrapper{
		width: 650px;
		margin: 0px auto;
		padding: 10px;
		text-align: justify;
	}
	h1, h2{
		font-size: 32px;
		margin-top: 20px;
		margin-bottom: 10px;
		font-weight: 500;
	}
	.wrapper > div, form>div{
		margin-bottom: 15px;
	}
	.info{
		color: #31708f;
		background-color: #d9edf7;
		border-color: #bce8f1;
		padding: 15px;
	}
	.note{
		padding: 0px 20px;
	}
	p{
		margin: 0 0 10px;
	}
	label{
		display: inline-block;
		max-width: 100%;
		margin-bottom: 5px;
		font-weight: bold;
	}
	.btn{
		width: 100%;
		display: block;
		color: #fff;
		background-color: #5cb85c;
		padding: 6px 12px;
		margin-bottom: 0;
		text-align: center;
		vertical-align: middle;
		border: 0;
	}
	.btn:hover{
		background-color: #2c9430;
	}
</style>
<body>
	<?php
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'interview';

		$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name);
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS opros (id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY, variant VARCHAR(64), answers INT(4) default 0)") or die(mysqli_error($link));
		
		mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link));
	?>
	<div class="wrapper">
		<h1>Опрос</h1>
		<div class="info">Укажите свой возраст:</div>
		<?php 
			$result = mysqli_query($link, "SELECT * FROM opros");
			if(mysqli_num_rows($result) == NULL){
				mysqli_query($link, 
				"INSERT INTO opros (id, variant, answers) VALUES 
				('1','до 20 лет', '40'),
				('2', 'от 20 до 30 лет', '28'),
				('3', 'более 30 лет', '32')") or die(mysqli_error($link));
			}
		?>
		<form action="check.php" method="GET">
			<?php 
				$sql = mysqli_query($link, "SELECT * FROM opros");
				$i = 1;
				while($result = mysqli_fetch_assoc($sql) AND $i <= 3){
			?>
			<div class="note">
				<p>
					<input type="radio" name="radio" value="<?php echo $i; ?>" id="r<?php echo $i; ?>">
					<label for="r<?php echo $i; ?>"><?php echo $result['variant']; ?></label>
				</p>
			</div>
			<?php
				$i++;
			} 
			?>
			<p>
				<input type="submit" class="btn" name="submit" value="Ответить">
			</p>
		</form>
	</div>
</body>
</html>