<!-- 6.  Сделайте авторизацию по паролю, при условии определенного ip пользователя. Подсказка: ip пользователя лежит здесь $_SERVER['REMOTE_ADDR']. -->

<?php
$password = md5('133890');
$ip = '127.0.0.1';

$correctPassword = !empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password;

if ($correctPassword && $_SERVER['REMOTE_ADDR'] === $ip) {
    echo 'Авторизация успешно пройдена.';
} elseif ((!$correctPassword && $_SERVER['REMOTE_ADDR'] !== $ip) || $_SERVER['REMOTE_ADDR'] === $ip) {
    echo 'Неверный пароль или ip пользователя';
    ?>

    <form action="" method="POST">
        <p>Введите пароль:<br>
            <label>
                <input type="password" name='password'>
            </label>
        </p>
        <input type="submit" name='Отправить'>
    </form>

    <?php
}
?>