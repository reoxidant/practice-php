<?php
if (!empty($_GET['country'])) {
    setcookie('country', $_GET['country'], time() + 3600, '/');
}

if (!empty($_COOKIE['country'])) {
    $country = $_COOKIE['country'];
} else {
    $country = '';
}
?>

<h1>
    Ваша страна: <?php echo $country; ?>
</h1>