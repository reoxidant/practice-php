<?php
/**
 *
 */
const KEY = true;

include('../config.php');
include('../bd/bd.php');
include('../user.php');

session_start();

$login = $user['login'];
$recipient_id = $_REQUEST['id'];
$sender_id = $_SESSION['id'];

if (isset($_REQUEST['message']) && !empty($_REQUEST['message'])) {

    $msg = $_REQUEST['message'];

    mysqli_query($link, "INSERT INTO msg SET recipient_id = '$recipient_id', sender_id='$sender_id', message='$msg'") ||
    die (mysqli_error($link));
}

if (isset($_REQUEST['back'])) {
    header('Location: profile.php?id=' . $recipient_id . '');
    exit;
}

if (isset($_REQUEST['reset'])) {
    header('Location: message.php?id=' . $recipient_id . '');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message</title>
    <style>
        .select {
            font-size: 20px;
            font-weight: bolder;
            color: blue;
            text-decoration: none;
        }

        .selected {
            background: #e9eaed;
        }
    </style>
</head>
<body>
<?php
if (isset($_REQUEST['id'], $_SESSION['id']) && !empty($user)) {
    ?>
    <table>
        <?php
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $query = "SELECT SQL_CALC_FOUND_ROWS message, sender_id, recipient_id FROM msg WHERE message != '' and sender_id='$sender_id' and recipient_id='$recipient_id' or  recipient_id='$sender_id' and sender_id='$recipient_id' ORDER BY id LIMIT {$start}, {$perPage}";
        $sql = mysqli_query($link, $query) || die (mysqli_error($link));

        //get Pages
        $sql2 = mysqli_query($link, "SELECT FOUND_ROWS() as total");
        $total = mysqli_fetch_assoc($sql2)['total'];
        $pages = ceil($total / $perPage);

        while ($row = mysqli_fetch_assoc($sql)) {
            ?>
            <tr style="height: 40px;">
                <td class="<?php echo ($row['sender_id'] === $sender_id) ? 'selected' : ''; ?>"><?php echo $row['message']; ?>
                    <?php if ($_SESSION['id'] === $row['recipient_id']) {
                        mysqli_query($link, "UPDATE msg SET readed_msg = '1' WHERE recipient_id='$sender_id'") ||
                        die(mysqli_error($link));
                    } ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div>
        <?php for ($x = 1; $x <= $pages; $x++): ?>
            <a href="?id=<?php echo $id; ?>&page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"
                <?php if ($page === $x) {
                    echo ' class="select"';
                } ?>><?php echo $x; ?></a>
        <?php endfor; ?>
    </div>
    <form action="" method="post">
        <fieldset style=" width:350px;">
            <legend>Отправка сообщения пользователю по имени - <b><?php echo $login; ?></b></legend>
            <label>
                <textarea rows="10" cols="50" name="message"><?php echo $user_message; ?></textarea>
            </label>
            <input type="submit" name="reset" value="Обновить">
            <input type="submit" name="msg_button" value="Отправить сообщение">
            <input type="submit" name="back" value="Назад">
        </fieldset>
    </form>
    <?php
} else if (empty($user) || $_SESSION['auth'] = false) {
    echo "Пройдите авторизацию!";
}
?>
</body>
</html>