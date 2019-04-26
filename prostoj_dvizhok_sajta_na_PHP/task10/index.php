<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.04.2019
 * Time: 11:03
 */

/*Задача 10: Вынесем макет сайта в отдельный файл

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
include('layout.php');
