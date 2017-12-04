<?php
/* Reviews Controller */
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/connections.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/acme-model.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/model/accounts-model.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/functions.php';
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

	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL){
	 $action = filter_input(INPUT_GET, 'action');
	}



	switch ($action){

// Code to deliver the views will probably be here

case 'register':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

$clientEmail = checkEmail($clientEmail);
$checkPassword = checkPassword($clientPassword);

/*check email */
$existingEmail = checkExistingEmail($clientEmail);
if($existingEmail){
  $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
  exit;
}

	//var_dump($clientFirstname);
	//echo $clientFirstname;
	//exit;

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){

	if(!is_null($clientFirstname)){
  			$message = '<p>Please provide information for all empty form fields.</p>';
  }
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
  exit;
}
	$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT); 

// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
if($regOutcome === 1){
	//setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');	
  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
  exit;
} else {
  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
  exit;
}
break;
//Login process----------------
case 'Login':

  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

	$clientEmail = checkEmail($clientEmail);
	$checkPassword = checkPassword($clientPassword);

// Check for missing data
if(empty($clientEmail) || empty($checkPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
  exit;
}

// Send the data to the model


// A valid password exists, proceed with the login process
// Query the client data based on the email address
$clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if (!$hashCheck) {
  $message = '<p class="notice">Please check your password and try again.</p>';
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
  exit;
}
// A valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);

// Store the array into the session
$_SESSION['clientData'] = $clientData;
// Send them to the admin view
$clientFirstname=$clientData['clientFirstname'];
//var_dump($clientFirstname);
//echo $cookieFirstname;
//exit;
setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/'); //falta ver si el cliente existe

//include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/admin.php';
header("Location: http://localhost/acme/accounts" );
exit;


break;

case 'Logout':

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');

header("Location: http://localhost/acme/" );

break;
//-----------------------------------------------------------


case 'modifyAccount':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

//$clientEmail = checkExistingEmail($clientEmail);


//var_dump($clientEmail);
//var_dump($clientFirstname);
//exit;


//si es la misma direccion puede fallar tenes que chequearlo contra el de la session
/*check email */
$infoClient = ($_SESSION['clientData']);
if($clientEmail != $infoClient['clientEmail']){

  $existingEmail = checkExistingEmail($clientEmail);
if($existingEmail){
    $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
    include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
    exit;
    }
}
  //var_dump($clientFirstname);
  //echo $clientFirstname;
  //exit;

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){

  if(!is_null($clientFirstname)){
        $message = '<p>Please provide information for all empty form fields.</p>';
  }
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  exit;
}

// Send the data to the model
$regUpdateClient = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);
//$regUpdateClient = updateClient("Antonio Marcelossss", "Lefinua", "alefinir@theelectricfactory.com", "6");

//  echo $regUpdateClient;
//  exit;

// Check and report the result
if($regUpdateClient){  
  $message = "<p>Thanks for update $clientFirstname.</p>";


  // ask for data of new client
  //update date of the sessions
//-----------------------------------------
  $clientData = getClientById($clientId);

  $_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);
// Store the array into the session
$_SESSION['clientData'] = $clientData;
// Send them to the admin view
  $clientFirstname=$clientData['clientFirstname'];
  setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');  

//-----------------------------------------
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  //header("Location: http://localhost/acme/view/client-update.php" );

  exit;
} else {
  $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  exit;
}

break;

case 'modifyPass':
// Filter and store the data
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

$infoClient = ($_SESSION['clientData']);
$cname=$infoClient['clientFirstname'];


//$clientEmail = checkEmail($clientEmail);
$checkPassword = checkPassword($clientPassword);


// Check for missing data
if(empty($checkPassword)){
  $messagePass = "<p>Sorry, bad password. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  exit;
}
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT); 

// Send the data to the model// agregar funcion para cambiar pass
$regOutcome = updatePass($clientId, $hashedPassword);

// Check and report the result
if($regOutcome === 1){
  //setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');  
  $messagePass = "<p>Thanks for changing $cname password. Please use your email and password to login.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  exit;
} else {
  $messagePass = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/client-update.php';
  exit;
}



break;
//-----------------------------------------------------------

default:

  include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/admin.php';
  unset($message);
}

?>