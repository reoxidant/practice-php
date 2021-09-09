<?php
const KEY = true;

include('../config.php');
include('../bd/bd.php');
include('../scripts/func/main.php');

session_start();

if (isset($_REQUEST['back'])) {
    header('Location: profile.php?id=' . $_SESSION['id'] . '');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сменить пароль</title>
</head>
<body>
<?php
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$login = isset($_SESSION['login']) ? $_SESSION['login'] : $_COOKIE['login'];

if ((isset($_SESSION['id'], $_SESSION['login'])) || (isset($_COOKIE['login'], $_COOKIE['key']))) {
    ?>
    <fieldset>
        <legend>Сменить пароль</legend>
        <form action="" method="POST">
            <p>
                Старый пароль:
                <br>
                <label>
                    <input type="password" name="old_password">
                </label>
            </p>
            <p>
                Новый пароль:
                <br>
                <label>
                    <input type="password" name="new_password">
                </label>
            </p>
            <p>
                Подтвердите новый пароль:
                <br>
                <label>
                    <input type="password" name="password_confirm">
                </label>
            </p>
            <input type="submit" name="next" value="Сменить пароль">
            <input type="submit" name="back" value="Назад">
        </form>
    </fieldset>
    <?php
} else {
    echo "Вам необходимо авторизоваться!";
}
if (!empty($_REQUEST['old_password']) && !empty($_REQUEST['password_confirm']) && !empty($_REQUEST['new_password']) && isset($_REQUEST['next'])) {

    $old_password = $_REQUEST['old_password'];
    $password_confirm = $_REQUEST['password_confirm'];
    $new_password = $_REQUEST['new_password'];

    if ($new_password === $password_confirm) {
        $result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die (mysqli_error($link));
        $user = mysqli_fetch_assoc($result);

        $salt = $user['salt'];
        $password = $user['password'];
        $saltedPassword = generateSaltedPassword($login, $old_password, $salt);
        $saltedNewPassword = generateSaltedPassword($login, $new_password, $salt);

        if (checkLenght($new_password, 6, 12)) {
            if ($saltedPassword === $password) {
                mysqli_query($link, "UPDATE users SET password='$saltedNewPassword' where id='$id'") || die (mysqli_error($link));
                echo "Пароль успешно сменен!";
            } else {
                echo "Неверно введен старый пароль!";
            }
        } else {
            echo "Длина нового пароля должна быть от 6 до 12 символов";
        }
    } else {
        echo "Пароли не совпадают!";
    }
} else if ($_REQUEST['next']) {
    echo "Заполните все поля!";
}
?>
</body>
</html>