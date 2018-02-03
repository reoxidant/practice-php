<!-- 6.  Сделайте авторизацию по паролю, при условии определенного ip пользователя. Подсказка: ip пользователя лежит здесь $_SERVER['REMOTE_ADDR']. -->

<?php 
	$password = md5('133890');
	$ip = '127.0.0.1';

	if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) == $password and $_SERVER['REMOTE_ADDR'] == $ip){
		echo 'Авторизация успешно пройдена.';
	} else {
		if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) != $password and $_SERVER['REMOTE_ADDR'] != $ip || $_SERVER['REMOTE_ADDR'] == $ip){
			echo 'Неверный пароль или ip пользователя';
		}
?>

<form action="" method="POST">
	<p>Введите пароль:<br><input type="password" name='password'></p>
	<input type="submit" name='Отправить'>
</form>

<?php 
}
?>