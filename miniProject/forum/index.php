<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <style>
    .wrapper {
        width: 500px;
        margin: 0px auto;
        padding: 10px;
        text-align: justify;
    }

    .wrapper div {
        margin-bottom: 15px;
    }

    .wrapper p {
        margin-bottom: 5px;
    }

    p {
        margin: 0 0 10px;
    }

    .subheader {
        font-weight: bold;
    }

    .topic {
        font-size: 16pt;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }

    .pagination li {
        display: inline;
    }

    .pagination>.active>a {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    .pagination>li>a .pagintation>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        text-decoration: none;
        color: #337ab7;
        border: 1px solid #ddd;
    }

    h2 {
        font-size: 35px;
    }

    h1 {
        font-size: 36px;
    }

    h1,
    h2 {
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
        padding: 15px;
    }

    .danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
        padding: 15px;
    }

    .form-control {
        display: block;
        width: 95%;
        height: 34px;
        padding: 6px 10px;
        font-size: 14px;
        color: #555;
    }

    textarea {
        width: 95%;
        padding: 6px 11px;
        min-height: 200px;
        resize: vertical;
        text-align: justify;
        font-size: 16px;
    }

    .btn {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        margin-bottom: 0;
        width: 100%;
        display: block;
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
        border: 0;
    }

    .btn:active {
        background-color: #4398b1;
    }
    </style>
</head>

<body>
    <?php 
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'articles';

		$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
		mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
		mysqli_select_db($link, $db_name) or die(mysqli_error($link));
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS authors (id INT NULL AUTO_INCREMENT PRIMARY KEY, header VARCHAR(100), dt DATETIME, name VARCHAR(100), msg TEXT)") or die (mysqli_error($link));
		mysqli_query($link, "CREATE TABLE IF NOT EXISTS users (id INT NULL AUTO_INCREMENT PRIMARY KEY, dt DATETIME, name VARCHAR(100), msg TEXT)") or die (mysqli_error($link));
		mysqli_query($link, "SET NAMES 'utf8'");

		$page = isset($_GET['page']) && $_GET['page'] < 10 ? (int) $_GET['page'] : 1;
		$perPage = 3;
		$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	?>
	<?php 
		if(isset($_GET['submit']) AND !empty($_GET['msg']) AND !empty($_GET['username']) AND !empty($_GET['topicname'])){
			$topicname = $_GET['topicname'];
			$datetime = 'NOW()';
			$msg = $_GET['msg'];
			$username = $_GET['username'];
			$flag = insertInTable($link, $topicname, $datetime, $msg, $username);
		}
	?>
	
    <div class="wrapper">
        <h1>Наш форум</h1>
        <div class="note">
            <p>
                Наш супер крутой форум посвящен phasellus gravida fermentum pellentesque. Aenean non neque mollis nisl dapibus eleifend. Sed interdum dui nec dictum elementum. Proin eget semper dolor, ut commodo nibh. Quisque vitae pharetra ligula. Sed dictum, sem sed pellentesque aliquam, tellus sapien dapibus magna, eu suscipit lacus augue sed velit. Ut vehicula sagittis nulla, et aliquet elit. Quisque tincidunt sem nibh, finibus dictum nisl vulputate quis. In vitae nisl et lacus pulvinar ornare id ac libero. Morbi pharetra fringilla erat ut lacinia.
            </p>
        </div>
        <h2>Темы форума</h2>
        <?php 
        	selectAndShow($link, $start, $perPage);
        ?>
        <div>
            <nav>
                <ul class="pagination">
                    <?php 
                    	$sql = mysqli_query($link, "SELECT FOUND_ROWS() as total") or die (mysqli_error($link));
                    	$total = mysqli_fetch_assoc($sql)['total'];
                    	$pages = ceil($total / $perPage);
                    	createPagination($pages); 
                    ?>
                </ul>
            </nav>
        </div>
        <h2>Создать тему</h2>
        <?php 
        	if(isset($_GET['submit']) AND !empty($_GET['topicname'])){
				isAlert($flag);
			}
        ?>
        <div id="form">
            <form action="#" method="GET">
                <p>
                    <input type="text" class="form-control" name="username" placeholder="Ваше имя">
                </p>
                <p>
                    <input type="text" class="form-control" name="topicname" placeholder="Название темы">
                </p>
                <p>
                    <textarea class="form-control" name="msg" placeholder="Описание темы" id="" cols="30" rows="10"></textarea>
                </p>
                <p>
                    <input type="submit" name="submit" class="btn" value="Сохранить">
                </p>
            </form>
        </div>
    </div>
    <?php 
    	function selectAndShow($link, $start, $perPage)
    	{
        	$sql = mysqli_query($link, "SELECT SQL_CALC_FOUND_ROWS header, dt, name, msg FROM authors WHERE name != '' LIMIT {$start}, {$perPage}")or die(mysqli_error($link));
        	while($result = mysqli_fetch_assoc($sql)){
    ?>
	        <div class="note">
	            <p class="topic"><a href="topic.html?topic=<?php echo $result['id']; ?>&page=1"><?php echo $result['header']; ?></a></p>
	            <p>
	                <span class="subheader">Создана:</span> <?php echo $result['dt']; ?>.
	                <span class="subheader">Автор:</span> <?php echo $result['name']; ?>.
	                <br>
	                <span class="subheader">Количество ответов: </span><?php echo $result['count_answers']; ?>
	            </p>
	        </div>
    <?php 
			} 
    	}
    ?>
    <?php 
    	function createPagination($pages)
    	{
    		for($i = 1; $i <= $pages; $i++){
    ?>
    	<li>
	    	<a href="?page=<?php echo $i; ?>">
	    		<?php echo $i; ?>
	    	</a>
    	</li>
    <?php
    		}
   		}
    ?>
    <?php 
    	function isAlert($flag)
    	{
			if($flag == false){
	?>
		        <div class="danger">
		        	<p>Тема с таким названием уже существует!</p> 
		        </div> 
	<?php 
			} 

			if($flag == true){
	?>
				<div class="info">
		    		<p>Тема успешно создана!</p>
				</div>
	<?php 
			}
		}
    ?>
    <?php 
    	function insertInTable($link, $topicname, $datetime, $msg, $username)
    	{
    		$result = mysqli_query($link, "SELECT * FROM authors WHERE header = '$topicname'");
    		if(mysqli_num_rows($result)){
    			return false;
    		} else {
    			mysqli_query($link, "INSERT INTO authors SET header = '$topicname', dt = $datetime, name = '$username', msg='$msg'");
    			return true;
    		}	
    	}
    ?>
</body>
</html>