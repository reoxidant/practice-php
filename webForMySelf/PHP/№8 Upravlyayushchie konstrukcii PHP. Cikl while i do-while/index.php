<?   error_reporting(-1);?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

/*    echo "<table border=\"1\">\n";
    //Цикл - набор повторяющихся действий.
    /*$i = 10;
    while($i >= 1){
      echo $i;
      $i--; //$i = $i + 1; $i += 1
    }*/
    /*
     * Реализовали таблицу с колонки в ней
     */

    /*
        $i = 1;
        while($i <= 10){
             echo "\t"."<tr>"."\n";
             $n = 1;
             while($n <= 3){
                 echo "\t\t".'<td>Row '.$i.'| Col - '.$n.'</td>'."\n";
                 $n++;
             }
             $i++;
             echo "\t</tr>"."\n";
        }
        echo '</table>';
    */

    /*
     * делаю выпадающий список годой рождения
     */

         /*$year = 2019;
         $i = $year - 116;
         echo '<select>';
         while($i <= 2019){
             echo '<option value='.$year.'>'.$year.'</option>';
             $year--;
             $i++;
         }
         echo '</select>';*/

         /*$i = 10;
         while($i <= 10){
             echo $i++.'<br>';
         }*/

         /*$i = 11;
         do{
            echo $i++.'<br>';
         }while($i <= 10);*/

         // ДЗ сделать таблицу умножения как на обложке школьной тетради.

        $i = 2;
        /*echo "
        <table style=\"float: left;margin-right: 50px;\">
            <tr>
                <td id='v1'>2</td>
                <td id='times'>x</td>
                <td id='v2'>1</td>
                <td id='eq'>=</td>
                <td id='res'>2</td>
            </tr>
        </table>";*/
        echo "<div id='wrapper' style=\"width:600px; margin:0 auto;\">";
        echo "<h2 style=\"text-align: center\">Таблица умножения</h2>";
        while($i <= 9){
            echo "<table style=\"float:left;margin: 20px 20px 0 50px\">";
                $k = 1;
                while($k <= 9){
                    echo "<tr>";
                        echo "<td id='v1'>$i</td>";
                        echo "<td id='times'>x</td>";
                        echo "<td id='v2'>$k</td>";
                        echo "<td id='eq'>=</td>";
                        echo "<td id='res'>".$i*$k."</td>";
                    echo "</tr>";
                    $k++;
                }
            echo "</table>";
                $i++;
        }
        echo "</div>";
    ?>
</body>
</html>

