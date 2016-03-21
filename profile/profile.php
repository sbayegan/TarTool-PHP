<?php
include('../UniversalHeader.php');
include('../datalogin.php');
include('../PHP/printer.php');


$username = mysqli_real_escape_string($conn,$_GET['u']);
$title = $conn->query("SELECT * FROM USERS WHERE USERNAME='".$username."'");
if($title->num_rows == 1){
	$title = mysqli_fetch_assoc($title);
	$title = $title['NAME'];
}

echo "<!DOCTYPE html>";
echo "<html>";

analytics();

echo "<head>";
echo "<title>";
echo $title;
echo "</title>";
echo '<link rel="shortcut icon" href="../pictures/icon.ico">';
echo '
<link rel="stylesheet" type="text/css" href="../style.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo '
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
';
echo '<script src="../JS/profile.js"></script>';
echo '<script src="../JS/code.js"></script>';
echo "</head>";
// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:white;">';

// Include the submission panel
include('../submissionPanel.php');


  // A commented code snippet that gets the name of the user
if(isset($_COOKIE['junto'])){   
     $value = $_COOKIE['junto'];
     $result= $conn->query("SELECT * FROM USERS WHERE USERID=".$value);
     $result = mysqli_fetch_assoc($result);
     $name = $result["NAME"];
     $id = $result["USERNAME"];
     $email = $result["EMAIL"];
     $userid = $value;
   }


echo '<div class="profile-square" id="transparent-profile">';
echo '<a href="#" onclick="closeall()"><img class="closing-cross" src=/pictures/cross-red.png width="18" height="18" alt="closig cross"></a>';
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






echo '<div class="comments-square" id="transparent-comments">';
echo '<div id="transparent-comments-ajax"></div>';
if(isset($_COOKIE['junto'])){
echo '

<div style="position:absolute;bottom:0px;width:480px;">
<textarea style="width:100%;margin-top:20px;" name="comment" form="commentform" id="comment"></textarea>
<form action="uploadComment.php" method="post" id="commentform" >
<div class="form-group" >
<input type="button" style="width:100%;" class="btn btn-default btn-sm" onclick="commentUpload()" value="Submit">
</div>
</form>
</div>
';
}
echo'</div>';








echo '<div class="stick-to-top">';

  echo '<span class="top-left"><img src="/logo/junto_logo_solo.png" alt="logo" height="50" width="40"/> </span>';
  //echo '<h2 style="font-family:Thin;font-size:190%;location:fixed;color:black;margin-top:17px;margin-left:200px;color:grey;">Get Inspired</h2>';
  echo ' <div class="top-left-name">tarTool</div>';
  echo ' <div class="top-left-beta">BETA</div>';
  echo '<a href="../."> <div class="logo-link"></div></a>';

echo '<span style="position:absolute;right:30px;top:5px;"> <a href="logout.php"><img src="../pictures/power-red.png" height="45" width="45"></a></span>';
echo '<span style="position:absolute;float:left;right:100px;top:5px;"> <a href="#" onclick="showprofile()"><img src="/pictures/profile.png" height="50" width="50" alt="account"></a></span>';
//echo '<span style="position:absolute;float:left;right:100px;top:5px;"> <a href="#" onclick="showprofile()"><img src="../pictures/profile.png" height="50" width="50" alt="account"></a></span>';
echo '</div>';

$username = mysqli_real_escape_string($conn,$_GET['u']);
$rightname = $conn->query("SELECT * FROM USERS WHERE USERNAME='".$username."'");
if($rightname->num_rows == 0){
echo '
<script>
window.location.replace("http://tartool.com");
</script>
';
}

if($rightname->num_rows == 1 ){
$userRow = mysqli_fetch_assoc($rightname);
	if(isset($_COOKIE['junto']) && $_COOKIE['junto']==$userRow['USERID']){

// This is where the left column gets produced!
		echo '<div class="transparent" id="transparent" onclick="closeallprofile()"></div>';
		echo '<div class="user-info" id="userinf">';

		// Lets take care of the picture
		echo '<input id="profile-image-upload" class="hidden" type="file" accept="image/*" />';
			if($userRow['PROFILEPICTURE']!= NULL){
				$width = $userRow['PWIDTH'];
				$height = $userRow['PHEIGHT'];
				$finalwidth = 250;
				$finalheight;
				$finalheight = ($height * $finalwidth) / $width;
				$finalheight = round($finalheight);
				echo '<div id="pic-upload" class="user-photo" style="width:';echo $finalwidth;echo'px; height:';echo $finalheight;echo'px;">';
					echo '<img style="border-radius:3px;" src="';echo "/profile/".$userRow['PROFILEPICTURE'];echo '" width="250" height="auto">';
					echo '<div class="user-photo-edit">Upload Profile Picture</div>';
				echo '</div>';
			}//if($userRow['PROFILEPICTURE']!= NULL)
			else{
				echo '<div id="pic-upload" class="user-photo" style="font-size:1000%;padding-left:40%;">!';
					echo '<div class="user-photo-edit" style="font-size:10%;margin-left:-100px;">Upload Profile Picture</div>';
				echo '</div>';
				}
		// Lets take care of the Name!
		echo '<div class="user-name" id="user-name" onclick="changename()">';
			echo '<span id="full-name">';
			if(strlen($userRow['NAME'])<1 || $userRow['NAME']==NULL){echo 'Click and Name Yourself';}
				else{echo $userRow['NAME'];}
			echo '</span>';
			echo '<span id="full-name-input-box" style="display:none;">';
			echo '<input onchange="pushname()" type="text" id="newname" name="FirstName" value="';echo $userRow['NAME'];echo '">';
			echo '</span>';
			echo '<div class="user-name-edit" id="user-name-edit">';
			echo 'Edit';
			echo '</div>';
		echo '</div>';


		echo '<div class="user-occupation" id="user-occupation" onclick="changedescription()">';
			echo '<span id="occupation">';
			if(strlen($userRow['DESCRIPTION'])<1 || $userRow['DESCRIPTION']==NULL){echo 'Click to Introduce Yourself!';}
				else{echo $userRow['DESCRIPTION'];}
			echo '</span>';
			echo '<span id="occupation-input-box" style="display:none;">';
			echo '<textarea onchange="pushdesc()" id="newdesc" name="comment" form="usrform" style="width:100%;">';echo $userRow['DESCRIPTION'];echo '</textarea>';
			echo '</span>';
			echo '<div class="user-occupation-edit" id="user-occupation-edit">Edit</div>';
		echo '</div>';
	echo '</div>';//<div class="user-info">
	// Update status section!
	echo '<div class="update-status">';
		echo '<div class="submit-icon" onclick="showsubmission()" >';
				echo '<img src="/pictures/pencil.png" height="70" width="70">';
		echo '</div>';
		echo '<div class="status-submit-icon">';
			echo '<div class="button-blue" onclick="uploadBroadcast()">';
				echo 'Broadcast';
			echo '</div>';
		echo '</div>';
		echo '<div class="status-encouragement">';
			echo 'Let other technology enthusiasts hear it!';
		echo '</div>';

		echo '<textarea id="broadcast" style="outline-width: 0;position:absolute;left:15px;height:60px;bottom:25px;width:410px;font-size:110%;padding-left:2px;font-weight:200;"></textarea>';
	echo '</div>';

	echo '<div class="latest-mini-cards-title">Saved Resources</div>';
	echo '<div class="latest-mini-cards">';
		$minis = $conn->query("SELECT * FROM FAVOURITES JOIN RESOURCES WHERE FAVOURITES"."."."USERID=".$userRow['USERID']." AND FAVOURITES.RESOURCEID=RESOURCES.RESOURCEID  ORDER BY DATE DESC");
		if($minis->num_rows == 0){echo '<div class="flat-card">This Stack is Empty</div>';}
		else{
			while($flat = mysqli_fetch_assoc($minis)){
			 echo '<a href="';	
			 	echo $flat['URL'].'" target="_blank">';
				echo '<div class="flat-card">';
					echo $flat['TITLE'];
				echo '</div>';
			 echo '</a>';
			}}//else
	echo '</div>';

	
//********************************************************************
// Print the resources submitted by the user
	echo '<div class="user-blogging">';
$query = "SELECT * FROM RESOURCES WHERE SUBMITTER=".$userRow['USERID']." ORDER BY ADDED DESC";
$CardStack = $conn->query($query);
while ($go = mysqli_fetch_assoc($CardStack)){
	card($go['RESOURCEID']);
}
	echo '</div>';
//********************************************************************

}//if(isset($_COOKIE['junto']) && $_COOKIE['junto']==$userRow['USERID'])
else{
// Here I just have to fetch the public profile!


// This is where the left column gets produced!
		echo '<div class="transparent" id="transparent" onclick="closeallprofile()"></div>';
		echo '<div class="user-info">';

		// Lets take care of the picture
			if($userRow['PROFILEPICTURE']!= NULL){
				$width = $userRow['PWIDTH'];
				$height = $userRow['PHEIGHT'];
				$finalwidth = 250;
				$finalheight;
				$finalheight = ($height * $finalwidth) / $width;
				$finalheight = round($finalheight);
				echo '<div class="user-photo" style="width:';echo $finalwidth;echo'px; height:';echo $finalheight;echo'px;">';
					echo '<img style="border-radius:3px;" src="';echo "/profile/".$userRow['PROFILEPICTURE'];echo '" width="250" height="auto">';
				echo '</div>';
			}//if($userRow['PROFILEPICTURE']!= NULL)
			else{
				echo '<div class="user-photo" style="font-size:1000%;padding-left:40%;">!';
				echo '</div>';
				}
		// Lets take care of the Name!
		echo '<div class="user-name" id="user-name" >';
			echo '<span id="full-name">';
			if(strlen($userRow['NAME'])<1 || $userRow['NAME']==NULL){echo 'Click and Name Yourself';}
				else{echo $userRow['NAME'];}
			echo '</span>';
		echo '</div>';


		echo '<div class="user-occupation" id="user-occupation">';
			echo '<span id="occupation">';
			if(strlen($userRow['DESCRIPTION'])<1 || $userRow['DESCRIPTION']==NULL){echo 'Click to Introduce Yourself!';}
				else{echo $userRow['DESCRIPTION'];}
			echo '</span>';
		echo '</div>';
	echo '</div>';//<div class="user-info">

	echo '<div class="latest-mini-cards-title">Saved Resources</div>';
	echo '<div class="latest-mini-cards">';
		$minis = $conn->query("SELECT * FROM FAVOURITES JOIN RESOURCES WHERE FAVOURITES"."."."USERID=".$userRow['USERID']." AND FAVOURITES.RESOURCEID=RESOURCES.RESOURCEID  ORDER BY DATE DESC");
		if($minis->num_rows == 0){echo '<div class="flat-card">This Stack is Empty</div>';}
		else{
			while($flat = mysqli_fetch_assoc($minis)){
			 echo '<a href="';	
			 	echo $flat['URL'].'" target="_blank">';
				echo '<div class="flat-card">';
					echo $flat['TITLE'];
				echo '</div>';
			 echo '</a>';
			}}//else
	echo '</div>';

	
//********************************************************************
// Print the resources submitted by the user
	echo '<div class="user-blogging" style="top:80px;height:calc(100% - 100px)">';
$query = "SELECT * FROM RESOURCES WHERE SUBMITTER=".$userRow['USERID']." ORDER BY ADDED DESC";
$CardStack = $conn->query($query);
while ($go = mysqli_fetch_assoc($CardStack)){
	card($go['RESOURCEID']);
}
	echo '</div>';

}
}//if($rightname->num_rows == 1)


echo '</body>';
echo '<footer>';
echo '</footer>';
$conn->close();
echo '</html>';
?>
