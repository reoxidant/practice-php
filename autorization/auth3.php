<!-- 3. Придумайте и реализуйте свой алгоритм хеширования. У нас был просто md5 от пароля, но можно делать различные комбинации, например: md5($login.$password) или md5($login.md5($password)). -->

<?php
$login = md5('admin');
$password = md5($login);

$correctPassword = !empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password;
$correctLogin = !empty($_REQUEST['login']) && md5($_REQUEST['login']) === $login;

if ($correctLogin && $correctPassword) {
    echo "Добро пожаловать, " . $_REQUEST['login'] . "!";
} else {
    echo "Неверно введен логин или пароль";
}
?>
<form action="" method="POST">
    <p>Введите логин:
        <br>
        <label>
            <input type="text" name="login">
        </label>
    </p>
    <p>Введите пароль:
        <br>
        <label>
            <input type="password" name="password">
        </label>
    </p>
    <input type="submit" value="Отправить">
</form>