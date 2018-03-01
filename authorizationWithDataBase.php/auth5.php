<!-- 5. Сделайте аналогичную функцию isNotAuth, которая проверят, НЕ авторизован ли пользователь. -->
<?php 
	function isNotAuth()
	{
		if($_SESSION['auth'] != true AND !isset($_SESSION['auth'])){
			return true;
		} else {
			return false;
		}
	}
?>