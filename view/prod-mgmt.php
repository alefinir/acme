<?php
$infoC=($_SESSION['clientData']);
if (!$_SESSION['loggedin'] || (int)$infoC['clientLevel']<2) {
      header("Location: http://localhost/acme/" );
     }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Products Management -- ACME Foods">
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
<div class="ablock">	
	<h1>Product Management</h1>
	<h2>Welcome to the product management page. Please choose an option below</h2>
			<a href="/acme/products/index.php?action=addCategory">Add a New Category</a><br>  
			<a href="/acme/products/index.php?action=addProduct">Add a New Product</a><br>   
</div>			
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='/acme/scripts/script.js' type='text/javascript'></script>
</body>
</html>