<!-- ПРИМЕРЫ -->
<?php
$password = '9a75a9a654c981168160f7250d240e4a';

$correctPassword = !empty($_REQUEST['password']) && md5($_REQUEST['password']) === $password;

if ($correctPassword) {
    echo 'Доступ открыт';
} else {
    echo "Неправильный пароль!<br>";
    ?>
    <form action="auth.php" method="POST">
        <p>
            Введите пароль к системе: <br>
            <label>
                <input type='password' name="password">
            </label>
        </p>
        <input type="submit" value='Отправить'>
    </form>
    <?php
}
?>