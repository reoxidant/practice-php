<!-- ПРИМЕРЫ -->
<?php

$password = '9a75a9a654c981168160f7250d240e4a';

if (!empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password) {
    session_start();
    $_SESSION['auth'] = true;
} elseif (!(empty($_REQUEST['password']) || ($password === md5($_REQUEST['password'])))) {
    echo "Неправильный пароль!<br>";
    ?>
    <form action="auth.php" method="POST">
        <p>Введите пароль: <br>
            <label>
                <input type="password" name='password'>
            </label>
        </p>
        <input type="submit" value='Отправить'>
    </form>
    <?php
}
?>
