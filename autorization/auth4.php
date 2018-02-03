<!-- 4. Сделайте так, чтобы при авторизации нужно было вводить логин, пароль и длинную кодовую строку (осмысленный длинный текст). -->
<?php
	$password = md5('133890');
	$login = md5('admin');
	$textcode = md5('i would fought for that');
	if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) == $password and !empty($_REQUEST['login']) and md5($_REQUEST['login']) == $login and !empty($_REQUEST['text']) and md5($_REQUEST['text']) == $textcode){
		echo "Добро пожаловать, ".$_REQUEST['login']."!";
	} else {
		if(!empty($_REQUEST['password']) and md5($_REQUEST['password']) != $password and !empty($_REQUEST['login']) and md5($_REQUEST['login']) != $login and !empty($_REQUEST['text']) and md5($_REQUEST['text']) != $textcode){
			echo "Неправильно введены данные!";
		} else {
			echo "Неправильно введены данные!";
		}
		
?>
<form action="" method="POST">
	<p>Введите логин:<br><input type="text" name="login"></p>
	<p>Введите пароль:<br><input type="password" name="password"></p>
	<p>Секретное слово:<br><input type="text" name='text'></p>
	<input type="submit">
</form>
<?php
}
?>