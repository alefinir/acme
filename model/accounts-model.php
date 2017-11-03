<?php 
/*
That this is the accounts model for site visitors.


The new function will handle site registrations
*/

	function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){

		$db = acmeConnect();

		$sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword) VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';

		$stmt = $db->prepare($sql);

		$stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
		$stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
		$stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
		$stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}

/*
this function will check for an existing email address.
*/


function checkExistingEmail($clientEmail)
{

$db = acmeConnect();

$sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :clientEmail';
$stmt = $db->prepare($sql);
$stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
$stmt->execute();
$matchEmail = $stmt->fetch(PDO::FETCH_NUM);
$stmt->closeCursor();

if(empty($matchEmail)){
	return 0;
	//echo "no se encontro el mail";
	//exit;

}else{
	return 1;
	//echo "si se encontro el mail";
	//exit;
}


}

 ?>