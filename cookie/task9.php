<?php
/*9. Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня
рождения. Если сегодня день рождения пользователя - поздравьте его!*/
if (isset($_GET['birthday']) || isset($_COOKIE['birthday'])) {
    setcookie('birthday', '', time() + 3600, '/');
    $_COOKIE['birthday'] = $_GET['birthday'];
    $year = date('Y');
    $dr = date('z', strtotime($_COOKIE['birthday'])) - date('z');
    if ($dr > 0) {
        ?>
        <h1>До дня рождения осталось <?php echo $dr; ?> дней.</h1>
        <?php
    }

    if (!$dr) {
        ?>
        <h1>C Днем Рождения Пользователь!</h1>
        <?php

    }
    if ($dr < 0) {
        $year = date('Y', strtotime('next year'));
        $days = date('z', strtotime('31-12-' . $year . ''));
        $dr = $days - date('z', strtotime($_COOKIE['birthday']));
        ?>
        <h1>До дня рождения осталось <?php echo $dr; ?> дней.</h1>
        <?php
    }
}
?>
<?php if (!isset($_COOKIE['birthday'])) { ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Date birthday</title>
    </head>
    <body>
    <form action="" method="GET">
        <p>Выберите дату своего дня рождения:<br>
            <label>
                <input type="date" name='birthday'>
            </label>
        </p>
        <input type="submit">
    </form>
    </body>
    </html>

<?php } ?>
