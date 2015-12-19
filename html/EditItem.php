<?php

	session_start();

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="../css/EditItem.css" />
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

	$itemname = $_POST["itemname"];
	$itemsize = $_POST["itemsize"];
	$success = 0;
	
	if($itemname == null)
	{
		if ($itemname == null)
		{
			
			echo "Item Name cannot be left blank. Please enter item name.";
			echo nl2br("\n");
			
		}

		echo nl2br("\n");
		$success = 1;
		
	}
	else
	{
		
		if($success == 0)
		{
			
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
					
					$row = $result->fetch_assoc();
					$item_id = $row["item_id"];
					$item_name = $row["item_name"];
					$item_description = $row["item_description"];
					$item_category_id = $row["item_category_id"];
					$item_price = $row["item_price"];
					$item_picture = $row["item_pic_loc"];
					
					$sql_query1 = "SELECT * FROM item_size WHERE item_id = ".$item_id." and size_id = (select size_id from sizes where size_name = '".$itemsize."')";
					$result1 = $conn->query($sql_query1);
					if ($result1->num_rows > 0) 
					{
						$row1 = $result1->fetch_assoc();
						$item_in_stock_qty = $row1["item_in_stock_qty"];
						
					}
					else
					{
						
						echo "Issue fetching item details from the server...";
						die();
						
					}
										
					echo("<form id='updateform' method='post' action='../html/UpdateItem.php'>");
					echo("<br>");
					echo("<div>");
					echo("<input type='text' class = 'hide' name ='item_id' value='".$item_id."'>");
					echo("<input type='text' class = 'hide' name ='itemsize' value='".$itemsize."'>");
					echo("<div>");
					echo("Item name: ");
					echo("<input type=text name='itemname' value = '".$item_name."'>");
					echo("</div>");
					echo("<br>");
					echo("<div>");
					echo("Item description: ");
					echo("<input type=text name='description' value = '".$item_description."'>");
					echo("</div>");
					echo("<br>");
					echo("<div>");
					echo("Item price: ");
					echo("<input type=text name='price' value = '".$item_price."'>");
					echo("</div>");
					echo("<br>");
					echo("<div>");
					echo("Item quantity: ");
					echo("<input type=text name='quantity' value = '".$item_in_stock_qty."'>");
					echo("</div>");
					echo("<br>");
					echo("<div>");
					echo("Item image name: ");
					echo("<input type=text name='picture' value = '".$item_picture."'>");
					echo("</div>");
					echo("<br>");
					echo("<input type='submit' value='Update' id='Update'>");
					echo("</div>");
					echo("</form>");

					
				}
				else //Check if an accessory
				{
					
					$sql_query2 = "SELECT * FROM accessories_item WHERE accessories_item_name like '%".$itemname."%'";
					$result2 = $conn->query($sql_query2);
					
					if ($result2->num_rows > 0) 
					{
						
						$row2 = $result2->fetch_assoc();
						$accessories_item_id = $row2["accessories_item_id"];
						$accessories_item_name = $row2["accessories_item_name"];
						$accessories_item_category_id = $row2["accessories_item_category_id"];
						$accessories_item_price = $row2["accessories_item_price"];
						$accessories_item_pic_loc = $row2["accessories_item_pic_loc"];
						
						$sql_query1 = "SELECT * FROM accessories_item_type WHERE accessories_item_id = ".$accessories_item_id;
						$result1 = $conn->query($sql_query1);
						if ($result1->num_rows > 0) 
						{
							$row1 = $result1->fetch_assoc();
							$item_in_stock_qty = $row1["item_in_stock_qty"];
							
						}
						else
						{
							
							echo "Issue fetching item details from the server...";
							die();
							
						}
										
						echo("<form id='updateform' method='post' action='../html/UpdateAccessory.php'>");
						echo("<br>");
						echo("<div>");
						echo("<input type='text' class = 'hide' name ='item_id' value='".$accessories_item_id."'>");
						echo("<div>");
						echo("Item name: ");
						echo("<input type=text name='itemname' value = '".$accessories_item_name."'>");
						echo("</div>");
						echo("<br>");
						echo("<div>");
						echo("Item price: ");
						echo("<input type=text name='price' value = '".$accessories_item_price."'>");
						echo("</div>");
						echo("<br>");
						echo("<div>");
						echo("Item quantity: ");
						echo("<input type=text name='quantity' value = '".$item_in_stock_qty."'>");
						echo("</div>");
						echo("<br>");
						echo("<div>");
						echo("Item image name: ");
						echo("<input type=text name='picture' value = '".$accessories_item_pic_loc."'>");
						echo("</div>");
						echo("<br>");
						echo("<input type='submit' value='Update' id='Update'>");
						echo("</div>");
						echo("</form>");

					}
					else //No such item at all
					{
						
						echo "No such item in database.";
						$success = 1;
						
					}
					
				}
				
			}
			
		}

	}
	
?>