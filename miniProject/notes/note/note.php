<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About</title>
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
		div{
			width: 100%;
			text-align: justify;
		}
		a{
			display: block;
			text-align: center;
			padding-top: 5px;
			text-decoration: none;
			width: 100%;
			height: 25px;]
			color: white;
			background-color: #d8524e;
		}
		a:hover{
			background-color: #ee9390;
		}
	</style>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'notes';

		$link = mysqli_connect($host, $user, $password, $db_name) or die (mysqli_error($link));

		if(isset($_GET['red_id'])){
			$id = $_GET['id'];
			$datetime = $_GET['dt'];
			$headlist = $_GET['hl'];
			$content = $_GET['content'];

			mysqli_query($link, "UPDATE list SET headlist='$headlist', dt='$datetime', content='$content' WHERE id='$id'");
		}
	?>
	<form action="" method="">
			<?php
				$page = $_GET['id']; 
				$sql = mysqli_query($link, "SELECT * FROM list WHERE id=$page");
				while($result = mysqli_fetch_assoc($sql)){
			?>
					<div>
						<h1><?php echo $result['headlist'];?></h1>
						<p style='font-weight: bold;''><?php echo $result['dt']; ?>
						</p>
						<p><?php echo $result['content']; ?></p>
						<p><a href='../edit/edit.php?id=<?php echo $result['id']; ?>' style='color: white;'>Редактировать запись</a></p>			
					</div>
			<?php  }?>				
	</form>
</body>
</html>