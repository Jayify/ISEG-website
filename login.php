<?php
session_start();
include"conn.php";

error_reporting(0); //don't display errors on page
?>

<?php
	//when login button pressed
    if(isset($_POST['LogIn'])){   
		//retrieve values
		$LoginEmail = $_POST['Email'];
		$LoginPassword = $_POST['Password'];

		//find record in database
		$result = $conn->query("select * from members 
		where email='$LoginEmail' and password='$LoginPassword'");
		$row = $result->fetch_array();
		
		//Assign email, password and member_id variables	
		$Email=$row['email'];
		$Password=$row['password'];
		$id=$row['member_id'];

		//Assign the session variables
		$_SESSION['MemberID'] = $row['member_id'];	
		$_SESSION["FirstName"] = $row['first_name'];
		$_SESSION["LastName"] = $row['last_name'];	
		$_SESSION["Email"] = $row['email'];	
		$_SESSION["Password"] = $row['password'];
		$_SESSION["Avatar"] = $row['avatar'];
		$_SESSION["Rank"] = $row['rank'];
		
		//checking that the entered values are the same as the database
		if($LoginEmail==$Email && $LoginPassword==$Password){
?>	
			<!-- load account page -->
			<script>window.location ="account.php?id=<?php echo $id;?>";</script>
<?php
			}
			else{
?>
			<!-- error message -->
			<script>alert('User Name or Password is Incorrect');</script>
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
					<li> <a href = "login.php" style="color:#FFD700;">Login</a>
					<li> <a href = "registration.php">Register</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto; width:574px;">
				<!-- login-->
				<div class="form_header" style="margin-bottom:50px;">
					<div>	
						<h3>Login</h3>
						<h4>Welcome back!</h4>
					</div>
					
					<!-- login form -->
					<form id="login_form" name="LoginForm" method="post" action="" enctype="multipart/form-data">
						<p class="form_names">Email Address</p>
						<div class="form_element"><input name="Email" type="email" required="required" class="textfield" placeholder="Email"></div>
						<p class="form_names">Password</p>
						<div class="form_element"><input name="Password" type="password" required="required" class="textfield" placeholder="Password"></div>
						<!-- submit button -->
						<div class="form_element"><input name="LogIn" type="submit" class="form_button" value="LOGIN"></div>
					</form>
				</div>
				
				<!-- register option -->
				<div class="form_header" style="padding-top:10px;">
					<div>	
						<h4>Don't have an account?</h4>
						<a href = "registration.php"><div class="form_button" id="form_button2"><p style="margin:0px;">JOIN</p></div></a>
					<div>
				</div>
			</article>
			
			<footer style="margin-top:50px">
				<p>© Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>