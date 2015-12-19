<?php

	session_start();
	$Username = $_POST["Username"];
	$Password = $_POST["Password"];
	$RePassword = $_POST["RePassword"];
	$Email = $_POST["Email"];
	$success = 0;

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-us">
	
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>User Loyalty Account Sign Up</title>
	<link rel="stylesheet" type="text/css" href="../css/UserSignUp.css" />
	<script type="text/javascript" src="../js/LoginJSValidate.js"></script>

	</head>

	<body>
		
		<div id="PageHeading">
			Shraddha Jain Creations Loyalty Program<br/>
		</div>
					
		<form id="SignUpForm" method="post" action="UserSignUp.php">
		
			<div>
				<div class="label" id="UsernameLabel">
					Please Enter Your Name:
				</div>
				
				<div  class = "fields">
					<input id="Username" name="Username" type="text"></div>
				</div>
			</div>
			
			<div>			
				<div class="label">
					Please Enter Your Password:
				</div>
				
				<div class = "fields">
					<input id="Password" name="Password" type="password"></div>
				</div>
			</div>
			
			<div>			
				<div class="label">
					Please Re-Enter Your Password:
				</div>
				
				<div class = "fields">
					<input id="RePassword" name="RePassword" type="password"></div>
				</div>
			</div>
			
			<div>
				<div class="label">
					Please Enter Your Email:
				</div>
				
				<div class = "fields">
					<input id="Email" name="Email" type="text"></div>
				</div>
			</div>
			
			<input type="submit" id="submitSignup" value="SignUp">
					
		</form>
		
		<?php

			if(($Username == null) || ($Password == null) || ($RePassword == null) || ($Email == null))
			{
				
				if ($Username == null)
				{
					
					echo "Name cannot be left blank. Please provide us your name.";
					echo nl2br("\n");
					
				}
				if ($Password == null)
				{
					
					echo "Password cannot be left blank. Please enter a password.";
					echo nl2br("\n");
					
				}
				if ($RePassword == null)
				{
					
					echo "Confirm password field cannot be left blank. It should be same as password.";
					echo nl2br("\n");
					
				}
				if ($Email == null)
				{
					
					echo "Email cannot be left blank. Please provide us a valid email address.";
					echo nl2br("\n");
					
				}
				
				echo nl2br("\n");
				$success = 1;
				
			}
			
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

					$sql_query = "INSERT INTO users (user_name, user_password, user_email) VALUES ('".$Username."', '".$Password."', '".$Email."')";
					
					if ($conn->query($sql_query) == TRUE) 
					{
											
						$_SESSION["Username"] = $Username;
						$_SESSION["Email"] = $Email;
						
						setcookie("Username", $Username, time() + 3600, "/");
						setcookie("Email", $Email, time() + 3600, "/");
						
						header('Location: ../html/SJC.php');
						
					} 
					//else 
					//{
						//echo "Error: " . $sql . "<br>" . $conn->error;
					//}

				}

				$conn -> close();

			}
			else
			{
				
				echo nl2br("\n");
				echo nl2br("\n");
				echo nl2br("<div>");
				echo nl2br("Could not sign up new user for Loyalty Program. Please try again.");
				echo nl2br("\n");
				echo nl2br("To Refresh Page: <a href=\"UserSignUp.html\">Click here</a>");
				echo nl2br("</div>");
			}

		?>
		
	</body>
	
</html>