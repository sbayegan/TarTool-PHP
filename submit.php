<?php
include ('datalogin.php');
include('PHP/printer.php');
include ('score.php');

// Lets list the number of arguments that are passed to this file
// title, description, type, url
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$type = mysqli_real_escape_string($conn,$_POST['type']);
$url = mysqli_real_escape_string($conn,$_POST['url']);
$profileurl = mysqli_real_escape_string($conn,$_POST['imageurl']);
$cat = mysqli_real_escape_string($conn,$_POST['cat']);
$subcat1 = mysqli_real_escape_string($conn,$_POST['subcat1']);
if(isset($_POST['subcat2'])){
$subcat2 = mysqli_real_escape_string($conn,$_POST['subcat2']);
}
if(isset($_POST['subcat3'])){
$subcat3 = mysqli_real_escape_string($conn,$_POST['subcat3']);
}
if(isset($_POST['subcat4'])){
$subcat4 = mysqli_real_escape_string($conn,$_POST['subcat4']);
}
if(isset($_POST['subcat5'])){
$subcat5 = mysqli_real_escape_string($conn,$_POST['subcat5']);
}

  // This section will echo the information of the submitted resource and is used for 
  // debugging purposes. 
  /*
  // The "<html><br></html>" part will just create a line break
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
  */

// Retrieve the nest available USER id and make sure the usernames are consistent
$query = "SELECT RESOURCE FROM LAST WHERE ONE=1";		// Get the available
$result = $conn->query($query);
$temp = mysqli_fetch_assoc($result);
$resourceid = $temp["RESOURCE"];

$next = $resourceid + 1;					//Set the next available user id
$query = "UPDATE LAST SET RESOURCE='$next' WHERE ONE=1";
$conn->query($query);

// Put the resource in the table
$hash = rand(0,10000000000);
$submitter = $_COOKIE['junto'];

print_r($_FILES);

if(isset($_FILES["fileToUpload"])) {
  echo 'File detected';
  $target_dir = "thumbnails".$resourceid;
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  echo $target_dir;
  echo $target_file;
  echo $imageFileType;

  $uploadOk = 1;
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;}
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;}
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";} 
      else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  $query = "INSERT INTO RESOURCES VALUES($resourceid,'$title','$description','$type','$url',0,'$hash','$target_dir',0,0,0,0,0,0,NOW(),'.$submitter.')";
}
else{
  echo 'file not detected';
  $query = "INSERT INTO RESOURCES VALUES($resourceid,'$title','$description','$type','$url',0,'$hash','$profileurl',0,0,0,0,0,0,NOW(),'.$submitter.')";
}

$conn->query($query);
score($resourceid);

// Put the categories of the resource in the table CATEGORIES 
if(!empty($_POST['subcat1']) && !empty($_POST['subcat1'])) {$query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat1')";$conn->query($query);}

if(isset($_POST['subcat2']) && !empty($_POST['subcat2'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid AND CAT='$cat' AND SUB='$subcat2'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat2')";$conn->query($query);
  }
}

if(isset($_POST['subcat3']) && !empty($_POST['subcat3'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat3'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat3')";$conn->query($query);
  }
}
if(isset($_POST['subcat4']) && !empty($_POST['subcat4'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat4'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat4')";$conn->query($query);
  }
}
if(isset($_POST['subcat5']) && !empty($_POST['subcat5'])){
  $query = "SELECT * FROM CATEGORIES WHERE RESOURCEID=$resourceid and CAT='$cat' and SUB='$subcat5'";
  $result = $conn->query($query);
  if($result->num_rows == 0){
  $query = "INSERT INTO CATEGORIES VALUES($resourceid,'$cat','$subcat5')";$conn->query($query);
  }
}

$to = "saeidjobs@gmail.com";
$subject = "Approve Submitted Resource";
$header = "From: submission@tartool.com \r\n";
$header .="Content-Type: text/html; charset=ISO-8859-1 \r\n";
$message = "
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='http://tartoo.com/style.css'>
<title>
Submission
</title>
</head>
<body>
<p>
Hello Boss! <br>
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
<br>

<br>
Plese note that duplicates subcategories are already removed by the code<br>
You can activate and de-activate the resource using the following two links<br>
<br>
<a href='http://www.tartool.com/approveresource.php?hash=$hash&id=$resourceid&status=active' > Approve this submition </a><br><br><br>
<a href='http://www.tartool.com/approveresource.php?hash=$hash&id=$resourceid&status=deactive'> Undo Approval </a><br>
<br>
Cheers, <br>
Tartool team<br>
<img src='http://www.tartool.com/pictures/logo.png' alt='logo'/> <br>
</p>
</body>
</html>
";
mail($to,$subject,$message, $header);

// And then redirect them to the home page
$conn->close();
echo "<!DOCTYPE html>";
echo "<html>";
echo "<title>";
echo "Thank You";
echo "</title>";
echo '<script src="JS/code.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';

echo "<body>";
echo '<div class="stick-to-top">';
  // LOGO
    echo '<span class="top-left"> <a href="index.php"><img src="/logo/junto_logo_solo.png" alt="logo" height="50" width="40"/> </a> </span>';

  echo '<a href="index.php"> <div class="top-left-name">tarTool</div></a>';
  echo '<a href="index.php"> <div class="top-left-beta">BETA</div>   </a>';
// POWER BUTTON - Check the cookie and set the color and the link of the power button accordingly
     if(isset($_COOKIE['junto'])){
     echo '<span style="position:absolute;right:50px;top:5px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
     }
     else{
     echo '
<script>
window.location.replace("index.php");
</script>
     ';
     }
echo '</div>';//stick-to-top
echo '<div class="feed-column" >';
echo "<h3>Your submission was successfull</h3>";
echo "<p>The suggested resource will go live as soon as it is approved by one of our moderators. </p>";
echo '</div>';



echo "</body>";
echo "</html>";

?>
