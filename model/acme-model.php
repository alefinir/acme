<?php  

		function getCategories(){
			$db = acmeConnect();
			$sql = "SELECT categoryName FROM categories ORDER BY categoryName ASC";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$categories = $stmt->fetchAll();
			$stmt->closeCursor();
			return $categories;
		}

		function getCategoriesId(){
			$db = acmeConnect();
			$sql = "SELECT categoryName, categoryId FROM categories ORDER BY categoryName ASC";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$categories = $stmt->fetchAll();
			$stmt->closeCursor();
			return $categories;
		}
?> 
