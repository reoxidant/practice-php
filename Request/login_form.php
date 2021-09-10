<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>page</title>
</head>
<?php
include('function_form.php');
?>
<body>
<form action="" method="GET">
    <p>Логин: <br>
        <?php
        jjj($_REQUEST['login']);
        ?>
    </p>
    <p>Пароль: <br>
        <label>
            <input type="password" name="password"
                   value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ''; ?>">
        </label>
    </p>
    <input type="submit">
</form>
</body>

</html>