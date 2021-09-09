<?php
const KEY = true;
include('../config.php');
include('../bd/bd.php');
include('../scripts/func/main.php');

session_start();

if (isset($_REQUEST['back'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/profile/profile.php?id=' . $_SESSION['id'] . '');
    exit;
}

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ban</title>
    <style>
        td {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
if (isAdmin()) {
    ?>
    <fieldset style="width:200px;">
        <legend>Бан пользователя</legend>
        <form action="" method='POST'>
            <p>Укажите период времи бана.</p>
            <table style="width: 200px;">
                <tr>
                    <td>
                        <label for="hour" style="display: table-cell;">В часах</label>
                    </td>
                    <td>
                        <select name="hour" id="hour" style="display: table-cell;">
                            <option value="1">1 час</option>
                            <option value="2">2 часа</option>
                            <option value="3">3 часа</option>
                            <option value="4">4 часа</option>
                            <option value="5">5 часов</option>
                            <option value="6">6 часов</option>
                            <option value="7">7 часов</option>
                            <option value="8">8 часов</option>
                            <option value="9">9 часов</option>
                            <option value="10">10 часов</option>
                            <option value="11">11 часов</option>
                            <option value="12">12 часов</option>
                            <option value="13">13 часов</option>
                            <option value="14">14 часов</option>
                            <option value="15">15 часов</option>
                            <option value="16">16 часов</option>
                            <option value="17">17 часов</option>
                            <option value="18">18 часов</option>
                            <option value="19">19 часов</option>
                            <option value="20">20 часов</option>
                            <option value="21">21 час</option>
                            <option value="22">22 часа</option>
                            <option value="23">23 часа</option>
                            <option value="24">24 часа</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="days" style="display: table-cell;">В днях</label>
                    </td>
                    <td>
                        <select name="days" id="days" style="display: table-cell;">
                            <option value="0">0 дней</option>
                            <option value="1">1 день</option>
                            <option value="2">2 дня</option>
                            <option value="3">3 дня</option>
                            <option value="4">4 дня</option>
                            <option value="5">5 дней</option>
                            <option value="6">6 дней</option>
                            <option value="7">7 дней</option>
                            <option value="8">8 дней</option>
                            <option value="9">9 дней</option>
                            <option value="10">10 дней</option>
                            <option value="11">11 дней</option>
                            <option value="12">12 дней</option>
                            <option value="13">13 дней</option>
                            <option value="14">14 дней</option>
                            <option value="15">15 дней</option>
                            <option value="16">16 дней</option>
                            <option value="17">17 дней</option>
                            <option value="18">18 дней</option>
                            <option value="19">19 дней</option>
                            <option value="20">20 дней</option>
                            <option value="21">21 дней</option>
                            <option value="22">22 дня</option>
                            <option value="23">23 дня</option>
                            <option value="24">24 дня</option>
                            <option value="25">25 дней</option>
                            <option value="26">26 дней</option>
                            <option value="27">27 дней</option>
                            <option value="28">28 дней</option>
                            <option value="29">29 дней</option>
                            <option value="30">30 дней</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="weeks">В неделях</label>
                    </td>
                    <td>
                        <select name="weeks" id="weeks">
                            <option value="0">0 недель</option>
                            <option value="1">1 неделю</option>
                            <option value="2">2 недели</option>
                            <option value="3">3 недели</option>
                            <option value="4">4 недели</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="ban" value="Забанить">
            <input type="submit" name="back" value="Назад">
        </form>
    </fieldset>
    <?php
} else {
    echo "Страница доступна только администратору!";
}

if (isset($_REQUEST['hour']) && isset($_REQUEST['days']) && isset($_REQUEST['weeks']) && isset($_REQUEST['ban']) && isset($_REQUEST['user_id'])) {

    $id = $_REQUEST['user_id'];

    $ban = date('Y-m-d H:i:s', strtotime("+ " . $_REQUEST['weeks'] . " week " . $_REQUEST['days'] . " days " . $_REQUEST['hour'] . " hours"));

    mysqli_query($link, "UPDATE users SET banned = '$ban' WHERE id='$id'") || die(mysqli_error($link));
} else if (!($_REQUEST['user_id'])) {
    echo "Неверный id пользователя!";
}
?>
</body>
</html>