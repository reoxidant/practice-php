<!-- 2. Сделайте так, чтобы при авторизации нужно было вводить два пароля. -->

<?php
$password1 = '9a75a9a654c981168160f7250d240e4a';
$password2 = '9a75a9a654c981168160f7250d240e4a';

$login = '21232f297a57a5a743894a0e4a801fc3';

$correctPassword1 = !empty($_REQUEST['password1']) && md5($_REQUEST['password1']) === $password1;
$correctPassword2 = !empty($_REQUEST['password2']) && md5($_REQUEST['password2']) === $password2;
$correctLogin = !empty($_REQUEST['login']) && md5($_REQUEST['login']) === $login;

if ($correctPassword1 && $correctPassword2 && $correctLogin) {
    echo "Добро пожаловать, " . $_REQUEST['login'] . '!';
} elseif (!$correctPassword1 || !$correctPassword2 || !$correctLogin) {
    echo "Введен неправильный логин или пароль.";
} else {
    echo "Ошибка";
}
?>
<form action="" method="POST">
    <p>Введите логин:
        <br>
        <label>
            <input type="text" name="login">
        </label>
    </p>
    <p>Введите первый пароль:
        <br>
        <label>
            <input type="password" name="password1">
        </label>
    </p>
    <p>Введите второй пароль:
        <br>
        <label>
            <input type="password" name="password2">
        </label>
    </p>
    <input type="submit" value="Отправить">
</form>