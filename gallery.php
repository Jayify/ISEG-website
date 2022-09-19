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
				padding-bottom:50px;
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
					<li> <a href = "gallery.php" style="color:#FFD700;">Gallery</a>
					<li> <a href = "login.php">Login</a>
					<li> <a href = "registration.php">Register</a>
				</ul>
			</header>
			
			<!-- whitespace -->
			<div class="ws1"></div>
			<div class="ws2"></div>
			
			<!-- main content -->
			<article style="margin:auto; padding-bottom:50px;">
				<div class="body_text" style="margin:50px 0 50px 0;">
					<h3>Gallery</h3>
					<!-- founders photo -->
					<p style="text-align:center;">The Founding Gentlemen of ISEG</p> 
					<img src="Images/Formal_4.jpg" alt="Founding Gentlemen of ISEG" width="780px" id="gentlemen_image">
				</div>
				
				<!-- slideshow container -->
				<div class="body_block">
				<h4 >More images of ISEG events</h4> 
					
					<!-- slideshow arrow -->
					<a class="prev" onclick="plusSlides(-1)" style="float:left; margin-top:74px; margin-left:-4px; margin-right:6px;"></a> <!-- uses hex code for arrow -->
					
					<!-- images in slideshow -->
					<div id="slideshow-container">
						<div class="mySlides">
							<img src="Images/Formal_7.png" width=525px style="margin-right:75px;">
							<div class="text">First formal at Stefano's</div>
						</div>	
						<div class="mySlides">
							<img src="Images/Formal_1.jpg" 	width=525px style="margin-right:75px;">
							<div class="text">A formal at Lambretta's</div>
						</div>
						<div class="mySlides ">
							<img src="Images/Formal_2.jpg" width=525px style="margin-right:75px;">
							<div class="text">A formal at Stefano's</div>
						</div>
						<div class="mySlides">
							<img src="Images/Formal_3.jpg" width=525px style="margin-right:75px;">
							<div class="text">A formal at McDonald's</div>
						</div>						  
							<div class="mySlides">
							<img src="Images/Formal_5.jpg" width=525px style="margin-right:75px;">
							<div class="text">Nelson College mufti day</div>
						</div>						  
						<div class="mySlides">
							<img src="Images/Formal_6.jpg" width=525px style="margin-right:75px;">
							<div class="text">Nelson College mufti day</div>
						</div>						  				  
						<div class="mySlides">
							<img src="Images/Formal_8.png" width=525px style="margin-right:75px;">
							<div class="text">Hut formal at Roding Hut</div>
						</div>
						<div class="mySlides">
							<img src="Images/Formal_9.jpg" width=525px style="margin-right:75px;">
							<div class="text">Esteenmed Gentlemen at Burger Culture</div>
						</div>
					</div>
					
					<!-- slideshow arrow -->
					<a class="next" onclick="plusSlides(1)" style="float:right; margin-top:-313px;">&#10095;</a> <!-- uses hex code for arrow -->
						
						<br>
						
						<!-- dot navigation -->
						<div style="text-align:center; margin-top:-10px; padding-left:1px;">
						  <span class="dot" onclick="currentSlide(1)"></span> 
						  <span class="dot" onclick="currentSlide(2)"></span> 
						  <span class="dot" onclick="currentSlide(3)"></span> 
						  <span class="dot" onclick="currentSlide(4)"></span> 
						  <span class="dot" onclick="currentSlide(5)"></span> 
						  <span class="dot" onclick="currentSlide(6)"></span> 
						  <span class="dot" onclick="currentSlide(7)"></span> 
						  <span class="dot" onclick="currentSlide(8)"></span>
						</div>
					</div>
				</div>
				
				
				<script>
					<!-- scripting for slideshow -->
					var slideIndex = 1;
					showSlides(slideIndex);

					function plusSlides(n) {
					  showSlides(slideIndex += n);
					}

					function currentSlide(n) {
					  showSlides(slideIndex = n);
					}

					function showSlides(n) {
					  var i;
					  var slides = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("dot");
					  if (n > slides.length) {slideIndex = 1}    
					  if (n < 1) {slideIndex = slides.length}
					  for (i = 0; i < slides.length; i++) {
						  slides[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
						  dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " active";
					}
				</script>
			</article>
			<footer style="margin-top:-50px;">
				<p>© Copyrighted by Jayden Houghton Websites Incorporated and the International Society of Esteemed Gentlemen 2021
			</footer>
		</div>
	</body>
</html>