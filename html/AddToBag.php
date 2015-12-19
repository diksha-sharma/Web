<?php

	session_start();
	$accessories_item_name= "";
	$accessories_item_price= "";
	$accessories_item_pic_loc= "";

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/AddToBag.css" />
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
		<div>
		<div id ="ContinueShopping">
			<form><input type="button" value="Continue Shopping" onClick="history.go(-1);return true;"></form>
			<br>
		</div>
		<div id ="Checkout">
			<form><input type="button" value="Checkout" onClick="location.href = '../html/Checkout.php'"></form>
		</div>
		</div>
		<hr>
		<div id="cart">
			<?php
			
				$conn = new mysqli("localhost", "root", "", "sjc");

				if($conn -> connect_error)
				{

					echo "Issue contacting the server...";
					die();

				}
				else
				{

					$sql_query = "SELECT * FROM order_history WHERE username = '".$_COOKIE["Username"]."' and status = 'Added'";
					$result = $conn->query($sql_query);
								
					if ($result->num_rows > 0) 
					{
						
						while($row = $result->fetch_assoc()) 
						{
							
							$item_id = $row["item_id"];
							$size_id = $row["size_id"];
							$accessories_item_id = $row["accessories_item_id"];
							
							if($size_id == NULL) //it is an accessory
							{
								
								$sql_query1 = "SELECT * FROM accessories_item WHERE accessories_item_id = ".$accessories_item_id;
								$result1 = $conn->query($sql_query1);
								
								if ($result1->num_rows > 0) 
								{
									$row1 = $result1->fetch_assoc();
									echo("<div class =\"details\">");							
									echo("<img src = '".$row1["accessories_item_pic_loc"]."' class=\"items\"/>");
									echo("<br>");
									echo("<br>");
									echo("<div id='itemtext'>");
									echo("<b>Item Name: </b>");
									echo($row1["accessories_item_name"]);
									echo("<br>");
									echo("<b>Item Price: </b>$");
									echo($row1["accessories_item_price"].".00");	
									echo("</div>");
									echo("</div>");
									
								}
								else
								{
									
									echo "Issue fetching item details from the server...";
									die();
									
								}
								
								
							}
							else //it is a dress
							{
								
								$sql_query1 = "SELECT * FROM items WHERE item_id = ".$item_id;
								$result1 = $conn->query($sql_query1);
								
								$sql_query2 = "SELECT size_name FROM sizes WHERE size_id = ".$size_id;
								$result2 = $conn->query($sql_query2);
								
								if ($result1->num_rows > 0 && $result2->num_rows > 0) 
								{
									$row1 = $result1->fetch_assoc();
									$row2 = $result2->fetch_assoc();
									echo("<div class =\"detailsdresses\">");							
									echo("<img src = '".$row1["item_pic_loc"]."' class=\"itemsdresses\"/>");
									echo("<br>");
									echo("<br>");
									echo("<div id='itemtext'>");
									echo("<b>Item Name: </b>");
									echo($row1["item_name"]);
									echo("<br>");
									echo("<b>Item Price: </b>$");
									echo($row1["item_price"].".00");
									echo("<br>");
									echo("<b>Item Size: </b>");
									echo($row2["size_name"]);								
									echo("</div>");
									echo("</div>");
									
								}
								else
								{
									
									echo "Issue fetching item details from the server...";
									die();
									
								}
								
							}
							
						}				
						
					}
					
				}
				//if(!isset($_COOKIE["SJC"])) 
				//{
					
					//echo "No items in Shopping bag.";
					
				//}
				//else
				//{
					
					//$items = $_COOKIE["SJC"];
					
					//$itemsinbag = (explode("&&", $items));
					//for($x=0; $x < count($itemsinbag); $x++)
					//{
						
						//$item = $itemsinbag[$x];
						//$itemdetails = (explode(",", $item));
						//$itemname =$itemdetails[0];						
						//$itemprice =$itemdetails[1];
						//$itempicture =$itemdetails[2];
						//if(count($itemdetails) == "3")
						//{
							//$itemname =$itemdetails[0];						
							//$itemprice =$itemdetails[1];
							//$itempicture =$itemdetails[2];
							
							//if($itemname != "Array")
							//{
								
								//echo("<div class =\"details\">");							
								//echo("<img src = '".$itempicture."' class=\"items\"/>");
								//echo("<br>");
								//echo("<br>");
								//echo("<div id='itemtext'>");
								//echo("<b>Item Name: </b>");
								//echo($itemname);
								//echo("<br>");
								//echo("<b>Item Price: </b>$");
								//echo($itemprice.".00");	
								//echo("</div>");
								//echo("</div>");
								
							//}
							
						//}
						//else
						//{
							
							//$itemname =$itemdetails[0];						
							//$itemprice =$itemdetails[1];
							//$itemsize = $itemdetails[2];
							//$itempicture =$itemdetails[3];
							
							//if($itemname != "Array")
							//{
								
								//echo("<div class =\"detailsdresses\">");							
								//echo("<img src = '".$itempicture."' class=\"itemsdresses\"/>");
								//echo("<br>");
								//echo("<br>");
								//echo("<div id='itemtext'>");
								//echo("<b>Item Name: </b>");
								//echo($itemname);
								//echo("<br>");
								//echo("<b>Item Price: </b>$");
								//echo($itemprice.".00");
								//echo("<br>");
								//echo("<b>Item Size: </b>");
								//echo($itemsize);								
								//echo("</div>");
								//echo("</div>");
								
							//}
							
						//} 
						
					//}
					
				//}				

			?>
		</div>
		<hr>
		<div>
		<div id ="ContinueShopping">
			<form><input type="button" value="Continue Shopping" onClick="history.go(-1);return true;"></form>
			<br>
		</div>
		<div id ="Checkout">
			<form><input type="button" value="Checkout" onClick="location.href = '../html/Checkout.php'"></form>
		</div>
		</div>
		<hr>
	</body>
		
</html>