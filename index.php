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
					<li> <a href = "index.php" style="color:#FFD700;">Home</a>
					<li> <a href = "gallery.php">Gallery</a>
					<li> <a href = "login.php">Login</a>
					<li> <a href = "registration.php">Register</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- intro section -->
			<div id="intro">
				<div id="intro_text">
					<h2 style="margin-bottom:-18px;">International Society of</h2>
					<h2 style="color:#FFD700; font-size:54.5px;">Esteemed Gentlemen</h2>
				</div>
				<img src="Images/Jayden Grey (4).png" alt="Person in suit" id="intro_image" height="450" align="right";>
				
				<!-- join button -->
				<div id="join_box">
					<a href = "registration.html" id="text_outline"><h3 style="color:white;">JOIN NOW</h3></a>
				</div>
			</div>
			
			<!-- main content -->
			<article>
				<div class="body_text">
					<h3>Who are we?</h3>
					<p>The International Society of Esteemed Gentlemen, also refered to as ISEG, is a youth group that focusses on 
					attending events in the character of a gentlemen. Our current age range is 17 - 18 years old, but the society is 
					rapidly growing.</p> 
					<p>Each member recieves a title and a sector to which their character belongs to. They then play the 
					role of this character during the societies regular meetings. This often involves dressing up in formal attire, including suits.
					The purpose of this society is to make fools of ourselves in public while having an enjoyable evening with our fellow members, 
					and to have a reason to wear formal clothing.</p>
				</div>
				
				<!-- divider line -->
				<img src="Images/Squiggle_Break_Line.png" alt="Squiggly line" class="divider" width="260" height="60";>
				
				<div class="body_text">
					<h3>What activities do we do?</h3>
					<p>We run a number of events throughout the year of different types. Earlier this year we had a large gathering at our McFormal,
					which involves formal dining at McDonalds. We have also held a HutFormal (Formal dining in a hut), multiple MuftiFormals (formal attire 
					during a school mufti day), and other general formals for both lunch and dinners. We are planning a evening dinner on a yacht for 
					our end of year event. We run an average of ten events per year, although this can fluctuate depending on the members. We are open
					to turning any event into a formal for ISEG and welcome any suggestions.</p>
					<p>Types of formals include:</p>
					<ul class="body_ul">
						<li class="body_li">McFormal (formal dining at McDonald's)
						<li class="body_li">HutFormal (Formal dining in a hut)
						<li class="body_li">MuftiFormal (formal attire during a school mufti day)
						<li class="body_li">General dining formals
					</ul>
				</div>
				
				<!-- divider line -->
				<img src="Images/Squiggle_Break_Line.png" alt="Squiggly line" class="divider" width="260" height="60";>
				
				<div class="body_text">
					<h3>How do I join?</h3>
					<p>Follow these steps to join the society:</p>
					<ol class="body_ul">
						<li class="body_li">On our registration page, there is a form to complete. 
						<li class="body_li">Once this form is submitted, you are now an unofficial member of the society.
						<li class="body_li">One of our senior member will get in contact with you within the next week for more information. 
						<li class="body_li">Once you have attended one of our events, you will become an official member of the society.
						<li class="body_li">At this stage, you will select an appropriate title and sector for your character. Welcome to the society!
					</ol>
				</div>
			</article>
			<footer style="margin-top:30px;">
				<p> © Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>