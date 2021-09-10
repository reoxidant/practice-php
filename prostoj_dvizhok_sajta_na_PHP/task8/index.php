<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.04.2019
 * Time: 11:03
 */

/*������ 8: ������� ������ �����

���������� ��������� � ������������� �����.*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site</title>
</head>
<body>
    <header>
        <?php include('elems/header.php')?>
    </header>
    <main>
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                $path = "pages/$page.php";
                if(file_exists($path)){
                    include((string)$path);
                }else{
                    echo "File don't exist!";
                }
            }else{
               echo 'index';
            }
        ?>
    </main>
    <footer>
        <?php include('elems/footer.php')?>
    </footer>
</body>
</html>