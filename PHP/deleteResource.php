<?php
if(!isset($_COOKIE['junto'])){
	echo '0';
	return;
}
else{
include('../datalogin.php');
// Get the id and sanitize it.


	$remover = $_COOKIE['junto'];
	$ownership = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$id;
	
	$owner;
	// Check the cookie and ownership of the resource
	if($owner == $remover){
	// 1 - Delete the resource from the tables
		$remove = "DELETE * FROM RESOURCES WHERE RESOURCEID=".$id;
	// 2 - Delete the categories of the resource from the categories
		$removeCat = "DELETE * FROM CATEGORIES WHERE RESOURCEID=".$id;
	// 3 - Delete if from all the libraries 
		$removeFav = "DELETE * FROM FAVOURITES WHERE RESOURCEID=".$id;
		echo '1';
	}// if clause

} // else 
?>