<?php

error_reporting(-1);

$var = 3;

/*if($var == 1){
    echo "variable = 1";
}elseif($var == 2){
    echo "variable = 2";
}elseif($var == 3){
    echo "variable = 3";
}else{
    echo "Something else...";
}*/

switch($var){
    case 1:
        echo "variable = 1";
        break;
    case 2:
        echo "variable = 2";
        break;
    case 3:
        echo "variable = 3";
        break;
    default:
        echo "Something else...";
}
//Если не поставить break, то все кейсы отработают, по-очередно, как только найдется первое вхождение.

$bool = true;
$str1 = 1;
$str2 = 2;
$str3 = 3;

//=== - строгое сравнение по значению и по типу
//bool == 1 - выведится

/*if($bool === true){
    echo '<table class=\"table\" border=\"1\">
        <tr>
            <td>'.$str1.'</td>
            <td>'.$str2.'</td>
            <td>'.$str3.'</td>
        </tr>
    </table>';
}
*/

$names = [
    'Ivan' => 'Ivanov',
    'Petr' => 'Petrov',
    'Sidor' => 'Sidorov'
];

/*foreach($names as $k => $v){
    echo "Key: $k Name: $v"."<br>";
}*/

/*foreach($names as $k => $v):
    echo "Key: $k Name: $v"."<br>";
endforeach;*/

foreach($names as $k => $v): ?>
    Name: <?php echo $k?>, Surname: <?php echo $v?> <br>
<?php endforeach; ?>


<?php if($bool): ?>
<table class=\"table\" border=\"1\">
    <tr>
        <td><?php echo $str1 ?></td>
        <td><?php echo $str2 ?></td>
        <td><?php echo $str3 ?></td>
    </tr>
</table>
<?php endif; ?>


<?php foreach($names as $k => $v): ?>
    Name: <?php echo $k?>, Surname: <?php echo $v?> <br>
<?php endforeach; ?>


