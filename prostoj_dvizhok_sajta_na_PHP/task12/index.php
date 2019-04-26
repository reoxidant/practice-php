<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.04.2019
 * Time: 11:03
 */

/*Задача 11: Добавляем страницу 404

Реализуйте описанное в теоретической части.*/

//Подключение базы данных
include('mysqli_connect.php');

/*function insertAndReplace($reg, $content, $tag){
    foreach ($reg as $key=>$item){
        if(preg_match($item, $content,$match)){
           $res[$tag[$key]] = $match[1];
           $content = trim(preg_replace($item,'',$content));
        }else{
            $res[$tag[$key]] = '';
        }
    }
    return array($res, $content);
}*/

if(isset($_GET['page'])){
    $page = $_GET['page'];

    $query = "SELECT * FROM pages WHERE url = '$page'";
    $res = mysqli_query($link, $query)or die(mysqli_error($link));
    $cur_page = mysqli_fetch_assoc($res);
    if(!$cur_page){
        header("HTTP/1.0 404 Not Found");
        $query = "SELECT * FROM pages WHERE url = '404'";
        $res = mysqli_query($link, $query)or die(mysqli_error($link));
        $cur_page = mysqli_fetch_assoc($res);
    }
    $title = $cur_page['title'];
    $content = $cur_page['text'];
}else{
    $title = 'index';
    $content = 'index';
}
include('layout.php');
