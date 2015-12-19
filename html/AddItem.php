<?php

	session_start();
	$category = $_POST["category"];
	$itemname = $_POST["itemname"];
	$price = $_POST["price"];
	$picture = $_POST["picture"];
	$description = $_POST["description"];
	$itemtype = $_POST["type"];
	$quantity =  $_POST["quantity"];
	$success = 0;
	
	if(($category == null) || ($itemname == null) || ($price == null) || ($picture == null) || ($description == null) || ($quantity == null) || ($itemtype == null))
	{
		
		if ($category == null)
		{
			
			echo "Category cannot be left blank. Please select a category for item.";
			echo nl2br("\n");
			
		}
		if ($itemname == null)
		{
			
			echo "Item Name cannot be left blank. Please enter item name.";
			echo nl2br("\n");
			
		}
		if ($price == null)
		{
			
			echo "Price cannot be left blank. Please enter item price.";
			echo nl2br("\n");
			
		}
		if ($picture == null)
		{
			
			echo "Picture name cannot be left blank. Please provide a picture name.";
			echo nl2br("\n");
			
		}
		if ($description == null)
		{
			
			echo "Description cannot be left blank. Please provide item description.";
			echo nl2br("\n");
			
		}
		if ($quantity == null)
		{
			
			echo "Quantity cannot be left blank. Please provide quantity of pieces in stock.";
			echo nl2br("\n");
			
		}
		if ($itemtype == null)
		{
			
			echo "Type cannot be left blank. Please provide type of item.";
			echo nl2br("\n");
			
		}

		echo nl2br("\n");
		$success = 1;
		
	}
	else
	{
		
		if($category == "Accessories")
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

					$sql_query = "INSERT INTO accessories_item (accessories_item_name, accessories_item_category_id, accessories_item_price, accessories_item_pic_loc) VALUES ('".$itemname."', 10008, ".$price.", '../img/accessories/".$picture."jpg')";
					
					if ($conn->query($sql_query) == TRUE) 
					{
											
						$sql_query1 = "SELECT accessories_item_id FROM accessories_item WHERE accessories_item_name = '".$itemname."'";
						$result1 = $conn->query($sql_query1);
					
						if ($result1->num_rows > 0) 
						{

							$row1 = $result1->fetch_assoc();
							$itemid = $row1["accessories_item_id"];
							
							$sql_query2 = "SELECT accessories_type_id FROM accessories_type WHERE accessories_type_name = '".$itemtype."'";
							$result2 = $conn->query($sql_query2);
							
							if ($result2->num_rows > 0) 
							{
								
								$row2 = $result2->fetch_assoc();
								$itemtypeid = $row2["accessories_type_id"];
								
								$sql_query3 = "INSERT INTO accessories_item_type VALUES(".$itemid.", ".$itemtypeid.", ".$quantity.")";
								$success = 0;
								$redirectURL = "../html/Admin.php";
								header('Location: '.$redirectURL);
								
							}
							else 
							{
								
								$success = 1;
								echo "Error: <br>";
							}						
							
						} 
						else 
						{
							
							$success = 1;
							echo "Error: <br>";
						}
						
					} 
					else 
					{
						
						echo "Error: ";
						$success = 1;
						
					}

				}

				$conn -> close();

			}
			else
			{
				
				echo nl2br("\n");
				echo nl2br("\n");
				echo nl2br("<div>");
				echo nl2br("Could not insert item details in to database. Please try again.");
				echo nl2br("\n");
				echo nl2br("To Refresh Page: <a href=\"AdminActions.php\">Click here</a>");
				echo nl2br("</div>");
			}
			
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

					$sql_query = "INSERT INTO items (item_name, item_description, item_category_id, item_pic_loc, item_price) VALUES ('".$itemname."', '".$description."', 10000, '../img/dresses/".$picture."jpg', ".$price.")";
					
					if ($conn->query($sql_query) == TRUE) 
					{
											
						$sql_query1 = "SELECT item_id FROM items WHERE item_name = '".$itemname."'";
						$result1 = $conn->query($sql_query1);
					
						if ($result1->num_rows > 0) 
						{

							$row1 = $result1->fetch_assoc();
							$itemid = $row1["item_id"];

							$sql_query2 = "INSERT INTO item_size VALUES(".$itemid.", 1, ".$quantity.")";
							$sql_query3 = "INSERT INTO item_size VALUES(".$itemid.", 2, ".$quantity.")";
							$sql_query4 = "INSERT INTO item_size VALUES(".$itemid.", 3, ".$quantity.")";
							$sql_query5 = "INSERT INTO item_size VALUES(".$itemid.", 4, ".$quantity.")";
							$sql_query6 = "INSERT INTO item_size VALUES(".$itemid.", 5, ".$quantity.")";
							
							if (($conn->query($sql_query2) == TRUE) && ($conn->query($sql_query3) == TRUE) && ($conn->query($sql_query4) == TRUE) && ($conn->query($sql_query5) == TRUE) && ($conn->query($sql_query6) == TRUE)) 
							{
								
								$success = 0;
								$redirectURL = "../html/Admin.php";
								header('Location: '.$redirectURL);
								
							}
							else
							{
								
								$success = 1;
								echo "Error: <br>";
							}
						} 
						else 
						{
							
							$success = 1;
							echo "Error: <br>";
						}
						
					} 
					else 
					{
						
						echo "Error: ";
						$success = 1;
						
					}

				}

				$conn -> close();

			}
			else
			{
				
				echo nl2br("\n");
				echo nl2br("\n");
				echo nl2br("<div>");
				echo nl2br("Could not insert item details in to database. Please try again.");
				echo nl2br("\n");
				echo nl2br("To Refresh Page: <a href=\"AdminActions.php\">Click here</a>");
				echo nl2br("</div>");
			}	
			
		}
		
	}
	
?>