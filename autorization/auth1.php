<!-- 1. Сделайте так, чтобы при авторизации нужно было вводить не только пароль, но и логин. Логин отличается от пароля тем, что показывается открыто (а не звездочками) и в файле также хранится открыто. -->

<?php 
	$password = '9a75a9a654c981168160f7250d240e4a';
	$login = '21232f297a57a5a743894a0e4a801fc3';

	if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) == $password AND !empty($_REQUEST['login']) AND md5($_REQUEST['login']) == $login){
		echo "Добро пожаловать, ".$_REQUEST['login']."!";
	} else {
		if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) != $password AND !empty($_REQUEST['login']) and md5($_REQUEST['login']) != $login){
			echo "Неверно введен логин или пароль!";
		}
?>
	<form action="" method="POST">
		<p>Введите Логин:<br><input type="text" name="login"></p>
		<p>Введите Пароль:<br><input type="password" name="password"></p>
		<input type="submit">
	</form>
<?php
	}
?>

