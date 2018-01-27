<!--
//ПРИМЕРЫ//
 <form action="" method="GET">
	<input type="text" name="username">
	<input type="submit">
</form>

<?php
	//Если форма была отправлена и имя не пустое:
	if (!empty($_GET['username'])) {
		//Пишем имя в куки:
		if(setcookie('username', $_GET['username'], time()+3600, '/'))
		{
			echo "Куки установлены";
		} else {
			echo "Куки не установлены";
		}
	}
?> -->

<!-- <form action="" method="GET">
	<p> Введите телефон: <br>
		<input type="text" name="userphone">
	</p>
	<input type="submit" name="submit">
</form>

<?php
	if(!empty($_GET['userphone']) AND isset($_GET['submit'])){
		setcookie('userphone', $_GET['userphone'], time()+3600, '/');
	}
?>

<?php 
	if(!empty($_COOKIES['userphone'])){
		$userphone = $_COOKIES['userphone'];
	} else {
		$userphone = '';
	}
?>

<?php 
	if(!empty($_COOKIES['userphone'])){
?>

<form action="" method="GET">
	<p>	
		Введите имя: <br>
		<input type="text" name="name">
	</p>
	<p>
		Введите фамилию: <br>
		<input type="text" name="surname">
	</p>
	<p>
		Введите телефон: <br>
		<input type="text" name="phone" value="<?php echo $userphone; ?>">
	</p>
	<input type="submit">
</form>

<?php 
	}
?> 
//ПРИМЕРЫ//
-->

<!-- Тема: Задачи на cookie(куки) в PHP -->
<!-- Тема: Работа со cookie -->

<!-- 1. Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в куки с именем country. При заходе на test.php выведите страну пользователя. -->

<!-- <form action="test.php" method="GET">
	<p>Напишите вашу страну<br>
		<input type="text" name="country">
	</p>
	<input type="submit" name="submit">
</form> -->

<!-- 2. Удалите куку с именем country. -->

<!-- <?php 
	setcookie('country', '', time(), "/");
?> -->

<!-- 3. Установите куку с именем age. Запишите туда случайное число от 10 до 70 (с помощью mt_rand). Сделайте так, чтобы эта кука установилась на 1 час, на 3 часа, на 1 день, на год, на 10 лет, до конца текущего дня, до конца текущего года. -->
<?php
	// setcookie('age', mt_rand(10,70), time() + 3600, "/");
	// setcookie('age', mt_rand(10,70), time() + 3600*3), "/";
	// setcookie('age', mt_rand(10,70), time() + 3600*24, "/");
	// setcookie('age', mt_rand(10,70), time() + 3600*24*365, "/");
	// setcookie('age', mt_rand(10,70), time() + 3600*24*365*10, "/");
	// setcookie('age', mt_rand(10,70), strtotime('now 24:00:00') - strtotime('now'), "/");
	// setcookie('age', mt_rand(10,70), strtotime(date('Y-12-31')) - strtotime('now'), "/");
?>

<!-- 4. Напишите оболочку над cookie. Оболочка должна представлять собой набор функций: сохранение куки, удаление куки, редактирование куки. -->

<!-- <?php 
	function editCookie($str, $getValue, $time)
	{
		if(!empty($_COOKIE[$str])){
			setcookie($str, $getValue, $time, "/");
		}else{
			echo 'error';
		}
	}

	function delCookie($str)
	{
		setcookie('$str', '', time(), "/");
	}

	function saveCookie($str, $getValue)
	{
		setcookie($str, $getValue, "/");
	}
?> -->

<!-- 5. Сделайте на сайте 5 картинок с товарами. Реализуйте корзину. Под каждой картинкой должна быть ссылка 'Положить в корзину'. По нажатию на эту ссылку этот товар должен занестись в корзину (сессия), также должна увеличиться общая сумма, которую должен заплатить пользователь (сумма также должна быть указана под картинками с товарами). -->

<!-- В личке. -->

<!-- 6. Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'. -->

<!-- 7. Покажите пользователю баннер с кнопкой 'Не показывать больше!'. Если он нажмет на эту кнопку - не показывайте ему баннер в течении месяца. -->

<!-- 8. Запомните дату последнего посещения сайта пользователем. При заходе на сайт напишите ему, сколько дней он не был на вашем сайте. -->

<!-- 9. Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его! -->

<!-- 10. Реализуйте выбор дизайна сайта пользователем. Сделайте несколько дизайнов сайта. Пользователь может выбрать один из дизайнов с помощью выпадающего списка. Этот выбор будет сохранен в куки и пользователь, заходя на сайт, всегда будет видеть один и тот же дизайн. -->



