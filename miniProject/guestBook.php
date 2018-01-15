<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
    <style>
        #output{
        	background-color: #d9edf7;
        	width: 300px;
            color: #31708f;
            padding: 15px;
        }

        #output p{
        	text-align: center;
        }

        body{
        	padding: 0px;
        	margin: 0px;
        	width: 100%;
            color: #333;
        }

        #myform{
        	width: 300px;
        	margin: 0px auto;
            padding: 10px;
            text-align: justify;
        }

        h1{
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        td{
            padding: 5px 0 5px 0 ;
        }

        .form-control{
            display: block;
            width: 300px;
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
        $db_name = 'guest';

        $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
        mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die (mysqli_error($link));
        mysqli_select_db($link, $db_name );
        mysqli_query($link, "CREATE TABLE IF NOT EXISTS book(id INT(4) NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100), dt DATETIME, msg TEXT)") or die (mysqli_error($link));
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
                <td><input class="form-control" type="text" name="username" placeholder="Ваше имя"></td>
            </tr>
            <tr>
                <td><textarea id="text" class="form-control" name="msg" cols="30" rows="20" placeholder="Ваш отзыв"></textarea></td>
            </tr>
            <tr>
                <td><input class="btn" type="submit" name="submit" value="Сохранить"></td>
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
</html>
