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

  <?php 
  //var_dump($prodId);
  //print session information
  //var_dump();
  //exit;
  //if(isset($reviews )){ echo $reviews ; } 
  //$cName=substr($_SESSION['clientData']['clientFirstname'],0,1).$_SESSION['clientData']['clientLastname'];
  //echo $cName;
  //exit;
//print all reviews of this product
  echo "<h1>Customer Reviews</h1>";  
if(isset($_SESSION['loggedin'] )){

if (!$_SESSION['loggedin']) {
	echo "<br>";
	echo "<a href=\"/acme/accounts/?action=Login\">Login for reviewing an article</a>";
	echo "<br>";
	}
else{
$reviewForm = '<form  method="post" action="/acme/reviews/index.php">';
$reviewForm .= '<fieldset class="tight">';
$reviewForm .= '<legend>Review The '.$prod.'</legend>';
$reviewForm .= '<label>';
$reviewForm .= 'Seen Name: <input type="text" name="clientName" id="clientName" ';
$cName=substr($_SESSION['clientData']['clientFirstname'],0,1).$_SESSION['clientData']['clientLastname'];

 if(isset($cName))
	{$reviewForm .= "value= $cName";}
$reviewForm .= ' required disabled autofocus><br>';
$reviewForm .= '</label>';
$reviewForm .= '<label>';
$reviewForm .= 'Review:<br><textarea name="reviewDescription"  rows="4" cols="20" required>';
if(isset($reviewDescription)){
	$reviewForm .= $reviewDescription;}
$reviewForm.= '</textarea><br>';
$reviewForm .= '</label>';
$reviewForm .= '</fieldset>';  
$reviewForm .= '<div>';
$reviewForm .= '<input type="submit" name="submit" id="addreviewbtn" value="Submit Review">';
$reviewForm .= '<input type="hidden" name="invId" value='.$prodId.'>';
$reviewForm .= '<input type="hidden" name="clientId" value='.$_SESSION['clientData']['clientId'].'>';
$reviewForm .= '<input type="hidden" name="action" value="add">';
$reviewForm .= '</div>';
$reviewForm .= '</form>';
//var_dump($reviewForm);
//exit;
echo $reviewForm;
};
};
	echo $rvs;
?>

</div>			
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php';?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js'></script>
  <script src='/acme/scripts/script.js'></script>
  <script src="/acme/scripts/hamburger.js"></script>
</body>
</html>
