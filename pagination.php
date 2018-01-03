<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'pagination';

		$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name);
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS article (id INT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(200))") or die(mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link));

		//Varible
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;

		//Positioning
		$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

		//Query
		$query = "SELECT SQL_CALC_FOUND_ROWS id, title FROM article LIMIT {$start}, {$perPage}";
		$sql = mysqli_query($link, $query) or die (mysqli_error($link));

		//Pages
		$sql2 = mysqli_query($link, "SELECT FOUND_ROWS() as total");
		$total = mysqli_fetch_assoc($sql2)['total'];
		$pages = ceil($total / $perPage);		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Articles</title>
	<style>
		.selected {
			font-weight: bold;
			background-color: #d8ecf6;
		}
		a{
			display: block;
			float: left;
			height: 30px;
			width: 30px;
			border: 1px solid black;
			text-decoration: none;
			color: black;
			text-align: center;
			margin-left: 0px;
			vertical-align: middle;
		}
	</style>
</head>
<body>
	<?php while($res = mysqli_fetch_assoc($sql)){?>
		<div class="article">
			<p><?php echo $res['id']; ?>: <?php echo $res['title']; ?></p>
		</div>
	<?php } ?>

	<div class="pagination">
		<?php for($x = 1; $x <= $pages; $x++): ?>
			<a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"<?php if($page === $x){ echo ' class="selected"';}; ?>><?php echo $x; ?></a>
		<?php endfor; ?>
	</div>
</body>
</html>