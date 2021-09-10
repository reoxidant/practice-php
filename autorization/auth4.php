<!-- 4. Сделайте так, чтобы при авторизации нужно было вводить логин, пароль и длинную кодовую строку (осмысленный длинный текст). -->
<?php
$password = md5('133890');
$login = md5('admin');
$textcode = md5('i would fought for that');

$correctPassword = !empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password;
$correctLogin = !empty($_REQUEST['login']) && md5($_REQUEST['login']) === $login;
$correctText = !empty($_REQUEST['text']) && md5($_REQUEST['text']) === $textcode;

if ($correctPassword && $correctLogin && $correctText) {
    echo "Добро пожаловать, " . $_REQUEST['login'] . "!";
} else {
    echo "Неправильно введены данные!";
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
        <p>Секретное слово:<br>
            <label>
                <input type="text" name='text'>
            </label>
        </p>
        <input type="submit">
    </form>
    <?php
}
?>