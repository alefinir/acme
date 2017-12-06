<?php
 if ($_SESSION['clientData']['clientLevel'] < 2) {
  header("Location: http://localhost/acme/");
 exit;
}
//var_dump($_SESSION['clientData']);
//exit;    
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
  <?php 
  //var_dump($prodId);
  //print session information
  //var_dump();
  //exit;
  //if(isset($reviews )){ echo $reviews ; } 
  $cName=$_SESSION['clientData']['clientFirstname']."-".$_SESSION['clientData']['clientLastname'];
  //echo $cName;
  //exit;
  ?>

    <form  method="post" action="/acme/reviews/index.php">
    <fieldset class="tight">
      <legend></legend>
     <label>
        Seen Name: <input type="text" name="clientName" id="clientName" <?php if(isset($cName)){echo "value= $cName";} ?> required disabled autofocus><br>
     </label>

      <label>
        Review:<br><textarea name="reviewDescription"  rows="4" cols="20" required><?php if(isset($reviewDescription)){echo $reviewDescription;} ?></textarea><br>
      </label>  

    </fieldset>  

    <div>
        <input type="submit" name="submit" id="addreviewbtn" value="Submit Review">
        <input type="hidden" name="invId" value=<?php echo $prodId?>>  
        <input type="hidden" name="clientId" value=<?php echo $_SESSION['clientData']['clientId']?>>          
        <input type="hidden" name="action" value="add">        
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