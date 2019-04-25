<style>
    a {
        text-decoration: none;
    }

    .active {
        text-decoration: underline;
    }
</style>

<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.04.2019
 * Time: 12:07
 */
//Практика по работе с БД в PHP часть Пагинация

$link = mysqli_connect('localhost', 'root', '', 'practice') or die(mysqli_error($link));

mysqli_query($link, "SET NAMES 'utf8'");

$page = $_GET['page'];
if (empty($page)) {
    $page = 1;
}
$notesOfPage = 2;

$from = ($page - 1) * $notesOfPage;

$query = "SELECT * FROM workers WHERE id > 0 LIMIT $from,$notesOfPage";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;

$query = "SELECT COUNT(*) as count FROM workers";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_fetch_assoc($result)['count'];
$pagesCount = ceil($count / $notesOfPage);
?>
<pre>
    <?
    print_r($data);
    ?>
</pre>
<? $prev = ($page != 1) ? $page - 1 : 1; ?>
<a href="?page=<?= $prev ?>"><<</a>
<? for ($i = 1; $i <= $pagesCount; $i++) {
    if ($page == $i) {
        ?><a class="active" href="?page=<?= $i ?>"><?= $i ?></a>
        <?
    } else {
        ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?
    }
} ?>
<? $after = ($page != $pagesCount) ? $page + 1 : $pagesCount; ?>
<a href="?page=<?= $after ?>">>></a>
