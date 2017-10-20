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

	$categories = getCategories();
	//var_dump($categories);
	//exit;

	$navList = '<ul>';
	$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";

	foreach ($categories as $category) {
		$navList .= "<li><a href='/acme/index.php?action=$category[categoryName]'title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
	}
	
	$navList .= '</ul>';

	//echo $navList;
	//exit;

	/*---------------------------*/

	$categoriesId = getCategoriesId();
	//var_dump($categoriesId);
	//exit;
	$dataList = '<datalist id="lstCategory"></datalist><br>';

    echo $dataList;
	exit;
    
        /* rellenar dinamicamente	
          <option value="Flash Flood">
          <option value="Hail">
          <option value="Hurricane">
          <option value="Thunderstorm">
          <option value="Tornado">
         */
        
       //	foreach ($categoriesId as $category) {
	//		$dataList .= '<option value="'."$category[categoryName]".'">';
	//	}

	$dataList.='</datalist><br>';

	
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
  $categoryName = filter_input(INPUT_POST, 'categoryName');

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
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/prod-mgmt.php';
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

  $invName = filter_input(INPUT_POST, 'invName');
  $invDescription = filter_input(INPUT_POST, 'invDescription');
  $invImage = filter_input(INPUT_POST, 'invImage');
  $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
  $invPrice = filter_input(INPUT_POST, 'invPrice');
  $invStock = filter_input(INPUT_POST, 'invStock');
  $invSize = filter_input(INPUT_POST, 'invSize');
  $invWeight = filter_input(INPUT_POST, 'invWeight');
  $invLocation = filter_input(INPUT_POST, 'invLocation');
  $categoryId = filter_input(INPUT_POST, 'categoryId');
  $invVendor = filter_input(INPUT_POST, 'invVendor');
  $invStyle = filter_input(INPUT_POST, 'invStyle');


//borrar despues
$categoryId = 1;

// Check for missing data
if(empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-prod.php';
  exit;
}

// Send the data to the model
$regOutcome = newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

// Check and report the result
if($regOutcome === 1){
  $message = "<p>Thanks for adding $invName.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-prod.php';
  exit;
} else {
  $message = "<p>Sorry $invName, Could not be added. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/new-prod.php';
  exit;
}
break;

default:
	include include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/prod-mgmt.php';
}

?>