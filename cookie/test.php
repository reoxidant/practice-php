<?php
	if(!empty($_GET['country'])){
		setcookie('country', $_GET['country'], time()+3600, '/');
		echo $_COOKIE['country'];
	}
?>

