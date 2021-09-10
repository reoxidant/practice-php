<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'reg';
$flag = false;

$link = mysqli_connect($host, $user, $password) || die (mysqli_error($link));
mysqli_select_db($link, $db_name) || die (mysqli_error($link));

if (!empty($_REQUEST['a_login']) && !empty($_REQUEST['a_password']) && isset($_REQUEST['submit3'])) {
    $login = $_REQUEST['a_login'];
    $password = $_REQUEST['a_password'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'") || die (mysqli_error($link) . "1");

    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        $salt = $user['salt'];
        $saltedPassword = generateSaltedPassword($login, $password, $salt);

        if ($user['password'] === $saltedPassword) {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
            $flag = true;

            if (!empty($_REQUEST['remember']) && $_REQUEST['remember'] === 1) {
                $key = generateSalt($login, $password, $salt);

                setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30);
                setcookie('key', $key, time() + 60 * 60 * 24 * 30);
                setcookie('datetime', date('Y-m-d H:i:s'), time() + 60 * 60 * 24 * 30);

                $query = "UPDATE users SET cookie='$key' WHERE login='$login'";
                mysqli_query($link, $query) || die(mysqli_error($link) . "2");
            }
        } else {
            echo "&nbsp Неправильный логин или <br> &nbsp пароль!";
        }
    } else {
        echo "&nbsp Неправильный логин или <br> &nbsp пароль!";
    }
} else if ($_REQUEST['submit3']) {
    echo "Вы не ввели все поля!";
}
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

/**
 * @param $login
 * @param $password
 * @param $salt
 * @return string
 */
function generateSaltedPassword($login, $password, $salt)
{
    return md5($login . md5($password) . $salt);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization Page</title>
</head>
<body>
<?php
if ($flag) { ?>
    <fieldset>
        <legend>Личный кабинет.</legend>
        <p>Здравствуй, <?php echo $_COOKIE['login']; ?>.</p>
        <p>Сейчас <?php echo date('Y-m-d H:i:s'); ?>.</p>
        <p>Ваша дата последнего посещения: <?php echo $_COOKIE['datetime']; ?></p>
        <p><a href="AuthCookie.php">Выйти</a></p>
    </fieldset>
<?php } ?>
</body>
</html>