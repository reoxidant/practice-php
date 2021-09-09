<?php
const KEY = true;
include('../config.php');
include('../bd/bd.php');
include('../scripts/func/main.php');
session_start();

$id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

if (isset($_REQUEST['back'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/admin_page/admin.php');
    exit;
}
?>
<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Разбан</title>
</head>
<body>
<?php
if (isAdmin()) {
    if (isset($_REQUEST['next'])) {
        mysqli_query($link, "UPDATE users SET banned = NULL WHERE id='$id'") || die (mysqli_error($link));
        header('Location:' . HOST . 'tasksAuthAndReg/admin_page/admin.php');
    }
    ?>
    <fieldset>
        <legend>
            Разбан
        </legend>
        <form action="" method="post">
            <p>
                Вы действительно желаете разбанить пользователя, <?php echo $user['login']; ?>?
            </p>
            <input type="submit" name="next" value="да">
            <input type="submit" name="back" value="нет">
        </form>
    </fieldset>
    <?php
} else {
    echo "Страница доступна только администратору!";
}
ob_get_flush();
?>
</body>
</html>