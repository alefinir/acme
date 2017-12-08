<?php
$infoC=($_SESSION['clientData']);
if (!$_SESSION['loggedin'] || (int)$infoC['clientLevel']<2) {
      header("Location: http://localhost/acme/" );
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
	<title>ACME</title>
</head>
<body>
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
	<div class="all">
	<div class="ablock">	
	<h1>Add Product</h1>
  <h2>Add a new product below. All fields are required.</h2>


<?php
    if (isset($message)) {
     echo $message;
}
?>  
  <form  method="post" action="/acme/products/index.php">
    <fieldset class="tight">
      <legend></legend>
      <label>Type: <?php echo $catList;?></label>

     <label>
        Product Name: <input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} ?> pattern="[a-z A-Z 0-9]{5,99}" required autofocus><br>
     </label>

      <label>
        Product Description:<br><textarea name="invDescription"  rows="4" cols="20" required><?php if(isset($invDescription)){echo $invDescription;} ?></textarea><br>
      </label>
     <label>
        Product Image: <input type="text" name="invImage" id="invImage"  <?php if(isset($invImage)){echo "value='$invImage'";} ?> pattern="[a-z A-Z 0-9 \. \/ \-]{5,99}" required><br>
     </label>
     <label>
        Product Thumbnail (path): <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> pattern="[a-z A-Z 0-9 \. \/ \-]{5,99}" required><br>
     </label>
     <label>
    	 Product Price:	<input type="number" name="invPrice" required id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> min="1" max="1000000"><br>
	</label>
     <label>
    	 In Stock:	<input type="number" name="invStock" id="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";} ?> min="1" max="1000000"><br>
	</label>
	<label>
    	 Shipping Size (W x H x L inches):	<input type="number" name="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required id="invSize" min="1" max="1000000"><br>
	</label>
	<label>
    	 Weight: <input type="number" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> min="1" max="10000000" required ><br>
	</label>
     <label>
        Location: <input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?>  pattern="[a-z A-Z 0-9]{5,99}" required><br>
     </label>
     <label>
        Vendor Name: <input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?>  pattern="[a-z A-Z 0-9]{5,99}" required><br>
     </label>
     <label>
        Primary Material: <input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> pattern="[a-z A-Z 0-9]{5,99}" required><br>
     </label>
  

    </fieldset>  

    <div>
        <input type="submit" name="submit" id="addprodbtn" value="Add Product">
        <input type="hidden" name="action" value="addProduct">        
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