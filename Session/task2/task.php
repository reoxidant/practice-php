<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * ${PLUGINNAME} file description here.
 *
 * @package    ${PLUGINNAME}
 * @copyright  2021 SysBind Ltd. <service@sysbind.co.il>
 * @auther     vshapovalov
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

session_start();
?>

<p><b>TEST WITH ALL PAGES</b></p>

<!-- 7. Реализуйте тест по принципу 'одна страница сайта - одна задача'. Запомните результаты ответов пользователя в сессию -->

 <form action="testn2.php" method="GET">
	<p>Введите ваше имя: <br><input type="text" name="username"></p>
	<p>Введите ваш возраст: <br><input type="text" name="userage"></p>
	<p><input type="submit" name="submit"></p>
</form>

<?php
	if(!empty($_GET['username']) and !empty($_GET['userage'])){
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

<?php
	if(isset($_GET['userbr'])){
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

<?php
	if(isset($_GET['curse'])){
		$_SESSION['curse'] = implode(',', $_GET['curse']);
	}
?>

<p><b>О вас:</b></p>
<p>Ваше имя: <br><input type="text" value="<?php echo $_SESSION['username']; ?>"></p>
<p>Ваш возраст: <br><input type="text" value="<?php echo $_SESSION['userage'];?>"></p>
<p>Ваш браузер: <br><input type="text" value="<?php echo $_SESSION['userbr'];?>"></p>
<p>Имеются навыки в: <br><input type="text" value="<?php echo $_SESSION['curse'];?>"></p>
<a href="testn1.php"><button>Завершить</button></a>

