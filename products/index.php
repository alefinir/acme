<?php
/*header

Add-new-category
?action=newcat
only one input

Add-new-product
?action=newprod
con category dinamic
rest of inputs

foother*/


	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/connections.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/acme-model.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/product-model.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/functions.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/uploads-model.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/reviews-model.php';


// Create or access a Session
session_start();

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

  $categories = getCategories();
  //var_dump($categories);
  //exit;



  $navList = buildNav($categories);

  //echo $navList;
  //exit;

	/*build category list of product dinamically---------------------------*/

	$categoriesId = getCategoriesId();


	/*-----------------------------*/




    

	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL){
	 $action = filter_input(INPUT_GET, 'action');
	}

	switch ($action){
/*----------------------------------------------*/
// Code to deliver the views will probably be here

case 'addCategory':

// Filter and store the data
  $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);

// Check for missing data
if(empty($categoryName)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-cat.php';
  exit;
}

// Send the data to the model
$regOutcome = newCategory($categoryName);

// Check and report the result
if($regOutcome === 1){
  /*$message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";*/
    header("Location: http://localhost/acme/products/index.php" );
  //include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/prod-mgmt.php';
  exit;
} else {
  $message = "<p>Sorry $categoryName, Could not be added. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/prod-mgmt.php';
  exit;
}

break;
/*------------------------------------------------*/
case 'addProduct':
// Filter and store the data

	//echo "test";
	//exit;

  $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
  $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
  $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
  $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
  $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_INT);
  $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
  $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
  $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
  $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
  $catId = filter_input(INPUT_POST, 'catId', FILTER_SANITIZE_NUMBER_INT);
  $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
  $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);

//-----------check only numbers

  $invPrice = checkProdNumbers($invPrice);
  $invStock = checkProdNumbers($invStock);
  $invSize = checkProdNumbers($invSize);
  $invWeight = checkProdNumbers($invWeight);



//borrar despues
//$categoryId = 1;

// Check for missing data
if(empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($catId) || empty($invVendor) || empty($invStyle)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-prod.php';
  exit;
}

// Send the data to the model
$regOutcome = newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $catId, $invVendor, $invStyle);

// Check and report the result
if($regOutcome === 1){
$message = "<p>Thanks for adding $invName.</p>";
  unset($invName);
  unset($invDescription);
  unset($invImage);
  unset($invThumbnail);
  unset($invPrice);
  unset($invStock);
  unset($invSize);
  unset($invWeight);
  unset($invLocation);
  unset($catId);
  unset($invVendor);
  unset($invStyle);
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-prod.php';
  exit;
} else {
  $message = "<p>Sorry $invName, Could not be added. Please try again.</p>";
  exit;
}
break;

case 'mod':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if(count($prodInfo)<1){
  $message = 'Sorry, no product information could be found.';
 }
 include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/prod-update.php';
 exit;
break;

//-----------------

case 'del':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if(count($prodInfo)<1){
  $message = 'Sorry, no product information could be found.';
 }
 include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/prod-delete.php';
 exit;
break;

case 'deleteProd':

// Filter and store the data

	//echo "test";
	//exit;

  $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
  $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

// Send the data to the model
  $deleteResult = deleteProduct($invId);

// Check and report the result
if ($deleteResult) {
 $message = "<p>Congratulations, $invName was successfully deleted.</p>";
 $_SESSION['message'] = $message;
 header('Location: http://localhost/acme/products/');
 exit;
}else {
  $message = "<p>Error: $invName was not deleted.</p>";
 	header('Location: http://localhost/acme/products/');
  exit;
}

 break; 


//-----------------
 case 'updateProd':

// Filter and store the data

	//echo "test";
	//exit;

  $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
  $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
  $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
  $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
  $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_INT);
  $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
  $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
  $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
  $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
  $catId = filter_input(INPUT_POST, 'catId', FILTER_SANITIZE_NUMBER_INT);
  $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
  $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
  $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

//-----------check only numbers

  $invPrice = checkProdNumbers($invPrice);
  $invStock = checkProdNumbers($invStock);
  $invSize = checkProdNumbers($invSize);
  $invWeight = checkProdNumbers($invWeight);



//borrar despues
//$categoryId = 1;

// Check for missing data
if(empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($catId) || empty($invVendor) || empty($invStyle)){
  $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/prod-update.php';
  exit;
}

// Send the data to the model
$updateResult = updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $catId, $invVendor, $invStyle, $invId);

// Check and report the result
if ($updateResult===1) {
 $message = "<p class='notify'>Congratulations, $invName was successfully updated.</p>";
 $_SESSION['message'] = $message;
 header('location: /acme/products/');
 exit;
}else {
  $message = "<p>Error. $invName was not updated..</p>";
   include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/prod-update.php';
  exit;
}

 break;

 case 'category':

 $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
 $products = getProductsByCategory($type);
 if(!count($products)){
  $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
 } else {
  $prodDisplay = buildProductsDisplay($products);
 }
//eliminar
//echo $prodDisplay;
//exit; 
//----------

   include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/category.php';
 break;

//detalle logic--------------------------------------------------
  case 'deta':
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//var_dump(getThumbnailImages($id));
//  exit;

 $aProduct = getProductInfo($id);
 if(!count($aProduct)){
  $message = "<p class='notice'>Sorry, no product could be found.</p>";
 } else {
  $prod=$aProduct['invName'];
  $prodId=$aProduct['invId'];
  $aProdDisplay = aProductDisplay($aProduct);

//get array with all thumbnail images
  $thumb = getThumbnailImages($id);
//create html with previous array  
  $aThumbDisplay = buildImageDisplayThumbnail($thumb);

 }

 $reviews = "<h2>Review the ".$prod."</h2>";


//eliminar
//echo $prodDisplay;
//exit; 
//----------


/*
Obtener las reviews de un producto especifico
*/
$reviews = getProductReviews($prodId);
//var_dump($reviews);
//exit;
$rvs = buildProductsReviews($reviews);


   include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/product-detail.php';
 break;

//-----------------
default:
  $products = getProductBasics();

if(count($products) > 0){
  $prodList = '<table class="tablas">';
  $prodList .= '<thead>';
  $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
  $prodList .= '</thead>';
  $prodList .= '<tbody>';
  foreach ($products as $product) {
   $prodList .= "<tr><td>$product[invName]</td>";
   $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
   $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
  }
   $prodList .= '</tbody></table>';
  } else {
   $message = '<p class="notify">Sorry, no products were returned.</p>';
}

	include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/prod-mgmt.php';
}

?>