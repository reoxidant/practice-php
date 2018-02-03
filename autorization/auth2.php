<!-- 2. Сделайте так, чтобы при авторизации нужно было вводить два пароля. -->

<?php 
	$password1 = '9a75a9a654c981168160f7250d240e4a';
	$password2 = '9a75a9a654c981168160f7250d240e4a';

	$login = '21232f297a57a5a743894a0e4a801fc3';

	if((!empty($_REQUEST['password1']) AND md5($_REQUEST['password1']) == $password1 AND !empty($_REQUEST['password2']) AND md5($_REQUEST['password2']) == $password2) AND !empty($_REQUEST['login']) AND md5($_REQUEST['login']) == $login){
			echo "Добро пожаловать, ".$_REQUEST['login'].'!'; 
	} else{
	if((!empty($_REQUEST['password1']) AND md5($_REQUEST['password1']) != $password1 AND !empty($_REQUEST['password2']) AND md5($_REQUEST['password2'])) AND !empty($_REQUEST['login']) AND md5($_REQUEST['login']) != $login){
		echo "Введен неправильный логин или пароль.";
	} else {
		echo "Ошибка";
	}
?>
	<form action="" method="POST">
		<p>Введите логин:
			<br>
			<input type="text" name="login">
		</p>
		<p>Введите первый пароль:
			<br>
			<input type="password" name="password1">
		</p>
		<p>Введите второй пароль:
			<br>
			<input type="password" name="password2">
		</p>
		<input type="submit" value="Отправить">
	</form>
<?php 
}
?>