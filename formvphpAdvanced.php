<!-- example -->
<!-- <form action="" method="GET">
	<input type="hidden" name="hello" value="0">
	<input type="checkbox" name="hello" value='1'>
	<input type="submit">
</form>

<?php 
	if(!empty($_REQUEST) and $_REQUEST['hello'] == 1){
		echo "Отмечен";
	} 

	if(!empty($_REQUEST) and $_REQUEST['hello'] == 0){
		echo "Не отмечен";
	}
?> -->

<!-- <form action="" method="GET">
	<?php echo input("age", 25); ?>
	<input type="submit">
</form>
<?php 
	function input($name, $value)
	{

		if(isset($_REQUEST[$name])){
			$value = $_REQUEST[$name];
			var_dump($_REQUEST);
		}

		return '<input type="text" name="'.$name.'" value="'.$value.'">';
	}

	
?> -->
<!-- example -->

<!-- Тема: Задачи на продвинутую работу с формами -->

<!-- Тема: Работа с checkbox -->

<!-- 1. Спросите у пользователя имя с помощью формы. Сделайте чекбокс: если он отмечен, то поприветствуйте пользователя, если не отмечен - попрощайтесь с пользователем.  -->

<!-- <form action="">
	<p>
		Ваше имя: <br>
		<input type="text" name="userName">
	</p>
	<input type="hidden" name="hello" value="0">
	<input type="checkbox" name="hello" value="1">
	<input type="submit">
</form>

<?php 
	var_dump($_REQUEST);
 	if(!empty($_REQUEST) and $_REQUEST['hello'] == 1){
 		echo "Привет, ".$_REQUEST['userName'];
	} 
	if(!empty($_REQUEST) and $_REQUEST['hello'] == 0){
		echo "Досвидания, ".$_REQUEST['userName'];
	}
?> -->

<!-- 2. Спросите у пользователя, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь.  -->

<!-- <form action="" method="GET">
	<p>
		Какие языки вы знаете?<br>
		<p>
			<input type="checkbox" id='ch1' name="lang[]" value="html"><label for="ch1">html5 </label><br>
			<input type="checkbox" id='ch2' name="lang[]" value="css"><label for="ch2">css </label><br>
			<input type="checkbox" id='ch3' name="lang[]" value="php"><label for="ch3">php </label><br>
			<input type="checkbox" id='ch4' name="lang[]" value="javascript"><label for="ch4">javascript </label><br>
		</p>
		Остальные: <br>
		<input type="text" name="lang[]">
	</p>
	<input type="submit" name='submit'>
</form>

<?php 
	if(!empty($_REQUEST)){
		if(!empty($_REQUEST['lang'][0]) and isset($_REQUEST["submit"])){
			echo "Языки котоыре вы знаете: ".implode(", ", $_REQUEST['lang']);
		} else {
			echo "Вы не знаете никаких языков."; 
		}
	}
?> -->

<!-- Тема: Работа с radio переключателями -->

<!-- 3. Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок. Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен. -->

<!-- <form action="" method='GET'>
		<p>
			Знаете ли вы php? <br>
			<input id="ch1" type="radio" name="browser" value="yes" checked><label for="ch1">Да </label><br>
			<input id="ch2" type="radio" name="browser" value="no" ><label for="ch2">Нет </label>
		</p>
		<input type="submit">
</form>
	
<?php 
	if(!empty($_REQUEST)){
		if($_REQUEST['browser'] == 'yes'){
			echo "Вы знаете PHP";
		}
		if($_REQUEST['browser'] == 'no'){
			echo "Вы не знаете PHP";
		}
	}
?> -->

<!-- 4. Спросите у пользователя его возраст с помощью нескольких radio-кнопок. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30. -->

<!-- <form action="">
	<p>
		Какой ваш возраст? <br>
		<input type="radio" name="age[]" value="20" id="ch1"><label for="ch1">менее 20 лет </label><br>
		<input type="radio" name="age[]" value="20-25" id="ch2"><label for="ch2">20-25 лет </label><br>
		<input type="radio" name="age[]" value="26-30" id="ch3"><label for="ch3">26-30 лет </label><br>
		<input type="radio" name="age[]" value="30" id="ch4"><label for="ch4">более 30 лет </label><br>
	</p>
	<input type="submit" name="submit">
</form>

<?php
	if(!empty($_REQUEST)){
		if(!empty($_REQUEST['age']) and isset($_REQUEST['submit'])){
			echo "Ваш возраст: ".implode(", ", $_REQUEST['age']);
		} else{
			echo "Не выбран не один вариант.";
		}
	} 
?> -->

<!-- Тема: Select и multi-select -->

<!-- 5. Спросите у пользователя его возраст с помощью select. Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30.  -->

<!-- <form action="" method="GET">
	<select size='1' name="age" id="">
		<option disabled>Сколько вам лет?</option>	
		<option value="1">менее 20 лет</option>
		<option value="2">20-25</option>
		<option value="3">26-30</option>
		<option value="4">более 30 лет</option>
	</select> <br> <br>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['age'])){
		if($_REQUEST['age'] == 1){
			echo "Вам менее 20 лет";
		}
		if($_REQUEST['age'] == 2){
			echo "Вам 20-25 лет";
		}
		if($_REQUEST['age'] == 3){
			echo "Вам 26-30 лет";
		}
		if($_REQUEST['age'] == 4){
			echo "Вам более 30 лет";
		}
	} else if(empty($_REQUEST['age']) and isset($_REQUEST['submit'])){
		echo "Не выбран не один вариант.";
	} 
?>
 -->

<!-- 6. Спросите у пользователя с помощью мультиселекта, какие из языков он знает: html, css, php, javascript. Выведите на экран те языки, которые знает пользователь. -->

<!-- <form action="" method="GET">
	<select name="lang[]" id="" multiple>
		<option disabled>Какие из языков вы знаете?</option>
		<option value="html">html</option>
		<option value="css">css</option>
		<option value="php">php</option>
		<option value="javascript">javascript</option>
	</select> <br> <br>
	<input type="submit" name="submit">
</form>

<?php 
	if(!empty($_REQUEST['submit'])){
		if(!empty($_REQUEST['lang'])){
			echo "Вы знаете: ".implode(', ', $_REQUEST['lang']);
		} else {
			echo "Значение не выбрано.";
		}
	}
?> -->

<!-- Тема: Задачи -->

<!-- 7. Сделайте функцию, которая создает обычный текстовый инпут. Функция должна иметь следующие параметры: type, name, value. -->

<!-- <?php 
	function text1($type, $name, $value)
	{
		echo '<input type='.$type.' value='.$value.' name='.$name.'>';
	}

	text(text, login, admin);
?> -->

<!-- 8. Модифицируйте функцию из предыдущей задачи так, чтобы она сохраняла значение инпута после отправки.  -->

<?php 
	function text($type, $name, $value)
	{
		echo '<input type='.$type.' value='.$value.' name='.$name.'>';
	}

	function run()
	{
		text(text, login, admin);
		echo '<input type="submit" name="submit">';
	}

	run();
	var_dump($_REQUEST);
?>





