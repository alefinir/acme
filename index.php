<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home -- ACME Foods">
	<meta name="author" content="Team 4 -- CIT 336 -- BYUI">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Lora" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/medium.css">
	<link rel="stylesheet" type="text/css" href="css/small.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<title>ACME</title>
</head>
<body>

	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
	<div class="all">
					<h1>WELCOME TO ACME!</h1>
			<section>
				<article class="welcome">

					<div class="calltoaction">
		  				<ul>
						    <li><h2>Acme Rocket</h2></li>
						    <li>Quick lighting fuse</li>
						    <li>NHTSA approved seat belts</li>
						    <li>Mobile launch stand included</li>
						    <li><a href="/acme/cart/"><img id="actionbtn" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
						    <li><a href="/acme/cart/"><img id="actionbtn-small" alt="Add to cart button" src="images/site/iwantit-small.gif"></a></li>
					    </ul>
					</div>
				</article>
			</section>
			<div class="container" >	
			<section class="gallery">
				<article>

						<div>
							<h2>Featured Recipes</h2>
						</div>
					<div id="first">						
						<div>
							<figure>
						    	<a href="#"><img src="images/recipes/bbqsand.jpg" alt="bbqsand"></a>
		    					<figcaption>Pulled Roadrunner BBQ</figcaption>
			    				</div>
							</figure>
						<div>
							<figure>
						    	<a href="#"><img src="images/recipes/potpie.jpg" alt="porpie"></a>
		    					<figcaption>Roadrunner Pot Pie</figcaption>
		    				</figure>
		    			</div>
		    		</div>
		    		<div id="second">		    			
						<div>
							<figure>
						    <a href="#"><img src="images/recipes/soup.jpg" alt="soup"></a>
		    				<figcaption>Roadrunner Soup</figcaption>
		    				</figure>
		    			</div>
						<div>
							<figure>
						    	<a href="#"><img src="images/recipes/taco.jpg" alt="taco"></a>
		    					<figcaption>Roadrunner Tacos</figcaption>
		    				</figure>
		    			</div>
		    		</div>	
				</article>
			</section>
			<section class="recipe">
				<article>
						<h2>Get Dinner Rocket Reviews</h2>
						<ul>
						    <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
						    <li>"That thing was fast!" (4/5)</li>
						    <li>"Talk about fast delivery." (5/5)</li>
						    <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
						    <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
						</ul>				
				</article>
			</section>
	</div>
	<aside>	
	</aside>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='scripts/script.js' type='text/javascript'></script>
</body>
</html>