<!-- 5. Сделайте двойной тайный пароль. Конструкция должна работать так: при вводе правильного пароля сайт все равно пишет, что пароль неправильный, но ждет от вас второго пароля. То есть авторизация происходит при введении двух правильных паролей подряд. Если после первого пароля введен неправильный, а затем правильный - авторизации не происходит. -->

<?php 
	$password1 = md5('qwerty');
	$password2 = md5('133890');

	if(!empty($_REQUEST['password1']) and md5($_REQUEST['password1']) == $password1 and !empty($_REQUEST['password2']) and md5($_REQUEST['password2']) == $password2){
		echo 'Пользователь авторизован.';
	} else {
		if(!empty($_REQUEST['password1']) and md5($_REQUEST['password1']) == $password1 and !empty($_REQUEST['password2']) and $_REQUEST['password2'] != $password2)
			{
				echo 'Неверно введен второй пароль.';
			} 
			else 
				{
						if(!empty($_REQUEST['password1']) and md5($_REQUEST['password1']) != $password1 and !empty($_REQUEST['password2']) and md5($_REQUEST['password2']) == $password2)
					{
						echo 'Неверно введен первый пароль.';
					} 
					else 
						{
							echo "Неверны оба пароля.";
						}
				}
	}
?>
<form action="" method="POST">
	<p>Первый пароль:<br>
		<input type="password" name="password1">
	</p>
	<p>Второй пароль:<br>
		<input type="password" name='password2'>
	</p>
	<input type="submit">
</form>
