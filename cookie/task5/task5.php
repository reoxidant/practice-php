<?php session_start(); ?>
<!-- Сделайте на сайте 5 картинок с товарами. Реализуйте корзину. Под каждой картинкой должна быть ссылка
'Положить в корзину'. По нажатию на эту ссылку этот товар должен занестись в корзину (сессия), также должна увеличиться
 общая сумма, которую должен заплатить пользователь (сумма также должна быть указана под картинками с товарами). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internet Shop</title>
    <style>
        img {
            width: 200px;
            height: 250px;
        }

        body {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        div {
            display: table-cell;
        }

        .main {
            display: table;
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }

        .main a {
            text-decoration: none;
            color: black;
        }

        .row {
            display: table-row;
        }

        .btn {
            display: inline-block;
            width: 60%;
            background-color: #C0C0C0;
            padding: 10px 18px;
            border-radius: 4px;
        }

        .basket {
            display: block;
            width: 100%;
            padding: 30px 25px;
            margin: 0 auto;
            text-align: right;
        }

        .basket div {
            display: block;
            padding: 10px 0;
            width: 250px;
            margin: 0 auto;
        }

        .basket img {
            height: 50px;
            width: auto;
            float: left;
        }
    </style>
</head>
<body>
<?php
$item = (isset($_GET['items'])) ? (int)$_GET['items'] : 0;
$count = (isset($_GET['price'])) ? (int)$_GET['price'] : 0;
$_SESSION['total'] += $count;
$_SESSION['item'] += $item;

$price = [4990, 13990, 26490, 44990, 85490];
?>
<div class="basket">
    <div>
        <a href=""><img src="cart.png" alt=""></a>
        <span>Товаров в корзине: <?php echo $_SESSION['item']; ?> шт.</span>
        <br>
        <span>На сумму: <?php echo $_SESSION['total'] ?> руб.</span>
        <br>
        <a href="#">Оформить заказ</a>
    </div>
</div>
<div class="main">
    <div class="row">
        <div>
            <h3>IPhone 4s 16Gb Black</h3>
            <img src="4s.jpg" alt="4s">
            <p><b>Цена: <?php echo $price[0]; ?> р.</b></p>
            <p>
                <a class="btn"
                   href="?price=<?php echo countItem($price[0], $count); ?>&items= <?php echo $_SESSION['item'] + 1; ?>">Положить
                    в корзину</a>
            </p>
        </div>
        <div>
            <h3>IPhone 5s 16Gb Space Gray</h3>
            <img src="5s.png" alt="5s">
            <p><b>Цена: <?php echo $price[1]; ?> р.</b></p>
            <p>
                <a class="btn"
                   href="?price=<?php echo countItem($price[1], $count); ?>&items= <?php echo $_SESSION['item'] + 1; ?>">Положить
                    в корзину</a>
            </p>
        </div>
        <div>
            <h3>IPhone 6s 16Gb Space Gray</h3>
            <img src="6.png" alt="6">
            <p><b>Цена: <?php echo $price[2]; ?> р.</b></p>
            <p>
                <a class="btn"
                   href="?price=<?php echo countItem($price[2], $count); ?>&items= <?php echo $_SESSION['item'] + 1; ?>">Положить
                    в корзину</a>
            </p>
        </div>
    </div>
    <div>
        <h3>IPhone 7 "Черный оникс" 128Gb</h3>
        <img src="7.jpg" alt="7">
        <p><b>Цена: <?php echo $price[3]; ?> р.</b></p>
        <p>
            <a class="btn"
               href="?price=<?php echo countItem($price[3], $count); ?>&items= <?php echo $_SESSION['item'] + 1; ?>">Положить
                в корзину</a>
        </p>
    </div>
    <div>
        <h3>IPhone X 256Gb silver</h3>
        <img src="x.png" alt="x">
        <p><b>Цена: <?php echo $price[4]; ?> р.</b></p>
        <p>
            <a class="btn"
               href="?price=<?php echo countItem($price[4], $count); ?>&items= <?php echo $_SESSION['item'] + 1; ?>">Положить
                в корзину</a>
        </p>
    </div>
</div>
<?php
function countItem($price, $count)
{
    $count += $price;

    return $count;
}

?>
</body>
</html>