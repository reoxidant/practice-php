<!-- <form action="hello.php" method="GET">
	<p>
		Введите свое имя: <br>
		<input type="text" name="username">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
if(isset($_GET['submit']) AND !empty($_GET['username'])){
	session_start(); 
	$_SESSION['username'] = $_REQUEST['username'];
}
?> -->

<!-- <form action="hello.php" method="GET">
	<p>	
		Введите свой номер телефона: <br>
		<input type="text" name="userphone">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
if(isset($_GET['submit']) AND !empty($_GET['userphone'])){
	session_start();
	$_SESSION['userphone'] = $_GET['userphone'];
}

?> -->
<!-- Тема: Задачи на сессии PHP

Тема: Работа с сессиями

1. Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию. При заходе на test.php выведите страну пользователя.

#index.php#

<form action="#" method="GET">
	<p>
		Введите вашу страну: <br>
		<input type="text" name="usercountry">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(!empty($_REQUEST['usercountry'])){
		session_start();
		$_SESSION['usercountry'] = $_REQUEST['usercountry'];
	}
?>

#test.php#

<?php 
	session_start();
	if(!empty($_SESSION['usercountry'])){	
		$country = $_SESSION['usercountry'];
	} else {
		$country = '';
	}
?>

<h1>	
	Ваша страна: <?php echo $country;?>
</h1> -->

<!-- 2. Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.

<?php
	session_start();
	if(empty($_SESSION['time'])){	
		$_SESSION['time'] = time();
		echo "Время вашего захода на сайт: ".time();
	}
	if(!empty($_SESSION['time'])){
		echo "Вы зашли ".(time() - $_SESSION['time'])." секунд назад.";
	}
?> -->

<!-- 3. Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.

<?php 
	if(empty($_GET['email'])){
?>

<form action="" method="GET">
	<p>Введите ваш email: <br><input type="text" name="email"></p>
	<input type="submit" name="submit">
</form>

<?php
	}
	if(!empty($_GET['email']) AND isset($_GET['submit'])){
		session_start();
		$_SESSION['email'] = $_GET['email'];
?>

<form action="">
	<p>Ваше имя: <br><input type="text"></p>
	<p>Ваша фамилия: <br><input type="text"></p>
	<p>Ваш пароль: <br><input type="text"></p>
	<p>Ваш email: <br><input type="text" value="<?php echo $_SESSION['email']; ?>"></p>
</form>

<?php 
}
?> -->

<!-- 4. Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.

<?php
	session_start();
	if(!isset($_SESSION['value'])){
		echo "Вы еще не обновляли страницу.";
		$_SESSION['value'] = 1;
	} else{
		echo "Страница обновлена ".$_SESSION['value'].' раз.';
		$_SESSION['value'] += 1;
	}	
	
	if($_SESSION['value'] >= 20){
		session_destroy();
	}
?> -->

<!-- 5. Сделайте две страницы: index.php и form.php. При заходе на index.php спросите с помощью формы город и возраст пользователя. На form.php сделайте форму с полями 'Имя', 'Возраст', 'Город'. При заходе на form.php сделайте так, чтобы поля 'Возраст' и 'Город' уже были заполнены.

#index.php#

<form action="form.php" method="GET">
	<p>Напишите ваш город: <br><input type="text" name="usercity"></p>
	<p>Укажите свой возраст: <br><input type="text" name="userage"></p>
	<input type="submit" name="submit">
</form>

#form.php#

<?php 
	session_start();
	if(isset($_GET['submit']) and !empty($_GET['usercity'] and !empty($_GET['userage']))){
		$_SESSION['usercity'] = $_GET['usercity'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>
<form action="logout.php">
	<p>Ваше имя: <br>
	<input type="text">
	</p>
	<p>Ваш возраст: <br>
	<input type="text" value="<?php echo $_SESSION['userage']; ?>">
	</p>
	<p>Ваш город: <br>
	<input type="text" value="<?php echo $_SESSION['usercity']; ?>">
	</p>
	<input type="submit" value="Разрушить сесcию">
</form>
 -->

<!-- 6. Добавьте в предыдущую задачу страницу logout.php. При заходе на нее разрушайте сессию пользователя. 

#index.php#

<form action="form.php" method="GET">
	<p>Напишите ваш город: <br><input type="text" name="usercity"></p>
	<p>Укажите свой возраст: <br><input type="text" name="userage"></p>
	<input type="submit" name="submit">
</form>

#form.php#

<?php 
	session_start();
	if(isset($_GET['submit']) and !empty($_GET['usercity'] and !empty($_GET['userage']))){
		$_SESSION['usercity'] = $_GET['usercity'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>
<form action="logout.php">
	<p>Ваше имя: <br>
	<input type="text">
	</p>
	<p>Ваш возраст: <br>
	<input type="text" value="<?php echo $_SESSION['userage']; ?>">
	</p>
	<p>Ваш город: <br>
	<input type="text" value="<?php echo $_SESSION['usercity']; ?>">
	</p>
	<input type="submit" value="Разрушить сесcию">
</form>

#logout.php#

<?php if(session_destroy()){echo "сессия успешно разрушена";} 
var_dump($_SESSION);?>
<a href="main.php"><button>Вернуться на главную.</button></a> -->

7. Реализуйте тест по принципу 'одна страница сайта - одна задача'. Запомните результаты ответов пользователя в сессию.

#testn1.php#

 <form action="testn2.php" method="GET">
	<p>Введите ваше имя: <br><input type="text" name="username"></p>
	<p>Введите ваш возраст: <br><input type="text" name="userage"></p>
	<p><input type="submit" name="submit"></p>
</form>

#testn2.php#

<?php 
	if(!empty($_GET['username']) and !empty($_GET['userage'])){
		session_start();
		$_SESSION['username'] = $_GET['username'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>
<form action="testn3.php" method="GET">
	<p>
		<b>Каким браузером в основном пользуетесь?</b><br>
	</p>
	<p>
		<input type="radio" name="userbr" value="IE" id="ch1" checked><label for="ch1">Internet Explorer</label><br>
		<input type="radio" name="userbr" value="Firefox" id="ch2"><label for="ch2">Opera</label><br>
		<input type="radio" name="userbr" value="Opera" id="ch3"><label for="ch3">Firefox</label><br>
		<input type="radio" name="userbr" value="Chrome" id="ch4"><label for="ch4">Chrome</label><br>
	</p>
	<input type="submit" value="Далee">
</form>

#testn3.php#

<?php 
	if(isset($_GET['userbr'])){
		session_start();
		$_SESSION['userbr'] = $_GET['userbr'];
	}
?>
<form action="finish.php" method="GET">
	<p>
		<b>Какой курс вы прошли?</b>
	</p>
	<p>
		<input type="checkbox" name="curse[]" value="HTML" id="ch1"><label for="ch1">HTML</label> 
		<input type="checkbox" name="curse[]" value="CSS" id="ch2"><label for="ch2">CSS</label> 
		<input type="checkbox" name="curse[]" value="JS" id="ch3"><label for="ch3">JS</label> 
		<input type="checkbox" name="curse[]" value="PHP" id="ch4"><label for="ch4">PHP</label> 
	</p>
	<input type="submit" value="Завершить">
</form>

#finish.php#

<?php 
	if(isset($_GET['curse'])){
		session_start();
		$_SESSION['curse'] = implode(',', $_GET['curse']);
	} 	
?>
<p><b>О вас:</b></p>
<p>Ваше имя: <br><input type="text" value="<?php echo $_SESSION['username']; ?>"></p>
<p>Ваш возраст: <br><input type="text" value="<?php echo $_SESSION['userage'];?>"></p>
<p>Ваш браузер: <br><input type="text" value="<?php echo $_SESSION['userbr'];?>"></p>
<p>Имеются навыки в: <br><input type="text" value="<?php echo $_SESSION['curse'];?>"></p>
<a href="testn1.php"><button>Завершить</button></a>


