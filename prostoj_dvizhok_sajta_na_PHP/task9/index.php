<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.04.2019
 * Time: 11:03
 */

/*Задача 9: Исправим проблему с тайтлом

Реализуйте описанное в теоретической части.*/

function insertAndReplace($reg, $content, $tag){
    foreach ($reg as $key=>$item){
        if(preg_match($item, $content,$match)){
           $res[$tag[$key]] = $match[1];
           $content = trim(preg_replace($item,'',$content));
        }else{
            $res[$tag[$key]] = '';
        }
    }
    return array($res, $content);
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
    $path = "pages/$page.php";
    if(file_exists($path)){
        $content = file_get_contents("$path");
        $reg = ['#\-\-title:(.*?)\-\-#','#\-\-desc:(.*?)\-\-#'];
        $tag = ['title', 'desc'];
        $result = insertAndReplace($reg,$content,$tag);
        $content = $result[1];
    }else{
        $content = "File don't exist!";
    }
}else{
    $title = 'index';
    $content = 'index';
}
?>
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