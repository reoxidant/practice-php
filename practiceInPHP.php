<!-- Тема: Практика PHP для новичков -->
<!-- 1. Дана таблица с работниками. Реализуйте ее вывод на экран в следующем виде: -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
	<style>
		table{
			border: 1px solid black;
			border-collapse: collapse;
			/*border-spacing: 1px 1px;*/
		}
		td, th {
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
<?php 
	$host = "localhost";
	$user = "root";
	$password = '';
	$db_name = 'test';

	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
	mysqli_query($link, "SET NAMES 'utf8'");
?>
<table width='550' height='300'>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>age</th>
		<th>salary</th>
	</tr>
<?php 
	$query = "SELECT id, name, age, salary FROM workers";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	while($arr_sql = mysqli_fetch_array($result)){
		echo '<tr><td>'.$arr_sql['id'].'</td><td>'.$arr_sql['name'].'</td><td>'.$arr_sql['age'].'</td><td>'.$arr_sql['salary'].'</td></tr>';
	}
?>
</table>
</body>
</html> -->

<!-- 2. Сделайте в таблице всех работников ссылку 'удалить'. По нажатию на эту ссылку из БД должна удаляться запись с этим id (его следует передавать через GET-параметр del_id). -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php</title>
	<style>
		table{
			width: 550px;
			height: 300px;
			border: 1px solid black;
			border-collapse: collapse;
		}
		td, th{
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
		$host = "localhost";
		$user = "root";
		$password = "";
		$db_name = "test";

		$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'");
	?>
	<table>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>age</th>
			<th>salary</th>
			<th>удаление</th>
		</tr>
		<?php 
			$query = "SELECT id, name, age, salary FROM workers;";
			$sql = mysqli_query($link, $query) or die(mysqli_error($link));
			
			while($result = mysqli_fetch_array($sql)){
				echo "<tr>".
					"<td>".$result['id']."</td>".
					"<td>".$result['name']."</td>".
					"<td>".$result['age']."</td>".
					"<td>".$result['salary']."</td>".
					'<td><a href="?del_id='.$result['id'].'">Удалить</a></td>'.
					"</tr>";
			}

			if(isset($_GET['del_id'])){
				$query = "DELETE FROM workers WHERE id=".$_GET['del_id']."";
				$sql = mysqli_query($link, $query) or die(mysqli_error($link));
			}
		?>
	</table>	
</body>
</html> -->

<!-- 3. Сделайте форму добавления нового работника.

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
</head>
<body>
	<?php
		$host = "localhost";
		$user = "root";
		$password = '';
		$db_name = 'test';

		$link = mysqli_connect($host, $user, $password, $db_name) or die(mysql_error($link));
		mysqli_query($link, "SET NAMES 'utf8'");
		mysqli_select_db($link, $db_name);
	?>
	<h3>Введите данные нового работника</h3>
	<form action="" method="GET">
		<p>
			Имя: <br>
			<input type="text" name="name" required>
		</p>
		<p>
			Возраст: <br>
			<input type="text" name="age" required="">
		</p>
		<p>
			Зарплата: <br>
			<input type="text" name="salary" required="">
		</p>
		<input type="submit" value="Добавить" name="submit">
	</form>
</body>
</html>

<?php
	if(!empty($_GET['submit'])) {
		$sql = mysqli_query($link, "INSERT INTO workers (name, age, salary) VALUES ('".$_GET['name']."', '".$_GET['age']."', '".$_GET['salary']."')")
		or die(mysqli_error($link));

		if($sql){
			echo "Значения успешно вставление в базу данных.";
		} else {
			echo "Ошибка выполнения запроса.";
		}
	}
?> -->

<!-- 4. Сделайте колонку 'редактировать' для каждого работника. Там должна быть ссылка, по переходу на которую появится страница с формой редактирования работника. -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
	<style>
		table{
			border: 1px solid black;
			border-collapse: collapse;
			width: 500px;
			height: 300px;
		}
		th, td{
			text-align: center;
			border: 1px solid black;

		}

	</style>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'test';

		$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'");
	?>
	<?php if(isset($_GET['name']) OR isset($_GET['del_id'])){ ?>
	<table>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>age</th>
			<th>salary</th>
			<th>delete</th>
			<th>edit</th>
		</tr>
		<?php
			$query = 'SELECT id, name, age, salary FROM workers'; 
			$sql = mysqli_query($link, $query) or die (mysqli_error($link));
			while($result = mysqli_fetch_array($sql)){
				echo "<tr>".
					"<td>".$result['id']."</td>".
					"<td>".$result['name']."</td>".
					"<td>".$result['age']."</td>".
					"<td>".$result['salary']."</td>".
					"<td><a href='?del_id=".$result['id']."'>Удалить</a></td>".
					"<td><a href='?edit_id=".$result['id']."'>Редактировать</a></td>".
				"</tr>";
			}

			if(isset($_GET['del_id'])){
				$query = "DELETE FROM workers WHERE id=".$_GET['del_id'].";";
				mysqli_query($link, $query) or die(mysqli_error($link));
			}	
		?>
	</table>
	<?php } ?>
	<?php if(isset($_GET['edit_id'])){ 
		$query = 'SELECT id, name, age, salary FROM workers WHERE id='.$_GET['edit_id'].''; 
		$sql = mysqli_query($link, $query) or die (mysqli_error($link)); 
		$result = mysqli_fetch_array($sql);
	?>
		<form action="" method="GET">
			<p>
				Введите имя работника: <br>
				<input type="text" name="name" 
				value="<?php echo $result['name'];?>" required>
			</p>
			<p>
				Введите возраст работника: <br>
				<input type="text" name="age"
				value="<?php echo $result['age'];?>" required>
			</p>
			<p>
				Введите з/п работника: <br>
				<input type="text" name="salary"
				value="<?php echo $result['salary'];?>" required>
			</p>
			<input type="submit" name="submit">
		</form>

	<?php
	if(isset($_GET['name'])){
		$query = 'UPDATE workers SET name="'.$_GET['name'].'", age="'.$_GET['age'].'", salary="'.$_GET['salary'].'" WHERE id=25'; //Почему строчка WHERE не работает????
		mysqli_query($link, $query) or die(mysqli_error($link));
	}
	} ?>
</body>
</html>  -->



