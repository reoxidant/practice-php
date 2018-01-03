<!-- Тема: Минипроекты PHP для новичков -->
<!-- Урок №1 - Реализуйте гостевую книгу, как показано в следующем образце: -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
    <style>
        #output{
        	background-color: #97cc96;
        	width: 250px;
        	border: 1px solid black;
        }

        #output p{
        	text-align: center;
        }

        body{
        	padding: 0px;
        	margin: 0px;
        	width: 100%;
        }

        #myform{
        	width: 300px;
        	margin: 0px auto;
        }
    </style>
</head>
<body>
    <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'guest';

        $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
        mysqli_select_db($link, $db_name );
        mysqli_query($link, "SET NAMES 'utf-8'");

        $username = $_GET['username'];
	    $msg = $_GET['msg'];
	    $datetime = 'NOW()';

	    $query = "INSERT INTO book SET username='$username', dt = $datetime, msg = '$msg'";
	    mysqli_query($link,$query) or die(mysqli_error($link));
	?>

	<form id="myform" name="form" method="GET" onsubmit="return isNull();">
        <h1>Гостевая книга</h1>
		<?php
	        	$sql = mysqli_query($link, "SELECT * FROM book ORDER BY dt") or die(mysqli_error($link));
	        	while($result = mysqli_fetch_array($sql)){
	        		if($result['username'] != null){
	    ?>
	    		<div style="width: 250px;" >
	    			<span width=130 style="text-align: left; font-weight: bold;"><?php echo $result['dt']; ?></span><span style="padding-left: 5px;"><?php echo $result['username']; ?></span>
	    			<p><?php echo $result['msg']; ?></p>
	    		</div>
	    <?php }}?>
	    <?php 
			if(!empty($_GET['username']) AND !empty($_GET['msg']) AND isset($_GET['submit'])){
		 		echo "<div id='output'>"."<p>Запись успешно добавлена!</p>"."</div>";
			}
		?>
        <table>
            <tr>
                <td><input type="text" name="username" placeholder="Ваше имя"></td>
            </tr>
            <tr>
                <td><textarea name="msg" cols="30" rows="10" placeholder="Ваш отзыв"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Сохранить"></td>
            </tr>
        </table>
	</form>
    <script>
        function isNull(){
            if(document.form.username.value == ""){
                alert("Заполните имя пользователя!");
                return false;
            }
            if(document.form.msg.value ==""){
                alert("Заполните текст сообщения!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html> -->

<!-- Урок №2 - Реализуйте гостевую книгу с пагинацией, как показано в следующем образце: -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guests Book</title>
	<style>
		body{
			padding: 0px;
			margin: 0px;
			width: 100%;
		}
		#myform {
			margin: 0 auto;
			width: 300px;
		}
		table{
			padding-top: 15px;
		}
		a{
			display: block;
			width: 25px;
			height: 25px;
			text-decoration: none;
			color: black;
			text-align: center;
			padding-top: 5px;
			float: left;
			background-color: #e9eaed;	
		}
		.selected{
			background-color: #4ec6bd;
		}
		.article{
			padding-top: 15px;
			clear: both;
		}
	</style>
</head>
<body>
	<?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'guest2';

		$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name);
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS userbook (id INT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100), dt DATETIME, msg TEXT)") or die(mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link));
	?>

	<?php 
		$page = isset($_GET['page']) && $_GET['page'] <= 10 ? (int)$_GET['page'] : 1; //Страница пагнации
		$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3; //Колличество элементов на одной странице пагнации

		
		$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; //Начало отсчета новой страницы

		$sql = mysqli_query($link, "SELECT SQL_CALC_FOUND_ROWS username, dt, msg FROM userbook WHERE username != '' LIMIT {$start}, {$perPage}") or die(mysqli_error($link));

		//Общее колличество элементов.
		$sql2 = mysqli_query($link, "SELECT FOUND_ROWS() as total") or die(mysqli_error($link));
		$total = mysqli_fetch_assoc($sql2)['total'];
		$pages = ceil ($total / $perPage);
	?>
	<?php 
		if(isset($_GET['submit'])){
			$username = $_GET['username'];
			$datetime = 'NOW()';
			$msg = $_GET['msg'];
			insertInTable($username, $datetime, $msg, $link);
		}	
	?>
	<form id="myform" action="" method='GET' name="form" onsubmit="return isNull();">
		<header>
			<h1>Гостевая книга</h1>
		</header>
		
		<p><?php createPagnation($link, $pages, $perPage, $page); ?></p>
		<?php selectAndShow($link, $start, $perPage, $sql); ?>
		<p><?php createPagnation($link, $pages, $perPage, $page); ?></p>
		<table>
			<tr>
				<td>
					<input type="text" name="username" placeholder="Ваше имя" style="width: 250px;">
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="msg" id="msg" cols="30" rows="10" placeholder="Ваш отзыв" style="width: 250px;"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Сохранить" style="width: 250px;">
				</td>
			</tr>
		</table>
	</form>
	<script>
		function isNull(){
			if(document.form.username.value == ""){
				alert("Заполните поле имя!");
				return false;
			}
			if(document.form.msg.value == ""){
				alert("Заполните поле сообщение!");
				return false;
			}
			return true;
		}
	</script>

	<?php 
		function insertInTable($username, $datetime, $msg, $link)
		{
			mysqli_query($link, "INSERT INTO userbook SET username='$username', dt = {$datetime}, msg = '$msg'") or die(mysqli_error($link));
		}
	?>
	<?php 
		function selectAndShow($link, $start, $perPage, $sql)
		{	
			while($result = mysqli_fetch_assoc($sql)){
	?>
				<div class="article">
					<span style="font-weight: bolder;"><?php echo $result['dt']; ?></span>
					<span><?php echo $result['username']; ?></span>
					<p>
					<?php echo $result['msg']; ?>
					</p>
				</div>
	<?php
			}
		}
	?>

	<?php 
		function createPagnation($link, $pages, $perPage, $page)
		{
	?>
		<div class="home"><a href="?page=1&per-page=<?php echo $perPage; ?>"><<</a></div>
	<?php
			for ($i=1; $i <= $pages; $i++):
	?>
			
			<div class="pagination">
				<a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"
					<?php if($page === $i){ echo ' class="selected"';}; ?>>
					<?php echo $i; ?>
				</a>
			</div>
			
	<?php
			endfor;
	?>
	<div class="end"><a href="?page=<?php echo $pages; ?>&per-page=<?php echo $perPage; ?>">>></a></div>
	<?php
		}
	?>
</body>
</html>
