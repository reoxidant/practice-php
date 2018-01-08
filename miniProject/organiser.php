<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Organiser</title>
	<style>
		body{
			margin: 0;
			padding: 0;

		}
		#wrapper{
			width: 625px;
			margin: 0 auto;
			text-align: justify;
		}
		li{
			list-style-type: none;
			display: inline;
		}
		ul>li a{
			text-decoration: none;
			color: #34a2dc;
			position: relative;
			float: left;
			padding: 6px 12px;
			background-color: #fff;
			border: 1px solid #ddd;
			margin-left: -1px;
		}
		.pagination{
			display: inline-block;
			padding-left: 0;
			margin: 20 0;
			border-radius: 4px;
			margin-bottom: 0px;

		}
		.active{
			z-index: 3;
			color: #fff;
			background-color: #337ab7;
			border-color: #337ab7;
			display: relative;
			top: -2px;
			padding-top:8px;
			padding-bottom: 8px;
		}
		h1{
			font-size: 36px;
		}
		#wrapper p {
			margin-bottom: 5px;
		}
		.date {
			text-align: right;
			padding-right: 20px;
		}
		p{
			margin: 0 0 10px;
		}
		#wrapper div{
			margin-bottom: 15px;
		}
		#form-control{
			width: 96%;
			padding: 5px 10px;
			min-height: 300px;
			resize: vertical;
			text-align: justify;
			height: auto;
			border-radius: 5px;
		}
		.btn{

			width: 100%;
			cursor: pointer;
			display: block;
			color: #fff;
			background-color: #5bc0de;
			border-color: #46b8da;
			padding: 6px 12px;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		.btn:hover{
			background-color: #4398b1;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'organiser';

		$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name) or die (mysqli_error($link));
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS list(id INT NULL AUTO_INCREMENT PRIMARY KEY, days VARCHAR(100), msg TEXT)") or die(mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link));
	?>
	<?php
		$date = isset($_GET['date']) && $_GET['date'] <= 7 ? (int)$_GET['date'] : 1;

		if(isset($_GET['submit'])){
			$msg = $_GET['msg'];
			mysqli_query($link, "UPDATE list SET msg= '$msg' WHERE id = ".$date."") or die (mysqli_error($link));
		}
	?>
	<div id="wrapper">
		<h1>Органайзер</h1>
		<div>
			<nav>
				<ul class="pagination">
					<li><a href="?date=1" <?php newActiveZone($date, $link); ?> <?php if($date==1) echo "class='active'"; ?>>Понедельник</a></li>
					<li><a href="?date=2" <?php if($date==2) echo "class='active'"; ?>>Вторник</a></li>
					<li><a href="?date=3" <?php if($date==3) echo "class='active'"; ?>>Среда</a></li>
					<li><a href="?date=4" <?php if($date==4) echo "class='active'"; ?>>Четверг</a></li>
					<li><a href="?date=5" <?php if($date==5) echo "class='active'"; ?>>Пятница</a></li>
					<li><a href="?date=6" <?php if($date==6) echo "class='active'"; ?>>Суббота</a></li>
					<li><a href="?date=7" <?php newActiveZone($date, $link); ?> <?php if($date==7) echo "class='active'"; ?>>Воскресенье</a></li>
				</ul>
			</nav>
			<p class="date">
				<span style="font-weight: bolder;">Сегодня:</span>
				<?php $arr = [1=>"января","февраля","марта","апреля","марта","июня","июля","августа","сентября","октября","ноября","декабря"];  echo strftime("%d "); echo $arr[date('n')]; echo strftime(" %Y года");?>
			</p>
		</div>
		<div id="form">
			<form action="#" method="GET">
				<p>
					<?php 
						$sql = mysqli_query($link, "SELECT msg FROM list WHERE id= $date");
						
						while($result = mysqli_fetch_assoc($sql)){
					?>
						<input type="text" style="display: none;" name="date" value="<?php echo $date; ?>">
						<textarea name="msg" id="form-control" placeholder="Ваш отзыв" cols="30" rows="10"><?php echo $result['msg']; ?></textarea>
					<?php
					$currentDate = $date;
					 } ?>
				</p>
				<p><input type="submit" class="btn" name="submit" value="Сохранить"></p>
			</form>
		</div>
	</div>
	<?php 
		function newActiveZone($date, $link){
			mysqli_query($link, "INSERT INTO list SET id = $date");
		}
	?>
</body>
</html>