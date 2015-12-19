<?php

	session_start();
	$category = "Accessories";

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/Accessories.css" />
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
				echo("<a href='../html/AddToBag.php' id='menulinks3'>My Shopping Bag<img  class = 'toplinks14' src='../img/cart.jpg' title='Shopping Bag'/></a>");
				echo("</p>");
				echo("</div>");
				
			}
			
		?>
		<hr>
		<br>
		<form id="items" method="post" action="Accessories.php">
			Select Type of Accessories:
				<select id="accessories_type_name" name="accessories_type_name"> 
					<option value="All">All</option>
					<option value="Rings">Rings</option>
					<option value="Earrings">Earrings</option>
					<option value="Necklaces">Necklaces</option>
					<option value="Handbags">Handbags</option>
				</select>
				<?php
					
					$accessories_type_name = isset($_POST["accessories_type_name"]) ? $_POST["accessories_type_name"] : "All";
					setcookie("accessories_type_name", $accessories_type_name, time() + (86400 * 30), "/");
				
				?>
				<input type="submit" value="Go" name="submit">
			<hr>
			<div id="accessories">
				<?php
	
					$conn = new mysqli("localhost", "root", "", "sjc");
					
					
					if($conn -> connect_error)
					{
						
						echo "Database connection could not be established";
						die();
						
					}
					else
					{
						$sql_query;
						if ($accessories_type_name == "All")
						{
							
							$sql_query = "select i.accessories_item_id, i.accessories_item_name, i.accessories_item_price, i.accessories_item_pic_loc from accessories_item i where accessories_item_category_id = (SELECT category_id from category where category_name like 'Accessories')";

						}
						else
						{
							
							$sql_query = "select i.accessories_item_id, i.accessories_item_name, i.accessories_item_price, i.accessories_item_pic_loc, s.accessories_type_name, isz.item_in_stock_qty from accessories_item i, accessories_type s, accessories_item_type isz where i.accessories_item_id = isz.accessories_item_id and s.accessories_type_id = isz.accessories_type_id and isz.item_in_stock_qty > 0 and accessories_item_category_id = (SELECT category_id from category where category_name like 'Accessories') and isz.accessories_type_id = (select accessories_type_id from accessories_type where accessories_type_name like '". $accessories_type_name ."') ";
							
						}				
						
						$item = $conn->query($sql_query);
			
						if($item -> num_rows > 0)
						{
						
							while($row = $item->fetch_assoc()) 
							{
								echo("<div class =\"details\">");
								echo("<form action='../html/UpdateBag.php' method='get'> ");
								echo("<br>");								
								echo("<img src = '".$row["accessories_item_pic_loc"]."' class=\"items\"/>");
								echo("<br>");
								echo("<br>");
								echo("Item Name: ");
								echo($row["accessories_item_name"]);
								echo("<br>");
								echo("Item Price: $");
								echo($row["accessories_item_price"].".00");	
								echo("<input id ='form_data' type='text' name = 'item_type' value='Accessories'>");
								echo("<input id ='form_data' type='text' name = 'accessories_item_name' value='".$row["accessories_item_name"]."'>");
								echo("<input id ='form_data' type='text' name = 'accessories_item_price' value='".$row["accessories_item_price"]."'>");
								echo("<input id ='form_data' type='text' name = 'accessories_item_pic_loc' value='".$row["accessories_item_pic_loc"]."'>");				
								echo("<input id ='addtobagbutton' type='submit' value='Add To Bag' name='submit'>");
								echo("</form>");
								echo("</div>");
							}
						
						}
										
					}

					$conn -> close();
					echo("<br>");
					echo("<br>");
					echo("<br>");
				?>
					
			</div>
			
		</form>
		<br>
		<br>
		<br>
	</body>
		
</html>