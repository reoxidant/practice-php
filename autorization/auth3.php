<!-- 3. Придумайте и реализуйте свой алгоритм хеширования. У нас был просто md5 от пароля, но можно делать различные комбинации, например: md5($login.$password) или md5($login.md5($password)). -->

<?php 
	$login = md5('admin');
	$password = md5($login);

	if(!empty($_REQUEST['password']) and md5(md5($_REQUEST['password'])) == $password and !empty($_REQUEST['login'] and md5($_REQUEST['login']) == $login)){
		echo "Добро пожаловать, ".$_REQUEST['login']."!";
	} else {
		if(!empty($_REQUEST['password']) and md5(md5($_REQUEST['password'])) != $password and !empty($_REQUEST['login']) and md5($_REQUEST['login']) != $login){
			echo "Неверно введен логин или пароль";
		}
?>
	<form action="" method="POST">
		<p>Введите логин:
			<br>
			<input type="text" name="login">
		</p>
		<p>Введите пароль:
			<br>
			<input type="password" name="password">
		</p>
		<input type="submit" value="Отправить">
	</form>
<?php 
	}
?>