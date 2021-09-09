<?php
session_start();
const KEY = true;
include('../config.php');
include('../bd/bd.php');
include('../scripts/func/main.php');

$id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

if (isset($_REQUEST['back'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/admin_page/admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование профиля</title>
</head>
<body>
<?php
if (isAdmin()) {
    if (!empty($_REQUEST['lang'])) {
        if (isset($_REQUEST['next']) && checkLenght($_REQUEST['email'], 1, 20) && checkLenght($_REQUEST['name'], 1, 20) && checkLenght($_REQUEST['surname'], 1, 20) && checkLenght($_REQUEST['age'], 1, 20) && checkLenght($_REQUEST['city'], 1, 20)) {

            $email = $_REQUEST['email'];
            $name = $_REQUEST['name'];
            $surname = $_REQUEST['surname'];
            $age = $_REQUEST['age'];
            $city = $_REQUEST['city'];
            $lang = $_REQUEST['lang'];

            mysqli_query($link, "UPDATE users SET email='$email', name='$name', surname='$surname', age='$age', city='$city', lang='$lang' WHERE id='$id'") or die (mysqli_error($link));

            $result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die(mysqli_error($link));
            $user = mysqli_fetch_assoc($result);

            $flag = true;
        } else if ($_REQUEST['next']) {
            $flag = false;
        }
    } else if (isset($_REQUEST['next'])) {
        $flag = false;
    }
    ?>
    <?php
    if (empty($user)) {
        echo "Такого пользователя не существует";
    } else {
        ?>
        <fieldset>
            <legend>Редактирование профиля</legend>
            <form action="" method="POST">
                <p>
                    Email: <br>
                    <label>
                        <input type="text" name="email"
                               value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : $user['email']; ?>">
                    </label>
                </p>
                <p>
                    Имя: <br>
                    <label>
                        <input type="text" name="name"
                               value="<?php echo isset($_REQUEST['name']) ? $_REQUEST['name'] : $user['name']; ?>">
                    </label>
                </p>
                <p>
                    Фамилия: <br>
                    <label>
                        <input type="text" name="surname"
                               value="<?php echo isset($_REQUEST['surname']) ? $_REQUEST['surname'] : $user['surname']; ?>">
                    </label>
                </p>
                <p>
                    Возраст: <br>
                    <label>
                        <input type="text" name="age"
                               value="<?php echo isset($_REQUEST['age']) ? $_REQUEST['age'] : $user['age']; ?>">
                    </label>
                </p>
                <p>
                    Город: <br>
                    <label>
                        <input type="text" name="city"
                               value="<?php echo isset($_REQUEST['city']) ? $_REQUEST['city'] : $user['city']; ?>">
                    </label>
                </p>
                <p>
                    Язык: <br>
                    <label for="lang"></label>
                    <select name="lang" id="lang" style="width: 172px;">
                        <option value="ru" <?php echo $_REQUEST['lang'] === 'ru' ? 'selected="select"' : ''; ?>>Russian
                        </option>
                        <option value="eng" <?php echo $_REQUEST['lang'] === 'eng' ? 'selected="select"' : ''; ?>>
                            English
                        </option>
                        <option value="uk" <?php echo $_REQUEST['lang'] === 'uk' ? 'selected="select"' : ''; ?>>Ukraine
                        </option>
                    </select>
                </p>
                <input type="submit" name="next" value="Сохранить значение">
                <input type="submit" name="back" value="Назад в админку">
            </form>
            <p>
                <?php
                if ($flag) {
                    echo "Профиль обновлен!";
                } else if (isset($_REQUEST['next'])) {
                    echo "Не возможно послать данные больше 20 и меньше 2 символов";
                }
                ?>
            </p>
        </fieldset>
        <?php
    }
} else {
    echo "Доступно только администратору сайта!";
}
?>
</body>
</html>