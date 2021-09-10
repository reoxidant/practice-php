<?php session_start();?>

<!-- Тема: Задачи на сессии PHP

Тема: Работа с сессиями

1. Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию. При заходе на test.php выведите страну пользователя. -->

<form action="#" method="GET">
	<p>
		Введите вашу страну: <br>
		<input type="text" name="usercountry">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(!empty($_REQUEST['usercountry'])){
		$_SESSION['usercountry'] = $_REQUEST['usercountry'];
	}
?>

<?php
	if(!empty($_SESSION['usercountry'])){	
		$country = $_SESSION['usercountry'];
	} else {
		$country = '';
	}
?>

<h1>	
	Ваша страна: <?php echo $country;?>
</h1>

<!-- 2. Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт. -->

<?php
	if(empty($_SESSION['time'])){	
		$_SESSION['time'] = time();
		echo "Время вашего захода на сайт: ".time();
	}
	if(!empty($_SESSION['time'])){
		echo "Вы зашли ".(time() - $_SESSION['time'])." секунд назад.";
	}
?>

<!-- 3. Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено. -->

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
?>

<!-- 4. Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу. -->

<?php
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
?>