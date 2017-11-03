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
	$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li> ";
	foreach ($categories as $category) {
		$navList .= "<li><a href='/acme/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
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



?>