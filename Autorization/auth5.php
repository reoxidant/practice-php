<!-- 5. Сделайте двойной тайный пароль. Конструкция должна работать так: при вводе правильного пароля сайт все равно пишет, что пароль неправильный, но ждет от вас второго пароля. То есть авторизация происходит при введении двух правильных паролей подряд. Если после первого пароля введен неправильный, а затем правильный - авторизации не происходит. -->

<?php
$password1 = md5('qwerty');
$password2 = md5('133890');

$correctPassword1 = !empty($_REQUEST['password1']) && md5($_REQUEST['password1']) === $password1;
$correctPassword2 = !empty($_REQUEST['password2']) && md5($_REQUEST['password2']) === $password2;

if ($correctPassword1 && $correctPassword2) {
    echo 'Пользователь авторизован.';
} elseif ($correctPassword1 && !$correctPassword2) {
    echo 'Неверно введен второй пароль.';
} elseif (!$correctPassword1 && $correctPassword2) {
    echo 'Неверно введен первый пароль.';
} else {
    echo "Неверны оба пароля.";
}
?>
<form action="" method="POST">
    <p>Первый пароль:<br>
        <label>
            <input type="password" name="password1">
        </label>
    </p>
    <p>Второй пароль:<br>
        <label>
            <input type="password" name='password2'>
        </label>
    </p>
    <input type="submit">
</form>
