<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Guests Book</title>
    <style>
    body {
        padding: 0px;
        margin: 0px;
        text-align: justify;
    }

    #myform {
        margin: 0 auto;
        width: 300px;
        padding: 10px;
        text-align: justify;
    }

    table {
        padding-top: 15px;
    }

    a {
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

    .selected {
        background-color: #4ec6bd;
    }

    .article {
        padding-top: 15px;
        clear: both;
        text-align: justify;
    }

    #output{
        clear:both;
        text-align: justify;
    }

    #output p{
        text-align: center;
    }

    h1{
        text-align: justify;
        font-size: 36px;
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .form-control{
        display: block;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        color: #555;
        border: 1px solid #ccc;
    }

    textarea .form-control{
        height: 100px;
        width: 100%;
        padding: 5px 10px;
        text-align: justify;
    }

    #text{
        height: 200px;
    }

    .btn{
        width: 100%;
        display: block;
        color: #fff;
        background-color: #5bc0de;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        text-align: center;
        vertical-align: center;
        border: 0px;
        margin-top: 5px;
        }

    .btn:active {
        background-color: #4398b1;
    }

    #output{
            background-color: #d9edf7;
            width: 83%;
            color: #31708f;
            padding: 15px;
            margin-top: 60px;
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
		$page = isset($_GET['page']) && $_GET['page'] < 9 ? (int)$_GET['page'] : 1; //Страница пагнации
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
        <p>
            <?php createPagnation($link, $pages, $perPage, $page); ?>
        </p>
        <?php selectAndShow($link, $start, $perPage, $sql); ?>
        <p>
            <?php createPagnation($link, $pages, $perPage, $page); ?>
        </p>
        <?php 
            if(!empty($_GET['username']) AND !empty($_GET['msg']) AND isset($_GET['submit'])){
                echo "<div id='output'>"."<p>Запись успешно добавлена!</p>"."</div>";
            }
        ?>
        <table>
            <tr>
                <td>
                    <input class="form-control" type="text" name="username" placeholder="Ваше имя" style="width: 250px;">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea id="text" class="form-control" name="msg" id="msg" cols="30" rows="10" placeholder="Ваш отзыв" style="width: 250px;"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="btn" type="submit" name="submit" value="Сохранить">
                </td>
            </tr>
        </table>
    </form>
    <script>
    function isNull() {
        if (document.form.username.value == "") {
            alert("Заполните поле имя!");
            return false;
        }
        if (document.form.msg.value == "") {
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
    <div class="home">
        <a href="?page=1&per-page=<?php echo $perPage; ?>">
            <<</a>
    </div>
    <?php
			for ($i=1; $i <= $pages; $i++):
	?>
        <div class="pagination">
            <a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"
            <?php if($page===$i){ echo ' class="selected"';}; ?>>
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