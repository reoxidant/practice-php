<?php if(isset($_GET['submit'])){
	$element = $_GET['num_design'];
	setcookie('design', $element, time()+3600*24*365);
 } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>This is title.</title>
	<style>
		body{
			width: 100%;
			height: 100%;
			margin: 0px;
			padding: 0px;
		}
		.design{
			position: absolute;
			top: 45%;
			left: 45%;
			width: 15%;
			height:15%;
		}
		.choosedDesign{
			display: block;

		}
		h1{
			display: block;
			text-align: center;
			margin: 10;
		}
		.teaser{
			display: block;
			height: 70px;
			text-align: center;
		}
		.elements{
			display: table;
			border-collapse: collapse;
			margin: 0 auto;
			width: 1200px;
		}
		.container{
			text-align: justify;
		}
		.footer{
			text-align: right;
			margin-right: 310px;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_COOKIE['design'])){
			switch($_COOKIE['design']){
				case 1:
					
	?>				
	<div class="choosedDesign">
		<header><h1>Hello World!</h1></header>
		<div class="teaser"><h2>
			<b>TEASER</b>
		</h2></div>
		<div class="elements">
			<div class="container" style="display: table-cell; padding: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur adipisci quis ipsa, asperiores obcaecati quae! Recusandae ipsum, excepturi explicabo commodi, deserunt quos non illo ad. Dignissimos repudiandae ducimus quos, officia. </div>
			<div class="container" style="display: table-cell; padding: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt reprehenderit repellat, earum delectus magnam ratione tempora quam sed cum dolores. Saepe, neque ad sunt quibusdam tempore, natus nam perferendis ut!</div>
			<div class="container" style="display: table-cell; padding: 15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum doloribus perspiciatis, vel minus ducimus, rerum, incidunt dolores libero, expedita dicta accusamus ipsam sed laboriosam. Id deserunt, aliquid beatae facilis perspiciatis?</div>
		</div>
		<div class="footer">создано soulmomental(c) 2018.</div>
	</div>
	<?php
		break;
	?>
	<?php 
		case 2:
	?>
	  	<div class="choosedDesign">
			<header><h1>Hello World!</h1></header>
			<div class="teaser"><h2>
				<b>TEASER</b>
			</h2></div>
			<div class="elements">
				<div class="container" style="display: table-row; padding: 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur adipisci quis ipsa, asperiores obcaecati quae! Recusandae ipsum, excepturi explicabo commodi, deserunt quos non illo ad. Dignissimos repudiandae ducimus quos, officia. </div>
				<div class="container" style="display: table-row; padding: 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt reprehenderit repellat, earum delectus magnam ratione tempora quam sed cum dolores. Saepe, neque ad sunt quibusdam tempore, natus nam perferendis ut!</div>
				<div class="container" style="display: table-row; padding: 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum doloribus perspiciatis, vel minus ducimus, rerum, incidunt dolores libero, expedita dicta accusamus ipsam sed laboriosam. Id deserunt, aliquid beatae facilis perspiciatis?</div>
			</div>
			<div class="footer">создано soulmomental(c) 2018.</div>
		</div>
	<?php
		  	break;  	
	?>
	<?php 
		case 3:
	?>
		<div class="choosedDesign">
			<header><h1>Hello World!</h1></header>
			<div class="teaser"><h2>
				<b>TEASER</b>
			</h2></div>
			<div class="elements" style="display: table;">
				<div style="display: table-row;"">
					<div class="container" style="display: table-cell; padding: 50px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur adipisci quis ipsa, asperiores obcaecati quae! Recusandae ipsum, excepturi explicabo commodi, deserunt quos non illo ad. Dignissimos repudiandae ducimus quos, officia. </div>
					<div class="container" style="display: table-cell; padding: 50px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt reprehenderit repellat, earum delectus magnam ratione tempora quam sed cum dolores. Saepe, neque ad sunt quibusdam tempore, natus nam perferendis ut!</div>
				</div>
				<div class="container" style="display: table-cell; padding: 50px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum doloribus perspiciatis, vel minus ducimus, rerum, incidunt dolores libero, expedita dicta accusamus ipsam sed laboriosam. Id deserunt, aliquid beatae facilis perspiciatis?</div>
			</div>
			<div class="footer">создано soulmomental(c) 2018.</div>
		</div>
	<?php
		  	break;
		  	}  	
	?>
	<?php
		}
	?>
	<?php 
		if(!isset($_COOKIE['design']) and !isset($_GET['submit'])){
	?>
	<div class="design">
		<form action="" method="GET">
			<p>
				<select name="num_design" id="">
					<option value="1">Первый дизайн</option>
					<option value="2">Второй дизайн</option>
					<option value="3">Третий дизайн</option>
				</select>
			</p>
				<input type="submit" name="submit">
		</form>
	</div>
	<?php 
	}
 	?>
</body>
</html>