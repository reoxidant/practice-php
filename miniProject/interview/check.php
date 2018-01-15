<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Result Interview</title>
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
		h1{
			text-align: left;
			font-size: 32px;
			margin: 20px 0 10px 0 ;
			font-weight: 500;
		}
		.wrapper>div, form>div{
			margin-bottom: 15px;
		}
		.info{
			color: #31708f;
			background-color: #d9edf7;
			border-color: #bce8f1;
			padding: 15px;
			border-radius: 4px;
		}
		b{
			font-weight: bold;
		}
		.wrapper>div, form>div{
			margin-bottom: 15px;
		}
		.note{
			padding: 0px 20px;
		}
		p{
			margin-bottom: 5px;
			margin: 0 0 10px;
		}
		.answer{
			font-weight: bold;
		}
		.progress{
			height: 20px;
			margin-bottom: 20px;
			overflow: hidden;
			background-color: #f5f5f5;
			border-radius: 4px;
		}
		.progress-bar{
			float: left;
			height: 100%;
			font-size: 14px;
			line-height: 20px;
			color: #fff;
			text-align: center;
			background-color: #337ab7;
		}
	</style>
</head>
<body>
	<?php
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'interview';

		$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link));
		mysqli_select_db($link, $db_name);
	?>
	<div class="wrapper">
		<h1>Результат опроса</h1>
		<?php 
			if(!empty($_GET['radio']) AND isset($_GET['submit'])){
				showInfo($link);

				$sql = mysqli_query($link, "SELECT * FROM opros") or die (mysqli_error($link));	
				while($result = mysqli_fetch_assoc($sql)){
				
		?>
		
		<div class="note">
			<p class="answer">Ответ "<?php echo $result['variant']; ?>"</p>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result['answers']; ?>%;"><?php echo $result['answers']; ?>%</div>
			</div>
		</div>
			<?php
					}
				}
			?>
	</div>
	<?php 
		function showInfo($link)
		{
			$sql = mysqli_query($link, "SELECT * FROM opros") or die (mysqli_error($link));
			$sql2 = mysqli_query($link, "SELECT SUM(answers) FROM opros") or die (mysqli_error($link));
			$total = mysqli_fetch_assoc($sql2);
	?>
	<?php  
			echo "<div class='info'> Общее количество опрошенных: <b>".$total["SUM(answers)"]."</b>";
			while($result = mysqli_fetch_assoc($sql)){
	?>
					<br>
					<b><?php echo $result['id']; ?></b>. Ответили "<?php echo $result['variant']; ?>": <b><?php echo $result['answers']; ?></b> человек, <b><?php echo $result['answers']; ?></b>% опрошенных.
	<?php
			}
			echo "</div>";
		}
	?>
</body>
</html>

