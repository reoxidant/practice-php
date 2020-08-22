<?php
/*	$arr = range(a,z); 
	shuffle($arr); 
	$str = ''; 
	for($i = 0; $i < 6; $i++){
		$str.=$arr[$i];
	}
	echo $str;*/

	$arr = range(a,z);
	shuffle($arr);
	$str = $arr[0].$arr[1].$arr[2].$arr[3].$arr[4].$arr[5];
	echo $str;
?>