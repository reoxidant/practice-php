<!-- Тема: Практика PHP для новичков -->
<!DOCTYPE html>
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
	$data = [];
	
	while($arr_sql = mysqli_fetch_array($result)){
		echo '<tr><td>'.$arr_sql['id'].'</td><td>'.$arr_sql['name'].'</td><td>'.$arr_sql['age'].'</td><td>'.$arr_sql['salary'].'</td></tr>';
	}
	
	
?>
</table>
</body>
</html>
