<?php
 if (!$_SESSION['loggedin']) {
 header("Location: http://localhost/acme/");
 exit;
} 
//   var_dump($reviewInfo);
//     exit;
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

<div class="ablock">

<?php
    if (isset($message)) {
     echo $message;
}
echo "<h1>$invNameReview Review</h1>";
$d=date_format(date_create($review[reviewDate]), 'jS F \, Y');
echo "<p>Review on $d</p>";
?>  
  <form  method="post" action="/acme/reviews/">
    <fieldset class="tight">
      <legend>Review Text</legend>
      <label>
       <?php echo $invNameReview;?><br><textarea name="reviewText"  rows="4" cols="30" required><?php if(isset($reviewInfo['reviewText'])) {echo "$reviewInfo[reviewText]"; } ?></textarea><br>
      </label>

    </fieldset>  

    <div>
        <input type="submit" name="submit" id="updatereview" value="Update">
        <input type="hidden" name="reviewId" value="<?php if(isset($reviewId)){ echo $reviewId; } ?> ">
        <input type="hidden" name="invName" value="<?php if(isset($invNameReview)){ echo $invNameReview; } ?> ">
        <input type="hidden" name="action" value="update">        
    </div>
  </form>
</div>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js'></script>
  <script src='/acme/scripts/script.js'></script>
<script src="/acme/scripts/hamburger.js"></script>
</body>
</html>