<?php
session_start();
$host = 'localhost';
$name = 'root';
$password = '';
$db_name = 'reg';
$flag = true;

$link = mysqli_connect($host, $name, $password) or die (mysqli_error($link) . "1");
mysqli_query($link, "CREATE DATABASE IF NOT EXISTS " . $db_name . "") or die(mysqli_error($link) . "2");
mysqli_select_db($link, $db_name) or die (mysqli_error($link) . "3");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
        id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        age INT(10) NOT NULL,
        email VARCHAR(100) NOT NULL,
        city VARCHAR(100) NOT NULL,
        lang VARCHAR(100) NOT NULL,
        dt VARCHAR(100) NOT NULL,
        salt VARCHAR(100) NOT NULL,
        cookie VARCHAR(100) NOT NULL,
        UNIQUE us (login, email)
        )") or die (mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link) . "4");

if (!empty($_REQUEST['a_login']) and !empty($_REQUEST['a_password']) and isset($_REQUEST['submit3'])) {
    $login = $_REQUEST['a_login'];
    $password = $_REQUEST['a_password'];

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'") or die (mysqli_error($link) . "1");

    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
        $salt = $user['salt'];
        $saltedPassword = generateSaltedPassword($login, $password, $salt);


        if ($user['password'] === $saltedPassword) {

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];

            if (!empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1) {
                $key = generateSalt();

                setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30);
                setcookie('key', $key, time() + 60 * 60 * 24 * 30);
                setcookie('datetime', date('Y-m-d H:i:s'), time() + 60 * 60 * 24 * 30);

                $query = "UPDATE users SET cookie='$key' WHERE login='$login'";
                mysqli_query($link, $query) or die(mysqli_error($link) . "2");
            }
        }
    }
}

if ($_REQUEST['logout'] === 1) {
    session_start();
    session_destroy();

    setcookie('login', '', time());
    setcookie('key', '', time());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>authorization</title>
</head>
<style>
    .red {
        border: 2px solid red;
    }

    .green {
        border: 2px solid green;
    }
</style>
<body>
<div style="display: table; margin: 0 auto;">
    <div style="display:table-row">
        <div style="display: table-cell;">
            <form action="" method="POST" style="width: 215px; display:inline-block;  float:left;">
                <fieldset>
                    <legend>Основные данные:</legend>
                    <p>
                        Логин *
                        <br>
                        <?php
                        if ((isset($_REQUEST['login']) && empty($_REQUEST['login'])) ||
                            checkLenght($_REQUEST['login'], 4, 12) === false) {
                            echo "<span style='color:blue;'>Ошибка</span>";
                            ?>
                            <label>
                                <input type="text" class="red" name="login"
                                       value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
                            </label>
                            <?php
                            echo "логин должен быть от 4 до 12 символов";
                        } else {
                            ?>
                            <label>
                                <input type="text" class="" name="login"
                                       value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
                            </label>
                            <?php
                        }
                        ?>
                    </p>
                    <p>
                        Пароль *
                        <br>
                        <?php
                        if ((isset($_REQUEST['password']) && empty($_REQUEST['password'])) ||
                            checkLenght($_REQUEST['password'], 6, 10) === false) {
                            echo "<span style='color:blue;'>Ошибка</span>";
                            ?>
                            <label>
                                <input type='password' class='red' name='password'
                                       value='<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>'>
                            </label>
                            <?php
                            echo "пароль должен быть от 6 до 10 символов";
                        } else {
                            ?>
                            <label>
                                <input type="password" class="" name="password"
                                       value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                            </label>
                            <?php
                        }
                        ?>
                    </p>
                    <p>
                        Подтвердите пароль *
                        <br>
                        <?php
                        if ((isset($_REQUEST['password_confirm']) && empty($_REQUEST['password_confirm'])) ||
                            checkLenght($_REQUEST['password_confirm'], 6, 10) === false) {
                            echo "<span style='color:blue;'>Ошибка</span>";
                            ?>
                            <label>
                                <input type='password' class='red' name='password_confirm'
                                       value='<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>'>
                            </label>
                            <?php
                            echo "пароль должен быть от 6 до 10 символов";
                        } else {
                            ?>
                            <label>
                                <input type='password' class='' name='password_confirm'
                                       value='<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>'>
                            </label>
                            <?php
                        }
                        ?>
                    </p>

                </fieldset>
                <br>
                <fieldset>
                    <legend>Дополнительные данные:</legend>
                    <p>
                        Имя *
                        <br>
                        <input type="text" name="name"
                               value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                    </p>
                    <p>
                        Фамилия:
                        <br>
                        <label>
                            <input type="text" name="surname"
                                   value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>">
                        </label>
                    </p>
                    <p>
                        Возраст *
                        <br>
                        <label>
                            <input type="text" name="age"
                                   value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>">
                        </label>
                    </p>
                    <p>
                        e-mail *
                        <br>
                        <label>
                            <input type="email" name="email"
                                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        </label>
                    </p>
                    <p>
                        Город:
                        <br>
                        <label>
                            <input type="text" name="city"
                                   value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>">
                        </label>
                    </p>
                    <p>
                        Ваш родной язык *
                        <label for="lang"></label><select name="lang" id="lang">
                            <option value="ru" <?php echo $_REQUEST['lang'] === 'ru' ? 'selected="select"' : ''; ?>>
                                Russian
                            </option>
                            <option value="eng" <?php echo $_REQUEST['lang'] === 'eng' ? 'selected="select"' : ''; ?>>
                                English
                            </option>
                            <option value="uk" <?php echo $_REQUEST['lang'] === 'uk' ? 'selected="select"' : ''; ?>>
                                Ukraine
                            </option>
                        </select>
                    </p>
                    <p>
                        <input type="submit" value="Отправить" name="submit">
                    </p>

                </fieldset>
            </form>
        </div>
        <div style="display: table-cell; vertical-align: top; padding-left: 15px;">
            <form action="" method="POST">
                <header>Сгенерировать пароль?</header>
                <p>
                    Длина пароля:
                    <?php
                    echo "<select name='length_pass' id='' style='width: 50px;'>";
                    if (!isset($_REQUEST['length_pass'])) {
                        for ($i = 6; $i <= 10; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                    } else {
                        for ($i = 6; $i <= 10; $i++) {
                            if ($i === $_REQUEST['length_pass']) {
                                echo "<option value='$i' selected='selected'>$i</option>";
                            } else {
                                echo "<option value='$i'>$i</option>";
                            }
                        }
                    }
                    echo "</select>";
                    ?>
                </p>
                <input type="submit" name="submit2" value="Сгенерировать">
                <p>Ваш пароль:
                    <br>
                    <label>
                        <input type="text" value="<?php
                        if (isset($_REQUEST['length_pass'])) {
                            echo getPass($_REQUEST['length_pass']);
                        } else {
                            echo '';
                        }
                        ?>
                            ">
                    </label>
                </p>
            </form>
        </div>
        <div style="display: table-cell; vertical-align: top; padding-left: 15px;">
            <!-- Если сессия пустая то покажи авторизацию -->
            <?php
            // Если существует куки то покажи личный кабинет
            if ((!empty($_COOKIE['login']) && !empty($_COOKIE['key'])) || (!empty($_SESSION['login']) && $_REQUEST['logout'] !== 1)) {
                $login = $_COOKIE['login'];
                $key = $_COOKIE['key'];

                $query = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND cookie='$key'") ||
                    die (mysqli_error($link) . "cookie auth");
                ?>
                <fieldset>
                    <legend>Личный кабинет.</legend>
                    <p>Здравствуй, <?php echo isset($_SESSION['login']) ? $_SESSION['login'] : $_COOKIE['login']; ?>
                        .</p>
                    <p>Сейчас <?php echo date('Y-m-d H:i:s'); ?>.</p>
                    <p>Ваша дата последнего посещения: <?php echo $_COOKIE['datetime']; ?></p>
                    <p><a href="?logout=1">Выйти</a></p>
                </fieldset>
                <?php
            } else {
                ?>
                <!-- Покажи авторизацию... -->
                <fieldset>
                    <legend>Авторизация</legend>
                    <form action="" method="POST">
                        <p>
                            Логин:<br>
                            <!-- Проверка логина и пароля на соответствие. -->
                            <?php
                            $login = $_REQUEST['a_login'];
                            $password = $_REQUEST['a_password'];
                            $res = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND password='$password'") ||
                                die (mysqli_error($link));
                            // Если строчки в базе нет то оставь логин и значение которые оставил пользователь
                            if (mysqli_num_rows($res) === 0){
                            ?>
                            <input type="text" name="a_login"
                                   value="<?php echo isset($_REQUEST['a_login']) ? $_REQUEST['a_login'] : ''; ?>">
                        <p>
                            Пароль:<br>
                            <input type="password" name="a_password" value="">
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" name="remember"
                                       value='1' <?php echo $_REQUEST['remember'] === 1 ? "checked" : ''; ?>>
                                Запомнить меня
                            </label>
                        </p>
                        <?php
                        // Иначе напиши стандартные значение
                        } else {
                            ?>
                            <input type="text" name="a_login" value="">
                            <p>
                                Пароль:<br>
                                <input type="password" name="a_password" value="">
                            </p>
                            <p>
                                <label>
                                    <input type="checkbox" name="remember" value='1'>
                                    Запомнить меня
                                </label>
                            </p>
                            <?php
                        }
                        ?>
                        </p>
                        <input type="submit" name="submit3">
                    </form>
                </fieldset>

                <?php
                if ($_REQUEST['logout'] === 1) {
                    echo "Вы успешно вышли!";
                }
            }
            ?>
            <!-- Обработка ошибок при вводе авторизации -->
            <?php
            if (!empty($_REQUEST['a_login']) && !empty($_REQUEST['a_password']) & isset($_REQUEST['submit3'])) {
                $login = $_REQUEST['a_login'];
                $password = $_REQUEST['a_password'];

                $result = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'") or die (mysqli_error($link) . "1");

                $user = mysqli_fetch_assoc($result);

                if (!empty($user)) {
                    $salt = $user['salt'];
                    $saltedPassword = generateSaltedPassword($login, $password, $salt);

                    if ($user['password'] === $saltedPassword) {
                        if ($_SESSION['auth'] === true) {
                            echo "Вы успешно авторизовались!";
                        }
                    } else {
                        echo "&nbsp Неправильный логин или <br> &nbsp пароль!";
                    }
                } else {
                    echo "&nbsp Неправильный логин или <br> &nbsp пароль!";
                }
            } else if (isset($_REQUEST['submit3'])) {
                echo "Вы не ввели все поля!";
            }
            ?>
        </div>
    </div>
    <div style="display: table-row; width: 300px;">
        <br>
        <?php
        if (isset($_REQUEST['submit']) && !empty($_REQUEST['login']) && !empty($_REQUEST['password']) &&
            !empty($_REQUEST['password_confirm']) && !empty($_REQUEST['name']) && !empty($_REQUEST['age']) &&
            !empty($_REQUEST['email']) && !empty($_REQUEST['lang'])) {

            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];
            $password_confirm = $_REQUEST['password_confirm'];

            $name = $_REQUEST['name'];
            $surname = $_REQUEST['surname'];
            $age = $_REQUEST['age'];
            $email = $_REQUEST['email'];
            $city = $_REQUEST['city'];
            $lang = $_REQUEST['lang'];
            $dt = date('Y-m-d H:i:s');

            if (checkLenght($_REQUEST['login'], 4, 12) && checkLenght($_REQUEST['password'], 6, 10)) {
                if ($password === $password_confirm) {
                    $is_login_free = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'") ||
                        die (mysqli_error($link) . "5");
                    if (mysqli_num_rows($is_login_free) === 0) {
                        $salt = generateSalt();
                        $saltedPassword = generateSaltedPassword($login, $password, $salt);
                        mysqli_query($link,
                            "
                                            INSERT INTO users SET 
                                            login='" . $login . "', 
                                            password='" . $saltedPassword . "', 
                                            name='" . $name . "', 
                                            surname='" . $surname . "', 
                                            age='" . $age . "', 
                                            email='" . $email . "', 
                                            city='" . $city . "', 
                                            lang='" . $lang . "', 
                                            dt='" . $dt . "', 
                                            salt='" . $salt . "'
                                          "
                        ) or die (mysqli_error($link) . " INSERT REGISTATION");

                        echo "Вы успешно зарегистрировались!";

                    } else {

                        echo "Этот логин уже занят кем-то!";
                    }
                } else {

                    echo "Ваши пароли не совпадают!";
                }
            }
        } else if ($_REQUEST['submit']) {

            echo "Обязательные и дополнительные <br> поля не заполнены.";
        }
        ?>
    </div>
</div>

<?php
/**
 * @param $length_pass
 * @return string
 */
function getPass($length_pass)
{
    $password = '';
    $words = array(
        'a', 'b', 'c', 'd', 'e', 'f',
        'g', 'h', 'i', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r',
        's', 't', 'u', 'v', 'w', 'x',
        'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O', 'P',
        'Q', 'R', 'S', 'T', 'U', 'V',
        'W', 'X', 'Y', 'Z', '1', '2',
        '3', '4', '5', '6', '7', '8',
        '9', '0', '#', '!', "?", "&"
    );

    for ($i = 0; $i < $length_pass; $i++) {
        $password .= $words[mt_rand(0, count($words) - 1)];
    }
    return $password;
}

?>

<?php
/**
 * @return string
 */
function generateSalt()
{
    $salt = '';
    $lenght = 8;
    for ($i = 0; $i < $lenght; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}

?>

<?php
/**
 * @param $value
 * @param $min
 * @param $max
 * @return bool
 */
function checkLenght($value, $min, $max)
{
    if (!$value) {
        $value = "";
    }

    return strlen($value) > $min && strlen($value) < $max;
}

?>

<?php
/**
 * @param $login
 * @param $password
 * @param $salt
 * @return string
 */
function generateSaltedPassword($login, $password, $salt)
{
    return md5($login . md5($password) . $salt);
}

?>
</body>
</html>