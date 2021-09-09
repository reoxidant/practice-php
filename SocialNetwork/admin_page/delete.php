<?php
const KEY = true;

include('../config.php');
include('../bd/bd.php');
include('../scripts/func/main.php');

$id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

session_start();

if (isset($_REQUEST['back'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/profile/profile.php?id=' . $_SESSION['id'] . '');
    exit;
}

if (isAdmin()){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Удаление пользователя</title>
</head>
<body>
<fieldset>
    <legend>Удаление пользователя</legend>
    <form action="" method="post">
        <p>
            Удалить пользователя <?= $user['login']; ?> из бд ?
        </p>
        <input type="submit" name="delete" value="удалить">
        <input type="submit" name="back" value="назад">
    </form>
</fieldset>
<?php
if (isset($_REQUEST['delete'], $_REQUEST['id'])) {
    $query = 'DELETE FROM users WHERE id="' . $_REQUEST['id'] . '"';
    mysqli_query($link, $query) || die (mysqli_error($link));
}

} else {
    echo "Страница доступна только администратору!";
}

?>
</body>
</html>