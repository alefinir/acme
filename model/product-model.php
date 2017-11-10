<?php 
/*
That this is the products model.


The new function will handle products

new-cat function
new-prod function
*/


	function newCategory($categoryName){

		$db = acmeConnect();

		$sql = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';

		$stmt = $db->prepare($sql);

		$stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;

	}
	/*--------------------------------------*/

	function newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle){

		$db = acmeConnect();

		$sql = 'INSERT INTO inventory (invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle) VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';

		$stmt = $db->prepare($sql);

		$stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
		$stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
		$stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
		$stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
		$stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
		$stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
		$stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
		$stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
		$stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
		$stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
		$stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
		$stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}

function getProductBasics() {
 $db = acmeConnect();
 $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
 $stmt = $db->prepare($sql);
 $stmt->execute();
 $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $products;
}
	
	// Get product information by invId
function getProductInfo($invId){
 $db = acmeConnect();
 $sql = 'SELECT * FROM inventory WHERE invId = :invId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
 $stmt->execute();
 $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $prodInfo;
}

//This function update the product
	function updateProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle, $invId){

		$db = acmeConnect();

		$sql = 'UPDATE inventory SET invName = :invName, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invSize = :invSize, invWeight = :invWeight, invLocation = :invLocation, categoryId = :categoryId, invVendor = :invVendor, invStyle = :invStyle WHERE invId = :invId';


		$stmt = $db->prepare($sql);

		$stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
		$stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
		$stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
		$stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
		$stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT);
		$stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
		$stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
		$stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
		$stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
		$stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
		$stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
		$stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
		$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}
//This function delete the product
	function deleteProduct($invId){

		$db = acmeConnect();

		$sql = 'DELETE FROM inventory WHERE invId = :invId'; 


		$stmt = $db->prepare($sql);


		$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

		$stmt->execute();

		$rowsChanged = $stmt->rowCount();

		$stmt->closeCursor();

		return $rowsChanged;
	}

 ?>