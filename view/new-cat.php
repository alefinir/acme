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

<div class="ablock">

   <h1>Add Category</h1>
  <h2>Add a new category of products below</h2>

<?php
    if (isset($message)) {
     echo $message;
}
?>  
  <form  method="post" action="/acme/products/index.php">
    <fieldset class="tight">
      <legend>New Category Name</legend>
      <label>
        <input type="text" name="categoryName" id="categoryName" value="" placeholder="New Category Name" pattern="[a-zA-Z0-9]{3,99}" autofocus><br>
     </label>

    </fieldset>  

    <div>
        <input type="submit" name="submit" id="addcatbtn" value="Add Category">
        <input type="hidden" name="action" value="addCategory">        
    </div>
  </form>
</div>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='/acme/scripts/script.js' type='text/javascript'></script>
</body>
</html>