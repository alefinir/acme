<?php
if (!$_SESSION['loggedin']) {
    	header("Location: http://localhost/acme/" );
     }else{
							$infoClient=($_SESSION['clientData']);
							$clientInformation='<h1>'.$infoClient['clientFirstname'].' '.$infoClient['clientLastname'].'</h1>';
//display message of the session
						    if (isset($message)) {
     							$clientInformation.= $message;
							}

							$clientInformation.='<h2>You are logged in</h2>';
							$clientInformation.='<ul>';
 							$clientInformation.= '<li> First Name: '.$infoClient['clientFirstname'].'</li>';
 							$clientInformation.= '<li> Last Name: '.$infoClient['clientLastname'].'</li>';
 							$clientInformation.= '<li> Email: '.$infoClient['clientEmail'].'</li>';
 							//$clientInformation.= '<li> User Level: '.$infoClient['clientLevel'].'</li>';
							$clientInformation.= '</ul>';
 							$clientInformation.="<a href=\"/acme/accounts/index.php?action=modifyAccount\">Update account information</a>";						
							if ((int)$infoClient['clientLevel']>=2) {
								$clientInformation.='<h2>Use the link to administer products</h2>';	
 								$clientInformation.="<a href=\"/acme/products/index.php\">Product</a>";
 							}

     }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home -- ACME Foods">
	<meta name="author" content="Team 4 -- CIT 336 -- BYUI">
	<link href="https://fonts.googleapis.com/css?family=Bangers%7CLora" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="/acme/css/main.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/medium.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/small.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/large.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/normalize.css">
	<title>ACME</title>
</head>
<body>

	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 

	</header>
	<div class="all">
					<?php 
							echo $clientInformation;
							echo "<h2>Manage your Product Review</h2>";
							if (isset($reviewList)) {
								echo $reviewList; 
							}
							?>
					<section>
						<h6>.</h6>
					</section>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='/acme/scripts/script.js' type='text/javascript'></script>
<script src="/acme/scripts/hamburger.js"></script>
</body>
</html>