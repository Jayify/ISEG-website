<?php
//start the session and create the connection
session_start();
include"conn.php";

error_reporting(0); //don't display errors on page
?>

<?php
	//when sign up button is pressed
    if(isset($_POST['SignUp'])) {	
		//retrieve values
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];	
		$Password = $_POST['Password'];
		$file = $_FILES['file']['name'];
		
		//check that an account has not already been made with this email
		// this is to avoid account duplication and potential errors causes by accounts with the same email
		$result = $conn->query("select * from members where email='$Email'");
		$row = $result->fetch_array();
		
		//if new email, insert values into database to create new member record
		if(!$row){
			$sql = $conn->query("INSERT INTO members (first_name, last_name, email, password, avatar) 
				Values('$FirstName','$LastName','$Email','$Password','$file')");
		
			//specify the directory for profile photos
			$target_path = "uploads/"; 
			
			//upload image
			$target_file = $target_path . basename($_FILES['file']['name']); 
			move_uploaded_file($_FILES['file']['tmp_name'], $target_file); 

			//load login page
			header('Location: login.php');
		}
		//if already used email, give error
		else{
			?>
			<!-- error message -->
			<script>alert('There is already an account with this email');</script>
			<?php
			
		}
	}  
?>


<!DOCTYPE HTML>
<html lang = "en">

	<head>
		<title>ISEG</title>
		<meta charset = "UTF-8">
		<meta name = "description" content = "Assesment Website">
		<meta name = "keyword" content = "formal, event, gentlemen, society, posh">
		<meta name = "author" content = "jayden houghton">
		<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
		
		<style>
			#wrapper{
				margin:-8px;
				margin-right:-18px;
				padding-bottom:10px;
				background-color:black;
				box-sizing:border-box;
				min-width:700px;
								
				display:grid;
				grid-template-columns:1fr 3fr 1fr;
				grid-template-rows:auto;
				grid-template-areas:
					"ws1 header ws2"
					"ws1 intro ws2"
					"ws1 article ws2"
					"ws1 footer ws2";
			}
			
			li{
				padding-left:30px;
				padding-right:30px;
			}
			
			@media only screen and (max-width: 1400px) {
				#wrapper{
					margin:-8px;
					margin-right:-18px;
					background-color:black;
					box-sizing:border-box;
					min-width:700px;
					
					display:grid;
					grid-template-columns:1fr 6fr 1fr;
					grid-template-rows:auto;
					grid-template-areas:
						"ws1 header ws2"
						"ws1 intro ws2"
						"ws1 article ws2"
						"ws1 footer ws2";
				}
				
				<!-- rearrange nav -->
				ul{
					margin-top:-75px;
				}
				li{
					padding-left:20px;
					padding-right:30px;
				}
				
				.line{
					margin:20px;
					margin-top:-45px;
					width:300px; 
					height:160px;
				}
			}
			
			@media only screen and (max-width: 1100px) {
				#wrapper{
					margin:-8px;
					margin-right:-18px;
					background-color:black;
					box-sizing:border-box;
					min-width:830px;
					
					display:grid;
					grid-template-columns:3fr;
					grid-template-rows:auto;
					grid-template-areas:
						"header"
						"intro"
						"article"
						"footer";
				}
				
				<!-- rearrange nav -->
				ul{
					margin-top:50px;
				}
				li{
					padding-left:15px;
					padding-right:20px;
				}
			}
		</style>
	</head>


	<body>
		<div id = "wrapper">	
			<!-- nav -->
			<header style="margin-bottom:50px">
				<img src="Images/Logo_2.png" alt="ISEG Logo" id="nav_image" height="65" align="left";>
				<h1 style="padding-top:2px;">I S E G</h1>
				<ul>
					<li> <a href = "index.php">Home</a>
					<li> <a href = "gallery.php">Gallery</a>
					<li> <a href = "login.php">Login</a>
					<li> <a href = "registration.php" style="color:#FFD700;">Register</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto; width:574px;">
				<!-- create account -->
				<div class="form_header" style="margin-bottom:50px;">
					<div>	
						<h3>Create Account</h3>
						<h4>Welcome! We are glad you want to join us.</h4>
						<p style="margin-top:-10px;">Please fill out the form below to register for ISEG.</p>
						<p class="required_text"><i>* Required</i></p> <!-- informs the user what they must fill in to avoid confusion -->
					</div>
					
					<!-- registration form -->
					<form id="registration_form" name="RegisterForm" method="post" action="" enctype="multipart/form-data">
						<p class="form_names">First Name *</p>
						<div class="form_element"><input name="FirstName" type="text" required="required" class="textfield" placeholder="First Name"></div>  
						<p class="form_names">Last Name *</p>					
						<div class="form_element"><input name="LastName" type="text" required="required" class="textfield" placeholder="Last Name"></div>
						<p class="form_names">Email Address *</p>
						<div class="form_element"><input name="Email" type="email" required="required" class="textfield" placeholder="Email"></div>
						<p class="form_names">Password *</p>
						<div class="form_element"><input name="Password" type="text" required="required" class="textfield" placeholder="Password"></div>
						<p class="form_names">Profile Photo</p>
						<div class="form_element" style="padding-left:66px;"><input name="file" type="file" id="avatar" style="padding-left:14px;"></div>
						<p style="padding-top:10px;">Your sector and title can be selected once you are a member.</p>
						<!-- submit button -->
						<div class="form_element"><input name="SignUp" type="submit" class="form_button" value="JOIN"></div>
					</form>
				</div>
				
				<!-- login option -->
				<div class="form_header" style="padding-top:10px;">
					<div>	
						<h4>Already have an account?</h4>
						<a href = "login.php"><div class="form_button" id="form_button2"><p style="margin:0px;">LOGIN</p></div></a>
					<div>
				</div>
			</article>
			
			<footer style="margin-top:50px">
				<p> © Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>