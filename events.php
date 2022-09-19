<?php
//start the session and create the connection
session_start();
include"conn.php";

error_reporting(0); //don't display errors on page
?>

<?php
	//chedk that member id is set or return to login page
	if(isset($_SESSION["MemberID"])){
	}
	else {
		header('Location: login.php');
	} 
?>

<?php
	//when add event button pressed
	if(isset($_POST['AddEvent'])) {	
		//retrieve values
		$EventName = $_POST['Name'];
		$Date = $_POST['Date'];
		$Location = $_POST['Location'];	
		$Number = $_POST['MembersNumber'];
		$Organiser = $_POST['SelectMember'];
		$Notes = $_POST['Notes'];
		
		//insert values into table for new event record
		$sql = $conn->query("INSERT INTO events (name, date, location, members_number, organiser, notes) 
			Values('$EventName','$Date','$Location','$Number', '$Organiser', '$Notes')");
		
		//reload events page with new values	
		?>
		<script>window.location ="events.php?id=<?php echo $id;?>";</script>
		<?php
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
					<li> <a href = "account.php">Account</a>
					<li> <a href = "members.php">Members</a>
					<li> <a href = "events.php" style="color:#FFD700;">Events</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto;">
				<div  class="form_header" style="margin-top:50px;">	
					<div>
						<h3>Society's Events</h3>
						
						<!-- events table -->
						<table style="margin:auto;" border=1 frame=below rules=rows cellpadding=12px;>    
							<!-- headings -->
							<tr>
							    <th width="80">Event ID</th>
							    <th width="200">Event Name</th>
							    <th width="200">Date</th>
							    <th width="200">Location</th>
							</tr>
							
							<!-- retrieve data -->
							<?php
							    $sql=$conn->query("select * from events");  
							    while($row=$sql->fetch_array())
							    {
							    ?>
							  
							<!-- fill in table-->
							<tr>
							    <td><?php echo $row['event_id'];?></td>
							    <td><?php echo $row['name'];?></td>
							    <td><?php echo $row['date'];?></td>
							    <td><?php echo $row['location'];?></td>
							</tr>
							<?php } ?>
						</table> 
					</div>
				</div>
				
				<!-- admin only to update members so normal members don't abuse this feature -->
				<?php 
				if($_SESSION["Rank"] == "Admin"){ 
				?>
					<div class="form_header">
						<div>	
							<h3 style="margin-bottom:-10px;">Add New Event</h3>
							<p>This is an admin only feature</p>
						</div>
						
						<!-- event form -->
						  <form name="EventForm" method="post" action="" enctype="multipart/form-data">
							<div>
								<!-- left column -->
								<div style="width:30%; display:inline-block; float:left; padding-left:130px;">
									<p class="form_names" style="padding-left:31px;">Event Name</p>
									<div class="form_element"><input name="Name" type="text" required="required" class="textfield" placeholder="Name"></div>  
									<p class="form_names" style="padding-left:31px;">Date of Event</p>					
									<div class="form_element"><input name="Date" type="date" required="required" class="textfield" placeholder="Date" style="padding:1px 16px 1px 16px;"></div>
									<p class="form_names" style="padding-left:31px;">Location</p>
									<div class="form_element"><input name="Location" type="text" required="required" class="textfield" placeholder="Location"></div>
								</div>
								<!-- right column -->
								<div style="width:30%; display:inline-block; float:right; padding-right:130px;">
									<p class="form_names" style="padding-left:31px;">Number of Members</p>
									<div class="form_element"><input name="MembersNumber" type="number" required="required" class="textfield" placeholder="Number"></div>
									<p class="form_names" style="padding-left:31px;">Event Organiser</p>
									<!-- dropdown to select the organiser -->
									<div>
										<?php
										$result = $conn->query("select * from members");
										?>
										<select name="SelectMember" style="padding:4.4px; width:177px; margin-top:4px; margin-bottom:4px;" required="required">
											<option>Organiser</option>
											<?php
												while($row=mysqli_fetch_array($result))
												{
													?>
													<option value=<?php echo $row['member_id'] ?>><?php echo $row['first_name']?> <?php echo $row['last_name'] ?> <?php echo $row['member_id'] ?></option>
													<?php
												}
											?> 
										</select>
									</div>
									<p class="form_names" style="padding-left:31px;">Notes</p>
									<div class="form_element"><input name="Notes" type="text" class="textfield" placeholder="Notes"></div>
								</div>
							</div>
							<!-- form submit button -->
							<div style="padding-top:220px;" class="form_element"><input name="AddEvent" type="submit" class="form_button" value="ADD"></div>
						</form>
					</div>
				<?php 
				} 
				?>	
			</article>
			<footer style="margin-top:50px;">
				<p> © Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>