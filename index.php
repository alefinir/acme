<?php
	require_once 'library/connections.php';
	require_once 'model/acme-model.php';

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
	 	if ($action == NULL){
	 		$action='home';
	 	}
	}
	switch ($action){
	 case 'home':
		include 'view/home.php';
	 break;		

	 case 'login':
		include 'view/login.php';
	 break;

	 case 'registration':
		include 'view/registration.php';
	 break;


	 default:
	  include 'view/home.php';
} 

?>