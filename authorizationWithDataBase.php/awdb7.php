<!-- 7. Сделайте так, чтобы при авторизации в БД писалась дата последнего захода пользователя на сайт. -->

<?php 
	setcookie('dtime', date('Y-m-d H:i:s'), time()+3600*24*31, '/');
	
	function loginTime($link, $login){
		if($_SESSION['auth'] == true){
			$time = isset($_COOKIE['dtime']) ? $_COOKIE['dtime'] : 'никогда';
			mysqli_query($link, "UPDATE users SET dtime='$time' WHERE login='$login'") or die (mysqli_error($link));
			return "<br>"."Дата последнего входа на сайт ".$time.".";
		}else{
			return "<br>"."Пользователь не авторизован!";
		}
	}
?> 