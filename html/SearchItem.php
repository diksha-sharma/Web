<?php

	session_start();

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/SearchItem.css" />
	</head>

	<body>

		<?php
			if($_COOKIE["Email"] == "sjdesignerwear@gmail.com")
			{
				
				echo("Welcome Administrator: ".$_COOKIE["Username"]);
				echo("<p style='float: right; margin-right: 20px'><a href='../html/SignOut.php'>Sign Out</a></p>");
				echo("<div id= 'menu'>");
				echo("<p>");
				echo("<a href='../html/SJC.php' id = 'menulinks11'>Home</a>");
				echo("<a href='../html/Dresses.php' id='menulinks21'>Dresses</a>");
				echo("<a href='../html/Accessories.php' id='menulinks51'>Accessories</a>");
				echo("<a href='../html/Admin.php' id='menulinks41'>Admin Page</a>");
				echo("<a href='../html/AddToBag.php' id='menulinks31'>My Shopping Bag<img  class = 'toplinks14' src='../img/cart.jpg' title='Shopping Bag'/></a>");
				echo("</p>");
				echo("</div>");
				
			}
			else
			{
				
				echo "Welcome ".$_COOKIE["Username"];
				echo("<p style='float: right; margin-right: 20px'><a href='../html/SignOut.php'>Sign Out</a></p>");
				echo("<div id= 'menu'>");
				echo("<p>");
				echo("<a href='../html/SJC.php' id = 'menulinks1'>Home</a>");
				echo("<a href='../html/Dresses.php' id='menulinks2'>Dresses</a>");
				echo("<a href='../html/Accessories.php' id='menulinks3'>Accessories</a>");
				echo("<a href='../html/AddToBag.php' id='menulinks4'>My Shopping Bag<img  class = 'toplinks14' src='../img/cart.jpg' title='Shopping Bag'/></a>");
				echo("</p>");
				echo("</div>");
				
			}
		?>
		<hr>
		<hr>
		<div id="search">
		
			<form id='searchform' action='../html/SearchItemForm.php' method='post'>
			Enter name of item to search:
			<input type=text name='itemname'>

			<input type='submit' value='Search' id='Search'>
			</form>
		
		</div>
		<hr>

		<hr>
	</body>
		
</html>