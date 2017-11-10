<?php
 if ($_SESSION['clientData']['clientLevel'] < 2) {
 header("Location: http://localhost/acme/");
 exit;
}    

  $catList = '<select name="catId">';
  $preOpt='<option value="';
  $postOpt='">';
  foreach ($categoriesId as $category) {

if(isset($catId)){
  if ($category['categoryId'] === $catId) {
    //add selected atribute
      $postOpt='" selected>';
     }else{
          $postOpt='">';
     }

  }

  //-------------------
  elseif(isset($prodInfo['categoryId'])){
  if($category['categoryId'] === $prodInfo['categoryId']){
      $postOpt='" selected>';
  }else{
          $postOpt='">';
     }
}
  //-------------------

  $catList .= $preOpt . "$category[categoryId]" . $postOpt;
  $catList .= "$category[categoryName]" . "</option>";
}

  $catList.='</select><br>';

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
	<title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>
</head>
<body>
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
	<div class="all">
	<div class="ablock">	
	<h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
  <h2>Confirm Product Deletion. The delete is permanent.</h2>


<?php
    if (isset($message)) {
     echo $message;
}
?>  
  <form  method="post" action="/acme/products/index.php">
    <fieldset class="tight">
      <legend></legend>

     <label>
        Product Name: <input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";}elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; } ?>" readonly><br>
     </label>

      <label>
        Product Description:<br><textarea name="invDescription"  rows="4" cols="20" readonly><?php if(isset($invDescription)){echo $invDescription;}elseif(isset($prodInfo['invDescription'])) {echo "$prodInfo[invDescription]"; } ?></textarea><br>
      </label>
  
    </fieldset>  

    <div>
        <input type="submit" name="submit" value="Delete Product">
        <input type="hidden" name="action" value="deleteProd">
        <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];}?>">        
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