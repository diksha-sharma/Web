<?php

	session_start();
	$item_id = $_POST["item_id"];
	$itemsize = $_POST["itemsize"];
	$item_name = $_POST["itemname"];
	$item_description = $_POST["description"];
	$item_price = $_POST["price"];
	$item_in_stock_qty = $_POST["quantity"];
	$item_picture = $_POST["picture"];

	$conn = new mysqli("localhost", "root", "", "sjc");

	if($conn -> connect_error)
	{

		echo "Issue contacting the server...";
		die();

	}
	else
	{

		$sql_query = "UPDATE items SET item_name = '".$item_name."', item_description = '".$item_description."', item_price = ".$item_price.", item_pic_loc = '".$item_picture."' WHERE item_id = ".$item_id;
		echo $sql_query;
		echo("<br>");
		if ($conn->query($sql_query) == TRUE) 
		{
			
			$sql_query1 = "UPDATE item_size SET item_in_stock_qty = ".$item_in_stock_qty." where item_id = ".$item_id." and size_id = (select size_id from sizes where size_name like '".$itemsize."')";
			echo $sql_query1;
			if ($conn->query($sql_query1) == TRUE) 
			{
				
				$redirectURL = "../html/Admin.php";
				header('Location: '.$redirectURL);
				
			}
			else
			{
				
				echo "Error updating record ";
				
			}
			
		} 
		else 
		{
			
			echo "Error updating record " ;
			
		}

		$conn->close();
		
		
	}	
	
?>