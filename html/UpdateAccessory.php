<?php

	session_start();
	$item_id = $_POST["item_id"];
	$item_name = $_POST["itemname"];
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

		$sql_query = "UPDATE accessories_item SET accessories_item_name = '".$item_name."', accessories_item_price = ".$item_price.", accessories_item_pic_loc = '".$item_picture."' WHERE accessories_item_id = ".$item_id;
		echo $sql_query;
		echo("<br>");
		if ($conn->query($sql_query) == TRUE) 
		{
			
			$sql_query1 = "UPDATE accessories_item_type SET item_in_stock_qty = ".$item_in_stock_qty." where accessories_item_id = ".$item_id;
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