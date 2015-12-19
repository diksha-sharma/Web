<?php

	session_start();
	
	//$cookie_name = "SJC";
	if($_GET["item_type"] == "Accessories")
	{
		
		$conn = new mysqli("localhost", "root", "", "sjc");

		if($conn -> connect_error)
		{

			echo "Issue contacting the server...";
			die();

		}
		else
		{
			$sql_query1 = "select item_in_stock_qty, accessories_item_id from accessories_item_type where accessories_item_id = (select accessories_item_id from accessories_item where accessories_item_name = '".$_GET["accessories_item_name"]."')";
			//echo $sql_query1;
			$result1 = $conn->query($sql_query1);
					
			if ($result1->num_rows > 0) 
			{

				$row1 = $result1->fetch_assoc();
				if($row1["item_in_stock_qty"] > 0)
				{
					//echo($_COOKIE["Username"]);
					//echo($row1["accessories_item_id"]);
					
					//$new_cookie_value = $_GET["accessories_item_name"].",".$_GET["accessories_item_price"].",".$_GET["accessories_item_pic_loc"];
					//echo("quantity checked and set");
					$sql_query2 = "Insert into order_history (username, accessories_item_id, status, date_ordered) values('".$_COOKIE["Username"]."', ".$row1["accessories_item_id"].", 'Added', sysdate())";
					//echo ($sql_query2);
					if ($conn->query($sql_query2) == TRUE) 
					{
						//echo("<br>");
						//echo("case 1");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 1 cookie set");
						$redirectURL = "../html/AddToBag.php";
						header('Location: '.$redirectURL);
						
					} 
					else 
					{
						//$addeditems = $_COOKIE[$cookie_name];
						//$new_cookie_value = $addeditems."&&".$new_cookie_value;
						//echo("<br>");
						//echo("case 2");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 2 cookie set");
						echo "Issue contacting the server...";
						die();
					}
					
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("Item is out of stock. Item not added in bag.")';
					echo '</script>';
					$redirectURL = "../html/Accessories.php";
					header('Location: '.$redirectURL);
					
				}
				
			}
			
		}
		
	}
	else
	{

		$conn = new mysqli("localhost", "root", "", "sjc");

		if($conn -> connect_error)
		{

			echo "Issue contacting the server...";
			die();

		}
		else
		{
			$sql_query1 = "select item_in_stock_qty, item_id, size_id from item_size where item_id = (select item_id from items where item_name = '".$_GET["item_name"]."') and size_id = (select size_id from sizes where size_name = '".$_GET["sizedetails"]."')";
			//echo $sql_query1;
			$result1 = $conn->query($sql_query1);
					
			if ($result1->num_rows > 0) 
			{

				$row1 = $result1->fetch_assoc();
				if($row1["item_in_stock_qty"] > 0)
				{
					
					$sql_query2 = "Insert into order_history (username, item_id, status, date_ordered, size_id) values('".$_COOKIE["Username"]."', ".$row1["item_id"].", 'Added', sysdate(), '".$row1["size_id"]."')";
					//echo ($sql_query2);
					if ($conn->query($sql_query2) == TRUE) 
					{
						//echo("<br>");
						//echo("case 1");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 1 cookie set");
						$redirectURL = "../html/AddToBag.php";
						header('Location: '.$redirectURL);
						
					} 
					else 
					{
						//$addeditems = $_COOKIE[$cookie_name];
						//$new_cookie_value = $addeditems."&&".$new_cookie_value;
						//echo("<br>");
						//echo("case 2");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 2 cookie set");
						echo "Issue contacting the server...";
						die();
					}
					//$new_cookie_value = $_GET["item_name"].",".$_GET["item_price"].",".$_GET["sizedetails"].",".$_GET["item_pic_loc"];
					//echo("quantity checked and set");
					
					//if(!isset($_COOKIE[$cookie_name])) 
					//{
						//echo("<br>");
						//echo("case 1");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 1 cookie set");
						//$redirectURL = "../html/AddToBag.php";
						//header('Location: '.$redirectURL);
						
					//} 
					//else 
					//{
						//$addeditems = $_COOKIE[$cookie_name];
						//$new_cookie_value = $addeditems."&&".$new_cookie_value;
						//echo("<br>");
						//echo("case 2");
						//echo("<br>");
						//echo($new_cookie_value);
						//setcookie($cookie_name, $new_cookie_value, time() + 3600, "/");
						//echo("<br>");
						//echo("case 2 cookie set");
						//$redirectURL = "../html/AddToBag.php";
						//header('Location: '.$redirectURL);
	
					//}
					
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("Item is out of stock. Item not added in bag.")';
					echo '</script>';
					$redirectURL = "../html/Dresses.php";
					header('Location: '.$redirectURL);
					
				}
				
			}
			
		}
		
		
	}

?>