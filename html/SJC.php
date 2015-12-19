<?php

	session_start();
	
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/HomePage.css" />
	<script type="text/javascript" src="WEFiles/Client/WEMenu-v23.js?v=50491101600"></script>
	</head>

	<body>
		
		<div id="mainpage"> 
		<?php

			if($_COOKIE["Email"] == "sjdesignerwear@gmail.com")
			{
				
				echo "Welcome Administrator: ".$_COOKIE["Username"];
				echo("<p style='float: right; margin-right: 20px'><a href='../html/SignOut.php'>Sign Out</a></p>");
				
			}
			else
			{
				
				echo "Welcome ".$_COOKIE["Username"];
				echo("<p style='float: right; margin-right: 20px'><a href='../html/SignOut.php'>Sign Out</a></p>");
				
			}
			
		?>
			
			<div id="PageHeading">
				Shraddha Jain Creations<br/>
			</div>
			
			<div>
			
			<a href="../html/Dresses.php" class = "toplinks1">Browse Dresses</a>
			<a href="../html/Accessories.php" class = "toplinks2">Browse Accessories</a>
			<a href="../html/SearchItem.php" class = "toplinks4">Search an Item</a>
			<a href="../html/OrderHistory.php" class = "toplinks3">My Order History</a>
			</div>
		
		</div>

	</body>
	
</html>