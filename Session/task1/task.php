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
<!-- 5. Сделайте две страницы: index.php и form.php. При заходе на index.php спросите с помощью формы город и возраст пользователя. На form.php сделайте форму с полями 'Имя', 'Возраст', 'Город'. При заходе на form.php сделайте так, чтобы поля 'Возраст' и 'Город' уже были заполнены. -->

<form action="form.php" method="GET">
	<p>Напишите ваш город: <br><input type="text" name="usercity"></p>
	<p>Укажите свой возраст: <br><input type="text" name="userage"></p>
	<input type="submit" name="submit">
</form>

<!-- form.php -->

<?php
	if(isset($_GET['submit']) and !empty($_GET['usercity'] and !empty($_GET['userage']))){
		$_SESSION['usercity'] = $_GET['usercity'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>

<p>logout.php</p>

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
