<?php

	session_start();
	$item_name = $_POST["itemname"];
	$conn = new mysqli("localhost", "root", "", "sjc");

	if($conn -> connect_error)
	{

		echo "Issue contacting the server...";
		die();

	}
	else
	{
		$sql_query1 = "select item_id from items where item_name = '".$item_name."'";
		$result1 = $conn->query($sql_query1);
					
		if ($result1->num_rows > 0) 
		{

			$row1 = $result1->fetch_assoc();
			$itemid = $row1["item_id"];
			
			$sql_query = "DELETE from item_size WHERE item_id = ".$itemid;
			//echo $sql_query;
			echo("<br>");
			
			if ($conn->query($sql_query) == TRUE) 
			{

				$sql_query = "DELETE from items WHERE item_id = ".$itemid;
				//echo $sql_query;
				echo("<br>");
				
				if ($conn->query($sql_query) == TRUE) 
				{
					
					$redirectURL = "../html/Admin.php";
					header('Location: '.$redirectURL);
					
				}
				else
				{
					
					echo "Error deleting record ";
					
				}
				
			}
			else
			{
				
				echo "Error deleting record ";
				
			}
			
		}
		else 
		{
			
			$sql_query1 = "select accessories_item_id from accessories_item where accessories_item_name = '".$item_name."'";
			$result1 = $conn->query($sql_query1);
						
			if ($result1->num_rows > 0) 
			{

				$row1 = $result1->fetch_assoc();
				$itemid = $row1["accessories_item_id"];
				
				$sql_query = "DELETE from accessories_item_type WHERE accessories_item_id = ".$itemid;
				//echo $sql_query;
				echo("<br>");
				
				if ($conn->query($sql_query) == TRUE) 
				{

					$sql_query = "DELETE from accessories_item WHERE accessories_item_id = ".$itemid;
					//echo $sql_query;
					echo("<br>");
					
					if ($conn->query($sql_query) == TRUE) 
					{
						
						$redirectURL = "../html/Admin.php";
						header('Location: '.$redirectURL);
						
					}
					else
					{
						
						echo "Error deleting record ";
						
					}
					
				}
				else
				{
					
					echo "Error deleting record ";
					
				}
			}
			
		}

		$conn->close();
		
		
	}	
	
?>