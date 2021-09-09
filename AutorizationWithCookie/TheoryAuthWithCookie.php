<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'reg';

$link = mysqli_connect($host, $user, $password) or die(mysqli_error($link));
mysqli_query($link, "CREATE DATABASE IF NOT EXISTS " . $db_name . "") or die(mysqli_error($link));
mysqli_select_db($link, $db_name) or die(mysqli_error($link));
mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
		id int(4) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
		login VARCHAR(100) NOT NULL, 
		password VARCHAR(100) NOT NULL, 
		salt VARCHAR(100) NOT NULL, 
		cookie VARCHAR(100) NOT NULL, 
		UNIQUE us (login)
		)") or die (mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AuthWithCookie</title>
</head>
<body>
<form action="" method="POST">
    <label>
        <input type="text" name="login">
    </label>
    <label>
        <input type="password" name="password">
    </label>
    <label>
        <input type="checkbox" name="remember" value='1'>
    </label>
    <input type="submit" value="Отправить">
</form>
<?php
if (!empty($_REQUEST['login']) && !empty($_REQUEST['password']) && isset($_REQUEST['submit'])) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'") || die (mysqli_error($link));

    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        $salt = $user['salt'];
        $saltedPassword = generateSalt();

        if ($user['password'] === $saltedPassword) {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];

            if (!empty($_REQUEST['remember']) && $_REQUEST['remember'] === 1) {
                $key = generateSalt();

                setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30);
                setcookie('key', $key, time() + 60 * 60 * 24 * 30);

                $query = "UPDATE users SET cookie='$key' WHERE login='$login'";
                mysqli_query($link, $query);
            }

            if ($_SESSION['auth'] = true) {
                echo "Вы успешно зарегистрировались!";
            }
        } else {
            echo "Неправильный логин или пароль!";
        }
    } else {
        echo "Неправильный логин или пароль!";
    }
} else if (isset($_REQUEST['submit'])) {
    echo "Вы не ввели все поля!";
}
?>
<?php
/**
 * @return string
 */
function generateSalt()
{
    $salt = '';
    $lenght = 8;
    for ($i = 0; $i < $lenght; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}

?>
<?php
if (empty($_SESSION['auth']) || $_SESSION['auth'] === false) {
    if (!empty($_COOKIE['login']) && !empty($_COOKIE['key'])) {
        $login = $_COOKIE['login'];
        $key = $_COOKIE['key'];

        $query = "SELECT*FROM users WHERE login='$login' AND cookie='$key'";
        $result = mysqli_fetch_assoc(mysqli_query($link, $query));

        if (!empty($result)) {
            session_start();

            $_SESSION['auth'] = true;

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
        }
    }
}
?>
<!-- logout -->
<?php
if (!empty($_SESSION['auth']) && $_SESSION['auth']) {
    session_start();
    session_destroy();

    setcookie('login', '', time());
    setcookie('key', '', time());
}
?>
</body>
</html>