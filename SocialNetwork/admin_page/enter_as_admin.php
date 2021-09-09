<?php
const KEY = true;

include('../config.php');
include('../bd/bd.php');
include('../user.php');
include('../scripts/func/main.php');

session_start();

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход в админку</title>
</head>

<body>
<?php
if (isset($_REQUEST['back'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/profile/profile.php?id=' . $_SESSION['id'] . '');
    exit;
}
if ($_SESSION['auth'] && $_SESSION['status'] === 10) {
    ?>
    <fieldset style="width: 180px;">
        <legend>Админка ВХОД</legend>
        <form action="" method="POST">
            <p>
                Логин: <br>
                <label>
                    <input type="text" name="login">
                </label>
            </p>
            <p>
                Секретный пароль: <br>
                <label>
                    <input type="password" name="password">
                </label>
            </p>
            <input type="submit" name="submit" value="Отправить">
            <input type="submit" name="back" value="Назад">
        </form>
    </fieldset>
    <?php
} else {
    echo "Доступно только администратору!";
}

if (!empty($_REQUEST['login']) && !empty($_REQUEST['password']) && isset($_REQUEST['submit'])) {

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];

    $result = mysqli_query($link, "SELECT * FROM admin WHERE login='$login'") || die (mysqli_error($link));

    $admin = mysqli_fetch_assoc($result);
    $salt = $admin['salt'];
    $saltedPassword = generateSaltedPassword($login, $password, $salt);

    if (!empty($admin) && $admin['password'] === $saltedPassword) {
        header('Location: admin.php');
        exit;
    }

    echo "Неправильный логин или пароль!";
} else if ($_REQUEST['submit']) {
    echo "Введены не все поля!";
}

ob_end_flush();
?>
</body>
</html>
