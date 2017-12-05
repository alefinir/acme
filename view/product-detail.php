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
<title><?php echo $prod; ?> Product | Acme, Inc.</title> 
</head>
<body>

	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
<div class="all">
<div class="ablock">	
 <?php if(isset($message)){ echo $message; } ?> 
 <?php if(isset($aProdDisplay)){ echo $aProdDisplay; } ?> 	
 <?php if(isset($aThumbDisplay )){ echo $aThumbDisplay ; } ?>
 <h1>Customer Reviews</h1> 	
  <?php if(isset($reviews )){ echo $reviews ; } ?>

    <form  method="post" action="/acme/products/index.php">
    <fieldset class="tight">
      <legend></legend>
     <label>
        Screen Name: <input type="text" name="invName" id="invName" <?php //if(isset($invName)){echo "value='$invName'";} ?> pattern="[a-z A-Z 0-9]{5,99}" required autofocus><br>
     </label>

      <label>
        Review:<br><textarea name="invDescription"  rows="4" cols="20" required><?php //if(isset($invDescription)){echo $invDescription;} ?></textarea><br>
      </label>  

    </fieldset>  

    <div>
        <input type="submit" name="submit" id="addreviewbtn" value="Submit Review">
        <input type="hidden" name="action" value="addReview">        
    </div>
  </form>
<?php
echo $rvs;
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