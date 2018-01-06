<!DOCTYPE html>
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
</html>
