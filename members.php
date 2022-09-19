<?php
session_start(); 
include"conn.php";

error_reporting(1); //don't display errors on page !!!!!!!!!!!!!!!!!!!!!!!!!!
?>

<?php
	//check that member id is set or return to login page
	if(isset($_SESSION["MemberID"])){
	}
	else {
		header('Location: login.php');
	} 
?>

<?php

	if(isset($_POST['UpdateMember'])){
		//retrieve values
		$Name = $_POST['select_member'];
		$UpdateTitle = $_POST['select_title'];
		$UpdateSector = $_POST['select_sector'];
		$UpdateRank = $_POST['select_rank'];
		
		//update values
		//this is done separately as not all values have to be set
		if (isset($UpdateTitle) && trim($UpdateTitle) !=''){
			$data = $conn->query("UPDATE members SET title = '$UpdateTitle' where first_name = '$Name'");
		}
		if (isset($UpdateSector) && trim($UpdateSector) !=''){
			$data = $conn->query("UPDATE members SET sector = '$UpdateSector' where first_name = '$Name'");
		}
		if (isset($UpdateRank) && trim($UpdateRank) !=''){
			$data = $conn->query("UPDATE members SET rank = '$UpdateRank' where first_name = '$Name'");
		}
		
		if (isset($UpdateName) == $_SESSION["FirstName"]){
			$_SESSION["Rank"] = $UpdateRank;
		}
		
		$Egg = "hihihi";
		?> 
		
		<p><?php echo $Egg ?></p> 
		<p><?php echo $_POST['select_member'] ?></p>
		<p><?php echo $Name ?></p> 
		<p><?php echo $UpdateTitle ?></p> 
		<p><?php echo $UpdateSector ?></p> 
		<p><?php echo $UpdateRank ?></p> 
		<p>fghdbfhdbfdhf</p>
		
		<?php		
		
		if($data){
			?>	
			<script>window.location ="members.php?id=<?php echo $id;?>";</script> 
			<?php
			}
			else{
			?>
			<script>alert('Invalid Update');</script>
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
					<li> <a href = "account.php">Account</a>
					<li> <a href = "members.php" style="color:#FFD700;">Members</a>
					<li> <a href = "events.php">Events</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto;">
				<div class="body_block" style="margin-top:50px">
					<h3>Members of the Society</h3>
					<!-- members table -->
					<table style="margin:auto;" border=1 frame=below rules=rows cellpadding=4px;> 
						<!-- headings -->
						<tr>
						    <th width="80">Avatar</th>
						    <th width="130">First Name</th>
						    <th width="130">Last Name</th>
						    <th width="130">Title</th>
						    <th width="100">Sector</th>
						    <th width="100">Rank</th>
						</tr>
						
						<!-- set directory -->
						<?php $folder_path = 'uploads/';?>
						
						<!-- retrieve data -->
						<?php
						$sql=$conn->query("select * from members");  
								  
						while($row=$sql->fetch_array()){
						    ?>
							<!-- fill in table -->
							<tr>
								<td><img src="<?php echo $folder_path ?>
									<?php echo $row['avatar']; ?>" style="width: 50px; height: 50px"></td>
								<td><?php echo $row['first_name'];?></td>
								<td><?php echo $row['last_name'];?></td>
								<td><?php echo $row['title'];?></td>
								<td><?php echo $row['sector'];?></td>
								<td><?php echo $row['rank'];?></td>
							</tr>
						<?php } ?>
					</table> 
				</div>
				
				<!-- admin only to update members so normal members don't abuse this feature -->
				<?php 
				if($_SESSION["Rank"] == "Admin"){ 
				?>
					<div class="form_header">
					<div>	
						<h3>Update Member</h3>
						<p>This is an admin only feature</p>
					</div>

					<!-- update form -->
					<form name="UpdateMemberForm" method="post" action="" enctype="multipart/form-data">
						<div>
							<!-- select member -->
							<p class="form_names" style="padding-left:276px;">Select Member</p>	
							<div>
								<?php
								$result = $conn->query("select * from members");
								?>
								<select id="select_member" name="select_member" style="padding:4.4px; width:180px;">
									<option>Member Details</option>
									<?php
										while($row=mysqli_fetch_array($result))
										{
											?>
											<option value=<?php echo $row['first_name'] ?>><?php echo $row['first_name']?> <?php echo $row['last_name'] ?> <?php echo $row['member_id'] ?></option>
											<?php
										}
									?> 
								</select>
							</div>
							
							<!-- choose title -->
							<p class="form_names" style="padding-left:276px;">Title</p>	
							<div class="form_element"><input id="select_title" name="select_title" type="text" class="textfield" placeholder="Title" style="width:172px;"></div>
							
							<!-- choose sector -->
							<p class="form_names" style="padding-left:276px;">Sector</p>
							<select id="select_sector" name="select_sector" style="padding:4.4px; width:180px;">  
								<option value="Unaligned">Unaligned</option> 
								<option value="Esteemed Gentleman">Esteemed Gentleman</option>}  
								<option value="Mafia">Mafia</option>  
								<option value="Political Figure">Political Figure</option>  
								<option value="Business Associate">Business Associate</option>  
								<option value="Academic">Academic</option>  
								<option value="Defence Personal">Defence Personal</option>  
								<option value="Craftsmen">Craftsmen</option>  
							</select>
							
							<!-- select rank -->
							<p class="form_names" style="padding-left:276px;">Rank</p>
							<select id="select_rank" name="select_rank" style="padding:4.4px; width:180px;"> 
								<option value="Member">Member</option>  							
								<option value="Admin">Admin</option>}  
								<option value="Initiate">Initiate</option> 
							</select>
						</div>						
						<div class="form_element"><input name="UpdateMember" id="UpdateMember" type="submit" class="form_button" value="Update"></div>
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