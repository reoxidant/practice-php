<!--Урок 3. Реализуйте записную книгу, как показано ниже. -->

<!-- Главная страница. -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of notes</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			width: 100%;
		}
		form{
			width: 30%;
			margin: 0 auto;
		}
		.article{
			padding: 10px 0px;
			width: 100%;
			height: 30%;
		}
		a{	
			text-decoration: none;
		}
		#btn{
			text-align: center;
			padding-top: 5px;
			display: block;
			background-color: #d8524e;
			color: white;
			width: 100%;
			height: 25px;
		}
		#btn:hover{
			background-color: #ee9390;
		}
		p{
			width: 100%;
			height: 30%;
			text-align: justify;
		}
	</style>
</head>
<?php 
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'notes';

	$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
	mysqli_select_db($link, $db_name);
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS list (id INT NULL AUTO_INCREMENT PRIMARY KEY, headlist VARCHAR(100), dt DATETIME, content TEXT)") or die (mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link));

	$page = isset($_GET["page"])? (int)$_GET['page'] : 1;

	if(isset($_GET['new_note'])){
			$headlist = $_GET['hl'];
			$datatime = 'NOW()';
			$content = $_GET['msg'];
			mysqli_query($link, "INSERT INTO list (headlist, dt, content) VALUES ('$headlist', $datatime, '$content')") or die(mysqli_error($link));
	}
?>
<body>
	<form action="" method="GET">
		<h1 style="text-align: center;">Список записей</h1>
		<?php 
			$sql = mysqli_query($link, "SELECT * FROM list");
			
			while ($result = mysqli_fetch_assoc($sql)) {
			if(empty($result)){
				echo "<div style='text-align: center; padding-bottom: 25px;'>"."На данный момент записи отсутствуют!"."</div>";
			}
		?>
			<div class="article">
				<span style="font-weight: bold;"><?php echo $result['dt']; ?></span>
				<a href="note/note.php?id=<?php echo $result['id']; ?>"><?php echo $result['headlist']; ?></a> 
				<p><?php echo substr($result['content'], 0, 500); if(strlen($result['content'])>500) echo "...";?></p>
			</div>
		<?php		
			}
		?>
		<a id="btn" href="add/add.php" style="width: 100%; height: 25px;  color: white;">Добавить запись </a>
	</form>
</body>
</html>