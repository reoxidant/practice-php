<?php
const KEY = true;

include('../config.php');
include('../bd/bd.php');
include('../user.php');

session_start();

$user_id = $_SESSION['id'];

?>
<?php
$page_user = isset($_GET['page_user']) ? (int)$_GET['page_user'] : 1;
$perPage_user = isset($_GET['per-page_user']) && $_GET['per-page_user'] <= 50 ? (int)$_GET['per-page_user'] : 5;
$start = ($page_user > 1) ? ($page_user * $perPage_user) - $perPage_user : 0;

$query = "SELECT DISTINCT SQL_CALC_FOUND_ROWS * FROM msg WHERE recipient_id='$user_id' and readed_msg='0' GROUP BY sender_id LIMIT {$start}, {$perPage_user}";
$sql = mysqli_query($link, $query) || die (mysqli_error($link));
//get Pages
$sql2 = mysqli_query($link, "SELECT FOUND_ROWS() as total");
$total = mysqli_fetch_assoc($sql2)['total'];
$pages = ceil($total / $perPage_user);

include('check_out.php');
?>
<?php
if (mysqli_num_rows($sql) >= 1) {
    ?>
    <fieldset>
        <legend>Список сообщений</legend>
        <?php
        while ($row = mysqli_fetch_assoc($sql)) {
            $sender_id = $row['sender_id'];
            $users_res = mysqli_query($link, "SELECT * FROM users WHERE id='$sender_id'") || die (mysqli_error($link));
            $users = mysqli_fetch_assoc($users_res);
            ?>
            <p>Новое сообщение от пользователя, <?php echo $users['login']; ?></p>
            <form action="" method="POST">
                <p>
                    <input type="checkbox" name='check' value="1" id='1'><label for="1">Отметить прочитанным</label>
                </p>
                <p>
                    <input type="checkbox" name='check' value="2" id="2"><label for="2">Удалить диалог с
                        пользователем</label>
                </p>
                <input type="submit" value="Отправить">
                <p>
                    <a href="message.php?id=<?php echo isset($sender_id) ? $sender_id : ''; ?>">Прочитать</a>
                </p>
            </form>
            <?php
            include('check_out.php');
        }
        ?>
        <div>
            <?php for ($x = 1; $x <= $pages; $x++): ?>
                <a href="?id=<?php echo $id; ?>&page_user=<?php echo $x; ?>&per-page_user=<?php echo $perPage_user; ?>"<?php if ($page_user === $x) {
                    echo ' class="select"';
                } ?>><?php echo $x; ?></a>
            <?php endfor; ?>
        </div>
    </fieldset>
    <?php
}

?>