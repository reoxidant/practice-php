<!-- 1.  Сделайте так, чтобы все данные из таблицы хранились в сессии. -->
<?php session_start();
setcookie('dtime', date('Y-m-d H:i:s'), time() + 3600 * 24 * 31, '/');
?>
<!-- 2. Сделайте авторизацию по таблице со следующими полями: имя, фамилия, email (+логин, пароль и другое, что нужно). Все задачи ниже относятся к данной таблице, если не сказано иное. -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'auth';

$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link) . "1");
mysqli_query($link, "CREATE DATABASE IF NOT EXISTS " . $db_name . "") || die(mysqli_error($link) . "2");
mysqli_select_db($link, $db_name) or die (mysqli_error($link) . "3");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
		id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		login VARCHAR(100) NOT NULL, 
		password VARCHAR(100) NOT NULL, 
		name VARCHAR(100) NOT NULL, 
		surname VARCHAR(100) NOT NULL, 
		email VARCHAR(100) NOT NULL,
		dtime VARCHAR(100) NOT NULL,
		UNIQUE KEY us (login, email)
		)") || die (mysqli_error($link) . "4");
mysqli_query($link, "SET NAMES 'utf8'") || die(mysqli_error($link) . "5");

$user_login = 'user';
$user_pass = '12345';
$user_name = 'pavel';
$user_surname = 'durov';
$user_email = 'durov@gmail.com';

$admin_login = 'admin';
$admin_pass = '54321';
$admin_name = 'steve';
$admin_surname = 'jobs';
$admin_email = 'jobs@gmail.com';

$queryUser = "INSERT IGNORE INTO users SET login='$user_login', password='$user_pass', name='$user_name', surname='$user_surname', email='$user_email'";
mysqli_query($link, $queryUser) || die(mysqli_error($link));

$queryAdmin = "INSERT IGNORE INTO users SET login='$admin_login', password='$admin_pass', name='$admin_name', surname='$admin_surname', email='$admin_email'";
mysqli_query($link, $queryAdmin) || die(mysqli_error($link));

if (!empty($_REQUEST['login']) && !empty($_REQUEST['password']) && !empty($_REQUEST['name']) && !empty($_REQUEST['surname']) && !empty($_REQUEST['email'])) {

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND password='$password' AND name='$name' AND surname='$surname' AND email='$email'") or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($resutl);

    if (!empty($user)) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $user['login'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];
        echo 'Добро пожаловать, ' . $user['name'] . " " . $user['surname'] . "!";
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>


?>
<!-- 3. Сделайте функцию user, с помощью которой можно получить доступ ко всей информации о пользователе. Информация берется из сессии. Примеры работы: user('id') – вернет id пользователя, user('login') - вернет логин и т.д. -->
<?php
/**
 * @param $value
 * @return mixed|string
 */
function user($value)
{
    if (isset($_SESSION[$value])) {
        return $_SESSION[$value];
    }

    return "Такого значения нет в массиве.";
}

?>
<!-- 4. Сделайте функцию isAuth, которая проверяет, авторизован ли пользователь. Если да - вернет true, если нет - false. -->
<?php
/**
 * @return bool
 */
function isAuth()
{
    return $_SESSION['auth'] !== false && isset($_SESSION['auth']);
}

?>
<!-- 5. Сделайте аналогичную функцию isNotAuth, которая проверят, НЕ авторизован ли пользователь. -->
<?php
/**
 * @return bool
 */
function isNotAuth()
{
    return $_SESSION['auth'] !== true && !isset($_SESSION['auth']);
}

?>
<!-- 6. Сделайте функцию getUser($id = ''), которая параметром принимает id пользователя, а возвращает информацию из БД для данного пользователя.
В случае вызова без параметра функция должна брать информацию из БД для текущего пользователя (определяется по сессии). -->
<?php
/**
 * @param string $id
 * @param $link
 * @return string
 */
function getUser($id, $link)
{
    if (!$id) {
        $id = "";
    }

    if (!empty($id)) {
        $result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die(mysqli_error($link));
        $user = mysqli_fetch_assoc($result) || die (mysqli_error($link));
        return "Пользователь: " . $user['name'] . " " . $user['surname'] . " email: " . $user['email'] . ".";
    }

    if (!isset($_SESSION['auth'])) {
        return "Сессия и id пользователя не существует.";
    }
    return "Пользователь: " . $_SESSION['name'] . " " . $_SESSION['surname'] . " email: " . $_SESSION['email'] . ".";
}

?>

<!-- 7. Сделайте так, чтобы при авторизации в БД писалась дата последнего захода пользователя на сайт. -->
<?php
/**
 * @param $link
 * @param $login
 * @return string
 */
function loginTime($link, $login)
{
    if ($_SESSION['auth'] === true) {
        $time = isset($_COOKIE['dtime']) ? $_COOKIE['dtime'] : 'никогда';
        mysqli_query($link, "UPDATE users SET dtime='$time' WHERE login='$login'") || die (mysqli_error($link));
        return "<br>" . "Дата последнего входа на сайт " . $time . ".";
    }

    return "<br>" . "Пользователь не авторизован!";
}

?>

<form action="" method="POST">
    <p>Введите логин:<br>
        <label>
            <input type="text" name="login">
        </label>
    </p>
    <p>Введите пароль:<br>
        <label>
            <input type="password" name="password">
        </label>
    </p>
    <p>Введите свое имя:<br>
        <label>
            <input type="text" name="name">
        </label>
    </p>
    <p>Введите свою фамилию:<br>
        <label>
            <input type="text" name="surname">
        </label>
    </p>
    <p>Введите свой e-mail:<br>
        <label>
            <input type="email" name="email">
        </label>
    </p>
    <input type="submit" value="Отправить">
</form>