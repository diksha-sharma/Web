<?php

	session_start();

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="../css/Admin.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	</head>
	
	<body>
		
		<div id="PageHeading">
			Shraddha Jain Creations<br/>
		</div>
		
		<div id="Page">
			Welcome Administrator<br/>
		</div>		
		<form id="AdminForm" method='get' action="../html/AdminActions.php">
		<br>
		<br>
		<br>
		<div id="adminaction">
			Select Action:
				<select  name="adminaction"> 
					<option value="Edit">Edit an Existing Item</option>
					<option value="Add">Add a New Item</option>
					<option value="Delete">Delete an Existing Item</option>
				</select>
			
			<input type="submit" id="Go" value="Go">
		</div>
		</form>
		
		<div>
		<br>
		<br>
		<a id="home" href="../html/SJC.php">Go Back to Website...</a>
		</div>
	</body>
	
</html>