<?php
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
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
<title>Image Management | Acme, Inc.</title> 
</head>
<body>

	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
<div class="all">
<div class="ablock">	
	<h1>Image Management</h1>		   
	<p>Welcome to the image management page and you have to choose one of the options presented below</p>

	<h2>Add New Product Image</h2>
	<?php
	if (isset($message)) {
	echo $message;
	}
	?>
	<form action="/acme/uploads/" method="post" enctype="multipart/form-data">
	 <label>Product</label><br>
	 <?php echo $prodSelect; ?><br><br>
	 <label>Upload Image:</label><br>
	 <input type="file" name="file1"><br>
	 <input type="submit" class="regbtn" value="Upload">
	 <input type="hidden" name="action" value="upload">
	</form>	

	<hr>

	<h2>Existing Images</h2>
	<p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
	<?php
		if (isset($imageDisplay)) {
		 echo $imageDisplay;
	}
	?>	

</div>			
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='/acme/scripts/script.js' type='text/javascript'></script>
  <script src="/acme/scripts/hamburger.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?> 