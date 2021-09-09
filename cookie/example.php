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

if (!empty($_GET['userphone'])) {
    setcookie('userphone', $_GET['userphone'], time() + 3600, '/');
}

//Если форма была отправлена и имя не пустое:
if (!empty($_GET['username'])) {
    //Пишем имя в куки:
    if (setcookie('username', $_GET['username'], time() + 3600, '/')) {
        echo "Куки установлены";
    } else {
        echo "Куки не установлены";
    }
}

?>
    <form action="" method="GET">
        <label>
            <input type="text" name="username">
        </label>
        <input type="submit">
    </form>

    <form action="" method="GET">
        <p> Введите телефон: <br>
            <label>
                <input type="text" name="userphone">
            </label>
        </p>
        <input type="submit" name="submit">
    </form>

<?php
if (!empty($_COOKIE['userphone'])) {
    $userphone = $_COOKIE['userphone'];
} else {
    $userphone = '';
}
?>
<?php
if (!empty($_COOKIE['userphone'])) {
    ?>

    <form action="" method="GET">
        <p>
            Ваш логин: <br>
            <label>
                <input type="text" name="username" value="<?=$_COOKIE['username']?>" >
            </label>
        </p>
        <p>
            Введите имя: <br>
            <label>
                <input type="text" name="name" >
            </label>
        </p>
        <p>
            Введите фамилию: <br>
            <label>
                <input type="text" name="surname">
            </label>
        </p>
        <p>
            Введите телефон: <br>
            <label>
                <input type="text" name="phone" value="<?= $userphone ?>">
            </label>
        </p>
        <input type="submit">
    </form>

    <?php
}
?>