<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.02.2019
 * Time: 23:49
 *
 *
 */
//Практика по работе с БД в PHP часть 3

$link = mysqli_connect('localhost','root','','practice') or die("Could not connect". mysqli_error());

//Удаление из бд
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = "DELETE FROM workers WHERE `id`='{$del}'";
    mysqli_query($link,$query);
}
//Добавление в бд
if(!empty($_POST)){
    print_r(1);
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $query = "INSERT INTO workers SET name='{$name}', age='{$age}', salary='{$salary}'";
    mysqli_query($link, $query) or die('Could not insert your query into database'.mysqli_error());
}
$query = 'SELECT * FROM workers where id>0';
$res = mysqli_query($link, $query) or die('Could not make query to database'.mysqli_error());
for($data = []; $row = mysqli_fetch_assoc($res);$data[] = $row);
$result .="<table>";
$flag = false;
foreach ($data as $elem){
    if($flag == false){
        $result .= "<tr>";
        foreach ($elem as $key=>$value){
            $result .= "<th>".$key."</th>";
        }
        $result .= "</tr>";
    }
    $flag = true;
    $result .= '<tr>';
    foreach ($elem as $key=>$value){
        $result .= "<td>".$value."</td>";
    }
    $result .= "<td><a href='?del={$elem['id']}'>Delete</a></td>";
    $result .= '</tr>';
}
$result .="</table>";
echo $result;
?>

<form action="#" method="post">
    <p>Name:
        <input type="text" name="name" style="margin-left: 2px;">
    </p>
    <p>Salary:
        <input type="text" name="salary">
    </p>
    <p>Age:&nbsp;&nbsp;&nbsp;
        <input type="text" name="age" style="margin-left: 3px;">
    </p>
    <p><input type="submit" value="Add worker"></p>
</form>


