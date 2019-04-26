<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$result[0]['title']?></title>
</head>
<body>
<?=$result[0]['desc']?>
<header>
    <?include('elems/header.php')?>
</header>
<main>
    <?=$content; ?>
</main>
<footer>
    <?include('elems/footer.php')?>
</footer>
</body>
</html>