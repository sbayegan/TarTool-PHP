<?php
include ('datalogin.php');
// Lets list the number of arguments that are passed to this file
// title, description, type, url
$title = mysqli_real_escape_string($conn,$_GET['title']);
$description = mysqli_real_escape_string($conn,$_GET['description']);
$type = mysqli_real_escape_string($conn,$_GET['type']);
$url = mysqli_real_escape_string($conn,$_GET['url']);
$cat = mysqli_real_escape_string($conn,$_GET['cat']);
$subcat1 = mysqli_real_escape_string($conn,$_GET['subcat1']);
if(isset($_GET['subcat2'])){
$subcat2 = mysqli_real_escape_string($conn,$_GET['subcat2']);
}
if(isset($_GET['subcat3'])){
$subcat3 = mysqli_real_escape_string($conn,$_GET['subcat3']);
}
if(isset($_GET['subcat4'])){
$subcat4 = mysqli_real_escape_string($conn,$_GET['subcat4']);
}
if(isset($_GET['subcat5'])){
$subcat5 = mysqli_real_escape_string($conn,$_GET['subcat5']);
}

echo $title;echo "<html><br></html>";
echo $description;echo "<html><br></html>";
echo $type;echo "<html><bt></html>";
echo $url;echo "<html><br></html>";
echo $cat;echo "<html><br></html>";
echo $subcat1;echo "<html><br></html>";
echo $subcat2;echo "<html><br></html>";
echo $subcat3;echo "<html><br></html>";
echo $subcat4;echo "<html><br></html>";
echo $subcat5;echo "<html><br></html>";



$query = "SELECT RESOURCE FROM LAST WHERE ONE=1";		// Get the available
$result = $conn->query($query);
$temp = mysqli_fetch_assoc($result);
echo $temp["RESOURCE"];
$resourceid = $temp["RESOURCE"];
echo "id=$resourceid";echo "<html><br></html>";
$next = $resourceid + 1;					//Set the next available user id
$query = "UPDATE LAST SET RESOURCE='$next' WHERE ONE=1";
$conn->query($query);
$query = "INSERT INTO RESOURCES VALUES($resourceid,'$title','$description','$type','$url',0)";
$conn->query($query);
$query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat1')";$conn->query($query);









