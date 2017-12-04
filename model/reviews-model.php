<?php 
/*
That this is the review model for comments.
*/

//The new function will add reviews to the products


	function addReview($reviewText, $reviewDate, $invId, $clientId){

		$db = acmeConnect();

		$sql = 'INSERT INTO reviews (reviewText, reviewDate, invId, clientId) VALUES (:reviewText, :reviewDate, :invId, :clientId)';

		$stmt = $db->prepare($sql);

		$stmt->bindValue(':reviewText', $clientFirstname, PDO::PARAM_STR);
		$stmt->bindValue(':reviewDate', $clientLastname, PDO::PARAM_STR);
		$stmt->bindParam(':invId', $invId, PDO::PARAM_INT);
		$stmt->bindParam(':clientId', $clientPassword, PDO::PARAM_INT);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}
//----------------------------------------------------
/*
this function retrieve all reviews of a client.
*/

function getClientReviews($clientId){
  $db = acmeConnect();
  $sql = 'SELECT reviewId, reviewText, reviewDate, invId FROM reviews WHERE clientId = :clientId';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}



//----------------------------------------------------
/*
this function retrieve all reviews of a product.
*/
function getProductReviews($invId){
  $db = acmeConnect();
  $sql = 'SELECT reviewId, reviewText, reviewDate, clientId FROM reviews WHERE invId = :invId';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':invId', $invId, PDO::PARAM_INT);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}


//------------------------------------------------------------------------------



// Get a specific review
function getReview($reviewId){
  $db = acmeConnect();
  $sql = 'SELECT reviewText, reviewDate, invId, clientId FROM reviews WHERE reviewId = :reviewId';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':reviewId', $reviewId, PDO::PARAM_INT);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}


// update a review
function updateReview($reviewId, $reviewText, $reviewDate, $invId, $clientId){

		$db = acmeConnect();
		$sql = 'UPDATE reviews SET reviewText = :reviewText, reviewDate = :reviewDate, invId = :invId, clientId = :clientId WHERE reviewId = :reviewId';
		$stmt = $db->prepare($sql);

		$stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
		$stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
		$stmt->bindParam(':invId', $invId, PDO::PARAM_INT);
		$stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
		$stmt->bindParam(':reviewId', $reviewId, PDO::PARAM_INT);

		$stmt->execute();
		//$stmt->debugDumpParams();
		//exit;

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;

}

//-----------------------------------------

//This function delete a review
	function deleteProduct($reviewId){

		$db = acmeConnect();

		$sql = 'DELETE FROM reviews WHERE reviewId = :reviewId'; 


		$stmt = $db->prepare($sql);


		$stmt->bindParam(':reviewId', $reviewId, PDO::PARAM_INT);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}

 ?>