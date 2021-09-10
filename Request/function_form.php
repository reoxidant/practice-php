<?php
function jjj($req)
{
    if ((isset($req) && empty($req)) || checkLenght($req, 4, 12) === false) {
        echo "<span style='color:blue;'>Ошибка</span>";
        ?>
        <label>
            <input type="text" class="red" name="login" value="<?php echo $req; ?>">
        </label>
        <?php
    } else {
        ?>
        <label>
            <input type="text" class="" name="login" value="<?php echo $req; ?>">
        </label>
        <?php
    }
}

function checkLenght($value, $min, $max)
{
    if (!$value) {
        $value = "";
    }
    return strlen($value) > $min && strlen($value) < $max;
}

?>
