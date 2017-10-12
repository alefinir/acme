<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/connections.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/acme-model.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/accounts-model.php';

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

	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL){
	 $action = filter_input(INPUT_GET, 'action');
	}
	switch ($action){

// Code to deliver the views will probably be here

case 'register':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
  $clientLastname = filter_input(INPUT_POST, 'clientLastname');
  $clientEmail = filter_input(INPUT_POST, 'clientEmail');
  $clientPassword = filter_input(INPUT_POST, 'clientPassword');

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
  exit;
}

// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

// Check and report the result
if($regOutcome === 1){
  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
  exit;
} else {
  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
  exit;
}
break;
default:
}

?>