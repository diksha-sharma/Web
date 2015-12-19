<?php
	
	session_start();
	$success = 0;
	$conn = new mysqli("localhost", "root", "", "sjc");

	if($conn -> connect_error)
	{

		echo "Issue contacting the server...";
		$success = 1;
		die();

	}
	else
	{

		$sql_query = "UPDATE order_history SET status = 'Ordered' WHERE username = '".$_COOKIE["Username"]."'";
		//echo $sql_query;
		if ($conn->query($sql_query) == TRUE) 
		{

			$redirectURL = "../html/AddToBag.php";
			header('Location: '.$redirectURL);

		} 
		else 
		{
			
			echo "Error updating record ";
			
		}
		
		//if(!isset($_COOKIE["SJC"])) 
		//{
			
			//echo "Issue during checkout. No items to check out.";
			//$success = 1;
			
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
						
						//$sql_query = "update accessories_item_type set item_in_stock_qty = item_in_stock_qty-1 where accessories_item_id = (select accessories_item_id from accessories_item where accessories_item_name like '".$itemname."')";
						//if ($conn->query($sql_query) == FALSE) 
						//{
												
							//echo "Error updating record: " . $conn->error;
							//$success = 1;
							
						//}
						
					//}
					
				///}
				//else
				//{
					
					//$itemname =$itemdetails[0];						
					//$itemprice =$itemdetails[1];
					//$itemsize = $itemdetails[2];
					//$itempicture =$itemdetails[3];
					
					//if($itemname != "Array")
					//{
						
						//$sql_query = "update item_size set item_in_stock_qty = item_in_stock_qty-1 where item_id = (select item_id from items where item_name like '".$itemname."')and size_id = (select size_id from sizes where size_name like '".$itemsize."')";
						//if ($conn->query($sql_query) == FALSE) 
						//{
												
							//echo "Error updating record: " . $conn->error;
							//$success = 1;
							
						//}
						
					//}					
					
				//} 
				
			//}
			
		//}

	}

	$conn -> close();
	//$cookie_name = "SJC";
	//unset($_COOKIE[$cookie_name]);
	//$res = setcookie($cookie_name, '', time() - 3600);
	
	//if($success == 0)
	//{
		
		//$redirectURL = "../html/SJC.php";
		//header('Location: '.$redirectURL);
		
	//}
	
?>
