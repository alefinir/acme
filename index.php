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
	<section class="welcome">
		<article>
			<h1>WELCOME TO ACME!</h1>
			<img src="images/site/rocketfeature.jpg" alt="Image Rocket Feature">
			<div class="calltoaction">
  				<ul>
				    <li><h2>Acme Rocket</h2></li>
				    <li>Quick lighting fuse</li>
				    <li>NHTSA approved seat belts</li>
				    <li>Mobile launch stand included</li>
				    <li><a href="/acme/cart/"><img id="actionbtn" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
			    </ul>
			</div>
		</article>
	</section>
	<section class="gallery">
		<article>
				<div>
					<h2>Featured Recipes</h2>
				</div>
				<div>
				    <a href="#"><img src="images/recipes/bbqsand.jpg" alt="bbqsand"></a>
    				<p>Pulled Roadrunner BBQ</p>
    			</div>
				<div>
				    <a href="#"><img src="images/recipes/potpie.jpg" alt="porpie"></a>
    				<p>Roadrunner Pot Pie</p>
    			</div>
				<div>
				    <a href="#"><img src="images/recipes/soup.jpg" alt="soup"></a>
    				<p>Roadrunner Soup</p>
    			</div>
				<div>
				    <a href="#"><img src="images/recipes/taco.jpg" alt="taco"></a>
    				<p>Roadrunner Tacos</p>
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