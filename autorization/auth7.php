<!-- Сделайте авторизацию по паролю, при условии определенного браузера пользователя. Подсказка: браузер пользователя лежит здесь $_SERVER['HTTP_USER_AGENT']. -->

<?php
$password = md5('133890');
$browser = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';

$correctPassword = !empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password;

if ($correctPassword && $_SERVER['HTTP_USER_AGENT'] === $browser) {
    echo 'Авторизация прошла успешно.';
} else {
    if (($correctPassword && $_SERVER['HTTP_USER_AGENT'] === $browser) || $_SERVER['HTTP_USER_AGENT'] !== $browser) {
        echo 'Неправильный браузер пользователя или пароль';
    }
    ?>

    <form action="" method="POST">
        <p>Введите пароль:<br>
            <label>
                <input type="password" name="password">
            </label></p>
        <input type="submit" name='Отправить'>
    </form>

    <?php
}
?>