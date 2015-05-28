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
$hash = rand(0,10000000000);
$query = "INSERT INTO RESOURCES VALUES($resourceid,'$title','$description','$type','$url',0,'$hash',NULL,0,0,0,0,0)";
$conn->query($query);
 if(!empty($_GET['subcat1'])) {$query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat1')";$conn->query($query);}

if(isset($_GET['subcat2']) && !empty($_GET['subcat2'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid AND CAT='$cat' AND SUB='$subcat2'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat2')";$conn->query($query);
  }
}

if(isset($_GET['subcat3']) && !empty($_GET['subcat3'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat3'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat3')";$conn->query($query);
  }
}
if(isset($_GET['subcat4']) && !empty($_GET['subcat4'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat4'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat4')";$conn->query($query);
  }
}
if(isset($_GET['subcat5']) && !empty($_GET['subcat5'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat5'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat5')";$conn->query($query);
  }
}

$to = "btong21@gmail.com,saeidjobs@gmail.com";
$subject = "Approve Submitted Resource";
$header = "From: submission@junto.link \r\n";
$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
$message = "
<!DOCTYPE html>
<html>
<head>
<title>
Submission
</title>
</head>
<body>
<p>
Hi Barney <br>
<br>
<br>
A new resource has been submitted with the following information:<br><br>
<b>Title:</b>$title<br>
<b>Description:</b>$description<br>
<b>Medium:</b>$type<br>
<b>URL:</b>$url<br>
<b>Category:</b>$cat<br>
<b>Subcat1:</b>$subcat1<br>
<b>Subcat2:</b>$subcat2<br>
<b>Subcat3:</b>$subcat3<br>
<b>Subcat4:</b>$subcat4<br>
<b>Subcat5:</b>$subcat5<br>
Plese note that duplicates subcategories are already removed by the code<br>
You can activate and de-activate the resource using the following two links<br>
<br>
<a href='http://junto.link/approveresource.php?hash=$hash&id=$resourceid&status=active' > Approve this submition </a><br><br><br>
<a href='http://junto.link/approveresource.php?hash=$hash&id=$resourceid&status=deactive'> Undo Approval </a><br>
<br>
Cheers, <br>
Junto team<br>
<img src='http://junto.link/pictures/logo.png' alt='logo'/> <br>
</p>
</body>
</html>
";
mail($to,$subject,$message, $header);

// And then redirect them to the home page




$conn->close();
?>
