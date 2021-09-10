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

<form action="hello.php" method="GET">
    <p>
        Введите свое имя: <br>
        <input type="text" name="username">
    </p>
    <input type="submit" name="submit">
</form>

<?php
if(isset($_GET['submit']) AND !empty($_GET['username'])){
    $_SESSION['username'] = $_REQUEST['username'];
}
?>

<form action="hello.php" method="GET">
    <p>
        Введите свой номер телефона: <br>
        <input type="text" name="userphone">
    </p>
    <input type="submit" name="submit">
</form>

<?php
if(isset($_GET['submit']) AND !empty($_GET['userphone'])){
    $_SESSION['userphone'] = $_GET['userphone'];
}

?>
