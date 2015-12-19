<?php

	session_start();

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="../css/AdminActions.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="../js/AdminAdd.js"></script>

	</head>
	
	<body>
		
		<div id="PageHeading">
			Shraddha Jain Creations<br/>
		</div>
		
		<div id="Page">
			Welcome Administrator<br/>
		</div>

<?php

	if($_GET["adminaction"] == "Edit")
	{
		
		echo("<form id='editform' action='../html/EditItem.php' method='post'>");
		echo("Enter name of item to edit: ");
		echo("<input type=text name='itemname'>");
		echo("Enter the size of item to edit: ");
		echo("<input type=text name='itemsize'>");
		echo("<input type='submit' value='Search' id='EditSearch'>");
		echo("</div>");

		
	}
	else if ($_GET["adminaction"] == "Add")
	{
		
		echo("<form id='addform' method='post' action='../html/AddItem.php'>");
		echo("<div>");
		echo("Select category for item: ");
		echo("<select id='category' name='category'>");
		echo("<option value='Accessories'>Accessories</option>");
		echo("<option value='Dresses'>Dresses</option>");
		echo("</select>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Enter item name: ");
		echo("<input type=text name='itemname'>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Enter item description: ");
		echo("<input type=text name='description'>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Enter item price: ");
		echo("<input type=text name='price'>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Enter item quantity: ");
		echo("<input type=text name='quantity'>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Select type for item: ");
		echo("<select id='type' name='type'>");
		echo("<option value='Rings'>Rings</option>");
		echo("<option value='Earrings'>Earrings</option>");
		echo("<option value='Necklaces'>Necklaces</option>");
		echo("<option value='Handbags'>Handbags</option>");
		echo("</select>");
		echo("</div>");
		echo("<br>");
		echo("<div>");
		echo("Enter item image name: ");
		echo("<input type=text name='picture'>");
		echo("</div>");
		echo("<br>");
		echo("<input type='submit' value='Add' id='Add'>");
		echo("</div>");
		echo("</form>");
		
	}
	else
	{
		echo("<form id='deleteform' action='../html/DeleteItem.php' method='post'>");
		echo("Enter name of item to delete: ");
		echo("<input type=text name='itemname'>");
		echo("<input type='submit' value='Search' id='DeleteSearch'>");
		echo("</div>");
		
	}
	
?>

		
	</body>
	
</html>