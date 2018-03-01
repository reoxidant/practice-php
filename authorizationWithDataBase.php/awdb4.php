<!-- 4. Сделайте функцию isAuth, которая проверяет, авторизован ли пользователь. Если да - вернет true, если нет - false. -->

<?php 
	function isAuth()
	{
		if($_SESSION['auth'] != false AND isset($_SESSION['auth'])){
			return true;
		} else {
			return false;
		}
	}
?>
