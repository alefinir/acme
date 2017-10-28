<?php
	require_once 'library/connections.php';
	require_once 'model/acme-model.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/acme/library/functions.php';


  $categories = getCategories();
  //var_dump($categories);
  //exit;



  $navList = buildNav($categories);

	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL){
	 $action = filter_input(INPUT_GET, 'action');
	 	if ($action == NULL){
	 		$action='home';
	 	}
	}
	switch ($action){
	 case 'home':
		include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/home.php';
	 break;		

	 case 'login':
		include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/login.php';
	 break;

	 case 'registration':
		include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/registration.php';
	 break;

	 case 'addproduct':
		include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/prod-mgmt.php';
	 break;

	 default:
	  include include $_SERVER['DOCUMENT_ROOT'] .'/acme/view/home.php';
} 

?>