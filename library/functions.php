<?php

// Check the email

function checkEmail($clientEmail){
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}


// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword){
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $clientPassword);
}

//this function build the navigation bar with categories dinamically

function buildNav($categories){

	$navList = '<ul>';
	$navList .= "<li><a href='/acme/' title='View the Acme home page'>Home</a></li> ";
	foreach ($categories as $category) {
		$navList .= "<li><a href='/acme/products/?action=category&type=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
	}
	
	$navList .= '</ul>';

	return $navList;
	//echo $navList;
	//exit;
}


/// this function check the numbers input forms of products
function checkProdNumbers($prodNumber){
  $valNumber = filter_var($prodNumber, FILTER_VALIDATE_INT);
  return $valNumber;
}

// create html structure for show products
function buildProductsDisplay($products){
//-------------------------	
 $pd = '<ul id="prod-display">';
 foreach ($products as $product) {
  $pd .= '<li>';
  $pd .= "<a href='/acme/products/?action=deta&id=$product[invId]'>";
  $pd .= "<img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
  $pd .= '<hr>';
  $pd .= "<h2>$product[invName]</h2>";
  $pd .= '</a>';
  $pd .= "<span>$$product[invPrice]</span>";
  $pd .= '</li>';
 }
 $pd .= '</ul>';

 //----------------------
 return $pd;
} 
//create the page of one product
function aProductDisplay($aProduct){
//-------------------------	
  $pd = "<h1>$aProduct[invName]</h1>";

	  $pd .= '<div class="container">';

	  $pd .= '<div class="aProduct">';
		  $pd .= '<img class="imageNormal" src='.$aProduct['invImage'].' alt="Image of '.$aProduct['invName']. ' on Acme.com" >';
		  $pd .= '<img class="imageSmall" src='.$aProduct['invThumbnail'].' alt="Image of '.$aProduct['invName']. ' on Acme.com" >';		  

	  $pd .= '</div>';

	  $pd .= '<section class="recipe">';	  
		  $pd .= '<ul class="noBullet">';

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Description:</span><br>'.$aProduct['invDescription'].'</p>';
			  $pd .= '</li>';

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Primary Material:</span> '.$aProduct['invStyle'].'</p>';
			  $pd .= '</li>';

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Product Weight:</span> '.$aProduct['invWeight'].' lbs</p>';
			  $pd .= '</li>';  

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Shipping size:</span> '.$aProduct['invSize'] .'inches (W x L x H)</p>';
			  $pd .= '</li>';

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Ship from:</span> '.$aProduct['invLocation'].'</p>';
			  $pd .= '</li>';

			  $pd .= '<li>';
			  $pd .= '<p><span class="psubtitle">Number in Stock:</span> '.$aProduct['invStock'].'</p>';
			  $pd .= '</li>';


		  $pd .= '</ul>';

		  $pd .= '<h2 id="price"> $ '.$aProduct['invPrice']. " </h2>";
		 $pd .= '</section>';
	  $pd .= '</div>';
 //----------------------
 return $pd;
}

?>