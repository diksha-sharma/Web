<?php

	session_start();
	$Password = $_POST["Password"];
	$Email = $_POST["Email"];

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>User Sign In</title>
	<link rel="stylesheet" type="text/css" href="../css/Login.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="../js/LoginDBJSValidate.js"></script>

	</head>
	
	<body>
		
		<div id="PageHeading">
			Shraddha Jain Creations<br/>
		</div>
					
		<form id="LoginForm">
	
			<div>
				<div class="label">
					Please Enter Your User Name:
				</div>
				<p>
				(Your user name is the email address you used for sign up )
				</p>
				<div class = "fields">
					<input id="Email" name="Email" type="text">  
				</div>
			</div>
			
			<div>			
				<div class="label">
					Please Enter Your Password:
				</div>
				
				<div class = "fields">
					<input id="Password" name="Password" type="password">  
				</div>
			</div>
			
			<input type="submit" id="submitSignup" value="Sign In">
			
		</form>
		
		<?php

			if(($Password == null) || ($Email == null))
			{
				
				if ($Email == null)
				{
					
					echo "Username cannot be left blank.";
					echo nl2br("\n");
					
				}
				
				if ($Password == null)
				{
					
					echo "Password cannot be left blank. Please enter a password.";
					echo nl2br("\n");
					
				}
				
				
				echo nl2br("\n");
				
			}
			
			$conn = new mysqli("localhost", "root", "", "sjc");

			if($conn -> connect_error)
			{

				echo "Issue contacting the server...";
				$success = 1;
				die();

			}
			else
			{

				$sql_query = "SELECT * FROM users WHERE user_email = '".$Email."' AND user_password = '".$Password."'";
				$result = $conn->query($sql_query);
				
				if ($result->num_rows > 0) 
				{

					$_SESSION["Password"] = $Password;
					$row = $result->fetch_assoc();
					$_SESSION["Username"] = $row["user_name"];
					$_SESSION["Email"] = $Email;
					setcookie("Username", $row["user_name"], time() + 3600, "/");
					setcookie("Email", $Email, time() + 3600, "/");
					setcookie("Size", "All", time() + 3600, "/");
					$success = 0;
					
				} 
				//else 
				//{
					
					//$success = 1;
					//echo "Error: <br>" . $conn->error;
				//}

			}

			$conn -> close();

			if($success == 1)
			{
				
				echo nl2br("\n");
				echo nl2br("\n");
				echo nl2br("<div>");
				echo nl2br("There was no match found for the details you provided. Please try again.");
				echo nl2br("\n");
				echo nl2br("To Refresh Page: <a href=\"UserLogin.htm\">Click here</a>");
				echo nl2br("</div>");
				
			}
			else
			{
				
				header('Location: ../html/SJC.php');
				
			}

		?>

	</body>
	
</html>