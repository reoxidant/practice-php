<?php
if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../../404.html'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<div style="width: 200px; margin: 0 auto;">
    <header style="width: 150px; margin: 0 auto;">
        <h2>Авторизация пользователя</h2>
    </header>
    <form action="" method="POST">
        <fieldset>
            <legend>Введите данные:</legend>
            <p>
                Логин: <br>
                <label>
                    <input type="text" name="a_login"
                           value="<?php echo isset($_REQUEST['a_login']) ? $_REQUEST['a_login'] : ''; ?>">
                </label>
            </p>
            <p>
                Пароль: <br>
                <label>
                    <input type="password" name="a_password" value="">
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="remember"
                           value="1" <?php echo $_REQUEST['remember'] === 1 ? "checked" : ""; ?>>
                    Запомнить меня
                </label>
            </p>
            <input type="submit" name="submit">
        </fieldset>
        &nbsp<?php include('auth_engine.php');

        ?>
    </form>
</div>
</body>
</html>