<?php
//Практика по работе с БД в PHP часть 2
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "Unable to connect to DB: " . mysqli_error();
    exit;
}

if (!mysqli_select_db($conn, "practice")) {
    echo "Unable to select practice: " . mysqli_error();
    exit;
}

if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = "DELETE FROM workers WHERE id=$del";
    mysqli_query($conn,$query) or die(mysqli_error($conn));
}

$sql = "SELECT * FROM workers";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}


echo '<table>';
$flag = false;
while ($row = mysqli_fetch_assoc($result)) {
    if($flag == false){
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo '<th>' . $key . '</th>';
        }
        echo '</tr>';
        $flag = true;
    }
    echo '<tr>'.
         '<td>'.$row['id'].'</td>'.
         '<td>'.$row['name'].'</td>'.
         '<td>'.$row['age'].'</td>'.
         '<td>'.$row['salary'].'</td>'.
         '<td><a href="?del='.$row['id'].'">удалить</a></td>'.
         '</tr>';
}
echo '</table>';
mysqli_free_result($result);

