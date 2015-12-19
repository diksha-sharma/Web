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
		<?php
					
			$itemname = $_POST["itemname"];
			$conn = new mysqli("localhost", "root", "", "sjc");

			if($conn -> connect_error)
			{

				echo "Issue contacting the server...";
				die();

			}
			else
			{

				$sql_query = "SELECT * FROM items WHERE item_name like '%".$itemname."%'";
				$result = $conn->query($sql_query);
							
				if ($result->num_rows > 0) 
				{
					
					while($row = $result->fetch_assoc()) 
					{
						
						echo("<div class =\"details\">");
						echo("<form action='../html/UpdateBag.php' method='get'> ");
						echo("<br>");								
						echo("<img src = '".$row["item_pic_loc"]."' class=\"itemsdresses\"/>");
						echo("<br>");
						echo("<br>");
						echo("Item Name: ");
						echo($row["item_name"]);
						echo("<br>");
						echo("Item Description: ");
						echo($row["item_description"]);
						echo("<br>");
						echo("Item Price: $");
						echo($row["item_price"].".00");
						echo("<br>");
						echo("Select Size: ");

						$sql_sub_query = "select size_name, item_in_stock_qty from sizes s, item_size isz where s.size_id = isz.size_id and isz.item_id = " .$row["item_id"]." order by s.size_id";
						//echo $sql_sub_query;
						$conn2 = new mysqli("localhost", "root", "", "sjc");

						if($conn2 -> connect_error)
						{
							
							echo "Database connection could not be established";
							die();
							
						}
						else
						{
							
							$sizedetail = $conn2->query($sql_sub_query);
				
							if($sizedetail -> num_rows > 0)
							{
							
								echo("<select id =\"sizedetails\" name =\"sizedetails\" class =\"sizedetails\">");
								
								while($subrow = $sizedetail->fetch_assoc()) 
								{
									
									if($subrow["item_in_stock_qty"] == "0")
									{
										
										echo("<option value = \"".$subrow["size_name"]."\" >".$subrow["size_name"]." - SOLD OUT</option>");
										
									}
									else
									{
										
										echo("<option value = \"".$subrow["size_name"]."\" >".$subrow["size_name"]."</option>");
									
									}
								
								}
								
								echo("</select>");
								
							}
						
						}
						
						echo("<input id ='form_data' type='text' name = 'item_type' value='Dresses'>");
						echo("<input id ='form_data' type='text' name = 'item_name' value='".$row["item_name"]."'>");
						echo("<input id ='form_data' type='text' name = 'item_price' value='".$row["item_price"]."'>");
						echo("<input id ='form_data' type='text' name = 'size_name' value='".$subrow["size_name"]."'>");
						echo("<input id ='form_data' type='text' name = 'item_pic_loc' value='".$row["item_pic_loc"]."'>");								
						echo("<input id ='addtobagbutton' type='submit' value='Add To Bag' name='submit'>");
						echo("</form>");
						echo("</div>");
						$conn2 -> close();
						
					}				
					
				}
				else //it might be an accessory
				{
					
					$sql_query = "select * from accessories_item where accessories_item_name like '%".$itemname."%'";

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
				
			}

		?>
		

	</body>
		
</html>