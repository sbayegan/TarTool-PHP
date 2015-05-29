<?php
include('datalogin.php');
include('printer.php');
echo "<!DOCTYPE html>";
echo "<html>";



echo "<head>";

echo "<title>";
echo "Junto Home";
echo "</title>";
echo '<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:white;">';
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

if(isset($_COOKIE['junto'])){

echo '<span style="position:absolute;right:250px;top:10px;"><a href="check.php"> <img src="http://junto.link/pictures/check.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:150px;top:10px;"><a href="profile.php"> <img src="http://junto.link/pictures/user.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:350px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="http://junto.link/pictures/power-red.png" height="45" width="45"></a></span>';
}
else{
//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="authentication.php"><img src="http://junto.link/pictures/power.png" height="45" width="45"></a></span>';
}

 
/*
echo '

<div class="dropdown" style="position:relative;float:left;padding-left:2em;padding-right:1em" >
    
<button  type="button" id="" data-toggle="dropdown">';
$value = $_COOKIE['junto'];
$result= $conn->query("SELECT * FROM USERS WHERE USERID=$value");
$result = mysqli_fetch_assoc($result);
$result = $result["NAME"];

//echo 'Hello, '.$result;
*/
echo '</div>'; 

 

echo '</div>';
// HEADER----------------------------------------------------------------------------

// BODY

echo '<div class="slider">
<div style="width:600px;height:60px;position:relative;margin-right:auto;margin-left:auto;top:10px;padding:10px;border:0px dashed white">
<p style="font-family:\'Open Sans\',sans-serif;font-size:180%;text-align:center">';
$temp = $conn->query("SELECT COUNT(*) as total FROM USERS");
$tem = mysqli_fetch_assoc($temp);
echo '<span style="color:red">'.$tem['total'].'</span>'; 
echo ' enthusiasts playing with ';
$temp = $conn->query("SELECT COUNT(*) as total FROM RESOURCES");
$temp = mysqli_fetch_assoc($temp);
echo '<span style="color:red">'.$temp['total'].'</span>';
echo ' resource cards
</p>
</div>
<div style="position:relative;width:370px;height:105px;margin-left:auto;margin-right:auto;top:20px;border:0px dashed white">
<img src="http://junto.link/pictures/check.png" height="100" width="100" style="position:absolute;left:0px;top:0px">
<img src="http://junto.link/pictures/reader.png" height="100" width="100" style="position:absolute;left:100px;top:0px">
<img src="http://junto.link/pictures/basic.png" height="70" width="70" style="position:absolute;left:230px;top:30px">
<img src="http://junto.link/pictures/pin.png" height="80" width="80" style="position:absolute;left:300px;top:20px">
</div>
<div style="position:relative;margin-left:auto;margin-right:auto;width:370px;height:20px;top:25px;border:0px dashed white">
<span style="margin-left:30px">Select</span> <span style="margin-left:60px">Discover</span><span style="margin-left:50px">Approve</span><span style="margin-left:40px">Pin</span>
</div>
</div>
<div style="position:relative;width:100%;height:50px;background-color:white;top:80px;color:black;text-align:center;text-align:center;font-size:180%;
text-family:Arial">
<p style="position:relative;top:30px">Trending Cards</p>
</div>


';


echo'<div class="feed-column">';
card(13);
card(12);
card(6);
card(10);
card(9);

card(7);

card(8);




echo'</div>';
echo '</body>';
echo '<footer>';
echo'<div class="footer-line">';
echo'</div>';



echo '</footer>';



$conn->close();
echo '</html>';
?>
