<?php 
	function jjj($req)
	{
		if(isset($req) and empty($req) || checkLenght($req, 4, 12) == false){
	        echo "<span style='color:blue;'>Ошибка</span>";
?>
		<input type="text" class="red" name="login" value="<?php echo isset($req)? $req:''; ?>">
<?php 
	}else{
?>
		<input type="text" class="" name="login" value="<?php echo isset($req)? $req:'';?>">
<?php		
	}
}

function checkLenght($value = "", $min, $max)
	{
		if(strlen($value) > $min and strlen($value) < $max){
			return true;
		} else {
			return false;
		}
	}
?>
