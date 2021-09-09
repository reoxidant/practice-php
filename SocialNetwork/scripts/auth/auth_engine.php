<?php

if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../404.html'));
}

if (!empty($_REQUEST['a_login']) && !empty($_REQUEST['a_password']) && isset($_REQUEST['submit'])) {
    $login = $_REQUEST['a_login'];
    $password = $_REQUEST['a_password'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='$login' and banned <= NOW()") || die (mysqli_error($link));

    $user = mysqli_fetch_assoc($result);
    $salt = $user['salt'];
    $saltedPassword = generateSaltedPassword($login, $password, $salt);

    if (!empty($user) and $user['password'] === $saltedPassword) {
        if ($user['verification'] === 0) {
            echo "Пожалуйста, пройдите активацию аккаунта!";
        } else {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['status'] = $user['status'];
            setcookie('datetime', date('Y-m-d H:i:s'), time() + 60 * 60 * 24 * 30);

            if (!empty($_REQUEST['remember']) && $_REQUEST['remember'] === 1) {
                $key = generateSalt($login, $password, $salt);

                setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30, 'G:/');
                setcookie('key', $key, time() + 60 * 60 * 24 * 30, '/');
                setcookie('datetime', date('Y-m-d H:i:s'), time() + 60 * 60 * 24 * 30, '/');

                $query = "UPDATE users SET cookie='$key' WHERE login='$login'";
                mysqli_query($link, $query) || die(mysqli_error($link));

            }
            header('Location:' . HOST . 'tasksAuthAndReg/index.php?mode=auth');
            exit;
        }
    } else if (!empty($user)) {
        echo "Неправильный логин или пароль!";
    } else {
        echo "Вход запрещен, вы забанены администратором!";
    }
} else if ($_REQUEST['submit']) {
    echo "Введены не все поля!";
}

?>