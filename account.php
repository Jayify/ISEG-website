<?php
session_start(); 
include"conn.php";

error_reporting(0); //don't display errors on page
?>

<?php
	//check for a member id or return to the login page
	if(isset($_SESSION["MemberID"])){
	}
	else {
		header('Location: login.php');
	} 
  
	$member = $_SESSION["MemberID"];
  
	//retrieve values from database with same member id
	$result = $conn->query("select * from members where member_id='$member'");
	$row = $result->fetch_array();	
?>

<?php
	//when update profile button pressed
	if(isset($_POST['UpdateProfile'])){
		$id=$row['member_id'];

		//Assign a local variable to each field on the form
		$UpdateFirstName = $_POST['FirstName'];
		$UpdateLastName = $_POST['LastName'];
		$UpdateEmail = $_POST['Email'];
		$UpdatePassword = $_POST['Password'];
		
		$_SESSION["FirstName"] = $UpdateFirstName;
		$_SESSION["LastName"] = $UpdateLastName;	
		$_SESSION["Email"] = $UpdateEmail;	
		$_SESSION["Password"] = $UpdatePassword;
		
		//update the members table with form values
		$data = $conn->query("UPDATE members SET first_name = '$UpdateFirstName', 
		last_name = '$UpdateLastName', email = '$UpdateEmail',
		password = '$UpdatePassword' where member_id = $member");
		
		//check for errors and reload account page with new values
		if($data){
?>	
			<script>window.location ="account.php?id=<?php echo $id;?>";</script> 
<?php
			}
			else{
?>
			<script>alert('Invalid Update');</script>
<?php
		}
  }
?>

<?php
	//when avatar update button pressed
	if(isset($_POST['UpdateAvatar'])){
		if(!empty($_FILES['file']['name'])){	
			$id=$row['member_id'];
			
			//get image file
			$UpdateFile = $_FILES['file']['name'];
			$_SESSION["Avatar"] = $UpdateFile;
			$data = $conn->query("UPDATE members SET avatar = '$UpdateFile' where member_id = $member");

			//set directory
			$target_path = "uploads/"; 
			
			//upload image
			$target_file = $target_path . basename($_FILES['file']['name']); 
			move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
?>	
			<!-- reload page with new values -->
			<script>window.location ="account.php?id=<?php echo $id;?>";</script> 
<?php
			}
		else{
?>
			<!-- error if no file -->
			<script>alert('No File Selected');</script>
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
			<header>
				<img src="Images/Logo_2.png" alt="ISEG Logo" id="nav_image" height="65" align="left";>
				
				<h1 style="padding-top:2px;">I S E G</h1>
				
				<ul>
					<li> <a href = "index.php">Home</a>
					<li> <a href = "account.php" style="color:#FFD700;">Account</a>
					<li> <a href = "members.php">Members</a>
					<li> <a href = "events.php">Events</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto; width:574px; margin-top:50px;">
				<div  class="form_header">
					<div>	
						<h3>My Details</h3>
						<p style="margin-top:-1px;">These can be changed at any time.</p>
					</div>
					
					<!-- update details form -->
					<form id="update_form" name="UpdateForm" method="post" action="">
						<p class="form_names">First Name</p>
						<div class="formelement"><input name="FirstName" type="text" required="required" class="textfield" 
						id="FirstName" placeholder="First Name" value="<?php echo $_SESSION["FirstName"]; ?>" ></div>
						<p class="form_names">Last Name</p>
						<div class="formelement"><input name="LastName" type="text" required="required" class="textfield" 
						id="LastName" placeholder="Last Name" value="<?php echo $_SESSION["LastName"]; ?>" ></div>		
						<p class="form_names">Email</p>
						<div class="formelement"><input name="Email" type="text" required="required" class="textfield" 
						id="Email" placeholder="Email" value="<?php echo $_SESSION["Email"]; ?>" ></div> 
						<p class="form_names">Password</p>
						<div class="formelement"><input name="Password" type="password" required="required" class="textfield" 
						id="Password" placeholder="Password" value="<?php echo $_SESSION["Password"]; ?>" ></div>   
						<!-- submit button -->
						<div class="formelement" style="padding-top:20px;"><input name="UpdateProfile" type="submit" class="form_button" value="UPDATE"></div>
					</form>  
				</div>  
				
				<!-- update photo form -->
				<div class="form_header" style="margin-top:50px;">
					<h3>Profile Photo</h3>
					<form id="update_pfp_form" name="UpdateProfilePic" method="post" action="" enctype="multipart/form-data">
						<!-- set directory -->
						<?php $folder_path = 'uploads/';?>
						<!-- display current image -->
						<img src="<?php echo $folder_path ?>
						<?php echo $_SESSION["Avatar"]; ?>" style="width: 100px; height: 100px; margin-bottom:12px; border-style:solid; border-color:black; border-width:6px;"></td>
						<!-- input for new image -->
						<div class="formelement"><input name="file" type="file" id="Avatar" placeholder="Avatar" style="padding-left:75px;"></div>	
						<!-- submit button -->
						<div class="formelement" style="padding-top:20px;"><input name="UpdateAvatar" type="submit" class="form_button" id="UpdateAvatar" value="UPDATE"></div>
					</form> 
				</div>
				
				<!-- event list -->
				<div  class="form_header" style="margin-top:50px;">	
					<div>
						<h3>My Events</h3>
						<p style="margin-top:-1px;">This is a list of all events you have organised</p>
						
						<!-- events table -->
						<table style="margin:auto;" border=1 frame=below rules=rows cellpadding=6px;>    
							<!-- headings -->
							<tr>
								<th width="200">Event ID</th>
								<th width="200">Event Name</th>
								<th width="200">Date</th>
								<th width="200">Location</th>
							</tr>
							
							<!-- get data -->
							<?php
							$sql=$conn->query("select * from events");  
							$count = 0;
							while($row=$sql->fetch_array()){
								if($row['organiser'] == $_SESSION["MemberID"]){
									?>
									<!-- fill in table -->
									<tr>
									  <td><?php echo $row['event_id'];?></td>
									  <td><?php echo $row['name'];?></td>
									  <td><?php echo $row['date'];?></td>
									  <td><?php echo $row['location'];?></td>
									</tr>
									<?php $count = $count+1; ?>
							<?php 
								}
							} 
							?>
						</table> 
						<?php
						if($count == 0){
							?>
							<p>No events organised</p>
							<?php
						}
						?>
					</div>
				</div>
			</article>
			<footer style="margin-top:50px;">
				<p> © Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>