<!-- EXAMPLE  -->
<!-- 1. пример -->
<!-- 	
<form action='' method="GET">
	<input type="text" name="city">
	<input type="submit">
</form>
<?php 
if(!empty($_REQUEST['city'])){
	$city = $_REQUEST['city'];
	echo 'Ваш город: '.$city;
}
?> -->
<!-- 2. пример -->
<!-- <form action="" method>
	<input type="text" name="city">
	<input type="submit">
</form>

<?php 
	//Если форма была отправлена и город не пустой
	if(isset($_REQUEST['city'])){
		$city = strip_tags($_REQUEST['city']);
		echo 'Ваш город: '.$city;
	}
?>

<!-- 3. пример -->
<!-- <?php 
	//Если город пустой - покажем форму
	if(!isset($_REQUEST["city"])){
?>
	<form action="" method="GET">
		<input type="text" name="city">
		<input type="submit">
	</form>

<?php 
	}
?>

<?php 
	if(isset($_REQUEST["city"])){
		$city = strip_tags($_REQUEST['city']);
		echo "Ваш город: ".$city;
	}
?> -->
<!-- EXAMPLE -->
<!-- Задачи на формы в PHP

Тема: Формы

1. Спросите имя пользователя с помощью формы. Результат запишите в переменую $name. Выведите на экран фразу 'Привет, %Имя%'.

<form action="" method="GET">
	<b>Ваше имя:</b><br>
	<input type="text" name="user">
	<input type="submit">
</form>

<?php
	if(isset($_REQUEST['user'])){
		$name = strip_tags($_REQUEST['user']);
		echo "Привет, ".$name;
	}
?>

2. Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.

<form action="" method="GET">
	<p>
		<b>Ваше имя:</b><br>
		<input type="text" name="userName">
	</p>
	<p>
		<b>Ваш возраст:</b><br>
		<input type="text" name="userAge">
	</p>
	<p>
		<b>Комментарий:</b><br>
		<textarea name="text" id="" cols="30" rows="5"></textarea>
	</p>
	<input type="submit" name="submit">
</form>

<?php
	if(isset($_REQUEST['submit'])){
		$name = strip_tags($_REQUEST['userName']);
		$age = strip_tags($_REQUEST['userAge']);
		$text = strip_tags($_REQUEST['text']);
		echo "Привет, ".$name.', '.$age.' лет.'.'<br>'."Твое сообщение: ".$text;
	}
?>

3. Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее. 

<?php
	if(!isset($_REQUEST["age"])){
?>
	<form action="" method="GET">
		<p>
			<b>Ваш возраст: </b><br>
			<input type="text" name="age">
		</p>
		<input type="submit" name="submit">
	</form>
<?php
	}else{ 
		$age = strip_tags($_REQUEST['age']);
		echo "Ваш возраст: ".$age;
	}
?>

4. Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass, хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'. Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.

<?php 
	$login = 'admin';
	$pass = '123890';
?>
<?php
	if(!isset($_REQUEST['submit'])){
?>
<form action="" method="GET">
	<p>
		<b>Введите Логин:</b><br>
		<input type="text" name="login">
	</p>
	<p>
		<b>Введите Пароль:</b><br>
		<input type="password" name="pass" >
	</p>
	<input type="submit" name="submit">
</form>
<?php
	}else{
		$loginUser = trim($_REQUEST['login']);
		$passUser = trim($_REQUEST['pass']);
		if($loginUser === $login and $passUser === $pass){
			echo "Доступ разрешен!";
		} else {
			echo "Доступ запрещен!";
		}
	}
?> -->

<!-- Тема: Атрибуты value и placeholder

5. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Сделайте так, чтобы после отправки формы значения ее полей не пропадали.

<form action="" method="GET">
	<p>
		Ваше имя:<br>
		<input type="text" name="userName" value='<?php if(isset($_REQUEST['userName'])) echo $_REQUEST['userName']; ?>'>
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit'])){
		$name = strip_tags($_REQUEST['userName']);
		echo "Ваше имя: ".$name; 
	}
?>

6. Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки формы значения его полей не пропадали.

<form action="" method="GET">
	<p>
		Ваше имя: <br>
		<input type="text" name="userName" value='<?php if(isset($_REQUEST['userName'])) echo $_REQUEST['userName']; ?>'>
	</p>
	<p>
		Введите сообщение: <br>
		<textarea name="message" id="" cols="30" rows="5"><?php if(isset($_REQUEST['message'])) echo $_REQUEST['message']; ?>	
		</textarea>
	</p>
	<input type="submit" name="submit">
</form>

<?php
	if(isset($_REQUEST['submit'])){
		$name = strip_tags($_REQUEST['userName']);
		$msg = strip_tags($_REQUEST['message']);
		echo "Ваше имя: ".$name."<br>"."Ваше сообщение: ".$msg;
	}
?>
 -->

