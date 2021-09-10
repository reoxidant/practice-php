<!-- 1. Сделайте так, чтобы при авторизации нужно было вводить не только пароль, но и логин. Логин отличается от пароля тем, что показывается открыто (а не звездочками) и в файле также хранится открыто. -->

<?php
$password = '9a75a9a654c981168160f7250d240e4a';
$login = '21232f297a57a5a743894a0e4a801fc3';

$correctPassword = !empty($_REQUEST['password']) and md5($_REQUEST['password']) === $password;
$correctLogin = !empty($_REQUEST['login']) and md5($_REQUEST['login']) === $login;

if ($correctPassword && $correctLogin) {
    echo "Добро пожаловать, " . $_REQUEST['login'] . "!";
} elseif (!$correctPassword || !$correctLogin) {
    echo "Неверно введен логин или пароль!";
}
?>
<form action="" method="POST">
    <p>Введите Логин:<br>
        <label>
            <input type="text" name="login">
        </label>
    </p>
    <p>Введите Пароль:<br>
        <label>
            <input type="password" name="password">
        </label>
    </p>
    <input type="submit">
</form>

