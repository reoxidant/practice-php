<!-- ПРИМЕРЫ -->
<?php
	$password = '9a75a9a654c981168160f7250d240e4a';

	if (!empty($_REQUEST['password']) and md5($_REQUEST['password']) == $password){
		echo 'Доступ открыт';
	} else {
	if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) != $password){
		echo 'Неправильный пароль!<br>';
	}
?>
<form action="auth.php" method="POST">
	<p>
		Введите пароль к системе: <br>
		<input type='password' name="password">
	</p>
	<input type="submit" value='Отправить'>
</form>
<?php 
	}
?>