<?php
include('UniversalHeader.php');
include('datalogin.php');
include('PHP/printer.php');
if(!isset($_COOKIE['junto'])){
header('Location: http://wwww.tartool.com');
}

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

analytics();

if(isset($_COOKIE['junto'])){   
     $value = $_COOKIE['junto'];
     $result= $conn->query("SELECT * FROM USERS WHERE USERID=".$value);
     $result = mysqli_fetch_assoc($result);
     $name = $result["NAME"];
     $id = $result["USERNAME"];
     $email = $result["EMAIL"];}


echo "<title>";
echo $UniversalName;
echo "</title>";
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
echo '
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo '
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
';
echo '<script src="JS/code.js"></script>';
echo "</head>";
// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:white;">';
echo '<div class="stick-to-top">';

  echo '<span class="top-left"><img src="/logo/junto_logo_solo.png" alt="logo" height="50" width="40"/> </span>';
  //echo '<h2 style="font-family:Thin;font-size:190%;location:fixed;color:black;margin-top:17px;margin-left:200px;color:grey;">Get Inspired</h2>';
  echo ' <div class="top-left-name">tarTool</div>';
  echo ' <div class="top-left-beta">BETA</div>';
  echo '<a href="."><div class="logo-link"></div></a>';

echo '<span style="position:absolute;right:30px;top:5px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
      echo '<span style="position:absolute;float:left;right:100px;top:15px;font-size:150%;font-weight:300;"> <a style="text-decoration:none;" href="/techie/';
        echo $id;
      echo '">My Profile</a></span>';

echo '</div>';


echo '<div class="slider">';
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href=".">
<div style="position:relative;margin-left:40px;"><img src="pictures/glasses.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
Feed
</div>
</a>
</div>';
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href="#" onclick="showsubmission()" data-toggle="modal">
<div style="position:relative;margin-left:40px;"><img src="pictures/pencil.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
Submit<br> Resource
</div>
</a>
</div>';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
<a href="library">
<div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book-red.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:-10px;text-align:center;color:red;">
Saved Cards
</div>
</a>
</div>
';
/*
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
<a href="check.php">
<div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;text-align:center">
My streams
</div>
</a>
</div>
';
*/
echo '</div>';











echo '<div class="transparent" id="transparent" onclick="closeall()"></div>';
  // A commented code snippet that gets the name of the user



echo '<div class="profile-square" id="transparent-profile">';
echo '<a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closig cross"></a>';
echo '<p class="signup-title">Account Settings</p>';

//echo '<form  id="account-settings" action="update.php" method="post">';
echo '<input type="hidden" name="userid" value="';echo $value;echo '">';
echo '<input type="hidden" id="update-username" value="';echo $id;echo '">';
echo '<div class="form-group">
      <b>Name: </b><div class="account-text">';echo $name;echo '</div>
      </div>';
echo '<div class="form-group">
      <b>Email: </b><div class="account-text">';echo $email;echo '</div>
      </div>';
echo '<form action="update.php" id="account-settings">';
echo '<div class="form-group">
      <b>Username: </b><div class="account-text">';echo $id;echo '</div>
      </div>';
echo '<div  id="change-password">';
echo '<div class="form-group" >
      <label >Current password</label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password">
      <span id="changepassword-condition" class="red-text"></span>
      </div>

      <div class="form-group">
      <label >New Password</label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password1">
      <span id="changepassword-condition1" class="red-text"></span>
      </div>

      <div class="form-group">
      <label >Re-type New Password </label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password2">
      <span id="changepassword-condition2" class="red-text"></span>
      </div>';
echo '</div>';


echo '<div  id="account-delete">';
echo '<div class="form-group" >
      <label >Password:</label>
      <input  class="form-control" type="password"  name="user" id="deleteaccount-password">
      <span id="changepassword-condition-delete" class="red-text"></span>
      <button type="button" style="width:30%;margin-right:5px;margin-top:-28px;float:right;" class="btn btn-danger btn-xs" onclick="deleteaccount()">Delete</button>
      </div>';


echo '</div>';


echo '<hr>';
echo '<button type="button" style="width:100%;" class="btn btn-danger btn-xs" onclick="showchangepassword()">Change Password</button>';
echo '<button type="button" style="width:100%;margin-top:5px;" class="btn btn-danger btn-xs" onclick="del()">Delete My Account</button>';
echo '<hr>';
echo '<button type="button" style="width:45%;" class="btn btn-default btn-sm" onclick="closeall()">Cancel</button>';
echo '<button type="submit" style="width:45%;margin-left:10%;" class="btn btn-warning btn-sm">Submit</button>';
echo '</div>';
echo '</form>';



echo '<div class="library-switch-box" onclick="changeview()"> Switch Views </div>';





$ID = $_COOKIE['junto'];


 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN RESOURCES ON FAVOURITES"."."."RESOURCEID=RESOURCES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and MEDIUM='Website' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $WebsiteCount = $conn->query($query);
 $WebsiteCount = mysqli_fetch_assoc($WebsiteCount);
 $WebsiteCount =  $WebsiteCount['COUNT(*)'];

 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN RESOURCES ON FAVOURITES"."."."RESOURCEID=RESOURCES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and MEDIUM='Video/Audio' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $MediaCount = $conn->query($query);
 $MediaCount = mysqli_fetch_assoc($MediaCount);
 $MediaCount =  $MediaCount['COUNT(*)'];

 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN RESOURCES ON FAVOURITES"."."."RESOURCEID=RESOURCES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and MEDIUM='Book' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $BookCount = $conn->query($query);
 $BookCount = mysqli_fetch_assoc($BookCount);
 $BookCount =  $BookCount['COUNT(*)'];

 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN RESOURCES ON FAVOURITES"."."."RESOURCEID=RESOURCES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and MEDIUM='Influencer' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $InfluencerCount = $conn->query($query);
 $InfluencerCount = mysqli_fetch_assoc($InfluencerCount);
 $InfluencerCount =  $InfluencerCount['COUNT(*)']; 





echo '
<div id="mediumView" class="library">
<div class="shelve-title">Website/Tools</div>
<div class="shelveStats" id="website-count" style="background-color:#f1c40f;">';echo $WebsiteCount;echo'</div>
	<div class="shelve" >
';
$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Website'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}


echo '
</div>
<div class="shelve-title">Video/Audio</div>
<div class="shelveStats" id="media-count" style="background-color:red;"> '; echo $MediaCount;echo '</div>
	<div class="shelve" >';
//minicard(10);minicard(6);minicard(7);minicard(12);minicard(13);minicard(10);
$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Video/Audio'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}


echo '</div>';
/*
echo '<div class="shelve-title">Blogs</div>';
echo '<div class="shelveStats">3</div>';
echo '<div class="shelve" style="background-color:#2ecc71;">';

$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Blog'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}

//minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);
echo '</div>';
*/
echo '<div class="shelve-title">Books</div>';
echo '<div class="shelveStats" id="books-count" style="background-color:#9b59b6;">';echo $BookCount;echo '</div>';
echo '<div class="shelve" >';


$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Book'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}



//minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);
echo '</div>';
echo '<div class="shelve-title">Influencers</div>';
echo '<div class="shelveStats" id="influencer-count" style="background-color:#3498db;">';echo $InfluencerCount;echo '</div>';
echo '<div class="shelve" >';

$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Influencer'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}
echo '</div>';

echo '</div>';











 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='FE' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $FECount = $conn->query($query);
 $FECount = mysqli_fetch_assoc($FECount);
 $FECount =  $FECount['COUNT(*)'];

 $query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='BE' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $BECount = $conn->query($query);
 $BECount = mysqli_fetch_assoc($BECount);
 $BECount =  $BECount['COUNT(*)'];
$query = "SELECT COUNT(*) FROM (SELECT COUNT(*) FROM FAVOURITES JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='BD' GROUP BY FAVOURITES"."."."RESOURCEID) AS X";
 $BDCount = $conn->query($query);
 $BDCount = mysqli_fetch_assoc($BDCount);
 $BDCount =  $BDCount['COUNT(*)'];


echo '<div id="categoryView" style="display:none;" class="library">';
  echo '<div class="shelve-title">Back-end</div>';
  echo '<div class="shelveStats" id="back-count"  style="background-color:#32cd32;">'; echo $BECount ;echo '</div>';
  echo '<div class="shelve">';
    $query = "SELECT * FROM FAVOURITES LEFT JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='BE' GROUP BY FAVOURITES.RESOURCEID";
    $result = $conn->query($query);
    while($item = mysqli_fetch_assoc($result)){minicard($item['RESOURCEID']);}
  echo '</div>';

  echo '<div class="shelve-title">Front-end</div>';
  echo '<div class="shelveStats" id="front-count" style="background-color:blue;">';echo $FECount;echo'</div>';
  echo '<div class="shelve" >';
    $query = "SELECT * FROM FAVOURITES LEFT JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='FE' GROUP BY FAVOURITES.RESOURCEID";
    $result = $conn->query($query);
    while($item = mysqli_fetch_assoc($result)){minicard($item['RESOURCEID']);}
  echo '</div>';

  echo '<div class="shelve-title">Business Development</div>';
  echo '<div class="shelveStats" id="business-count" style="background-color:red;">';echo $BDCount;echo '</div>';
  echo '<div class="shelve" >';
    $query = "SELECT * FROM FAVOURITES LEFT JOIN CATEGORIES ON FAVOURITES"."."."RESOURCEID=CATEGORIES"."."."RESOURCEID WHERE FAVOURITES"."."."USERID=".$ID." and CAT='BD' GROUP BY FAVOURITES.RESOURCEID";
    $result = $conn->query($query);
    while($item = mysqli_fetch_assoc($result)){minicard($item['RESOURCEID']);}
  echo '</div>';


echo '</div>';


// Include the submission panel
include('submissionPanel.php');













echo '</body>';
echo '<footer>';
echo '</footer>';
$conn->close();
echo '</html>';
?>
